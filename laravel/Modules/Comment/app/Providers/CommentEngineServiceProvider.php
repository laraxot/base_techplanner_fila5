<?php

declare(strict_types=1);

namespace Modules\Comment\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Comment\Http\Livewire\CommentComponent;
use Modules\Comment\Http\Livewire\CommentsComponent;
use Modules\Comment\Support\CommentConfig;

/**
 * Boot unificato motore commenti Laraxot (strangler fig da packages/spatie).
 */
class CommentEngineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerBladeNamespace();

        $this->app->booted(function (): void {
            Livewire::component('comments', CommentsComponent::class);
            Livewire::component('comments-comment', CommentComponent::class);
            $this->registerPolicies();
        });
    }

    protected function registerPolicies(): void
    {
        $commentPolicy = CommentConfig::commentPolicyClass();
        $reactionPolicy = CommentConfig::reactionPolicyClass();

        Gate::define('createComment', [$commentPolicy, 'create']);
        Gate::policy(CommentConfig::commentModelClass(), $commentPolicy);
        Gate::policy(CommentConfig::reactionModelClass(), $reactionPolicy);
    }

    protected function registerBladeNamespace(): void
    {
        Blade::componentNamespace('Modules\\Comment\\View\\Components', 'comment');
    }
}
