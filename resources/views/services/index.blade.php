<h1>My Services</h1>

@forelse ($services as $service)

    <div>
        <h2>{{ $service->title }}</h2>

        <p>{{ $service->description }}</p>

        <p>Budget: ${{ $service->budget }}</p>

        <p>Deadline: {{ $service->deadline }}</p>

        <p>Status: {{ $service->status }}</p>

        <a href="/services/{{ $service->id }}/edit">
        Edit
        </a>
        <a href="/services/{{ $service->id }}/offers">
    View Offers
        </a>
        <form method="POST" action="/services/{{ $service->id }}">
    @csrf
    @method('DELETE')

    <button type="submit">
        Delete
    </button>
    </form>
    </div>

@empty

    <p>You don't have any services yet.</p>

@endforelse
