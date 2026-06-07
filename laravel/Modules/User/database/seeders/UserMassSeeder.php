<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
=======
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Modules\User\Database\Factories\AuthenticationLogFactory;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\ProfileFactory;
use Modules\User\Database\Factories\SocialProviderFactory;
use Modules\User\Database\Factories\UserFactory;
>>>>>>> dev
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\SocialProvider;
use Modules\User\Models\Team;
use Modules\User\Models\User;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> dev

/**
 * Seeder per creare grandi quantità di dati per il modulo User.
 */
class UserMassSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esegue il seeding del database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        $this->command->info('🚀 Inizializzazione seeding di massa per modulo User...');
=======
        $this->info('Inizializzazione seeding di massa per modulo User...');
>>>>>>> dev

        $startTime = microtime(true);

        try {
            // 1. Creazione ruoli e permessi avanzati
            $this->createAdvancedRolesAndPermissions();

            // 2. Creazione team specializzati
            $this->createSpecializedTeams();

            // 3. Creazione utenti con profili completi
            $this->createUsersWithProfiles();

            // 4. Creazione log di autenticazione
            $this->createAuthenticationLogs();

            // 5. Creazione dispositivi utente
            $this->createUserDevices();

            // 6. Creazione provider social
            $this->createSocialProviders();

            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);

