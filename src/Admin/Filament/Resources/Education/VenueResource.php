<?php

namespace Testa\Admin\Filament\Resources\Education;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Lunar\Admin\Support\Resources\BaseResource;
use Testa\Models\Venue;

class VenueResource extends BaseResource
{
    use Translatable;

    protected static ?string $model = Venue::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getNavigationGroup(): ?string
    {
        return __('testa::global.sections.education');
    }

    public static function getLabel(): string
    {
        return __('testa::venue.label');
    }

    public static function getPluralLabel(): string
    {
        return __('testa::venue.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-building-office';
    }

    public static function getDefaultSubNavigation(): array
    {
        return [
            VenueResource\Pages\EditVenue::class,
        ];
    }

    public static function getDefaultTable(Table $table): Table
    {
        return $table
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('testa::event.table.name.label'))
                    ->searchable(),
            ]);
    }

    public static function getDefaultForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('testa::event.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                    ]),
            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => VenueResource\Pages\ListVenues::route('/'),
            'create' => VenueResource\Pages\CreateVenue::route('/create'),
            'edit' => VenueResource\Pages\EditVenue::route('/{record}/edit'),
        ];
    }
}
