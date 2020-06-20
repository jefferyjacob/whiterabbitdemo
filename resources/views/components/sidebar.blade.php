<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Demo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('files.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Upload File</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('files.list') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Active File List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('files.uploaded') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Uploaded History</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('files.deleted') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Deleted History</p>
                </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>