<?php

declare(strict_types=1);

return [
    'actions' => [
        'attach_user' => 'Adjuntar Usuario',
        'associate_user' => 'Asociar Usuario',
        'user_actions' => 'Acciones del Usuario',
        'view' => 'Ver',
        'edit' => 'Editar',
        'detach' => 'Desvincular',
        'row_actions' => 'Acciones',
        'delete_selected' => 'Eliminar Seleccionados',
        'confirm_detach' => '¿Está seguro de que desea desvincular este usuario?',
        'confirm_delete' => '¿Está seguro de que desea eliminar los usuarios seleccionados?',
        'success_attached' => 'Usuario adjuntado exitosamente',
        'success_detached' => 'Usuario desvinculado exitosamente',
        'success_deleted' => 'Usuarios eliminados exitosamente',
        'toggle_layout' => 'Alternar Diseño',
        'create' => 'Crear Usuario',
        'delete' => 'Eliminar Usuario',
        'associate' => 'Asociar Usuario',
        'bulk_delete' => 'Eliminar Seleccionados',
        'bulk_detach' => 'Desvincular Seleccionados',
        'impersonate' => 'Suplantar Usuario',
        'stop_impersonating' => 'Detener Suplantación',
        'block' => 'Bloquear',
        'unblock' => 'Desbloquear',
        'send_reset_link' => 'Enviar Enlace de Restablecimiento',
        'verify_email' => 'Verificar Email',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nombre',
            'placeholder' => 'Ingrese el nombre',
            'description' => 'nombre',
            'helper_text' => '',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Ingrese el email',
            'description' => 'email',
            'helper_text' => '',
<<<<<<< HEAD
            'tooltip' => '',
        ],
        'created_at' => [
            'label' => 'Fecha de Creación',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Última Modificación',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'role' => [
            'label' => 'Rol',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'active' => [
            'label' => 'Activo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'created_at' => [
            'label' => 'Fecha de Creación',
        ],
        'updated_at' => [
            'label' => 'Última Modificación',
        ],
        'role' => [
            'label' => 'Rol',
        ],
        'active' => 'Activo',
        'id' => [
            'label' => 'ID',
>>>>>>> 6ed19256f (.)
        ],
        'password' => [
            'label' => 'Contraseña',
            'placeholder' => 'Ingrese la contraseña',
            'description' => 'contraseña',
            'helper_text' => '',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'password_confirmation' => [
            'label' => 'Confirmar Contraseña',
            'placeholder' => 'Confirme la contraseña',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email_verified_at' => [
            'label' => 'Email Verificado el',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'email_verified_at' => [
            'label' => 'Email Verificado el',
>>>>>>> 6ed19256f (.)
        ],
        'current_password' => [
            'label' => 'Contraseña Actual',
            'placeholder' => 'Ingrese la contraseña actual',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'roles' => [
            'label' => 'Roles',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permisos',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'roles' => [
            'label' => 'Roles',
        ],
        'permissions' => [
            'label' => 'Permisos',
>>>>>>> 6ed19256f (.)
        ],
        'status' => [
            'label' => 'Estado',
            'options' => [
                'active' => 'Activo',
                'inactive' => 'Inactivo',
                'blocked' => 'Bloqueado',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_login' => [
            'label' => 'Último Inicio de Sesión',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'avatar' => [
            'label' => 'Avatar',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'language' => [
            'label' => 'Idioma',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'timezone' => [
            'label' => 'Zona Horaria',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_expires_at' => [
            'label' => 'Expiración de Contraseña',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'verified' => [
            'label' => 'Verificado',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'unverified' => [
            'label' => 'No Verificado',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'isActive' => [
            'label' => 'isActive',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'deactivate' => [
            'label' => 'deactivate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'detach' => [
            'label' => 'detach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attach' => [
            'label' => 'attach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'changePassword' => [
            'label' => 'changePassword',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'last_login' => [
            'label' => 'Último Inicio de Sesión',
        ],
        'avatar' => [
            'label' => 'Avatar',
        ],
        'language' => [
            'label' => 'Idioma',
        ],
        'timezone' => [
            'label' => 'Zona Horaria',
        ],
        'password_expires_at' => [
            'label' => 'Expiración de Contraseña',
        ],
        'verified' => [
            'label' => 'Verificado',
        ],
        'unverified' => [
            'label' => 'No Verificado',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'isActive' => [
            'label' => 'isActive',
        ],
        'deactivate' => [
            'label' => 'deactivate',
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'view' => [
            'label' => 'view',
        ],
        'create' => [
            'label' => 'create',
        ],
        'detach' => [
            'label' => 'detach',
        ],
        'attach' => [
            'label' => 'attach',
        ],
        'changePassword' => [
            'label' => 'changePassword',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'filters' => [
        'active_users' => 'Usuarios Activos',
        'creation_date' => 'Fecha de Creación',
        'date_from' => 'Desde',
        'date_to' => 'Hasta',
        'verified' => 'Usuarios Verificados',
        'unverified' => 'Usuarios No Verificados',
    ],
    'messages' => [
        'no_records' => 'No se encontraron usuarios',
        'loading' => 'Cargando usuarios...',
        'search' => 'Buscar usuarios...',
        'credentials_incorrect' => 'Las credenciales proporcionadas son incorrectas.',
        'created' => 'Usuario creado exitosamente',
        'updated' => 'Usuario actualizado exitosamente',
        'deleted' => 'Usuario eliminado exitosamente',
        'blocked' => 'Usuario bloqueado exitosamente',
        'unblocked' => 'Usuario desbloqueado exitosamente',
        'reset_link_sent' => 'Enlace de restablecimiento enviado',
        'email_verified' => 'Email verificado exitosamente',
        'impersonating' => 'Estás suplantando al usuario :name',
        'login_success' => 'Inicio de sesión exitoso',
        'validation_error' => 'Error de validación',
        'login_error' => 'Ocurrió un error durante el inicio de sesión. Por favor, inténtelo de nuevo más tarde.',
    ],
    'modals' => [
        'create' => [
            'heading' => 'Crear Usuario',
            'description' => 'Crear un nuevo registro de usuario',
            'actions' => [
                'submit' => 'Crear',
                'cancel' => 'Cancelar',
            ],
        ],
        'edit' => [
            'heading' => 'Editar Usuario',
            'description' => 'Modificar información del usuario',
            'actions' => [
                'submit' => 'Guardar Cambios',
                'cancel' => 'Cancelar',
            ],
        ],
        'delete' => [
            'heading' => 'Eliminar Usuario',
            'description' => '¿Está seguro de que desea eliminar este usuario?',
            'actions' => [
                'submit' => 'Eliminar',
                'cancel' => 'Cancelar',
            ],
        ],
        'associate' => [
            'heading' => 'Asociar Usuario',
            'description' => 'Seleccione un usuario para asociar',
            'actions' => [
                'submit' => 'Asociar',
                'cancel' => 'Cancelar',
            ],
        ],
        'detach' => [
            'heading' => 'Desvincular Usuario',
            'description' => '¿Está seguro de que desea desvincular este usuario?',
            'actions' => [
                'submit' => 'Desvincular',
                'cancel' => 'Cancelar',
            ],
        ],
        'bulk_delete' => [
            'heading' => 'Eliminar Usuarios Seleccionados',
            'description' => '¿Está seguro de que desea eliminar los usuarios seleccionados?',
            'actions' => [
                'submit' => 'Eliminar Seleccionados',
                'cancel' => 'Cancelar',
            ],
        ],
        'bulk_detach' => [
            'heading' => 'Desvincular Usuarios Seleccionados',
            'description' => '¿Está seguro de que desea desvincular los usuarios seleccionados?',
            'actions' => [
                'submit' => 'Desvincular Seleccionados',
                'cancel' => 'Cancelar',
            ],
        ],
    ],
    'navigation' => [
        'name' => 'Usuarios',
        'plural' => 'Usuarios',
        'group' => [
            'name' => 'Gestión de Usuarios',
            'description' => 'Gestión de usuarios y sus permisos',
        ],
        'label' => 'Usuarios',
        'sort' => '26',
        'icon' => 'user-main',
    ],
    'validation' => [
        'email_unique' => 'Este email ya está en uso',
        'password_min' => 'La contraseña debe tener al menos :min caracteres',
        'password_confirmed' => 'Las contraseñas no coinciden',
        'current_password' => 'La contraseña actual no es correcta',
    ],
    'permissions' => [
        'view_users' => 'Ver usuarios',
        'create_users' => 'Crear usuarios',
        'edit_users' => 'Editar usuarios',
        'delete_users' => 'Eliminar usuarios',
        'impersonate_users' => 'Suplantar usuarios',
        'manage_roles' => 'Gestionar roles',
    ],
    'model' => [
        'label' => 'Usuario',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
