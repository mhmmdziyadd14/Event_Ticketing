<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleWidget extends ChartWidget
{
    protected static ?string $heading = 'User Roles Distribution';

    protected function getData(): array
    {
        $roles = Role::all();
        
        $roleCounts = $roles->mapWithKeys(function ($role) {
            return [$role->name => User::role($role->name)->count()];
        });

        return [
            'labels' => $roleCounts->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'User Roles',
                    'data' => $roleCounts->values()->toArray(),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                    ],
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}