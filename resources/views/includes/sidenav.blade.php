<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
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
    </div>
</div>
