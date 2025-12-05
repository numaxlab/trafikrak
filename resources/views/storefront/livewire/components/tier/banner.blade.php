<div>
    @foreach ($tier->banners as $banner)
        <x-dynamic-component :component="'testa::banners.' . $banner->type->value" :banner="$banner"/>
    @endforeach
</div>
