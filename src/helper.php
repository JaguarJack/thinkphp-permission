<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29 0029
 * Time: 上午 9:25
 */

use think\permissions\facade\Permissions;
use think\permissions\facade\Roles;

/**
 * 是否有权限
 *
 * @time at 2018年09月29日
 * @param $permission => controller@action
 * @return bool
 */
if (!function_exists('can')) {
	function can($permission)
	{
		$module = request()->module();
		list($controller, $action) = explode('@', $permission);
		$user = request()->session(config('permissions.user'));
		$roleIDs = $user->getRoles(false);
		$permission = Permissions::getPermissionByModuleAnd($module, $controller, $action);
		if (!$permission) {
			return false;
		}
		$permissions = [];
		foreach ($roleIDs as $role) {
			$permissions = array_merge($permissions, (Roles::getRoleBy($role)->getPermissions(false)));
		}
		if (!in_array($permission->id, $permissions)) {
			return false;
		}
		return true;
	}
}
