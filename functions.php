<?php
    function uniqUrl($title, $conn) {
        $slug = str_replace(" ", "-",$title);
        $slug = strtolower($slug);
        $originalSlug = $slug;
        $count = 1;
        while (true) {
            $sql = "SELECT id FROM posts WHERE url = '$slug'";
            $result = $conn->query($sql);
            if ($result->num_rows < 1) {
                break;
            } else {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        }
        return $slug;
    }

    function uploadImg($newFile){
        $message = array("status"=>"", "msg"=>"", "url"=>"");
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($newFile["name"]);
        $old_targert = $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        
        $check = getimagesize($newFile["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $message["status"] = "Error";
            $message["msg"] = "File is not an image.";
            $uploadOk = 0;
        }
        

        // Check if file already exists
        $try = 0;
        while(file_exists($target_file)) {
            $try = $try + 1;
            $target_file = $target_dir . strval($try) . basename($newFile["name"]);
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $message["status"] = "Error";
            $message["msg"] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $message["status"] = "Error";
                $message["msg"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $message["status"] = "OK";
                $message["url"] = $target_file;
            } else {
                $message["status"] = "Error";
                $message["msg"] = "Sorry, there was an error uploading your file.";
            }
        }
        return $message;
    }
?>
