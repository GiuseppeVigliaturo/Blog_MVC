<?php
function view($view, array $data)
{
    extract($data);
    ob_start();
    require  __DIR__ . '/../app/views/' . $view . '.tpl.php';
    $data = ob_get_contents();
    ob_end_clean();
    return $data;
}
function redirect($url = '/')
{
    header("Location:$url");
}

function isUserLoggedin()
{
    return $_SESSION['loggedin'] ?? false;
}

function getUserLoggedInFullname()
{
    return $_SESSION['userData']['username'] ?? '';
}
function getUserRole()
{
    return $_SESSION['userData']['roletype'] ?? '';
}
function getUserEmail()
{
    return $_SESSION['userData']['email'] ?? '';
}
function isUserAdmin()
{
    return getUserRole() === 'admin';
}
function userCanUpdate()
{
    $role = getUserRole();
    return  $role === 'admin' || $role === 'editor';
}
function userCanDelete()
{

    return  isUserAdmin();
}
function getUserId()
{

    return $_SESSION['userData']['id'] ?? 0;
}
function dd($data)
{
    var_dump($data);
    die;
}
