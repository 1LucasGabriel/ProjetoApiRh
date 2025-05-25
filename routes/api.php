<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Funcionario;
use App\Models\Departamento;

//ROTAS P/ FUNCIONÁRIOS

// Cria funcionário
Route::post('/funcionarios' , function (Request $request ) {
    $funcionario = new Funcionario();
    $funcionario ->nome = $request ->input('nome');;
    $funcionario ->email = $request ->input('email');;
    $funcionario ->salario = $request ->input('salario');;
    $funcionario ->cargo = $request ->input('cargo');;
    $funcionario ->departamento_id = $request ->input('departamento_id');;
    $funcionario ->save();
    return response ()->json($funcionario);
});

// Lista todos funcionários
Route::get('/funcionarios', function () {
    $funcionarios = Funcionario::all();
    return response()->json($funcionarios);
});

// Lista funcionário por ID
Route::get('/funcionarios/{id}', function ($id){
    $funcionario = Funcionario::find($id);

    if (!$funcionario) {
        return response()->json(['error' => 'Funcionário não encontrado'], 404);
    }

    return response()->json($funcionario);
});

// Atualiza funcionário
Route::patch('/funcionarios/{id}', function(Request $request, $id){
    $funcionario = Funcionario::find($id);

    if($request->input('nome') !== null){
        $funcionario->nome = $request->input('nome');
    }
    if($request->input('email') !== null){
        $funcionario->email = $request->input('email');
    }
    if($request->input('salario') !== null){
        $funcionario->salario = $request->input('salario');
    }
    if($request->input('cargo') !== null){
        $funcionario->cargo = $request->input('cargo');
    }
    if($request->input('departamento_id') !== null){
        $funcionario->departamento_id = $request->input('departamento_id');
    }

    $funcionario->save();
    return response()->json($funcionario);
});

// Deleta funcionário
Route::delete('funcionarios/{id}', function($id){
    $funcionario = Funcionario::find($id);
    $funcionario->delete();
    return response()->json($funcionario);
});

// Listar todos funcionários com seus departamentos
Route::get('/funcionarios-departamentos', function () {
    $funcionarios = Funcionario::with('departamento')->get();
    return response()->json($funcionarios);
});

// Buscar o departamento de um funcionário por ID
Route::get('/funcionarios-departamento/{id}', function ($id) {
    $funcionario = Funcionario::with('departamento')->find($id);
    
    if (!$funcionario) {
        return response()->json(['error' => 'Funcionário não encontrado'], 404);
    }
    
    return response()->json($funcionario->departamento);
});







//ROTAS P/ DEPARTAMENTOS

// Cria departamento
Route::post('/departamentos' , function (Request $request ) {
    $departamento = new Departamento();
    $departamento ->nome = $request ->input('nome');;
    $departamento ->save();
    return response ()->json($departamento );
});

// Lista todos departamentos
Route::get('/departamentos', function () {
    $departamentos = Departamento::all();
    return response()->json($departamentos);
});

// Lista departamento por ID
Route::get('/departamentos/{id}', function ($id){
    $departamento = Departamento::find($id);

    if (!$departamento) {
        return response()->json(['error' => 'Departamento não encontrado'], 404);
    }

    return response()->json($departamento);
});

// Atualiza departamento
Route::patch('/departamentos/{id}', function(Request $request, $id){
    $departamento = Departamento::find($id);

    if($request->input('nome') !== null){
        $departamento->nome = $request->input('nome');
    }

    $departamento->save();
    return response()->json($departamento);
});

// Deleta departamento
Route::delete('departamentos/{id}', function($id){
    $departamento = Departamento::find($id);
    $departamento->delete();
    return response()->json($departamento);
});

// Listar todos departamentos com seus funcionários
Route::get('/departamentos-funcionarios', function () {
    $departamentos = Departamento::with('funcionarios')->get();
    return response()->json($departamentos);
});

// Buscar funcionários de um departamento por ID
Route::get('/departamentos-funcionarios/{id}', function ($id) {
    $departamento = Departamento::with('funcionarios')->find($id);
    
    if (!$departamento) {
        return response()->json(['error' => 'Departamento não encontrado'], 404);
    }
    
    return response()->json($departamento->funcionarios);
});
