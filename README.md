# A simple fase ui for [KnpLabs/php-github-api](https://github.com/KnpLabs/php-github-api)
This simple repo has an index file which under normall circumstances works fine

## Show all of user repositories
aside from showing repositories for now this is possible to have a project directory for your peojects
default project directory is the app's own directory
![app screenshot 0](https://github.com/husseinmirzaki/hosting-git-helper/raw/master/screenshot.png)

## Show all of selected repository branches
You cab see all the available branches of a selected repository
and its info
![app screenshot 1](https://github.com/husseinmirzaki/hosting-git-helper/raw/master/screenshot1.png)

## Pull a branch , Clone a branch or download it or see all the commits
this is posible to pull change of a branch to your project for now it does not support stuff git does
![app screenshot 2](https://github.com/husseinmirzaki/hosting-git-helper/raw/master/screenshot2.png)

## Pull a commit , Clone a commit to disk or download it
this is posible to pull change of a branch to your project for now it does not support stuff git does
![app screenshot 3](https://github.com/husseinmirzaki/hosting-git-helper/raw/master/screenshot3.png)

### Use Cases
This app could be used in your website if it does not allow some certain features like **exec** or **shell_exec** you can use this repo.

## Pay attention while using
inside of `index.php`
```
<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
define('MAIN_DIR', __DIR__);
define('HOST', $_SERVER['HTTP_HOST']);
```
when defining `HOST` if you are using this repo in a sub directory add it here like this
```
define('HOST', $_SERVER['HTTP_HOST']. '/hosting-git-helper');
```
