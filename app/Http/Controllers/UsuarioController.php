<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Usuario::query();

        if ($s = $request->query('search')) {
            $query->where('nombre', 'like', "%{$s}%")
                  ->orWhere('apellido', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%");
        }

        return UsuarioResource::collection(
            $query->orderBy('usuario_id', 'desc')->paginate(5)
        );
    }

    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();
        $usuario = Usuario::create($data);

        return (new UsuarioResource($usuario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();
        $usuario->update($data);

        return new UsuarioResource($usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->noContent();
    }
}
