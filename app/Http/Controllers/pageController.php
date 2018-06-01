<?php

namespace App\Http\Controllers;
use usersModel;
use Session;
// use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\servicesModel;
use App\Http\Controllers\SearchController;
use App\touristPlacesModel;
use App\provincecityModel;
use Illuminate\Database\Eloquent\Colection;
use Illuminate\Support\Facades\Auth;
use Validator;
use GuzzleHttp\Client;

class pageController extends Controller
{
    // $path = "http://localhost/vntour_api/";
    public function layindex()
    {
        return view('VietNamTour.content.index');
    }

    public function getindex()
    {   
        $placecount       = $this::count_city_service_all_image();

        $services_eat     = $this::gettypeService(1,8);
        $services_hotel   = $this::gettypeService(2,6);
        $services_tran    = $this::gettypeService(3,8);
        // dd($services_seees_tran);
        $services_see     = $this::gettypeService(4,8);
        $services_enter   = $this::gettypeService(5,8);

        $checkLogin = $this::check_Login();
        
        // $litSearch = $this::get_user_search();
        // return $litSearch;
    	return view('VietNamTour.content.index',compact('placecount','services_hotel','services_eat','services_enter','services_see','services_tran','checkLogin'));
    }

    public function getgioithieu()
    {
        return view('VietNamTour.content.gioithieu');
    }

    public function getlogin()
    {
        $id = null;
        $type = null;
    	return view('VietNamTour.login',compact('$id','type'));
    }

    public function getlogin_Detail($id, $type)
    {
        return view('VietNamTour.login',compact('id','type'));
    }

    public function getregister()
    {
        return view('VietNamTour.register');
    }

    public function getregisterSuccess()
    {
        return view('VietNamTour.registerSuccess');
    }

    public function getuser()
    {
        return view('VietNamTour.user');
    }

    public function getdetail($idservices,$type)
    {
        $placecount       = $this::count_place_display();
        $detailServices = $this::getServiceType($idservices,$type);
        $place = $this::findplace_service($idservices);
        
        $dichvulancan = $this::searchServicesVicinity($place->pl_latitude,$place->pl_longitude,5,5000);
        // print_r($dichvulancan)
        $lam = var_dump($dichvulancan);
        // dd($lam);
        return view('VietNamTour.content.detail',compact('placecount','detailServices','dichvulancan'));
    }

    public function getaddplace()
    {
        return view('VietNamTour.content.place');
    }

    public function loadPalce()
    {
        return view('VietNamTour.content.place');
    }

    public function getaddservice()
    {
        return view('VietNamTour.addservice');
    }

    // funtion

    


    //=============================== NEW ===========================================



    public function numberToK($num)
    {
        if ($num >= 1000) {
            $n = $num / 1000; // phan nguyen
            $d = $num % 1000; // phan du
            if ($d > 100) {
                $c = $d/100;
                return $n.$c."K";
            }
            else{
                return $n."K";
            }
        }
        else{
            return $num;
        }
    }



    //================================= LOGIN-LOGOUT =====================================

    public function LoginSession(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        // $response = $client->request('GET',"loginpost/user={$username}&pass={$password}");

        $response = $client->request('POST', 'loginpost', [
        
                    
                    'form_params' => [
                        'username' => $username,
                        'password' => $password
                    ]
                ]);


        $lam = json_decode($response->getBody()->getContents());
        // dd($lam);
        if ($lam != null) {
            Session()->put('login',true);  
            Session()->put('user_info',$lam);
            // dd(Session::get('user_info')) ;
            return redirect('/');
        }
        else{
            return redirect()->back()->with(['erro'=>'Tên tài khoản hoặc mật khẩu không đúng','userold'=>$username]);
        }
            
    }

    public function LoginSession_Detail(Request $request,$id,$type)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"loginpost/user={$username}&pass={$password}");
        $lam = json_decode($response->getBody()->getContents());
        // dd($lam);
        if ($lam != null) {
            Session()->put('login',true);  
            Session()->put('user_info',$lam);
            // dd(Session::get('user_info')) ;
            return redirect("detail/id=$id&type=$type");
        }
        else{
            return redirect()->back()->with(['erro'=>'Tên tài khoản hoặc mật khẩu không đúng','userold'=>$username]);
        }
            
    }

    public function LogoutSession()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"logoutW");
        Session()->flush();
        return redirect('/');
    }

    // api
    public function gettypeService($type, $take)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"get-services-take/type={$type}&take={$take}");

        return json_decode($response->getBody()->getContents());
    }

    public function check_Login()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"checklogin");

        if (Session::has('login') && Session::get('login') == true) {
            
        }
        else{
            return null;
        }
        return json_decode($response->getBody()->getContents());
    }

    public function count_city_service_all_image()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"count-city-service-all-image");

        return json_decode($response->getBody()->getContents());
    }
    
