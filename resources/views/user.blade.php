<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Murah E-Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .card-tf:hover {
        transform: scale(1.05);
        transition: transform 0.1s ease-in-out;
    }

    .card-hd {
        background-color: #270033;

    }

    .card-wr {
        color: #1a1346
    }

    .card-bg {
        background-color: #ebebe8;
    }
</style>

<body style="background-color:rgb(14, 1, 17)">

    <nav class="navbar navbar-expand-lg  navbar-dark card-hd">
        <div class="container-fluid">
            <a class="navbar-brand font-monospace" href="#">
                <i class="bi bi-ticket-perforated"></i>
                TickFest.
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#createprfl">
                            <i class="bi bi-person-circle"></i>
                        </button>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <!-- Profile modal -->
    <div class="modal fade" id="createprfl" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header text-light card-hd">
                    <h5 class="modal-title">Profile</h5>
                    <button type="button" class="btn btn-close btn-light" data-bs-dismiss="modal"></button>
                </div>
                <form action="backend.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Email</label>
                            <div class="border container">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Username </label>
                            <div class="border container">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Address</label>
                            <div class="border container">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Phone</label>
                            <div class="border container">
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <a class="btn btn-outline-info" href="tiket_anda.php">My Ticket</a>
                            <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>


    <div class="container mt-4 ">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3 card-tf ">
                <div class="card ">
                    <!-- Menampilkan Foto -->
                    <div class="card-header text-light card-hd">
                        <h5 class="card-title my-auto text-center font-monospace">
                            Transaction
                        </h5>
                    </div>
                    <div class="card-bg container">
                        <div class="mt-3">
                            <p class="card-text fw-semibold">VIP Ticket</p>
                            <div class="d-flex justify-content-between me-2">
                                <p>2 x 150000</p>
                                <p> 300.000</p>

                            </div>
                            <p class="card-text fw-semibold">Reguler Ticket</p>
                            <div class="d-flex justify-content-between me-2">
                                <p>3 x 75000</p>
                                <p> 225.000</p>

                            </div>
                        </div>
                        <div class="text-end d-flex justify-content-between">
                            <p class="fw-semibold">Total</p>
                            <p class="fw-bold  me-2">IDR <span class="fw-semibold"> 525.000</span></p>
                        </div>
                        <div class="text-end container d-flex justify-content-center">
                            <button class="btn btn-outline-success my-3" data-bs-toggle="modal"
                                data-bs-target="#createco">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkout modal -->
            <div class="modal fade" id="createco" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header text-light card-hd">
                            <h5 class="modal-title">Checkout</h5>
                            <button type="button" class="btn btn-close btn-light" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="backend.php" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Account</label>
                                    <div class="border container">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Tickets </label>
                                    <div class="border container">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-bold">Payment</label>
                                    <div class="border container">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label fw-normal">VIP</label>
                                        <p class="fw-light">2 x 150.000</p>

                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label fw-normal">Reguler</label>
                                        <p class="fw-light">3 x 75.000</p>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold  me-2">IDR <span class="fw-semibold"> 525.000</span></p>

                                </div>
                                <div class="mb-3 text-center">
                                    <a class="btn btn-outline-success" href="tiket_anda.php">Pay</a>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>




            <div class="col-lg-6 col-md-6 col-sm-12 mt-3 container">
                <div class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search Event" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class="mt-3 text-white">
                    <h1>KickFest.</h1>
                </div>
                <div class="d-flex mt-2">
                    <div class="card card-tf me-2" style="width: 18rem;">
                        <div class="card-body card-bg">
                            <h5 class="card-title">VIP Ticket</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                            <div class="justify-content-center d-flex">
                                <a href="#" class="card-link"><i class="bi bi-dash"></i></a>
                                <p class="ms-3 me-3">1</p>
                                <a href="#" class="card-link"><i class="bi bi-plus"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card card-tf " style="width: 18rem;">
                        <div class="card-body card-bg">
                            <h5 class="card-title">Reguler Ticket</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                            <div class="justify-content-center d-flex">
                                <a href="#" class="card-link"><i class="bi bi-dash"></i></a>
                                <p class="ms-3 me-3">1</p>
                                <a href="#" class="card-link"><i class="bi bi-plus"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="text-center text-secondary mt-5 ">
        <h5 class="card-wr">Thanks For Visiting Our Website.</h5>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
<footer class="bottom mt-5 mb-3 text-center text-light">
    <p>&copy 2025 <span class="font-monospace">TickFest.</span> | All rights reserved</p>
    <div class="d-flex gap-3 text-center justify-content-center">
        <a class="icon-link" href="https://www.tiktok.com/@ziyadun14?_t=8rIgmvD5Fkg&_r=1">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#box-seam"></use>
            </svg>
            <i class="bi bi-tiktok"></i>
        </a>
        <a class="icon-link" href="https://x.com/mhmmdziyadd?t=1uwsjgRehOVdIRMRxaAG1Q&s=09">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#box-seam"></use>
            </svg>
            <i class="bi bi-twitter"></i>
        </a>
        <a class="icon-link" href="https://wa.me/qr/N6WAGSR3NUVOJ1">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#box-seam"></use>
            </svg>
            <i class="bi bi-whatsapp"></i>
        </a>
        <a class="icon-link" href="https://www.instagram.com/mhmmdziyadd/">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#box-seam"></use>
            </svg>
            <i class="bi bi-instagram"></i>
        </a>
    </div>
</footer>

</html>
