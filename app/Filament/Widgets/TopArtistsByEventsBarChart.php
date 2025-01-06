<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class TopArtistsByEventsBarChart extends ChartWidget
{
    protected static ?string $heading = 'Top Artists by Event Appearances';

    protected function getData(): array
    {
        $topArtists = Artist::select(
            'artists.nama',
            DB::raw('COUNT(artist_events.event_id) as event_count')
        )
        ->leftJoin('artist_events', 'artists.id', '=', 'artist_events.artist_id')
        ->groupBy('artists.id', 'artists.nama')
        ->orderByDesc('event_count')
        ->limit(10)
        ->get();

        return [
            'labels' => $topArtists->pluck('nama')->toArray(),
            'datasets' => [
                [
                    'label' => 'Number of Events',
                    'data' => $topArtists->pluck('event_count')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}