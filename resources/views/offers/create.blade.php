<h1>Create Offer</h1>

<p>Service: {{ $service->title }}</p>

<form method="POST" action="/services/{{ $service->id }}/offers">

    @csrf

    <div>
        <label>Price</label>
        <input type="number" name="price" step="0.01">
    </div>

    <div>
        <label>Message</label>
        <textarea name="message"></textarea>
    </div>

    <div>
        <label>Delivery Days</label>
        <input type="number" name="delivery_days">
    </div>

    <button type="submit">
        Submit Offer
    </button>

</form>
