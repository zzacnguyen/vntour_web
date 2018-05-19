<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\edituser;
use App\Http\Requests\edituserplace;
use App\Http\Requests\addservice;
use App\Http\Requests\editservice;
use Session;
use DB;
use App\contact_infoModel;
use GuzzleHttp\Client;
// use App\tripScheduleModel;
class accountController extends Controller
{
    public function get_info_account()
    {
    	$info = $this::get_info_user();
        // return $info;
        // dd($info);
    	if (!$this::check_login()) {
            Session()->flush();
    		return view('VietNamTour.login');
    	}
    	else{
            $quyen2 = $this::get_quyen_dangky();
            $quyen_hientai = $this::get_quyen_user();
            $quyen_dangxet = $this::get_quyen_dangxet_user();
            // return $quyen_hientai;

    		return view('VietNamTour.content.user.info', compact('info','quyen2','quyen_hientai','quyen_dangxet'));
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
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_info_user/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }


    //=============== moblide ==============
    public function post_edit_info_account_mobile(edituser $request)
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
                    'base_uri' => 'http://vntourweb/vntour_api/',
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
                    'base_uri' => 'http://vntourweb/vntour_api/',
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
                    'base_uri' => 'http://vntourweb/vntour_api/',
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
                    'base_uri' => 'http://vntourweb/vntour_api/',
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
                    'base_uri' => 'http://vntourweb/vntour_api/',
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
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_dangky_moi/{$user_id}");
            
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
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_dangxet_userList/{$user_id}");
            
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
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_quyen_userList/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }



    // public function getPlace_user()
    // {
    //     return view('VietNamTour.content.user.place.place_user');
    // }


    // public function getservice_user()
    // {
    //     return view('VietNamTour.content.user.service.service_user');
    // }



    public function get_tripchudule()
    {
        if (Session::has('user_info')) {
            $user_id = Session::get('user_info')->id;
        }
        else{
            return "Bạn cần đăng nhập";
        }

        $danhsach_CKT = $this::get_lichtrinh_type($user_id,1);
        $danhsach_KT = $this::get_lichtrinh_type($user_id,2);
        // dd($danhsach_KT);
        $chitiet = null;
        $lichtrinh = null;
        $id_lichtrinh = null;
        $dv = $this::get_service_lichtrinh();
        // dd($danhsach);
        return view('VietNamTour.content.user.tripschedule',compact('danhsach_CKT','danhsach_KT','chitiet','lichtrinh','dv','id_lichtrinh'));
    }

    public function get_tripchudule_detail($idTripSchedule)
    {
        if (Session::has('user_info')) {
            $user_id = Session::get('user_info')->id;
        }
        else{
            return "Bạn cần đăng nhập";
        }

        $danhsach_CKT = $this::get_lichtrinh_type($user_id,1);
        $danhsach_KT = $this::get_lichtrinh_type($user_id,2);

        $chitiet = $this::getListDetaiTripSchedule($idTripSchedule);
        $lichtrinh = $this::getListOneTripSchedule($idTripSchedule);
        if ($lichtrinh != null) {
            foreach ($lichtrinh as $value) {
                $id_lichtrinh = $value->id;
            }
        }
        else
        {
            return redirect()->back();
        }
        $dv = $this::get_service_lichtrinh();
        // dd($chitiet);
        return view('VietNamTour.content.user.tripschedule',compact('danhsach_CKT','danhsach_KT','chitiet','lichtrinh','dv','id_lichtrinh'));
    }




    //list-schedule/{id}
    public function getListTripSchedule()
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"list-schedule/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }

