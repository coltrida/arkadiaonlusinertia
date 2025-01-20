<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function listaAttivita(ActivityService $activityService)
    {
        return Inertia::render('Activity/ListaAttivita', [
            'listaAttivita' => $activityService->listaAttivita()
        ]);
    }

    public function eliminaAttivita(ActivityService $activityService, $id)
    {
        $activityService->elimina($id);
    }

    public function modificaAttivita(ActivityService $activityService, Request $request, Activity $activity)
    {
        $activityService->modifica($activity, $request);
    }
}
