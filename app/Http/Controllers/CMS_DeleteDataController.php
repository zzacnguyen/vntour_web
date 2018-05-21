<?php

namespace App\Http\Controllers;
use App\taskModel;
use Illuminate\Http\Request;
use App\pointModel;
use App\touristPlacesModel;
class CMS_DeleteDataController extends Controller
{
  
    public function _DELETE_TASK($id)
    {
        $task =  taskModel::findOrFail($id);
        $task->status = 0;
        $task->save();
        
        return redirect('/lvtn-dashboard')->with('message', "Cảm ơn, Thao tác của bạn được thực hiện thành công!");
    }

    public function _DETELTE_TOURIST_PLACES($id)
    {
        $places =  touristPlacesModel::findOrFail($id);
        $places->delete();
        return redirect('/lvtn-dashboard')->with('message', "Cảm ơn, Địa điểm bạn vừa chọn đã bị xoá");
    }
}
