<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/cliente', function (Request $request, Cliente $cliente) {
    try {
        $validator = $cliente->validate($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $cliente->insert($request->all());
            return response()->json(['success' => 'Cliente registrado com sucesso.']);
        }
    } catch (\Throwable $th) {
        return $th;
    }
});

Route::put('/cliente/{id}', function ($id, Request $request, Cliente $cliente) {
    try {
        $validator = $cliente->validate($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $cliente->find($id)->update($request->all());
            return response()->json(['success' => 'Cliente atualizado com sucesso.']);
        }
    } catch (\Throwable $th) {
        return $th;
    }
});

Route::delete('/cliente/{id}', function ($id, Cliente $cliente) {
    try {
        $cliente->find($id)->delete();
        return response()->json(['success' => 'Cliente deletado com sucesso.']);
    } catch (Throwable $th) {
        return $th;
    }
});

Route::get('/cliente/{id}', function ($id, Cliente $cliente) {
    try {
        return $cliente->find($id);
    } catch (\Throwable $th) {
        return $th;
    }
});

Route::get('/consulta/final-placa/{numero}', function ($numero, Cliente $cliente) {
    try {
        return $cliente->getClientesPlacaNumeroFinal($numero);
    } catch (\Throwable $th) {
        return $th;
    }
});
