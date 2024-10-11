<?php
require "../conn.php";
include "../includes/header.php";


$path = explode("/", $_SERVER["REQUEST_URI"]);
$path = array_filter($path, fn($value) => !is_null($value) && $value !== '');



if(sizeof($path) == 0) {
    include "../views/home.php";
}
elseif (sizeof($path) == 2 && $path[1] == "post") {
    include "../views/single-post.php";
}
elseif (sizeof($path) == 2 && $path[1] == "edit" && $path[2] == "add") {
    include "../views/reg-post.php";
}else {
    include "../views/404.php";
}

require "../includes/footer.php"

?>
