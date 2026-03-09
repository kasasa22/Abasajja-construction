@extends('layouts.app')

@section('title', 'Cart — Abasajja Construction')

@section('content')
<div class="pt-24 pb-20 bg-gray-50 min-h-screen" x-data>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Your Cart
                <span x-show="$store.cart.count > 0"
                      x-text="'(' + $store.cart.count + ' item' + ($store.cart.count !== 1 ? 's' : '') + ')'"
                      class="text-lg font-medium text-gray-400 ml-2"
                      style="display:none"></span>
            </h1>
            <a href="{{ url('/plans') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Browse Plans
            </a>
        </div>

        {{-- Empty State --}}
        <template x-if="$store.cart.items.length === 0">
            <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gray-100 px-6">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-50 rounded-full mb-6 text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
                <p class="text-gray-500 mb-8 max-w-sm mx-auto">Browse our catalogue and add house plans you're interested in.</p>
                <a href="{{ url('/plans') }}" class="inline-flex items-center px-10 py-4 bg-primary-600 text-white font-bold rounded-xl shadow-lg hover:bg-primary-700 transition-all transform hover:-translate-y-0.5">
                    Browse Plans
                </a>
            </div>
        </template>

        {{-- Cart with items --}}
        <template x-if="$store.cart.items.length > 0">
            <div class="grid lg:grid-cols-3 gap-10">

                {{-- Items list --}}
                <div class="lg:col-span-2 space-y-4">
                    <template x-for="(item, idx) in $store.cart.items" :key="idx">
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col sm:flex-row gap-5 group hover:shadow-md transition-all duration-200">

                            {{-- Thumbnail --}}
                            <div class="w-full sm:w-36 h-28 flex-shrink-0 rounded-xl overflow-hidden bg-gray-100">
                                <img
                                    :src="item.image"
                                    :alt="item.title"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    onerror="this.onerror=null; this.src='{{ asset('images/house1.jpeg') }}'"
                                />
                            </div>

                            {{-- Info --}}
                            <div class="flex-grow flex flex-col justify-between">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-lg leading-tight" x-text="item.title"></h3>
                                        <p class="text-sm text-primary-600 font-semibold mt-0.5" x-text="item.packageName || 'Standard Package'"></p>
                                        <p class="text-xs text-gray-400 mt-1" x-text="item.sqm + ' m²  ·  ' + item.beds + ' bed  ·  ' + item.baths + ' bath'"></p>
                                    </div>
                                    <button
                                        @click="$store.cart.remove(idx)"
                                        class="p-2 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all shrink-0"
                                        title="Remove"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    {{-- Quantity controls --}}
                                    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1">
                                        <button
                                            @click="if(item.quantity > 1){ item.quantity--; $store.cart.save() } else { $store.cart.remove(idx) }"
                                            class="w-6 h-6 rounded flex items-center justify-center text-gray-500 hover:bg-gray-200 transition-colors font-bold text-sm"
                                        >−</button>
                                        <span class="w-6 text-center text-sm font-bold text-gray-800" x-text="item.quantity"></span>
                                        <button
                                            @click="item.quantity++; $store.cart.save()"
                                            class="w-6 h-6 rounded flex items-center justify-center text-gray-500 hover:bg-gray-200 transition-colors font-bold text-sm"
                                        >+</button>
                                    </div>

                                    {{-- Line total --}}
                                    <div class="text-right">
                                        <span class="text-xl font-extrabold text-primary-600">
                                            US$ <span x-text="(item.price * item.quantity).toLocaleString()"></span>
                                        </span>
                                        <span class="text-xs text-gray-400 block" x-show="item.quantity > 1" x-text="'US$ ' + item.price + ' each'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- Footer actions --}}
                    <div class="flex justify-end pt-2">
                        <button
                            @click="$store.cart.clear()"
                            class="text-sm text-gray-400 hover:text-red-600 font-medium transition-colors flex items-center gap-1.5"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Clear Cart
                        </button>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 tracking-tight">Order Summary</h3>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Subtotal (<span x-text="$store.cart.count"></span> items)</span>
                                <span class="font-semibold text-gray-800">US$ <span x-text="$store.cart.subtotal.toLocaleString()"></span></span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Tax</span>
                                <span class="font-semibold text-gray-800">US$ 0</span>
                            </div>
                            <div class="border-t border-gray-100 pt-3 mt-3 flex justify-between font-extrabold text-lg text-gray-900">
                                <span>Total</span>
                                <span class="text-primary-600">US$ <span x-text="$store.cart.subtotal.toLocaleString()"></span></span>
                            </div>
                        </div>

                        {{-- WhatsApp Enquiry --}}
                        <button
                            @click="
                                const items = $store.cart.items.map(i => `• ${i.title} (${i.packageName}) — US$${(i.price * i.quantity).toLocaleString()}`).join('\n');
                                const msg = `Hello! I would like to enquire about the following plans:\n\n${items}\n\nTotal: US$${$store.cart.subtotal.toLocaleString()}`;
                                window.open('https://wa.me/256769344073?text=' + encodeURIComponent(msg), '_blank')
                            "
                            class="w-full py-4 bg-[#25D366] hover:bg-[#1EBE5C] text-white font-bold rounded-2xl shadow-lg transition-all hover:-translate-y-0.5 active:scale-[0.98] flex items-center justify-center gap-3 mb-4"
                        >
                            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Enquire via WhatsApp
                        </button>

                        <a
                            href="{{ url('/contact') }}"
                            class="w-full py-3.5 border-2 border-gray-200 hover:border-primary-400 text-gray-700 hover:text-primary-600 font-bold rounded-2xl transition-all text-center flex items-center justify-center gap-2 text-sm"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Send Email Enquiry
                        </a>

                        <p class="mt-5 text-center text-xs text-gray-400">
                            Our team will get back to you within 24 hours to confirm your order.
                        </p>
                    </div>
                </div>

            </div>
        </template>

    </div>
</div>
@endsection
