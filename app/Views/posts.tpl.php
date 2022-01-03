<?php

foreach ($posts as $post) :

?>
    <article>
        <br><br><br><br>
        <h2><a href="/post/<?= $post->id ?>"><?= htmlentities($post->title) ?></a> </h2>
        <?= htmlentities($post->message) ?>
        <p>
            <time datetime="<?= $post->datecreated ?>"><?= $post->datecreated ?></time>
            by <span><a href="mailto:<?= $post->email ?>"><?= $post->email ?></a> </span>
        </p>
    </article>
<?php
endforeach;
?>