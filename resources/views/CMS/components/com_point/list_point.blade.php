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
    <h2>Danh sách điểm <div style="float: right;">
        <a href="{{ route('_GET_ADD_POINT') }}" class="btn btn-primary">Thêm mới</a>
</div></h2>
    {{-- <p>Dưới đây là dữ liệu tất cả địa điểm hiện có.</p> --}}

</div>

<div class="clearfix"></div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH ĐIỂM
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Tên điểm</th>
                    <th>Mô tả</th>
                    <th>Số điểm</th>
                    <th>Ngày áp dụng</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Số điểm</th>
                    <th>Ngày áp dụng</th>
                </tr>
                </tfoot>
                <tbody>
                    

                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('_GET_EDIT_POINT', $item->id ) }}">{{ $item->point_title }}</a></td>
                        <td>{{ $item->point_description }}</td>
                        <td>{{ $item->point_rate }}</td>
                        <td>{{ $item->point_date  }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>




@endsection