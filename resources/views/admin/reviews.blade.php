<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Reviews</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
        }

        .rating {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Reviews</h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Customer</th>
                <th>Freelancer</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($reviews as $review)

                <tr>
                    <td>{{ $review->id }}</td>

                    <td>{{ $review->service->title }}</td>

                    <td>{{ $review->customer->name }}</td>

                    <td>{{ $review->freelancer->name }}</td>

                    <td class="rating">
                        {{ $review->rating }}/5
                    </td>

                    <td>{{ $review->comment }}</td>
                    <td>

    <form method="POST" action="/admin/reviews/{{ $review->id }}">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

</td>
                </tr>

            @empty

                <tr>
                    <td colspan="7">
                        No reviews found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>
