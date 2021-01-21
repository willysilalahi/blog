<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SEO BLOG</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Blog</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pen-square"></i>
                    <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
                    <li><a class="nav-link" href="{{ route('post.create') }}">Tambah Post</a></li>
                    <li><a class="nav-link" href="{{ route('post.trashed') }}">Post Dihapus</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-align-justify"></i>
                    <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
                    <li><a class="nav-link" href="{{ route('category.create') }}">Tambah Kategori</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i>
                    <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('tag.index') }}">List Tag</a></li>
                    <li><a class="nav-link" href="{{ route('tag.create') }}">Tambah Tag</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
                    <li><a class="nav-link" href="{{ route('user.create') }}">Tambah User</a></li>
                </ul>
            </li>


        </ul>
    </aside>
</div>
