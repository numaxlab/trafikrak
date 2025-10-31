<div class="relative min-h-100 w-full bg-cover bg-center bg-no-repeat py-16"
     style="background-image: url('{{ Storage::url($slide->image) }}');"
>
    <div class="container mx-auto px-4">
        <h1 class="at-heading is-1">{{ $slide->name }}</h1>

        @if ($slide->description)
            <div class="mt-4 md:max-w-[75%] lg:max-w-[60%]">
                {!! $slide->description !!}
            </div>
        @endif
    </div>
</div>