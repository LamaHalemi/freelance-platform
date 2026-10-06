<h1>Service Details</h1>

<h2>{{ $service->title }}</h2>

<p>
    Description: {{ $service->description }}
</p>

<p>
    Budget: ${{ $service->budget }}
</p>

<p>
    Deadline: {{ $service->deadline }}
</p>

<p>
    Status: {{ $service->status }}
</p>

<p>
    Category: {{ $service->category->name }}
</p>

<p>
    Customer: {{ $service->user->name }}
</p>

@if (auth()->user()->role === 'freelancer')
    <a href="/services/{{ $service->id }}/offers/create">
        Make an Offer
    </a>
@endif
@if (
    auth()->user()->role === 'customer' &&
    auth()->id() === $service->user_id &&
    $service->status === 'completed' &&
    !$service->reviews()->where('customer_id', auth()->id())->exists()
)

    <a href="/services/{{ $service->id }}/reviews/create">
        Add Review
    </a>

@endif
