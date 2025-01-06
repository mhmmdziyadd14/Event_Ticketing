<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlyTransactionsWidget extends ChartWidget
{
    protected static ?string $heading = 'Monthly Transactions';

    protected function getData(): array
    {
        $transactions = Transaksi::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_transactions'),
            DB::raw('SUM(grand_total) as total_revenue')
        )
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        return [
            'labels' => $transactions->pluck('month')->map(function ($month) {
                return Carbon::create()->month($month)->format('F');
            })->toArray(),
            'datasets' => [
                [
                    'label' => 'Transactions',
                    'data' => $transactions->pluck('total_transactions')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
                ],
                [
                    'label' => 'Revenue',
                    'data' => $transactions->pluck('total_revenue')->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.6)',
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}