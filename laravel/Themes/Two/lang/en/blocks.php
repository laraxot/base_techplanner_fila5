<?php

declare(strict_types=1);

return [
    'contact' => [
        'form' => [
            'title' => 'Request a Consultation',
            'subtitle' => 'Fill in the form and we will get back to you within 24 hours',
            'submit_label' => 'Send Request',
            'privacy_text' => 'By submitting this form you accept our Privacy Policy.',
            'required_note' => 'Fields marked with * are required.',
            'submit_aria' => 'Submit the contact form',
            'privacy_help' => 'You must accept the privacy policy to submit the form',
            'fields' => [
                'name' => [
                    'label' => 'Full Name',
                    'placeholder' => 'Enter your full name',
                    'help' => 'Enter your first and last name',
                ],
                'email' => [
                    'label' => 'Email',
                    'help' => 'Enter your email address',
                ],
                'phone' => [
                    'label' => 'Phone',
                    'help' => 'Enter your phone number',
                ],
                'studio' => [
                    'label' => 'Practice Name',
                    'placeholder' => 'Your practice name',
                    'help' => 'Enter the name of your professional practice',
                ],
                'type' => [
                    'label' => 'Practice Type',
                    'placeholder' => 'Select practice type',
                    'help' => 'Select the type of professional practice',
                ],
                'message' => [
                    'label' => 'Message',
                    'placeholder' => 'Describe your request...',
                    'help' => 'Describe your consultation request',
                ],
            ],
        ],
        'info' => [
            'title' => 'How to Contact Us',
            'subtitle' => 'Choose the most convenient way to reach us',
            'phone' => 'Phone',
            'mobile' => 'Mobile / WhatsApp',
            'email' => 'Email',
            'address' => 'Address',
            'hours' => 'Opening hours',
            'follow_social' => 'Follow us on social media',
            'linkedin_aria' => 'LinkedIn - Marco Sottana\'s LinkedIn profile',
            'facebook_aria' => 'Facebook - Marco Sottana\'s Facebook page',
        ],
    ],
    'sections' => [
        'map' => [
            'title' => 'Where We Are',
        ],
        'team' => [
            'title' => 'Our Team',
            'description' => 'Qualified experts at your service to ensure maximum safety.',
        ],
        'values' => [
            'title' => 'Our Values',
            'description' => 'The core principles that guide everything we do and every consultation.',
        ],
        'benefits' => [
            'title' => 'Why Choose Us',
            'description' => 'The concrete benefits of relying on our experience.',
        ],
        'company' => [
            'title' => 'Company Details',
        ],
    ],
    'map' => [
        'open_sr' => [
            'label' => 'Open :address on Google Maps',
        ],
        'open' => [
            'helper_text' => 'Open the location on Google Maps',
        ],
        'directions' => [
            'label' => 'Get Directions on Google Maps',
        ],
        'open_in_google' => [
            'label' => 'Open in Google Maps',
        ],
        'directions_short' => [
            'label' => 'Get Directions',
        ],
        'attribution' => [
            'label' => 'Map © :link contributors',
        ],
    ],
    'fields' => [
        'map' => [
            'alt' => 'Map: :address',
        ],
    ],
    'sectors' => [
        'badge' => [
            'label' => 'Specialized Sector',
        ],
        'focus_areas' => [
            'label' => 'Focus Areas:',
        ],
        'compliance' => [
            'label' => 'Compliance:',
        ],
    ],
    'cta' => [
        'banner' => [
            'primary' => 'Get started',
            'secondary' => 'Discover',
        ],
    ],
    'blog' => [
        'recent_articles' => [
            'label' => 'Recent Articles',
        ],
        'all_articles' => [
            'label' => 'All Articles',
        ],
        'featured_articles' => [
            'label' => 'Featured Articles',
        ],
        'read' => [
            'label' => 'Read',
        ],
        'read_article' => [
            'label' => 'Read Article',
        ],
        'view_all' => [
            'label' => 'View All Articles',
        ],
    ],
    'company' => [
        'pec' => [
            'label' => 'PEC (certified email)',
        ],
        'registered_office' => [
            'label' => 'Registered office',
        ],
    ],
    'resources' => [
        'download_pdf' => [
            'label' => 'Download PDF',
        ],
    ],
    'newsletter' => [
        'blog' => [
            'title' => 'Stay Updated',
            'description' => 'Subscribe to receive the latest articles and regulatory updates straight to your inbox.',
            'cta_label' => 'Subscribe to the Newsletter',
            'email_placeholder' => 'Your email',
            'privacy_note' => 'No spam, only quality content. You can unsubscribe at any time.',
        ],
        'form' => [
            'cta_label' => 'Subscribe',
            'email_placeholder' => 'Your business email',
        ],
    ],
    'sidebar' => [
        'system_active' => [
            'label' => 'System Active',
        ],
    ],
    'service_card' => [
        'status' => [
            'active' => 'Active',
            'inactive' => 'Unavailable',
            'maintenance' => 'Under maintenance',
        ],
        'featured' => [
            'label' => 'Featured',
        ],
        'access' => [
            'label' => 'Access',
            'aria_label' => 'Access the service: :title',
        ],
    ],
];
