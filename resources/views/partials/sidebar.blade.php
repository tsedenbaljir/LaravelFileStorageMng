@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" style="background-color: white;color: #ffffff">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i  style="width:0;" class="{{ $request->segment(2) == 'home' ? 'fa fa-angle-right' : '' }}"></i>
                    <i style="margin-left:4px" class="fa fa-home"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Хэрэглэгч</span>
                    {{-- <span class="title">@lang('quickadmin.user-management.title')</span> --}}
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i  style="width:0;" class="{{ $request->segment(2) == 'roles' ? 'fa fa-angle-right' : '' }}"></i>
                            <i style="margin-left:4px" class="fa fa-briefcase"></i>
                            <span class="title">
                                үндсэн эрх
                                {{-- @lang('quickadmin.roles.title') --}}
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                        <i style="width:0;" class="{{ $request->segment(2) == 'users' ? 'fa fa-angle-right' : '' }}"></i>
                        <i style="margin-left:4px" class="fa fa-user"></i>
                            <span class="title">
                                Хэрэглэгчид
                                {{-- @lang('quickadmin.users.title') --}}
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('folder_access')
            <li class="{{ $request->segment(2) == 'folders' ? 'active' : '' }}">
                <a href="{{ route('admin.folders.index') }}">
                    <i style="width:0;" class="{{ $request->segment(2) == 'folders' ? 'fa fa-angle-right' : '' }}"></i>
                    <i style="margin-left:4px" class="fa fa-folder"></i>
                    <span class="title">Хавтас</span>
                    {{-- <span class="title">@lang('quickadmin.folders.title')</span> --}}
                </a>
            </li>
            @endcan
            
            @can('file_access')
            <li class="{{ $request->segment(2) == 'files' ? 'active' : '' }}">
                <a href="{{ route('admin.files.index') }}">
                    <i style="width:0;" class="{{ $request->segment(2) == 'files' ? 'fa fa-angle-right' : '' }}"></i>
                    <i style="margin-left:4px" class="fa fa-file"></i>
                    <span class="title">Файл</span>
                    {{-- <span class="title">@lang('quickadmin.files.title')</span> --}}
                </a>
            </li>
            @endcan

            {{-- @can('plan_access')
            <li class="{{ $request->segment(2) == 'subscriptions' ? 'active' : '' }}">
                <a href="{{ route('admin.subscriptions.index') }}">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">My Plan</span>
                    <span class="title">My Plan</span>
                </a>
            </li>
            @endcan --}}


            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i style="width:0;" class="{{ $request->segment(2) == 'change_password' ? 'fa fa-angle-right' : '' }}"></i>
                    <i style="margin-left:4px" class="fa fa-key"></i>
                    <span class="title">Нууц үг солих</span>
                    {{-- <span class="title">@lang('quickadmin.qa_change_password')</span> --}}
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

