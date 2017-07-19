<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ url('assets/admin/img/profile_small.jpg') }}"/>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">David Williams</strong>
                             </span>
                            <span class="text-muted text-xs block">Art Director
                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a>Profile</a></li>
                        <li><a>Contacts</a></li>
                        <li><a>Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Product Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Category Management</span>
                    <span class="fa arrow"></span>
                </a>
                {{-- <ul class="nav nav-second-level">
                    <li><a>Create new category</a></li>
                    <li><a>Edit a category</a></li>
                </ul> --}}
            </li>
            <li>
                <a>
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Brand Management</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a>Create new brand</a></li>
                    <li><a>Edit a brand</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admins.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">User Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categoryProperty.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Add property</span>
                    <span class="fa arrow"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
