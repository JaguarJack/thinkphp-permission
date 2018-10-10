<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29 0029
 * Time: 上午 11:53
 */

namespace think\permissions;
use traits\controller\Jump;

class PermissionMiddleware
{
	use Jump;

	public function handle($request, \Closure $next)
	{
		$controller = $request->controller();
		$action     = $request->action();

		if (!can(strtolower(sprintf('%s@%s', $controller, $action)))) {
			$this->error('没有权限操作');
		}

		return $next($request);
	}
}