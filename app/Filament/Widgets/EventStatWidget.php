<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Venue;
use App\Models\Artist;
use App\Models\Transaksi;
use App\Models\Event;

class EventStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Registered Users')
                ->descriptionIcon('heroicon-m-users'),
            
            Stat::make('Total Organizers', User::role('organizer')->count())
                ->description('Event Organizers')
                ->descriptionIcon('heroicon-m-user-group'),
            
            Stat::make('Total Venues', Venue::count())
                ->description('Available Venues')
                ->descriptionIcon('heroicon-m-building-office'),
            
            Stat::make('Total Artists', Artist::count())
                ->description('Registered Artists')
                ->descriptionIcon('heroicon-m-musical-note'),
            
            Stat::make('Total Events', Event::count())
                ->description('Upcoming and Past Events')
                ->descriptionIcon('heroicon-m-calendar'),
            
            Stat::make('Total Transactions', Transaksi::count())
                ->description('Completed Transactions')
                ->descriptionIcon('heroicon-m-currency-dollar'),
        ];
    }
}