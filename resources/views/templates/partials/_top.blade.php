@guest
@else
@if(Auth::user()->role == 'admin')
<aside class="col-12 col-md-2 p-0 bg-hitam" id="sidebar">
  <div class="flex-md-column flex-row align-items-start">
    <nav class="navbar navbar-expand navbar-dark bg-hitam flex-md-column flex-row">
      <a class="navbar-brand flex-md-column flex-row _brand" href="{{ route('home') }}">
        <span class="lead logo">C</span><span class="lead rud">RUD</span>
      </a>
      <div class="link-group collapse navbar-collapse">
        <ul class="flex-md-column flex-row navbar-nav navbar-left bg-merah" id="list-sidebar">
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-user"></i><span class="pl-2 n-link">Pengguna</span></a>
          </li>
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('catering.index') }}"><i class="fas fa-utensils"></i><span class="pl-2 n-link">Catering</span></a>
          </li>
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('order.index') }}"><i class="fas fa-shopping-basket"></i><span class="pl-2 n-link">Order</span></a>
          </li>
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('testimoni.index') }}"><i class="fas fa-comments"></i><span class="pl-2 n-link">Testimoni</span></a>
          </li>
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span class="pl-2 n-link">{{ __('Logout') }}</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</aside>
@else
<aside class="col-12 col-md-2 p-0 bg-hitam" id="sidebar">
  <div class="flex-md-column flex-row align-items-start">
    <nav class="navbar navbar-expand navbar-dark bg-hitam flex-md-column flex-row">
      <a class="navbar-brand flex-md-column flex-row _brand" href="{{ route('home') }}">
        <span class="lead logo">ABD CATERING</span>
      </a>
      <div class="link-group collapse navbar-collapse">
        <ul class="flex-md-column flex-row navbar-nav navbar-left bg-merah" id="list-sidebar">
          @if(Auth::user()->role == 'user')
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('myorder',Auth::user()->username) }}"><i class="fas fa-shopping-basket"></i><span class="pl-2 n-link">Pesanan Saya</span></a>
          </li>
          @endif
          <li class="nav-item _item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span class="pl-2 n-link">{{ __('Logout') }}</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</aside>
@endif
@endguest
{{-- <div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt="">John Doe
            <span class="fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a></li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            <li><a href="javascript:;">Help</a></li>
            <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div> --}}
{{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger text-white" href="{{ route('home') }}"><strong>ABD Catering</strong></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item mr-4">
          <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->username }} <span class="caret"></span> </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<br> --}}