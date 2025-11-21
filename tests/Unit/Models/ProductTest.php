<?php

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Trafikrak\Models\Product;

it('has reviews', function () {
    $product = new Product();
    expect($product->reviews())->toBeInstanceOf(HasMany::class);
});

it('has courses', function () {
    $product = new Product();
    expect($product->courses())->toBeInstanceOf(BelongsToMany::class);
});
