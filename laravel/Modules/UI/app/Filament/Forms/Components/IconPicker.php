<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Forms\Components;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
use Modules\UI\Actions\Icon\GetAllIconsAction;
use Webmozart\Assert\Assert;

class IconPicker extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $icons = app(GetAllIconsAction::class)->execute();

        $packs = array_keys($icons);
        /** @var list<int|string> $packsKeys */
        $packsKeys = $packs;
        $packsCombined = array_combine($packsKeys, $packsKeys);
        /** @var array<string, string> $packs */
<<<<<<< HEAD
        $packs = $packsCombined ? $packsCombined : [];
=======
        $packs = $packsCombined ?: [];
>>>>>>> dev
        // dddx($icons->toCollection()->get('heroicons')->toArray());

        $this->suffixAction(
            Action::make('icon')
<<<<<<< HEAD
                ->icon(fn (?string $state) => $state)
                // ->modalContent(fn ($record) => view('ui::filament.forms.components.icon-picker', ['record' => $record]))
                ->schema([
                    Select::make('pack')
                        ->options(function () use ($packs): array {
                            /* @var array<string, string> $packsOptions */
=======
                ->icon(static fn (?string $state) => $state)
                // ->modalContent(fn ($record) => view('ui::filament.forms.components.icon-picker', ['record' => $record]))
                ->schema([
                    Select::make('pack')
                        ->options(static function () use ($packs): array {
>>>>>>> dev
                            return $packs;
                        })
                        ->reactive()
                        ->live(),
                    RadioIcon::make('newstate')
                        ->options(function (Get $get) use ($icons): array {
                            $pack = $get('pack');
<<<<<<< HEAD
                            if (! is_string($pack)) {
=======
                            if (! \is_string($pack)) {
>>>>>>> dev
                                return [];
                            }
                            $key = $pack.'.icons';
                            $optsRaw = Arr::get($icons, $key, []);
                            Assert::isArray(
                                $optsRaw,
                                '['.__LINE__.']['.class_basename($this).']',
                            );
                            /** @var array<int|string, mixed> $optsRaw */
<<<<<<< HEAD
                            $optsValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(fn ($v) => is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(fn ($k) => is_string($k) ? $k : (string) $k, array_keys($optsRaw));
=======
                            $optsValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($optsRaw));
                            $optsValues = array_map(static fn ($v) => \is_string($v) ? $v : (string) $v, array_values($optsRaw));
                            /** @var array<int|string> $optsKeys */
                            $optsKeys = array_map(static fn ($k) => \is_string($k) ? $k : (string) $k, array_keys($optsRaw));
>>>>>>> dev
                            $optsCombined = array_combine($optsKeys, $optsValues);

                            return $optsCombined ? $optsCombined : [];
                        })
                        ->inline()
                        ->inlineLabel(false),
                ])
<<<<<<< HEAD
                ->action(function (array $data, Set $set) {
=======
                ->action(static function (array $data, Set $set): void {
>>>>>>> dev
                    $set('icon', $data['newstate']);
                }),
        );
    }
}
