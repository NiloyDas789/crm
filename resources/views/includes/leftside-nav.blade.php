<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect {{ request()->is('dashboard') ? 'mm-active' : null }}">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
{{--                @can('invoice.access')--}}
{{--                    <li>--}}
{{--                        <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                            <i class="mdi mdi-file-alert-outline"></i>--}}
{{--                            <span>Invoice</span>--}}
{{--                        </a>--}}
{{--                        <ul class="sub-menu" aria-expanded="false">--}}
{{--                            <li><a href="{{route('invoice.index')}}">All Invoice</a></li>--}}
{{--                            <li><a href="{{route('invoice.create')}}">Create Invoice</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endcan--}}
                @can('status.access')
                <li>
                    <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">
                        <i class="mdi mdi-bell"></i>
                        <span>Status</span>
                    </a>
                </li>
                @endcan
                @can('status.access')
                <li>
                    <a href="{{route('officeCheckin.index')}}" class="waves-effect {{ request()->is('officeCheckin') ? 'mm-active' : null }}">
                        <i class="mdi mdi-office-building-marker"></i>
                        <span>Office Check-in</span>
                    </a>
                </li>
                @endcan
                @can('appointment.access')
                <li>
                    <a href="{{route('appointment.index')}}" class="waves-effect {{ request()->is('appointment') ? 'mm-active' : null }}">
                        <i class="mdi mdi-office-building-marker"></i>
                        <span>Appointment</span>
                    </a>
                </li>
                @endcan
                @can('enqury.access')
                <li>
                    <a href="{{route('enqury.index')}}" class="waves-effect {{ request()->is('enqury') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-details"></i>
                        <span>Enquries</span>
                    </a>
                </li>
                @endcan
                @can('client.access')
                <li>
                    <a href="{{route('client.index')}}" class="waves-effect {{ request()->is('client') ? 'mm-active' : null }}">
                        <i class="mdi mdi-file-account"></i>
                        <span>Clients</span>
                    </a>
                </li>
                @endcan
                @can('contact.access')
                <li>
                    <a href="{{route('contact.index')}}" class="waves-effect {{ request()->is('contact') ? 'mm-active' : null }}">
                        <i class="mdi mdi-file-account"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                @endcan
                @can('status.access')
                <li>
                    <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">
                        <i class="mdi mdi-file-cog"></i>
                        <span>Services</span>
                    </a>
                </li>
                @endcan
                @can('partner.access')
                <li>
                    <a href="{{route('partner.index')}}" class="waves-effect {{ request()->is('partner') ? 'mm-active' : null }}">
                        <i class="mdi mdi-handshake"></i>
                        <span>Partners</span>
                    </a>
                </li>
                @endcan
                @can('productType.access')
                <li>
                    <a href="{{route('productType.index')}}" class="waves-effect {{ request()->is('productType') ? 'mm-active' : null }}">
                        <i class="mdi mdi-apps"></i>
                        <span>Product Type</span>
                    </a>
                </li>
                @endcan
                @can('revenueType.access')
                <li>
                    <a href="{{route('revenueType.index')}}" class="waves-effect {{ request()->is('revenueType') ? 'mm-active' : null }}">
                        <i class="mdi mdi-apps"></i>
                        <span>Revenue Type</span>
                    </a>
                </li>
                @endcan
                @can('product.access')
                <li>
                    <a href="{{route('product.index')}}" class="waves-effect {{ request()->is('product') ? 'mm-active' : null }}">
                        <i class="mdi mdi-apps"></i>
                        <span>Products</span>
                    </a>
                </li>
                @endcan
                @can('workflow.access')
                <li>
                    <a href="{{route('workflow.index')}}" class="waves-effect {{ request()->is('workflow') ? 'mm-active' : null }}">
                        <i class="mdi mdi-lan"></i>
                        <span>Workflow</span>
                    </a>
                </li>
                @endcan
                @can('status.access')
                <li>
                    <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">
                        <i class="mdi mdi-file-chart"></i>
                        <span>Quotations</span>
                    </a>
                </li>
                @endcan
                @can('status.access')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-currency-usd-circle"></i>
                            <span>Accounts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('status.index')}}">All Invoice</a></li>
                            <li><a href="{{route('status.index')}}">Create Invoice</a></li>
                        </ul>
                    </li>
                @endcan
                @can('status.access')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account-multiple"></i>
                            <span>Teams</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('status.index')}}">All Invoice</a></li>
                            <li><a href="{{route('status.index')}}">Create Invoice</a></li>
                        </ul>
                    </li>
                @endcan
                @can('agent.access')
                <li>
                    <a href="{{route('agent.index')}}" class="waves-effect {{ request()->is('agent') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-group"></i>
                        <span>Agents</span>
                    </a>
                </li>
                @endcan
                @can('office.access')
                <li>
                    <a href="{{route('office.index')}}" class="waves-effect {{ request()->is('office') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-group"></i>
                        <span>Offices</span>
                    </a>
                </li>
                @endcan
                @can('branch.access')
                <li>
                    <a href="{{route('branch.index')}}" class="waves-effect {{ request()->is('branch') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-group"></i>
                        <span>Branches</span>
                    </a>
                </li>
                @endcan
                @can('task.access')
                <li>
                    <a href="{{route('task.index')}}" class="waves-effect {{ request()->is('task') ? 'mm-active' : null }}">
                        <i class="mdi mdi-briefcase-variant"></i>
                        <span>Tasks</span>
                    </a>
                </li>
                @endcan
                @can('status.access')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-file-alert"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('status.index')}}">All Invoice</a></li>
                            <li><a href="{{route('status.index')}}">Create Invoice</a></li>
                        </ul>
                    </li>
                @endcan
                @can('status.access')
                <li>
                    <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-reactivate"></i>
                        <span>Audit log</span>
                    </a>
                </li>
                @endcan
                @can('category.access')
                <li>
                    <a href="{{route('category.index')}}" class="waves-effect {{ request()->is('category') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-reactivate"></i>
                        <span>Category</span>
                    </a>
                </li>
                @endcan
                @can('country.access')
                <li>
                    <a href="{{route('country.index')}}" class="waves-effect {{ request()->is('country') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-reactivate"></i>
                        <span>Country</span>
                    </a>
                </li>
                @endcan
                @can('state.access')
                <li>
                    <a href="{{route('state.index')}}" class="waves-effect {{ request()->is('state') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-reactivate"></i>
                        <span>State</span>
                    </a>
                </li>
                @endcan
                @can('city.access')
                <li>
                    <a href="{{route('city.index')}}" class="waves-effect {{ request()->is('city') ? 'mm-active' : null }}">
                        <i class="mdi mdi-account-reactivate"></i>
                        <span>City</span>
                    </a>
                </li>
                @endcan

                <li class="divider"></li>
{{--                <li class="menu-title">Settings</li>--}}
{{--                @can('status.access')--}}
{{--                    <li>--}}
{{--                        <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-account-voice"></i>--}}
{{--                            <span>Chat Support</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('status.access')--}}
{{--                    <li>--}}
{{--                        <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-chart-gantt"></i>--}}
{{--                            <span>Road Map</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('status.access')--}}
{{--                    <li>--}}
{{--                        <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-rocket"></i>--}}
{{--                            <span>Change log</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('status.access')--}}
{{--                    <li>--}}
{{--                        <a href="{{route('status.index')}}" class="waves-effect {{ request()->is('status') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-account-voice"></i>--}}
{{--                            <span>Crm Support</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('user.access')--}}
{{--                    <li>--}}
{{--                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->is('user*') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-cog-outline"></i>--}}
{{--                            <span>Users</span>--}}
{{--                        </a>--}}
{{--                        <ul class="sub-menu" aria-expanded="false">--}}
{{--                            <li><a href="{{route('user.index')}}">All User</a></li>--}}
{{--                            <li><a href="{{route('user.create')}}">Create User</a></li>--}}
{{--                            <li><a href="{{route('roles.index')}}">User Roles</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('settings.access')--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('company.edit') }}"--}}
{{--                            class="waves-effect {{ request()->is('settings/company-settings') ? 'mm-active' : null }}">--}}
{{--                            <i class="mdi mdi-cog-outline"></i>--}}
{{--                            <span>Company Setting</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
