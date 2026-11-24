<?php

declare(strict_types=1);

/*
 * Translations for the Modules\Job\Enums\Status enum.
 *
 * `EnumTrait` builds the keys as `values.<value>.{label,color,icon,description}`
 * using the case **value**, not its name: hence `1` instead of `one`.
 *
 * See the Italian file for the full story: the `values` section was missing
 * entirely, and an unresolved key comes back as `'fix:'.$key`, so the interface
 * rendered `fix:job::status.values.active.color` where a colour was expected
 * (base_quaeris_fila5#245).
 */

return [
    'values' => [
        'active' => [
            'label' => 'Active',
            'color' => 'success',
            'icon' => 'heroicon-o-play-circle',
            'description' => 'The schedule is run by the scheduler',
        ],
        'inactive' => [
            'label' => 'Inactive',
            'color' => 'gray',
            'icon' => 'heroicon-o-pause-circle',
            'description' => 'The schedule exists but is not run',
        ],
        'trashed' => [
            'label' => 'Deleted',
            'color' => 'danger',
            'icon' => 'heroicon-o-trash',
            'description' => 'The schedule has been deleted',
        ],
        // Legacy '1' value of the boolean column created by
        // create_schedule_table. `Status::activeCases()` treats it as active,
        // so label and colour match "active"; the description says where it
        // comes from, so that two active-looking states make sense in a list.
        1 => [
            'label' => 'Active',
            'color' => 'success',
            'icon' => 'heroicon-o-play-circle',
            'description' => "Legacy '1' value of the boolean column: same as active",
        ],
    ],

    'fields' => [
        'active' => [
            'label' => 'Active',
            'placeholder' => 'Active',
            'helper_text' => 'The schedule is run by the scheduler',
            'description' => 'The schedule is run by the scheduler',
        ],
        'inactive' => [
            'label' => 'Inactive',
            'placeholder' => 'Inactive',
            'helper_text' => 'The schedule exists but is not run',
            'description' => 'The schedule exists but is not run',
        ],
        'trashed' => [
            'label' => 'Deleted',
            'placeholder' => 'Deleted',
            'helper_text' => 'The schedule has been deleted',
            'description' => 'The schedule has been deleted',
        ],
        1 => [
            'label' => 'Active',
            'placeholder' => 'Active',
            'helper_text' => "Legacy '1' value: same as active",
            'description' => "Legacy '1' value: same as active",
        ],
    ],
];
