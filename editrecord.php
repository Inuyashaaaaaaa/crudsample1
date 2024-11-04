<!-- editrecord.php -->
<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (isset($_GET['id'])) {
    $user = getUserByID($pdo, $_GET['id']);
}

if (!$user) {
    echo "Record not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="text-center">Edit Employee Record</h3>
    <div class="card p-4">
        <form action="core/handleForms.php?id=<?php echo $user['id']; ?>" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" required>
                        <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" value="<?php echo htmlspecialchars($user['position']); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tel_local">Telephone</label>
                    <input type="text" class="form-control" name="tel_local" value="<?php echo htmlspecialchars($user['tel_local']); ?>" required>
                </div>
            </div>
            <button type="submit" name="editRecordBtn" class="btn btn-primary btn-block">Update Record</button>
        </form>
    </div>
</div>
</body>
</html>
