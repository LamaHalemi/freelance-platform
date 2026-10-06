<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Users</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
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
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
        }

        .role {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Users</h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="role">{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>

    @if ($user->id !== auth()->id())

        <form method="POST" action="/admin/users/{{ $user->id }}">

            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>

        </form>

    @else

        Current Admin

    @endif

</td>
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        No users found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>
