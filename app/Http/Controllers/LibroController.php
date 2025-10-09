<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibroRequest;
use App\Http\Resources\LibroResource;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = Libro::query();

        if ($s = $request->query('search')) {
            $query->where('titulo', 'like', "%$s%")
                  ->orWhere('autor', 'like', "%$s%");
        }

        return LibroResource::collection(
            $query->orderBy('libro_id', 'desc')->paginate(9)
        );
    }

    public function create()
    {
        //
    }

    public function store(StoreLibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return new LibroResource($libro);
    }

    public function show(Libro $libro)
    {
        return new LibroResource($libro);
    }

    public function edit(Libro $libro)
    {
        //
    }

    public function update(StoreLibroRequest $request, Libro $libro)
    {
        $libro->update($request->validated());
        return new LibroResource($libro);
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return response()->json([
            'message' => 'Libro eliminado correctamente'
        ], 200);
    }
}
