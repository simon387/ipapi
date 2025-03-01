<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/Ip.php';

use models\Ip;

$database = new Database();
$db = $database->getConnection();

$ip_ = new Ip($db);

$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

if ($ip_->update($ip_address)) {
	http_response_code(200);
	echo json_encode(array("response" => "IP updated successfully."));
} else {
	http_response_code(503);
	echo json_encode(array("response" => "Impossible to update the IP."));
}