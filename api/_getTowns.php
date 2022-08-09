<?php
session_start();
ob_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require("_apiAccess.php");
access();
require_once("../script/dbconnection.php");
$city = $_REQUEST['city'];
if (empty($city)) {
  $city = 1;
}
try {
  $query = "select * from towns where city_id=" . $city . " order by main DESC";
  $data = getData($con, $query);
  $success = "1";
} catch (PDOException $ex) {
  $data = ["error" => $ex, 'q' => $query];
  $success = "0";
}
ob_clean();
echo (json_encode(array('code' => 200, 'message' => $msg, "success" => $success, "data" => $data, 'q' => $query, 'P' => $city)));
