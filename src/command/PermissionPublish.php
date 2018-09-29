<?php
/**
 * PermissionPublish.php
 * Created by wuyanwen <wuyanwen1992@gmail.com>
 * Date: 2018/9/26 0026 23:23
 */

namespace think\permissions\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;

class PermissionPublish extends Command
{
	protected function configure()
	{
		$this->setName('permission-publish')
			 ->setDescription('Publish Permission Files');
	}

	protected function execute(Input $input, Output $output)
	{
		$output->write(sprintf('permissions config file publish %s' . PHP_EOL, $this->publishConfig() ? 'successfully' : 'failed'));

		$output->write(sprintf('permissions migrations publish %s',$this->publishMigrations() ? 'successfully' : 'failed'));
	}

	/**
	 * publish config
	 *
	 * @author wuyanwen <wuyanwen1992@gmail.com> at 2018年09月27日 21:19
	 * @return bool
	 */
	protected function publishConfig()
	{
		$permissionsConfigPath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'permissions.php';

		return copy($permissionsConfigPath, app()->getConfigPath() . 'permissions.php');
	}

	/**
	 * publish migrations
	 *
	 * @author wuyanwen <wuyanwen1992@gmail.com> at 2018年09月27日 21:20
	 * @return bool
	 */
	protected function publishMigrations()
	{
		$migrationsPath = app()->getRootPath() . 'database' . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR;
		if (!is_dir($migrationsPath)) {
			mkdir($migrationsPath, 0777, true);
		}
		$databasePath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;
		$handle = opendir($databasePath);
		$status = true;
		while ( ($file = readdir($handle))!= false) {
			if ($file != '.' && $file != '..') {
				if (!copy($databasePath . basename($file), $migrationsPath . basename($file))) {
					$status = false;
					break;
				}
			}
		}
		return $status;
	}
}