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
                    <a @if(request()->segment(1)=='Admindashbord') class="active"
                        @endif href="/Admindashbord">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="filter"></i>
                        </span>
                        <span>Filters</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'adminFilterChildren') class="active"
                                @endif href="/adminFilterChildren">Children</a>
                        </li>
                        {{-- <li>
                            <a @if(request()->segment(1) == 'probationUnitList') class="active"
                                @endif href="/probationUnitList">List</a>
                        </li> --}}
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="shield"></i>
                        </span>
                        <span>Probation Office</span>
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
                            <a href="">Probation Office Users</a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'createProbationUnitUser') class="active"
                                        @endif href="/createProbationUnitUser">Create</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'probationUnitUserList') class="active"
                                        @endif href="/probationUnitUserList">List</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="settings"></i>
                        </span>
                        <span>Settings</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'probationCenterCatagory') class="active"
                                @endif href="/probationCenterCatagory">Child Development Center Catagory</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'grade') class="active"
                                @endif href="/grade">Employee Grades</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'designation') class="active"
                                @endif href="/designation">Employee designations</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'district') class="active"
                                @endif href="/district">Districts</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'divitionalSecretariat') class="active"
                                @endif href="/divitionalSecretariat">Divisional Secretariats</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'policeDivitions') class="active"
                                @endif href="/policeDivitions">Police Divisions</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'gramasevadivision') class="active"
                                @endif href="/gramasevadivision">Grama Niladhari Divisions</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif (Auth::user()->role=='probationUnitUser')
            <ul>
                <li>
                    <a @if(request()->segment(1)=='probationUnitUserDashbord') class="active"
                        @endif href="/probationUnitUserDashbord">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="home"></i>
                        </span>
                        <span>Child Development Center</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'createProbationCenter') class="active"
                                @endif href="/createProbationCenter">Create</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'probationCenterList') class="active"
                                @endif href="/probationCenterList">List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="user"></i>
                        </span>
                        <span>Employees</span>
                    </a>
                    <ul>
                        <li>
                            <a href="">Probation Office</a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'registerProbationUnitEmployee') class="active"
                                        @endif href="/registerProbationUnitEmployee">Create</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'probationUnitEmployeeList') class="active"
                                        @endif href="/probationUnitEmployeeList">List</a>
                                </li>

                            </ul>
                        </li>
                        {{-- <li>
                            <a href="">Probation Center</a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == '') class="active"
                                        @endif href="#">Create</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'products') class="active"
                                        @endif href="#">List</a>
                                </li>

                            </ul>
                        </li> --}}

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="user-check"></i>
                        </span>
                        <span>Children</span>
                    </a>
                    <ul>

                        <li>
                            <a @if(request()->segment(1) == 'ProbationUnitchildrenList') class="active"
                                @endif href="/ProbationUnitchildrenList">list</a>
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
                            <a href="">Child Development Center Users</a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'createProbationCenterUsers') class="active"
                                        @endif href="/createProbationCenterUsers">Create</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'probationCenterUserList') class="active"
                                        @endif href="/probationCenterUserList">List</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <?php  /*
                    <li>
                        <a href="#">
                            <span class="nav-link-icon">
                                <i data-feather="settings"></i>
                            </span>
                            <span>Setting</span>
                        </a>
                        <ul>
                            <!-- <li>
                                <a @if(request()->segment(1) == 'probationCenterCatagory') class="active"
                                    @endif href="/probationCenterCatagory">Probation Center Catagory</a>
                            </li> -->
                            <!-- <li>
                                <a @if(request()->segment(1) == 'grade') class="active"
                                    @endif href="/grade">Employee Grades</a>
                            </li>
                            <li>
                                <a @if(request()->segment(1) == 'designation') class="active"
                                    @endif href="/designation">Employee designations</a>
                            </li> -->
                            <!-- <li>
                                <a @if(request()->segment(1) == 'policeDivitions') class="active"
                                    @endif href="/policeDivitions">Police Divisions</a>
                            </li>
                            <li>
                                <a @if(request()->segment(1) == 'gramasevadivision') class="active"
                                    @endif href="/gramasevadivision">Grama Niladhari Divisions</a>
                            </li> -->
                        </ul>
                    </li>
                */ ?>
            </ul>
        @else
            <ul>
                <li>
                    <a @if(request()->segment(1)=='probationCenterUserDashbord') class="active"
                        @endif href="/probationCenterUserDashbord">
                        <span class="nav-link-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i data-feather="user-check"></i>
                        </span>
                        <span>Children</span>
                    </a>
                    <ul>
                        <li>
                            <a @if(request()->segment(1) == 'registerChildren') class="active"
                                @endif href="/registerChildren">Register</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'childrenList') class="active"
                                @endif href="/childrenList">list</a>
                        </li>

                    </ul>
                </li>

            </ul>
        @endif

    </div>
</div>
