<?php

ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Liste des évènements</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="login.php">Let s Plan</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="events.html">Evènements</a></li>
											<li><a href="events.html">Notifications 0</a></li>
											<li><a href="events.html">Rappels 0</a></li>
											<li><a href="createEvent.html">Créer évènement</a></li>
											<li><a href="login.php">Déconnexion</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Evènements</h2>
						</header>
						<section class="wrapper style5">
							<div class="inner">
								<table>
                                        <?php
                                        include('Retrieve_Events.php');

                                        foreach ($events as $event) {
                                            echo '<tr>';
                                            echo '<td>' . $event['titre'] . '</td>';
                                            echo '<td>' . $event['Type'] . '</td>';
                                            echo '<td>' . $event['Date'] . '</td>';
                                            echo '<td>' . $event['duree'] . '</td>';
                                            echo '<td>' . $event['lieu'] . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
								</table>


							</div>
						</section>
					</article>

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
