<!DOCTYPE html>
<?php
    include("top.php");
    $query = 'SELECT fldBandName, fldSlogan, fldFacebook, fldTwitter, fldYoutube, fldInstagram, homeImage, aboutImage, tourImage, contactImage, txtAbout ';
    $query .= 'FROM websites ';
//User ID
    $query .= 'WHERE id=3 ';

    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query);
    
    foreach ($records as $record) {
        print($record['fldBandName']);
        print($record['fldFacebook']);
    }

?>
<html lang="en">

<head>
    <title>BAND NAME</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="This is a resume of Andre Hansen">
    <meta name="author" content="Andre Hansen">

    <link href='../../../templates/style1.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="home">
<main>
    <nav class = "Navbar">
        <ul>
            <li><a class="active" href="home.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="tour.php">TOUR</a></li>
            <li class="contact"><a href="contact.php">CONTACT</a></li>
        </ul>
    </nav>
    <section class="BandInfo">
        <h1 class="BandName">BAND NAME</h1>
        <h3 class="BandSlogan">Here goes the band slogan.</h3>
        <img class="Banner" src="../../../images/band.webp" alt="Picture of the Band members.">
    </section>
</main>
<footer>
    <!--
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_social_media_buttons
-->
    <section class ="social">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </section>
</footer>
</body>
</html>

<!--// Create Website Table Query in case we fuck up.-->

<!--CREATE TABLE `JHCHILDS_ByoArtistPage`.`websites` ( `id` INT NOT NULL AUTO_INCREMENT , `fldBandName` VARCHAR(20) NOT NULL , `fldSlogan` VARCHAR(20) NOT NULL , `fldFacebook` VARCHAR(200) NOT NULL , `fldTwitter` VARCHAR(200) NOT NULL , `fldYoutube` VARCHAR(200) NOT NULL , `fldInstagram` VARCHAR(200) NOT NULL , `homeImage` VARCHAR(20) NOT NULL , `aboutImage` VARCHAR(20) NULL , `tourImage` VARCHAR(20) NULL , `contactImage` VARCHAR(20) NULL , `txtAbout` TEXT NOT NULL , `fldBandEmail` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;-->

<!--// Create TOUR Table Query in case we fuck up.-->

<!--CREATE TABLE `JHCHILDS_ByoArtistPage`.`tour` ( `id` INT NOT NULL AUTO_INCREMENT , `fldDate` DATETIME NOT NULL , `fldCountry` INT NOT NULL , `fldCity` INT NOT NULL , websiteId INT NOT NULL, PRIMARY KEY (`id`), FOREIGN KEY(websiteId) REFERENCES websites(id)) ENGINE = InnoDB;-->