<<<<<<< HEAD
            $this->command->info("🎉 Seeding modulo User completato in {$executionTime} secondi!");
            $this->displaySummary();
        } catch (\Exception $e) {
            $this->command->error('❌ Errore durante il seeding: '.$e->getMessage());
=======
            $this->info("Seeding modulo User completato in {$executionTime} secondi.");
            $this->displaySummary();
        } catch (\Exception $e) {
            $this->error('Errore durante il seeding: '.$e->getMessage());
>>>>>>> dev
            throw $e;
        }
    }

    /**
     * Crea ruoli e permessi avanzati.
     */
    private function createAdvancedRolesAndPermissions(): void
    {
<<<<<<< HEAD
        $this->command->info('🔐 Creazione ruoli e permessi avanzati...');
=======
        $this->info('Creazione ruoli e permessi avanzati...');
>>>>>>> dev

        // Permessi avanzati
        $advancedPermissions = [
            'manage-system-settings',
            'view-system-logs',
            'manage-backups',
            'manage-api-keys',
            'view-analytics',
            'manage-notifications',
            'manage-webhooks',
            'manage-integrations',
            'view-financial-data',
            'manage-billing',
            'manage-subscriptions',
            'view-audit-trail',
            'manage-data-export',
            'manage-data-import',
        ];

        foreach ($advancedPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Ruoli avanzati
        $advancedRoles = [
            'system-architect' => [
                'manage-system-settings',
                'view-system-logs',
                'manage-backups',
                'manage-api-keys',
                'view-analytics',
                'manage-integrations',
                'view-audit-trail',
            ],
            'data-analyst' => [
                'view-analytics',
                'view-financial-data',
                'view-audit-trail',
                'manage-data-export',
                'manage-data-import',
            ],
            'billing-manager' => [
                'view-financial-data',
                'manage-billing',
                'manage-subscriptions',
                'view-audit-trail',
            ],
            'integration-specialist' => [
                'manage-integrations',
                'manage-webhooks',
                'manage-api-keys',
                'view-system-logs',
            ],
        ];

        foreach ($advancedRoles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

<<<<<<< HEAD
        $this->command->info(
            '✅ Creati '.
            count($advancedPermissions).
                ' permessi avanzati e '.
                count($advancedRoles).
                ' ruoli specializzati',
=======
        $this->info(
            'Creati '.
            count($advancedPermissions).
                ' permessi avanzati e '.
                count($advancedRoles).
                ' ruoli specializzati.',
>>>>>>> dev
        );
    }

    /**
     * Crea team specializzati.
     */
    private function createSpecializedTeams(): void
    {
<<<<<<< HEAD
        $this->command->info('👥 Creazione team specializzati...');
=======
        $this->info('Creazione team specializzati...');
>>>>>>> dev

        $specializedTeams = [
            [
                'name' => 'Sviluppo',
                'display_name' => 'Team di Sviluppo',
                'description' => 'Team per lo sviluppo software',
            ],
            [
                'name' => 'DevOps',
                'display_name' => 'Team DevOps',
                'description' => 'Team per infrastruttura e deployment',
            ],
            ['name' => 'QA', 'display_name' => 'Team Quality Assurance', 'description' => 'Team per test e qualità'],
            ['name' => 'Design', 'display_name' => 'Team Design', 'description' => 'Team per design e UX/UI'],
            [
                'name' => 'Marketing',
                'display_name' => 'Team Marketing',
                'description' => 'Team per marketing e comunicazione',
            ],
            [
                'name' => 'Vendite',
                'display_name' => 'Team Vendite',
                'description' => 'Team per vendite e business development',
            ],
            [
                'name' => 'Supporto',
                'display_name' => 'Team Supporto',
                'description' => 'Team per supporto tecnico e clienti',
            ],
            ['name' => 'Finanza', 'display_name' => 'Team Finanza', 'description' => 'Team per gestione finanziaria'],
            [
                'name' => 'Risorse Umane',
                'display_name' => 'Team HR',
                'description' => 'Team per gestione risorse umane',
            ],
            [
                'name' => 'Legale',
                'display_name' => 'Team Legale',
                'description' => 'Team per questioni legali e compliance',
            ],
        ];

        foreach ($specializedTeams as $teamData) {
            Team::firstOrCreate(['name' => $teamData['name']], $teamData);
        }

<<<<<<< HEAD
        $this->command->info('✅ Creati '.count($specializedTeams).' team specializzati');
=======
        $this->info('Creati '.count($specializedTeams).' team specializzati.');
>>>>>>> dev
    }

    /**
     * Crea utenti con profili completi.
     */
    private function createUsersWithProfiles(): void
    {
<<<<<<< HEAD
        $this->command->info('👤 Creazione utenti con profili completi...');

        // Crea 200 utenti generici
        /** @var Factory<User> $factory */
        $factory = User::factory();
        $factory
            ->count(200)
            ->create([
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

        $this->command->info('✅ Creati 200 utenti con profili');
=======
        $this->info('Creazione utenti con profili completi...');

        // Crea 200 utenti generici
        $userFactory = UserFactory::new();
        /** @var Collection<int, User> $users */
        $users = $userFactory->count(200)->create([
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()->subDays(rand(1, 365)),
        ]);

        // Crea profili per tutti gli utenti
        $profileFactory = ProfileFactory::new();
        foreach ($users as $user) {
            $profileFactory->create([
                'user_id' => $user->id,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
        }

        // Assegna ruoli casuali
        /** @var Collection<int, \Spatie\Permission\Models\Role> $roles */
        $roles = Role::all();
        foreach ($users as $user) {
            $randomRole = $roles->random();
            $user->assignRole($randomRole);
        }

        $this->info('Creati '.$users->count().' utenti con profilo.');
>>>>>>> dev
    }

    /**
     * Crea log di autenticazione.
     */
    private function createAuthenticationLogs(): void
    {
<<<<<<< HEAD
        $this->command->info('📝 Creazione log di autenticazione...');

        // TODO: Implement authentication logs factory
        // AuthenticationLog::factory()
        //     ->count(1000)
        //     ->create([
        //         'created_at' => Carbon::now()->subDays(rand(1, 30)),
        //     ]);

        $this->command->info('✅ Log di autenticazione creati (placeholder)');
=======
        $this->info('Creazione log di autenticazione...');

        // Crea 1000 log di autenticazione
        $logFactory = AuthenticationLogFactory::new();
        /** @var Collection<int, AuthenticationLog> $logs */
        $logs = $logFactory->count(1000)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 30)),
        ]);

        $this->info('Creati '.$logs->count().' log di autenticazione.');
>>>>>>> dev
    }

    /**
     * Crea dispositivi utente.
     */
    private function createUserDevices(): void
    {
<<<<<<< HEAD
        $this->command->info('📱 Creazione dispositivi utente...');

        // TODO: Implement user devices factory
        // UserDevice::factory()
        //     ->count(500)
        //     ->create([
        //         'created_at' => Carbon::now()->subDays(rand(1, 90)),
        //     ]);

        $this->command->info('✅ Dispositivi utente creati (placeholder)');
=======
        $this->info('Creazione dispositivi utente...');

        // Crea 500 dispositivi
        $deviceFactory = DeviceFactory::new();
        /** @var Collection<int, Device> $devices */
        $devices = $deviceFactory->count(500)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
            ]);

        $this->info('Creati '.$devices->count().' dispositivi.');
>>>>>>> dev
    }

    /**
     * Crea provider social.
     */
    private function createSocialProviders(): void
    {
<<<<<<< HEAD
        $this->command->info('🔗 Creazione provider social...');

        // TODO: Implement social providers factory
        // SocialProvider::factory()
        //     ->count(100)
        //     ->create([
        //         'created_at' => Carbon::now()->subDays(rand(1, 180)),
        //     ]);

        $this->command->info('✅ Provider social creati (placeholder)');
=======
        $this->info('Creazione provider social...');

        // Crea 100 provider social
        $providerFactory = SocialProviderFactory::new();
        /** @var Collection<int, SocialProvider> $providers */
        $providers = $providerFactory->count(100)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 180)),
        ]);

        $this->info('Creati '.$providers->count().' provider social.');
