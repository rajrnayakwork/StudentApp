<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('Components.nevbar')

    <div class="w-50 pt-5 ms-5 ps-5">
        <ul class="list-group list-group-horizontal row w-50">
            <li class="list-group-item col-6">First Name</li>
            <li class="list-group-item col-6">{{ $user->first_name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal-sm row w-50">
            <li class="list-group-item col-6">Last Name</li>
            <li class="list-group-item col-6">{{ $user->last_name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal-md row w-50">
            <li class="list-group-item col-6">Age</li>
            <li class="list-group-item col-6">{{ $user->age }}</li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
