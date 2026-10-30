<div>
    <x-banner>
        @if ($activeCategory)
            <h1>{{ __('pub_theme::post_list.header.category.title', ['name' => $activeCategory->name]) }}</h1>
        @else
            <h1>{{ __('pub_theme::post_list.header.all.title') }}</h1>
        @endif
    </x-banner>

    <x-container>
        @if ($postChunks->isNotEmpty())
            <div class="mt-8 flex flex-col gap-4 lg:items-center lg:flex-row">
                <x-select name="category" wire:model.live="category">
                    <option value="">{{ __('pub_theme::common.filters.all_categories.label') }}</option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->slug }}"
                            @if ($activeCategory && $activeCategory->slug === $category->slug) selected @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </x-select>

                <x-select name="order" wire:model.live="order">
                    <option value="date_desc">{{ __('pub_theme::post_list.sort.newest.label') }}</option>
                    <option value="date_asc">{{ __('pub_theme::post_list.sort.oldest.label') }}</option>
                </x-select>

                <div class="lg:ml-auto">
                    {{ trans_choice('pub_theme::post_list.results.count.message', $postCount, ['count' => $postCount]) }}
                </div>
            </div>

            <div>
                @foreach ($postChunks as $chunk)
                    @if ($currentChunk >= $loop->index)
                        @livewire('post-chunk', ['postIds' => $chunk], key("chunk-{$queryCount}-{$loop->index}"))
                    @endif
                @endforeach
            </div>

            @if ($currentChunk < count($postChunks) - 1)
                <div class="mt-16 flex justify-center">
                    <x-button :label="__('pub_theme::post_list.actions.load_more.label')" wire:click="loadMore"></x-button>
                </div>
            @endif

        @else
            <div class="my-16 text-center">{{ __('pub_theme::post_list.empty.none.message') }}</div>
        @endif
    </x-container>
</div>
