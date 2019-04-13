<!DOCTYPE html>
<html lang="en">

<head>
    <title>BAND NAME</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="This is a resume of Andre Hansen">
    <meta name="author" content="Andre Hansen">

    <link href='style1.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="tour">
    <main>
        <nav class="Navbar">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a class="active" href="tour.php">TOUR</a></li>
                <li class="contact"><a href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
        <section class="BandInfo">
            <h1 class="BandName">BAND NAME</h1>
            <h3 class="BandSlogan">Here goes the band slogan.</h3>
            <figure class="tourRatio">
                <img class="Banner" src="../images/tour.jpg" alt="Picture of the Band members.">
            </figure>
        </section>
        <?php
        for ($i = 1; $i <= 10; $i++) {
        echo("<section class='tour'>");
            echo("<section class='Date'>");
                echo("<h1>Apr 22, 2019</h1>");
                echo("<h2>8 PM</h2>");
            echo("</section>");
            echo("<section class='Location'>");
                echo("<h3>City</h3>");
                echo("<h4>Country</h4>");
            echo("</section>");
        echo("</section>");
        }
        ?>
    </main>
    <footer>
        <!--
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_social_media_buttons
-->
        <section class="social">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
        </section>
    </footer>
</body>

</html>