<h1>EDIT</h1>
<h6><?= $post->id ?></h6>
<div class="row">
    <div class="col-md-6 push-md-3">
        <form action="/post/<?= $post->id ?>/store" method="POST">
            <input class="form-control" name="id" type="hidden" value="<?= $post->id ?>">
            <div class="form-group">

                <label for="title">Title</label>
                <input name="title" class="form-control" type="text" name="title" id="title" value="<?= $post->title ?>" required>

            </div>
            <div class=" form-group">

                <label for="title">Message</label>
                <textarea required name="message" class="form-control" name="message" id="message">
                    <?= $post->message ?>
                </textarea>

            </div>
            <div class="form-group text-md-center">
                <button class="btn  btn-success">EDIT</button>
            </div>
        </form>
    </div>
</div>