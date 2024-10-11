<?php
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output each category as an option in the select menu
        while($post = $result->fetch_assoc()) { ?>
            <article>
                <h3><a href="/post/<?php echo $post['url']; ?>"><?php echo $post['rubrik']; ?></a></h3>
                <p><?php echo $post['text']; ?></p>
            </article>
        <?php 
        }
    }

    $conn->close();
?>