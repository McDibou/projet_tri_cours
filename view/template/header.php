<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>PROJET</title>
</head>
<body class="bg-dark">

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="?p=favory.public">Favoris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="?p=login.user">Espace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="?p=dashboard">Dashboard</a>
                </li>
            </ul>
            <?php if ($session->verify('auth')) { ?>
                <a class="btn btn-light" href="?p=profil.user"><?= $session->read('auth') ?></a>
                <a class="btn btn-light" href="?p=disconnect.user">se deconnecter</a>
            <?php } ?>
            <form method="GET" class="form-inline mt-md-0">
                <input name="p" value="search" type="hidden">
                <input name="value" class="form-control mr-sm-2" type="text" placeholder="Rechercher"
                       aria-label="Search">
                <button class="btn btn-outline-dark my-2" type="submit">
                    <svg style="margin-top: -3px" width="1em" height="1em" class="bi bi-search" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd"
                              d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </nav>
</header>

<div class="container" style="padding-top: 100px">