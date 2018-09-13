<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
define('MAIN_DIR', __DIR__);
define('HOST', $_SERVER['HTTP_HOST']);
require 'app/functions.php';
$controller = new \App\Controllers\GitHubController;
includeTemplate('header');
includeTemplate('body_top');
if (isset($_SERVER['REDIRECT_URL'])) {
    $request = $_SERVER['REDIRECT_URL'];
    $inner_address = explode('/', $request);
    if (!($token = sessionGet('token')) && $request != "/token") {
        echo "go to <a href='/token'>Token</a>";
    } else {
        if (sessionGet('token')) {
            setGlobals('github', new \Github\Client());
            getGlobals('github')->authenticate(sessionGet('token'), null, \Github\Client::AUTH_HTTP_TOKEN);
            setGlobals('user', getGlobals('github')->currentUser()->show());
            setGlobals('username', getGlobals('user')['login']);
        }
        switch ($inner_address[1]) {
            case 'token':
                if (methodPost())
                    $controller->tokenPageDo();
                else
                    $controller->tokenPage();
                break;
            case 'repositories':
                $controller->showRepositories();
                break;
            case 'repository':
                $controller->showRepository($inner_address[2]);
                break;
            case 'branches':
                $controller->showBranches($inner_address[2]);
                break;
            case 'commits':
                $controller->showCommits($inner_address[2], $inner_address[3]);
                break;
            case 'commit':
                $controller->showCommit($inner_address[2], $inner_address[3], $inner_address[4]);
                break;
            case 'pull':
                $controller->pullCommit($inner_address[2], $inner_address[3], $inner_address[4]);
                break;
            case 'clone':
                $controller->cloneLink($inner_address[2], $inner_address[3]);
                break;
            case 'cloneToDisk':
                $controller->cloneToDisk($inner_address[2], $inner_address[3]);
                break;
        }
    }
} else {
    echo "welcome";
}
includeTemplate('body_bottom');
includeTemplate('footer');
?>