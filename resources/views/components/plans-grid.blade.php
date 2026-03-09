@props(['limit' => null])

@php
    $plans = [
        [
            'id' => 1,
            'title' => 'Modern Family Villa',
            'description' => 'A spacious 4-bedroom villa with open-plan living and large terraces.',
            'category' => 'Villa',
            'price' => 450.0,
            'beds' => 4,
            'baths' => 3,
            'sqm' => 240
        ],
        [
            'id' => 2,
            'title' => 'Minimalist Bungalow',
            'description' => 'Compact and efficient 3-bedroom bungalow perfect for smaller plots.',
            'category' => 'Bungalow',
            'price' => 280.0,
            'beds' => 3,
            'baths' => 2,
            'sqm' => 120
        ],
        [
            'id' => 3,
            'title' => 'Contemporary Apartment',
            'description' => 'Stylish duplex design multi-unit living with private balconies.',
            'category' => 'Apartment',
            'price' => 520.0,
            'beds' => 2,
            'baths' => 2,
            'sqm' => 95
        ],
        [
            'id' => 4,
            'title' => 'Eco-Friendly Cottage',
            'description' => 'Sustainable 2-bedroom cottage using natural materials and solar ready.',
            'category' => 'Cottage',
            'price' => 195.0,
            'beds' => 2,
            'baths' => 1,
            'sqm' => 85
        ],
        [
            'id' => 5,
            'title' => 'Luxury Mansion',
            'description' => 'Grand 6-bedroom estate with swimming pool and double garage.',
            'category' => 'Mansion',
            'price' => 1200.0,
            'beds' => 6,
            'baths' => 5,
            'sqm' => 550
        ],
        [
            'id' => 6,
            'title' => 'Multipurpose building',
            'description' => 'A modern, multipurpose building design crafted for flexibility, efficiency, and visual impact.',
            'category' => 'Storeyed house',
            'price' => 286.0,
            'beds' => 8,
            'baths' => 8,
            'sqm' => 198
        ]
    ];

    if ($limit) {
        $plans = array_slice($plans, 0, $limit);
    }
@endphp

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach($plans as $index => $plan)
        <div class="reveal-hidden transition-all duration-700" 
             style="transition-delay: {{ $index * 150 }}ms;"
             x-data="{ shown: false }" 
             x-intersect.margin.-50px="shown = true" 
             :class="shown ? 'reveal-visible' : ''">
            <x-plan-card :plan="$plan" />
        </div>
    @endforeach
</div>
