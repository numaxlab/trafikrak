<?php

namespace Testa\Admin\Filament\Resources\Education\CourseResource\Pages;

use Filament\Resources\RelationManagers\RelationGroup;
use Lunar\Admin\Support\Resources\Pages\ManageMediasRelatedRecords;
use Testa\Admin\Filament\Resources\Education\CourseResource;
use Testa\Admin\Filament\Support\RelationManagers\CourseMediaRelationManager;

class ManageCourseMedia extends ManageMediasRelatedRecords
{
    protected static string $resource = CourseResource::class;

    public function getRelationManagers(): array
    {
        $mediaCollections = $this->getOwnerRecord()->getRegisteredMediaCollections();

        $relationManagers = [];

        foreach ($mediaCollections as $mediaCollection) {
            $relationManagers[] = CourseMediaRelationManager::make([
                'mediaCollection' => $mediaCollection->name,
            ]);
        }

        return [
            RelationGroup::make('Media', $relationManagers),
        ];
    }
}
