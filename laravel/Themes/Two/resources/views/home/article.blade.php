<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <a href="#" class="hover:opacity-75" aria-label="{{ __('pub_theme::blog.article_card.article_link.aria_label', ['title' => $getRecord()->question_txt ?? 'Technology']) }}">
        <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1" alt="">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4" aria-label="{{ __('pub_theme::blog.article_card.category_link.aria_label', ['category' => 'Technology']) }}">Technology</a>
        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4" aria-label="{{ __('pub_theme::blog.article_card.article_link.aria_label', ['title' => $getRecord()->question_txt]) }}">{{ $getRecord()->question_txt }}</a>
        <p class="text-sm pb-3">
            {{ __('pub_theme::blog.article_card.byline_by.label') }} <a href="#" class="font-semibold hover:text-gray-800" aria-label="{{ __('pub_theme::blog.article_card.author_link.aria_label', ['author' => 'David Grzyb']) }}">David Grzyb</a>{{ __('pub_theme::blog.article_card.published_on.message', ['date' => 'April 25th, 2020']) }}
        </p>
        <a href="#" class="pb-6" aria-label="{{ __('pub_theme::blog.article_card.excerpt_link.aria_label') }}">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
        <a href="#" class="uppercase text-gray-800 hover:text-black">{{ __('pub_theme::blog.article_card.read_more.label') }} <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
    </div>
</article>