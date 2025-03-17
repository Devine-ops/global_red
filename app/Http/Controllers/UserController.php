<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => true,
            'usuário' => $user
        ],200);
    }

    public function show(User $id)
    {
        return response()->json([
            'status' => true,
            'usuário' => $id
        ],200);
    } 

    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try{
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Usuário cadastrado com sucesso!",
            ],201);

        }catch (Exception $e){
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => "Erro ao cadastrar usuário!",
                'erro' => $e
            ],400);
        }
    }

    public function update(UserRequest $request, User $id)
    {

        DB::beginTransaction();

        try{

            $id->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => "Usuário editado com sucesso!",
            ],200);

        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => "Erro não editado!",
                'erro' => $e
            ],400);

        }

        return response()->json([
            'status' => true,
            'usuario' => $id,
            'message' => "Usuário editado com sucesso!",
        ],200);
    }

    public function destroy(User $id)
    {
        try{

            $id->delete();

            return response()->json([
                'status' => true,
                'message' => "Usuário exluido com sucesso!",
            ],200);
    
        } catch(Exception $e){
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => "Erro ao apagar usuário!",
                'erro' => $e
            ],400);

        }
    }
}
