<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];

    $sql = "UPDATE songs SET title='$title', artist='$artist' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM songs WHERE id=$id");
    $song = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Song</h1>
        <form action="edit_song.php" method="post" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $song['id']; ?>">
            <div class="form-group">
                <label for="title">Song Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $song['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="artist">Artist:</label>
                <input type="text" class="form-control" id="artist" name="artist" value="<?php echo $song['artist']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update Song</button>
        </form>
        <a href="dashboard.php" class="btn btn-link btn-block mt-3">Back to Dashboard</a>
    </div>
</body>
</html>
