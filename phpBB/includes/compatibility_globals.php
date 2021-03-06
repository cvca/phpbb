<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// set up caching
/* @var $cache \phpbb\cache\service */
$cache = $phpbb_container->get('cache');

// Instantiate some basic classes
/* @var $phpbb_dispatcher \phpbb\event\dispatcher */
$phpbb_dispatcher = $phpbb_container->get('dispatcher');

/* @var $request \phpbb\request\request_interface */
$request	= $phpbb_container->get('request');

/* @var $user \phpbb\user */
$user		= $phpbb_container->get('user');

/* @var $auth \phpbb\auth\auth */
$auth		= $phpbb_container->get('auth');

/* @var $db \phpbb\db\driver\driver_interface */
$db			= $phpbb_container->get('dbal.conn');

// make sure request_var uses this request instance
request_var('', 0, false, false, $request); // "dependency injection" for a function

// Grab global variables, re-cache if necessary
/* @var $config phpbb\config\db */
$config = $phpbb_container->get('config');
set_config_count(null, null, null, $config);

/* @var $phpbb_log \phpbb\log\log_interface */
$phpbb_log = $phpbb_container->get('log');

/* @var $symfony_request \phpbb\symfony_request */
$symfony_request = $phpbb_container->get('symfony_request');

/* @var $phpbb_filesystem \phpbb\filesystem */
$phpbb_filesystem = $phpbb_container->get('filesystem');

/* @var $phpbb_path_helper \phpbb\path_helper */
$phpbb_path_helper = $phpbb_container->get('path_helper');

// load extensions
/* @var $phpbb_extension_manager \phpbb\extension\manager */
$phpbb_extension_manager = $phpbb_container->get('ext.manager');

/* @var $template \phpbb\template\template */
$template = $phpbb_container->get('template');
