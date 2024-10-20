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

//- Mi primera funcion
Route::get('/random/{min}/{max}', function ($min, $max) {
    //- Validar que los valores sean numericos
    if(!is_numeric($min) || !is_numeric($max)){
        return response()->json([
            'error' => 'Los valores deben ser numericos'
        ], 400);
    }

    //- Validar que el valor minimo sea menor al valor maximo
    if($min > $max){
        return response([
            'error' => 'El valor minimo debe ser menor al valor maximo'
        ], 400);
    }

    $number = rand($min, $max);
    return response([
        'random' => $number
    ], 200);

});
