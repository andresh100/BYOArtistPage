<?php
require_once(__DIR__ . '/structure/top.php');

$user = 'SAMPLE';

$websiteId = 0;

$website = 'website' . $websiteId ;


define('IMAGE_PATH', 'sites/'. $user . '/' . $website . '/images/');

define('DATA_PATH', 'sites/' . $user . '/' . $website . '/data/');

if(!file_exists(IMAGE_PATH)){
    mkdir(IMAGE_PATH, 0777, true);
}

if(!file_exists(DATA_PATH)){
    mkdir(DATA_PATH, 0777, true);
}

function uploadImage($img)
{
    $target_dir = IMAGE_PATH;
    $target_file = $target_dir . basename($_FILES[$img]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {

        $check = getimagesize($_FILES[$img]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$img]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$img]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$img]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}


function uploadCSV($csv){

    $target_dir = DATA_PATH;
    $target_file = $target_dir . basename($_FILES[$csv]["name"]);
    $uploadOk = 1;
    $csvFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$csv]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow CSV file format ONLY
    if ($csvFileType != "csv") {
        echo "Sorry, only csv files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$csv]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$csv]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

// create array to hold values for query
$data = array();

if (isset($_POST["submit"])) {




    $_POST['id'] = NULL;

    // retreive values from form and store in $data array
    $id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');
    $data[] = $id;


    $fldBandName = htmlentities($_POST['fldBandName'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldBandName;

    $fldSlogan = htmlentities($_POST['fldSlogan'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldSlogan;


    $fldFacebook = htmlentities($_POST['fldFacebook'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldFacebook;

    $fldTwitter = htmlentities($_POST['fldTwitter'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldTwitter;

    $fldYoutube = htmlentities($_POST['fldYoutube'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldYoutube;

    $fldInstagram = htmlentities($_POST['fldInstagram'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldInstagram;


    $homeImage = htmlentities( IMAGE_PATH . basename($_FILES['homeImage']["name"]), ENT_QUOTES, 'UTF-8');
    if ($_FILES['homeImage']["size"] != 0) {
        uploadImage('homeImage');
        $data[] = $homeImage;
    }
    else{
        $data[] = NULL;
    }


    $aboutImage = htmlentities(IMAGE_PATH . basename($_FILES['aboutImage']["name"]), ENT_QUOTES, 'UTF-8');
    if ($_FILES['aboutImage']["size"] != 0) {
        uploadImage('aboutImage');
        $data[] = $aboutImage;
    }
    else{
        $data[] = NULL;
    }

    $tourImage = htmlentities(IMAGE_PATH . basename($_FILES['tourImage']["name"]), ENT_QUOTES, 'UTF-8');
    if ($_FILES['tourImage']["size"] != 0) {
        uploadImage('tourImage');
        $data[] = $tourImage;
    }
    else{
        $data[] = NULL;
    }


    $contactImage = htmlentities(IMAGE_PATH . basename($_FILES['contactImage']["name"]), ENT_QUOTES, 'UTF-8');
    if ($_FILES['contactImage']["size"] != 0) {
        uploadImage('contactImage');
        $data[] = $contactImage;
    }
    else{
        $data[] = NULL;
    }


    $dataFile = htmlentities(DATA_PATH . basename($_FILES['tourData']["name"]), ENT_QUOTES, 'UTF-8');
    if ($_FILES['tourData']["size"] != 0) {
        uploadCSV('tourData');
    }


    $txtAbout = htmlentities($_POST['txtAbout'], ENT_QUOTES, 'UTF-8');
    $data[] = $txtAbout;

    $fldBandEmail = htmlentities($_POST['fldBandEmail'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldBandEmail;

}

$query = 'INSERT INTO websites SET ';
$query .= 'id = ?, ';
$query .= 'fldBandName = ?, ';
$query .= 'fldSlogan = ?, ';
$query .= 'fldFacebook = ?, ';
$query .= 'fldTwitter = ?, ';
$query .= 'fldYoutube = ?, ';
$query .= 'fldInstagram = ?, ';
$query .= 'homeImage = ?, ';
$query .= 'aboutImage = ?, ';
$query .= 'tourImage = ?, ';
$query .= 'contactImage = ?, ';
$query .= 'txtAbout = ?, ';
$query .= 'fldBandEmail = ? ';


// demonstration of test query method which returns nothing but displays information.
$records = $thisDatabaseWriter->testSecurityQuery($query, 0, 0);

// lets print out the data array so we can see what values would replace the ?
print '<p>Contents of the array<pre>';
print_r($data);
print '</pre></p>';

// again i commented this line out. $records will always be false because of that.
print '<h2>Insert method</h2>';

if ($thisDatabaseWriter->querySecurityOk($query, 0, 0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseWriter->insert($query, $data); //Uncomment this to make insert
}

if ($records) {
    print '<p>Record Saved</p>';
} else {
    print '<p>Record NOT Saved</p>';
}

include 'read_data.php';



include 'create.php';







?>