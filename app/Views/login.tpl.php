<br><br><br><br>
<div class='row'>
    <div class='col-md-6 offset-3'>
        <h1><?= $signup ? 'SIGN UP' : 'SIGN IN' ?> </h1>
        <form action=<?= $signup ? 'auth/signup' : 'auth/login' ?> method='POST'>

            <input type="hidden" name='_csrf' value="<?= $token ?>">

            <?php if ($signup) : ?>
                <div class="form-group">

                    <label for="username">User name</label>
                    <input class="form-control" name="username" type="text" value="" name="username" i="username">

                </div>
            <?php endif; ?>

            <div class='form-group'>
                <label for='email'>Email</label>
                <input class='form-control' name='email' type='email' value='' id='email' required>
            </div>
            <div class='form-group'>
                <label for='password'>Password</label>
                <input name='password' class='form-control' value='' type='password' id='password' required>
            </div>
            <div class='form-group text-md-center'>
                <button class='btn  btn-primary'><?= $signup ? 'SIGN UP' : 'SIGN IN' ?></button>
            </div>
        </form>
    </div>
</div>