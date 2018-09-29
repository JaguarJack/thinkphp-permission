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
 * @method  static  \think\permissions\model\Permissions updateBy($permission_id) update by id
 * @method  static  \think\permissions\model\Permissions getPermissionByModuleAnd($module, $controller, $action)
 */
class Permissions extends Facade
{
	public static function getFacadeClass()
	{
		return config('permissions.model.permission');
	}
}