<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!--https://stackoverflow.com/questions/18379238/send-email-with-php-from-html-form-on-submit-with-the-same-script-->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>BAND NAME</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="This is a resume of Andre Hansen">
    <meta name="author" content="Andre Hansen">

    <link href='css/main.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />
    <link href='css/form.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="newPageForm">
    <main>
        <section class="BandInfo">
            <h1 class="WebName">BYO ARTIST PAGE</h1>
        </section>
        <h1 class="uploadIntructions">Upload the contents of your website here.</h1>
        <section class="upload">
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <label for="fldBandEmail">Band Email</label>
                <input type="text" name="fldBandEmail"><br>

                <label for="fldBandName">Band Name</label>
                <input type="text" name="fldBandName"><br>

                <label for="fldSlogan">Slogan</label>
                <input type="text" name="fldSlogan"><br>

                <label for="fldFacebook">Link to Facebook Page</label>
                <input type="text" name="fldFacebook"><br>

                <label for="fldTwitter">Link to Twitter Page</label>
                <input type="text" name="fldTwitter"><br>

                <label for="fldYoutube">Link to Youtube Page</label>
                <input type="text" name="fldYoutube"><br>

                <label for="fldInstagram">Link to Instagram Page</label>
                <input type="text" name="fldInstagram"><br>

                <label for="homeImage">Home Image</label>
                <input type="file" name="homeImage"><br>

                <label for="aboutImage">About Image</label>
                <input type="file" name="aboutImage"><br>

                <label for="tourImage">Tour Image</label>
                <input type="file" name="tourImage"><br>

                <label for="contactImage">Contact Image</label>
                <input type="file" name="contactImage"><br>

                <label for="tourData">Tour Data CSV <a href="csvExample.php">Required CSV Format</a></label>
                <input type="file" name="tourData"><br>

                <label for="txtAbout">About:</label>
                <br><textarea rows="5" name="txtAbout" cols="30"></textarea><br>
                <button class="button submit" type="submit" name="submit">SUBMIT</button>
                <a href="websites.php" class="button cancel"> CANCEL </a>

            </form>
        </section>


    </main>
    <footer>
    </footer>
</body>

</html>
