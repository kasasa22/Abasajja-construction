<section class="py-24 bg-gray-50 relative overflow-hidden">
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 right-1/2 translate-x-[30vw] -mt-20 w-80 h-80 bg-primary-100 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-[40vw] -mb-20 w-80 h-80 bg-gray-200 rounded-full blur-3xl opacity-60"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
        <div class="text-center mb-20 reveal-hidden" :class="shown ? 'reveal-visible' : ''">
            <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Success Stories</h2>
            <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">What our clients say</h3>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Trusted by homeowners and builders across the region. Here is what they have to say about our designs.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $testimonials = [
                    [
                        'name' => 'Sarah M.',
                        'role' => 'Homeowner',
                        'content' => 'The plans were detailed and easy for my contractor to follow. We saved so much time and money using a pre-designed plan. Highly incredibly executed.',
                        'image' => 'images/cus1.jpeg',
                        'delay' => 100
                    ],
                    [
                        'name' => 'David K.',
                        'role' => 'Property Developer',
                        'content' => "I've used ABS Company for three projects now. Their designs are modern, efficient, and sell really well. Unmatched quality and very professional execution.",
                        'image' => 'images/cus2.jpeg',
                        'delay' => 200
                    ],
                    [
                        'name' => 'Grace A.',
                        'role' => 'First-time Builder',
                        'content' => 'I was nervous about building, but the team helped me customize a plan to fit my budget perfectly. A wonderful, stress-free experience overall!',
                        'image' => 'images/cus3.jpeg',
                        'delay' => 300
                    ]
                ];
            @endphp

            @foreach($testimonials as $t)
                <div class="reveal-hidden" :class="shown ? 'reveal-visible' : ''" style="transition-delay: {{ $t['delay'] }}ms">
                    <div class="bg-white p-10 rounded-[2rem] shadow-sm border border-gray-100 h-full relative overflow-hidden group hover:shadow-[0_20px_40px_-15px_rgba(2,132,199,0.15)] hover:border-primary-100 transition-all duration-500 transform hover:-translate-y-2 flex flex-col">
                        
                        {{-- Large Background Quote --}}
                        <svg class="absolute -top-4 -right-4 w-32 h-32 text-gray-50 transform rotate-12 group-hover:text-primary-50 transition-colors duration-500 z-0" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-2.2 1.8-4 4-4V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-2.2 1.8-4 4-4V8z"/>
                        </svg>

                        <div class="relative z-10 flex-grow">
                            <div class="flex text-yellow-400 mb-6 drop-shadow-sm">
                                @for($j = 0; $j < 5; $j++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            
                            <p class="text-gray-600 text-lg leading-relaxed mb-10 font-medium group-hover:text-gray-900 transition-colors duration-300">
                                "{{ $t['content'] }}"
                            </p>
                        </div>

                        <div class="relative z-10 flex items-center pt-6 border-t border-gray-100 group-hover:border-primary-100 transition-colors duration-300 mt-auto">
                            <div class="relative">
                                <div class="absolute inset-0 bg-primary-200 rounded-full transform scale-110 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <img src="{{ asset($t['image']) }}" alt="{{ $t['name'] }}" class="relative w-14 h-14 rounded-full object-cover ring-2 ring-white z-10" />
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900 text-lg leading-tight">{{ $t['name'] }}</h4>
                                <p class="text-xs font-bold text-primary-600 uppercase tracking-widest mt-1">{{ $t['role'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
