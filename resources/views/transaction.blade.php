<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket Murah E-Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .web-bg {
        background-color: rgb(14, 1, 17);
    }

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

    .rounded {
        border-radius: 50px;
    }
</style>

<body class="web-bg">
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
                        <a class="btn btn-outline-dark" href="tiket_anda.php">Back</a>
                        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

    <div class="text-center mt-3">
        <h1 class="font-monospace text-light">Transaction History</h1>
    </div>

    <div class="container mt-4">
        <div class="row ">
            <div class="col-lg-4 col-md-6 col-sm-12 card-tf mt-3 ">
                <div class="card card-bg">
                    <!-- Menampilkan Foto -->
                    <div class="card-header text-light card-hd">
                        <h5 class="card-title my-auto  font-monospace ">
                            KickFest.
                        </h5>
                    </div>
                    <div class="me-2">
                        <div class="mt-3 me-2">
                            <ul>
                                <li>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text fw-semibold ">Account</p>
                                        <p class="mb-0">jajangmodip@gmail.com</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text fw-semibold">Order Date</p>
                                        <p class="mb-0">08-10-2025</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text fw-semibold">Payment</p>
                                        <p class="mb-0">Go-Pay</p>
                                    </div>
                                </li>
                                <li>
                                    <p class="card-text fw-semibold">Tickets</p>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <p>VIP Ticket x 2</p>
                                    <p>Reguler Ticket x 2</p>
                                </li>
                        </div>
                        <div class="d-flex justify-content-between container ms-1">
                            <p class="fw-semibold">Total</p>
                            <p class="fw-bold  me-2">IDR <span class="fw-semibold"> 525.000</span></p>
                        </div>
                        </ul>
                    </div>

                    <div class="text-end container d-flex justify-content-center">
                        <button class="btn btn-outline-info my-3" data-bs-toggle="modal"
                            data-bs-target="#createjual">Ticket Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
