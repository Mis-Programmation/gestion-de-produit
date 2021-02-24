<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="turbolinks-root" content="/admin/product" >
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Document</title>
    
    <style>
        .turbolinks-progress-bar{
            background: #1f348a !important;
            padding: 4px;
        }
    </style>
</head>
<body class="bg-light" >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed " style="top: 0;left: 0;right: 0;z-index: 1000">
    <a class="navbar-brand" href="/product/index">Gestion de produit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin/product/list">List</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/product/add">ajouter</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <?php if (\MIS\Infrastructure\Service\SessionAuth::get('AUTH')) : ?>
              <li class="nav-item">
                  <a href="/logout" class="btn text-light btn-outline-warning" >Déconnexion</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                  <a href="/login" class="btn text-light btn-outline-warning" >Login</a>
              </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>


<div style="margin-top: 50px">
    <?php if($message = \MIS\Infrastructure\Service\Session::get('success')) :?>
        <div class="alert text-center alert-primary" ><?= $message ?></div>
    <?php endif ?>

    <?php
/** @var string $content */
        if (!empty($content)) {
            echo $content;
        }
    ?>
</div>


<script data-turbolinks-suppress-warning  src="/js/turboLink.js" ></script>
</body>
</html>
