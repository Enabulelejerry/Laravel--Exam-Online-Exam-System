<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                        
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                       
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                             
                            </a>
                            <div class="header-notifications-list">
                             
                           
                               
                            </div>
                           
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                     
                        <div class="dropdown-menu dropdown-menu-end">
                         
                            <div class="header-message-list">
                               
                                
                                
                            </div>
                         
                        </div>
                    </li>
                </ul>
            </div>
           
 <div class="user-box dropdown">
    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('backend/images/avatars/avatar3.png') }}" class="user-img" alt="user avatar">
        <div class="user-info ps-3">
            <p class="user-name mb-0" >{{ Auth::guard('admin')->user()->name }}</p> 
            {{-- <p class="designattion mb-0">HR Manager</p> --}}
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="{{ route('changepassword') }}"><i class="bx bx-cog"></i><span>Change Password</span></a>
        </li>
        </li>
        </li>
        <li><a class="dropdown-item" href="{{ route('view_profile') }}"><i class='bx bx-edit'></i><span>View Profile</span></a>
        </li>
        <li>
            <div class="dropdown-divider mb-0"></div>
        </li>
        <li><a class="dropdown-item" href="{{ route('admin_logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
        </li>
    </ul>
</div>
        </nav>
    </div>
</header>
<!--end header -->