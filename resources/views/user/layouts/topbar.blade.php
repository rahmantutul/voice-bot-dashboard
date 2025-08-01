    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-fluid">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">    
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">                        
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu"></i>
                        </button>
                    </li> 
                    <li class="mx-2 welcome-text">
                        <h5 class="mb-0 fw-semibold text-truncate">Hello, {{ Auth::user()->name }}!</h5>
                    </li>                   
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="bot-switcher">
                        <!-- Dropdown Trigger -->
                        <button class="bot-switcher-btn">
                            <img src="{{ asset('/assets/images/extra/P9aqUeKFvc.gif') }}" class="top-bot-avatar">
                            <span>See Assistant Details</span>
                            <svg class="dropdown-arrow" width="12" height="8" viewBox="0 0 12 8">
                                <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu - Simple Links -->
                        <div class="bot-dropdown">
                            <div class="dropdown-header">
                                <h4>Your Assistants</h4>
                                <a href="{{ route('user.bot.create') }}" class="new-bot-btn">
                                    <svg width="16" height="16" style="background: #6c63ff; color: #fff;" viewBox="0 0 24 24">
                                        <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </a>
                            </div>
                            
                            <div class="bot-links">
                                <a href="{{ route('user.bot.overview') }}" class="bot-link active">
                                    <img src="{{ asset('/assets/images/extra/P9aqUeKFvc.gif') }}" class="top-bot-avatar">
                                    <div class="bot-details">
                                        <strong>Support Assistant</strong>
                                        <small>24/7 Customer Help</small>
                                    </div>
                                    <span class="status active"></span>
                                </a>
                                
                                <a href="{{ route('user.bot.overview') }}" class="bot-link">
                                    <img src="{{ asset('/assets/images/extra/P9aqUeKFvc.gif') }}" class="top-bot-avatar">
                                    <div class="bot-details">
                                        <strong>Sales Assistant</strong>
                                        <small>Lead Conversion</small>
                                    </div>
                                    <span class="status active"></span>
                                </a>
                                
                                <a href="{{ route('user.bot.overview') }}" class="bot-link">
                                    <img src="{{ asset('/assets/images/extra/P9aqUeKFvc.gif') }}" class="top-bot-avatar">
                                    <div class="bot-details">
                                        <strong>FAQ Assistant</strong>
                                        <small>Instant Answers</small>
                                    </div>
                                    <span class="status inactive"></span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="iconoir-half-moon dark-mode"></i>
                            <i class="iconoir-sun-light light-mode"></i>
                        </a>                    
                    </li>
    
                    
    
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('images/default-avatar.jpg') }}" alt="" class="thumb-md rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('images/default-avatar.jpg') }}" alt="" class="thumb-md rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted mb-0">{{ Auth::user()->email }}</small>
                                </div><!--end media-body-->
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="las la-cog fs-18 me-1 align-text-bottom"></i>Account Settings</a>
                            <a class="dropdown-item text-danger" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> <b>Logout</b>
                            </a>

                            <div class="dropdown-divider mb-0"></div>
                            <a href="{{ route('user.subscription') }}" class="btn bg-black text-white shadow-sm rounded-pill d-block m-3">
                                Upgrade your plan
                                <img src="{{ asset('/') }}assets/images/extra/giphy.gif" alt="" style="height: 25px; margin-left: 8px; display: inline-block; vertical-align: middle;">
                            </a>
                   
                           

                            <!-- Hidden logout form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->