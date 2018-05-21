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
    <h2>Chỉnh sửa loại hình sự kiện</h2>

    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row"  style="padding-top: 25px;">
        <div class="col-md-7 col-md-offset-2">
            <div class="book-tour-container bg-success">
                <div class="frm-heading">
                CHỈNH SỬA LOẠI HÌNH SỰ KIỆN
                <span></span>
                </div>
            </div>
            <div class="content-box  post-box">
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                        <div class="col-md-8">
                            <label for="name" >Thêm loại hình sự kiện: </label>
                            <input type="text" value="{{ $data[0]->type_name }}"  id="name" required  class="form-control" name="name" >
                        </div>

                        <div class="col-md-4  form-group"  >
                            <label for="name" >Trạng thái hiển thị: </label>
                            <select name="status" id="" class="form-control">

                                @if($data[0]->type_status == 1)
                                <option selected value="1">Hiển thị</option>
                                <option  value="0">Ẩn</option>
                                @else
                                <option selected value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                                @endif
                            </select>
                        </div>
                    </div>
                        
                    
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                         <div class="btn-toolbar" role="toolbar"   style="text-align: center;" >
                            <div class="btn-group" role="group">
                                <button class="btn btn-info "  type="submit" name="action" value="save_close"><span class="glyph-icon icon-elusive-ok">Lưu và thoát</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        </div>
        
    </div>
</div>



@endsection