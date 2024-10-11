
<?php

require "../functions.php";

if (isset($_POST['register_post'])) {
    $rubrik = htmlspecialchars($_POST['headline'], ENT_QUOTES);
    $text = htmlspecialchars($_POST['bodytext'], ENT_QUOTES);
    $url = uniqUrl($rubrik, $conn);
    $img = uploadImg($_FILES["fileToUpload"]);

    if($img["status"] == "OK"){
        $sql = "INSERT INTO posts (rubrik, text, url, img) VALUES ('$rubrik', '$text', '$url', '" . $img['url'] . "')";

        if ($conn->query($sql) === TRUE) {
            $post_id = $conn->insert_id;

            
            echo "New post created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else {
        echo $img["msg"];
    }
}

$conn->close();

?>

<h1>Add a Post</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="headline">Rubrik:</label><br>
    <input type="text" id="headline" name="headline" required><br><br>

    <label for="bodytext">Text:</label><br>
    <textarea id="bodytext" name="bodytext" required></textarea><br><br>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" name="register post">
</form>
