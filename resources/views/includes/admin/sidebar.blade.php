<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Hi! aryooo</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        {{-- Menu Studio schedules --}}
        <li class="nav-item">
          <a href="{{ route('schedules.index') }}" class="nav-link {{ set_active('schedules.index') }}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Studio schedules
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>

        {{-- Menu Reservations --}}
        <li class="nav-item">
          <a href="{{ route('reservations.index') }}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Reservations
            </p>
          </a>
        </li>

        {{-- Menu Reservations history --}}
        <li class="nav-item">
          <a href="{{ route('history.index') }}" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Reservations history
            </p>
          </a>
        </li>

        {{-- Menu Studio assets --}}
        <li class="nav-item">
          <a href="{{ route('assets.index') }}" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Studio assets
            </p>
          </a>
        </li>

        {{-- Menu Customers --}}
        <li class="nav-item">
          <a href="{{ route('customers.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Customers
            </p>
          </a>
        </li>

        {{-- Menu report --}}
        <li class="nav-item">
          <a href="{{ route('report.index') }}" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Report
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>