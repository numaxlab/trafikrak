<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Trafikrak\Models\Content\Page;
use Trafikrak\Models\Content\Section;

uses(RefreshDatabase::class);

it('casts section to Section enum', function () {
    $page = new Page(['section' => Section::BOOKSHOP]);
    expect($page->section)->toBeInstanceOf(Section::class);
});

it('casts content to array', function () {
    $page = Page::factory()->create(['content' => '{"foo":"bar"}']);
    expect($page->content)->toBeArray();
});

/*it('returns correct has_breadcrumb attribute', function (?Section $section, bool $expected) {
    $page = new Page();
    $page->section = $section;
    expect($page->has_breadcrumb)->toBe($expected);
})->with([
    [Section::BOOKSHOP, true],
    [Section::EDITORIAL, true],
    [Section::EDUCATION, true],
    [Section::HOMEPAGE, false],
    [null, false],
]);

it('returns correct breadcrumb_route_name attribute', function (?Section $section, ?string $expected) {
    $page = new Page();
    $page->section = $section;
    expect($page->breadcrumb_route_name)->toBe($expected);
})->with([
    [Section::BOOKSHOP, 'trafikrak.storefront.bookshop.homepage'],
    [Section::EDITORIAL, 'trafikrak.storefront.editorial.homepage'],
    [Section::EDUCATION, 'trafikrak.storefront.education.homepage'],
    [Section::HOMEPAGE, null],
    [null, null],
]);

it('returns correct human_section attribute', function (?Section $section, ?string $expected) {
    $page = new Page();
    $page->section = $section;
    expect($page->human_section)->toBe($expected);
})->with([
    [Section::BOOKSHOP, 'Librería'],
    [Section::EDITORIAL, 'Editorial'],
    [Section::EDUCATION, 'Formación'],
    [Section::HOMEPAGE, null],
    [null, null],
]);*/

