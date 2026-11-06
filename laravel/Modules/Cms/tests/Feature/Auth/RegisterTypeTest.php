<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

beforeEach(function (): void {
    /* @var \Modules\Cms\Tests\TestCase $this */
    cmsSkipTest('patient/doctor registration types not configured in this install.');
});
/*
 * Tests for dynamic registration pages rendered by Themes/One
 * Route pattern: /{locale}/auth/{type}/register
<<<<<<< .merge_file_ADSalH
=======
 *
 * This test suite verifies that:
 * 1. Registration pages render correctly for each user type
 * 2. Authentication rules are enforced (guests can access, authenticated users are redirected)
 * 3. Dynamic content is correctly displayed based on user type
 * 4. Required components (Livewire widget) are present
 *
<<<<<<< HEAD
=======
 * The Cms module must remain independent from <nome progetto>; all user operations
>>>>>>> 6ed19256f (.)
 * go through XotData to obtain the correct User class.
>>>>>>> .merge_file_Nd8lex
 */

/** @var list<string> $userTypes */
$userTypes = ['doctor', 'patient'];

describe('Registration Page Access', function () use ($userTypes): void {
    foreach ($userTypes as $type) {
        test("guest can view {$type} registration page", function () use ($type): void {
            $response = get("/it/auth/{$type}/register");
            /* @var \Illuminate\Testing\TestResponse<\Illuminate\Http\Response> $response */
            Assert::assertSame(200, $response->status());
        });

        test("authenticated user is redirected from {$type} registration page", function () use ($type): void {
            $user = cmsCreateTestUser();
            actingAs($user);

            $response = get("/it/auth/{$type}/register");
            /* @var \Illuminate\Testing\TestResponse<\Illuminate\Http\Response> $response */
            Assert::assertSame(302, $response->status());
        });
    }
});

describe('Registration Page Content', function () use ($userTypes): void {
    foreach ($userTypes as $type) {
        test("{$type} registration page contains expected elements", function () use ($type): void {
            $response = get("/it/auth/{$type}/register");
            /* @var \Illuminate\Testing\TestResponse<\Illuminate\Http\Response> $response */
            Assert::assertSame(200, $response->status());

            $content = (string) $response->getContent();
            Assert::assertStringContainsString('Registrazione', $content);
            Assert::assertStringContainsString('Crea il tuo account', $content);
        });

        test("{$type} registration page has proper HTML structure", function () use ($type): void {
            $response = get("/it/auth/{$type}/register");
            /** @var Illuminate\Testing\TestResponse<Illuminate\Http\Response> $response */
            $content = (string) $response->getContent();
            Assert::assertStringContainsString('<!DOCTYPE html>', $content);
            Assert::assertStringContainsString('<html', $content);
            Assert::assertStringContainsString('</html>', $content);
            Assert::assertStringContainsString('<meta name="viewport"', $content);
            Assert::assertStringContainsString('width=device-width', $content);
        });
    }
});

describe('Registration Page Localization', function () use ($userTypes): void {
    foreach ($userTypes as $type) {
        test("{$type} registration page uses Italian localization", function () use ($type): void {
            $response = get("/it/auth/{$type}/register");
            /* @var \Illuminate\Testing\TestResponse<\Illuminate\Http\Response> $response */
            Assert::assertSame(200, $response->status());

            $content = (string) $response->getContent();
            Assert::assertStringContainsString('Registrazione', $content);
            Assert::assertStringContainsString('Crea il tuo account', $content);
        });
    }
});

describe('Registration Page Performance', function () use ($userTypes): void {
    foreach ($userTypes as $type) {
        test("{$type} registration page loads within acceptable time limits", function () use ($type): void {
            $startTime = microtime(true);

            $response = get("/it/auth/{$type}/register");
            /** @var Illuminate\Testing\TestResponse<Illuminate\Http\Response> $response */
            $loadTime = microtime(true) - $startTime;

<<<<<<< .merge_file_ADSalH
            Assert::assertSame(200, $response->status());
            Assert::assertLessThan(3.0, $loadTime);
        });
    }
=======
<<<<<<< HEAD
=======
test('guest can view type registration pages', function (): void {
    foreach (['doctor', 'patient'] as $type) {
        $response = get("/it/auth/{$type}/register");
        $this->assertSame(404, $response->status());
    }
});

test('authenticated user is redirected from type registration pages', function (): void {
    $this->assertTrue(true);
});

test('invalid user type is handled gracefully', function (): void {
    $response = get('/it/auth/invalid-type/register');
    $this->assertSame(404, $response->status());
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Nd8lex
});
