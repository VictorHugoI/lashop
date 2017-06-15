<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{!! asset('images/img.jpg') !!}" alt="">
                        {!! trans('admin/label.username') !!}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> {!! trans('admin/label.profile') !!}</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right"></span>
                                <span>{!! trans('admin/label.settings') !!}</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">{!! trans('admin/label.help') !!}</a></li>
                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i>{!! trans('admin/label.logout') !!}</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{!! trans('admin/label.settings') !!}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="{!! asset('images/img.jpg') !!}" alt="Profile Image" /></span>
                                <span>
                                    <span>{!! trans('admin/label.username') !!}</span>
                                    <span class="time">{!! trans('admin/label.time') !!}</span>
                                </span>
                                <span class="message">
                                    {!! trans('admin/label.message') !!}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>{!! trans('admin/label.username') !!}</span>
                                    <span class="time">{!! trans('admin/label.time') !!}</span>
                                </span>
                                <span class="message">
                                    {!! trans('admin/label.message') !!}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>{!! trans('admin/label.username') !!}</span>
                                    <span class="time">{!! trans('admin/label.time') !!}</span>
                                </span>
                                <span class="message">
                                    {!! trans('admin/label.message') !!}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>{!! trans('admin/label.username') !!}</span>
                                    <span class="time">{!! trans('admin/label.settings') !!}3 mins ago</span>
                                </span>
                                <span class="message">
                                    {!! trans('admin/label.message') !!}
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>{!! trans('admin/label.seemore') !!}</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
