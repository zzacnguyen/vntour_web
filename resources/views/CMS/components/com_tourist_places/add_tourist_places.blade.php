@extends('CMS.components.index')
@section('content')


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
                        <select class="form-control" name="city" id="city">
                            @foreach($data1 as $item)
                                <option value="{{$item->id}}">{{$item->province_city_name}}</option>
                            @endforeach()
                        </select>
                    </div>
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-6">
                        <label for="task_start_date">Quận / huyện: </label>
                            <select class="form-control" id="district" name="districtt">
                           
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="task_end_date">Phường / xã: </label>
                        <select class="form-control" id="ward" name="ward">
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
                         <input type="text" id="lat_and_long" required class="form-control" name="lat_and_long" placeholder="Có thể chọn ở bản đồ"> 
                         <input type="hidden" name="kinhdo" id="kinhdo" value="">
                         <input type="hidden" name="vido" id="vido" value="">
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
                    <label for="map">Bản đồ</label>
                    <div id="map" style="height:400px;"></div>
                </div>
                <input  class="btn btn-success" style=";margin-bottom: 20px; margin-left: 90%" type="submit" value="Xong">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" >
    
$(document).ready(function () {
    
    load_district();
    load_ward();
    
})


//load quan theo tinh thanh pho
function load_district() {
    $('select[name=city]').change(function () {
        var path = 'loadDistrict/' + $(this).val();
        console.log(path);
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
            })
            $('#district').html(lam);
        })
    })
}

// load ward
function load_ward() {
    $('select[name=districtt]').change(function () {
        var path = 'loadWard/' + $(this).val();
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option data-longtitude="' + data.longtitude + '" data-latitude="' + data.latitude + '" value="' + data.id + '">' + data.ward_name +'</option>';
            })
            $('#ward').html(lam);
        })
    })
}

function Load_toado() {
     $('select[name=ward]').change(function () {
        var path = 'loadWard/' + $(this).val();
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
            })
            $('#ward').html(lam);
        })
    })
}

</script>

<script>
    function myMap(argument) {
         var map;
         var lat;
         var long;

        function init_map() {
            var opts = { 'center': new google.maps.LatLng(35.567980458012094,51.4599609375), 'zoom': 5, 'mapTypeId': google.maps.MapTypeId.ROADMAP }
                map = new google.maps.Map(document.getElementById('map'), opts);

            
            google.maps.event.addListener(map, 'click', function (e) {
                // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("kinhdo").value = e.latLng.lat() ;
                document.getElementById("vido").value = e.latLng.lng() ;
                var sum =  e.latLng.lat() + '____'+  e.latLng.lng() ;
                document.getElementById("lat_and_long").value = sum;

            });
            

        } 
        google.maps.event.addDomListener(window, 'load', init_map);
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQnUfJIUr14br8WuniuuUMGkq0zDFoAc4&callback=myMap"></script>
@endsection 