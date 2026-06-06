         FINAL CTA SECTION
         =====================================
 —}}
    <section class="py-20 md:py-24 bg-gradient-to-br from-emerald-950/50 to-slate-950">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Pronto a Iniziare?
            </h2>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto mb-8">
                Unisciti alla nostra community e inizia a prevedere il futuro. 
                <span class="text-emerald-400 font-semibold">Gratis, senza rischi.</span>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/' . app()->getLocale() . '/register') }}" 
                   class="btn btn-primary btn-lg btn-kinetic shadow-lg shadow-emerald-500/30">
                    Crea Account Gratis
                </a>
                <a href="{{ url('/' . app()->getLocale() . '/predicts') }}" 
                   class="btn btn-ghost btn-lg gap-2">
                    Esplora i Mercati
                    <x-heroicon-o-arrow-right class="w-5 h-5" />
                </a>
            </div>
            <p class="text-sm text-slate-400 mt-6">
                Nessuna carta di credito richiesta • Setup in 2 minuti
            </p>
        </div>
    </section>
    
</main>
