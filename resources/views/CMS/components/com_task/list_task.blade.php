

<div class="panel" style="padding-top: 25px">
    <h2>Danh sách nhiệm vụ</h2>
    <div class="panel-body">
        <ul class="todo-box">
            @foreach($data10 as $item)
            <li class="border-blue">
                <input type="checkbox" name="todo-3" id="todo-3">
                <label for="todo-3">{{ $item->task_title  }}</label>
                <span class="bs-label bg-blue" title="">{{ $item->date_start  }}</span>
                <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id }}" title="Xóa bỏ">
                <i class="glyph-icon icon-remove"></i></a>

                <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Bạn có chắc chắn?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Sau khi nhấn đồng ý, Dữ liệu liên quan đến {{ $item->task_title }} sẽ bị xóa bỏ!</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                <a class="btn btn-danger" href="{{route('DELETE_TASK', $item->id)}}" id="remove-button" type="submit">Đồng ý</a>
                            </div>
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div><!-- end modal -->
                
            </li>
           @endforeach
        </ul>
    </div>
</div>
<?php

