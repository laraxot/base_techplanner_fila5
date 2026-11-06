<?php

declare(strict_types=1);

return [
    // Common
    'next' => 'Next',
    'back' => 'Back',
    'submit' => 'Submit',
    'required' => 'required',
    'max_chars' => 'Max :max characters',

    // Privacy step
    'privacy' => [
        'title' => 'Privacy notice',
        'description' => 'Read the privacy notice before proceeding',
        'details' => 'For details on personal data processing, see the ',
        'link_label' => 'privacy policy.',
        'accept_label' => 'I have read and understood the privacy policy',
    ],

    // Dati step
    'dati' => [
        'title' => 'Report details',
        'place_label' => 'Location of issue',
        'place_placeholder' => 'e.g. Via Roma 1, Florence',
        'details_label' => 'Issue details',
        'type_label' => 'Issue type*',
        'type_select' => 'Select...',
        'types' => [
            'verde' => 'Public greenery and urban furniture',
            'illuminazione' => 'Public lighting',
            'strade' => 'Road maintenance',
            'rifiuti' => 'Waste management',
            'altro' => 'Other',
        ],
        'title_label' => 'Title',
        'title_placeholder' => 'Brief description of the issue',
        'description_label' => 'Description*',
        'description_placeholder' => 'Describe the issue...',
        'images_label' => 'Images',
        'images_hint' => 'Select one or more images',
        'no_file' => 'No file selected',
    ],

    // Riepilogo step
    'riepilogo' => [
        'title' => 'Report summary',
        'warning_title' => 'Warning',
        'warning_text' => 'The information provided has the value of a declaration. Please verify it is correct.',
        'disservizio_section' => 'Issue',
        'contacts_section' => 'Contacts',
        'terms_label' => 'I confirm the information is true and accept the',
        'terms_link' => 'terms of service',
        'submit_label' => 'Submit report',
    ],

    // Conferma step
    'conferma' => [
        'title' => 'Report submitted',
        'subtitle' => 'Thank you, we have received your <strong>report :code.</strong>',
        'visibility' => 'It will be visible on the <a href=":url" class="t-primary">list of all reports</a> once taken over by the administration.',
        'email_sent' => 'We have sent the summary to email:<br><strong>:email</strong>',
        'download_receipt' => 'Download receipt (PDF 100KB)',
        'consult_request' => 'View request',
        'in_area' => 'in your reserved area',
        'related_services' => 'Related services',
    ],

    // Elenco
    'elenco' => [
        'title' => 'Reports list',
        'subtitle' => 'In the last 12 months, :count reports have been resolved.',
        'results' => ':count Results',
        'map_tab' => 'Map',
        'list_tab' => 'List',
        'make_report_title' => 'Make a report',
        'make_report_text' => 'If you want to add a report, you can do so after authenticating with your SPID or CIE credentials.',
        'make_report_btn' => 'Report issue',
        'load_more' => 'Load more reports',
        'rating_question' => 'How easy was it to use this service?',
        'rating_legend' => 'Rate from 1 to 5 stars',
    ],

    'filters' => [
        'legend' => ['label' => 'category'],
    ],
    'filter' => [
        'button' => ['label' => 'Filter'],
        'remove' => ['label' => 'Remove all filters'],
    ],
    'results' => [
        'count' => ['text' => ':count Results'],
        'empty' => 'No reports match the selected filters.',
    ],
    'card' => [
        'type' => ['label' => 'Report type'],
        'expand' => ['button' => ['label' => 'Show all']],
        'address' => ['label' => 'Address'],
        'detail' => ['label' => 'Detail'],
        'images' => ['label' => 'Images'],
        'no_images' => ['label' => 'No images at the moment'],
        'edit' => ['label' => 'Edit'],
    ],
    'map' => [
        'image' => ['alt' => 'Map of public reports'],
        'cta' => [
            'title' => 'Make a report',
            'text' => 'Report an issue to the Municipality after logging in.',
            'button' => 'Report issue',
        ],
    ],

    // Contacts
    'contacts' => [
        'title' => 'Contact the Municipality',
        'faq' => 'Read the FAQ',
        'assistance' => 'Request assistance',
        'phone' => 'Call the toll-free number 05 0505',
        'appointment' => 'Book appointment',
    ],
];