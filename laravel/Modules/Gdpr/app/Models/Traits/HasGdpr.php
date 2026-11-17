<?php

declare(strict_types=1);

namespace Modules\Gdpr\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Cache;
use Modules\Gdpr\Enums\ConsentType;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Models\Treatment;

/**
<<<<<<< HEAD
 * Trait HasGdpr.
 *
 * Provides GDPR-related functionality for Eloquent models.
 *
 * @property Collection<int, Consent> $consents
 * @property Collection<int, Consent> $activeConsents
=======
 * Trait HasGdpr
 *
 * Provides GDPR-related functionality for Eloquent models.
 *
 * @property-read Collection<int, Consent> $consents
 * @property-read Collection<int, Consent> $activeConsents
>>>>>>> 6ed19256f (.)
 */
trait HasGdpr
{
    /**
     * Get all consents for the model (polymorphic).
     *
     * @return MorphMany<Consent, $this>
     */
    public function consents(): MorphMany
    {
        return $this->morphMany(Consent::class, 'user');
    }

    /**
     * Get only active (non-revoked) consents.
     *
     * @return MorphMany<Consent, $this>
     */
    public function activeConsents(): MorphMany
    {
        return $this->consents()->whereNull('revoked_at');
    }

    /**
     * Get the treatments associated with the user through consents.
     *
     * @return HasManyThrough<Treatment, Consent, $this>
     */
    public function treatments(): HasManyThrough
    {
        return $this->hasManyThrough(Treatment::class, Consent::class, 'user_id', 'id', 'id', 'treatment_id')->where(
            'consents.user_type',
            static::class,
        ); // Foreign key on consents table // Foreign key on treatments table // Local key on users table // Local key on consents table
    }

    /**
     * Check if the user has given a specific consent.
<<<<<<< HEAD
     */
    public function hasGivenConsent(ConsentType|string $type): bool
=======
     *
     * @param  bool  $cached  Use cached version if available
     */
    public function hasGivenConsent(ConsentType|string $type, bool $cached = true): bool
>>>>>>> 6ed19256f (.)
    {
        $type = $type instanceof ConsentType ? $type->value : $type;
        $cacheKey = 'user_'.(string) $this->getKey().'_consent_'.$type;

<<<<<<< HEAD
        if (Cache::has($cacheKey)) {
            return (bool) Cache::get($cacheKey);
        }

        return $this->hasGivenConsentWithoutCache($type);
    }

    /**
     * Check if the user has given a specific consent (bypassing cache).
     */
    public function hasGivenConsentWithoutCache(ConsentType|string $type): bool
    {
        $type = $type instanceof ConsentType ? $type->value : $type;
        $cacheKey = 'user_'.(string) $this->getKey().'_consent_'.$type;

=======
        if ($cached && Cache::has($cacheKey)) {
            return (bool) Cache::get($cacheKey);
        }

>>>>>>> 6ed19256f (.)
        $hasConsent = $this->activeConsents()->where('type', $type)->exists();

        Cache::put($cacheKey, $hasConsent, now()->addDay());

        return $hasConsent;
    }

    /**
     * Give consent for a specific type.
     *
<<<<<<< HEAD
     * @param array<string, mixed> $metadata
     * @param array<string, mixed> $metadata
=======
     * @param  array<string, mixed>  $metadata
>>>>>>> 6ed19256f (.)
     */
    public function giveConsent(ConsentType|string $type, array $metadata = []): Consent
    {
        $type = $type instanceof ConsentType ? $type->value : $type;

        /** @var Consent $consent */
        $consent = $this->consents()->create([
            'type' => $type,
            'metadata' => $metadata,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'accepted_at' => now(),
        ]);

        $this->clearConsentCache($type);

        return $consent;
    }

    /**
     * Revoke a specific consent.
     */
    public function revokeConsent(ConsentType|string $type): bool
    {
        $type = $type instanceof ConsentType ? $type->value : $type;

        $updated = $this->activeConsents()
            ->where('type', $type)
            ->update([
                'revoked_at' => now(),
                'revoked_ip_address' => request()->ip(),
            ]);

        if ($updated > 0) {
            $this->clearConsentCache($type);

            return true;
        }

        return false;
    }

    /**
     * Get all required consents that the user hasn't given yet.
     *
     * @return array<string>
     */
    public function getMissingRequiredConsents(): array
    {
        $givenConsents = $this->activeConsents()->pluck('type')->toArray();

<<<<<<< HEAD
        $givenConsents = array_map(static fn (mixed $v): string => (string) $v, $givenConsents);

        /* @var array<string> */
=======
        /** @var array<string> */
>>>>>>> 6ed19256f (.)
        return array_diff(ConsentType::getRequiredConsentTypes(), $givenConsents);
    }

    /**
     * Check if user has given all required consents.
     */
    public function hasAllRequiredConsents(): bool
    {
        return empty($this->getMissingRequiredConsents());
    }

    /**
     * Clear cached consent status.
     */
    protected function clearConsentCache(string $type): void
    {
        $cacheKey = 'user_'.(string) $this->getKey().'_consent_'.$type;
        Cache::forget($cacheKey);
    }
}
