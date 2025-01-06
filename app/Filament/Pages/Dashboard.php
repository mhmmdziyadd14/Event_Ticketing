<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\UserRoleWidget;
use App\Filament\Widgets\EventStatWidget;
use App\Filament\Widgets\MonthlyTransactionsWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public function getWidgets(): array
    {
        return [
            UserRoleWidget::class,
            EventStatWidget::class,
            MonthlyTransactionsWidget::class,
        ];
    }

    public function getColumns(): int
    {
        return 3;
    }
}