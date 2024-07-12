<?php
//Define the directory where file will be saved
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOK = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Check if file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        //Check file size
        if ($_FILES["file"]["size"] > 5000000) {
            echo "Sorry your file is too large";
            $uploadOK = 0
        }

        //Allow certain file formats
        $allowedTypes = array("jpg", "png", "gif", "pdf", "doc", "docx");
        if (!in_array($fileType, $allowedTypes)) {
            echo "Sorry, only JPG, PNG, GIF, PDF, DOC, and DOCX files are allowed.";
            $uploadOK = 0;
        }

        //Check if $uploadOK is set to 0 by an error
        if ($uploadOK == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            //Try to upload file
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "The file". htmlspecialchars(basename($_FILES["file"]["name"])) . "has been uploaded.";
                //Here you can add additional code to process the file as needed
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error" . $_FILES["file"]["error"];
    }
}
?>