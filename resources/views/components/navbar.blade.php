<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="/" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
        <h2 class="mb-2 text-white">{{ $brand ?? "Tugas Study Club" }}</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link"><img src="img/172554545850959702.png" alt="login" style="height: 24px"></a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="/login" class="dropdown-item">Login</a>
                    <a href="/register" class="dropdown-item">Register</a>
                </div>
            </div>
            <a href="/" class="nav-item nav-link">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link">Services</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="/EasySend" class="dropdown-item">EasySend</a>                    
                </div>
            </div>
            
            <a href="/about" class="nav-item nav-link">About</a>
        </div>
    </div>
</nav>