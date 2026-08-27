<?php

declare(strict_types=1);

namespace Modules\Seo\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Datas\SocialShareData;
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> cf01f0b (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> 7ec200b (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> d20252d (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> 77e0353 (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> fc52fe0 (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> c101b34 (.)
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> d0f51b6 (.)
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to generate localized and encoded social media sharing links.
 */
class GenerateSocialShareLinksAction
{
    use QueueableAction;

    /**
     * Execute the action to construct sharing URLs.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  SocialShareData  $data  The sharing data.
=======
     * @param SocialShareData $data The sharing data.
>>>>>>> d20252d (.)
=======
     * @param SocialShareData $data The sharing data.
>>>>>>> 77e0353 (.)
=======
     * @param  SocialShareData  $data  The sharing data.
>>>>>>> fc52fe0 (.)
=======
     * @param  SocialShareData  $data  The sharing data.
>>>>>>> c101b34 (.)
=======
     * @param  SocialShareData  $data  The sharing data.
>>>>>>> d0f51b6 (.)
     * @return array<string, string> Keyed by platform name, value is the sharing URL.
     */
    public function execute(SocialShareData $data): array
    {
        $text = $data->text ?? $data->title ?? '';

        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u='.urlencode($data->url),
            'twitter' => 'https://twitter.com/intent/tweet?url='.urlencode($data->url)
                .'&text='.urlencode($text)
                .($data->via ? '&via='.urlencode($data->via) : '')
                .($data->hashtags ? '&hashtags='.urlencode($data->hashtags) : ''),
            'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url='.urlencode($data->url),
            'whatsapp' => 'https://api.whatsapp.com/send?text='.urlencode($text.' '.$data->url),
            'telegram' => 'https://t.me/share/url?url='.urlencode($data->url).'&text='.urlencode($text),
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 77e0353 (.)
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u=".urlencode($data->url),
            'twitter' => "https://twitter.com/intent/tweet?url=".urlencode($data->url)
                ."&text=".urlencode($text)
                .($data->via ? "&via=".urlencode($data->via) : "")
                .($data->hashtags ? "&hashtags=".urlencode($data->hashtags) : ""),
            'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url=".urlencode($data->url),
            'whatsapp' => "https://api.whatsapp.com/send?text=".urlencode($text." ".$data->url),
            'telegram' => "https://t.me/share/url?url=".urlencode($data->url)."&text=".urlencode($text),
<<<<<<< HEAD
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
            'copy' => $data->url,
        ];
    }
}
