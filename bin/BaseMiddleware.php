<?php

namespace Bin;

class BaseMiddleware{
	public static function process($request){
		call_user_func($request -> action, $request -> params);
	}
}