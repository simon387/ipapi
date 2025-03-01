<?php
include_once '../config/database.php';
include_once '../models/Ip.php';

use models\Ip;

$database = new Database();
$db = $database->getConnection();

$ip_ = new Ip($db);
$stmt = $ip_->read();
$num = $stmt->rowCount();

if ($num > 0) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);
	echo "$ip";
	http_response_code(200);
} else {
	http_response_code(404);
	echo json_encode(
		array("message" => "No IP found.")
	);
}
