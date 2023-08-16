<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List</title>
</head>
<body>
    <h1>Uploaded Files</h1>
    <ul>
        <?php
        $targetDirectory = "uploads/";
        $files = scandir($targetDirectory);
        
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                echo '<li><a href="' . $targetDirectory . $file . '">' . $file . '</a></li>';
            }
        }
        ?>
    </ul>
</body>
</html>
