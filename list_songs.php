<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">All Song Requests</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                $sql = "SELECT title, artist, status FROM songs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['title']}</td>
                                <td>{$row['artist']}</td>
                                <td>";
                        if ($row['status'] == 'approved') {
                            echo '✔️';
                        } else {
                            echo '❌';
                        }
                        echo "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-link btn-block mt-3">Back to Input Form</a>
    </div>
</body>
</html>
