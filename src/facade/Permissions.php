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
 * @method  static  \think\permissions\model\Permissions store(array $permission) store
 * @method  static  \think\permissions\model\Permissions getPermissionBy($permission_id) get by id
 * @method  static  \think\permissions\model\Permissions deleteBy($permission_id) delete by id
 * @method  static  \think\permissions\model\Permissions updateBy($permission_id, $data) update by id
 * @method  static  \think\permissions\model\Permissions getPermissionByModuleAnd($module, $controller, $action)
 * @method  static  \think\permissions\model\Permissions detachRole($role_id) detach roles of Permission
 */
class Permissions extends Facade
{
	public static function getFacadeClass()
	{
		return config('permissions.model.permission');
	}
}