//================================= SEARCH =============================
    // page Search
    public function getpageSearch(Request $request)
    {
        $keyword = $request->keyword;
        $id_city = $request->city;
        $id_type = $request->type;

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $flag = 0;
        $flag_con = 0;
        $result_all = array();

        if ($id_city == "all" && $id_type == "all") {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            $count_type = array();

            if (isset($result) && $result != null) {
            
                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                $flag = 1;
                $flag_con = 0;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            // return $result_all;
        }
        else if($id_city != "all" && $id_type == "all"){
            //search-city-alltype/{idcity}&keyword={key}
            $response = $client->request('GET',"search-city-alltype/{$id_city}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if (isset($result) && $result != null) {
            
                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                
                $flag_con = (int)$id_type;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            $flag = 1;
            // return $result_all;
            
        }
        else if ($id_city == "all" && $id_type != "all") {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            $count_type = array();
            $flag = 1;
            if (isset($result) && $result != null) {

                if ($result->eat != null) {
                    $result_all = array_merge($result_all,$result->eat);
                    $count_type['eat'] = count($result->eat);
                }
                else{$count_type['eat'] = 0;}

                if ($result->hotel != null) {
                    $result_all = array_merge($result_all,$result->hotel);
                    $count_type['hotel'] = count($result->hotel);
                }
                else{$count_type['hotel'] = 0;}

                if ($result->tran != null) {
                    $result_all = array_merge($result_all,$result->tran);
                    $count_type['tran'] = count($result->tran);
                }
                else{$count_type['tran'] = 0;}

                if ($result->see != null) {
                    $result_all = array_merge($result_all,$result->see);
                    $count_type['see'] = count($result->see);
                }
                else{$count_type['see'] = 0;}


                if ($result->enter != null) {
                    $result_all = array_merge($result_all,$result->enter);
                    $count_type['enter'] = count($result->enter);
                }
                else{ $count_type['enter'] = 0; }

                // luu gi tri theo loai
                if ($id_type == 1) {
                    $result_all_type = $result->eat;
                }
                if ($id_type == 2) {
                    $result_all_type = $result->hotel;
                }
                if ($id_type == 3) {
                    $result_all_type = $result->tran;
                }
                if ($id_type == 4) {
                    $result_all_type = $result->see;
                }
                if ($id_type == 5) {
                    $result_all_type = $result->enter;
                }
                
                $flag_con = (int)$id_type;
                if (!isset($result_all_type)) {
                    $result_all_type = null;
                }
            }
            // return $flag;
        }
        else{
            $response = $client->request('GET',"search-city-type/{$id_city}&type={$id_type}&keyword={$keyword}");
            $result_all = json_decode($response->getBody()->getContents());
            // return $result_all;
            if ($result_all != null) {
                foreach ($result_all as $value) {
                    $mangghe[] = array(
                        'name' => $value->name,
                        'image'             => $value->image,
                        'name_city'         => $value->name_city,
                        'like'              => $value->like,
                        'view'              => $value->view,
                        'point'             => $value->point,
                        'rating'            => $value->rating,
                        'sv_type'           => $value->sv_type    
                    );
                }
            }
            else{ $mangghe = null; }    
                
            $flag = 3;
            // return $mangghe;
        }

        // return $result_all;
        if ($result_all == null) {
            $count = 0;
        }
        else{
            $count = count($result_all);
        }
            
        // return $flag;
        // var_dump($flag_con);
        // return $flag_con;

        // load danh sach dich vu duoc tim kiem nhieu nhat
        $top_search = $this::get_service_max_search();
        // return $top_search;
        return view('VietNamtour.content.pageSearch',compact('result_all','keyword','id_city','id_type','count','count_type','flag','flag_con','mangghe','result_all_type','top_search'));
    }

    public function conSearch($id_city,$id_type,$keyword,$select_type)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);


        if ($id_city == "all" && $id_type == "all") 
        {
            $response = $client->request('GET',"search-all/keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else if ($id_city != "all" && $id_type == "all") 
        {
            $response = $client->request('GET',"search-city-alltype/{$id_city}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else if ($id_city == "all" && $id_type != "all")
        {
            $response = $client->request('GET',"search-allcity-type/type={$id_type}&keyword={$keyword}");
            $result = json_decode($response->getBody()->getContents());
            return $result;
            if ($select_type == 1) {
                $result_all_type = $result->eat;
            }
            if ($select_type == 2) {
                $result_all_type = $result->hotel;
            }
            if ($select_type == 3) {
                $result_all_type = $result->tran;
            }
            if ($select_type == 4) {
                $result_all_type = $result->see;
            }
            if ($select_type == 5) {
                $result_all_type = $result->enter;
            }
            
            return $result_all_type;
        }
        else
        {
            return null;
        }
    }




    // load user_search
    public function get_user_search()
    {
        
        if (!Session::has('user_info')) {
            return null;
        }
        else
        {
            $user_id = Session::get('user_info')->id;
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://localhost/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get-list-user-search/{$user_id}");
            
            return json_decode($response->getBody()->getContents());
        }
    }

    // load danh sach dich vu duoc tim kiem nhieu nhat
    public function get_service_max_search(){
        $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://localhost/vntour_api/',
                // You can set any number of default request options.
                'timeout'  => 20.0,
            ]);
            $response = $client->request('GET',"get-top-search");
            
        return json_decode($response->getBody()->getContents());
    }

    //search page vicinity
    public function get_search_vicinity(Request $request){
        $lat = $request->txtlat;
        $lon = $request->txtlon;
        $radius = $request->txtradius;
        // return $request->all();
        $top_search = $this::get_service_max_search();
        $result = $this::search_vicinity($lat,$lon,$radius);

        //thong ke ket qua
        $thongke = $this::search_vicinity_type($lat,$lon,$radius);
        $result_all = array();
        if ($thongke->eat != null) {
            $result_all = array_merge($result_all,$thongke->eat);
            $count_type['eat'] = count($thongke->eat);
        }
        else{$count_type['eat'] = 0;}

        if ($thongke->hotel != null) {
            $result_all = array_merge($result_all,$thongke->hotel);
            $count_type['hotel'] = count($thongke->hotel);
        }
        else{$count_type['hotel'] = 0;}

        if ($thongke->tran != null) {
            $result_all = array_merge($result_all,$thongke->tran);
            $count_type['tran'] = count($thongke->tran);
        }
        else{$count_type['tran'] = 0;}

        if ($thongke->see != null) {
            $result_all = array_merge($result_all,$thongke->see);
            $count_type['see'] = count($thongke->see);
        }
        else{$count_type['see'] = 0;}


        if ($thongke->enter != null) {
            $result_all = array_merge($result_all,$thongke->enter);
            $count_type['enter'] = count($thongke->enter);
        }
        else{ $count_type['enter'] = 0; }

        // dd($result_all);
        if ($result_all != null) {
            $count_result = count($result_all);
        }else{$count_result = 0;}
        // return $result;
        return view('VietNamTour.content.pageSearchVicinity',compact('top_search','result','radius','lat','lon','result_all','count_result','count_type'));
    }

    // search vicinity
    public function search_vicinity($lat,$lon,$radius)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"search-near/lat={$lat}&lon={$lon}&radius={$radius}")->getBody();
        return json_decode($response->getContents());
    }

    public function search_vicinity_type($lat,$lon,$radius){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"timquanhday-type/lat={$lat}&lon={$lon}&radius={$radius}")->getBody();
        return json_decode($response->getContents());
    }

    public function get_vicinity_select_type($lat,$lon,$radius,$type,$page){
        $thongke = $this::search_vicinity_type($lat,$lon,$radius);
        // dd($thongke);
        $result = array();
        switch ($type) {
            case 1:
                return $this::paginate($thongke->eat,$page,9);
                break;
            case 2:
                return $this::paginate($thongke->hotel,$page,9);
                break;
            case 3:
                return $this::paginate($thongke->tran,$page,9);
                break;
            case 4:
                return $this::paginate($thongke->see,$page,9);
                break;
            case 5:
                return $this::paginate($thongke->enter,$page,9);
                break;

            // return $result;
        }
    }


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
}
