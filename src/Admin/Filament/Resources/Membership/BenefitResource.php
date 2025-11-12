<?php

namespace Trafikrak\Admin\Filament\Resources\Membership;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Lunar\Admin\Support\Resources\BaseResource;
use Lunar\Models\CustomerGroup;
use Trafikrak\Models\Membership\Benefit;

class BenefitResource extends BaseResource
{
    use Translatable;

    protected static ?string $model = Benefit::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getNavigationGroup(): ?string
    {
        return __('trafikrak::global.sections.membership');
    }

    public static function getLabel(): string
    {
        return __('trafikrak::benefit.label');
    }

    public static function getPluralLabel(): string
    {
        return __('trafikrak::benefit.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-arrow-up';
    }

    public static function getDefaultSubNavigation(): array
    {
        return [
            BenefitResource\Pages\EditBenefit::class,
        ];
    }

    public static function getDefaultTable(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->searchable();
    }

    public static function getDefaultForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('trafikrak::benefit.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Forms\Components\Select::make('code')
                            ->label(__('trafikrak::benefit.form.code.label'))
                            ->required()
                            ->options([
                                Benefit::CREDIT_PAYMENT_TYPE => __(
                                    'trafikrak::benefit.form.code.options.credit_payment_type',
                                ),
                                Benefit::CUSTOMER_GROUP => __(
                                    'trafikrak::benefit.form.code.options.customer_group',
                                ),
                            ])
                            ->live(),
                        Forms\Components\Select::make('customer_group_id')
                            ->options(CustomerGroup::all()->pluck('name', 'id'))
                            ->label(__('trafikrak::benefit.form.customer_group_id.label'))
                            ->visible(fn (Get $get) => $get('code') === Benefit::CUSTOMER_GROUP),
                    ]),
            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => BenefitResource\Pages\ListBenefits::route('/'),
            'create' => BenefitResource\Pages\CreateBenefit::route('/create'),
            'edit' => BenefitResource\Pages\EditBenefit::route('/{record}/edit'),
        ];
    }
}
