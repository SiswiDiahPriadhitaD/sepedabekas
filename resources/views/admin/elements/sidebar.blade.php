<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/home"
              aria-expanded="false">
            <i class="mdi mdi-av-timer"></i>
            <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/user"
              aria-expanded="false">
            <i class="mdi mdi-account-network"></i>
            <span class="hide-menu">Users</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/product"
              aria-expanded="false">
            <i class="mdi mdi-face"></i>
            <span class="hide-menu">Products</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/transaction"
              aria-expanded="false">
            <i class="mdi mdi-file"></i>
            <span class="hide-menu">Transaction</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/payment"
              aria-expanded="false">
            <i class="mdi mdi-alert-outline"></i>
            <span class="hide-menu">Payments</span>
            </a>
          </li>
  
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout"></i>
                  <span class="hide-menu">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>