<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <?php 
    $uri = service('uri');

    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">CodeIgniter4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php if (session()->get('isLoggedin')): ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item <?= ($uri->getSegment(1) =='dashboard' ? 'active' : null) ?>">


                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) =='profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                <?php else: ?>



                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item <?= ($uri->getSegment(1) =='register' ? 'active' : null) ?>">
                            <a class="nav-link active" aria-current="page" href="/register">SignUp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>
                    </ul>

                <?php endif; ?>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>