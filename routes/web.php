<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdmnistratorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta por defecto
Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', [UserController::class,'index']);
Route::get('/nombre/{name}', [UserController::class,'showname']);

//Ejemplo de ruta
Route::get('/hola', function () {
    return "hola soy una ruta";
})->name('saludo'); // nombre de a ruta es saludo

//Ruta operador suma sin parametros

Route::get('/suma', function () {

    $a=5;
    $b=10;
    return $a + $b;
})->name('operacion');//nombre de la ruta es operacion


//Ruta con parametros en la url
Route::get('/nombre/{nombre}', function ($nombre) {
    return 'mi nombre es  '.$nombre;
})->name('tu.nombre');

// Ruta se llama suma resive parametro
Route::get('/suma/{a}', function ($a) {

    $b=3;


    return 'la suma  es  '.$a + $b;

});

// Ruta de operacion suma muestar el parametro en la url
Route::get('/operacion/{a?}', function ($a=4) {

    $b=3;

    return $a + $b;

});

// Ruta para pasar 2 parametros en la url
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {

    return $postId + $commentId;

});

// Ruta para filtar el parametro en letras mayuscula o minusculas, aceptara un string en minuscula o mayuscula
/*Route::get('/user/{name}', function ($name) {

return $name;

    //
})->where('name', '[A-Za-z]+');
*/

// Rutas que permite solo numeros del 0 al 9  

/*
Route::get('/user/{id}', function ($id) {

    return $id;
    //
})->where('id', '[0-9]+');
*/

// Ruta que permite ambos caracteres de 0 a 9 y de A a la z
Route::get('/user/{id}/{name}', function ($id, $name) {

     return $id . $name;


    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


//Ruta que redirige a artuculos desde publicaciones
Route::redirect('/publicacionesyy', '/LARAVEL/proyecto/public/articulosv', 302);
//Route::redirect('/publicacionesj','http://localhost/LARAVEL/proyecto/public/articulosde');


//Route::permanentRedirect('/publicacionesu', 'http://localhost/LARAVEL/proyecto/public/articulosb');


//muestra la ruta actual que es articulos
Route::get('/articulosv', function (){
    
    return 'Estoy en articulos';
});
// redirige a saludo
Route::get('/redirigir', function (){
    
    return redirect()->route('saludo');
});

//verifica si la ruta existe en caso de esta despliega un mensaje con la condicion de if
Route::get('/verificar', function (){
    
     if (Request::route()->named('verify')) {

        return "OK";
    }else{

         return "no es la ruta";

    }
})->name('verify');


//grupo de rutas con namespace
Route::namespace('Admin')->group(function () {
        Route::get('/admin' ,[AdmnistratorController::class , 'index']);
        Route::get('/dashboard' ,[DashboardController::class , 'index']);
        Route::get('/invoice' ,[InvoiceController::class , 'index']);
});

/*Route::group(['namespace' => 'Admin'] ,function(){
});*/


Route::prefix('seccion')->group(function () {

    Route::get('/primera', function () {
        return 'Primera...';
    });

     Route::get('/segunda', function () {
        return 'segunda...';
    });

     Route::get('/tercera', function () {
        return 'tercera...';
    });

});

Route::name('calzado.')->prefix('/zapatos')->group(function () {
    Route::get('/deportivos', function () {
        return 'Deportivos';
    })->name('zapato');

    Route::get('/casuales', function () {
        return 'Casual';
    })->name('casual');

    Route::get('/sandalias', function () {
        return 'sandalias';
    })->name('sanda');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
