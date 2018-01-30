<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost","root","","northwind" );
$conn->set_charset("utf8"); // charset do PHP mudado para UTF-8

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->query("SELECT CompanyName, City, Country FROM Customers");

$outp = "";

if ($result-> num_rows >0) {


    while($rs = $result->fetch_assoc()){
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"Name":"'  . $rs["CompanyName"] . '",';
        $outp .= '"City":"'   . $rs["City"]        . '",';
        $outp .= '"Country":"'. $rs["Country"]     . '"}';
    }

    $outp ='{"records":['.$outp.']}';
} else {
    $outp .="0 results";
}


$conn->close();

echo($outp);
?>