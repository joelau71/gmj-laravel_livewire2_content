<?php

use GMJ\LaravelLivewire2Content\Http\Livewire\Backend;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => ["web", "auth"],
    "prefix" => "admin/element/{element_id}/laravel_livewire2_content",
    "as" => "LaravelLivewire2Content."
], function () {
    Route::get("", Backend::class)->name("index");
});
