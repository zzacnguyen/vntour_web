<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\edituser;
use Session;
use DB;
use App\contact_infoModel;
use GuzzleHttp\Client;
class accountController extends Controller
{
    public function get_info_account()
    {
    	$info = $this::get_info_user();
        // dd($info);
    	if (!$this::check_login()) {
            Session()->flush();
    		return view('VietNamTour.login');
    	}
    	else{
            $quyen = $this::get_quyen_dangky();
            $quyen_hientai = $this::get_quyen_user();
            $quyen_dangxet = $this::get_quyen_dangxet_user();
            // return $quyen_dangxet;

    		return view('VietNamTour.content.user.info', compact('info','quyen','quyen_hientai','quyen_dangxet'));
    	}
    	
    }


    // api 
    public function check_login()
    {
        if (Session::has('login') && Session::get('login')) 
        {
            return 1;
        }
        else{ return -1; }
    }

    public function get_info_user()
    {
        
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://chinhlytailieu/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_info_user/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }



    //===============
    public function post_edit_info_account(edituser $request)
     {    
        if(!is_dir('public/resource/images/avatar')){
            mkdir('public/resource/images/avatar',0777, true);
        }
        else
        {
            if($request->image && $request->image != '')
            {
             
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('resource/images/avatar');
                $file->move($destinationPath,$name);
                $user_id = Session::get('user_info')->id;
                $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://chinhlytailieu/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
                $response = $client->request('POST', 'edituser/'.$user_id.'', [
        
                    
                    'form_params' => [
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone'=>$request->phone,
                        'website'=>$request->website,
                        'address'=>$request->address,
                        'lang'=>$request->lang,
                        'avatar'=>$name,
                    
                    ]
                ])->getBody();
                
                if($response=="ok")
                {
                    return redirect()->back();
                }
                
            }
            else
            {
                $user_id = Session::get('user_info')->id;
                $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://chinhlytailieu/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
                $response = $client->request('POST', 'edituser/'.$user_id.'', [
        
                    
                    'form_params' => [
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone'=>$request->phone,
                        'website'=>$request->website,
                        'address'=>$request->address,
                        'lang'=>$request->lang
                    
                    ]
                ])->getBody();
                if($response=="ok")
                {
                    return redirect()->back();
                }
               
            }

        }
        
    }


    public function register_uplevel_user(Request $request)
    {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://chinhlytailieu/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);

        $response = $client->request('POST', 'savequyendangky/'.$user_id.'', [
                    'form_params' => [
                        'quyen' => $request->selectnangcap
                    ]
                ])->getBody();
        $result = json_decode($response->getContents());
        if ($result == 1) {
            return json_decode($response);
            return redirect()->back();
        }
        else if($result == 0)
        {
            return "Hiện tại bạn không thể đăng ký thêm quyền";
        }
        else{
            return "Lỗi không thêm được";
        }
    }


    public function get_quyen_dangky() // lay ra nhung quyen nguoi dung co the dang ky
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://chinhlytailieu/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_dangky/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }

    public function get_quyen_dangxet_user() // lay ra nhung quyen nguoi dung co the dang ky
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://chinhlytailieu/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_dangxet_user/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }

    public function get_quyen_user() // lay ra nhung quyen nguoi dung dang co
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://chinhlytailieu/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_user/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }



    public function getPlace_user()
    {
        return view('VietNamTour.content.user.place.place_user');
    }

    public function addplace()
    {
        return view('VietNamTour.content.user.place.addplace');
    }

    public function getservice_user()
    {
        return view('VietNamTour.content.user.service.service_user');
    }

    public function addservice_user()
    {
        return view('VietNamTour.content.user.service.addservice');
    }
}
