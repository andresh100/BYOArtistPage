<!--https://stackoverflow.com/questions/18379238/send-email-with-php-from-html-form-on-submit-with-the-same-script-->

<?php 
if(isset($_POST['submit'])){
    $to = "email@example.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
//    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    header('Location: thankyou.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BAND NAME</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="This is a resume of Andre Hansen">
    <meta name="author" content="Andre Hansen">

    <link href='../../../templates/style1.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="contact">
    <main>
        <nav class="Navbar">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="tour.php">TOUR</a></li>
                <li class="contact"><a class="active" href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
        <section class="BandInfo">
            <h1 class="BandName">BAND NAME</h1>
            <h3 class="BandSlogan">Here goes the band slogan.</h3>
        </section>
        <h1 class="contactIntructions">Want to reach out? Fill in the form bellow and we will get back to you.</h1>
        <section class="contact">
            <form action="" method="post">
                <label for="name">NAME</label>
                <input type="text" name="name"><br>
                <label for="email">EMAIL</label>
                <input type="text" name="email"><br>
                <label for="message">MESSAGE</label>
                <br><textarea rows="5" name="message" cols="30"></textarea><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>


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