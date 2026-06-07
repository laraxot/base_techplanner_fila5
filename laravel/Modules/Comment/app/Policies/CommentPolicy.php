<?php

declare(strict_types=1);

namespace Modules\Comment\Policies;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Comment\Models\Contracts\CanComment;
use Modules\Comment\Support\CommentConfig;

/**
 * Policy motore commenti Laraxot — usa {@see CanComment} nativo, non Spatie\Comments\…\CanComment.
 */
class CommentPolicy
{
    public function create(?CanComment $user): bool
    {
        if (CommentConfig::allowAnonymousComments()) {
            return true;
        }

        return $user !== null;
    }

    public function update(?CanComment $user, Model $comment): bool
    {
        if ($user !== null && $this->approvingUsers($comment)->contains($user)) {
            return true;
        }

        return $this->commentMadeBy($user, $comment);
    }

    public function delete(?CanComment $user, Model $comment): bool
    {
        if ($user !== null && $this->approvingUsers($comment)->contains($user)) {
            return true;
        }

        return $this->commentMadeBy($user, $comment);
    }

    public function react(CanComment $user, Model $commentableModel): bool
    {
        return true;
    }

    public function see(?CanComment $user, Model $comment): bool
    {
        if (method_exists($comment, 'isApproved') && $comment->isApproved()) {
            return true;
        }

        if ($user === null) {
            return false;
        }

        if ($this->commentMadeBy($user, $comment)) {
            return true;
        }

        return $this->approvingUsers($comment)->contains($user);
    }

    public function approve(CanComment $user, Model $comment): bool
    {
        return $this->approvingUsers($comment)->contains($user);
    }

    public function reject(CanComment $user, Model $comment): bool
    {
        return $this->approvingUsers($comment)->contains($user);
    }

    private function commentMadeBy(?CanComment $user, Model $comment): bool
    {
        if ($user === null) {
            return false;
        }

        $commentator = $comment->getRelationValue('commentator');

        if (! is_object($commentator)) {
            return false;
        }

        if (! method_exists($commentator, 'getMorphClass') || ! method_exists($commentator, 'getKey')) {
            return false;
        }

        return $user->getMorphClass() === $commentator->getMorphClass()
            && $user->getKey() === $commentator->getKey();
    }

    /** @return Collection<int, CanComment|object> */
    private function approvingUsers(Model $comment): Collection
    {
        if (! method_exists($comment, 'getApprovingUsers')) {
            /** @var Collection<int, CanComment|object> $empty */
            $empty = collect();

            return $empty;
        }

        $users = $comment->getApprovingUsers();

        if ($users instanceof Collection) {
            /** @var Collection<int, CanComment|object> $valued */
            $valued = $users->values();

            return $valued;
        }

        /** @var Collection<int, CanComment|object> $result */
        $result = collect([$users]);

        return $result;
    }
}
