<h1>Create Service</h1>

<form method="POST" action="/services">

    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title">
    </div>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>Budget</label>
        <input type="number" name="budget" step="0.01">
    </div>

    <div>
        <label>Deadline</label>
        <input type="date" name="deadline">
    </div>

    <div>
        <label>Category</label>
        <select name="category_id">
    <option value="">Select Category</option>

    @foreach ($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>
    </div>

    <button type="submit">Create Service</button>

</form>
