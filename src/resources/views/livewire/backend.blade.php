<div>
    @php
    $breadcrumbs = [
        ['name' => 'Element', 'link' => route("admin.element.index")],
        ['name' => $element->title],
        ['name' => "Content"],
        ['name' => $mode]
    ];
    @endphp
    <x-admin.widget.breadcrumb :breadcrumbs="$breadcrumbs" />

    <div class="relative mt-4">
        <x-admin.atoms.required />

        <div class="mt-2" wire:ignore>
            <x-admin.widget.select id="style" class="w-full appearance-none rounded-lg border-gray-300">
                <option
                    value="1"
                    @if ($collection->style == "1") selected @endif
                >
                    Normal
                </option>
                <option
                    value="2"
                    @if ($collection->style == "2") selected @endif
                >
                    Circle Image
                </option>
                <option
                    value="3"
                    @if ($collection->style == "3") selected @endif
                >
                    Left Image Right Content
                </option>
                <option
                    value="4"
                    @if ($collection->style == "4") selected @endif
                >
                    Left Content Right Image
                </option>
                <option
                    value="5"
                    @if ($collection->style == "5") selected @endif
                >
                    Gallery 5 photo
                </option>
            </x-admin.widget.select>
        </div>

        <div>
            @foreach (config('translatable.locales') as $locale)
                <x-admin.widget.row>
                    <div>
                        <x-admin.widget.label class="required mb-2">
                            Content({{ $locale }})
                        </x-admin.widget.label>
                        <div class="tinymce bg-white" data-lang="{{$locale}}" id="content_{{$locale}}">
                            {!! $collection->getTranslation("content", $locale) !!}
                        </div>
                    </div>
                </x-admin.widget.row>
            @endforeach
        </div>
        
        <hr class="my-10">

        <x-admin.widget.button-group>
            <x-admin.widget.link href="{{ url()->previous() }}">
                Back
            </x-admin.widget.link>
            <x-admin.widget.button id="save">
                Save
            </x-admin.widget.button>
        </x-admin.widget.button-group>
    </div>
</div>

@push("css")
    <style>
        .content_circle_image {
            position: relative;
        }

        .content_circle_image .circle {
            position: relative;
            overflow: hidden;
        }

        .content_circle_image .circle.circle1{
            width: 300px;
            height: 300px;
            float: left;
            border-radius: 50%;
            margin: 20px;
            shape-outside: circle();

        }
        .content_circle_image .circle.circle2{
            width: 300px;
            height: 300px;
            float: right;
            border-radius: 50%;
            margin: 20px;
            shape-outside: circle();
        }
        .content_circle_image .circle img{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media screen and (min-width:768px) {
            .content_circle_image .circle.circle1{
                width: 500px;
                height: 500px;
            }
            .content_circle_image .circle.circle2{
                width: 300px;
                height: 300px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        $(function(){
            $("#save").on("click", function(){
                const content = {};
                const style = $("#style").val();
                @foreach (config('translatable.locales') as $locale)
                    content["{{$locale}}"] = tinymce.get("content_{{$locale}}").getContent();
                @endforeach

                Livewire.emit("save", content, style);
            });
            $("#style").on("change", function(e){
                
                const val = e.target.value;
                console.log(val);
                Livewire.emit("changeStyle", val);
            });
        });
    </script>
@endpush

