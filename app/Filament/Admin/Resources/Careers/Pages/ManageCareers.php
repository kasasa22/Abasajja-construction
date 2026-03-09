<?php

namespace App\Filament\Admin\Resources\Careers\Pages;

use App\Filament\Admin\Resources\Careers\CareerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCareers extends ManageRecords
{
    protected static string $resource = CareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
