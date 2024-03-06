<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-info-emphasis">
    <form class="pt-5" method="POST" action="{{ route('store') }}">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="card w-50">
                <div class="card-header bg-info-subtle text-info-emphasis">
                    <h2>Registration</h2>
                </div>
                <div class="card-body row">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        Go To The <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="col-1 pt-3">
                        <a href="{{ route('students.index') }}"><button type="button"
                                class="btn btn-outline-secondary ">Cancel</button></a>
                    </div>
                    <div class="col-1 pt-3">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>