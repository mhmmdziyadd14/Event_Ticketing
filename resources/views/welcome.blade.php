<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ticketer - Your ultimate ticketing solution">
    <meta name="keywords" content="tickets, events, booking, entertainment">
    <title>Ticketer - Modern Ticketing Solution</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Properties */
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #45526e;
            --accent-color: #ffd700;
        }

        body {
            padding-top: 76px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://picsum.photos/1920/1080');
            background-size: cover;
            background-position: center;
            min-height: 600px;
            color: white;
        }

        /* Card Styles */
        .card-bg {
            background-color: #343a40;
            min-height: 300px;
            transition: transform 0.3s ease;
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3));
            cursor: pointer;
            overflow: hidden;
        }

        .card-bg:hover {
            transform: translateY(-5px);
        }

        .card-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            transition: transform 0.3s ease;
        }

        .card-bg:hover .card-overlay {
            transform: translateY(-10px);
        }

        /* Features Section */
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Footer */
        .footer-link {
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .footer-link:hover {
            color: var(--accent-color) !important;
        }

        /* Social Media Icons */
        .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-icons i:hover {
            color: var(--accent-color);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="bi bi-ticket-perforated"></i> TICKETER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Your Next Event Starts Here</h1>
            <p class="lead mb-4">Discover and book amazing events happening around you</p>
            <button class="btn btn-primary btn-lg me-3">Get Started</button>
            <button class="btn btn-outline-light btn-lg">Learn More</button>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Us</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-lightning-charge feature-icon"></i>
                        <h3>Fast Booking</h3>
                        <p>Book your tickets in seconds with our streamlined process</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-shield-check feature-icon"></i>
                        <h3>Secure Payments</h3>
                        <p>Your transactions are protected with bank-level security</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-headset feature-icon"></i>
                        <h3>24/7 Support</h3>
                        <p>Our dedicated team is here to help you anytime</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Events -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Featured Events</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-bg">
                        <div class="card-overlay">
                            <h5 class="card-title">Music Festival</h5>
                            <p class="card-text">Experience the best music festival of the year with top artists.</p>
                            <p class="card-text"><small>Starting from $99</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bg">
                        <div class="card-overlay">
                            <h5 class="card-title">Sports Event</h5>
                            <p class="card-text">Watch the championship game live from the best seats.</p>
                            <p class="card-text"><small>Starting from $149</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-bg">
                        <div class="card-overlay">
                            <h5 class="card-title">Theater Show</h5>
                            <p class="card-text">Enjoy a spectacular Broadway performance live on stage.</p>
                            <p class="card-text"><small>Starting from $79</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: var(--secondary-color);">
        <div class="container p-4">
            <div class="row">
                <!-- Company Info -->
                <div class="col-sm-12 col-md-3 mb-4">
                    <h6 class="text-uppercase fw-bold">Ticketer</h6>
                    <p>
                        Your trusted partner for hassle-free event ticketing and memorable experiences.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <!-- Quick Links -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <h6 class="text-uppercase fw-bold">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a class="text-white footer-link" href="#">About Us</a></li>
                        <li><a class="text-white footer-link" href="#">Events</a></li>
                        <li><a class="text-white footer-link" href="#">Venues</a></li>
                        <li><a class="text-white footer-link" href="#">Blog</a></li>
                    </ul>
                </div>
                <!-- Support -->
                <div class="col-sm-6 col-md-3 mb-4">
                    <h6 class="text-uppercase fw-bold">Support</h6>
                    <ul class="list-unstyled">
                        <li><a class="text-white footer-link" href="#">Help Center</a></li>
                        <li><a class="text-white footer-link" href="#">Terms of Service</a></li>
                        <li><a class="text-white footer-link" href="#">Privacy Policy</a></li>
                        <li><a class="text-white footer-link" href="#">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Contact -->
                <div class="col-sm-12 col-md-3 mb-4">
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <p><i class="bi bi-geo-alt-fill me-2"></i> 123 Ticket Street, NY 10012, US</p>
                    <p><i class="bi bi-envelope-fill me-2"></i> contact@ticketer.com</p>
                    <p><i class="bi bi-telephone-fill me-2"></i> +1 234 567 89</p>
                    <p><i class="bi bi-clock-fill me-2"></i> Mon-Fri: 9:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright: <a class="text-white footer-link" href="#">Ticketer.com</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>