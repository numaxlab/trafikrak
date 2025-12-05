<?php

namespace Testa\Admin\Filament\Resources\Education;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Lunar\Admin\Support\Resources\BaseResource;
use Testa\Models\Education\CourseModule;
use Testa\Models\EventDeliveryMethod;

class CourseModuleResource extends BaseResource
{
    use Translatable;

    protected static ?string $model = CourseModule::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getLabel(): string
    {
        return __('testa::coursemodule.label');
    }

    public static function getPluralLabel(): string
    {
        return __('testa::coursemodule.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return FilamentIcon::resolve('testa::course-module');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('testa::global.sections.education');
    }

    public static function getDefaultSubNavigation(): array
    {
        return [
            CourseModuleResource\Pages\EditCourseModule::class,
            CourseModuleResource\Pages\ManageCourseModuleUrls::class,
            CourseModuleResource\Pages\ManageCourseModuleInstructors::class,
            CourseModuleResource\Pages\ManageCourseModuleProducts::class,
            CourseModuleResource\Pages\ManageCourseModuleAttachments::class,
        ];
    }

    public static function getDefaultTable(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')
                    ->label(__('testa::coursemodule.table.course_name.label')),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('testa::coursemodule.table.name.label')),
                Tables\Columns\TextColumn::make('starts_at')
                    ->dateTime()
                    ->label(__('testa::coursemodule.table.starts_at.label')),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label(__('testa::coursemodule.table.is_published.label')),
            ])
            ->filters([
                SelectFilter::make('course')
                    ->relationship('course', 'name')
                    ->searchable(['name', 'subtitle'])
                    ->label(__('testa::coursemodule.table.course_name.label')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->searchable();
    }

    public static function getDefaultForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('course_id')
                            ->relationship('course', 'name')
                            ->searchable(['name', 'subtitle'])
                            ->required()
                            ->label(__('testa::coursemodule.form.course_id.label')),
                        Forms\Components\TextInput::make('name')
                            ->label(__('testa::coursemodule.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Forms\Components\TextInput::make('subtitle')
                            ->label(__('testa::coursemodule.form.subtitle.label'))
                            ->maxLength(255),
                        TiptapEditor::make('description')
                            ->label(__('testa::coursemodule.form.description.label'))
                            ->profile('default'),
                        Forms\Components\DateTimePicker::make('starts_at')
                            ->label(__('testa::coursemodule.form.starts_at.label'))
                            ->required(),
                        Forms\Components\Select::make('delivery_method')
                            ->label(__('testa::coursemodule.form.delivery_method.label'))
                            ->required()
                            ->options([
                                EventDeliveryMethod::IN_PERSON->value => __(
                                    'testa::coursemodule.form.delivery_method.options.in_person',
                                ),
                                EventDeliveryMethod::ONLINE->value => __(
                                    'testa::coursemodule.form.delivery_method.options.online',
                                ),
                                EventDeliveryMethod::HYBRID->value => __(
                                    'testa::coursemodule.form.delivery_method.options.hybrid',
                                ),
                            ]),
                        Forms\Components\Select::make('venue_id')
                            ->relationship('venue', 'name')
                            ->searchable(['name'])
                            ->label(__('testa::coursemodule.form.venue_id.label')),
                        Forms\Components\Textarea::make('alert')
                            ->label(__('testa::event.form.alert.label')),
                        Forms\Components\Toggle::make('is_published')
                            ->label(__('testa::coursemodule.form.is_published.label')),
                    ]),
            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => CourseModuleResource\Pages\ListCourseModules::route('/'),
            'create' => CourseModuleResource\Pages\CreateCourseModule::route('/create'),
            'edit' => CourseModuleResource\Pages\EditCourseModule::route('/{record}/edit'),
            'urls' => CourseModuleResource\Pages\ManageCourseModuleUrls::route('/{record}/urls'),
            'instructors' => CourseModuleResource\Pages\ManageCourseModuleInstructors::route('/{record}/instructors'),
            'products' => CourseModuleResource\Pages\ManageCourseModuleProducts::route('/{record}/products'),
            'attachments' => CourseModuleResource\Pages\ManageCourseModuleAttachments::route('/{record}/attachments'),
        ];
    }
}
