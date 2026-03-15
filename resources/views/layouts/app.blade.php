<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Abasajja Construction Company — Premium House Plans & Design')</title>
    <meta name="description" content="@yield('meta_description', 'Affordable, climate-adapted house plans and custom designs. Browse featured plans or request a custom design.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Cart Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                items: JSON.parse(localStorage.getItem('abs_cart') || '[]'),

                add(item) {
                    const key = item.id + ':' + (item.packageKey || 'standard');
                    const existing = this.items.find(i => (i.id + ':' + (i.packageKey || 'standard')) === key);
                    if (existing) {
                        existing.quantity = (existing.quantity || 1) + 1;
                    } else {
                        this.items.push({ ...item, quantity: 1 });
                    }
                    this.save();
                },

                remove(index) {
                    this.items.splice(index, 1);
                    this.save();
                },

                clear() {
                    this.items = [];
                    this.save();
                },

                save() {
                    localStorage.setItem('abs_cart', JSON.stringify(this.items));
                },

                get count() {
                    return this.items.reduce((acc, i) => acc + (i.quantity || 1), 0);
                },

                get subtotal() {
                    return this.items.reduce((acc, i) => acc + (i.price * (i.quantity || 1)), 0);
                }
            });

            Alpine.store('whatsapp', {
                baseUrl: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
                    ? 'https://wa.me/'
                    : 'https://web.whatsapp.com/send',
                phone: '256769344073',

                getLink(text = '') {
                    if (this.baseUrl.includes('wa.me')) {
                        return `https://wa.me/${this.phone}?text=${encodeURIComponent(text)}`;
                    }
                    return `${this.baseUrl}?phone=${this.phone}&text=${encodeURIComponent(text)}`;
                }
            });
        });
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen flex flex-col">
    <x-navbar />

    <main class="flex-grow pt-16">
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>
