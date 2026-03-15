@extends('layouts.app')

@section('title', 'Contact Us — Abasajja Construction')

@section('content')
<div class="bg-white min-h-screen">

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-16 text-center"
             x-data="{ shown: false }" x-intersect="shown = true">
        <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <span class="inline-block text-primary-600 font-bold tracking-[0.2em] uppercase text-xs mb-5">Let's Connect</span>
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-6 tracking-tighter leading-none">
                Let's build <br>
                <span class="text-gray-400 font-light italic">something</span> great.
            </h1>
            <p class="text-lg md:text-xl text-gray-500 leading-relaxed max-w-xl mx-auto font-light">
                Have a question or want to discuss a project? Fill out the form or reach out directly.
            </p>
        </div>
    </section>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-28">
        <div class="grid lg:grid-cols-5 gap-10 items-start">

            {{-- Left: Contact Info --}}
            <div class="lg:col-span-2 space-y-6 lg:pt-8">

                {{-- Phone --}}
                <div class="group bg-gray-50 border border-gray-100 rounded-3xl p-8 hover:shadow-lg transition-all duration-300"
                     x-data="{ shown: false }" x-intersect.margin.-50px="shown = true">
                    <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''">
                        <div class="w-12 h-12 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Direct Line</p>
                        <p class="text-2xl font-black text-gray-900 tracking-tight">+256 769 344 073</p>
                        <p class="mt-3 text-xs font-semibold text-primary-600 uppercase tracking-widest">Mon – Sat &nbsp;·&nbsp; 7am – 7pm</p>
                    </div>
                </div>

                {{-- Email --}}
                <div class="group bg-gray-900 border border-gray-800 rounded-3xl p-8 hover:shadow-lg transition-all duration-300"
                     x-data="{ shown: false }" x-intersect.margin.-50px="shown = true">
                    <div class="reveal-hidden delay-100" :class="shown ? 'reveal-visible' : ''">
                        <div class="w-12 h-12 bg-gray-800 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-1">Email</p>
                        <p class="text-base font-medium text-white break-all hover:text-primary-400 transition-colors cursor-pointer">
                            abasajjagroupofcompanies@gmail.com
                        </p>
                        <p class="mt-3 text-xs font-semibold text-primary-500 uppercase tracking-widest">Replies within 24 hours</p>
                    </div>
                </div>

                {{-- Office --}}
                <div class="group bg-gray-50 border border-gray-100 rounded-3xl p-8 hover:shadow-lg transition-all duration-300"
                     x-data="{ shown: false }" x-intersect.margin.-50px="shown = true">
                    <div class="reveal-hidden delay-200" :class="shown ? 'reveal-visible' : ''">
                        <div class="w-12 h-12 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Headquarters</p>
                        <p class="text-base font-medium text-gray-800 leading-relaxed">
                            Makerere, Kavule<br>Basima Building<br>Kampala, Uganda
                        </p>
                    </div>
                </div>

            </div>

            {{-- Right: Contact Form --}}
            <div class="lg:col-span-3" x-data="{ shown: false }" x-intersect="shown = true">
                <div class="bg-white border border-gray-200 rounded-3xl p-8 md:p-12 shadow-xl reveal-hidden delay-100"
                     :class="shown ? 'reveal-visible' : ''">

                    <div x-data="{
                        form: { name: '', email: '', phone: '', message: '' },
                        success: null,
                        submit() {
                            if (!this.form.name || !this.form.email || !this.form.message) {
                                this.success = { ok: false, message: 'Please fill out all required fields.' };
                                return;
                            }
                            const text = `Name: ${this.form.name}\nEmail: ${this.form.email}\nPhone: ${this.form.phone}\nMessage: ${this.form.message}`;
                            window.open(Alpine.store('whatsapp').getLink(text), '_blank');
                            this.success = { ok: true, message: 'Opening WhatsApp...' };
                            this.form = { name: '', email: '', phone: '', message: '' };
                        }
                    }">
                        <h2 class="text-3xl font-black text-gray-900 mb-1 tracking-tight">Send a Message</h2>
                        <p class="text-gray-400 mb-10 text-base font-light">We reply to every inquiry within 24 hours.</p>

                        <form class="space-y-6" @submit.prevent="submit">

                            {{-- Name & Email Row --}}
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <label for="name" class="block text-xs font-bold uppercase tracking-widest text-gray-500">Full Name <span class="text-primary-600">*</span></label>
                                    <input x-model="form.name" type="text" id="name" required
                                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                                           placeholder="e.g. John Doe" />
                                </div>
                                <div class="space-y-1">
                                    <label for="email" class="block text-xs font-bold uppercase tracking-widest text-gray-500">Email Address <span class="text-primary-600">*</span></label>
                                    <input x-model="form.email" type="email" id="email" required
                                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                                           placeholder="you@email.com" />
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="space-y-1">
                                <label for="phone" class="block text-xs font-bold uppercase tracking-widest text-gray-500">Phone Number</label>
                                <input x-model="form.phone" type="tel" id="phone"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                                       placeholder="+256 700 000 000" />
                            </div>

                            {{-- Message --}}
                            <div class="space-y-1">
                                <label for="message" class="block text-xs font-bold uppercase tracking-widest text-gray-500">Your Message <span class="text-primary-600">*</span></label>
                                <textarea x-model="form.message" id="message" required rows="5"
                                          class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition resize-none"
                                          placeholder="Tell us about your project..."></textarea>
                            </div>

                            {{-- Alert --}}
                            <div x-show="success" x-transition style="display:none"
                                 :class="success && success.ok ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'"
                                 class="p-4 rounded-xl border text-sm font-semibold flex items-center gap-2">
                                <svg x-show="success && success.ok" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span x-text="success ? success.message : ''"></span>
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                    class="w-full sm:w-auto flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#1EBE5C] text-white font-bold text-sm uppercase tracking-widest px-10 py-4 rounded-2xl transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98] shadow-lg shadow-green-200">
                                <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Send via WhatsApp
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
