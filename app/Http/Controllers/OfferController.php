<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

   public function accept(Offer $offer)
    {
        if (auth()->id() !== $offer->service->user_id) {
        abort(403);
        }

        if ($offer->service->status !== 'open') {
        abort(400, 'This service is not open for offers.');
        }

    DB::transaction(function () use ($offer) {

            $offer->update([
            'status' => 'accepted',
            ]);

        Offer::where('service_id', $offer->service_id)
            ->where('id', '!=', $offer->id)
            ->update([
                'status' => 'rejected',
            ]);

            $offer->service->update([
            'status' => 'in_progress',
            ]);
        });

        return redirect('/services/' . $offer->service_id . '/offers');
    }
}
