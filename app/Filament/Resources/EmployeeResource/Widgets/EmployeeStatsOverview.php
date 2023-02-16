<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $INA = Country::where('country_code', 'INA')->withCount('employees')->first();
        $SG = Country::where('country_code', 'SG')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($INA->name . ' Employees', $INA->employees_count),
            Card::make($SG->name . ' Employees', $SG->employees_count),

        ];
    }
}
