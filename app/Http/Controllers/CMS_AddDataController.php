<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CheckTaskRequest;
use App\Http\Requests\CheckAddTouristPlacesRequest;
use App\Http\Requests\CheckAddServicesRequest;
use App\taskModel;
use DB;
use App\touristPlacesModel;
use App\servicesModel;
use App\imagesModel;
use App\eatingModel;
use App\sightseeingModel;
use App\transportModel;
use App\hotelsModel;
use Carbon\Carbon;
use App\entertainmentsModel;
class CMS_AddDataController extends Controller
{
    public function _POST_TASK(CheckTaskRequest $request)
    {
        $task = new taskModel();
        $task->task_title=$request->input('task_name');
        $task->task_description=$request->input('task_description');
        $task->content=$request->input('content');
        $task->date_start=$request->input('task_start_date');
        $task->date_end=$request->input('task_end_date');
        $task->status=1;
        $task->user_id =1;
        $task->assigner_user_id =$request->input('assigner_user_id');
        if($task->save())
        {
            return redirect('/lvtn-dashboard')->with('message', "Hoàn tất, Nhiệm vụ đã được gửi đi!");
        }
        else
        {
            return view('CMS.components.error');
        }
    }

    public function _POST_SERVICES_PLACES(CheckAddServicesRequest $request)
    {
        // $services = new servicesModel();
        // $services->services_name
        // $services->sv_open
        // $services->sv_close
        // $services->sv_lowest_price
        // $services->sv_highest_price
        // $services->sv_phone_number
        // $services->website
        // $services->description
        // $services->content


        
        // banner
        // details1
        // details2

    }

