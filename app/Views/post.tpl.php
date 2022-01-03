<article>
    <br><br><br>
    <h1>Il mio post</h1>
    <?= htmlentities($post->title) ?>
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
        <form action="/post/<?= $post->id ?>/comment" method="POST">

            <div class="form-group">

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>

            </div>
            <div class="form-group">

                <label for="title">Comment</label>
                <textarea required name="comment" class="form-control"></textarea>

            </div>
            <div class="form-group text-md-center">
                <button class="btn  btn-success">Save</button>
            </div>
        </form>
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