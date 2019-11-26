<div class="sidebar-inner slimscrollleft">
    <div class="user-details">
        <div class="text-center">
            <img src="{{ asset('assets/admin/images/avatar-1.jpg') }}" alt="" class="img-circle">
        </div>
        <div class="user-info">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
            </div>

            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
        </div>
    </div>
    <!--- Divider -->
    <div id="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
            </li>
            <li>
                <a href="{{ route('order.index') }}" class="waves-effect"><i class="ti-home"></i><span> Orders </span></a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Users </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('user.index') }}">User List</a></li>
                    @can('admin',auth()->user())
                        <li><a href="{{ route('user.create') }}">Create new User</a></li>
                    @endcan
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Categories </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('category.index') }}">Category List</a></li>
                    <li><a href="{{ route('category.create') }}">Add Category</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span> Vendors </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('vendor.index') }}">Vendors List</a></li>
                    <li><a href="{{ route('vendor.create') }}">Add Vendor</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-bag"></i> <span> Product </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('product.create') }}">Add New Product</a></li>
                    <li><a href="{{ route('product.index') }}">Product List</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
