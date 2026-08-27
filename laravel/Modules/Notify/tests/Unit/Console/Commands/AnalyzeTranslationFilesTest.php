<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console\Commands;
<<<<<<< .merge_file_weQzMV
=======

>>>>>>> .merge_file_T1ZmGT
use Illuminate\Console\Command;
use Modules\Notify\Console\Commands\AnalyzeTranslationFiles;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_1L0dNc
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_weQzMV

uses(\Modules\Notify\Tests\TestCase::class);
=======
>>>>>>> .merge_file_l5jVN6
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_T1ZmGT

describe('AnalyzeTranslationFiles', function () {
    it('has correct signature', function () {
        $command = new AnalyzeTranslationFiles();

        Assert::assertSame('notify:analyze-translations', $command->getName());
    });

    it('has description', function () {
        $command = new AnalyzeTranslationFiles();

        Assert::assertNotEmpty($command->getDescription());
    });

    it('extends command', function () {
        $command = new AnalyzeTranslationFiles();

        Assert::assertInstanceOf(Command::class, $command);
    });

    it('has handle method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });

    it('has flatten array method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('flattenArray'));
    });

    it('has analyze structure patterns method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('analyzeStructurePatterns'));
    });

    it('has generate consistency report method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('generateConsistencyReport'));
    });

    it('has generate recommendations method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('generateRecommendations'));
    });

    it('has analyze navigation structure method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('analyzeNavigationStructure'));
    });

    it('flatten array handles nested arrays', function () {
        $command = new AnalyzeTranslationFiles();

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = [
            'parent' => [
                'child1' => 'value1',
                'child2' => 'value2',
            ],
        ];

<<<<<<< .merge_file_weQzMV
        $result = \assertNotifyArray($method->invoke($command, $input));
=======
        $result = XotBasePest::assertArray($method->invoke($command, $input));
>>>>>>> .merge_file_T1ZmGT

        Assert::assertArrayHasKey('parent.child1', $result);
        Assert::assertArrayHasKey('parent.child2', $result);
        Assert::assertSame('value1', $result['parent.child1']);
    });

    it('flatten array handles empty array', function () {
        $command = new AnalyzeTranslationFiles();

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

<<<<<<< .merge_file_weQzMV
        $result = \assertNotifyArray($method->invoke($command, []));
=======
        $result = XotBasePest::assertArray($method->invoke($command, []));
>>>>>>> .merge_file_T1ZmGT

        Assert::assertEmpty($result);
    });

    it('flatten array handles nested levels', function () {
        $command = new AnalyzeTranslationFiles();

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = [
            'level1' => [
                'level2' => [
                    'level3' => 'deep value',
                ],
            ],
        ];

<<<<<<< .merge_file_weQzMV
        $result = \assertNotifyArray($method->invoke($command, $input));
=======
        $result = XotBasePest::assertArray($method->invoke($command, $input));
>>>>>>> .merge_file_T1ZmGT

        Assert::assertArrayHasKey('level1.level2.level3', $result);
        Assert::assertSame('deep value', $result['level1.level2.level3']);
    });

    it('flatten array handles prefix parameter', function () {
        $command = new AnalyzeTranslationFiles();

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = ['key' => 'value'];

<<<<<<< .merge_file_weQzMV
        $result = \assertNotifyArray($method->invoke($command, $input, 'prefix'));
=======
        $result = XotBasePest::assertArray($method->invoke($command, $input, 'prefix'));
>>>>>>> .merge_file_T1ZmGT

        Assert::assertArrayHasKey('prefix.key', $result);
    });
});
