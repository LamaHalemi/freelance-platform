<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Services</title>

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

        .status {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Services</h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Freelancer</th>
                <th>Category</th>
                <th>Budget</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($services as $service)

                <tr>
                    <td>{{ $service->id }}</td>

                    <td>{{ $service->title }}</td>

                    <td>{{ $service->user->name }}</td>

                    <td>{{ $service->category->name }}</td>

                    <td>${{ $service->budget }}</td>

                    <td>{{ $service->deadline }}</td>

                    <td class="status">
                        {{ $service->status }}
                    </td>
                    <td>

    <form method="POST" action="/admin/services/{{ $service->id }}">

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
                    <td colspan="8">
                        No services found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>
