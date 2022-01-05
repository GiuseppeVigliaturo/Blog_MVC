<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free blogging platform">
    <meta name="author" content="Giuseppe Vigliaturo">
    <meta name="generator" content="php mvc">
    <title>FIREBLOG</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">COMMENTING SYSTEM</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts">POSTS</a>
            </li>
            <?php if (isUserLoggedin()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/post/create">NEW POST</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <?php
            if (isUserLoggedin()) :
            ?>
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings">
                        <i class="fa fa-cog fa-fw fa-lg"></i></a></li>




                <li class="nav-link">
                    <h5> Welcome <?= getUserLoggedInFullname() ?></h5>

                </li>
                <li class="m-1">&nbsp;</li>

                <li class="nav-item">
                    <form class="form" role="form" method="post" action="/auth/logout">
                        <input type="hidden" name="action" value="logout">
                        <button class="btn btn-link">LOGOUT</button>
                    </form>
                </li>

                </li>
            <?php
            else : ?>
                <li class="nav-link">

                    <a href="/auth/login" class="btn btn-lg btn-primary">LOGIN</a>
                    <a href="/auth/signup" class="btn btn-lg btn-success">SIGN UP</a>

                </li>
            <?php
            endif;

            ?>
        </ul>
    </nav>

    <div class="container">
        <?= $this->content ?>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <!-- <script src="/js/jquery.js"></script> -->
    <script src="/js/tether.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>