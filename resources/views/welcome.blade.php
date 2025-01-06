<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tickfest.</title>
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
    <style>
              
                
        .event-slide img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            width: 100%;
        }
        
        .event-description {
            color: #666;
            margin-bottom: 15px;
        }
        
        .event-artists .badge {
            margin-right: 5px;
        }
    </style>
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



    <div class="site-blocks-cover overlay"
        style="background-image: url(https://i.pinimg.com/736x/49/13/29/491329a2616aab8ef30f758f31d60020.jpg);"
        data-aos="fade" data-stellar-background-ratio="0.5">
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
                        <form method="GET" action="{{ route('welcome') }}">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="What are you looking for?" value="{{ request('search') }}">
                                </div>
                                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="venue_id">
                                            <option value="">Select Venue</option>
                                            @foreach ($venues as $venue)
                                                <option value="{{ $venue->id }}"
                                                    {{ request('venue_id') == $venue->id ? 'selected' : '' }}>
                                                    {{ $venue->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-3">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="artist_id">
                                            <option value="">Select Artist</option>
                                            @foreach ($artists as $artist)
                                                <option value="{{ $artist->id }}"
                                                    {{ request('artist_id') == $artist->id ? 'selected' : '' }}>
                                                    {{ $artist->nama }}
                                                </option>
                                            @endforeach
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
    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Upcoming Events</h2>
                    <p class="color-black-opacity-5">Explore our exciting events!</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up">MUSIC FESTIVAL CONCERT</h1>
                            <p data-aos="fade-up" data-aos-delay="100">Get the Latest Concert Fun</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($events as $event)
                    <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">
                        <div class="listing-item">
                            <div class="listing-image">
                                @if ($event->foto)
                                    <img src="{{ asset('storage/' . $event->foto) }}" alt="{{ $event->nama }}"
                                        class="img-fluid">
                                @else
                                    <img src="https://via.placeholder.com/350x250.png?text=No+Image" alt="No Image"
                                        class="img-fluid">
                                @endif
                            </div>
                            <div class="listing-item-content">
                                <a href="" class="bookmark">
                                    <span class="icon-heart"></span>
                                </a>
                                <a class="px-3 mb-3 category" href="{{ route('events.show', $event) }}">Events</a>
                                <h2 class="mb-1">
                                    <a href="{{ route('events.show', $event) }}">{{ $event->nama }}</a>
                                </h2>
                                <span class="address">
                                    {{ $event->venue->nama ?? 'Venue Not Specified' }}
                                </span>
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">
                                        <i class="icon-calendar"></i>
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No events available matching your search criteria.</p>
                    </div>
                @endforelse
            </div>
        </div>
    
        {{-- Pagination Links --}}
        <div class="container">
            {{-- <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $events->appends(request()->input())->links() }}
                </div>
            </div> --}}
        </div>
    </div>





    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <img src="https://i.pinimg.com/736x/fd/e5/ab/fde5ab020ecedac8b6a7cd88d459e375.jpg" alt="#"
                        class="img-fluid rounded">
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
                                        <p class="mb-0">To purchase concert tickets, you must have an account first.
                                            Click the "Register" button at the top of the page, fill in your personal
                                            information, and complete the registration process. Once your account is
                                            registered, you can log in and start purchasing tickets.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false"
                                    aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this
                                    available in my country?</a>

                                <div class="collapse" id="collapse-4">
                                    <div class="pt-2">
                                        <p class="mb-0">Yes, our service is available for users in various countries.
                                            As long as you have internet access and a supported payment method, you can
                                            purchase concert tickets anytime.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false"
                                    aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

                                <div class="collapse" id="collapse-2">
                                    <div class="pt-2">
                                        <p class="mb-0">Registering an account on our platform is free. However,
                                            concert tickets you purchase will have prices based on the selected concert.
                                            Occasionally, we also offer discounts or exciting promos for registered
                                            users.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false"
                                    aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system
                                    works?</a>

                                <div class="collapse" id="collapse-3">
                                    <div class="pt-2">
                                        <p class="mb-0">Our system is designed to provide a fast and easy experience.
                                            After selecting your favorite concert, choose the ticket category, complete
                                            the payment, and the e-ticket will be sent directly to your email.</p>
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
                    <h2 class="font-weight-light" style="color: blue">How Does It Works</h2>
                    <p class="color-black-opacity-5">With our platform, you can purchase tickets for your favorite
                        concerts easily and quickly. From selecting events, adding tickets to the cart, to completing
                        the payment in just a few simple steps. Enjoy a hassle-free ticket booking experience and
                        receive your e-ticket directly via email. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg"
                                alt="#" class="img-fluid">
                        </div>
                        <span class="number">1</span>
                        <h3>Decide Which Event to Attend</h3>
                        <p>Browse through the list of concerts or events on our platform. Select your favorite event
                            based on your preferred date and location.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg"
                                alt="#" class="img-fluid">
                        </div>
                        <span class="number">2</span>
                        <h3>Add Tickets to Your Cart</h3>
                        <p>Once you've chosen your preferred ticket category, add the tickets to your shopping cart.
                            Review your selection before proceeding.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="https://i.pinimg.com/736x/c0/f1/34/c0f13488fe9e402411b1706682a4663b.jpg"
                                alt="#" class="img-fluid">
                        </div>
                        <span class="number">3</span>
                        <h3>Checkout and Get Your Tickets</h3>
                        <p>Complete the checkout process using the available payment methods. Upon successful payment,
                            your e-ticket will be sent directly to your email.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section ">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue">Popular Event</h2>
                </div>
            </div>

            <div class="slide-one-item home-slider owl-carousel">
                @forelse($events as $event)
                    <div>
                        <div class="testimonial event-slide">
                            <figure class="mb-4">
                                <img src="{{ $event->foto ? asset('storage/' . $event->foto) : 'https://via.placeholder.com/600x400.png?text=Event+Image' }}" 
                                     alt="{{ $event->nama }}" class="img-fluid mb-3">
                                <p>{{ $event->nama }}</p>
                            </figure>
                            <blockquote>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Venue:</strong> 
                                        {{ optional($event->venue)->nama ?? 'Not Specified' }}
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Date:</strong> 
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Time:</strong> 
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i A') }}
                                    </div>
                                </div>
                                
                                <p class="event-description">
                                    {{ Str::limit($event->deskripsi, 150, '...') }}
                                </p>
                                
                                <div class="event-artists mb-2">
                                    <strong>Artists:</strong>
                                    @if($event->artists && $event->artists->count() > 0)
                                        <div class="d-flex gap-2">
                                            @foreach($event->artists as $artist)
                                                <span class="badge bg-primary">{{ $artist->nama }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">No artists specified</span>
                                    @endif
                                </div>
                                
                                <div class="text-center mt-3">
                                    <a href="{{ route('events.show', $event) }}" class="btn btn-primary btn-sm">
                                        View Event Details
                                    </a>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                @empty
                    <div>
                        <div class="testimonial text-center">
                            <p>No events available</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light" style="color: blue"> Articles</h2>
                    <p class="color-black-opacity-5">See Our articles</p>
                </div>
            </div>
            <div class="row mb-3 align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/0b/72/d0/0b72d0e3563d27314e9764a70ae64e4a.jpg"
                            alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Tips for Music Lovers and Travelers</h2>
                            <div class="meta mb-4" style="color: blue">by BLACKPINK<span
                                    class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>After their concert in Jakarta, BLACKPINK expressed deep gratitude to their fans. Jennie,
                                one of the members, said, "We are so happy to be back in Jakarta and feel the incredible
                                energy from BLINKs here. Thank you for your amazing support. We will keep doing our best
                                for you." Lisa added, "We feel so blessed to experience such great love from the fans in
                                Jakarta." </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/a9/63/b0/a963b03a956411a18282cf0b5f56c917.jpg"
                            alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Tips for Music Lovers and Travelers</h2>
                            <div class="meta mb-4" style="color: blue">by Dewa 19<span class="mx-2">&bullet;</span>
                                Oct 4th, 2023</div>
                            <p>Ahmad Dhani, the lead vocalist of Dewa 19, expressed his pride and gratitude after their
                                Jakarta concert. "We are so touched by how many people came to watch us. It’s been an
                                amazing journey, and we feel very fortunate to share our music with all of you," he
                                said. He also added, "Jakarta always has a special place in our hearts, and we can’t
                                wait to come back." </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="https://i.pinimg.com/736x/2d/86/cf/2d86cf088eeb46f2ef478802b7aa9d5a.jpg"
                            alt="#" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular" style="color: blue">Tips for Music Lovers and Travelers</h2>
                            <div class="meta mb-4" style="color: blue">by Coldplay<span
                                    class="mx-2">&bullet;</span> june 3th, 2024</div>
                            <p>Chris Martin, the lead singer of Coldplay, shared his joy after the concert in Jakarta.
                                "Indonesia, you are incredible! We feel so blessed to perform here. The energy you gave
                                us made this concert so special," he said with enthusiasm. He also added, "We always
                                feel so warmly welcomed here, and that makes us want to come back again and again."
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
                        <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries
                            Vokalia
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
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there
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
                            &copy; 2019 <strong class="text-black">Browse</strong> Lorem ipsum dolor sit, amet
                            consectetur
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
