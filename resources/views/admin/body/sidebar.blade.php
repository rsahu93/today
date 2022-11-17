<nav class="sidebar-nav">
    <ul class="metismenu" id="menu1">
        <li class="single-nav-wrapper">
            <a href="#" class="menu-item">
                <span class="left-icon"><i class="fas fa-home"></i></span>
                <span class="menu-text">home</span>
            </a>
        </li>
        <li class="single-nav-wrapper">
            <a class="menu-item" href="{{ route('blog.category.index') }}" aria-expanded="false">
                <span class="left-icon"><i class="far fa-edit"></i></span>
                <span class="menu-text">Category</span>
            </a>
        </li>
        <li class="single-nav-wrapper">
            <a class="menu-item" href="{{ route('blog.index') }}" aria-expanded="false">
                <span class="left-icon"><i class="far fa-edit"></i></span>
                <span class="menu-text">Blog</span>
            </a>
        </li>
        <li class="single-nav-wrapper">
            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                <span class="left-icon"><i class="fas fa-table"></i></span>
                <span class="menu-text">table</span>
            </a>
            <ul class="dashboard-menu">
                <li><a href="#">Basic table</a></li>
                <li><a href="#">data table</a></li>
            </ul>
        </li>

        <li class="single-nav-wrapper">
            <a href="#" class="menu-item">
                <span class="left-icon"><i class="fas fa-file"></i></span>
                <span class="menu-text">Blank Page</span>
            </a>
        </li>
    </ul>
</nav>
