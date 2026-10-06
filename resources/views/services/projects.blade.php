<h1>My Projects</h1>

@forelse ($projects as $project)

    <div>
        <h2>{{ $project->title }}</h2>

        <p>
            Description: {{ $project->description }}
        </p>

        <p>
            Budget: ${{ $project->budget }}
        </p>

        <p>
            Deadline: {{ $project->deadline }}
        </p>

        <p>
            Status: {{ $project->status }}
        </p>

        <p>
            Customer: {{ $project->user->name }}
        </p>

        <form method="POST" action="/projects/{{ $project->id }}/complete">

    @csrf
    @method('PUT')

    <button type="submit">
        Mark Completed
    </button>

</form>

        <hr>
    </div>

@empty

    <p>You don't have any projects yet.</p>

@endforelse
