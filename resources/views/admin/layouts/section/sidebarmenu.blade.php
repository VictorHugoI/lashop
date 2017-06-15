<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>{!! trans('admin/label.menu_section') !!}</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> {!! trans('admin/label.home') !!} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.html">{!! trans('admin/label.dashboard1') !!}</a></li>
                    <li><a href="index2.html">{!! trans('admin/label.dashboard2') !!}</a></li>
                    <li><a href="index3.html">{!! trans('admin/label.dashboard3') !!}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> {!! trans('admin/label.form') !!} <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="form.html">{!! trans('admin/label.general_form') !!}</a></li>
                <li><a href="form_advanced.html">{!! trans('admin/label.advanced_components') !!}</a></li>
                <li><a href="form_validation.html">{!! trans('admin/label.form_validation') !!}</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i>{!! trans('admin/label.ui_elements') !!} <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="general_elements.html">{!! trans('admin/label.general_elements') !!}</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-table"></i> {!! trans('admin/label.table') !!}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="tables.html">{!! trans('admin/label.table') !!}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> {!! trans('admin/label.data_presentation') !!}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="chartjs.html">{!! trans('admin/label.chart_js') !!}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>{!! trans('admin/label.layout') !!}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">{!! trans('admin/label.side_bar') !!}</a></li>
                    <li><a href="fixed_footer.html">{!! trans('admin/label.fixed_footer') !!}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>{!! trans('admin/label.live_on') !!}</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> {!! trans('admin/label.live_on') !!}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="e_commerce.html">{!! trans('admin/label.e_commerce') !!}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> {!! trans('admin/label.extras') !!} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="page_403.html">{!! trans('admin/label.404_erorr') !!}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> {!! trans('admin/label.multilevel_menu') !!} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="#level1_1">{!! trans('admin/label.level_one') !!}</a>
                <li><a>{!! trans('admin/label.level_one') !!}<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="level2.html">{!! trans('admin/label.level_one') !!}</a>
                        </li>
                        <li><a href="#level2_1">{!! trans('admin/label.level_one') !!}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#level1_2">{!! trans('admin/label.level_one') !!}</a>
                </li>
                </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> {!! trans('admin/label.landing_page') !!}<span class="label label-success pull-right">{!! trans('admin/label.coming_soon') !!}</span></a></li>
        </ul>
    </div>
</div>

