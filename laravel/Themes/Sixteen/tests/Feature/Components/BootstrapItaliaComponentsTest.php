<?php

declare(strict_types=1);

namespace Themes\Sixteen\Tests\Feature\Components;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\View\Component;
use Tests\TestCase;

/**
 * Test Suite for Bootstrap Italia Components
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> 4b6b99016 (first commit)
=======
 *
>>>>>>> dev
 * Tests all newly implemented Bootstrap Italia components for:
 * - Component rendering without errors
 * - Proper HTML structure and classes
 * - Accessibility attributes (ARIA, roles)
 * - Props handling and defaults
 * - Responsive behavior
 */
class BootstrapItaliaComponentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Skiplinks component rendering and accessibility
     */
    public function test_skiplinks_component_renders_correctly(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.skiplinks', [
            'links' => [
                ['label' => 'Vai al contenuto', 'href' => '#content'],
<<<<<<< HEAD
<<<<<<< HEAD
                ['label' => 'Vai al menu', 'href' => '#navigation'],
            ],
=======
                ['label' => 'Vai al menu', 'href' => '#navigation']
            ]
>>>>>>> 4b6b99016 (first commit)
=======
                ['label' => 'Vai al menu', 'href' => '#navigation'],
            ],
>>>>>>> dev
        ]);

        $view->assertSee('skiplinks');
        $view->assertSee('Vai al contenuto');
        $view->assertSee('#content');
        $view->assertSee('screen reader');
    }

    /**
     * Test Cookiebar component GDPR compliance features
     */
    public function test_cookiebar_component_has_gdpr_features(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.cookiebar', [
            'acceptText' => 'Accetta tutti',
            'rejectText' => 'Rifiuta tutti',
<<<<<<< HEAD
<<<<<<< HEAD
            'customizeText' => 'Personalizza',
=======
            'customizeText' => 'Personalizza'
>>>>>>> 4b6b99016 (first commit)
=======
            'customizeText' => 'Personalizza',
>>>>>>> dev
        ]);

        $view->assertSee('cookiebar');
        $view->assertSee('Accetta tutti');
        $view->assertSee('Rifiuta tutti');
        $view->assertSee('Personalizza');
        $view->assertSee('role="alert"');
    }

    /**
     * Test Hero component variants
     */
    public function test_hero_component_variants(): void
    {
        // Test text variant
        $textHero = $this->view('pub_theme::bootstrap-italia.hero', [
            'type' => 'text',
            'title' => 'Hero Title',
<<<<<<< HEAD
<<<<<<< HEAD
            'subtitle' => 'Hero Subtitle',
=======
            'subtitle' => 'Hero Subtitle'
>>>>>>> 4b6b99016 (first commit)
=======
            'subtitle' => 'Hero Subtitle',
>>>>>>> dev
        ]);

        $textHero->assertSee('hero-text');
        $textHero->assertSee('Hero Title');
        $textHero->assertSee('Hero Subtitle');

        // Test image variant
        $imageHero = $this->view('pub_theme::bootstrap-italia.hero', [
            'type' => 'image',
            'image' => '/images/hero.jpg',
<<<<<<< HEAD
<<<<<<< HEAD
            'imageAlt' => 'Hero Image',
=======
            'imageAlt' => 'Hero Image'
>>>>>>> 4b6b99016 (first commit)
=======
            'imageAlt' => 'Hero Image',
>>>>>>> dev
        ]);

        $imageHero->assertSee('hero-image');
        $imageHero->assertSee('/images/hero.jpg');
        $imageHero->assertSee('Hero Image');
    }

    /**
     * Test Badge component with different variants
     */
    public function test_badge_component_variants(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.badge', [
            'variant' => 'primary',
            'text' => 'Badge Text',
<<<<<<< HEAD
<<<<<<< HEAD
            'pill' => false,
=======
            'pill' => false
>>>>>>> 4b6b99016 (first commit)
=======
            'pill' => false,
>>>>>>> dev
        ]);

        $view->assertSee('badge');
        $view->assertSee('badge-primary');
        $view->assertSee('Badge Text');
        $view->assertDontSee('rounded-pill');
    }

    /**
     * Test Accordion component accessibility and structure
     */
    public function test_accordion_component_accessibility(): void
    {
        $items = [
            [
                'id' => 'accordion-1',
                'title' => 'First Item',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                'content' => 'First content',
            ],
            [
                'id' => 'accordion-2',
                'title' => 'Second Item',
                'content' => 'Second content',
            ],
        ];

        $view = $this->view('pub_theme::bootstrap-italia.accordion', [
            'items' => $items,
<<<<<<< HEAD
=======
                'content' => 'First content'
            ],
            [
                'id' => 'accordion-2', 
                'title' => 'Second Item',
                'content' => 'Second content'
            ]
        ];

        $view = $this->view('pub_theme::bootstrap-italia.accordion', [
            'items' => $items
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ]);

        $view->assertSee('accordion');
        $view->assertSee('First Item');
        $view->assertSee('Second Item');
        $view->assertSee('aria-expanded');
        $view->assertSee('role="button"');
    }

    /**
     * Test Select component options and accessibility
     */
    public function test_select_component_options(): void
    {
        $options = [
            'option1' => 'Option 1',
            'option2' => 'Option 2',
<<<<<<< HEAD
<<<<<<< HEAD
            'option3' => 'Option 3',
=======
            'option3' => 'Option 3'
>>>>>>> 4b6b99016 (first commit)
=======
            'option3' => 'Option 3',
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.select', [
            'name' => 'test_select',
            'options' => $options,
            'label' => 'Select Label',
<<<<<<< HEAD
<<<<<<< HEAD
            'placeholder' => 'Choose an option',
=======
            'placeholder' => 'Choose an option'
>>>>>>> 4b6b99016 (first commit)
=======
            'placeholder' => 'Choose an option',
>>>>>>> dev
        ]);

        $view->assertSee('form-select');
        $view->assertSee('Select Label');
        $view->assertSee('Choose an option');
        $view->assertSee('Option 1');
        $view->assertSee('Option 2');
        $view->assertSee('Option 3');
    }

    /**
     * Test Radio Button component grouping and accessibility
     */
    public function test_radio_component_grouping(): void
    {
        $radios = [
            [
                'id' => 'radio1',
                'value' => 'value1',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                'label' => 'Radio 1',
            ],
            [
                'id' => 'radio2',
                'value' => 'value2',
                'label' => 'Radio 2',
            ],
<<<<<<< HEAD
=======
                'label' => 'Radio 1'
            ],
            [
                'id' => 'radio2',
                'value' => 'value2', 
                'label' => 'Radio 2'
            ]
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.radio', [
            'radios' => $radios,
            'name' => 'test_radio',
<<<<<<< HEAD
<<<<<<< HEAD
            'legend' => 'Radio Group',
=======
            'legend' => 'Radio Group'
>>>>>>> 4b6b99016 (first commit)
=======
            'legend' => 'Radio Group',
>>>>>>> dev
        ]);

        $view->assertSee('fieldset');
        $view->assertSee('Radio Group');
        $view->assertSee('Radio 1');
        $view->assertSee('Radio 2');
        $view->assertSee('type="radio"');
    }

    /**
     * Test Upload component drag and drop features
     */
    public function test_upload_component_features(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.upload', [
            'name' => 'file_upload',
            'label' => 'Upload File',
            'multiple' => true,
<<<<<<< HEAD
<<<<<<< HEAD
            'accept' => '.pdf,.doc,.docx',
=======
            'accept' => '.pdf,.doc,.docx'
>>>>>>> 4b6b99016 (first commit)
=======
            'accept' => '.pdf,.doc,.docx',
>>>>>>> dev
        ]);

        $view->assertSee('upload');
        $view->assertSee('Upload File');
        $view->assertSee('multiple');
        $view->assertSee('.pdf,.doc,.docx');
        $view->assertSee('drag');
    }

    /**
     * Test Toggle component states
     */
    public function test_toggle_component_states(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.toggle', [
            'name' => 'test_toggle',
            'label' => 'Toggle Label',
<<<<<<< HEAD
<<<<<<< HEAD
            'checked' => true,
=======
            'checked' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'checked' => true,
>>>>>>> dev
        ]);

        $view->assertSee('toggles');
        $view->assertSee('lever');
        $view->assertSee('Toggle Label');
        $view->assertSee('checked');
    }

    /**
     * Test Megamenu component structure and navigation
     */
    public function test_megamenu_component_structure(): void
    {
        $columns = [
            [
                'title' => 'Category 1',
                'links' => [
                    ['label' => 'Link 1', 'url' => '/link1'],
<<<<<<< HEAD
<<<<<<< HEAD
                    ['label' => 'Link 2', 'url' => '/link2'],
                ],
            ],
=======
                    ['label' => 'Link 2', 'url' => '/link2']
                ]
            ]
