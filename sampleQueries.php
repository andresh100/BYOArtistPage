<?php
/**
 * Created by PhpStorm.
 * User: joshuachilds
 * Date: 2019-04-05
 * Time: 16:50
 */

require_once(__DIR__ . '/top.php');



/**
 ********************** SHOW ALL TABLES ***************************
 */


$query = 'SHOW TABLES ';

if ($thisDatabaseReader->querySecurityOk($query,0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query);

}

if (DEBUG) {
    print '<p>Contents of the array<pre>';
    print_r($records);
    print '</pre></p>';
}

if($records){
    print '<p>SUCCESS</p>';
}

else{
    print '<p>NOT SUCCESS</p>';
}


/**
 ************************ SELECT ALL FROM TOUR Table ****************************
 */

$records = $thisDatabaseReader->testSecurityQuery($query, 0);


$query = 'SELECT * ';
$query .= 'FROM tour ';

if ($thisDatabaseReader->querySecurityOk($query,0)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query);

}

if (DEBUG) {
    print '<p>Contents of the array<pre>';
    print_r($records);
    print '</pre></p>';
}