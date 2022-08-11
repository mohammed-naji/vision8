<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <h1>Basic Form</h1>
        {{-- @include('forms.errors') --}}

        <form method="post" action="{{ route('form5_data') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>CV</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" />
                @error('cv')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-dark w-25">Send</button>
            </div>

        </form>
    </div>

  </body>
</html>
