<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::post('invoices/bulk', [InvoiceController::class, 'bulkStore']);
});




/* Primera parte del ejercicio
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Validator;

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

    //- Versionados de rutas de la api
    Route::prefix('v1')->group(function () {

        //- Listar todos los usuarios
        Route::get('users', function () {
            $user = User::all();
            return response()->json(["success"=>$user], 200);
        });

        //- Crea usuarios
        Route::post('users', function (Request $request) {
            //- Validar el request
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
            ]);

            //- La respuesta de la validación
            if ($validator->fails()) {
                return response()->json(["error"=>$validator->errors()], 400);
            }
            //- Predeterminada la contraseña
            $request['password'] = bcrypt('password');

            //- Crear el usuario
            $user = User::create($request->all());
            return response()->json($user, 201);
        });
    });

    //- Versionados de rutas de la api version 2
    Route::prefix('v2')->group(function () {

        //- Listar todos los usuarios
        Route::get('users', function () {
            $user = User::select('id', 'name', 'email')->get();
            return response()->json(["success"=>$user], 200);
        });

        //- Crea usuarios
        Route::post('users', function (Request $request) {
            //- Validar el request
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);

            //- La respuesta de la validación
            if ($validator->fails()) {
                return response()->json(["error"=>$validator->errors()], 400);
            }

            //- Crear el usuario
            $user = User::create($request->all());
            return response()->json($user, 201);
        });
    });
*/