>>>>>>> 4b6b99016 (first commit)
=======
                    ['label' => 'Link 2', 'url' => '/link2'],
                ],
            ],
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.megamenu', [
            'title' => 'Megamenu',
<<<<<<< HEAD
<<<<<<< HEAD
            'columns' => $columns,
=======
            'columns' => $columns
>>>>>>> 4b6b99016 (first commit)
=======
            'columns' => $columns,
>>>>>>> dev
        ]);

        $view->assertSee('megamenu');
        $view->assertSee('Category 1');
        $view->assertSee('Link 1');
        $view->assertSee('Link 2');
        $view->assertSee('dropdown-toggle');
    }

    /**
     * Test Sidebar component navigation and accessibility
     */
    public function test_sidebar_component_navigation(): void
    {
        $links = [
            [
                'label' => 'Home',
                'url' => '/',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
                'active' => true,
            ],
            [
                'label' => 'Services',
                'url' => '/services',
            ],
<<<<<<< HEAD
=======
                'active' => true
            ],
            [
                'label' => 'Services', 
                'url' => '/services'
            ]
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.sidebar', [
            'title' => 'Navigation',
<<<<<<< HEAD
<<<<<<< HEAD
            'links' => $links,
=======
            'links' => $links
>>>>>>> 4b6b99016 (first commit)
=======
            'links' => $links,
>>>>>>> dev
        ]);

        $view->assertSee('sidebar-wrapper');
        $view->assertSee('Navigation');
        $view->assertSee('Home');
        $view->assertSee('Services');
        $view->assertSee('active');
    }

    /**
     * Test BottomNav component mobile optimization
     */
    public function test_bottom_nav_component_mobile(): void
    {
        $items = [
            [
                'label' => 'Home',
                'url' => '/',
<<<<<<< HEAD
<<<<<<< HEAD
                'icon' => 'it-home',
=======
                'icon' => 'it-home'
>>>>>>> 4b6b99016 (first commit)
=======
                'icon' => 'it-home',
>>>>>>> dev
            ],
            [
                'label' => 'Settings',
                'url' => '/settings',
<<<<<<< HEAD
<<<<<<< HEAD
                'icon' => 'it-settings',
            ],
=======
                'icon' => 'it-settings'
            ]
>>>>>>> 4b6b99016 (first commit)
=======
                'icon' => 'it-settings',
            ],
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.bottom-nav', [
            'items' => $items,
