<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibroResource;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $query = Libro::query();

    if ($s = request()->query('search')) {
        $query->where('titulo', 'like', "%$s%")
              ->orWhere('autor', 'like', "%$s%");
    }

    return LibroResource::collection(
        $query->orderBy("libro_id", "desc")->paginate(9)
    );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
