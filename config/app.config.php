<?php
return [
    'routes' =>
    [
        'GET' => [
            '' => 'PostController@getPosts',

            'post/create' => 'PostController@create',
        ]
    ]
];
