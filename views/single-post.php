<?php
    $url = end($path);
    $sql = "SELECT * FROM posts WHERE url = '$url'";
    $result = $conn->query($sql);
    $pageId = 666;
    if ($result->num_rows > 0) {
        // Output each category as an option in the select menu
        while($post = $result->fetch_assoc()) { ?>
        <?php $pageId = $post['id']; ?>
            <article>
                <h2><?php echo $post['rubrik']; ?></a></h2>
                <?php if ($post['img'] != NULL) {?>
                    <img src="/<?php echo $post['img']; ?>">
                <?php } ?>
                <p><?php echo $post['text']; ?></p>
            </article>
        <?php 
        }
    } else {
        echo "404";
    }

    $sql = "SELECT * FROM posts WHERE id < '$pageId' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($post = $result->fetch_assoc()) { ?>
        <a href="/post/<?php echo $post['url']; ?>">Läser tidigare: <?php echo $post['rubrik']; ?></a>
        <?php 
        }
    }

    $sql = "SELECT * FROM posts WHERE id > '$pageId' ORDER BY id LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($post = $result->fetch_assoc()) { ?>
        <a href="/post/<?php echo $post['url']; ?>">-><?php echo $post['rubrik']; ?></a>
        <?php 
        }
    }

    



    $conn->close();
?>
