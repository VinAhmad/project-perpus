<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
                </a>
            </li>
            @if (Auth::user()->role == 1)
            <li class="nav-item">
                <a href="/type" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Type</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/book" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Book</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/archive" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Archive</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/visitor" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Visitor</p>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="/book" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Book</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/archive" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Archive</p>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
