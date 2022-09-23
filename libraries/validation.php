<?php


function iS_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten,$username, $matchs))
        return false;
    return true;
}

function iS_password($password)
{
    $partten = "/^([a-z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten,$password, $matchs))
        return false;
    return true;
}

function form_error($label_field)
{
    global $error;
    if (isset($error[$label_field]))
        echo "<p class='error'> {$error[$label_field]}</p>";
}

function set_value($label_field)
{
    global $$label_field;
    if (isset($$label_field))
        return $$label_field;
}

function is_email($email)
{
    $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($parttern, $email))
        return false;
    return true;
}
function is_phone_number($number)
{
    $parttern = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($parttern, $number, $matchs))
        return false;
    return true;
}

function is_fullname($fullname)
{
    $parttern = "/^[A-Za-z]{6,40}$/";
    if (!preg_match($parttern, $fullname, $matchs))
        return false;
    return true;
}

