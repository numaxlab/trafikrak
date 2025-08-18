<?php

namespace Trafikrak\Admin\Filament\Resources\Education;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Lunar\Admin\Support\Resources\BaseResource;
use Trafikrak\Models\Education\Instructor;

class InstructorResource extends BaseResource
{
    use Translatable;

    protected static ?string $model = Instructor::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getLabel(): string
    {
        return __('trafikrak::instructor.label');
    }

    public static function getPluralLabel(): string
    {
        return __('trafikrak::instructor.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return FilamentIcon::resolve('lunar::customers');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('trafikrak::global.sections.education');
    }

    public static function getDefaultSubNavigation(): array
    {
        return [
            InstructorResource\Pages\EditInstructor::class,
            InstructorResource\Pages\ManageInstructorMedia::class,
            InstructorResource\Pages\ManageInstructorUrls::class,
        ];
    }

    public static function getDefaultTable(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection(config('lunar.media.collection'))
                    ->conversion('small')
                    ->limit(1)
                    ->square()
                    ->label(''),
                static::getNameTableColumn(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->searchable();
    }

    public static function getNameTableColumn(): Tables\Columns\Column
    {
        return Tables\Columns\TextColumn::make('name')
            ->label(__('trafikrak::instructor.table.name.label'));
    }

    public static function getDefaultForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('trafikrak::instructor.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Forms\Components\RichEditor::make('description')
                            ->label(__('trafikrak::instructor.form.description.label')),
                    ]),
            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => InstructorResource\Pages\ListInstructors::route('/'),
            'create' => InstructorResource\Pages\CreateInstructor::route('/create'),
            'edit' => InstructorResource\Pages\EditInstructor::route('/{record}/edit'),
            'media' => InstructorResource\Pages\ManageInstructorMedia::route('/{record}/media'),
            'urls' => InstructorResource\Pages\ManageInstructorUrls::route('/{record}/urls'),
        ];
    }
}
