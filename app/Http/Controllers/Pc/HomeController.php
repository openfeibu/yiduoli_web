<?php

namespace App\Http\Controllers\Pc;

use Illuminate\Http\Request;
use Route,Auth;
use App\Models\Banner;
use App\Http\Controllers\Pc\Controller as BaseController;


class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Show dashboard for each user.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $http_host = request()->server('HTTP_HOST');

        if($http_host == setting('website'))
        {
            $lang = $request->get('lang','');
            if($lang)
            {
                $ip = $request->getClientIp();
                $is_ip_in_china = is_ip_in_china($ip);
                var_dump($is_ip_in_china);exit;
            }
//            if(empty($lang) || ($lang != 'cn'))
//            {
//                $ip = $request->getClientIp();
//                $is_ip_in_china = is_ip_in_china($ip);
//                if(!$is_ip_in_china)
//                {
//                    return redirect(setting('sea_website'));
//                }
//            }
        }

        $banners = Banner::orderBy('order','asc')->orderBy('id','asc')->get();
        return $this->response->title('首页')
            ->layout('home')
            ->view('home')
            ->data(compact('banners'))
            ->output();
    }

}
