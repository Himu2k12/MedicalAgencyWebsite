@extends('Front.master')

@section('body')

    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="medilife-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="medilife-blog-sidebar-area">

                        <!-- Search Widget -->
                        <div class="search-widget-area mb-50">
                            <form action="#" method="get">
                                <input type="search" placeholder="Type Any Keywords">
                                <input type="submit" value="Search">
                            </form>
                        </div>

                        <!-- Catagories Widget -->
                        <div class="medilife-catagories-card mb-50 bg-gray" style="padding: 10px">
                            <h5>By Country</h5>
                            <ul class="catagories-menu">
                                @foreach($countries as $country)
                                <li><a href="{{url('/hospital/'.$country->slug)}}">{{$country->country}} ({{$country->hospitals($country->id)}})</a></li>
                                    @endforeach
                            </ul>
                        </div>

                        <div class="medilife-catagories-card mb-50 bg-gray">
                            <h5>By City</h5>
                            <ul class="catagories-menu">
                                <li><a href="#">Radiology</a></li>
                            </ul>
                        </div>
                        <div class="medilife-catagories-card mb-50 bg-gray">
                            <h5>By Department</h5>
                            <ul class="catagories-menu">
                                <li><a href="#">Radiology</a></li>
                            </ul>
                        </div>


                        <!-- Latest News -->
                        <div class="latest-news-widget-area mb-50">
                            <h5>Latest News</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln1.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">A big discovery for medicine</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln2.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Dentistry for everybody</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex align-items-center">
                                    <div class="widget-post-thumbnail pr-3">
                                        <img src="img/blog-img/ln3.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">When it’s time to take pills</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- medilife Emergency Card -->
                        <div class="medilife-emergency-card bg-img bg-overlay" style="background-image: url(img/bg-img/about1.jpg);">
                            <i class="icon-smartphone"></i>
                            <h2>For Emergency calls</h2>
                            <h3>+12-823-611-8721</h3>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-9">
                    @foreach($hospitals as $hospital)
                    <div class="row">
                        <!-- Single Blog Area -->
                        <div class="col-12 col-md-3">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail">
                                    @if($hospital->featureImage($hospital->id))
                                    <img src="{{asset('/websiteimages/')}}/{{$hospital->featureImage($hospital->id)->image}}" alt="">
                                    @endif
                                    <!-- Post Date -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="single-blog-area bg-gray mb-50">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-author">
                                        <a href="#"><img src="{{asset('/asset/')}}/img/blog-img/p1.jpg" alt=""></a>
                                    </div>
                                    <a href="#" class="headline">{{$hospital->hospital_name}}</a>
                                    <p> <i class="fa fa-hospital-o" aria-hidden="true"></i> Establisehd In: {{$hospital->established_in}}</p>
                                    <p> <i class="fa fa-bed" aria-hidden="true"></i> Number Of Bed: {{$hospital->number_of_beds}}</p>
                                    <p> <i class="fa fa-certificate" aria-hidden="true"></i> Speciality: {{$hospital->speciality}}</p>
                                    <p>{!! $hospital->about !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


               </div>

            <div class="row">
                <div class="col-12">
                    <!-- Pagination Area -->
                    <div class="pagination-area mt-50">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item active"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-100">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="footer-logo">
                                <img src="img/core-img/logo.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>Latest News</h6>
                            </div>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                        <img src="img/blog-img/ln1.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Better Health Care</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                        <img src="img/blog-img/ln2.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">A new drug is tested</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                        <img src="img/blog-img/ln3.jpg" alt="">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Health department advice</a>
                                        <p>Dec 02, 2017</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>Contact Form</h6>
                            </div>
                            <div class="footer-contact-form">
                                <form action="#" method="post">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="footer-name" id="footer-name" placeholder="Name">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0" name="footer-email" id="footer-email" placeholder="Email">
                                    <textarea name="message" class="form-control border-top-0 border-right-0 border-left-0" id="footerMessage" placeholder="Message"></textarea>
                                    <button type="submit" class="btn medilife-btn">Contact Us <span>+</span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>News Letter</h6>
                            </div>

                            <div class="footer-newsletter-area">
                                <form action="#">
                                    <input type="email" class="form-control border-0 mb-0" name="newsletterEmail" id="newsletterEmail" placeholder="Your Email Here">
                                    <button type="submit">Subscribe</button>
                                </form>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

@endsection
