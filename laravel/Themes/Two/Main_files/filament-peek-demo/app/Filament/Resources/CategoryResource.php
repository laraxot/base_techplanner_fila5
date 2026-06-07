<?php

namespace App\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use App\Filament\Resources\CategoryResource\Pages\ManageCategories;
use App\Models\Category;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource as Resource;
<<<<<<< HEAD
=======
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\CategoryResource\Pages\ManageCategories;
use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Notifications\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource as Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

<<<<<<< HEAD
<<<<<<< HEAD
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static string|\UnitEnum|null $navigationGroup = 'Blog';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-tag';

    protected static string | \UnitEnum | null $navigationGroup = 'Blog';
>>>>>>> 4b6b99016 (first commit)
=======
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static string|\UnitEnum|null $navigationGroup = 'Blog';
>>>>>>> dev

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->required()
                ->lazy()
                ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),

            TextInput::make('slug')
                ->required()
                ->lazy()
                ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('posts_count')
                    ->label('Posts')
                    ->counts('posts'),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),

                    DeleteAction::make()
                        ->before(function ($record, $action) {
                            if ($record->posts()->count() > 0) {
                                Notification::make()
                                    ->title("Can't delete the category, it contains posts")
                                    ->danger()
                                    ->send();

                                $action->cancel();
                            }
                        }),
                ]),
            ])
            ->filters([])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCategories::route('/'),
        ];
    }
}
