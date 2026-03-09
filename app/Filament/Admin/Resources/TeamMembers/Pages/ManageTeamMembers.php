<?php

namespace App\Filament\Admin\Resources\TeamMembers\Pages;

use App\Filament\Admin\Resources\TeamMembers\TeamMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTeamMembers extends ManageRecords
{
    protected static string $resource = TeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
