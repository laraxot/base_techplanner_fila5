<?php

/**
 * Tenant List Management.
 */
if ($record === null || ! $record instanceof Tenant) {
                        return '';
                    }
                    $record->generateSlug();
                    $name = $record->getAttribute('name');
                    if (! is_string($name)) {
                        $name = '';
                    }
                    $slug = Str::slug($name);
                    $record->setAttribute('slug', $slug);
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }
}
