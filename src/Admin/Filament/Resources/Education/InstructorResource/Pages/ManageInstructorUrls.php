<?php

namespace Trafikrak\Admin\Filament\Resources\Education\InstructorResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Trafikrak\Admin\Filament\Resources\Education\InstructorResource;
use Trafikrak\Models\Education\Instructor;

class ManageInstructorUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = InstructorResource::class;

    protected static string $model = Instructor::class;
}
