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
    <h2>Danh sách địa điểm</h2>
    
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        ĐỊA ĐIỂM CHỜ DUYỆT
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th style="width: 5%">ID</th>
                    <th style="width: 15%">Tên địa điểm</th>
                    <th style="width: 25%">Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>

                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên địa điểm</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                </tr>
                </tfoot>
                <tbody>
                    

                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="">{{ $item->pl_name }}</a></td>
                        <td>{{ $item->pl_address }}</td>
                        <td>{{ $item->pl_phone_number }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><?php if($item->pl_status==0)
                            echo "Không hiển thị";
                            else if($item->pl_status==-1)
                                echo "Spam!";
                            else{
                                echo "Hiển thị";
                            }
                        ?>
                        </td>
                         <td><a href="{{ route('ACCTIVE_PLACES2', $item->id) }}">
                            <i class="glyph-icon tooltip-button demo-icon icon-upload bg-success" title="Active"></i>
                        </a>
                            
                        <a data-toggle="modal"   data-target="#removeUser{{ $item->id }}"> <i class="glyph-icon tooltip-button demo-icon icon-eye-slash bg-danger"></a></i>
                       <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bạn có chắc chắn?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:red">Sau khi nhấn đồng ý, {{ $item->pl_name }} sẽ bị đánh dấu spam và ẩn khỏi giao diện người dùng!</p>
                                        <small> Lưu ý: Dữ liệu sẽ không bị xoá! </small>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                        <a class="btn btn-danger" href="{{ route('UNACCTIVE_PLACES2', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
                                        {{-- <a href="javascript:void(0)" class="btn btn-danger">ĐỒNG Ý</a> --}}
                                    </div>
                                </div><!-- end modal-content -->
                            </div><!-- end modal-dialog -->
                        </div><!-- end modal -->
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>




@endsection