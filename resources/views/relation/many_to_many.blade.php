<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Portla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <h1>Welcome {{ $std->name }}</h1>
        {{-- @dump($std->courses->find(2)) --}}
        <form action="{{ route('many_to_many_data') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Course Name</th>
                <th>Course Hours</th>
            </tr>
            @foreach ($courses as $course)
            <tr>
                <td>
                    <input {{ $std->courses->find($course->id) ? 'checked' : '' }}  type="checkbox" name="course_id[]" value="{{ $course->id }}">
                </td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->hours }}</td>
            </tr>
            @endforeach
        </table>
        <button class="btn btn-primary px-5">Register</button>
        </form>
    </div>

  </body>
</html>
