<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // dd(Employee::with(['state','city','country','department'])->get());
        return [
            Stat::make('All Employee', Employee::count()),
            Stat::make('City', Employee::with('state')->count()),
            Stat::make('Country', Employee::with("city")->count()),
            Stat::make('Department', Employee::with('department')->count()),

        ];
    }
}
