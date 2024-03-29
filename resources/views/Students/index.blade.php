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
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="main pt-5">
        <div class="d-flex justify-content-center pb-1">
            <div class="header d-flex justify-content-between w-50">
                <h4>Students</h4>
                <a href="{{ route('students.create') }}"><button type="button" class="btn btn-outline-dark">Add
                        Student</button></a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table w-50">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Subjects</th>
                        <th scope="col">Birth Place</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($students as $index => $student)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->age }}</td>
                            @switch($student->gender)
                                @case(1)
                                    <td>Male</td>
                                @break

                                @case(2)
                                    <td>Female</td>
                                @break

                                @case(3)
                                    <td>Other</td>
                                @break
                            @endswitch
                            <td> {{ '|' }}
                                @foreach ($student->subjects as $subject)
                                    {{ $subject->name . ' | ' }}
                                @endforeach
                            </td>
                            <td>{{ $student->city->name }}</td>
                            <td>
                                <a href="{{ route('students.edit', [$student->id]) }}"><button type="button"
                                        class="btn btn-outline-success">Edit</button></a>
                                <a href="{{ route('students.destroy', [$student->id]) }}"><button type="button"
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
