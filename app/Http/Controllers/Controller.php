<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $nameSpace = null;//命名空间
    private $action = null;//传输视图名称
    private $shareData = [];//分享数据

    public function view($viewPath = null, $viewData = []){

    	if ($viewPath === null) {
    		$nameSpace = '';
    		$action = '';
    	}
    	return view($nameSpace.'.'.$action,$this->shareData);
    }
}
