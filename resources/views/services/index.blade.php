<h1>My Services</h1>

<form method="GET" action="/services">

    <input
        type="text"
        name="search"
        placeholder="Search services..."
        value="{{ request('search') }}"
    >

    <select name="category_id">

        <option value="">
            All Categories
        </option>

        @foreach ($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>

        @endforeach

    </select>

    <input
    type="number"
    name="min_budget"
    placeholder="Min budget"
    value="{{ request('min_budget') }}"
    min="0"
>

<input
    type="number"
    name="max_budget"
    placeholder="Max budget"
    value="{{ request('max_budget') }}"
    min="0"
>
<select name="status">

    <option value="">
        All Statuses
    </option>

    <option
        value="open"
        {{ request('status') == 'open' ? 'selected' : '' }}
    >
        Open
    </option>

    <option
        value="in_progress"
        {{ request('status') == 'in_progress' ? 'selected' : '' }}
    >
        In Progress
    </option>

    <option
        value="completed"
        {{ request('status') == 'completed' ? 'selected' : '' }}
    >
        Completed
    </option>

</select>

    <button type="submit">
        Search
    </button>

</form>



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

{{ $services->links() }}
