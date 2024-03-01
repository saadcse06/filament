<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use App\Models\Employee;
use Flowframe\Trend\TrendValue;

class EmployeeAdminChart extends ChartWidget
{
    protected static ?string $heading = 'Employee Chart';
    protected static ?int $sort = 3;
    protected static string $color = 'warning';

    protected function getData(): array
    {
        $data = Trend::model(Employee::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Employees',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#ff9966',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
