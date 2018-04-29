<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taskModel;
use App\touristPlacesModel;
class CMS_AddDataController extends Controller
{
    public function _POST_TASK(Request $request)
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
            return redirect('/lvtn-dashboard')->with('message', "Thanks, message has been sent");
        }
        else
        {
            return view('CMS.components.error');
        }
    }



    public function _POST_TOURIST_PLACES(Request $request)
    {
        $place = new touristPlacesModel();
        $place->pl_name=$request->input('name');
        $place->pl_details=$request->input('description');
        
        $place->pl_content=$request->input('content');
        $place->pl_address=$request->input('address');
        $place->pl_phone_number=$request->input('phone');
        $place->pl_latitude=$request->input('vido');
        $place->pl_longitude=$request->input('kinhdo');
        $place->id_ward=$request->input('ward');
        $place->pl_status=1;
        $place->user_partner_id =1;
        $place->save();
        return redirect('/lvtn-dashboard');
       
    }
}
