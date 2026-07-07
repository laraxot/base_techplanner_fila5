# Registrazione dei Componenti Blade nel Modulo User

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione principale e completa si trova nel [modulo UI](../../../UI/docs/architecture/component-registration.md).
> La documentazione principale e completa si trova nel [modulo UI](../../../UI/project_docs/architecture/component-registration.md).
<<<<<<< HEAD
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/docs/architecture/component-registration.md).
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/project_docs/architecture/component-registration.md).
=======
>>>>>>> 6ed19256f (.)
## Implementazione Corretta nel Modulo User
Nel modulo User, tutti i componenti Blade devono seguire la struttura standard:
```
Modules/
└── User/
    └── View/
        └── Components/
            └── Profile/
                ├── Dropdown.php
                └── DropdownLink.php
Il `UserServiceProvider` **non deve** registrare manualmente i componenti Blade, poiché questo avviene automaticamente tramite il metodo `registerBladeComponents()` ereditato da `XotBaseServiceProvider`.
## Utilizzo Corretto nel Modulo User
I componenti possono essere utilizzati nei template Blade con il prefisso del namespace:
```blade
<x-user::profile.dropdown>
    <!-- Contenuto del dropdown -->
</x-user::profile.dropdown>
## Collegamenti
<<<<<<< HEAD
- [Documentazione principale sulla registrazione dei componenti](../ui/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](../User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](../ui/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](Modules/User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](modules/ui/project_docs/architecture/component-registration.md)
- [Documentazione principale sulla registrazione dei componenti](../UI/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](../User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](../UI/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](Modules/User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](Modules/UI/project_docs/architecture/component-registration.md)
=======
- [Documentazione principale sulla registrazione dei componenti](../UI/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](../User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](/var/www/html/base_saluteora/laravel/Modules/UI/docs/architecture/component-registration.md)
- [Implementazione di UserServiceProvider](/var/www/html/base_saluteora/laravel/Modules/User/app/Providers/UserServiceProvider.php)
- [Documentazione principale sulla registrazione dei componenti](/var/www/html/base_saluteora/laravel/Modules/UI/project_docs/architecture/component-registration.md)
>>>>>>> 6ed19256f (.)
