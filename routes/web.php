<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerJurnal;

Route::resource('jurnals', ControllerJurnal::class);


