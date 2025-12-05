<?php

namespace Testa\Admin\Filament\Support\Page;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Lunar\Admin\Support\Pages\BaseManageRelatedRecords;
use Testa\Models\Attachment;
use Testa\Models\Media\Audio;
use Testa\Models\Media\Document;
use Testa\Models\Media\Video;

class ManageAttachmentsRelatedRecords extends BaseManageRelatedRecords
{
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document';
    }

    public static function getNavigationLabel(): string
    {
        return __('testa::attachment.label');
    }

    public function getTitle(): string
    {
        return __('testa::attachment.label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->reorderable('position')
            ->columns([
                Tables\Columns\TextColumn::make('media.name')
                    ->label(__('testa::attachment.table.name.label')),
                Tables\Columns\TextColumn::make('media_type')
                    ->label(__('testa::attachment.table.type.label'))
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        (new Audio)->getMorphClass() => __('testa::attachment.table.type.options.audio'),
                        (new Video)->getMorphClass() => __('testa::attachment.table.type.options.video'),
                        (new Document)->getMorphClass() => __('testa::attachment.table.type.options.document'),
                        default => __('testa::attachment.table.type.options.unknown'),
                    })
                    ->badge(),
            ])
            ->headerActions([
                AttachAction::make()
                    ->label(__('testa::attachment.actions.attach.label'))
                    ->form([
                        Forms\Components\MorphToSelect::make('media')
                            ->label(__('testa::attachment.actions.attach.form.media.label'))
                            ->searchable()
                            ->required()
                            ->types([
                                Forms\Components\MorphToSelect\Type::make(Audio::class)->titleAttribute('name'),
                                Forms\Components\MorphToSelect\Type::make(Document::class)->titleAttribute('name'),
                                Forms\Components\MorphToSelect\Type::make(Video::class)->titleAttribute('name'),
                            ]),
                    ])
                    ->action(function (array $arguments, array $data, Form $form, Table $table) {
                        $relationship = Relation::noConstraints(fn () => $table->getRelationship());

                        $data['attachable_type'] = $relationship->getParent()->getMorphClass();
                        $data['attachable_id'] = $relationship->getParent()->id;
                        $data['position'] = $relationship->count() + 1;

                        Attachment::create($data);

                        Notification::make()
                            ->success()
                            ->body(__('testa::attachment.actions.attach.notification.success'))
                            ->send();
                    }),
            ])
            ->actions([
                DetachAction::make()
                    ->action(function (Model $record, Table $table) {
                        $record->delete();

                        Notification::make()
                            ->success()
                            ->body(__('testa::attachment.actions.detach.notification.success'))
                            ->send();
                    }),
            ]);
    }
}
