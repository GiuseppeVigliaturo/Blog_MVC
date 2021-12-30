<div class='row'>
    <div class='col-md-6 offset-3'>
        <h1>Sign in </h1>
        <form action='/auth/signin' method='POST'>

        <input type="hidden" name='_csrf' value="<?= $token ?>">
            <div class='form-group'>
                <label for='email'>Email</label>
                <input class='form-control' name='email' type='email' value='' id='email' required>
            </div>
            <div class='form-group'>
                <label for='password'>Password</label>
                <input name='password' class='form-control' value='' type='password' id='password' required>
            </div>
            <div class='form-group text-md-center'>
                <button class='btn  btn-primary'>LOGIN</button>
            </div>
        </form>
    </div>
</div>