    public function _POST_TOURIST_PLACES(CheckAddTouristPlacesRequest $request)
    {
        $place = new touristPlacesModel();
        $place->pl_name=$request->input('place_name');
        $place->pl_content=$request->input('content');
        $place->pl_details=$request->input('description');
        $place->pl_address=$request->input('address');
        $place->pl_phone_number=$request->input('phonenumber');
        $place->pl_latitude=$request->input('vido');
        $place->pl_longitude=$request->input('kinhdo');
        $place->id_ward=$request->input('ward');
        $place->pl_status=0; 
        $place->user_partner_id =1;
        if ($request->get('action') == 'save_close') {
            $place->save();
            return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một địa điểm!");
        } 
        else if ($request->get('action') == 'save_and_add_service') {
            $place->save();
            if (view()->exists('view.CMS.components.com_services.add_services'))
            {
                return view('CMS.components.error');
            }
            else    {                
                return redirect()->route('_GETVIEW_ADD_SERVICES');
            }
        }
        else
        {
            return view('CMS.components.error');
        }
    }
    // public function _POST_ADD_SERVICES(CheckAddServicesRequest $request)
    // {
    //     $services = new servicesModel();
    //     $place->sv_description=$request->input('description');
    //     $place->sv_content=$request->input('content');
    //     $place->sv_open=$request->input('description');
    //     $place->sv_close=$request->input('address');
    //     $place->pl_phone_number=$request->input('phonenumber');
    //     $place->pl_latitude=$request->input('vido');
    //     $place->pl_longitude=$request->input('kinhdo');
    //     $place->id_ward=$request->input('ward');
    //     $place->pl_status=0; 
    //     $place->user_partner_id =1;
    //     if ($request->get('action') == 'save_close') {
    //         $place->save();
    //         return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một địa điểm!");
    //     } 
    //     else if ($request->get('action') == 'save_and_add_service') {
    //         $place->save();
    //         if (view()->exists('view.CMS.components.com_services.add_services'))
    //         {
    //             return view('CMS.components.error');
    //         }
    //         else    {                
    //             return redirect()->route('_GETVIEW_ADD_SERVICES');
    //         }
    //     }
    //     else
    //     {
    //         return view('CMS.components.error');
    //     }
    // }
    public function _POST_ADD_SERVICES(CheckAddServicesRequest $request)
    {

        $user_id  = 1;
        $services_name = $request->input('services_name');
        $eat_name = $services_name;
        $hotel_name = $services_name;
        $transport_name =    $services_name;
        $sightseeing_name = $services_name;
        $entertainments_name =  $services_name;
        $id_place = $request->input('id_diadiem');
        $name_places = $request->input('ten_diadiem');
        $vnt_services                 = new servicesModel;
        $vnt_services->sv_description   = $request->input('description');
        $vnt_services->sv_open    = $request->input('sv_open');
        $vnt_services->sv_close  = $request->input('sv_close');
        $vnt_services->sv_highest_price  = $request->input('sv_highest_price');
        $vnt_services->sv_lowest_price = $request->input('sv_lowest_price');
        $vnt_services->sv_phone_number   = $request->input('sv_phone_number');
        $vnt_services->sv_status   = 0;
        $vnt_services->sv_types   = $request->input('type_services');
        $vnt_services->tourist_places_id   = $id_place;
        $vnt_services->sv_counter_view=0;
        $vnt_services->sv_counter_point=0;
        $vnt_services->user_tour_guide_id=$user_id;
        $vnt_services->sv_website=$request->input('website');
        $vnt_services->sv_content=$request->input('content');
        $vnt_services->save();
        $lastServices = DB::table('vnt_services')->orderBy('id', 'desc')->first();
        $convert = (array)$lastServices;
        $id_service =  $convert['id'];
        $id_type =  $convert['sv_types'];
            if($id_type == 1)
            {
                $vnt_eating = new eatingModel;
                $vnt_eating->eat_name =  $eat_name;
                $vnt_eating->eat_status =  1;
                $vnt_eating->service_id =  $id_service;
                if ($request->get('action') == 'save_close') {
                    $vnt_eating->save();
                    return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một dịch vụ!");
                } 
                else if($request->get('action') == 'save_and_add_service')
                {
                    $vnt_eating->save();
                    $message = 'Hoàn tất, Dịch vụ ăn uống ' .$eat_name.' tại '. $name_places  . '  đã được thêm!';
                    return redirect('/lvtn-list-address')->with('message', $message);
                }
                else
                {
                    return json_encode("status:500");
                }

            }
            else if($id_type == 2)
            {
                $vnt_hotels = new hotelsModel;
                $vnt_hotels->hotel_name =  $hotel_name;
                $vnt_hotels->hotel_website =  $request->input('hotel_website');
                $vnt_hotels->hotel_number_star =  $request->input('hotel_number_star');
                $vnt_hotels->hotel_status =  1;
                $vnt_hotels->service_id =  $id_service;
                if ($request->get('action') == 'save_close') {
                    $vnt_hotels->save();
                    return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một dịch vụ!");
                } 
                else if($request->get('action') == 'save_and_add_service')
                {
                    $vnt_hotels->save();
                    $message = 'Hoàn tất, Dịch vụ khách sạn - nơi ở ' .$hotel_name.' tại '. $name_places  . '  đã được thêm!';
                    return redirect('/lvtn-list-address')->with('message', $message);
                }
                else
                {
                    return json_encode("status:500");
                }
            }
            else if($id_type == 3)
            {
                $vnt_transport = new transportModel;
                $vnt_transport->transport_name =  $transport_name;
                $vnt_transport->transport_status =  1;
                $vnt_transport->service_id =  $id_service;
                if ($request->get('action') == 'save_close') {
                    $vnt_transport->save();
                    return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một dịch vụ!");
                } 
                else if($request->get('action') == 'save_and_add_service')
                {
                    $vnt_transport->save();
                    $message = 'Hoàn tất, Dịch vụ ' .$transport_name.' tại di chuyển - vận chuyển '. $name_places  . '  đã được thêm!';
                    return redirect('/lvtn-list-address')->with('message', $message);
                }
                else
                {
                    return json_encode("status:500");
                }
            }
            else if($id_type == 4)
            {
                $vnt_sightseeing = new sightseeingModel;
                $vnt_sightseeing->sightseeing_name =  $sightseeing_name;
                $vnt_sightseeing->sightseeing_status     =  1;
                $vnt_sightseeing->service_id =  $id_service;
                if ($request->get('action') == 'save_close') {
                    $vnt_sightseeing->save();
                    return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một dịch vụ!");
                } 
                else if($request->get('action') == 'save_and_add_service')
                {
                    $vnt_sightseeing->save();
                    $message = 'Hoàn tất, Dịch vụ tham quan - mua sắm ' .$sightseeing_name.' tại '. $name_places  . '  đã được thêm!';
                    return redirect('/lvtn-list-address')->with('message', $message);
                }
                else
                {
                    return json_encode("status:500");
                }
            }
            else if($id_type == 5)
            {
                $vnt_entertainments = new entertainmentsModel;
                $vnt_entertainments->entertainments_name = $entertainments_name;
                $vnt_entertainments->entertainments_status=1;
                $vnt_entertainments->service_id =  $id_service;
                if ($request->get('action') == 'save_close') {
                    $vnt_entertainments->save();
                    return redirect('/lvtn-list-address')->with('message', "Hoàn tất, Đã thêm một dịch vụ!");
                } 
                else if($request->get('action') == 'save_and_add_service')
                {
                    $vnt_entertainments->save();
                    $message = 'Hoàn tất, Dịch vụ vui chơi - giải trí ' .$entertainments_name.' tại '. $name_places  . '  đã được thêm!';
                    return redirect('/lvtn-list-address')->with('message', $message);
                }
                else
                {
                    return json_encode("status:500");
                }
            }
  
    }
}
