<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <h1>All Posts</h1>


        <table class="table table-hover table-bordered table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                    <a onclick="return confirm('Are you sure?')" href="{{ route('posts.forcedelete', $post->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            @endforeach

        </table>
        <a href="{{ route('posts.restore_all') }}" class="btn btn-success"> <i class="fas fa-undo"></i> Restore All</a>
        <a onclick="return confirm('Are you sure?')" href="{{ route('posts.delete_all') }}" class="btn btn-danger"><i class="fas fa-times"></i> Delete All</a>

    </div>
  </body>
</html>
