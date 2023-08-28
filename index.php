<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Pendaftaran Beasiswa</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Beasiswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#beasiswa">Pilihan Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="result.php">Hasil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <header class="text-center mt-5">
        <h1>Selamat Datang di Pendaftaran Beasiswa</h1>
    </header>

    <section id="beasiswa" class="container mt-5">
        <h2 class="text-center mb-4">Pilihan Beasiswa</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Beasiswa Akademik</h3>
                        <p class="card-text">Penjelasan tentang beasiswa akademik.</p>
                        <a href="registration.php?type=academic" class="btn btn-primary">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Beasiswa Non-Akademik</h3>
                        <p class="card-text">Penjelasan tentang beasiswa non-akademik.</p>
                        <a href="registration.php?type=non-academic" class="btn btn-primary">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
