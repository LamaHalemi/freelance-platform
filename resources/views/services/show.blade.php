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
