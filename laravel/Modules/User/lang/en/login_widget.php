<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
<<<<<<< HEAD
            'label' => 'Email',
            'placeholder' => 'Enter your email',
            'help' => 'Enter the email address you used to register',
            'description' => 'Email address for login',
            'helper_text' => 'email',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'label' => 'Email address',
            'placeholder' => 'name@example.com',
            'helper_text' => 'Email used to register for online services',
            'tooltip' => 'Enter your account email',
            'description' => 'Email field for authentication',
>>>>>>> dev
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Enter your password',
<<<<<<< HEAD
            'help' => 'Enter your account password',
            'description' => 'Password for login',
            'helper_text' => 'password',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'remember' => [
            'label' => 'Remember me',
            'placeholder' => 'Keep session active',
            'help' => 'Select to keep your session active for 30 days',
            'description' => 'Option to remember login',
            'helper_text' => 'remember',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Login',
            'tooltip' => 'Click to access your account',
        ],
    ],
    'messages' => [
        'login_success' => 'Login successful',
        'login_error' => 'Error during login',
        'validation_error' => 'Validation error',
        'credentials_incorrect' => 'Incorrect credentials',
    ],
    'ui' => [
        'login_button' => 'Login',
        'forgot_password' => 'Forgot password?',
        'errors_title' => 'Some errors occurred',
    ],
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'tooltip' => 'Account password',
            'description' => 'Password field for authentication',
        ],
        'remember' => [
            'label' => 'Remember me',
            'placeholder' => '',
            'helper_text' => 'Keep me signed in on this device',
            'tooltip' => 'Extended session',
            'description' => 'Remember login option',
        ],
    ],
    'actions' => [
        'hidePassword' => [
            'label' => 'Hide password',
            'tooltip' => 'Hide password',
            'icon' => 'hidePassword',
        ],
        'showPassword' => [
            'label' => 'Show password',
            'tooltip' => 'Show password',
            'icon' => 'showPassword',
        ],
    ],
>>>>>>> dev
];
