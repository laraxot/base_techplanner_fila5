<div>

    <x-banner image="$article->getMainImage()">
        <div class="text-4xl text-white">
            <h1>
                {{ $article->title }}
                {{-- @isset($isPeekPreviewModal) [Preview] @endisset --}}
            </h1>
        </div>
    </x-banner>

    <x-std tpl='container'>
        <div class="prose mt-8 mx-auto text-black">
            @if ($article->content_blocks)
<<<<<<< HEAD
                <x-render-blocks :blocks="$article->content_blocks" :model="$article" />
=======
                <x-render.blocks :blocks="$article->content_blocks" :model="$article" />
>>>>>>> 6ed19256f (.)
            @endif

            <hr>

<<<<<<< HEAD
            <x-post-meta :post="$article" />

            <x-post-footer :blocks="$article->footer_blocks" />
=======
            <x-article.meta :article="$article" />

            <x-article.footer :article="$article" :blocks="$article->footer_blocks" />
>>>>>>> 6ed19256f (.)

        </div>
    </x-std>
</div>
<<<<<<< HEAD


=======
>>>>>>> 6ed19256f (.)
