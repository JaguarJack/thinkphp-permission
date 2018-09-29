<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/29 0029
 * Time: 上午 11:53
 */

namespace think\permissions;

class PermissionMiddleware
{
	public function handle($request, \Closure $next)
	{
		$controller = $request->controller();
		$action     = $request->action();

		if (!can(sprintf('%s@%s', $controller, $action))) {
			return $request->isAjax() ?  json(['message' => '没有权限访问'])->code(403) : abort(403, '没有权限访问');
		}

		return $next($request);
	}
}