@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/addplace.css">

<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
  }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
</style>


<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content" style="margin-top: 80px;">
				<h4 style="font-size: 25px; font-weight: bold;" class="text-center">Chỉnh sửa địa điểm</h4>
				<h5 style="color: red;">Thông tin cơ bản</h5>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="" method="post">
					<div class="input-text col-md-12">
						<label class="col-md-2">Tên địa điểm</label>
            <input name="place_name" type="text" value="{{$data->info[0]->pl_name}} ">
            <p class="text-danger">{{$errors->first('place_name')}}</p>
					</div>
					<div class="input-text col-md-12">
						<label class="col-md-2">Điện thoại</label>
            <input name="place_phone" type="number" value="{{$data->info[0]->pl_phone_number=='Đang cập nhật'? "":$data->info[0]->pl_phone_number}}">
            <p class="text-danger">{{$errors->first('place_phone')}}</p>
					</div>
          <?php
          // echo "<pre>";
          // print_r($data->address); ?>
					<div class="input-text col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2">Tỉnh thành</label>
						<select class="js-example-basic-single col-md-4" name="city">
              <option value="0">Chọn tỉnh thành phố</option>
							 @foreach($data->city as $c)
							  <option value="{{$c->id}}" @if($c->id==$data->address[0]->id_city) selected @endif>{{$c->province_city_name}}</option>
							  @endforeach 
						</select>
						<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Quận huyện</label>
						<select class="js-example-basic-single col-md-3" name="districtt" id="district">
              <option value="0">Chọn quận huyện</option>
              @foreach($data->district as $c)
                <option value="{{$c->id}}" @if($c->id==$data->address[0]->id_district) selected @endif >{{$c->district_name}}</option>
              @endforeach
						</select>
					</div>

					<div class="col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;">Khu vực</label>
						<select class="js-example-basic-single col-md-9" name="ward" id="ward" style="padding: 0">
                
						</select>
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2">Địa chỉ</label>
            <input name="place_address" type="text" value="{{$data->info[0]->pl_address}}">
            <p class="text-danger">{{$errors->first('place_address')}}</p>
					</div>
					<div class="input-text col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2">Vị trí</label>
						<button type="button" style="padding: 8px 25px;border: none;border-radius: 0;font-size: 15px;font-weight: 600;margin: 0;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
							Vị trí
						</button>

						<div id="myModal" class="modal fade" role="dialog" style="margin-top: 105px;">
						  <div class="modal-dialog modal-lg">

						    
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" style="color: black">&times;</button>
						      </div>
						      <div class="modal-body" style="min-height: 450px;">

					        	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    							<div id="map"></div>

						      </div>
						    </div>

						  </div>
						</div>
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2" style="padding: 0;">Nhập trực tiếp</label>
						<input type="text" placeholder="Vĩ độ" class="col-md-4" name="kinhdo" value="{{$data->info[0]->pl_latitude}}">
						<input type="text" placeholder="Kinh độ" class="col-md-4" name="kinhdo" value="{{$data->info[0]->pl_longitude}}">
					</div>

          <div class="">
            <div class="pac-card" id="pac-card">
            <div>
              <div id="title">
                Nhập tên địa điểm muốn tìm kiếm
              </div>
              <div id="type-selector" class="pac-controls">
                <input type="hidden" name="type" id="changetype-all" checked="checked">
                
              </div>
              
            </div>
            <div id="pac-container">
              <input id="pac-input" type="text"
                  placeholder="Nhập tên địa điểm muốn tìm">
            </div>
          </div>
          <div id="map" style="width: 100%;height: 500px;"></div>
          <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
          </div>
        </div>

					<button class="btn btn-success col-md-12" id="btnaddplace" style="margin-top: 20px;">
              Chỉnh sửa
					</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>




<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>

<script src="public/resource/js/p/addplace.js"></script>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 10.046616, lng: 105.767905},
          zoom: 13,
        });
        
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29),
          draggable: true
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          // lay toa do
          var item_Lat = place.geometry.location.lat();
          var item_Lng = place.geometry.location.lng();
          var item_Location = place.formatted_address;
          $('input[name=vido]').val(item_Lat);
          $('input[name=kinhdo]').val(item_Lng);
          $('#diachi').val(item_Location);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        //
        google.maps.event.addListener(marker, "drag", function(){
          $('input[name=vido]').val(marker.getPosition().lat());
          $('input[name=place_kinhdo]').val(marker.getPosition().lng());
          
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        // function setupClickListener(id, types) {
        //   var radioButton = document.getElementById(id);
        //   radioButton.addEventListener('click', function() {
        //     autocomplete.setTypes(types);
        //   });
        // }

        // setupClickListener('changetype-all', []);
        // setupClickListener('changetype-address', ['address']);
        // setupClickListener('changetype-establishment', ['establishment']);
        // setupClickListener('changetype-geocode', ['geocode']);

        // document.getElementById('use-strict-bounds')
        //     .addEventListener('click', function() {
        //       console.log('Checkbox clicked! New state=' + this.checked);
        //       autocomplete.setOptions({strictBounds: this.checked});
        //     });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4NgGvVNbWb_bMXOdeHLMWVhHm_HITw34&libraries=places&callback=initMap"
        async defer></script>





@include('VietNamTour.header-footer.footer')
