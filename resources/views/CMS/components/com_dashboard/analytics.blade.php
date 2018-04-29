<div class="row">
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                    {{ $data2  }}
                    <span>Người dùng đăng ký mới</b></span>
                </div>
                <div class="bs-label bg-green">+18%</div>
            <div class="center-div sparkline-big-alt">{{ $data1  }}</div>
                <div class="row list-grade">
                    <div class="col-md-2" id="thang-hien-tai-5"></div>
                    <div class="col-md-2" id="thang-hien-tai-4">Tháng 2</div>
                    <div class="col-md-2" id="thang-hien-tai-3">Tháng 3</div>
                    <div class="col-md-2" id="thang-hien-tai-2">Tháng 4</div>
                    <div class="col-md-2" id="thang-hien-tai-1"></div>
                    <div class="col-md-2" id="thang-hien-tai"></div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="{{ route('ALL_LIST_USER') }}" title="">
                        Xem danh sách người dùng
                    </a>
                </div>
                <a href="{{ route('ALL_LIST_USER') }}" class="btn btn-info float-right tooltip-button" data-placement="top" title="Xem thêm">
                    <i class="glyph-icon icon-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                {{ $data3  }}
                    <span>Địa điểm mới<b> trong</b> 6 tháng gần đây</span>
                </div>
                <div class="bs-label bg-red">-14%</div>
                <div class="center-div sparkline-big-alt">{{ $data4  }}</div>
                <div class="row list-grade">
                    <div class="col-md-2"  id="thang-hien-tai-5nd"></div>
                    <div class="col-md-2"  id="thang-hien-tai-4nd"></div>
                    <div class="col-md-2"  id="thang-hien-tai-3nd"></div>
                    <div class="col-md-2"  id="thang-hien-tai-2nd"></div>
                    <div class="col-md-2"  id="thang-hien-tai-1nd"></div>
                    <div class="col-md-2"  id="thang-hien-taind"></div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="{{ route('ALL_LIST_PLACE') }}" title="">
                        Xem danh sách địa điểm
                    </a>
                </div>
                <a href="{{ route('ALL_LIST_PLACE') }}" class="btn btn-default float-right tooltip-button" data-placement="top" title="Xem thêm">
                    <i class="glyph-icon icon-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box dashboard-box-chart bg-white content-box">
            <div class="content-wrapper">
                <div class="header">
                {{ $data5  }} 
                    <span>Tổng dịch vụ mới<b> trong </b> 6 tháng gần đây</span>
                </div>
                <div class="bs-label bg-orange">~51%</div>
                <div class="center-div sparkline-big-alt">{{ $data6  }}</div>
                <div class="row list-grade">
                    <div class="col-md-2" id="thang-hien-tai-5nd1">></div>
                    <div class="col-md-2" id="thang-hien-tai-4nd1">></div>
                    <div class="col-md-2" id="thang-hien-tai-3nd1">></div>
                    <div class="col-md-2" id="thang-hien-tai-2nd1">></div>
                    <div class="col-md-2" id="thang-hien-tai-1nd1">></div>
                    <div class="col-md-2" id="thang-hien-taind1">></div>
                </div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left">
                    <a href="{{ route('ALL_LIST_SERVICES') }}" title="">
                        Xem danh sách dịch vụ
                    </a>
                </div>
                <a href="{{ route('ALL_LIST_SERVICES') }}" class="btn btn-primary float-right tooltip-button" data-placement="top" title="View details">
                    <i class="glyph-icon icon-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
