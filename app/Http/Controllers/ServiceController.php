<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Service::class);

        return 'You can create a service';
    }

    public function edit(Service $service)
    {
        Gate::authorize('update', $service);

        return 'You can edit this service';
    }
    public function destroy(Service $service)
    {
        Gate::authorize('delete', $service);

        return 'You can delete this service';
    }
    public function index()
    {
        Gate::authorize('viewAny', Service::class);

        $services = Service::all();

        return $services;
    }
    public function show(Service $service)
    {
        Gate::authorize('view', $service);

        return $service;
    }
}
