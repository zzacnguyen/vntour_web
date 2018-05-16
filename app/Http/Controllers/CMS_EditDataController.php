<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pointModel;
use App\typesModel;
use App\Http\Requests\AddPointRequest;
use App\Http\Requests\AddTypeEventRequest;
class CMS_EditDataController extends Controller
{
    public function _POST_EDIT_POINT(AddPointRequest $request, $id)
    {
    	$point = pointModel::findOrFail($id);
        $point->point_title =  $request->input('point_title');
        $point->point_description =  $request->input('point_description');
        $point->point_rate =  $request->input('point_rate');
        $point->point_date =  $request->input('point_date');
        $title = $point->point_title;
        if ($request->get('action') == 'save_close') {
            $point->save();
            return redirect()->route('_GET_LIST_ALL_POINT')->with('message', "Hoàn tất, Đã chỉnh sửa ".$title."!");
        } 
        else
        {
            return json_encode("status:500");
        }
    }
    public function EDIT_TYPES_EVENT(AddTypeEventRequest $request, $id)
    {
        $type =  typesModel::findOrFail($id);
        $type->type_name = $request->input('name');
        $type->type_status = $request->input('status');
        $type_name  = $request->input('name');
        if ($request->get('action') == 'save_close') {
            $type->save();
            return redirect()->route('_GET_EVENT_TYPES')->with('message', "Hoàn tất, Đã sửa loại hình ".$type_name  ."!");
        } 
        else
        {
            return json_encode("status:500");
        }
    }
}
