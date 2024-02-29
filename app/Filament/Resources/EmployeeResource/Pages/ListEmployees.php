<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Filament\Actions;
use function Filament\Navigation\badge;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'This Week' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at','>=',now()->subWeek()))
                ->badge(Employee::query()->where('created_at','>=', now()->subWeek())->count()),
            'This Month' => Tab::make()
                 ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at','>=',now()->subMonth()))
                 ->badge(Employee::query()->where('created_at','>=', now()->subMonth())->count()),
            'This Year' => Tab::make()
                 ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at','>=',now()->subYear()))
                 ->badge(Employee::query()->where('created_at','>=', now()->subYear())->count())
        ];
    }
}
