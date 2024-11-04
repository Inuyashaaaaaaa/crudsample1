<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertDataBtn'])) {
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$gender = trim($_POST['gender']);
	$date_of_birth = trim($_POST['date_of_birth']);
	$position = trim($_POST['position']);
	$email = trim($_POST['email']);
    $tel_local = trim($_POST['tel_local']);

	if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($date_of_birth) && !empty($position)  && !empty($email)  && !empty($tel_local)) {
			$query = insertIntoRecords($pdo, $first_name, $last_name, 
			$gender, $date_of_birth, $position, $email, $tel_local);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editRecordBtn'])) {
	$id = $_GET['id'];
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$gender = trim($_POST['gender']);
	$date_of_birth = trim($_POST['date_of_birth']);
	$position = trim($_POST['position']);
	$email = trim($_POST['email']);
    $tel_local = trim($_POST['tel_local']);

	if (!empty($id) && !empty($first_name) && !empty($last_name) && !empty($gender) && !empty($date_of_birth) && !empty($position) && !empty($email) && !empty($tel_local)) {

		$query = updateARecord($pdo, $id, $first_name, $last_name, $gender, $date_of_birth, $position, $email, $tel_local);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteRecordBtn'])) {

	$query = deleteARecord($pdo, $_GET['id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>