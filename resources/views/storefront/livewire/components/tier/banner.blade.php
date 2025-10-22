<div>
    @foreach ($tier->banners as $banner)
        <x-dynamic-component :component="'trafikrak::banners.' . $banner->type->value" :banner="$banner"/>
    @endforeach
</div>
