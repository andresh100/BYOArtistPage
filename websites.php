<!DOCTYPE html>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
    include("structure/top.php");
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

    <title>BYO Artist Page</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Andre Hansen">

    <meta name='description' content="BYO Artist Page">

    <link href='css/main.css?v=<?php echo time(); ?>' rel='stylesheet' type='text/css' media='screen' title="Default" />

</head>

<body id="table">
    <form action="reset-password.php"><button class="button reset" type="submit">Reset Your Password</button></form>
    <form action="logout.php"><button class="button signOut" type="submit">Sign Out</button></form>

    <h1 class="WebName">BYO ARTIST PAGE</h1>
    <table>
        <caption class="slogan">This table displays a list of all of your websites.</caption>
        <thead>
            <tr>
                <th scope="col">WEBSITE#</th>
                <th scope="col">BAND NAME</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><a href="sites/SAMPLE/website0/home.php">WEBSITE 1</a></td>
                <td>BAND NAME</td>
                <td>
                    <form action="editForm.php"><button class="button edit" type="submit">EDIT</button></form>
                </td>
                <td>
                    <form action="deleteForm.php"><button class="button delete" type="submit">DELETE</button></form>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="newPageForm.php">
        <button class="button new" type="submit">NEW PAGE</button>
    </form>

</body>

</html>
