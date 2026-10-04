<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Service::class);

        $categories = \App\Models\Category::all();

        return view('services.create', compact('categories'));
    }


    public function store(Request $request)
    {
    Gate::authorize('create', Service::class);

    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'budget' => 'required|numeric|min:0',
        'deadline' => 'nullable|date',
        'category_id' => 'required|exists:categories,id',
    ]);

    $data['user_id'] = auth()->id();

    Service::create($data);

    return 'Service created successfully';
    }


    public function edit(Service $service)
    {
        Gate::authorize('update', $service);

        $categories = \App\Models\Category::all();

        return view('services.edit', compact('service', 'categories'));
    }


    public function update(Request $request, Service $service)
    {
    Gate::authorize('update', $service);

    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'budget' => 'required|numeric|min:0',
        'deadline' => 'nullable|date',
        'category_id' => 'required|exists:categories,id',
    ]);

    $service->update($data);

    return redirect('/services');
    }


    public function destroy(Service $service)
    {
        Gate::authorize('delete', $service);

        $service->delete();

    return redirect('/services');
    }


    public function index()
    {
        Gate::authorize('viewAny', Service::class);

        $services = Service::where('user_id', auth()->id())->get();

        return view('services.index', compact('services'));
    }


    public function show(Service $service)
    {
        Gate::authorize('view', $service);

        return $service;
    }

    public function offers(Service $service)
    {
    Gate::authorize('view', $service);

    $offers = $service->offers;

    return view('services.offers', compact('service', 'offers'));
    }
}
