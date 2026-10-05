<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('user_id', auth()->id())->get();

        return view('offers.index', compact('offers'));
    }

    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
        'price' => 'required|numeric|min:0',
        'message' => 'required|string',
        'delivery_days' => 'required|integer|min:1',
        ]);

        $offer->update($data);

        return redirect('/my-offers');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect('/my-offers');
    }
}
