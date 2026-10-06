<h1>Reviews</h1>

<p>
    Service: {{ $service->title }}
</p>

@forelse ($reviews as $review)

    <div>
        <p>
            Customer: {{ $review->customer->name }}
        </p>

        <p>
            Freelancer: {{ $review->freelancer->name }}
        </p>

        <p>
            Rating: {{ $review->rating }}/5
        </p>

        <p>
            Comment: {{ $review->comment }}
        </p>

        <hr>
    </div>

@empty

    <p>No reviews yet.</p>

@endforelse
