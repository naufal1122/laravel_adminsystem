<ul>
    @if (Auth::check() && Auth::user()->role == 'admin')
        <li class="nav-item">
            <a href="{{ url('dashboard96') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('agama96') }}" class="nav-link">
                <p>
                    Crud Agama
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('logout96') }}" class="nav-link">
                <p>
                    Logout
                </p>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ url('profile96') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/changePassword96') }}" class="nav-link">
                <p>
                    Ganti Password
                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('logout96') }}" class="nav-link">
                <p>
                    Logout
                </p>
            </a>
        </li>
    @endif
</ul>
