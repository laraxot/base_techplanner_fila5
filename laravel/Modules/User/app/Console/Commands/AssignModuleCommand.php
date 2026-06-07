<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD
use Nwidart\Modules\Contracts\RepositoryInterface;
=======
use Nwidart\Modules\Facades\Module;
use Symfony\Component\Console\Input\InputOption;
>>>>>>> 4b6b99016 (first commit)
=======
use Nwidart\Modules\Contracts\RepositoryInterface;
>>>>>>> dev

class AssignModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> dev
     */
    protected $name = 'user:assign-module';

    /**
     * The console command description.
<<<<<<< HEAD
     *
     * @var string
     */
    protected $description = 'Assign or revoke modules to/from user';

<<<<<<< HEAD
=======
     */
    protected $description = 'Assign or revoke modules to/from user';

>>>>>>> dev
    public function __construct(
        private readonly RepositoryInterface $moduleRepository,
        private readonly Role $roleModel,
    ) {
        parent::__construct();
    }
<<<<<<< HEAD
=======
    /**
     * Create a new command instance.
     */
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');

        /**
         * @var UserContract $user
         */
        $user = XotData::make()->getUserByEmail($email);

        if (! $user) {
            $this->error("User with email '{$email}' not found.");

            return;
        }

        // Get all available modules
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        /** @var array<string, mixed> $allModules */
        $allModules = $this->moduleRepository->all();

        // Ensure $allModules is an array for PHPStan
        if (! is_array($allModules)) {
            $this->error('Unable to retrieve modules.');

            return;
        }

        $moduleKeys = array_map('strval', array_keys($allModules));
        /** @var array<int|string, string> $moduleOptions */
        $moduleOptions = array_combine($moduleKeys, $moduleKeys);
<<<<<<< HEAD
=======
        $modules_opts = array_keys(Module::all());
        $modules_opts = array_combine($modules_opts, $modules_opts);
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

        // Get user's current module roles
        // $userModuleRoles = $this->getUserModuleRoles($user);
        $userModuleRoles = $user->getModules();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        $currentModules = is_array($userModuleRoles) ? array_keys($userModuleRoles) : [];

        // Show current modules as default selected
        $this->info('Current modules for '.$email.': '.implode(', ', $currentModules));

        $selectedModules = multiselect(
            label: 'Select modules (checked = assigned, unchecked = will be revoked)',
            options: $moduleOptions,
<<<<<<< HEAD
=======
        $currentModules = array_keys($userModuleRoles);

        // Show current modules as default selected
        $this->info("Current modules for {$email}: ".implode(', ', $currentModules));

        $selectedModules = multiselect(
            label: 'Select modules (checked = assigned, unchecked = will be revoked)',
            options: $modules_opts,
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
            default: $currentModules, // Show current modules as checked
            required: false, // Allow empty selection
            scroll: 10,
        );

        // Determine modules to assign and revoke
        $modulesToAssign = array_diff($selectedModules, $currentModules);
        $modulesToRevoke = array_diff($currentModules, $selectedModules);

        // Assign new modules
        foreach ($modulesToAssign as $module) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Create or get the role with the web guard
            $role = $this->roleModel->firstOrCreate(['name' => $roleName], []);
<<<<<<< HEAD
=======
            $module_low = Str::lower(is_string($module) ? $module : ((string) $module));
            $role_name = $module_low.'::admin';

            // Create or get the role with the web guard
            $role = Role::firstOrCreate(['name' => $role_name], []);
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

            // Assign the role to the user
            $user->assignRole($role);

            $this->info("✓ Assigned module: {$module}");
        }

        // Revoke unchecked modules
        foreach ($modulesToRevoke as $module) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Revoke the role from the user
            $user->removeRole($roleName);
<<<<<<< HEAD
=======
            $module_low = Str::lower(is_string($module) ? $module : ((string) $module));
            $role_name = $module_low.'::admin';

            // Revoke the role from the user
            $user->removeRole($role_name);
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

            $this->warn("✗ Revoked module: {$module}");
        }

        // Summary
        if (empty($modulesToAssign) && empty($modulesToRevoke)) {
            $this->info('No changes made to user modules.');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev

            return;
        }
        $this->info("Module assignment updated for {$email}");
    }
<<<<<<< HEAD
=======
        } else {
            $this->info("Module assignment updated for {$email}");
        }
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

    /*
     * Get user's current module roles.
     *
     * @return array<string, string>

    private function getUserModuleRoles(UserContract $user): array
    {
        $moduleRoles = [];

        //@var Collection<int, Role> $roles
        $roles = $user->roles()->get();
        foreach ($roles as $role) {
            if (Str::endsWith($role->name, '::admin')) {
                $moduleName = Str::before($role->name, '::admin');
                $moduleRoles[$moduleName] = $role->name;
            }
        }

        return $moduleRoles;
    }
        */
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
}
