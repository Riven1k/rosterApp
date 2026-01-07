<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">RosterApp</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(session('name'))
                    <li class="nav-item">
                        <span class="nav-link text-white">
                            Hi, {{ session('name') }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('availabilities.index') }}">
                            Availabilities
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('fake.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
