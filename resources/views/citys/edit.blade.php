<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

@include('Components.nevbar')

<body class="text-info-emphasis">
    <form class="pt-5" method="POST" action="{{ route('citys.update') }}">
        <input type="hidden" name="id" value="{{ $city->id }}">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="card w-50 bg-info-subtle text-info-emphasis">
                <div class="card-header">
                    <h2>Edit City Form</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="city_name" class="form-label">City Name</label>
                        <input type="text" class="form-control w-50" id="city_name" name="city_name"
                            value="{{ $city->name }}">
                        @error('city_name')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="{{ route('citys.index') }}"><button type="button"
                            class="btn btn-outline-secondary ">Cancel</button></a>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