>>>>>>> dev
    }

    /**
     * Mostra un riassunto dei dati creati.
     */
    private function displaySummary(): void
    {
<<<<<<< HEAD
        $this->command->info('📊 RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->command->info('┌─────────────────────────────────────┐');

        try {
            // Conta utenti
            $usersQuery = User::query();
            Assert::isInstanceOf($usersQuery, Builder::class);
            $totalUsers = $usersQuery->count();

            $verifiedUsersQuery = User::query()->whereNotNull('email_verified_at');
            Assert::isInstanceOf($verifiedUsersQuery, Builder::class);
            $verifiedUsers = $verifiedUsersQuery->count();

            $this->command->info('│ 👥 Utenti totali:           '.
            str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT).
                ' │');
            $this->command->info('│    - Verificati:             '.
            str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT).
                ' │');

            // Conta profili
            $profilesQuery = Profile::query();
            Assert::isInstanceOf($profilesQuery, Builder::class);
            $totalProfiles = $profilesQuery->count();

            $this->command->info('│ 👤 Profili totali:          '.
            str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT).
                ' │');

            // Conta ruoli e permessi
            $rolesQuery = Role::query();
            Assert::isInstanceOf($rolesQuery, Builder::class);
            $totalRoles = $rolesQuery->count();

            $permissionsQuery = Permission::query();
            Assert::isInstanceOf($permissionsQuery, Builder::class);
            $totalPermissions = $permissionsQuery->count();

            $teamsQuery = Team::query();
            Assert::isInstanceOf($teamsQuery, Builder::class);
            $totalTeams = $teamsQuery->count();

            $this->command->info('│ 🔐 Ruoli:                  '.
            str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT).
                ' │');
            $this->command->info('│ 🔑 Permessi:               '.
            str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT).
                ' │');
            $this->command->info('│ 👥 Team:                   '.
            str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT).
                ' │');

            // Conta log e dispositivi
            $logsQuery = AuthenticationLog::query();
            Assert::isInstanceOf($logsQuery, Builder::class);
            $totalLogs = $logsQuery->count();

            $devicesQuery = Device::query();
            Assert::isInstanceOf($devicesQuery, Builder::class);
            $totalDevices = $devicesQuery->count();

            $providersQuery = SocialProvider::query();
            Assert::isInstanceOf($providersQuery, Builder::class);
            $totalProviders = $providersQuery->count();

            $this->command->info('│ 📝 Log autenticazione:      '.
            str_pad((string) $totalLogs, 6, ' ', STR_PAD_LEFT).
                ' │');
            $this->command->info('│ 📱 Dispositivi:             '.
            str_pad((string) $totalDevices, 6, ' ', STR_PAD_LEFT).
                ' │');
            $this->command->info('│ 🔗 Provider social:         '.
            str_pad((string) $totalProviders, 6, ' ', STR_PAD_LEFT).
                ' │');
        } catch (\Exception $e) {
            $this->command->info('│ ❌ Errore nel conteggio: '.$e->getMessage());
        }

        $this->command->info('└─────────────────────────────────────┘');
        $this->command->info('');
=======
        $this->info('RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->info('-------------------------------------');

        try {
            // Conta utenti
            $totalUsers = User::count();
            $verifiedUsers = User::whereNotNull('email_verified_at')->count();

            $this->info('Utenti totali: '.str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT));
            $this->info('Utenti verificati: '.str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT));

            // Conta profili
            $totalProfiles = Profile::count();

            $this->info('Profili totali: '.str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT));

            // Conta ruoli e permessi
            $totalRoles = Role::count();
            $totalPermissions = Permission::count();
            $totalTeams = Team::count();

            $this->info('Ruoli totali: '.str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT));
            $this->info('Permessi totali: '.str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT));
            $this->info('Team totali: '.str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT));

            // Conta log e dispositivi
            $totalLogs = AuthenticationLog::count();
            $totalDevices = Device::count();
            $totalProviders = SocialProvider::count();

            $this->info('Log autenticazione: '.str_pad((string) $totalLogs, 6, ' ', STR_PAD_LEFT));
            $this->info('Dispositivi: '.str_pad((string) $totalDevices, 6, ' ', STR_PAD_LEFT));
            $this->info('Provider social: '.str_pad((string) $totalProviders, 6, ' ', STR_PAD_LEFT));
        } catch (\Exception $e) {
            $this->info('Errore nel conteggio: '.$e->getMessage());
        }

        $this->info('-------------------------------------');
        $this->info('');
    }

    private function info(string $message): void
    {
        $command = $this->getConsoleCommand();
        $command->info($message);
    }

    private function error(string $message): void
    {
        $command = $this->getConsoleCommand();
        $command->error($message);
    }

    private function getConsoleCommand(): Command
    {
        return $this->command;
>>>>>>> dev
    }
}
