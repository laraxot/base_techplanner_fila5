<?php

declare(strict_types=1);

/*
 * Traduzioni dell'enum Modules\Job\Enums\Status.
 *
 * `EnumTrait` costruisce le chiavi come `values.<valore>.{label,color,icon,
 * description}`, usando il **valore** del caso e non il suo nome: per questo
 * c'e' `1` e non `one`.
 *
 * La sezione `values` mancava del tutto, e quando una chiave non si risolve
 * `TransFuncTrait` restituisce `'fix:'.$key`: l'interfaccia mostrava
 * `fix:job::status.values.active.color` al posto di un colore, e Filament
 * riceveva quella stringa come nome di colore. Due test lo misuravano
 * (base_quaeris_fila5#245).
 */

return [
    'values' => [
        'active' => [
            'label' => 'Attivo',
            'color' => 'success',
            'icon' => 'heroicon-o-play-circle',
            'description' => 'Lo schedule viene eseguito dallo scheduler',
        ],
        'inactive' => [
            'label' => 'Inattivo',
            'color' => 'gray',
            'icon' => 'heroicon-o-pause-circle',
            'description' => 'Lo schedule esiste ma non viene eseguito',
        ],
        'trashed' => [
            'label' => 'Eliminato',
            'color' => 'danger',
            'icon' => 'heroicon-o-trash',
            'description' => 'Lo schedule e stato eliminato',
        ],
        // Valore storico '1' della colonna booleana creata da
        // create_schedule_table: `Status::activeCases()` lo considera attivo,
        // quindi label e colore sono quelli di «attivo», con la provenienza
        // detta nella descrizione perche' chi lo vede in elenco possa capire
        // perche' esistono due stati attivi.
        1 => [
            'label' => 'Attivo',
            'color' => 'success',
            'icon' => 'heroicon-o-play-circle',
            'description' => "Valore storico '1' della colonna booleana: equivale ad attivo",
        ],
    ],

    'fields' => [
        'active' => [
            'label' => 'Attivo',
            'placeholder' => 'Attivo',
            'helper_text' => 'Lo schedule viene eseguito dallo scheduler',
            'description' => 'Lo schedule viene eseguito dallo scheduler',
        ],
        'inactive' => [
            'label' => 'Inattivo',
            'placeholder' => 'Inattivo',
            'helper_text' => 'Lo schedule esiste ma non viene eseguito',
            'description' => 'Lo schedule esiste ma non viene eseguito',
        ],
        'trashed' => [
            'label' => 'Eliminato',
            'placeholder' => 'Eliminato',
            'helper_text' => 'Lo schedule e stato eliminato',
            'description' => 'Lo schedule e stato eliminato',
        ],
        1 => [
            'label' => 'Attivo',
            'placeholder' => 'Attivo',
            'helper_text' => "Valore storico '1': equivale ad attivo",
            'description' => "Valore storico '1': equivale ad attivo",
        ],
    ],
];
