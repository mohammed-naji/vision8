<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Add New Post</h1>
            <a class="btn btn-primary px-5" href="{{ route('posts.index') }}">All Posts</a>
        </div>

        @include('forms.errors')

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('posts.form')

            <button class="btn btn-success px-5">Add</button>
        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
      </script>
  </body>
</html>
