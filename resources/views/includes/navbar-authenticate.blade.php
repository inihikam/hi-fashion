<nav class="navbar navbar-expand-lg navbar-light navbar-shop fixed-top navbar-fixed-top" data-aos="zoom-in-up">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo.svg" alt="Hi-Lifestyle" class="logo-image" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/categories.html" class="nav-link">Categories</a>
                </li>
            </ul>
            <!-- Dekstop UI -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="/images/profile.jpg" alt="" class="rounded-circle mr-2 profile-pict" />
                        Hi, Randy
                    </a>
                    <div class="dropdown-menu">
                        <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                        <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="/" class="dropdown-item">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="cart.html" class="nav-link d-inline-block mt-2">
                        <img src="/images/cart-icon.svg" alt="Cart" />
                    </a>
                </li>
            </ul>

            <!-- Mobile UI -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="#" class="nav-link"> Hi, Randy </a>
                </li>
                <li class="nav-item">
                    <a href="cart.html" class="nav-link d-inline-block"> Cart </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
