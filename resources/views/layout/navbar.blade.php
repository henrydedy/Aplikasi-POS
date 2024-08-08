<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #333; color: #fff; padding: 10px 20px;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3" style="display: flex; align-items: center;">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"
                    style="color: #fff; text-decoration: none; padding: 10px;"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"
                    style="color: #fff; text-decoration: none; padding: 10px;"><i class="fas fa-search"></i></a></li>
            
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                style="color: #fff; text-decoration: none; padding: 10px;">
                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right"
                style="background-color: #333; color: #fff; border: 1px solid #fff; padding: 10px;">
                <a href="/{{ auth()->user()->level }}/profile/{{ auth()->user()->id }}" class="dropdown-item has-icon"
                    style="color: #fff; text-decoration: none; padding: 5px;">
                    <i class="fas fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item has-icon text-danger"
                    style="color: #fff; text-decoration: none; padding: 5px;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
