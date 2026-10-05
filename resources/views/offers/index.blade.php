<h1>My Offers</h1>

@forelse ($offers as $offer)

    <div>
        <h2>{{ $offer->service->title }}</h2>

        <p>
            Price: ${{ $offer->price }}
        </p>

        <p>
            Message: {{ $offer->message }}
        </p>

        <p>
            Delivery Days: {{ $offer->delivery_days }}
        </p>

        <p>
            Status: {{ $offer->status }}
        </p>

        <a href="/offers/{{ $offer->id }}/edit">
        Edit
        </a>
        <form method="POST" action="/offers/{{ $offer->id }}">
    @csrf
    @method('DELETE')

    <button type="submit">
        Delete
    </button>
</form>

        <hr>
    </div>

@empty

    <p>You don't have any offers yet.</p>

@endforelse
