<?php
foreach ($posts as $post) :
?>
    <br><br>
    <article>
        <h1><?= htmlentities($post->title) ?></h1>
        <?= htmlentities($post->message) ?>
    </article>
<?php
endforeach;
?>