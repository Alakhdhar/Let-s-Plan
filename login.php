<?php require('config.php')?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Let's Plan</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="landing is-preload">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <img style="height: 100%; width: 100%; object-fit: contain" src="images/logo.png"/>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#menu" class="menuToggle"><span>Menu</span></a>
                    <div id="menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>Let's Plan</h2>
            <p>Organise des évènements avec tes amis !</p>
        </div>
        <a href="#main" class="more scrolly">Connexion</a>
    </section>

    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <h2>Connexion</h2>
                <p>
                    <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&response_type=code&redirect_uri=<?= urlencode('http://localhost/Let-s-Plan/events.html') ?>&client_id=<?= GOOGLE_ID ?>">Se connecter via Google</a>
                    <a href="http://localhost/Let-s-Plan/events.html">Se connecter via Facebook</a>
                </p>
                <section>
                    <form method="post" action="events.html">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="email" id="username" value="" placeholder="Email" required/>
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="password" name="password" id="password" value="" placeholder="Mot de passe" />
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Se connecter" class="primary" /></li>
                                    <li><input type="reset" value="Réinitialiser" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>

                <hr />
                <h2>Vous n'avez pas encore un compte chez nous ? Rejoignez-nous ! </h2>
                <form method="post" action="login.php">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="demo-name" id="demo-name" value="" placeholder="Nom" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="surname" id="surname" value="" placeholder="Prénom" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="email" name="email" id="email" value="" placeholder="Email" required/>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="password" name="password" id="password" value="<?php if(isset($password)){ echo $password; }?>" placeholder="Mot de passe" required/>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="password" id="password" value="" placeholder="Confirmer le mot de passe" name="confirmed" required/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Créer un compte" class="primary" /></li>
                                <li><input type="reset" value="Réinitialiser" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

        </section>

    </article>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>Projet universitaire</li><li>Sarah EL HELW, Amira LAKHDHAR, Hedi GUEDIDI, Mike SANTANGELO</li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
