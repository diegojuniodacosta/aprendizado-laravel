<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carros = Car::all();
        //dd($carros);

        return view('carros-index', ['carros' => $carros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carros-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        Car::create($request->all());

        return redirect()
            ->route('carros.index')
            ->with('success', 'Carro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('carros-edit', ['carro' => $car]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        return redirect()
            ->route('carros.index')
            ->with('success', 'Carro atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return Redirect::back()
            ->with('success', 'Carro excluído com sucesso!');
    }
}