    public function getListDetaiTripSchedule($idTripSchedule)
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"list-schedule-details_web/{$idTripSchedule}");
            
            return json_decode($response->getBody()->getContents());
        }
    }

    //schedule-one/{id}
    public function getListOneTripSchedule($idTripSchedule)
    {
        if (!Session::has('user_info')) {
            return view('VietNamTour.login');
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"schedule-one/{$idTripSchedule}");
            
            return json_decode($response->getBody()->getContents());
        }
    }


    public function saveTripSchedule(Request $request)
    {
        $user_id = Session::get('user_info')->id;
        //

        // return $request->name;

        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://vntourweb/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
        $response = $client->request('POST', 'post-schedule/user='.$user_id.'', [

                    'form_params' => [
                        'trip_name' => $request->trip_name,
                        'trip_startdate' => $request->trip_startdate,
                        'trip_enddate'=>$request->trip_enddate,
                    ]
                ])->getBody();

        $result = json_decode($response->getContents());
        if ($result == "status:200") {
            return redirect()->back();
        }
        else
        {
            return "Lỗi không thêm được!";
        }
    }

    public function saveDetailTripSchedule(Request $request,$idlichtrinh)
    {
        $user_id = Session::get('user_info')->id;

        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://vntourweb/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
        $response = $client->request('POST', 'post-schedule-details/schedule='.$idlichtrinh.'', 
            [
                'form_params' => ['service_id' => $request->service_id]
            ])->getBody();

        $result = json_decode($response->getContents());
        if ($result == "status:200") {
            return 1;
        }
        else
        {
            return -1;
        }
    }

    public function saveTripSchedule_array(Request $request)
    {
        $user_id = Session::get('user_info')->id;
        $lichtrinh = $request->list;
        $detail_lichtrinh = $request->listDeail;
        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://vntourweb/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
        // them lich trinh
        $responseList = $client->request('POST', 'post-schedule/user='.$user_id.'', 
            [
                'form_params' => [
                    'trip_name' => $lichtrinh['trip_name'],
                    'trip_startdate' => $lichtrinh['trip_startdate'],
                    'trip_enddate'=>$lichtrinh['trip_enddate'],
                ]
            ])->getBody();

        $result_List = json_decode($responseList->getContents());
        if($result_List == "status:200"){
            if ($detail_lichtrinh != null) {
                $lamlist = $client->request('GET',"get_idtripschedule_web");

                $id_lichtrinh = json_decode($lamlist->getBody()->getContents());
                for ($i=0; $i < count($detail_lichtrinh) ; $i++) { 
                    $response = $client->request('POST', 'post-schedule-details/schedule='.$id_lichtrinh.'', 
                        [
                            'form_params' => ['service_id' => $detail_lichtrinh[$i]]
                        ])->getBody();
                }
            }
        }
        if (!empty($detail_lichtrinh)) {
            $path_success = "get_tripchudule_detail/".$id_lichtrinh;
            return $path_success;
        }
        else
        {
            return 1;
        }
            
    }



    public function get_service_lichtrinh(){
        $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get_service_lichtrinh");
            
            return json_decode($response->getBody()->getContents());
    }

    //schedule-delete/{id}
    public function DeleteDetailTripSchedule($idlichtrinh)
    {

        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://vntourweb/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
        $response = $client->request('GET',"schedule-delete/{$idlichtrinh}");

        $result = json_decode($response->getBody()->getContents());
        if ($result == "status:200") {
            return redirect()->back();
        }
        else
        {
            return "Lỗi không thêm được!";
        }
    }


    public function delete_Schedule_detail($idlichtrinh)
    {
        $client = new Client([
                    // Base URI is used with relative requests
                    'base_uri' => 'http://vntourweb/vntour_api/',
                    // You can set any number of default request options.
                    'timeout'  => 20.0,
                ]);
        $response = $client->request('GET',"delete-all-detail-schedule-web/{$idlichtrinh}");
        $result1 = json_decode($response->getBody()->getContents());

        if ($result1 == "status:200") {
            $response2 = $client->request('GET',"delete-schedule-web/{$idlichtrinh}");
            $result2 = json_decode($response2->getBody()->getContents());
            if ($result2 == "status:200") {
                return 1;
            }
            else{
                return -1;
            }
        }
        else
        {
            return -2;
        }
    }





    //service user
    public function get_add_service_user()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_add_place_user")->getBody();
         $data=json_decode($response);
        return view('VietNamTour.content.user.service.addservice',compact('data'));
    }
    public function post_add_service_user(addservice $request)
    {
        $file = $request->file('img1');
        $name = $file->getClientOriginalName();
        $destinationPath = 'public/thumbnails';
        $file->move($destinationPath,$name);
        $file = $request->file('img2');
        $name1 = $file->getClientOriginalName();
        $destinationPath = 'public/thumbnails';
        $file->move($destinationPath,$name1);
        $file = $request->file('img3');
        $name2 = $file->getClientOriginalName();
        $destinationPath = 'public/thumbnails';
        $file->move($destinationPath,$name2);
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);

        $phone = $request->sv_phone_number;
        if ($phone == null) { $phone = "Đang cập nhật";}
        $website = $request->sv_website;
        if ($website == null) { $website = "Đang cập nhật";}

        $response = $client->request('POST',"post_add_service_user/{$user_id}",[
            'form_params' => [
                'sv_description' => $request->sv_description,
                'sv_types'=>$request->sv_types,
                'city'=>$request->city,
                'district'=>$request->districtt,
                'ward'=>$request->ward,
                'diadiem'=>$request->diadiem,
                'sv_phone_number'=>$phone,
                'sv_website'=>$website,
                'time_begin'=>$request->time_begin,
                'time_end'=>$request->time_end,
                'sv_lowest_price'=>$request->sv_lowest_price,
                'sv_highest_price'=>$request->sv_highest_price,
                'mota'=>$request->mota,
                'img1'=>$name,
                'img2'=>$name1,
                'img3'=>$name2
            ]
        ])->getBody();
        if($response=='ok')
        {
            return redirect()->route('service_user')->with(['message'=>'Thêm thành công']);
        }
        else{
            return "Loi";
        }

    }

    public function get_service_user()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $user_id = Session::get('user_info')->id;
        $response = $client->request('GET',"get_service_user/{$user_id}")->getBody();
        $data=json_decode($response);
        // dd($data);
        $flag = 1;
        return view('VietNamTour.content.user.service.service_user',compact('data','flag'));
    }
    public function edit_service_user($id)
    {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_edit_service_user/{$id}/{$user_id}")->getBody();
         $data=json_decode($response);
        if($data == null){
            return view('VietNamTour.404');
        }
        else{
            foreach ($data as $value) {
                $data = $value;
            }
            $city = DB::select("SELECT * FROM c_city_district_ward_place_service WHERE id_service = '$id'");
            foreach ($city as $value) {
                $city = $value;
            }
            return view('VietNamTour.content.user.service.editservice',compact('data','city'));
        }
            
    }
    public function post_edit_service_user(editservice $request,$id)
    {
        $name='';
        $name1='';
        $name2='';
        if($request->img1 && $request->img1!='')
        {
            $file = $request->file('img1');
            $name = $file->getClientOriginalName();
            $destinationPath = 'public/thumbnails';
            $file->move($destinationPath,$name);
        }
        if($request->img2 && $request->img2!='')
        {
            $file = $request->file('img2');
            $name1 = $file->getClientOriginalName();
            $destinationPath = 'public/thumbnails';
            $file->move($destinationPath,$name1);
        }
        if($request->img3 && $request->img3!='')
        {
            $file = $request->file('img3');
            $name2 = $file->getClientOriginalName();
            $destinationPath = 'public/thumbnails';
            $file->move($destinationPath,$name2);
        }
     
   
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('POST',"post_edit_service_user/{$id}",[
            'form_params' => [
                'sv_description' => $request->sv_description,
                'sv_types'=>$request->sv_types,
                'city'=>$request->city,
                'district'=>$request->districtt,
                'ward'=>$request->ward,
                'diadiem'=>$request->diadiem,
                'sv_phone_number'=>$request->sv_phone_number,
                'sv_website'=>$request->sv_website,
                'time_begin'=>$request->time_begin,
                'time_end'=>$request->time_end,
                'sv_lowest_price'=>$request->sv_lowest_price,
                'sv_highest_price'=>$request->sv_highest_price,
                'mota'=>$request->mota,
                'img1'=>$name,
                'img2'=>$name1,
                'img3'=>$name2,
                'status' =>$request->status
            ]
        ])->getBody();
        if($response=='ok')
        {
            return redirect()->route('service_user')->with(['message'=>'Chỉnh sửa thành công!']);
        }
    }


    //place user
    public function getPlace_user()
    {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_place_user/{$user_id}")->getBody();
        $data= json_decode($response);
        // return $data;
        return view('VietNamTour.content.user.place.place_user',compact('data'));
    }

    public function getPlace_user_paginate($current_page,$limit)
    {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_place_user/{$user_id}")->getBody();
        $data= $this::paginate(json_decode($response),$current_page,$limit);
        return $data;
    }

    public function edit_place_user($id)
    {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_edit_place_user/{$user_id}/{$id}")->getBody();
         $data=json_decode($response);
         return view('VietNamTour.content.user.place.editplace',compact('data'));
    }

    public function post_edit_place_user(edituserplace $request,$id)
    {
       
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('POST',"post_edit_place_user/{$user_id}/{$id}",[
            'form_params' => [
                'place_name' => $request->place_name,
                'place_address'=>$request->place_address,
                'place_phone'=>$request->place_phone,
                'place_ward'=>$request->ward,
                'vido'=>$request->place_kinhdo,
                'kinhdo'=>$request->place_vido
            ]
        ])->getBody();
        if($response=="ok")
        {
            return redirect()->route('placeuser')->with(['message'=>'chỉnh sửa thành công!']);
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function addplace()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get_add_place_user")->getBody();
         $data=json_decode($response);
        
        return view('VietNamTour.content.user.place.addplace',compact('data'));
    }
    public function post_addplace(edituserplace $request)
     {
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('POST',"post_add_place_user/{$user_id}",[
            'form_params' => [
                'place_name' => $request->place_name,
                'place_address'=>$request->place_address,
                'place_phone'=>$request->place_phone,
                'place_ward'=>$request->ward,
                'vido'=>$request->vido,
                'kinhdo'=>$request->kinhdo
            ]
        ])->getBody();
        if($response=="ok")
        {
            return redirect()->route('placeuser')->with(['message'=>'Thêm thành công!']);
        }
        else
        {
            return redirect()->back();
        }
        // echo "<pre>";
        // print_r(json_decode($response));
    }

    public function changePassword(Request $request){
        $user_id = Session::get('user_info')->id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('POST',"change-pass/{$user_id}",[
            'form_params' => [
                'password_old' => $request->password_old,
                'password_new'=>$request->password_new
            ]
        ])->getBody();
        // return $response->getContents();
        if($response->getContents() == 1)
        {
            return redirect()->back()->with(['message'=>'Cập nhật mật khẩu thành công!']);
        }
        elseif($response->getContents() == 0)
        {
            return redirect()->back()->with(['message'=>'Mật khẩu cũ không trùng khớp!']);
        }
        else{
            return redirect()->back()->with(['message'=>'Lỗi không cập nhật được mật khẩu!']);
        }
    }


    public function save_user_search($id_service){
        // save-user-search/{idserivce}&{iduser}
        $user_id = Session::get('user_info')->id;
        // return $id_service.'-'.$user_id;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vntourweb/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"save-user-search/{$id_service}&{$user_id}")->getBody();
        if($response->getContents() == "status:200")
        {
            return 1;
        }
        else
        {
            return -1;
        }
    }


    public function list_place(){
        return view('VietNamTour.content.user.place.list_place');
    }


    public function load_place_ward($idward){
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
        $response = $client->request('GET',"load_place_ward/{$idward}");
            
        return json_decode($response->getBody()->getContents());
    }




    //paginate
    public function paginate($data, $page,$limit)
    {
        // data du lieu de phan trang
        // page trang hien tai
        // limit hien thi so ket qua moi trang
        // bat dau tu phan tu nao

        // dd($data);
        if ($data == null) {
            $result_paginate['data'] = null;
            $result_paginate['total_page'] = 0;
            $result_paginate['current_page'] = 0;
            $result_paginate['limit'] = $limit;
        }
        else{
            $current_page  = $page;
            $total_records = count($data); // tong so item;

            $total_page    = ceil($total_records/$limit);

            if ($current_page > $total_page) { $current_page = $total_page; }
            else if ($current_page < 1) { $current_page = 1; }

            $start = ($current_page - 1) * $limit;
            $data == null ? $result = null : $result = $result = array_slice($data,$start,$limit);// lay danh sach say khi phan trang

            $result_paginate['data'] = $result;
            $result_paginate['total_page'] = $total_page;
            $result_paginate['current_page'] = $current_page;
            $result_paginate['limit'] = $limit;
        }
            
        return $result_paginate;
    }

    public function get_service_user_active($type){
        $user_id = Session::get('user_info')->id;
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
        if ($type == "active") { $flag = 2; }else{ $flag = 3; }

        $response = $client->request('GET',"get_service_user_active/{$user_id}&{$type}");
        $data=json_decode($response->getBody()->getContents());
        // dd($data);
        return view('VietNamTour.content.user.service.service_user',compact('data','flag'));
    }

    public function Top_service_view(){
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"top-service-view");
        return json_decode($response->getBody()->getContents());
    }

    public function Top_service_rating_like($type){
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"top-service-rating-like/{$type}");
        return json_decode($response->getBody()->getContents());
    }

    public function get_service_user_max_view(){
        $user_id = Session::get('user_info')->id;
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"get-service-user-max-view/{$user_id}");
        return json_decode($response->getBody()->getContents());
    }

    public function get_service_user_max_rating_like($type){
        $user_id = Session::get('user_info')->id;
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"get-service-user-max-ating-like/{$type}&{$user_id}");
        return json_decode($response->getBody()->getContents());
    }


    public function get_lichtrinh_type($user_id,$type){
        //getListTripSchedule_web_type/{userid}&type={type}
        // $user_id = Session::get('user_info')->id;
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"getListTripSchedule_web_type/{$user_id}&type={$type}");
        return json_decode($response->getBody()->getContents());
    }

    public function searchServices_All_lichtrinh($keyword){
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://vntourweb/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);

        $response = $client->request('GET',"searchServices_All_lichtrinh/{$keyword}");
        return json_decode($response->getBody()->getContents());
    }

}
