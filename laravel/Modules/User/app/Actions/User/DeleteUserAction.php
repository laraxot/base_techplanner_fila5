<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
>>>>>>> 4b6b99016 (first commit)
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function __construct(
        private readonly Hasher $hasher,
        private readonly Guard $authGuard,
    ) {
    }

=======
>>>>>>> 4b6b99016 (first commit)
    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User   $user            L'utente da eliminare
     * @param string $confirmPassword La password di conferma
     *
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
<<<<<<< HEAD
        if (! $this->hasher->check($confirmPassword, $user->password)) {
=======
        if (! Hash::check($confirmPassword, $user->password)) {
>>>>>>> 4b6b99016 (first commit)
            return [
                'success' => false,
                'message' => 'La password inserita non è corretta',
            ];
        }

        try {
<<<<<<< HEAD
            $this->authGuard->logout();
=======
            Auth::logout();
>>>>>>> 4b6b99016 (first commit)
            $user->delete();

            return [
                'success' => true,
                'message' => 'Account eliminato con successo',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
            ];
        }
    }
}
