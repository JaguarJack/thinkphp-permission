<?php
/**
 * hasRoles.php
 * Created by wuyanwen <wuyanwen1992@gmail.com>
 * Date: 2018/9/28 0028 21:58
 */

namespace think\permissions\traits;

trait HasRoles
{
	public function roles()
	{
		return $this->belongsToMany(config('permissions.model.role'), config('permissions.table.user_has_roles'), 'role_id', 'uid');
	}

	/**
	 * 获取角色
	 *
	 * @author wuyanwen <wuyanwen1992@gmail.com> at 2018年09月28日 22:02
	 * @return mixed
	 */
	public function getRoles($full = true)
	{
		return $full ? $this->roles : $this->roles()->column('role_id');
	}

	/**
	 * 删除相关角色
	 *
	 * @author wuyanwen <wuyanwen1992@gmail.com> at 2018年09月28日 22:02
	 * @param null $roles
	 * @return mixed
	 */
	public function detachRoles($user_id, $roles = null)
	{
		return self::get($user_id)->roles()->detach($roles);
	}

	/**
	 * 关联角色
	 *
	 * @author wuyanwen <wuyanwen1992@gmail.com> at 2018年09月28日 22:02
	 * @param null $roles
	 * @return mixed
	 */
	public function attachRoles($user_id, $roles = null)
	{
		return self::get($user_id)->roles()->attach($roles);
	}
}