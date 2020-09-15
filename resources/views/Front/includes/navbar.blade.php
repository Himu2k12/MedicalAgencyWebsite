<body>
<!-- Preloader -->
<div id="preloader">
    <div class="medilife-load"></div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <p>Welcome to <span>Medifile</span> template</p>
                        <p>Opening Hours : Monday to Saturday - 8am to 10pm Contact : <span>+12-823-611-8721</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="index.html"><img src="{{asset('/asset/')}}/img/core-img/logo.png" alt="Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse" id="medilifeMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item {!! Request::is('/') ? 'active':'' !!}">
                                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item {!! Request::is('hospital') ? 'active':'' !!}">
                                        <a class="nav-link" href="{{url('/hospital')}}">Hospitals</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="services.html">Doctors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.html">Cost</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Knowledge</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Patient Stories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Free Consult</a>
                                    </li>
                                </ul>
                                <!-- Appointment Button -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
