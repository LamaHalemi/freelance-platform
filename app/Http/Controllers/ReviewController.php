<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Service $service)
    {

        if (auth()->user()->role !== 'customer') {
            abort(403);
        }

        if (auth()->id() !== $service->user_id) {
            abort(403);
        }

        if ($service->status !== 'completed') {
            abort(400, 'This project is not completed yet.');
        }

        if ($service->reviews()->where('customer_id', auth()->id())->exists()) {
            abort(400, 'You have already reviewed this project.');
        }

        return view('reviews.create', compact('service'));
    }


    public function store(Request $request, Service $service)
    {
        if (auth()->user()->role !== 'customer') {
            abort(403);
        }

        if (auth()->id() !== $service->user_id) {
            abort(403);
        }

        if ($service->status !== 'completed') {
            abort(400, 'This project is not completed yet.');
        }

        if ($service->reviews()->where('customer_id', auth()->id())->exists()) {
            abort(400, 'You have already reviewed this project.');
        }

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $freelancer = $service->offers()
            ->where('status', 'accepted')
            ->first()
            ->user;

        Review::create([
            'service_id' => $service->id,
            'customer_id' => auth()->id(),
            'freelancer_id' => $freelancer->id,
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);

        return redirect('/services/' . $service->id);
    }

    public function index(Service $service)
    {
        $reviews = $service->reviews()->with([
            'customer',
            'freelancer'
        ])->get();

        return view('reviews.index', compact('service', 'reviews'));
    }
}
