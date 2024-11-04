<?php 

require_once 'dbConfig.php';

function insertIntoRecords($pdo, $first_name, $last_name, $gender, $date_of_birth, $position, $email, $tel_local) {
    $sql = "INSERT INTO users (first_name, last_name, gender, date_of_birth, position, email, tel_local) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $date_of_birth, $position, $email, $tel_local]);
}

function seeAllRecords($pdo) {
	$sql = "SELECT * FROM users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $id) {
	$sql = "SELECT * FROM users WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$id])) {
		return $stmt->fetch();
	}
}

function updateARecord($pdo, $id, $first_name, $last_name, $gender, $date_of_birth, $position, $email, $tel_local) {
    $sql = "UPDATE users SET first_name = ?, last_name = ?, gender = ?, date_of_birth = ?, position = ?, email = ?, tel_local = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $date_of_birth, $position, $email, $tel_local, $id]);
}

function deleteARecord($pdo, $id) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}