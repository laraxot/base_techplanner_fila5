<?php

declare(strict_types=1);

return [
    'defaults' => [
        'service' => [
            'label' => 'Service',
        ],
    ],
    'header' => [
        'title' => [
            'title' => 'Book :service',
        ],
        'subtitle' => [
            'message' => 'Choose a date and time for your appointment',
        ],
    ],
    'steps' => [
        'date_time' => [
            'label' => 'Choose date and time',
        ],
        'personal_data' => [
            'label' => 'Personal details',
        ],
        'confirm' => [
            'label' => 'Confirm',
        ],
    ],
    'date' => [
        'select' => [
            'label' => 'Select the date',
        ],
    ],
    'time' => [
        'select' => [
            'label' => 'Select the time',
        ],
        'unavailable' => [
            'label' => 'Unavail.',
        ],
    ],
    'summary' => [
        'selected' => [
            'title' => 'Selected appointment:',
        ],
        'at' => [
            'label' => 'at',
        ],
    ],
    'actions' => [
        'confirm' => [
            'label' => 'Confirm booking',
        ],
    ],
    'form' => [
        'first_name' => [
            'label' => 'First name *',
        ],
        'last_name' => [
            'label' => 'Last name *',
        ],
        'email' => [
            'label' => 'Email *',
        ],
        'phone' => [
            'label' => 'Phone *',
        ],
        'fiscal_code' => [
            'label' => 'Tax code',
        ],
        'notes' => [
            'label' => 'Additional notes',
            'placeholder' => 'Enter any notes or specific requests...',
        ],
    ],
    'recap' => [
        'title' => [
            'title' => 'Booking summary',
        ],
        'appointment' => [
            'title' => 'Appointment details',
        ],
        'service' => [
            'label' => 'Service:',
        ],
        'datetime' => [
            'label' => 'Date and time:',
        ],
        'name' => [
            'label' => 'Name:',
        ],
        'email' => [
            'label' => 'Email:',
        ],
        'phone' => [
            'label' => 'Phone:',
        ],
        'cost' => [
            'label' => 'Cost:',
        ],
    ],
    'consent' => [
        'prefix' => [
            'label' => 'I accept the',
        ],
        'terms' => [
            'label' => 'terms of service',
        ],
        'conjunction' => [
            'label' => 'and the ',
        ],
        'privacy' => [
            'label' => 'privacy policy',
        ],
    ],
    'notice' => [
        'note' => [
            'label' => 'Note:',
        ],
        'confirmation' => [
            'message' => 'You will receive a confirmation by email and SMS. You can cancel the booking up to 24 hours before the appointment.',
        ],
    ],
    'loading' => [
        'progress' => [
            'title' => 'Booking in progress...',
            'message' => 'We are processing your request',
        ],
    ],
    'success' => [
        'confirmed' => [
            'title' => 'Booking confirmed!',
            'message' => 'We have sent you an email with all the appointment details.',
        ],
    ],
    'validation' => [
        'email' => [
            'message' => 'Enter a valid email address',
        ],
        'fiscal_code' => [
            'message' => 'The tax code must have 16 characters',
        ],
    ],
];
