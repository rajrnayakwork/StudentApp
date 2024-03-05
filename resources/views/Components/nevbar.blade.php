<!-- Nav-Bar Start -->
<nav class="navbar navbar-expand-lg" style="background-color: #cff4fc;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('students.index') }}">StudentApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('citys.index') }}">Citys</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Nav-Bar End -->
