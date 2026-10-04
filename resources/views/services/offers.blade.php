<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
<h1>Offers</h1>

<p>Service: {{ $service->title }}</p>

@foreach ($offers as $offer)

    <p>
        Offer ID: {{ $offer->id }}
    </p>

    <p>
        Price: ${{ $offer->price }}
    </p>

    <p>
        Message: {{ $offer->message }}
    </p>

    <hr>

@endforeach
