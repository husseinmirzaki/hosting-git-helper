<?php
/**
 * Created by PhpStorm.
 * User: Hussein Mirzaki
 * Date: 9/13/2018
 * Time: 10:37 AM
 */

namespace App\Controllers;

class GitHubController
{
    public function __construct() { }

    public function tokenPage()
    {
        includeTemplateContent('token_page');
    }

    public function tokenPageDo()
    {
        if (!$token = getPostData('token')) {
            echo "invalid request try again <a href='/token'>Set Token</a>";
            return;
        }
        sessionPut('token', $token);
        header('location: '.getHost() .'/repositories');
    }

    public function showRepositories()
    {
        setGlobals('repositories', getGlobals('github')->user()->repositories(getGlobals('username')));
        includeTemplateContent('show_repositories');
    }

    public function showBranches($repository)
    {
        setGlobals('branches', getGlobals('github')->repo()->branches(getGlobals('username'), setGlobals('repository', $repository)));
        includeTemplateContent('show_branches');
    }

    public function showCommits($repository, $branch)
    {
        setGlobals('commits', getGlobals('github')->repo()->commits()->all(getGlobals('username'), setGlobals('repository', $repository), array('sha' => setGlobals('branch', $branch))));
        includeTemplateContent('show_commits');
    }

    public function showCommit($repository, $branch, $commit)
    {
        setGlobals('branch', $branch);
        setGlobals('commit', getGlobals('github')->repo()->commits()->show(getGlobals('username'), setGlobals('repository', $repository), $commit));
        includeTemplateContent('show_commit');
    }

    public function pullCommit($repository, $branch, $commit)
    {
        set_time_limit(0);
        setGlobals('branch', $branch);
        $commit = setGlobals('commit', getGlobals('github')->repo()->commits()->show(getGlobals('username'), setGlobals('repository', $repository), $commit));

        $dir = getDownPath();
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $files = $commit['files'];
        foreach ($files as $file) {
            $path = $dir;
            $address = $file['filename'];
            $raw_url = $file['raw_url'];
            $status = $file['status'];
            $separated_parts = preg_split('/\//', $address);
            foreach ($separated_parts as $index => $separated_part) {
                $path .= '/' . $separated_part;
                if ($index == count($separated_parts) - 1) {
                    if ($status === 'modified' || $status === 'added') {
                        $rs = fopen($path, 'w+');
                        $text = file_get_contents($raw_url);
                        fwrite($rs, $text);
                        fclose($rs);
                        continue;
                    } elseif ($status === 'removed') {
                        unlink($path);
                        continue;
                    }
                }
                if (!file_exists($path)) {
                    mkdir($path);
                }

            }
        }

        includeTemplateContent('show_commit');
    }

    public function showRepository($repository)
    {
        setGlobals('repository', getGlobals('github')->repo()->show(getGlobals('username'), $repository));
        includeTemplateContent('show_repository');
    }

    public function cloneLink($repository, $ref)
    {
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$repository-$ref.zip");
        echo getGlobals('github')->api('repo')->contents()->archive(getGlobals('username'), setGlobals('repository', $repository), 'zipball', $ref);
    }

    public function cloneToDisk($repository, $ref)
    {
        $archive = getGlobals('github')->api('repo')->contents()->archive(getGlobals('username'), setGlobals('repository', $repository), 'zipball', $ref);
        $resource = fopen(getDownPath() . "/$repository-$ref.zip", 'w+');
        fwrite($resource, $archive);
        fclose($archive);
        header("location: ".$_SERVER['HTTP_REFERER']);
    }

    public function changeProjectDirectory()
    {
        if (!$project_directory = getPostData('pd')) {
            unset($_SESSION['projectDist']);
            return;
        }
        sessionPut('projectDist', $project_directory);

        header('location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }
}