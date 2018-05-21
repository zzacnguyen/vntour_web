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
    <h2>Duyệt người dùng</h2>

    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row"  style="padding-top: 25px;">
        <div class="col-md-7 col-md-offset-2">
            <div class="book-tour-container bg-success">
                <div class="frm-heading">
                DUYỆT NGƯỜI DÙNG
                <span></span>
                </div>
            </div>
            <div class="content-box  post-box">
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                    <div class="col-md-12">
                        <label for="social_title" >Tiêu đề: </label>
                        <input type="text" value="{{ old('point_title') }}"  id="social_title" required  class="form-control" name="social_title" >
                    </div>
                    <div class="col-md-12">
                        <label for="social_description" >Mô tả: </label>
                        <textarea  required name="social_description">{{ old('social_description') }}</textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="btn-toolbar" role="toolbar"   style="text-align: center;" >
                    <div class="btn-group" role="group">
                        <button class="btn btn-info "  type="submit" name="action" value="save_close"><span class="glyph-icon icon-elusive-ok">Lưu và thoát</span></button>
                    </div>
                    <div class="btn-group" role="group">
                        <button class="btn btn-success " style="float: right; margin-bottom: 25px; " type="submit" name="action" value="save_and_add">Lưu và tiếp tục</button>    
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