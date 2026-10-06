<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Categories</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 25px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .card p {
            margin: 0;
            color: #6b7280;
        }

        .card form {
    margin-top: 15px;
}

.card button {
    border: none;
    padding: 9px 14px;
    border-radius: 8px;
    background: #dc2626;
    color: white;
    cursor: pointer;
}

.card button:hover {
    background: #b91c1c;
}
    </style>
</head>

<body>

<div class="container">

    <h1>Categories</h1>

    <div class="categories">

        @forelse ($categories as $category)

            <div class="card">

    <h2>{{ $category->name }}</h2>

    <p>
        Services: {{ $category->services()->count() }}
    </p>

    <form method="POST" action="/admin/categories/{{ $category->id }}">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

</div>

        @empty

            <p>No categories found.</p>

        @endforelse

    </div>

</div>

</body>
</html>
