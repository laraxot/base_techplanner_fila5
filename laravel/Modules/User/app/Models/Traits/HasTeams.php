<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Schema;
>>>>>>> 6ed19256f (.)
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract as XotUserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Models\Permission;
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
>>>>>>> 6ed19256f (.)

/**
 * Trait HasTeams.
 *
 * Provides team functionality for User models implementing team-based organization.
 * This trait handles team ownership, membership, permissions, and relationships.
 *
<<<<<<< HEAD
 * @property TeamContract                  $currentTeam
 * @property int|null                      $current_team_id
 * @property Collection<int, TeamContract> $teams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser>     $teamUsers
 * @property XotUserContract|null          $owner
=======
 * @property TeamContract $currentTeam
 * @property int|null $current_team_id
 * @property Collection<int, TeamContract> $teams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser> $teamUsers
 * @property UserContract|null $owner
>>>>>>> 6ed19256f (.)
 */
trait HasTeams
{
    /**
     * Add a user to the team.
     */
    public function addTeamMember(Model $user, ?Model $role = null): Model
    {
        $teamUser = $this->teamUsers()->create([
            'user_id' => $user->getKey(),
            'role_id' => $role ? $role->getKey() : null,
        ]);

        $this->increment('total_members');

        return $teamUser;
    }

    /**
     * Get all teams the user belongs to.
     *
     * @return Collection<TeamContract>
     */
    public function allTeams(): Collection
    {
        return $this->ownedTeams->merge($this->teams)->sortBy('name');
    }

    /**
     * Check if the user belongs to any teams.
     */
    public function belongsToTeams(): bool
    {
        return $this->allTeams()->isNotEmpty();
    }

    /**
     * Check if the user belongs to a specific team.
     */
    public function belongsToTeam(?TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $team) {
=======
        if ($team === null) {
>>>>>>> 6ed19256f (.)
            return false;
        }

        return $this->ownsTeam($team) || $this->teams->contains('id', (string) $team->id);
    }

    /**
     * Check if the user can add a member to a team.
     */
    public function canAddTeamMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add team member');
    }

    /**
     * Check if the user can create a team.
     */
    public function canCreateTeam(): bool
    {
        return $this->hasPermissionTo('create team');
    }

    /**
     * Check if the user can delete a team.
     */
    public function canDeleteTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can leave a team.
     */
    public function canLeaveTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
    }

    /**
     * Check if the user can manage a team.
     */
    public function canManageTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can remove a member from a team.
     */
<<<<<<< HEAD
    public function canRemoveTeamMember(TeamContract $team, XotUserContract $_user): bool
=======
    public function canRemoveTeamMember(TeamContract $team, UserContract $_user): bool
>>>>>>> 6ed19256f (.)
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove team member');
    }

    /**
     * Check if the user can update a team.
     */
    public function canUpdateTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team');
    }

    /**
     * Check if the user can update a team member.
     */
<<<<<<< HEAD
    public function canUpdateTeamMember(TeamContract $team, XotUserContract $_user): bool
=======
    public function canUpdateTeamMember(TeamContract $team, UserContract $_user): bool
>>>>>>> 6ed19256f (.)
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team member');
    }

    /**
     * Check if the user can view a team.
     */
    public function canViewTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) || $this->hasTeamPermission($team, 'view team');
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return Collection<int, User>
     */
    public function getAllTeamUsersAttribute(): Collection
    {
        // teamUsers are Membership objects, we need to extract the User models
        /** @var Collection<int, User> $users */
        $users = $this->teamUsers->map(static function ($membership) {
            // Membership always extends Model, check only if user attribute exists
            $user = $membership->getAttribute('user');

<<<<<<< HEAD
            return null !== $user ? $user : null;
        })->filter();

        $owner = $this->owner;
        if (null !== $owner && $owner instanceof User) {
=======
            return $user !== null ? $user : null;
        })->filter();

        $owner = $this->owner;
        if ($owner !== null && $owner instanceof User) {
>>>>>>> 6ed19256f (.)
            return $users->merge([$owner]);
        }

        return $users;
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return Collection<int, User>
     */
    public function allTeamUsers(): Collection
    {
        // Ensure we have fresh data for the teams and their users
        return $this->teams->load('users')->flatMap(function ($team) {
            return $team->users;
        })->unique('id');
    }

    /**
     * Determine if the given user is on the team.
     */
<<<<<<< HEAD
    public function hasTeamMember(XotUserContract $user): bool
=======
    public function hasTeamMember(UserContract $user): bool
