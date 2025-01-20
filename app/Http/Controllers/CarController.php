<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    public function listaCar(CarService $carService)
    {
        return Inertia::render('Car/ListaCar', [
            'listaVetture' => $carService->listaVetture()
        ]);
    }

    public function eliminaCar(CarService $carService, $id)
    {
        $carService->elimina($id);
    }

    public function modificaCar(CarService $carService, Request $request, Car $car)
    {
        $carService->modifica($car, $request);
    }
}
