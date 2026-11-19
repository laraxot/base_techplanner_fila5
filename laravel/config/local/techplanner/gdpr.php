<?php

declare(strict_types=1);

/*
 * Impostazioni Gdpr di sottana.com (GdprConfigData). Si cambiano anche dalla SettingPage del modulo.
 * La cookie policy del sito è la pagina CMS `cookies` (`/it/cookies`): il default del modulo, `/cookie-policy`,
 * qui risponde 404 e il link del banner portava a una pagina inesistente.
 */
return [
    'policy_path' => '/cookies',
];
