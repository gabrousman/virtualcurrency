    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sendmoney') }}">Send Money</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('transactions') }}">Money Sent</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('moneyrecieved') }}">Money Recieved</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Help</a>
            </li>
          </ul>
<!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown" onclick="MarkAsRead()">  
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <span class="glyphicon glyphicon-globe"></span>Notifications <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                    
                                    @include ('notifications.money')
                                    @empty
                                    No Unread Notifications


                                    @endforelse
                                </ul>

                            </li>
                            <li class="dropdown">  
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

          <!--<form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
        </div>
      </nav>
    </header>