<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BYO Artist Page</title>
        <meta charset="utf-8">
        <meta name="author" content="Josh Childs, Andre Hansen">
        <meta name="description" content="Website that helps artist create individual pages.">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen">

        <?php
        print '<!-- begin including libraries -->';
        
        include 'lib/constants.php';

        include LIB_PATH . '/Connect-With-Database.php';

        print '<!-- libraries complete-->';
        ?>	

    </head>

    <!-- **********************     Body section      ********************** -->
    <?php
    print '<body id="' . $PATH_PARTS['filename'] . '">';
//    include 'header.php';
//    include 'nav.php';
    ?>