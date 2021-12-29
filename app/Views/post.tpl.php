<article>
    <h1>Il mio post</h1>
    <?= htmlentities($post->message) ?>
</article>
<form action="/post/<?= $post->id ?>/edit" method="GET">
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="EDIT">
    </div>
</form>
<form action="/post/<?= $post->id ?>/delete" method="POST">
    <div class="form-group">
        <input type="submit" class="btn btn-danger" value="DELETE">
    </div>
</form>

<div class='row'>
    <div class='push-md-3 col-md-6 text-md-center'>
        <hr>
        <h2>COMMENTS</h2>
        <?php

        if (!empty($comments)) {
            foreach ($comments as $comment) { ?>

                <p><?= $comment->comment ?></p>
                <p>
                    <time datetime="<?= $comment->datecreated ?>"><?= $comment->datecreated ?></time>

                    by <span><a href="mailto:<?= $comment->email ?>"> <?= $comment->email ?></a> </span>
                </p>

        <?php
            }
        }
        ?>
    </div>
</div>