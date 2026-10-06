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

        if (auth()->user()->role === 'freelancer') {
        $services = Service::where('status', 'open')->get();
        } else {
        $services = Service::where('user_id', auth()->id())->get();
        }

        return view('services.index', compact('services'));
    }


    public function show(Service $service)
    {
        Gate::authorize('view', $service);

        return view('services.show', compact('service'));
    }

    public function createOffer(Service $service)
    {
        Gate::authorize('view', $service);

        return view('offers.create', compact('service'));
    }

    public function storeOffer(Request $request, Service $service)
    {
        Gate::authorize('view', $service);

        $data = $request->validate([
        'price' => 'required|numeric|min:0',
        'message' => 'required|string',
        'delivery_days' => 'required|integer|min:1',
        ]);

        $data['service_id'] = $service->id;
        $data['user_id'] = auth()->id();

        \App\Models\Offer::create($data);

        return redirect('/services/' . $service->id);
    }

    public function offers(Service $service)
    {
        Gate::authorize('view', $service);

        $offers = $service->offers;

        return view('services.offers', compact('service', 'offers'));
    }

    public function myProjects()
    {
        $projects = Service::where('status', 'in_progress')
            ->whereHas('offers', function ($query) {
                $query->where('user_id', auth()->id())
                    ->where('status', 'accepted');
            })
            ->get();

        return view('services.projects', compact('projects'));
    }

    public function complete(Service $service)
    {
        $hasAcceptedOffer = $service->offers()
            ->where('user_id', auth()->id())
            ->where('status', 'accepted')
            ->exists();

        if (!$hasAcceptedOffer) {
            abort(403);
        }

        if ($service->status !== 'in_progress') {
            abort(400, 'This project is not in progress.');
        }

        $service->update([
            'status' => 'completed',
        ]);

        return redirect('/my-projects');
    }
}
