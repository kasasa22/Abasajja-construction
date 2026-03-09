@extends('layouts.app')

@section('title', 'Abasajja Construction Company — Premium House Plans & Design')

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-secondary overflow-hidden min-h-[90vh] flex items-center" x-data="{ shown: false }" x-intersect="shown = true">
        {{-- Background Elements --}}
        <div class="absolute inset-0 bg-gradient-to-r from-secondary via-secondary/90 to-transparent z-20"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center z-0 scale-105 transform origin-center" :class="shown ? 'transition-transform duration-[10s] ease-out scale-100' : ''"></div>

        {{-- Moving Architectural Silhouette --}}
        <div
            class="absolute inset-0 z-10 opacity-10 animate-move-bg"
            style="background-image: url('{{ asset('images/skyline.png') }}'); background-repeat: repeat-x; background-size: auto 150%; background-position: left bottom;"
        ></div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 w-full">
            <div class="max-w-3xl reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md rounded-full px-4 py-2 border border-white/10 mb-8">
                    <span class="flex h-2 w-2 rounded-full bg-primary-400 animate-pulse"></span>
                    <span class="text-sm font-semibold text-primary-50 tracking-wide uppercase">Award-winning Designs</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-8 tracking-tight">
                    Smart house designs <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-primary-200">built for living.</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 mb-10 leading-relaxed max-w-2xl font-light reveal-hidden delay-100" :class="shown ? 'reveal-visible' : ''">
                    Browse ready-made house plans or request a custom design tailored to your plot, budget, and climate. Practical, buildable, and stunning.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 reveal-hidden delay-200" :class="shown ? 'reveal-visible' : ''">
                    <a href="{{ url('/plans') }}" class="group relative px-8 py-4 bg-primary-600 text-white rounded-xl font-bold shadow-[0_0_40px_-10px_rgba(2,132,199,0.5)] hover:shadow-[0_0_60px_-15px_rgba(2,132,199,0.7)] hover:bg-primary-500 transition-all overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
                        <span class="relative z-10 flex items-center gap-2">
                            Browse Catalogue
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </span>
                    </a>
                    <a href="{{ url('/contact') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-xl font-bold hover:bg-white/20 hover:border-white/40 transition-all text-center flex items-center justify-center">
                        Request Custom Design
                    </a>
                </div>

                <div class="mt-16 grid grid-cols-2 sm:grid-cols-3 gap-8 border-t border-white/10 pt-10 reveal-hidden delay-300" :class="shown ? 'reveal-visible' : ''">
                    <div>
                        <div class="text-4xl font-extrabold text-white">30<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-400 font-medium tracking-wide uppercase mt-2">Ready Plans</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold text-white">120<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-400 font-medium tracking-wide uppercase mt-2">Custom Projects</div>
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-4xl font-extrabold text-white">4<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-400 font-medium tracking-wide uppercase mt-2">Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Plans Section --}}
    <section class="py-24 bg-gray-50" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Our Portfolio</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">Featured Masterpieces</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Hand-picked plans for different budgets and lifestyles. Find the perfect starting point for your dream home.
                </p>
            </div>

            <div class="reveal-hidden delay-100" :class="shown ? 'reveal-visible' : ''">
                <x-plans-grid :limit="3" />
            </div>

            <div class="text-center mt-16 reveal-hidden delay-200" :class="shown ? 'reveal-visible' : ''">
                <a href="{{ url('/plans') }}" class="inline-flex items-center px-8 py-4 border-2 border-gray-900 text-gray-900 font-bold rounded-xl hover:bg-gray-900 hover:text-white transition-all group">
                    View Complete Catalogue
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="py-24 bg-white relative overflow-hidden" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-primary-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-blue-50 rounded-full blur-3xl opacity-50"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20 reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">The ABS Advantage</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">Why build with us?</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    We combine architectural expertise with local construction knowledge to deliver plans that are easy to build and beautiful to live in.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="reveal-hidden delay-100" :class="shown ? 'reveal-visible' : ''">
                    <x-why-card
                        title="Local Knowledge"
                        desc="Designs adapted to local climates, materials, and building regulations to ensure completely smooth construction."
                        index="1"
                    >
                        <x-slot:icon>
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </x-slot:icon>
                    </x-why-card>
                </div>

                <div class="reveal-hidden delay-200" :class="shown ? 'reveal-visible' : ''">
                    <x-why-card
                        title="Cost Effective"
                        desc="Plans meticulously optimised for cost-effective construction without compromising on quality, safety, or aesthetics."
                        index="2"
                    >
                        <x-slot:icon>
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </x-slot:icon>
                    </x-why-card>
                </div>

                <div class="reveal-hidden delay-300" :class="shown ? 'reveal-visible' : ''">
                    <x-why-card
                        title="Fully Customisable"
                        desc="We can seamlessly modify any of our existing plans to perfectly fit your specific plot, budget, and family needs."
                        index="3"
                    >
                        <x-slot:icon>
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </x-slot:icon>
                    </x-why-card>
                </div>
            </div>
        </div>
    </section>

    <x-testimonials />
    <x-partners />
@endsection
