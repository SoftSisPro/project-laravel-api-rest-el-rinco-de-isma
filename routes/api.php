<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return "Hola Ismael";
});

Route::post('/usuario/{name}', function ($name) {
    return "Hola $name";
});

Route::put('/usuario/{name}', function ($name) {
    return "Hola Actualizar $name";
});

Route::patch('/usuario/{name}', function ($name) {
    return "Hola Actualizar $name";
});

Route::delete('/usuario/{name}', function ($name) {
    return "Se ha borrado el usuario con el id $name";
});
