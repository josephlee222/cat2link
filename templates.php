<?php

function website_header($title, $additionals, $description, $image) {
    $headers = '
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script src="./js/animations.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#4472C4">
        <meta name="description" content="' . $description . '">
        <meta property="og:image" content="' . $image . '">
        <title>' . $title . '</title>
        ' . $additionals . '
    </head>
    ';
    return $headers;
}

function website_footer($copyrights, $year) {
    $footer = '
    <footer class="my-5">
        <p>' . $copyrights . ' - ' . $year . '<br>Works on all browsers, best on Firefox</p>
    </footer>
    ';
    return $footer;
}

function website_navbar($active_tab) {
    $projects_active = $active_tab == "projects" ? "active" : "";
    $about_active = $active_tab == "about" ? "active" : "";

    $navbar = '
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container bg-light">
            <a class="navbar-brand" href="index.php">Cat2.link</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link ' . $projects_active . '" href="projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ' . $about_active . '" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    ';
    return $navbar;
}

function big_title($title) {
    $html = '
    <div class="big-title d-flex align-items-center">
        <div class="v-divider-thick"></div>
        <h1 class="ml-3 mb-0"><strong>' . $title . '</strong></h1>
    </div>
    ';
    return $html;
}

function show_error($error) {
    if ($error != null) {
        return "
        <div class='alert alert-danger alert-dismissible fade show mt-3 mb-0 slidein-right' role='alert'>
            ". $error . "
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }
}
?>
