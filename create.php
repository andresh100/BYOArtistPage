<?php
/**
 * Created by PhpStorm.
 * User: joshuachilds
 * Date: 2019-04-06
 * Time: 13:18
 */


$user = 'SAMPLE';

$websiteId = 0;

$website = 'website' . $websiteId ;



define('SITE_PATH', 'sites/'. $user . '/' . $website . '/');

if(!file_exists(SITE_PATH)){
    mkdir(SITE_PATH, 0777, true);
}



$homeFile = SITE_PATH . 'home.php';
$aboutFile = SITE_PATH . 'about.php';
$tourFile = SITE_PATH . 'tour.php';
$contactFile = SITE_PATH . 'contact.php';
$thankyouFile = SITE_PATH . 'thankyou.php';



if (!is_file($homeFile) && !is_file($aboutFile) && !is_file($tourFile) && !is_file($contactFile)) {

    $homeOpen = fopen($homeFile, "w");
    $aboutOpen = fopen($aboutFile, "w");
    $tourOpen = fopen($tourFile, "w");
    $contactOpen = fopen($contactFile, "w");
    $thankyouOpen = fopen($thankyouFile, "w");


//    fwrite($homeOpen, $txt);

    fclose($homeOpen);
    fclose($aboutOpen);
    fclose($tourOpen);
    fclose($contactOpen);
    fclose($thankyouOpen);


    copy('templates/home.php', $homeFile);
    copy('templates/about.php', $aboutFile);
    copy('templates/contact.php', $contactFile);
    copy('templates/tour.php', $tourFile);
    copy('templates/thankyou.php', $thankyouFile);
    
    copy('templates/top.php', SITE_PATH . 'top.php');


} else {
    "This file name already exists";
}

include("recurse_copy.php");

recurse_copy('lib',SITE_PATH.'/lib');

header('Location:' . SITE_PATH . 'home.php');
?>
