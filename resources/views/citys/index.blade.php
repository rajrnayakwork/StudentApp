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
    <div class="main pt-5">
        <div class="d-flex justify-content-center">
            <a href="{{ route('citys.create') }}"><button type="button" class="btn btn-outline-dark">Add
                    City</button></a>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <h4>City</h4>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <table class="table w-50">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">City Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($citys as $index => $city)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $city->name }}</td>
                            <td>
                                <a href="{{ route('citys.edit', [$city->id]) }}"><button type="button"
                                        class="btn btn-outline-success">Edit</button></a>
                                <a href="{{ route('citys.destroy', [$city->id]) }}"><button type="button"
                                        class="btn btn-outline-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
