<?php

namespace Testa\Admin\Filament\Resources\Editorial\ProductResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Lunar\Admin\Filament\Resources\ProductResource;
use Lunar\Admin\Support\Pages\BaseManageRelatedRecords;
use Testa\Models\Product;

class ManageProductReviews extends BaseManageRelatedRecords
{
    use Translatable;

    protected static string $relationship = 'reviews';

    protected static string $resource = ProductResource::class;

    protected static string $model = Product::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-chat-bubble-bottom-center-text';
    }

    public static function getNavigationLabel(): string
    {
        return __('testa::global.relation_managers.reviews');
    }

    public function getTitle(): string|Htmlable
    {
        return __('testa::global.relation_managers.reviews');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Textarea::make('quote')
                        ->label(
                            __('testa::review.form.quote.label'),
                        )
                        ->required(),
                    Forms\Components\TextInput::make('media_name')
                        ->label(
                            __('testa::review.form.media_name.label'),
                        )
                        ->maxLength(255),
                    Forms\Components\TextInput::make('author')
                        ->label(
                            __('testa::review.form.author.label'),
                        )
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link')
                        ->label(
                            __('testa::review.form.link.label'),
                        )
                        ->maxLength(255),
                ])->columns(1)->columnSpan(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('quote')
            ->columns([
                Tables\Columns\TextColumn::make('quote')
                    ->label(__('testa::review.form.quote.label'))
                    ->limit(30),
                Tables\Columns\TextColumn::make('media_name')->label(
                    __('testa::review.form.media_name.label'),
                ),
            ])
            ->headerActions([
                Tables\Actions\LocaleSwitcher::make(),
                Tables\Actions\CreateAction::make()->label(
                    __('testa::review.actions.create.label'),
                ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
