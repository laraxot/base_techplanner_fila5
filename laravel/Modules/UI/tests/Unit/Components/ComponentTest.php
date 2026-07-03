<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Unit\Components;

use Illuminate\View\Component;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Component', function (): void {
    test('ui components can be rendered', function (): void {
        $component = new class extends Component {
            public function render(): \Illuminate\Contracts\View\View
            {
                return view('ui::components.ui.button');
            }
        };

        Assert::assertInstanceOf(Component::class, $component);
    });

    test('ui button component has correct attributes', function (): void {
        Assert::assertInstanceOf(\Illuminate\Contracts\View\View::class, view('ui::components.ui.button'));
    });

    test('ui card component renders content', function (): void {
        $view = view('ui::components.ui.card', [
            'title' => 'Test Card',
            'content' => 'Test Content',
        ]);

        $html = (string) $view->render();
        Assert::assertStringContainsString('Test Card', $html);
        Assert::assertStringContainsString('Test Content', $html);
    });
=======

test('ui components can be rendered', function () {
    $component = new class extends Component {
        public function render()
        {
            return view('ui::components.ui.button');
        }
    };

    expect($component)->toBeInstanceOf(Component::class);
});

test('ui button component has correct attributes', function () {
    $view = view('ui::components.ui.button', [
        'type' => 'primary',
        'size' => 'md',
        'disabled' => false,
    ]);

    expect($view->render())->toContain('btn')->toContain('btn-primary');
});

test('ui card component renders content', function () {
    $view = view('ui::components.ui.card', [
        'title' => 'Test Card',
        'content' => 'Test Content',
    ]);

    expect($view->render())->toContain('Test Card')->toContain('Test Content');
>>>>>>> c001364 (.)
});
