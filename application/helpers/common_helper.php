<?php

function bbcode_decode($input){
    $ci = get_instance();
    return $ci->bbcode->data->toHtml($input);
}