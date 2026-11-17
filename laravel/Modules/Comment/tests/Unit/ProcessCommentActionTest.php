<?php

declare(strict_types=1);

use Modules\Comment\Actions\ProcessCommentAction;
use Modules\Comment\Models\Comment;
use Modules\Comment\Tests\TestCase;

uses(TestCase::class);

it('copia original_text quando non ci sono transformer', function (): void {
    config()->set('comments.comment_transformers', []);

    $comment = new Comment([
        'original_text' => 'Testo semplice',
    ]);

    app(ProcessCommentAction::class)->handle($comment);

    expect($comment->text)->toBe('Testo semplice');
});

it('trasforma markdown in html', function (): void {
    $comment = new Comment([
        'original_text' => '**grassetto**',
    ]);

    app(ProcessCommentAction::class)->handle($comment);

    expect($comment->text)->toContain('<strong>grassetto</strong>');
});
