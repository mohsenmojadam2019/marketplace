<?php

use marketplace\src\Http\Controllers\HelloController;

Route::controller(HelloController::class)->prefix('hello')->group(function() {
    Route::get('hello-world', 'index')->name('hello-world.index');
});
