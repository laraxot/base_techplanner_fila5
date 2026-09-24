<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from opening_hours_field.php for maintainability (<500 LOC).
// Canon: Modules/UI/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/opening_hours_field_sections.php
return array (
  'sections' => 
  array (
    'week_schedule' => 
    array (
      'label' => 'Orari Settimanali',
      'description' => 'Configura gli orari di apertura per ogni giorno della settimana',
    ),
    'availability_settings' => 
    array (
      'label' => 'Impostazioni Disponibilità',
      'description' => 'Gestisci le tue fasce orarie di disponibilità',
    ),
  ),
);