<<<<<<< HEAD
<<<<<<< HEAD
            'fixed' => true,
=======
            'fixed' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'fixed' => true,
>>>>>>> dev
        ]);

        $view->assertSee('bottom-nav');
        $view->assertSee('fixed-bottom');
        $view->assertSee('Home');
        $view->assertSee('Settings');
        $view->assertSee('it-home');
        $view->assertSee('it-settings');
    }

    /**
     * Test Progress Indicators component variants
     */
    public function test_progress_indicators_variants(): void
    {
        // Test spinner
        $spinner = $this->view('pub_theme::bootstrap-italia.progress-indicators', [
            'type' => 'spinner',
            'active' => true,
<<<<<<< HEAD
<<<<<<< HEAD
            'size' => 'lg',
=======
            'size' => 'lg'
>>>>>>> 4b6b99016 (first commit)
=======
            'size' => 'lg',
>>>>>>> dev
        ]);

        $spinner->assertSee('progress-spinner');
        $spinner->assertSee('progress-spinner-active');
        $spinner->assertSee('size-lg');

        // Test progress bar
        $progressBar = $this->view('pub_theme::bootstrap-italia.progress-indicators', [
            'type' => 'bar',
            'value' => 0.75,
<<<<<<< HEAD
<<<<<<< HEAD
            'showLabel' => true,
=======
            'showLabel' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'showLabel' => true,
>>>>>>> dev
        ]);

        $progressBar->assertSee('progress-bar');
        $progressBar->assertSee('75%');
    }

    /**
     * Test Notifiche component states and functionality
     */
    public function test_notifiche_component_states(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.notifiche', [
            'title' => 'Test Notification',
            'message' => 'This is a test message',
            'type' => 'success',
<<<<<<< HEAD
<<<<<<< HEAD
            'dismissible' => true,
=======
            'dismissible' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'dismissible' => true,
>>>>>>> dev
        ]);

        $view->assertSee('notification');
        $view->assertSee('success');
        $view->assertSee('Test Notification');
        $view->assertSee('This is a test message');
        $view->assertSee('btn-close');
        $view->assertSee('it-check-circle');
    }

    /**
     * Test Rating component interactivity and accessibility
     */
    public function test_rating_component_accessibility(): void
    {
        $view = $this->view('pub_theme::bootstrap-italia.rating', [
            'name' => 'test_rating',
            'legend' => 'Rate this service',
            'value' => 4,
<<<<<<< HEAD
<<<<<<< HEAD
            'showLabel' => true,
=======
            'showLabel' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'showLabel' => true,
>>>>>>> dev
        ]);

        $view->assertSee('rating');
        $view->assertSee('fieldset');
        $view->assertSee('Rate this service');
        $view->assertSee('type="radio"');
        $view->assertSee('it-star-full');
        $view->assertSee('4 stelle');
    }

    /**
     * Test Tab component navigation and content switching
     */
    public function test_tab_component_structure(): void
    {
        $tabs = [
            'tab1' => [
                'label' => 'Tab 1',
<<<<<<< HEAD
<<<<<<< HEAD
                'content' => 'Content 1',
=======
                'content' => 'Content 1'
>>>>>>> 4b6b99016 (first commit)
=======
                'content' => 'Content 1',
>>>>>>> dev
            ],
            'tab2' => [
                'label' => 'Tab 2',
                'content' => 'Content 2',
<<<<<<< HEAD
<<<<<<< HEAD
                'icon' => 'it-settings',
            ],
=======
                'icon' => 'it-settings'
            ]
>>>>>>> 4b6b99016 (first commit)
=======
                'icon' => 'it-settings',
            ],
