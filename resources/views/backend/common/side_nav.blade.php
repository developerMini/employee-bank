<section>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">

      <!-- User Info -->
      <div class="user-info">
          <div class="image">
              <img src="{{ URL::asset('backend/img/user.png') }}" width="48" height="48" alt="User" />
          </div>
          <div class="info-container">
              <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$user->name}}</div>
              <div class="email">{{$user->email}}</div>
              <div class="btn-group user-helper-dropdown">
                  <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>                    
                    <ul class="dropdown-menu pull-right">
                      <li><a href="{{ route('profile') }}"><i class="material-icons">person</i>Profile</a></li>
                      <li role="separator" class="divider"></li>                     
                      <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
              </div>
          </div>
      </div>
      <!-- #User Info -->




      <!-- Menu -->
      <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
              Copyright © {{ date('Y') }} Minivet System. All Rights Reserved.
        </div>         
      </div>
      <!-- #Footer -->
  </aside>
  <!-- #END# Left Sidebar -->
</section>