<?php

namespace App\Filament\Resources;

<<<<<<< HEAD
use App\Filament\Resources\ContactEntryResource\Pages;
use App\Filament\Resources\ContactEntryResource\Pages\ListContactEntries;
use App\Filament\Resources\ContactEntryResource\Pages\ViewContactEntry;
use App\Models\ContactEntry;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Modules\Xot\Filament\Resources\XotBaseResource as Resource;
=======
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ContactEntryResource\Pages\ListContactEntries;
use App\Filament\Resources\ContactEntryResource\Pages\ViewContactEntry;
use App\Filament\Resources\ContactEntryResource\Pages;
use App\Models\ContactEntry;
use Filament\Infolists;
use Modules\Xot\Filament\Resources\XotBaseResource as Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
>>>>>>> 4b6b99016 (first commit)

class ContactEntryResource extends Resource
{
    protected static ?string $model = ContactEntry::class;

<<<<<<< HEAD
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

    protected static string|\UnitEnum|null $navigationGroup = 'Contact';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-envelope';

    protected static string | \UnitEnum | null $navigationGroup = 'Contact';
>>>>>>> 4b6b99016 (first commit)

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('created_at')
                ->label('Date')
                ->columnSpanFull(),

            TextEntry::make('name')
                ->columnSpanFull(),

            TextEntry::make('email')
                ->columnSpanFull(),

            TextEntry::make('message')
                ->formatStateUsing(fn ($state) => new HtmlString(nl2br($state)))
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('name')->sortable(),
                TextColumn::make('email')->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactEntries::route('/'),
            'view' => ViewContactEntry::route('/{record}'),
            // 'create' => Pages\CreateContactEntry::route('/create'),
            // 'edit' => Pages\EditContactEntry::route('/{record}/edit'),
        ];
    }
}
