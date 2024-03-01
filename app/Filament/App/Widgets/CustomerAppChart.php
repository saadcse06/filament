<?php

namespace App\Filament\App\Widgets;

use App\Models\Customer;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomerAppChart extends ChartWidget
{
protected static ?string $heading = 'Customer Chart';

protected static ?int $sort = 3;

protected static string $color = 'warning';

    protected function getData(): array
    {
        $data = Trend::query(Customer::query()->whereBelongsTo(Filament::getTenant()))
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
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