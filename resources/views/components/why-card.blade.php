@props(['title', 'desc', 'icon', 'index' => '1'])

<div class="relative group p-[1px] rounded-[2rem] overflow-hidden bg-gradient-to-br from-gray-200 to-gray-50 hover:from-primary-400 hover:to-primary-600 transition-all duration-700 shadow-sm hover:shadow-[0_20px_40px_-15px_rgba(2,132,199,0.3)] hover:-translate-y-2 h-full">
    <div class="relative h-full bg-white rounded-[2rem] p-10 flex flex-col items-start z-10 transition-colors duration-700 overflow-hidden">
        {{-- Background decorative number --}}
        <div class="absolute -right-6 -top-10 text-[12rem] font-black text-gray-50/80 group-hover:text-primary-50/20 transition-colors duration-700 select-none z-0 transform group-hover:scale-110 ease-out">
            0{{ $index }}
        </div>
        
        <div class="w-20 h-20 bg-gray-50 border border-gray-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-primary-600 group-hover:text-white transition-all duration-700 z-10 shadow-sm group-hover:shadow-[0_0_30px_rgba(2,132,199,0.5)] group-hover:scale-110 group-hover:-rotate-6">
            {{ $icon }}
        </div>
        
        <h3 class="text-2xl font-extrabold text-gray-900 mb-4 z-10 group-hover:text-primary-600 transition-colors duration-500 tracking-tight">
            {{ $title }}
        </h3>
        <p class="text-gray-500 leading-relaxed z-10 font-medium">
            {{ $desc }}
        </p>

        {{-- Interactive bottom gradient line --}}
        <div class="absolute bottom-0 left-10 right-10 h-1.5 bg-gradient-to-r from-primary-400 to-primary-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-700 ease-out origin-left rounded-t-full z-20"></div>
    </div>
</div>
