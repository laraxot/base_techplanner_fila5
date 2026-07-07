<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Forms\Components;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 6ed19256f (.)
use Filament\Schemas\Components\Section;
use Modules\Geo\Filament\Resources\AddressResource;

// use Squire\Models\Country;

class AddressField extends Section
{
    // protected string $view = 'filament-forms::components.group';

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        $this->schema(array_values($this->getAddressFormSchema()));
=======
        /* @phpstan-ignore argument.type */
        $this->schema($this->getAddressFormSchema());
>>>>>>> 6ed19256f (.)
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

<<<<<<< HEAD
    /**
     * @return array<string, Component>
     */
=======
>>>>>>> 6ed19256f (.)
    protected function getAddressFormSchema(): array
    {
        $baseSchema = AddressResource::getFormSchema();

        // Rimuovi campi non necessari per relazioni semplici
        unset($baseSchema['name'], $baseSchema['is_primary']);

        // Se i live updates sono disabilitati, rimuovi la reattività
        if ($this->disableLiveUpdates) {
            $baseSchema = $this->removeReactivityFromSchema($baseSchema);
        }

        return $baseSchema;
    }

    /**
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
     */
    protected function removeReactivityFromSchema(array $schema): array
    {
        foreach ($schema as $key => $field) {
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
