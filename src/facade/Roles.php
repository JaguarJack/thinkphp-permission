<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29 0029
 * Time: 上午 10:41
 */

namespace think\permissions\facade;

use think\Facade;

/**
 * @method  static  \think\permissions\model\Roles store(array $role) store
 * @method  static  \think\permissions\model\Roles getRoleBy($role_id) get by id
 * @method  static  \think\permissions\model\Roles deleteBy($role_id) delete by id
 * @method  static  \think\permissions\model\Roles updateBy($role_id) update by id
 * @method  static  \think\permissions\model\Roles getPermissions($role_id, $full) get Permissions Of Role
 * @method  static  \think\permissions\model\Roles attachPermissions($role_id) attach permissions to Role
 * @method  static  \think\permissions\model\Roles detachPermissions($role_id) detach permissions of Role
 */

class Roles extends Facade
{
	public static function getFacadeClass()
	{
		return config('permissions.model.role');
	}
}