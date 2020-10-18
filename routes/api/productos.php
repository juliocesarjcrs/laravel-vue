<?php
Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('productos')->group( function(){
    Route::get('listar-productos', 'ProductosController@listar_productos');
    Route::get('exportar-productos', 'ProductosController@exportar_productos');
});
});
