@section('sidebar')


 <div class="left-side-bar">
    <div class="brand-logo">
      <a href="{{ route('admin_dashboard') }}">
        <img src="{{ asset('admin/src/images/logo-icon.png') }}" alt="" class="dark-logo">
        <img src="{{ asset('admin/src/images/logo-icon.png') }}" alt="" class="light-logo">
      </a>
      <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
      </div>
    </div>
    <div class="menu-block customscroll">
      <div class="sidebar-menu">
        <ul id="accordion-menu" class="mt-4">
             <li >
            <a href="{{route('admin_dashboard')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
            </a>
          
          </li>
          <li >
            <a href="{{route('settings')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-house-1"></span><span class="mtext">Settings</span>
            </a>
          
          </li>
          <li >
            <a href="{{route('users')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-edit2"></span><span class="mtext">Users</span>
            </a>
           
          </li>
           <li >
            <a href="{{route('req_qoutes')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-edit2"></span><span class="mtext">Request Qoutes

                <span class="badge badge-danger">
                  
                  {{ App\Models\Request_Qoutes::where('reply','no')->where('is_softdel','no')->count() }}
                </span>
              </span>
            </a>
           
          </li>
          <li >
            <a href="{{route('getapiData')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-library"></span><span class="mtext">API Data</span>
            </a>
           
          </li>

          <li >
            <a href="{{route('cpv_codes')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-library"></span><span class="mtext">Cpv Codes Categories</span>
            </a>
           
          </li>
          <li>
            <a href="{{route('packages')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-calendar1"></span><span class="mtext">Packages</span>
            </a>
          </li>
  


          <li >
            <a href="{{route('permissions')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-apartment"></span><span class="mtext"> Permissions </span>
            </a>
           
          </li>

           <li >
            <a href="{{route('countrymockup')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-apartment"></span><span class="mtext"> CountryMockup </span>
            </a>
           
          </li>

           <li>
            <a href="{{route('subscriber_admin')}}" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-calendar1"></span><span class="mtext">Subscriber</span>
            </a>
          </li>
          {{-- <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-paint-brush"></span><span class="mtext">Icons</span>
            </a>
            
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-analytics-21"></span><span class="mtext">Charts</span>
            </a>
            
          </li> --}}
        
        </ul>
      </div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div>


@endsection