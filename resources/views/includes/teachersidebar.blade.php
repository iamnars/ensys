<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{asset('img/profile_small.jpg')}}"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">David Williams</span>
                                <span class="text-muted text-xs block">BSIT Professor <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img src="{{asset('img/mpc_logo.png')}}" style="width: 100%; max-width: 50px; height: auto;">
                        </div>
                    </li>

                    <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Classes Handled</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            @forelse($schedules as $schedule)
                                <li><a href="{{ url('/grading/' . $schedule->schedule_code) }}">{{ $schedule->schedule_code }}</a></li>
                            @empty
                                <li class="text-center" style="list-style: none;">No classes assigned.</li>
                            @endforelse
                        </ul>
                    </li>
                    

            </div>
        </nav>