---
issues: []
discussions: []
title: "Laravel Passport Configuration (Version 13.4.x)"
module: "Tenant"
type: concept
tags: [passport]
created: 2026-07-14
updated: 2026-07-14
qmd: "passport"
related:
  - "./phpstan-corrections-january.md"
  - "../../phpstan-corrections-january.md"
status: draft
---
# Laravel Passport Configuration (Version 13.4.x)

## Overview
This file documents the configuration options for Laravel Passport in the Tenant module.

## Config File (`config/passport.php`)
```php
return [
    // Encryption keys used to sign access tokens
    'private_key' => env('PASSPORT_PRIVATE_KEY'),
    'public_key' => env('PASSPORT_PUBLIC_KEY'),

    // Use UUIDs for client IDs?
    'client_uuids' => false,

    // Personal access client credentials
=======
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Encryption Keys
    |--------------------------------------------------------------------------
    |
    | Passport uses encryption keys while generating secure access tokens for
    | your application. By default, the keys are stored as local files but
    | can be set via environment variables when that is more convenient.
    |
    */

    'private_key' => env('PASSPORT_PRIVATE_KEY'),

    'public_key' => env('PASSPORT_PUBLIC_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | By default, Passport uses auto-incrementing primary keys when assigning
    | IDs to clients. However, if Passport is installed using the provided
    | --uuids switch, this will be set to "true" and UUIDs will be used.
    |
    */

    'client_uuids' => false,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Client
    |--------------------------------------------------------------------------
    |
    | If you enable client hashing, you should set the personal access client
    | ID and unhashed secret within your environment file. The values will
    | get used while issuing fresh personal access tokens to your users.
    |
    */

>>>>>>> 6ed19256f (.)
    'personal_access_client' => [
        'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
        'secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
    ],

    // Storage driver configuration
    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
        ],
    ],
];
```

## Updating to Version 13
- Run `composer require laravel/passport "^13.4"` to upgrade.
- Publish and run migrations if not already published:
  - `php artisan vendor:publish --tag=passport-migrations`
  - `php artisan migrate`
- Execute `php artisan passport:install --uuids` to generate new encryption keys and default clients.
- Review and adjust any custom scopes in the config file.

## Resources
- Official docs: https://laravel.com/docs/12.x/passport
- GitHub repo: https://github.com/laravel/passport
- OAuth2 Server library: https://github.com/thephpleague/oauth2-server
- Tutorial 1: https://dev.to/anashussain284/laravel-authentication-using-passport-1gkk
- Tutorial 2: https://adevait.com/laravel/api-authentication-with-laravel-passport
- Additional guide: https://medium.com/@mrcyna/laravel-passport-and-microservice-architecture-ef6be7fcc79f

---
*Documentation reflects Laravel Passport version 13 as of January 2026.*
