<?php

function set_active($path, $class = 'active')
{
    return Request::is($path) ? $class : '';
}

function set_active_accordion_link($path, $class = 'link-active')
{
    return Request::is($path) ? $class : '';
}