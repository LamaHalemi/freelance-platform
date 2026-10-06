<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Skills</title>

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
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            margin-bottom: 8px;
            font-size: 32px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
        }

        .skill-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
        }

        .skill-option:hover {
            background: #f9fafb;
            border-color: #cbd5e1;
        }

        .skill-option input {
            width: 17px;
            height: 17px;
        }

        .actions {
            margin-top: 20px;
        }

        button {
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .primary-btn {
            background: #2563eb;
            color: white;
        }

        .primary-btn:hover {
            background: #1d4ed8;
        }

        .add-form {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        select {
            flex: 1;
            min-width: 220px;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
        }

        .my-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
        }

        .skill-name {
            font-weight: 600;
        }

        .remove-btn {
            background: #fee2e2;
            color: #b91c1c;
            padding: 7px 10px;
        }

        .remove-btn:hover {
            background: #fecaca;
        }

        .empty {
            color: #6b7280;
            margin: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>My Skills</h1>
        <p>Manage the skills shown on your freelancer profile.</p>
    </div>


    {{-- Update Skills --}}
    <div class="card">

        <h2>Update My Skills</h2>

        <form method="POST" action="/my-skills/sync">

            @csrf
            @method('PUT')

            <div class="skills-grid">

                @foreach ($skills as $skill)

                    <label class="skill-option">

                        <input
                            type="checkbox"
                            name="skills[]"
                            value="{{ $skill->id }}"
                            {{ $mySkills->contains($skill->id) ? 'checked' : '' }}
                        >

                        <span>{{ $skill->name }}</span>

                    </label>

                @endforeach

            </div>

            <div class="actions">
                <button type="submit" class="primary-btn">
                    Update Skills
                </button>
            </div>

        </form>

    </div>


    {{-- Add Skill --}}
    <div class="card">

        <h2>Add a Skill</h2>

        <form method="POST" action="/my-skills/add" class="add-form">

            @csrf

            <select name="skill_id">

                @foreach ($skills as $skill)

                    <option value="{{ $skill->id }}">
                        {{ $skill->name }}
                    </option>

                @endforeach

            </select>

            <button type="submit" class="primary-btn">
                Add Skill
            </button>

        </form>

    </div>


    {{-- My Skills --}}
    <div class="card">

        <h2>My Skills</h2>

        @forelse ($mySkills as $skill)

            <div class="skill-card">

                <span class="skill-name">
                    {{ $skill->name }}
                </span>

                <form method="POST" action="/my-skills/{{ $skill->id }}">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="remove-btn">
                        Remove
                    </button>

                </form>

            </div>

        @empty

            <p class="empty">
                You don't have any skills yet.
            </p>

        @endforelse

    </div>

</div>

</body>
</html>