>>>>>>> 6ed19256f (.)
    {
        // Check if user is in teamUsers (checking by key since Membership != UserContract)
        $userFound = $this->teamUsers->first(static function ($membership) use ($user) {
            // Membership always extends Model
            $memberUser = $membership->getAttribute('user');
            if ($memberUser instanceof Model) {
                $memberUserKey = $memberUser->getKey();

<<<<<<< HEAD
                return null !== $memberUserKey && $memberUserKey === $user->getKey();
=======
                return $memberUserKey !== null && $memberUserKey === $user->getKey();
>>>>>>> 6ed19256f (.)
            }

            return false;
        });

<<<<<<< HEAD
        if (null !== $userFound) {
=======
        if ($userFound !== null) {
>>>>>>> 6ed19256f (.)
            return true;
        }

        // Check if user can own this team (UserContract sempre ha il metodo ownsTeam)
        if ($this instanceof TeamContract) {
            return $user->ownsTeam($this);
        }

        return false;
    }

    /**
     * Check if the user has teams.
     */
    public function hasTeams(): bool
    {
        return $this->allTeams()->isNotEmpty();
    }

    /**
     * Check if the user has a specific permission in a team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool
    {
<<<<<<< HEAD
        return $this->ownsTeam($team) || \in_array($permission, $this->teamPermissions($team), true);
=======
        return $this->ownsTeam($team) || \in_array($permission, $this->teamPermissions($team), strict: true);
>>>>>>> 6ed19256f (.)
    }

    /**
     * Check if the user has a specific role in a team.
     */
    public function hasTeamRole(TeamContract $team, string $role): bool
    {
        if ($this->ownsTeam($team)) {
            return true;
        }

        $teamRole = $this->teamRole($team);

<<<<<<< HEAD
        return null !== $teamRole && $teamRole->name === $role;
=======
        return $teamRole !== null && $teamRole->name === $role;
>>>>>>> 6ed19256f (.)
    }

    /**
     * Get the role name for a specific team.
     */
    public function teamRoleName(TeamContract $team): string
    {
        $role = $this->teamRole($team);

<<<<<<< HEAD
        if (null === $role) {
=======
        if ($role === null) {
>>>>>>> 6ed19256f (.)
            return 'Unknown';
        }

        return $role->name;
    }

    /**
     * Get the current team of the user's context.
     *
     * @return BelongsTo<Model&TeamContract, $this>
     */
    public function currentTeam(): BelongsTo
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return $this->belongsTo($teamClass, 'current_team_id');
    }

    /**
     * Get the teams owned by the user.
     *
     * @return HasMany<Model&TeamContract, $this>
     */
    public function ownedTeams(): HasMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return $this->hasMany($teamClass, 'user_id');
    }

    /**
     * Get all team users.
     *
     * @return HasMany<TeamUser, $this>
     */
    public function teamUsers(): HasMany
    {
        return $this->hasMany(TeamUser::class, 'user_id');
    }

    /**
     * Get the role for a specific team.
     */
    public function teamRole(TeamContract $team): ?Role
    {
        if ($this->ownsTeam($team)) {
            return Role::where('name', 'owner')->first() ?? new Role(['name' => 'owner']);
        }

        /** @var Model|Pivot|null $teamUser */
        $teamUser = $this->teamUsers()->where('team_id', $team->id)->first();

<<<<<<< HEAD
        if (null === $teamUser) {
=======
        if ($teamUser === null) {
>>>>>>> 6ed19256f (.)
            return null;
        }

        $roleValue = $teamUser->getAttribute('role');

        if ($roleValue instanceof Role) {
            return $roleValue;
        }

        if (is_string($roleValue)) {
            return Role::where('name', $roleValue)->first() ?? new Role(['name' => $roleValue]);
        }

        return null;
    }

    /**
     * Get permissions for a specific team.
     *
     * @return array<int, string>
     */
    public function teamPermissions(TeamContract $team): array
    {
        /** @var array<int, string> $permissions */
        $permissions = [];

        // Permissions from Role
        $role = $this->teamRole($team);
<<<<<<< HEAD
        if (null !== $role && $role->permissions) {
            /** @var \Illuminate\Database\Eloquent\Collection<int, Permission> $permissionsCollection */
            $permissionsCollection = $role->permissions;
            /** @var array<string> $rolePermissionNames */
            $rolePermissionNames = $permissionsCollection->pluck('name')->toArray();

            $permissions = array_values(array_filter(
                $rolePermissionNames,
                static fn (string $value): bool => '' !== $value
=======
        if ($role !== null && $role->permissions) {
            $rolePermissionNames = $role->permissions->pluck('name')->toArray();

            $permissions = array_values(array_filter(
                $rolePermissionNames,
                static fn (mixed $value): bool => \is_string($value) && $value !== ''
>>>>>>> 6ed19256f (.)
            ));
        }

        // Permissions from Pivot
        /** @var Model|Pivot|null $teamUser */
        $teamUser = $this->teamUsers()->where('team_id', (string) $team->id)->first();
<<<<<<< HEAD
        if (null !== $teamUser) {
=======
        if ($teamUser !== null) {
>>>>>>> 6ed19256f (.)
            $pivotPermissions = $teamUser->getAttribute('permissions');
            if (is_array($pivotPermissions)) {
                $pivotPermissionNames = array_keys(array_filter($pivotPermissions));

                $permissions = array_merge(
                    $permissions,
                    array_values(array_filter(
                        $pivotPermissionNames,
<<<<<<< HEAD
                        static fn (string $value): bool => '' !== $value
=======
                        static fn (mixed $value): bool => \is_string($value) && $value !== ''
>>>>>>> 6ed19256f (.)
                    ))
                );
            }
        }

<<<<<<< HEAD
        /** @var array<int, string> $result */
        $result = array_values(array_unique($permissions));

        return $result;
=======
        return array_values(array_unique($permissions));
>>>>>>> 6ed19256f (.)
    }

    /**
     * Remove a user from the team.
     */
    public function removeTeamMember(Model $user): void
    {
        $this->teamUsers()->where('user_id', $user->getKey())->delete();

        $this->decrement('total_members');
    }

    /**
     * Get the user's personal team.
     */
    public function personalTeam(): ?TeamContract
    {
        /* @var TeamContract|null */
        return $this->ownedTeams->where('personal_team', true)->first();
    }

    /**
     * Initialize the user's current team.
     */
    public function initializeCurrentTeam(): void
    {
<<<<<<< HEAD
        if (null !== $this->current_team_id) {
=======
        if ($this->current_team_id !== null) {
>>>>>>> 6ed19256f (.)
            return;
        }

        $team = $this->personalTeam();
<<<<<<< HEAD
        if (null === $team) {
=======
        if ($team === null) {
>>>>>>> 6ed19256f (.)
            $teamCandidate = $this->allTeams()->first();
            if ($teamCandidate instanceof TeamContract) {
                $team = $teamCandidate;
            }
        }

<<<<<<< HEAD
        if (null !== $team) {
=======
        if ($team !== null) {
>>>>>>> 6ed19256f (.)
            $this->switchTeam($team);
        }
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $team): bool
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->forceFill([
            'current_team_id' => $team->id,
        ]);

        return $this->save();
    }

    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $this->currentTeam) {
=======
        if ($this->currentTeam === null) {
>>>>>>> 6ed19256f (.)
            return false;
        }

        return $team->getKey() === $this->currentTeam->getKey();
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(?TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $team) {
            return false;
        }

        return $this->id === $team->user_id;
=======
        if ($team === null) {
            return false;
        }

        return (string) $this->getKey() === (string) $team->user_id;
>>>>>>> 6ed19256f (.)
    }

    /**
     * Get all of the teams the user belongs to.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model&TeamContract, $this, TeamUser, 'pivot'>
=======
     * @return BelongsToMany<Model&TeamContract, $this, TeamUser>
>>>>>>> 6ed19256f (.)
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

<<<<<<< HEAD
        return $this->belongsToManyX($teamClass);
=======
        $relation = $this->belongsToMany($teamClass, 'team_user', 'user_id', 'team_id')
            ->using(TeamUser::class);

        // Verifica la colonna permissions usando la connessione corretta
        $connectionName = $this->getConnectionName();
        if (Schema::connection($connectionName)->hasColumn('team_user', 'permissions')) {
            return $relation->withPivot(['role', 'permissions']);
        }

        return $relation->withPivot(['role']);
>>>>>>> 6ed19256f (.)
    }

    /**
     * Get all of the teams that the user owns.
<<<<<<< HEAD
     */
    public function inviteToTeam(XotUserContract $user, TeamContract $team): bool
=======
     *
     */
    public function inviteToTeam(UserContract $user, TeamContract $team): bool
>>>>>>> 6ed19256f (.)
    {
        if ($this->ownsTeam($team)) {
            $team->members()->attach($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Remove a user from the team.
     */
<<<<<<< HEAD
    public function removeFromTeam(XotUserContract $user, TeamContract $team): bool
=======
    public function removeFromTeam(UserContract $user, TeamContract $team): bool
>>>>>>> 6ed19256f (.)
    {
        if ($this->ownsTeam($team)) {
            $team->members()->detach($user->id);

            return true;
        }

        return false;
    }

    /**
     * Check if the user is an owner or a member.
     */
    public function isOwnerOrMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->belongsToTeam($team);
    }

    /**
     * Promote a member to team admin.
     */
<<<<<<< HEAD
    public function promoteToAdmin(XotUserContract $user, TeamContract $team): bool
=======
    public function promoteToAdmin(UserContract $user, TeamContract $team): bool
>>>>>>> 6ed19256f (.)
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'admin']);

            return true;
        }

        return false;
    }

    /**
     * Demote a member from team admin.
     */
<<<<<<< HEAD
    public function demoteFromAdmin(XotUserContract $user, TeamContract $team): bool
=======
    public function demoteFromAdmin(UserContract $user, TeamContract $team): bool
>>>>>>> 6ed19256f (.)
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'admin')->get();
    }

    /**
     * Get all members of the team.
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'member')->get();
    }

    /**
     * Determine if the user owns the given team.
     */
    public function checkTeamOwnership(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Boot the HasTeams trait.
     */
    protected static function bootHasTeams(): void
    {
        /*
         * static::deleting(function ($team) {
         * $team->teamUsers()->delete();
         * $team->teamInvitations()->delete();
         * });
         */
    }
}
