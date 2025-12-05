<?php

use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Testa\Models\Content\Banner;
use Testa\Models\Content\BannerType;
use Testa\Models\Content\Location;

it('casts type to BannerType enum', function () {
    $banner = new Banner(['type' => 'full-width']);
    expect($banner->type)->toBeInstanceOf(BannerType::class);
});

it('casts locations to enum collection of Location', function () {
    $banner = new Banner();
    $casts = $banner->getCasts();
    expect($casts['locations'])->toBe(AsEnumCollection::class.':'.Location::class);
});
