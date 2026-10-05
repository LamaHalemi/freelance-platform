<h1>Edit Offer</h1>

<p>
    Service: {{ $offer->service->title }}
</p>

<form method="POST" action="/offers/{{ $offer->id }}">

    @csrf
    @method('PUT')

    <div>
        <label>Price</label>

        <input
            type="number"
            name="price"
            step="0.01"
            value="{{ $offer->price }}"
        >
    </div>

    <div>
        <label>Message</label>

        <textarea name="message">{{ $offer->message }}</textarea>
    </div>

    <div>
        <label>Delivery Days</label>

        <input
            type="number"
            name="delivery_days"
            value="{{ $offer->delivery_days }}"
        >
    </div>

    <button type="submit">
        Update Offer
    </button>

</form>
