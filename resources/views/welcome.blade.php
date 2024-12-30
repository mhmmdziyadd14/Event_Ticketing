<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Design</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-bg {
            background-color: #343a40;
            min-height: 300px;
            color: white;
            position: relative;
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container">
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
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-primary me-2">Log in</a>
                    <a href="#" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Kartu -->
    <div class="container mt-5">
        <div class="card card-bg">
            <div class="card-overlay">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content.</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white mt-5" style="background-color: #45526e;">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 col-md-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Company name</h6>
                    <p>Providing amazing services with modern design principles.</p>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#">MDBootstrap</a></li>
                        <li><a class="text-white" href="#">MDWordPress</a></li>
                        <li><a class="text-white" href="#">BrandFlow</a></li>
                        <li><a class="text-white" href="#">Bootstrap Angular</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#">Your Account</a></li>
                        <li><a class="text-white" href="#">Affiliate Program</a></li>
                        <li><a class="text-white" href="#">Shipping Rates</a></li>
                        <li><a class="text-white" href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <p><i class="bi bi-house-door-fill"></i> New York, NY 10012, US</p>
                    <p><i class="bi bi-envelope-fill"></i> info@example.com</p>
                    <p><i class="bi bi-telephone-fill"></i> +1 234 567 89</p>
                    <p><i class="bi bi-printer-fill"></i> +1 234 567 90</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright: <a class="text-white" href="#">YourWebsite.com</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
