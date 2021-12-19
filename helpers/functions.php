<?php
function view($view, $data)
{
    extract($data);
    ob_start();
    require  __DIR__ . '/../app/views/' . $view . '.tpl.php';
    $data = ob_get_contents();
    ob_end_clean();
    return $data;
}
