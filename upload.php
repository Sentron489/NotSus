<?php
$targetDirectory = "uploads/";

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file already exists
if (file_exists($targetFile)) {
    echo "Sorry, the file already exists.";
    $uploadOk = 0;
}

// Check file size (adjust as needed)
if ($_FILES["file"]["size"] > 5000000) { // 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only specific file formats
$allowedFileTypes = array("dll", "txt", "exe", "log", "xpr", "7z");
if (!in_array($fileType, $allowedFileTypes)) {
    echo "Sorry, only DLL, TXT, EXE, LOG, XPR, and 7Z files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        header("Location: file_list.php"); // Redirect to the file listing page
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
