---
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "navigation"
issues: []
discussions: []
title: Navigation
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
status: draft
---

# Navigation {#navigation}

The navigation menu in the left-hand sidebar is defined using an array in `navigation.php`. Nested pages can be added by using the `children` associative array.

```php
<?php
// navigation.php

return [
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Customizing Your Site' => 'docs/customizing-your-site',
            'Navigation' => 'docs/navigation',
            'Algolia DocSearch' => 'docs/algolia-docsearch',
            'Custom 404 Page' => 'docs/custom-404-page',
        ],
    ],
    'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
];

// config.php
'navigation' => require_once('navigation.php'),

// blade files
$page->navigation
```

## Collegamenti tra versioni di navigation.md
<<<<<<< .merge_file_1h6HZw
* [navigation.md](../../Gdpr/docs/navigation.md)
=======
<<<<<<< HEAD
* [navigation.md](laravel/modules/gdpr/docs/navigation.md)
>>>>>>> .merge_file_EAfFGT
* [navigation.md](laravel/modules/xot/docs/navigation.md)
* [navigation.md](../../UI/docs/navigation.md)
* [navigation.md](blocks/navigation.md)
* [navigation.md](laravel/modules/cms/docs/navigation.md)
<<<<<<< .merge_file_1h6HZw
* [navigation.md](components/navigation.md)
=======
* [navigation.md](laravel/modules/cms/docs/components/navigation.md)
=======
>>>>>>> 6ed19256f (.)
* [navigation.md](laravel/Modules/Gdpr/docs/navigation.md)
* [navigation.md](laravel/Modules/Xot/docs/navigation.md)
* [navigation.md](laravel/Modules/UI/docs/navigation.md)
* [navigation.md](laravel/Modules/Cms/docs/blocks/navigation.md)
* [navigation.md](laravel/Modules/Cms/docs/navigation.md)
<<<<<<< HEAD
* [navigation.md](laravel/Modules/Cms/docs/components/navigation.md)
=======
* [navigation.md](laravel/Modules/Cms/docs/components/navigation.md)
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_EAfFGT
