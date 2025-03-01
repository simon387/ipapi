<?php

namespace models;
class Ip
{
	private mixed $conn;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function update($ip_): bool
	{
		$query = "UPDATE ip SET ip = :ip WHERE 1=1";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(":ip", $ip_);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

	function read()
	{
		$query = "SELECT ip from ip where id=1";
		$stmt = $this->conn->prepare($query);

		$stmt->execute();
		return $stmt;
	}
}