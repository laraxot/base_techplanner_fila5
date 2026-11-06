<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Forms\Components;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
<<<<<<< .merge_file_tK3VxD
=======
=======
>>>>>>> 6ed19256f (.)
use Filament\Schemas\Components\Section;
>>>>>>> .merge_file_6bFUuk
use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

// use Squire\Models\Country;

class AddressField extends XotBaseSection
{
    // protected string $view = 'filament-forms::components.group';

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< .merge_file_tK3VxD
        $this->schema($this->getAddressFormSchema());
=======
<<<<<<< HEAD
        $this->schema(array_values($this->getAddressFormSchema()));
=======
        /* @phpstan-ignore argument.type */
        $this->schema($this->getAddressFormSchema());
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_6bFUuk
        $this->columns(2);
    }

    /**
     * Disabilita gli aggiornamenti live per evitare loop infiniti nei wizard di creazione.
     */
    public function disableLiveUpdates(bool $disable = true): static
    {
        $this->disableLiveUpdates = $disable;

        return $this;
    }

    /**
     * @return array<int|string, Component>
     */
    protected function getAddressFormSchema(): array
    {
        $baseSchema = app(AddressResource::class)->getFormSchema();

        // Rimuovi campi non necessari per relazioni semplici
        unset($baseSchema['name'], $baseSchema['is_primary']);

        // Se i live updates sono disabilitati, rimuovi la reattività
        if ($this->disableLiveUpdates) {
            $baseSchema = $this->removeReactivityFromSchema($baseSchema);
        }

        return $baseSchema;
    }

    /**
<<<<<<< .merge_file_tK3VxD
     * Rimuove tutti i pattern reattivi dai campi per prevenire loop infiniti.
     *
     * @param  array<int|string, Component>  $schema
     * @return array<int|string, Component>
=======
<<<<<<< HEAD
     * @param array<string, Component> $schema
     *
     * @return array<string, Component>
=======
     * Rimuove tutti i pattern reattivi dai campi per prevenire loop infiniti.
     *
     * @param array<string, mixed> $schema
     *
     * @return array<string, mixed>
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_6bFUuk
     */
    protected function removeReactivityFromSchema(array $schema): array
    {
        foreach ($schema as $key => $field) {
<<<<<<< .merge_file_tK3VxD
            $field->live(false);
            $field->afterStateUpdated(null);
            $field->disabled(false);
=======
<<<<<<< HEAD
            if (method_exists($field, 'live')) {
                $field->live(false);
            }

            if (method_exists($field, 'afterStateUpdated')) {
                $field->afterStateUpdated(null);
            }

            if (method_exists($field, 'disabled')) {
=======
            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'live')) {
                // Rimuovi reattività live
                /* @phpstan-ignore method.nonObject */
                $field->live(false);
            }

            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'afterStateUpdated')) {
                // Rimuovi callback afterStateUpdated
                /* @phpstan-ignore method.nonObject */
                $field->afterStateUpdated(null);
            }

            /* @phpstan-ignore argument.type */
            if (method_exists($field, 'disabled')) {
                // Rimuovi condizioni disabled dinamiche
                /* @phpstan-ignore method.nonObject */
>>>>>>> 6ed19256f (.)
                $field->disabled(false);
            }

>>>>>>> .merge_file_6bFUuk
            $schema[$key] = $field;
        }

        return $schema;
    }

    /*
     * public function saveRelationships(): void
     * {
     *
     * $state = $this->getState();
     * $record = $this->getRecord();
     * $relationship = $record->{$this->getRelationship()}();
     *
     * if (null === $relationship) {
     * return;
     * }
     * if ($address = $relationship->first()) {
     * $address->update($state);
     * } else {
     * $relationship->updateOrCreate($state);
     * }
     *
     * $record->touch();
     * }
     */
}
