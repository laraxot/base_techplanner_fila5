<?php

declare(strict_types=1);

namespace Modules\Comment\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\URL;
use Modules\Comment\Enums\TipoSottoscrizioneNotifica;
use Modules\Comment\Support\CommentatoreProprieta;
use Modules\Comment\Support\ConfigCommenti;

/**
 * Trait InteractsWithCommenti
 *
 * Italian-named trait for comment interaction.
 * This replaces the Spatie trait with Italian naming conventions.
 */
trait InteractsWithCommenti
{
    public function commentiComeCommentatore(): MorphMany
    {
        return $this->morphMany(ConfigCommenti::modelloCommento(), 'commentatore');
    }

    public function iscrizioniNotificaCommenti(): MorphMany
    {
        return $this->morphMany(ConfigCommenti::modelloSottoscrizioneNotifica(), 'sottoscrittore');
    }

    public function reazioni(): MorphMany
    {
        return $this->morphMany(ConfigCommenti::modelloReazione(), 'commentatore');
    }

    public function proprietaCommentatore(): CommentatoreProprieta
    {
        $segment = md5(strtolower((string) $this->email));
        $defaultImage = ConfigCommenti::immagineDefaultGravatar();

        return CommentatoreProprieta::email($this->email)
            ->nome($this->{ConfigCommenti::campoNomeModelloCommentatore()})
            ->avatar($this->{ConfigCommenti::campoAvatarModelloCommentatore()} ?? "https://www.gravatar.com/avatar/{$segment}?d={$defaultImage}");
    }

    public function iscriviNotificheCommenti(Model $haCommento, TipoSottoscrizioneNotifica $tipoSottoscrizione): self
    {
        $this->iscrizioniNotificaCommenti()->updateOrCreate([
            'commentabile_type' => $haCommento->getMorphClass(),
            'commentabile_id' => $haCommento->getKey(),
        ], [
            'tipo' => $tipoSottoscrizione->value,
        ]);

        return $this;
    }

    public function annullaIscrizioneNotificheCommenti(Model $haCommenti): self
    {
        $this
            ->iscrizioniNotificaCommenti()
            ->where('commentabile_type', $haCommenti->getMorphClass())
            ->where('commentabile_id', $haCommenti->getKey())
            ->delete();

        return $this;
    }

    public function urlAnnullaIscrizioneNotifiche(Model $haCommenti): ?string
    {
        $sottoscrizione = $this->iscrizioniNotificaCommenti()
            ->where('commentabile_type', $haCommenti->getMorphClass())
            ->where('commentabile_id', $haCommenti->getKey())
            ->first();

        if (! $sottoscrizione) {
            return null;
        }

        return URL::signedRoute(
            'commenti.notifications.unsubscribe',
            [$sottoscrizione],
            now()->addWeek(),
        );
    }

    public function tipoSottoscrizioneNotifica(Model $haCommenti): ?TipoSottoscrizioneNotifica
    {
        return $this
            ->iscrizioniNotificaCommenti()
            ->where('commentabile_type', $haCommenti->getMorphClass())
            ->where('commentabile_id', $haCommenti->getKey())
            ->first()?->tipo;
    }
}