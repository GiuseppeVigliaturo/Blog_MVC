<br><br><br>
<article>
    <div class="row">
        <div class="col-md-6 push-md-3">
            <h1><?= $post->title ?></h1>
            <p>
                <time datetime="<?= $post->datecreated ?>"><?= $post->datecreated ?></time>

                by <span><a href="mailto:<?= $post->email ?>"> <?= $post->email ?></a> </span>
            </p>
            <div><?= $post->message ?></div>
            <br>
            <div class="form-group">
                <?php
                if (getUserId() === $post->user_id ||  userCanUpdate()) :
                ?>
                    <form class="form-inline" action="/post/<?= $post->id ?>/edit" method="GET">


                        <input type="submit" class="btn btn-primary" value="EDIT">
                    </form>
                <?php endif;

                if (getUserId() === $post->user_id ||  userCanDelete()) :
                ?>
                    <form class="form-inline" action="/post/<?= $post->id ?>/delete" method="POST">
                        <input type="submit" class="btn btn-danger" value="DELETE">

                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="push-md-3 col-md-6 text-md-center">
            <hr>
            <h2>COMMENTS</h2>

            <form action="/post/<?= $post->id ?>/comment" method="POST">
                <?php if (!isUserLoggedin()) : ?>
                    <div class="form-group">

                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="email" name="email" i="email" required>

                    </div>
                <?php endif; ?>
                <div class="form-group">

                    <label for="comment">Message</label>
                    <textarea required name="comment" class="form-control" name="comment" i="message"></textarea>

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
                        <?php 
                            $email = $comment->email ?? $comment->useremail;
                        ?>
                        by <span><a href="mailto:<?= $email ?>"> <?= $email ?></a> </span>
                    </p>

            <?php
                }
            }
            ?>
        </div>
    </div>