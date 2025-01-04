<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticketer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-11 col-xl-2">
                        <h1 class="mb-0 site-logo"><a href="index.html" class="text-white h2 mb-0">Ticketer</a></h1>
                    </div>
                    
                    
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li style="margin-right: 20px" class="active"><a href="index.html"><span>Home</span></a>
                                </li>
                                <li style="margin-right: 20px" class="has-children">
                                    <a href="about.html"><span>Dropdown</span></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="#">Menu One</a></li>
                                        <li><a href="#">Menu Two</a></li>
                                        <li><a href="#">Menu Three</a></li>
                                        <li class="has-children">
                                            <a href="#">Dropdown</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Menu One</a></li>
                                                <li><a href="#">Menu Two</a></li>
                                                <li><a href="#">Menu Three</a></li>
                                                <li><a href="#">Menu Four</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li style="margin-right: 20px"><a href="listings.html"><span>Listings</span></a></li>
                                <li style="margin-right: 20px"><a href="about.html"><span>About</span></a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark me-2"
                                            style="border-radius: 20px; background-color: blue; color: white">Dasbor</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-dark me-2"
                                            style="border-radius: 20px; background-color: blue; color: white">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-dark"
                                                style="border-radius: 20px; background-color: blue; color: white">Register</a>
                                        @endif
                                    @endauth
                                @endif
                            </ul>
                        </nav>
                    </div>


                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                                class="icon-menu h3"></span></a></div>

                </div>

            </div>
    </div>

    </header>



    <div class="site-blocks-cover overlay" style="background-image: url(https://i.pinimg.com/736x/49/13/29/491329a2616aab8ef30f758f31d60020.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up">MUSIC FESTIVAL CONCERT</h1>
                            <p data-aos="fade-up" data-aos-delay="100">Get the Latest Concert Fun</p>
                        </div>
                    </div>

                    <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200"
                        style="border-radius: 50px">
                        <form method="post">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                                    <input type="text" class="form-control"
                                        placeholder="What are you looking for?">
                                </div>
                                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                                    <div class="wrap-icon">
                                        <span class="icon icon-room"></span>
                                        <input type="text" class="form-control" placeholder="Location">
                                    </div>

                                </div>
                                <div class="col-lg-12 col-xl-3">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="" id="">
                                            <option value="">Events 1</option>
                                            <option value="">Events 2</option>
                                            <option value="">Events 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                    <input type="submit" class="btn text-white" style="background-color: blue"
                                        value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Popular Categories</h2>
                    <p class="color-black-opacity-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae
                        aliquam nam dicta inventore repellat autem ad culpa maxime saepe excepturi?</p>
                </div>
            </div>

            <div class="row align-items-stretch justify-content-center">

                <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon mb-3"></span>
                        <span class="caption mb-2 d-block">Events 1</span>
                        <span class="number" style="background-color: blue;color: white">482</span>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon mb-3"></span>
                        <span class="caption mb-2 d-block">Events 2</span>
                        <span class="number" style="background-color: blue;color: white">482</span>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon mb-3"></span>
                        <span class="caption mb-2 d-block">Events 3</span>
                        <span class="number" style="background-color: blue;color: white">482</span>
                    </a>
                </div>




            </div>

            <div class="row mt-5 justify-content-center tex-center">
                <div class="col-md-4"><a href="#" class="btn btn-block btn-md px-5"
                        style="background-color: blue;color: white">View
                        All Categories</a></div>
            </div>
        </div>
    </div>


    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Most Visited Events</h2>
                    <p class="color-black-opacity-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga,
                        esse!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/736x/90/c8/3c/90c83cad1e930bb5028d8df49edfce61.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark" data-toggle="tooltip"
                                data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">The Panturas</a></h2>
                            <span class="address">West Orange, New York</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/736x/4d/2d/a5/4d2da5765461521da829b52c74efcc20.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">Armada</a></h2>
                            <span class="address">Brooklyn, New York</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/736x/2a/e0/18/2ae0187626e7d1141df4df6d70d2f11b.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">Noah</a></h2>
                            <span class="address">West Orange, New York</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/474x/0b/19/3a/0b193aa3779f4ee28987f1678b4db04f.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark" data-toggle="tooltip"
                                data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">Seringai</a></h2>
                            <span class="address">New York City</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/474x/21/b0/ea/21b0eaab1a210def4f5b5096fcb4dc40.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">DJ Remix</a></h2>
                            <span class="address">Italy</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image">
                            <img src="https://i.pinimg.com/736x/ff/d5/af/ffd5af92e972a91d4987d307251cbb10.jpg" alt="#" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="listings-single.html" class="bookmark"><span class="icon-heart"></span></a>
                            <a class="px-3 mb-3 category" href="#">Events</a>
                            <h2 class="mb-1"><a href="listings-single.html">Party and Chill</a></h2>
                            <span class="address">West Orange, New York</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <img src="https://i.pinimg.com/736x/fd/e5/ab/fde5ab020ecedac8b6a7cd88d459e375.jpg" alt="#" class="img-fluid rounded">
                </div>
                <div class="col-md-5 ml-auto">
                    <h2 class="mb-3" style="color: blue">Why Us</h2>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false"
                                    aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">how to register
                                    ?</a>

                                <div class="collapse" id="collapse-1">
                                    <div class="pt-2">
                                        <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                            Hic, odio iste eum officia sed id ducimus dolore dolorem. Asperiores,
                                            praesentium.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false"
                                    aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this
                                    available in my country?</a>

                                <div class="collapse" id="collapse-4">
                                    <div class="pt-2">
                                        <p class="mb-0">A small river named Duden flows by their place and supplies
                                            it with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false"
                                    aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

                                <div class="collapse" id="collapse-2">
                                    <div class="pt-2">
                                        <p class="mb-0">Even the all-powerful Pointing has no control about the blind
                                            texts it is an almost unorthographic life One day however a small line of
                                            blind text by the name of Lorem Ipsum decided to leave for the far World of
                                            Grammar.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false"
                                    aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system
                                    works?</a>

                                <div class="collapse" id="collapse-3">
                                    <div class="pt-2">
                                        <p class="mb-0">The Big Oxmox advised her not to do so, because there were
                                            thousands of bad Commas, wild Question Marks and devious Semikoli, but the
                                            Little Blind Text didn’t listen. She packed her seven versalia, put her
                                            initial into the belt and made herself on the way.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">How It Works</h2>
                    <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries
                        Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg" alt="#" class="img-fluid">
                        </div>
                        <span class="number">1</span>
                        <h3>Decide What To Do</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg" alt="#" class="img-fluid">
                        </div>
                        <span class="number">2</span>
                        <h3>Find What You Want</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg" alt="#" class="img-fluid">
                        </div>
                        <span class="number">3</span>
                        <h3>Explore Amazing Places</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Satisfied Customers</h2>
                </div>
            </div>

            <div class="slide-one-item home-slider owl-carousel">
                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="https://i.pinimg.com/736x/5f/46/2d/5f462dcfba987090d3314ca981013b6c.jpg" alt="#" class="img-fluid mb-3">
                            <p>Willie Smith</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                                the coast of the Semantics, a large language ocean.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>
                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="https://i.pinimg.com/736x/ff/9a/8f/ff9a8fdbf411018e730072ecb1a253cc.jpg" alt="#" class="img-fluid mb-3">
                            <p>Robert Jones</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary
                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                                your mouth.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="https://i.pinimg.com/736x/a1/d7/dd/a1d7dd6208fc487a08ae26c6c02629c3.jpg" alt="#" class="img-fluid mb-3">
                            <p>Peter Richmond</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
                                almost unorthographic life One day however a small line of blind text by the name of
                                Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="https://i.pinimg.com/736x/a7/1d/c8/a71dc85b676ecdbf92cab9423b3bfa99.jpg" alt="#" class="img-fluid mb-3">
                            <p>Bruce Rogers</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;The Big Oxmox advised her not to do so, because there were thousands of bad
                                Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t
                                listen. She packed her seven versalia, put her initial into the belt and made herself on
                                the way.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Tips &amp; Articles</h2>
                    <p class="color-black-opacity-5">See Our Daily tips &amp; articles</p>
                </div>
            </div>
            <div class="row mb-3 align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/0b/72/d0/0b72d0e3563d27314e9764a70ae64e4a.jpg" alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Etiquette tips for travellers</h2>
                            <div class="meta mb-4" style="color: blue">by Jeff Sheldon<span
                                    class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/a9/63/b0/a963b03a956411a18282cf0b5f56c917.jpg" alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Etiquette tips for travellers</h2>
                            <div class="meta mb-4" style="color: blue">by Jeff Sheldon<span
                                    class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/2d/86/cf/2d86cf088eeb46f2ef478802b7aa9d5a.jpg" alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Etiquette tips for travellers</h2>
                            <div class="meta mb-4" style="color: blue">by Jeff Sheldon<span
                                    class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5" style="background-color: blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
                    <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
                    <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries Vokalia
                        and Consonantia, there live the blind texts.</p>
                </div>
                <div class="col-lg-4 ">
                    <p class="mb-0"><a href="signup.html"
                            class="btn btn-outline-white btn-md px-5 font-weight-bold btn-md-block text-white">Sign
                            Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-lg-0 col-lg-3">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-5 mb-lg-0 col-lg-3">
                            <h2 class="footer-heading mb-4">Products</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-5 mb-lg-0 col-lg-3">
                            <h2 class="footer-heading mb-4">Features</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-5 mb-lg-0 col-lg-3">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                    <form action="#" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-transparent" placeholder="Enter Email"
                                aria-label="Enter Email" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn text-white" style="background-color: blue" type="button"
                                    id="button-addon2">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row pt-5 mt-5">
                <div class="col-12 text-md-center text-left">
                    <p>
                        <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
                        &copy; 2019 <strong class="text-black">Browse</strong> Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Consequatur, quis!
                    </p>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/rangeslider.min.js"></script>


    <script src="js/typed.js"></script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: ["Attractions", " Events", " Hotels", " Restaurants"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>

    <script src="js/main.js"></script>

</body>

</html>
