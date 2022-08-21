<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/category')}}">
            <i class="icon-box menu-icon"></i>
            <span class="menu-title">CATEGORY</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/producer')}}">
            <i class="icon-box menu-icon"></i>
            <span class="menu-title">PRODUCER</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">PRODUCT</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('A-product')}}">Add new</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('P-list')}}">View list</a></li>
                </ul>
              </div>
        </li>

    </ul>

  </nav>