>>>>>>> dev
        ];

        $view = $this->view('pub_theme::bootstrap-italia.tab', [
            'tabs' => $tabs,
<<<<<<< HEAD
<<<<<<< HEAD
            'activeTab' => 'tab1',
=======
            'activeTab' => 'tab1'
>>>>>>> 4b6b99016 (first commit)
=======
            'activeTab' => 'tab1',
>>>>>>> dev
        ]);

        $view->assertSee('nav-tabs');
        $view->assertSee('tab-content');
        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content 1');
        $view->assertSee('Content 2');
        $view->assertSee('it-settings');
        $view->assertSee('active');
    }

    /**
     * Test component responsiveness across breakpoints
     */
    public function test_components_responsiveness(): void
    {
        // Test that components include responsive classes
        $bottomNav = $this->view('pub_theme::bootstrap-italia.bottom-nav', [
            'items' => [['label' => 'Home', 'url' => '/']],
<<<<<<< HEAD
<<<<<<< HEAD
            'hiddenOnDesktop' => true,
=======
            'hiddenOnDesktop' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'hiddenOnDesktop' => true,
>>>>>>> dev
        ]);

        $bottomNav->assertSee('d-lg-none');

        $megamenu = $this->view('pub_theme::bootstrap-italia.megamenu', [
            'title' => 'Menu',
<<<<<<< HEAD
<<<<<<< HEAD
            'fullWidth' => true,
=======
            'fullWidth' => true
>>>>>>> 4b6b99016 (first commit)
=======
            'fullWidth' => true,
>>>>>>> dev
        ]);

        $megamenu->assertSee('full-width');
    }

    /**
     * Test components accessibility compliance
     */
    public function test_components_accessibility_compliance(): void
    {
        // Test that key components have proper ARIA attributes
        $accordion = $this->view('pub_theme::bootstrap-italia.accordion', [
            'items' => [
<<<<<<< HEAD
<<<<<<< HEAD
                ['id' => 'test', 'title' => 'Test', 'content' => 'Content'],
            ],
=======
                ['id' => 'test', 'title' => 'Test', 'content' => 'Content']
            ]
>>>>>>> 4b6b99016 (first commit)
=======
                ['id' => 'test', 'title' => 'Test', 'content' => 'Content'],
            ],
>>>>>>> dev
        ]);

        $accordion->assertSee('aria-expanded');
        $accordion->assertSee('aria-controls');

        $skiplinks = $this->view('pub_theme::bootstrap-italia.skiplinks');
        $skiplinks->assertSee('Salta al contenuto');
        $skiplinks->assertSee('screen reader');
    }

    /**
     * Test component prop validation and defaults
     */
    public function test_component_prop_defaults(): void
    {
        // Test default props are applied correctly
        $badge = $this->view('pub_theme::bootstrap-italia.badge');
        $badge->assertSee('badge');

        $rating = $this->view('pub_theme::bootstrap-italia.rating', [
<<<<<<< HEAD
<<<<<<< HEAD
            'name' => 'default_rating',
=======
            'name' => 'default_rating'
>>>>>>> 4b6b99016 (first commit)
=======
            'name' => 'default_rating',
>>>>>>> dev
        ]);
        $rating->assertSee('rating');
        $rating->assertSee('Rating');
    }

    /**
     * Integration test for complete form with Bootstrap Italia components
     */
    public function test_complete_form_integration(): void
    {
        $view = $this->view('tests.bootstrap-italia-form-integration');

        // Should contain multiple Bootstrap Italia components
        $view->assertSee('form-select'); // Select component
        $view->assertSee('type="radio"'); // Radio component
<<<<<<< HEAD
<<<<<<< HEAD
        $view->assertSee('toggles'); // Toggle component
=======
        $view->assertSee('toggles'); // Toggle component  
>>>>>>> 4b6b99016 (first commit)
=======
        $view->assertSee('toggles'); // Toggle component
>>>>>>> dev
        $view->assertSee('upload'); // Upload component
        $view->assertSee('rating'); // Rating component
    }

    /**
     * Performance test for component rendering
     */
    public function test_component_rendering_performance(): void
    {
        $startTime = microtime(true);

        // Render multiple components
        $this->view('pub_theme::bootstrap-italia.hero', [
            'type' => 'text',
<<<<<<< HEAD
<<<<<<< HEAD
            'title' => 'Performance Test',
=======
            'title' => 'Performance Test'
>>>>>>> 4b6b99016 (first commit)
=======
            'title' => 'Performance Test',
>>>>>>> dev
        ]);

        $this->view('pub_theme::bootstrap-italia.accordion', [
            'items' => array_fill(0, 10, [
                'id' => 'perf-test',
                'title' => 'Performance Item',
<<<<<<< HEAD
<<<<<<< HEAD
                'content' => 'Performance content',
            ]),
=======
                'content' => 'Performance content'
            ])
>>>>>>> 4b6b99016 (first commit)
=======
                'content' => 'Performance content',
            ]),
>>>>>>> dev
        ]);

        $endTime = microtime(true);
        $renderTime = $endTime - $startTime;

        // Should render in reasonable time (< 1 second)
        $this->assertLessThan(1.0, $renderTime, 'Component rendering took too long');
    }
}
