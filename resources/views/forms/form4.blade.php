<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <h1>Register Form</h1>
        {{-- @include('forms.errors') --}}
        <form method="post" action="{{ route('form4_data') }}">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" />
                @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" placeholder="Password" class="form-control" name="password_confirmation" />
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea placeholder="bio" class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5">{{ old('bio') }}</textarea>
                @error('bio')
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
