<!-- deleterecord.php -->
<?php require_once 'core/handleforms.php'; ?>
<?php require_once 'core/models.php';

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
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
<a href="index.php" class="btn btn-secondary mb-3">Return to Home</a>
    <h3 class="text-center text-danger">Are you sure you want to delete this record?</h3>
    <div class="card p-4">
        <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></p>
        <form action="core/handleForms.php?id=<?php echo $user['id']; ?>" method="POST">
            <button type="submit" name="deleteRecordBtn" class="btn btn-danger">Delete</button>
            
        </form>
    </div>
</div>
</body>
</html>
