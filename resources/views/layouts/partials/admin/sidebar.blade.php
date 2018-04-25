<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Lang::get('menu.superUser') }}</p>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="treeview {{ Utility::classActivePath('home') }} {{ Utility::classActiveSegment(2, array('products','orders','users','user-withdraw-deposits','categories')) }}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>{{ Lang::get('menu.common') }}  </span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Utility::classActiveSegment(2, 'products') }}"><a href="/admin/products"><i class="fa fa-circle-o"></i>{{ Lang::get('menu.products') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'orders') }}"><a href="/admin/orders"><i class="fa fa-circle-o"></i>{{ Lang::get('menu.orders') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'users') }}"><a href="/admin/users"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.users') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'user-withdraw-deposits') }}"><a href="/admin/user-withdraw-deposits"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.user-withdraw-deposits') }}</a></li>
                <li class="{{ Utility::classActiveSegment(2, 'categories') }}"><a href="/admin/categories"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.categories') }}  </a></li>
            </ul>
        </li>
        <li class="treeview {{ Utility::classActiveSegment(2, array('logs','apis','customer-service-messages','customer-service-messages','order_payments','customers','customer_addresses','wechat_menus','generators')) }}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>{{ Lang::get('menu.others') }}  </span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Utility::classActiveSegment(2, 'logs') }}"><a href="/admin/logs"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.logs') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'apis') }}"><a href="/admin/apis/qrcodeShow"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.qrcode-Create') }}</a></li>
                <li class="{{ Utility::classActiveSegment(2, 'customer-service-messages') }}"><a href="/admin/customer-service-messages"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.customer-service-messages') }}</a></li>
                <li class="{{ Utility::classActiveSegment(2, 'order_payments') }}"><a href="/admin/order_payments"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.order_payments') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'customers') }}"><a href="/admin/customers"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.customers') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'customer_addresses') }}"><a href="/admin/customer_addresses"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.customer_addresses') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'wechat_menus') }}"><a href="/admin/wechat_menus/index"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.wechat_menus') }}  </a></li>
                <li class="{{ Utility::classActiveSegment(2, 'generators') }}"><a href="/admin/generators/index"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.generators') }}   </a></li>
            </ul>
        </li>

        <li class="treeview {{ Utility::classActiveSegment(2, 'configurations') }}">
            <a href="#">
                <i class="fa fa-dashboard"></i><span>{{ Lang::get('menu.configurations') }}  </span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Utility::classActiveSegment(2, 'configurations') }}"><a href="/admin/configurations"><i class="fa fa-circle-o"></i> {{ Lang::get('menu.configurations') }}  </a></li>
            </ul>
        </li>


    </ul>
</section>