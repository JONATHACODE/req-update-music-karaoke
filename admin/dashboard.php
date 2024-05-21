<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

include '../db.php';

$songs = $conn->query("SELECT * FROM songs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        <a href="../logout.php" class="btn btn-danger btn-block mt-3">Logout</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($song = $songs->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $song['title']; ?></td>
                        <td><?php echo $song['artist']; ?></td>
                        <td>
                            <?php if ($song['status'] == 'approved') {
                                echo '✔️';
                            } else {
                                echo '❌';
                            } ?>
                        </td>
                        <td>
                            <a href="update_status.php?id=<?php echo $song['id']; ?>&status=<?php echo $song['status'] == 'approved' ? 'rejected' : 'approved'; ?>" class="btn btn-info btn-sm">
                            <?php echo $song['status'] == 'approved' ? 'Reject' : 'Approve'; ?>
                            <a href="delete_song.php?id=<?php echo $song['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <!--
                            <a href="edit_song.php?id=<?php echo $song['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            -->
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
