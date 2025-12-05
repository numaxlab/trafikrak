<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Lunar\Admin\Support\Pages\BaseManageRelatedRecords;
use NumaxLab\Lunar\Geslib\Admin\Filament\Resources\AuthorResource;
use NumaxLab\Lunar\Geslib\Models\Author;
use Testa\Admin\Filament\Resources\Education\CourseModuleResource;

class ManageCourseModuleInstructors extends BaseManageRelatedRecords
{
    protected static string $resource = CourseModuleResource::class;

    protected static string $relationship = 'instructors';

    public static function getNavigationIcon(): ?string
    {
        return FilamentIcon::resolve('lunar::customers');
    }

    public static function getNavigationLabel(): string
    {
        return __('testa::coursemodule.pages.instructors.label');
    }

    public function getTitle(): string
    {
        return __('testa::coursemodule.pages.instructors.label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->reorderable('position')
            ->columns([
                AuthorResource::getNameTableColumn()->searchable()
                    ->url(function (Model $record) {
                        return AuthorResource::getUrl('edit', [
                            'record' => $record->getKey(),
                        ]);
                    }),
            ])->actions([
                DetachAction::make()
                    ->action(function (Model $record, Table $table) {
                        $relationship = Relation::noConstraints(fn () => $table->getRelationship());

                        $relationship->detach($record);

                        Notification::make()
                            ->success()
                            ->body(__('testa::coursemodule.pages.instructors.actions.detach.notification.success'))
                            ->send();
                    }),
            ])->headerActions([
                AttachAction::make()
                    ->label(
                        __('testa::course.pages.products.actions.attach.label'),
                    )
                    ->form([
                        Forms\Components\Select::make('recordId')
                            ->label(
                                __('testa::coursemodule.pages.instructors.actions.attach.form.record_id.label'),
                            )
                            ->required()
                            ->searchable()
                            ->getSearchResultsUsing(
                                static function (Forms\Components\Select $component, string $search): array {
                                    return Author::search($search)
                                        ->get()
                                        ->mapWithKeys(
                                            fn (Author $record): array
                                                => [
                                                $record->getKey() => $record->name,
                                            ],
                                        )
                                        ->all();
                                },
                            ),
                    ])
                    ->action(function (array $arguments, array $data, Form $form, Table $table) {
                        $relationship = Relation::noConstraints(fn () => $table->getRelationship());

                        $instructor = Author::find($data['recordId']);

                        $relationship->attach($instructor, [
                            'position' => $relationship->count() + 1,
                        ]);

                        Notification::make()
                            ->success()
                            ->body(__('testa::coursemodule.pages.instructors.actions.attach.notification.success'))
                            ->send();
                    }),
            ]);
    }
}
