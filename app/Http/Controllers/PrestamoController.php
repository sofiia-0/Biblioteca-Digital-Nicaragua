<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Http\Resources\PrestamoResource;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Prestamo::with(['libro', 'usuario']); // eager loading para evitar N+1

        if ($estado = $request->query('estado')) {
            $query->where('estado', $estado);
        }

        return PrestamoResource::collection(
            $query->orderBy("prestamo_id", "desc")->paginate(9)
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
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
