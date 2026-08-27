<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;
<<<<<<< .merge_file_o2j97i

use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

describe('Template Management Business Logic', function (): void {
    test('template management needs model corrections', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$this->skipTest('Tests use incorrect model names (EmailTemplate instead of MailTemplate)');
=======

use Modules\Notify\Tests\TestCase;

uses(TestCase::class)->group('notify-db');

describe('Template Management Business Logic', function (): void {
    test('template management needs model corrections', function (): void {
        /** @var TestCase $this */
        $this->skipTest('Tests use incorrect model names (EmailTemplate instead of MailTemplate)');
>>>>>>> .merge_file_F9DqGN
    });
});
