@extends('layouts.app')
@section('content')
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                    From the blog
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Learn how to grow your business with our expert advice. (from tailwind)
                </p>
            </div>
            @foreach($posts as $post)
            <article class="relative isolate flex flex-col gap-8 lg:flex-row mt-10 bg-black/10 rounded-2xl shadow-md p-6 lg:p-12 hover:bg-black/30 transition-all duration-300">
                @if(count($post->images) > 0)
                    <div class="swiper post-gallery relative w-full lg:w-1/2">
                        <div class="swiper-wrapper">
                            @foreach ($post->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-64 object-cover">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                @else
                    <div class="no-gallery w-full lg:w-1/2">
                        <div class="bg-gray-100 h-64 flex items-center justify-center rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-500 ml-2">No images available</p>
                        </div>
                    </div>
                @endif
                <div class="w-full lg:w-1/2">
                    <div class="group relative">
<h3 class="mt-3 text-lg leading-6 font-semibold text-gray-900 group-hover:text-gray-600">
    <a href="{{ route('posts.show', $post) }}" 
       class="text-blue-600 hover:text-blue-800 hover:underline underline-offset-4 transition-colors duration-200">
        <span class="absolute inset-0"></span>
        {{ $post->title }}
    </a>
</h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                            {{ $post->body }}
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=0D8ABC&color=fff" 
                             alt="{{ $post->user->name }}"
                             class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->user->name }}
                                </a>
                            </p>
                            <p class="text-gray-600">{{ $post->user->role ?? 'Normal User' }}</p>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only initialize Swiper on galleries that exist
        const swipers = document.querySelectorAll('.post-gallery');
        
        if (swipers.length === 0) return; // No galleries to initialize
        
        swipers.forEach(function(swiperEl) {
            // Count the number of slides in this gallery
            const slideCount = swiperEl.querySelectorAll('.swiper-slide').length;
            
            // Only proceed if there are slides
            if (slideCount === 0) return;
            
            // Only enable loop if there are 2 or more slides
            const shouldLoop = slideCount >= 2;
            
            try {
                new Swiper(swiperEl, {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    watchSlidesProgress: true,
                    navigation: {
                        nextEl: swiperEl.querySelector('.swiper-button-next'),
                        prevEl: swiperEl.querySelector('.swiper-button-prev'),
                    },
                    pagination: {
                        el: swiperEl.querySelector('.swiper-pagination'),
                        clickable: true,
                    },
                    loop: shouldLoop,
                    // Only enable autoplay if there are multiple slides
                    autoplay: shouldLoop ? {
                        delay: 5000,
                        disableOnInteraction: false,
                    } : false,
                });
                
                // Hide navigation and pagination if only one slide
                if (!shouldLoop) {
                    const nav = swiperEl.querySelectorAll('.swiper-button-next, .swiper-button-prev');
                    const pagination = swiperEl.querySelector('.swiper-pagination');
                    
                    nav.forEach(el => el.style.display = 'none');
                    if (pagination) pagination.style.display = 'none';
                }
            } catch (error) {
                console.error('Error initializing Swiper:', error);
                // In case of error, apply a fallback style
                swiperEl.classList.add('swiper-error');
            }
        });
    });
</script>
@endpush
@endsection