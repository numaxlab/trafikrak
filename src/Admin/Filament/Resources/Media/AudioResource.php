<?php

namespace Testa\Admin\Filament\Resources\Media;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Lunar\Admin\Support\Resources\BaseResource;
use Testa\Models\Media\Audio;
use Testa\Models\Media\Visibility;

class AudioResource extends BaseResource
{
    use Translatable;

    protected static ?string $model = Audio::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getNavigationGroup(): ?string
    {
        return __('testa::global.sections.media');
    }

    public static function getLabel(): string
    {
        return __('testa::audio.label');
    }

    public static function getPluralLabel(): string
    {
        return __('testa::audio.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-musical-note';
    }

    public static function getDefaultSubNavigation(): array
    {
        return [
            AudioResource\Pages\EditAudio::class,
            AudioResource\Pages\ManageAudioUrls::class,
            AudioResource\Pages\ManageAudioAttachments::class,
        ];
    }

    public static function getDefaultTable(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('testa::audio.table.name.label')),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label(__('testa::audio.table.is_published.label')),
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
                            ->label(__('testa::audio.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Forms\Components\RichEditor::make('description')
                            ->label(__('testa::audio.form.description.label')),
                        Forms\Components\Grid::make()
                            ->columns([
                                'sm' => 1,
                                'md' => 2,
                            ])
                            ->schema([
                                Forms\Components\Select::make('source')
                                    ->label(__('testa::audio.form.source.label'))
                                    ->options([
                                        'soundcloud' => __('testa::audio.form.source.options.soundcloud'),
                                    ])
                                    ->required(),
                                Forms\Components\Textarea::make('source_id')
                                    ->label(__('testa::audio.form.source_id.label'))
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('visibility')
                            ->label(__('testa::audio.form.visibility.label'))
                            ->required()
                            ->options([
                                Visibility::PUBLIC->value => __(
                                    'testa::audio.form.visibility.options.public',
                                ),
                                Visibility::PRIVATE->value => __(
                                    'testa::audio.form.visibility.options.private',
                                ),
                            ]),
                        Forms\Components\Toggle::make('is_published')
                            ->label(__('testa::audio.form.is_published.label')),
                    ]),
            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => AudioResource\Pages\ListAudios::route('/'),
            'create' => AudioResource\Pages\CreateAudio::route('/create'),
            'edit' => AudioResource\Pages\EditAudio::route('/{record}/edit'),
            'urls' => AudioResource\Pages\ManageAudioUrls::route('/{record}/urls'),
            'attachments' => AudioResource\Pages\ManageAudioAttachments::route('/{record}/attachments'),
        ];
    }
}
