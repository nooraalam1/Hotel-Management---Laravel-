      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('room') ? 'active' : '' }}" href="{{route('room')}}">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{route('gallery')}}">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{route('blog')}}">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>