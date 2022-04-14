<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //pegar os usuarios no banco de dados e enviar para a view(forma errada de fazer)

        $users = User::get();
       return view('users.index', compact('users'));

    }
    //pega só um usuário pelo id para ser exibido

    public function show($id)
    {
        //usando o first para pegar so um resultado(forma errada)
        //$user = User::where('id', $id)->first();
        //usar o find para pegar o resultado e mais correto
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }
}
