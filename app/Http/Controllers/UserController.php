<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function listaOperatori(UserService $userService)
    {
        return Inertia::render('User/ListaOperatori', [
            'listaOperatoriPaginate' => $userService->listaOperatoriPaginate()
        ]);
    }

    public function eliminaOperatore(UserService $userService, $id)
    {
        $userService->eliminaUser($id);
    }
}
