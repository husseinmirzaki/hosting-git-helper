<?php
function getHost()
{
    return getProtocol() . '://' . HOST;
}

function getMainDir()
{
    return MAIN_DIR;
}

function getTemplateDir()
{
    return getMainDir() . '/app/Pages';
}

function getTemplateContentDir()
{
    return getMainDir() . '/app/Pages/contents';
}

function includeTemplateContent($str)
{
    includeTemplate('header');
    includeTemplate('body_top');
    require getTemplateContentDir() . "/$str.php";
    includeTemplate('body_bottom');
    includeTemplate('footer');
}

function includeTemplate($str)
{
    include getTemplateDir() . "/$str.php";
}

function getAsset($str)
{
    return getHost() . '/assets/' . $str;
}

function theAsset($str)
{
    echo getAsset($str);
}

function getProtocol()
{
    return isset($_SERVER['HTTPS']) ? 'https' : 'http';
}

function sessionHas($str)
{
    return isset($_SESSION[$str]);
}

function sessionGet($str)
{
    if (sessionHas($str)) {
        return $_SESSION[$str];
    }
    return false;
}

function sessionPut($key, $value)
{
    $_SESSION[$key] = $value;
}

function methodPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function getPostData($str)
{
    if (isset($_POST[$str]))
        return $_POST[$str];
    return false;
}

function getGetData($str)
{
    if (isset($_GET[$str]))
        return $_GET[$str];
    return false;
}

function setGlobals($key, $value)
{
    return $GLOBALS[$key] = $value;
}

function getGlobals($key)
{
    return $GLOBALS[$key];
}
function getDownPath()
{
    return sessionGet('projectDist') ?: getMainDir();
}