<h1>Edit Service</h1>

<form method="POST" action="/services/{{ $service->id }}">

    @csrf
    @method('PUT')

    <div>
        <label>Title</label>
        <input
            type="text"
            name="title"
            value="{{ $service->title }}"
        >
    </div>

    <div>
        <label>Description</label>
        <textarea name="description">{{ $service->description }}</textarea>
    </div>

    <div>
        <label>Budget</label>
        <input
            type="number"
            name="budget"
            step="0.01"
            value="{{ $service->budget }}"
        >
    </div>

    <div>
        <label>Deadline</label>
        <input
            type="date"
            name="deadline"
            value="{{ $service->deadline }}"
        >
    </div>

    <div>
        <label>Category</label>

        <select name="category_id">

            @foreach ($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $category->id == $service->category_id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>
    </div>

    <button type="submit">
        Update Service
    </button>

</form>
