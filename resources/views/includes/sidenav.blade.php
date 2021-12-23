<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        @if (Auth::user()->role=='admin')
            <ul>
                <li>
                    <a @if(!request()->segment(1)) class="active" @endif href="#">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="shield"></i>
                        </span>
                        <span>Probation Units</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'createProbationUnit') class="active"
                                @endif href="/createProbationUnit">Create</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'probationUnitList') class="active"
                                @endif href="/probationUnitList">List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="users"></i>
                        </span>
                        <span>Users</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'createProbationUnitUser') class="active"
                                @endif href="/createProbationUnitUser">Create Probation Unit User</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'probationUnitUserList') class="active"
                                @endif href="/probationUnitUserList">Probation Unit User List</a>
                        </li>

                    </ul>
                </li>
            </ul>
        @elseif (Auth::user()->role=='probationUnitUser')
            <ul>
                <li>
                    <a @if(!request()->segment(1)) class="active" @endif href="#">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="shopping-cart"></i>
                        </span>
                        <span>E-commerce</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'orders') class="active"
                                @endif href="#">Orders</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'products') class="active"
                                @endif href="#">Products</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'product-detail') class="active"
                                @endif href="#">Product Detail</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @else
            <ul>
                <li>
                    <a @if(!request()->segment(1)) class="active" @endif href="#">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="shopping-cart"></i>
                        </span>
                        <span>E-commerce</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'orders') class="active"
                                @endif href="#">Orders</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'products') class="active"
                                @endif href="#">Products</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'product-detail') class="active"
                                @endif href="#">Product Detail</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endif

    </div>
</div>
