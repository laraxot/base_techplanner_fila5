<?php

declare(strict_types=1);

namespace Modules\Notify\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;

class MailTemplatePolicy extends NotifyBasePolicy
{
    public function viewAny(UserContract $user): bool
    {
        return false;
    }
}
=======
class MailTemplatePolicy extends NotifyBasePolicy {}
>>>>>>> 4b6b99016 (first commit)
