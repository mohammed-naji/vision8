<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <h1>Basic Form</h1>
        @include('forms.errors')
        <form method="post" action="{{ route('contact_us') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" placeholder="First Name" class="form-control" name="fname" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" class="form-control" name="lname" />
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" placeholder="Email" class="form-control" name="email" />
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" placeholder="Phone" class="form-control" name="phone" />
            </div>

            <div class="mb-3">
                <label>Message</label>
                <textarea rows="5" placeholder="Message" class="form-control" name="message" ></textarea>
            </div>

            <div class="mb-3">
                <label>CV</label>
                <input type="file" class="form-control" name="cv" />
            </div>

            <div class="text-center">
                <button class="btn btn-dark w-25">Send</button>
            </div>

        </form>
    </div>

  </body>
</html>
