@extends('CMS.components.index')
@section('content')
<script type="text/javascript">

    /* Datatables export */

    $(document).ready(function() {
        var table = $('#datatable-tabletools').DataTable();
        var tt = new $.fn.dataTable.TableTools( table );

        $( tt.fnContainer() ).insertBefore('#datatable-tabletools_wrapper div.dataTables_filter');

        $('.DTTT_container').addClass('btn-group');
        $('.DTTT_container a').addClass('btn btn-default btn-md');

        $('.dataTables_filter input').attr("placeholder", "Search...");

    } );

    /* Datatables reorder */

    $(document).ready(function() {
        $('#datatable-reorder').DataTable( {
            dom: 'Rlfrtip'
        });

        $('#datatable-reorder_length').hide();
        $('#datatable-reorder_filter').hide();

    });

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });

</script>

<div id="page-title">
    <h2>Thêm địa điểm</h2>
    
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row" style="padding-top: 25px;">
        <div class="content-box bg-white post-box col-md-12 ">
            <form id="frm_add_task" name="frm_add_task" action="" method="post"  enctype="multipart/form-data"  >
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_name">Tên địa điểm: </label>
                        <input type="text" id="task_name" required  class="form-control" name="task_name" >
                    </div>
                     <div class="col-md-6">
                        <label for="task_description">Địa chỉ: </label>
                        <input type="text" id="task_name" required  class="form-control" name="task_name" >
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_description" >Số điện thoại: </label>
                        <input type="tel" id="task_end_date" required class="form-control" name="task_end_date" > 
                    </div>
                    <div class="col-md-6">
                        <label for="task_description" >Tỉnh / thành phố: </label>                      
                        <select class="form-control" name="assigner_user_id" id="city">
                            @foreach($data1 as $item)
                                <option value="{{$item->id}}">{{$item->province_city_name}}</option>
                            @endforeach()
                        </select>
                    </div>
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_start_date">Quận / huyện: </label>
                        <select class="form-control" name="assigner_user_id">
                            @foreach($data2 as $item)
                                <option value="{{$item->id}}">{{$item->district_name}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="task_end_date">Phường / xã: </label>
                        <select class="form-control" name="assigner_user_id">
                            @foreach($data3 as $item)
                                <option lat="{{$item->latitude}}" long="{{$item->longtitude}}" value="{{$item->id}}">{{$item->ward_name}}</option>
                                
                            @endforeach()
                        </select>

                     </div>
                </div> 
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                         <label for="content" >Mô tả: </label>
                         <input type="text" id="task_end_date" required class="form-control" name="task_end_date" > 
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6">
                         <label for="content" >Tọa độ: </label>
                         <input type="text" id="task_end_date" required class="form-control" name="task_end_date" placeholder="Có thể chọn ở bản đồ"> 
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <label for="content" >Nội dung chi tiết: </label>
                    <textarea style="height: 500px" id="content" ></textarea>
                    <input type="hidden" name="content" id="content2">
                    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                    <script>
                        var editor = CKEDITOR.replace( 'content' );

                        // The "change" event is fired whenever a change is made in the editor.
                        editor.on('change', function( evt ) {
                            
                            var content = evt.editor.getData();
                            $("#content2").val(content);
                        });
                    </script>
                </div> 
                
                <div class="clearfix"></div>
                <div class="col-md-12" style="padding-bottom: 15px">
                    <div id="map" style="height:400px;"></div>
                </div>
                <input  class="btn btn-success" style=";margin-bottom: 20px; margin-left: 90%" type="submit" value="Xong">
            </form>
        </div>
    </div>
</div>



<script>

function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter=new google.maps.LatLng(115,10);
  var mapOptions = {center: myCenter, zoom: 6};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });
}

function placeMarker(map, location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  alert(location.lat());
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQnUfJIUr14br8WuniuuUMGkq0zDFoAc4&callback=myMap"></script>
@endsection