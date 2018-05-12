@extends('CMS.components.index')
@section('content')

@if(!empty($errors->first()))
    <div class=" error row col-lg-12" >
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif
<script >
 $(document).ready(function () {          
        setTimeout(function() {
            $('.error').slideUp("slow");
        }, 10000);
});
</script>

<div id="page-title">
    <h2>Thêm dịch vụ</h2>
    <small>Địa điểm: {{ $data_place->id }}, {{ $data_place->pl_name }}</small>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>

</div>
{{-- <a hidden="hidden" href="javascript:history.go(-1)" class="btn-danger btn">Thoát</a> --}}
    <div class="row"  style="padding-top: 25px;">
        <div class="col-md-9 col-md-offset-1">
            <div class="book-tour-container bg-success">
                <div class="frm-heading">
                THÔNG TIN DỊCH VỤ
                <span></span>
                </div>

            </div>
            <div class="content-box  post-box   ">
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_diadiem" value="{{ $data_place->id }}">
                <input type="hidden" name="ten_diadiem" value="{{ $data_place->pl_name }}">
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-4">
                        <label for="type_services" >Chọn loại hình: </label>
                        <select id="open_star" class="form-control" name="type_services">
                            <option value="1">Ăn uống - Ẩm thực</option>
                            <option value="2">Khách sạn - Nơi ở</option>
                            <option value="3">Di chuyển - Phương tiện</option>
                            <option value="4">Tham quan - Mua sắm</option>
                            <option value="5">Vui chơi - Giải trí</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="services_name" >Tên dịch vụ: </label>
                        <input type="text" value="{{ old('services_name') }}"  id="services_name" required  class="form-control" name="services_name" >
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-2">
                        <label for="giomocua">Giờ mở cửa</label>
                    </div>
                    <div class="col-md-2">
                        <label for="sv_open">Từ (AM): </label>
                    </div>
                    <div class="col-md-3">
                        <input type="time" style="text-align: center;" value="{{ old('sv_open') }}"  id="sv_open" required class="form-control" name="sv_open">    
                    </div>
                    <div class="col-md-2">
                        <label for="sv_close" >Đến (PM): </label>
                    </div>
                    <div class="col-md-3">
                        <input type="time" style="text-align: center;" value="{{ old('sv_close') }}"  min="1" max="12" id="sv_close" required class="form-control" name="sv_close">    
                    </div>
                </div>

                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="gia">
                        <div class="col-md-2">
                            <label for="giomocua">Giá (VNĐ): </label>
                        </div>
                        <div class="col-md-2">
                            <label for="sv_lowest_price">Từ: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align: center;" value="{{ old('sv_lowest_price') }}"  min="0" max="10000000000" id="sv_lowest_price" required class="form-control" name="sv_lowest_price">    
                        </div>
                        <div class="col-md-2">
                            <label for="sv_highest_price" >Đến: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align: center;" value="{{ old('sv_highest_price') }}"  min="0" max="10000000000" id="sv_highest_price" required class="form-control" name="sv_highest_price">    
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="giomocua" >
                        <div class="col-md-4">
                            <label for="sv_phone_number" >Số điện thoại: </label>
                            <input type='tel' value="{{ old('sv_phone_number') }}"  id="sv_phone_number" required class="form-control" name="sv_phone_number" data-inputmask="'mask':'(999) 999-9999'" title='Số điện thoại (Định dạng: (999) 999-9999'>
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website: </label>
                            <input type="text" value="{{ old('website') }}" id="website" required  class="form-control" name="website" >
                        </div>
                        <div class="col-md-4" id="star" hidden>
                            <label for="star">Số sao: </label>
                            <input type="number" max='5' min='1'  value="{{ old('star') }}" id="star"   class="form-control" name="star" >
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="d-inline" id="giomocua" >
                        <div class="col-md-12">
                            <label for="description" >Mô tả: </label>
                            <input type="text" value="{{ old('description') }}"  class="form-control" id="description" required  class="form-control" name="description" >
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-4">
                        <label>Hình ảnh 1</label>
                        <input type="file" value="{{ old('banner') }}"  class="form-control" accept="image/*" name="banner" >
                    </div>        
                    <div class="col-md-4">
                        <label>Hình ảnh 2</label>
                        <input type="file" value="{{ old('details1') }}"  class="form-control" accept="image/*" name="details1" >
                    </div>        
                    <div class="col-md-4">
                        <label>Hình ảnh 3</label>
                        <input type="file" value="{{ old('details2') }}"  class="form-control" accept="image/*" name="details2" >
                    </div>    
                    
                    <div class="clearfix" ></div>
                    <div class="col-md-12" style="padding-top: 25px">
                            <a href="#" style="color:red" id="open_upload_image">+ Thêm nhiều ảnh khác</a>
                            
                            <div id="image_orther" hidden="hidden">
                                <small class="label-warning">Bạn có thể chọn nhiều ảnh cùng lúc</small>

                                <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
                                <div id="preview" >
                                    <div id="image_preview"></div>
                                </div>
                            </div>
                    </div>
                    <style type="text/css" >
                        .image_preview .close {
                            position: absolute;
                            top: 2px;
                            right: 2px;
                            z-index: 100;
                        }
                    </style>
                    <script>
                        $(document).ready(function() 
                        { 
                         $('form').ajaxForm(function() 
                         {
                          alert("Uploaded SuccessFully");
                         }); 
                        });

                        function preview_image() 
                        {
                            var total_file=document.getElementById("upload_file").files.length;
                            for(var i=0;i<total_file;i++)
                            {
                              $('#image_preview').append("<div class='col-md-3' id='hide_item'>  <img style='width:150px;height:200px;' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
                            }

                        }
                    </script>  
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-12">
                         <label for="content"  title="Nội dung giới thiệu địa điểm">Nội dung chi tiết: </label>
                        <textarea style="height: 500px" id="content" >{{ old('content') }}" </textarea>
                        <input type="hidden" value="{{ old('content') }}"  name="content" id="content2">
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
                </div> 
                
                <div class="clearfix"></div>
               <div class="btn-toolbar" role="toolbar"   style="text-align: center;" >
                    <div class="btn-group" role="group">
                        <button class="btn btn-info "  type="submit" name="action" value="save_close"><span class="glyph-icon icon-elusive-ok">Lưu và thoát</span></button>
                    </div>
                    <div class="btn-group" role="group">
                        <button class="btn btn-success " style="float: right; margin-bottom: 25px; " type="submit" name="action" value="save_and_add_service">Lưu và tiếp tục</button>    
                    </div>
                </div>
                
            </form>
        </div>
        </div>
        
    </div>
</div>
<script>
    
    $("#open_star").change(function () {
      var selected_option = $('#open_star').val();

      if (selected_option === '2') {
        $('#star').attr('pk','1').show();
      }
      if (selected_option != '2') {
        $("#star").removeAttr('pk').hide();
      }
    })

     $("#open_upload_image").click(function () {
        $('#image_orther').show();
    })
</script>


@endsection