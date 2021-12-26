<article>
    <h1>Il mio post</h1>
    <?=htmlentities($post->message)?>
</article>
<form action="/post/<?= $post->id ?>/edit" method="GET">
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="EDIT">
        <input type="submit" class="btn btn-danger" value="DELETE">
    </div>
</form>