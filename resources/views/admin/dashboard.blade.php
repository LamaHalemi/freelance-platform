<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            font-size: 18px;
        }

        .count {
            font-size: 32px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Admin Dashboard</h1>

    <div class="cards">

        <div class="card">
            <h2>Users</h2>
            <div class="count">
                {{ $usersCount }}
            </div>
            <a href="/admin/users">
                Manage Users
            </a>
        </div>

        <div class="card">
            <h2>Categories</h2>
            <div class="count">
                {{ $categoriesCount }}
            </div>
            <a href="/admin/categories">
                Manage Categories
            </a>
        </div>

        <div class="card">
            <h2>Services</h2>
            <div class="count">
                {{ $servicesCount }}
            </div>
            <a href="/admin/services">
                Manage Services
            </a>
        </div>

        <div class="card">
            <h2>Reviews</h2>
            <div class="count">
                {{ $reviewsCount }}
            </div>
            <a href="/admin/reviews">
                Manage Reviews
            </a>
        </div>

    </div>

</div>

</body>
</html>
