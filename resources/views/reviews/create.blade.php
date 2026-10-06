<h1>Add Review</h1>

<p>
    Service: {{ $service->title }}
</p>

<form method="POST" action="/services/{{ $service->id }}/reviews">

    @csrf

    <div>
        <label>Rating</label>

        <input
            type="number"
            name="rating"
            min="1"
            max="5"
        >
    </div>

    <div>
        <label>Comment</label>

        <textarea name="comment"></textarea>
    </div>

    <button type="submit">
        Submit Review
    </button>

</form>
