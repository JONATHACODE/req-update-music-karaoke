<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karaoke Song Request</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center vh-100">
        <div class="w-100 mt-4">
            <form action="add_song.php" method="post" class="mt-4">
            <h1 class="text-center">req update lagu</h1>
                <div class="form-group">
                    <label for="title">Song Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="artist">Artist:</label>
                    <input type="text" class="form-control" id="artist" name="artist" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Song</button>
                <a href="list_songs.php" class="btn btn-link btn-block mt-3">View All Songs</a>
            </form>
        </div>
    </div>
</body>
</html>
