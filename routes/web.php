<?php

use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/pdf', static function () {
    $html = view('pdf.example')->render();

    $pdf = Browsershot::html($html)
        ->pdf();

    return response($pdf)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="document.pdf"');
});
