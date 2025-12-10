<?php

return [

    'proxies' => '*',

    'headers' => [
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_FOR,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_HOST,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PORT,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PROTO,
    ],

];
