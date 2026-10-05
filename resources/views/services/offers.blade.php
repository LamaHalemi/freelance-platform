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

  @if ($offer->status === 'pending' && $service->status === 'open')

    <form method="POST" action="/offers/{{ $offer->id }}/accept">

        @csrf
        @method('PUT')

        <button type="submit">
            Accept Offer
        </button>

    </form>

@endif

    <hr>

@endforeach
