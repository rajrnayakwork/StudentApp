<!-- Nav-Bar Start -->
<div class="row">
    <div class="col-2"></div>
    <nav class="navbar navbar-expand-lg col-8" style="background-color: #cff4fc;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('students.index') }}">StudentApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::user()->role_type == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('citys.index') }}">Citys</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">User</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-2"></div>
</div>
<!-- Nav-Bar End -->
