<?php

namespace App\Http\Controllers;

use App\Models\Bicicletas;
use Illuminate\Http\Request;

class BicicletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicis = Bicicletas::all();
        return view('dashboard')->with('bicis', $bicis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('bicicletas.insertar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bicicletas::create([
            'Marca' => $request->input('marca'),
            'Ruedas' => $request->input('ruedas')
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bicicletas $bicicleta)
    {
        return view('bicicletas.editar')->with('bicicleta',$bicicleta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bicicletas $bicicleta)
    {

        $bicicleta->update([
            'Marca' => $request->input('marca'),
            'Ruedas' => $request->input('ruedas')
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bicicletas $bicicleta)//Llamar a variable igual que al parametro que se pasa por ruta
    {
        $bicicleta->delete();

        return redirect()->route('dashboard');
    }
}