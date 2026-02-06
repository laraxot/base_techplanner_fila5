@props([
    'title' => '',
    'description' => '',
    'cta_label' => 'Iscriviti',
    'privacy_note' => '',
])

<div class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-8 md:p-12 text-center text-white">
            <!-- Icon -->
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <!-- Content -->
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-white/90 max-w-2xl mx-auto mb-8">
                {{ $description }}
            </p>

            <!-- Form -->
            <form class="max-w-lg mx-auto" @submit.prevent>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="email"
                           placeholder="La tua email"
                           class="flex-1 px-5 py-3 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white"
                           required>
                    <button type="submit"
                            class="px-8 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        {{ $cta_label }}
                    </button>
                </div>
            </form>

            <!-- Privacy Note -->
            <p class="text-sm text-white/80 mt-4">
                {{ $privacy_note }}
            </p>
        </div>
    </div>
</div>