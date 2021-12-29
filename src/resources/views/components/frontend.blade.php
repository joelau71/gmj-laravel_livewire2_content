<div class="laravel_livewire2_content" id="laravel_livewire2_content_{{$page_element_id}}">
    <x-frontend.row>
        {!! $collection->getTranslation("content", $locale) !!}
    </x-frontend.row>
</div>

@push("css")
    <style>
        .laravel_livewire2_content .content_circle_image {
            position: relative;
        }

        .laravel_livewire2_content .content_circle_image .circle {
            position: relative;
            overflow: hidden;
        }

        .laravel_livewire2_content .content_circle_image .circle.circle1{
            width: 300px;
            height: 300px;
            float: left;
            border-radius: 50%;
            margin: 20px;
            shape-outside: circle();

        }
        .laravel_livewire2_content .content_circle_image .circle.circle2{
            width: 300px;
            height: 300px;
            float: right;
            border-radius: 50%;
            margin: 20px;
            shape-outside: circle();
        }
        .laravel_livewire2_content .content_circle_image .circle img{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media screen and (min-width:768px) {
            .laravel_livewire2_content .content_circle_image .circle.circle1{
                width: 500px;
                height: 500px;
            }
            .laravel_livewire2_content .content_circle_image .circle.circle2{
                width: 300px;
                height: 300px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        @if($collection->style == 1)
            gsap.from("#laravel_livewire2_content_{{$page_element_id}} .content", {
                scrollTrigger:{
                    trigger: "#laravel_livewire2_content_{{$page_element_id}}",
                    start: 'top 60%',
                    once: true
                },
                y: 200,
                opacity: 0,
                duration: 0.6,
            });
        @endif

        @if($collection->style == 2)
            gsap.from("#laravel_livewire2_content_{{$page_element_id}} .content_circle_image", {
                scrollTrigger:{
                    trigger: "#laravel_livewire2_content_{{$page_element_id}}",
                    start: 'top 60%',
                    once: true
                },
                y: 200,
                opacity: 0,
                duration: 0.6,
            });
        @endif

        @if($collection->style == 3 || $collection->style == 4)
            gsap.from("#laravel_livewire2_content_{{$page_element_id}} .content_two_column > div:nth-child(1)", {
                scrollTrigger:{
                    trigger: "#laravel_livewire2_content_{{$page_element_id}}",
                    start: 'top 60%',
                    once: true
                },
                x: -200,
                opacity: 0,
                duration: 0.6,
            });
            gsap.from("#laravel_livewire2_content_{{$page_element_id}} .content_two_column > div:nth-child(2)", {
                scrollTrigger:{
                    trigger: "#laravel_livewire2_content_{{$page_element_id}}",
                    start: 'top 60%',
                    once: true
                },
                x: -200,
                x: 200,
                opacity: 0,
                duration: 0.6,
            });
        @endif
    </script>
@endpush