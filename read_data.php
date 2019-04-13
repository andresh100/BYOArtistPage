<?php
// ************** Open finances Data ****************************************

//require_once(__DIR__ . '/templates/top.php');


$debug = false;
if(isset($_GET["debug"])){
    $debug = true;
}

$user = 'SAMPLE';

$websiteId = 0;

$website = 'website' . $websiteId;


$myFolder = 'sites/' . $user . '/' . $website . '/data/';

$myFileName = basename($_FILES['tourData']["name"]);

$filename = $myFolder . $myFileName;

if ($debug) print '<p>filename is ' . $filename;

$file=fopen($filename, "r");

if($debug){
    if($file){
        print '<p>File Opened Succesful.</p>';
    }else{
        print '<p>File Open Failed.</p>';
    }
}
//************** Read Finance Data ****************************************
if($file){
    if($debug) print '<p>Begin reading data into an array.</p>';

    // read the header row, copy the line for each header row
    // you have.
    $headers[] = fgetcsv($file);

    if($debug) {
        print '<p>Finished reading headers.</p>';
        print '<p>My header array</p><pre>';
        print_r($headers);
        print '</pre>';
    }

    // read all the data
    while(!feof($file)){
        $tourDates[] = fgetcsv($file);
    }

    if($debug) {
        print '<p>Finished reading data. File closed.</p>';
        print '<p>My data array<p><pre> ';
        print_r($tourDates);
        print '</pre></p>';
    }
} // ends if file was opened

//************** Close Finance Data ****************************************
fclose($file);


/************* INSERT INTO DATABASE ****************************************/

foreach( $tourDates as $tourDate){

    $idRetrieve = $tourDate[0];
    $fldDateRetrieve = $tourDate[1];
    $fldCountryRetrieve = $tourDate[2];
    $fldCityRetrieve = $tourDate[3];
    $websiteIdRetrieve = $tourDate[4];

    $_POST['id'] = $idRetrieve;
    $_POST['fldDate'] = $fldDateRetrieve;
    $_POST['fldCountry'] = $fldCountryRetrieve;
    $_POST['fldCity'] = $fldCityRetrieve;
    $_POST['websiteId'] = $websiteIdRetrieve;

// create array to hold values for query
    $data = array();

// retreive values from form and store in $data array
    $id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');
    $data[] = $id;


    $fldDate = htmlentities($_POST['fldDate'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldDate;

    $fldCountry = htmlentities($_POST['fldCountry'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldCountry;


    $fldCity = htmlentities($_POST['fldCity'], ENT_QUOTES, 'UTF-8');
    $data[] = $fldCity;

    $websiteId = htmlentities($_POST['websiteId'], ENT_QUOTES, 'UTF-8');
    $data[] = $websiteId;



    $query = 'INSERT INTO tour SET ';
    $query .= 'id = ?, ';
    $query .= 'fldDate = ?, ';
    $query .= 'fldCountry = ?, ';
    $query .= 'fldCity = ?, ';
    $query .= 'websiteId = ? ';


// demonstration of test query method which returns nothing but displays information.
    $records = $thisDatabaseWriter->testSecurityQuery($query, 0);

// lets print out the data array so we can see what values would replace the ?
    print '<p>Contents of the array<pre>';
    print_r($data);
    print '</pre></p>';

// again i commented this line out. $records will always be false because of that.
    print '<h2>Insert method</h2>';
    if ($thisDatabaseWriter->querySecurityOk($query, 0)) {
        $query = $thisDatabaseReader->sanitizeQuery($query);
        $records = $thisDatabaseWriter->insert($query, $data); //Uncomment this to make insert
    }

    if ($records) {
        print '<p>Record Saved</p>';
    } else {
        print '<p>Record NOT Saved</p>';
    }


}







