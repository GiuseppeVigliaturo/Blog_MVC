<?php
return [
    'routes' =>
    [
        'GET' => [
            '' => 'App\Controllers\PostController@getPosts',
            'posts' => 'App\Controllers\PostController@getPosts',
            'post/create' => 'PostController@create',


        ]
    ]
];
