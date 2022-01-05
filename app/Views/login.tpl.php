<br><br><br><br>

<?php
if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-danger">
        <?php
        echo htmlentities($_SESSION['message']);

        $_SESSION['message'] = '';
        ?>
    </div>

<?php
endif;
?>
<div class='row'>
    <div class='col-md-6 offset-3'>
        <h1><?= $signup ? 'SIGN UP' : 'SIGN IN' ?> </h1>
        <form id='loginform' action=<?= $signup ? '/auth/signup' : '/auth/login' ?> method='POST'>

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

<script>
    $(function() {
            $('#loginform').on('submit', function(evt) {
                //alert('invio tramite form');
                evt.preventDefault();
                const data = $(this).serialize();

                $.ajax({
                    method: 'post',
                    data: data,
                    url: $(this).attr('action'),

                    success: function(response) {
                        
                        const data = JSON.parse(response);
                        console.log('post parse');
                        if (data) {
                            //alert(data.message);
                            if (data.success) {
                                alert('USER LOGGED IN');
                                location.href = '/';

                            }
                        }

                    },
                    failure: function() {
                        alert('PROBLEM CONTACTING SERVER')
                    },
                })
            })
        }
    );
</script>
