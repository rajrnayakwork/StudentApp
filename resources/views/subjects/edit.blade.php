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
    <form class="pt-5" method="POST" action="{{ route('subjects.update') }}">
        <input type="hidden" name="id" value="{{ $subject->id }}">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="card w-50">
                <div class="card-header bg-info-subtle text-info-emphasis">
                    <h2>Edit Subject Form</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control w-50" id="subject_name" name="subject_name"
                            value="{{ $subject->name }}">
                        @error('subject_name')
                            <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="{{ route('subjects.index') }}"><button type="button"
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
