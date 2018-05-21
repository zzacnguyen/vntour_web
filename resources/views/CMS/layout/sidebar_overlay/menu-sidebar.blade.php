<div class="scroll-sidebar">
    <ul id="sidebar-menu">
        <li class="header"><span>Tổng quan</span></li>
        <li>
            <a href="{{  route('ADMIN_DASHBOARD') }}" title="Trang quản trị nội dung">
                <i class="glyph-icon icon-home"></i>
                <span>Trang quản trị</span>
            </a>
        </li>
        <li class="divider"></li>
        <li class="no-menu">
            <a href="{{  route('/') }}" target="_blank" title="Trang public">
                <i class="glyph-icon icon-linecons-paper-plane"></i>
                <span>VietNamTour</span><span class="bs-label label-danger">MỚI</span>
            </a>
        </li>
        <li class="header"><span>Quản trị người dùng</span></li>
        
        <li>
            <a href="javascript:void(0)" title="Danh mục người dùng">
                <i class="glyph-icon icon-typicons-users-outline"></i>
                <span>Thông tin người dùng</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li><a href="{{ route('ALL_LIST_ADMIN') }}" title="Danh sách quản trị viên"><span>Quản trị viên</span></a></li>
                    <li><a href="{{ route('ALL_LIST_MOD') }}" title="Danh sách kiểm duyệt viên"><span>Kiểm duyệt viên</span></a></li>
                    <li><a href="{{ route('ALL_LIST_PARTNER') }}" title="Danh sách cộng tác viên"><span>Cộng tác viên</span></a></li>
                    <li><a href="{{ route('ALL_LIST_ENTERPRISE') }}" title="Danh sách doanh nghiệp"><span>Doanh nghiệp</span></a></li>
                    <li><a href="{{ route('ALL_LIST_TOURGUIDE') }}" title="Checklist"><span>Hướng dẫn viên du lịch</span>
                    </a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>

        {{-- <li>
            <a href="#" title="Người dùng đang chờ được duyệt">
                <i class="glyph-icon icon-linecons-user"></i>
                <span>Đang chờ duyệt</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li><a href="#" title="Người dùng thành viên - partner"><span>Partner</span></a></li>
                    <li><a href="#" title="Người dùng thành viên - tour guide"><span>Tour guide</span></a></li>
                     <li><a href="#" title="Người dùng thành viên - partner"><span>Doanh nghiệp</span></a></li>
                    <li><a href="#" title="Người dùng thành viên - tour guide"><span>Moderator</span></a></li>

                </ul>
            </div><!-- .sidebar-submenu -->

        </li>
        <li><a href="#" > <i class="glyph-icon icon-check"></i> <span>Đã duyệt</span></a></li>
        <li><a href="#" > <i class="glyph-icon icon-exclamation"></i> <span>Người dùng spam</span></a></li>
        <li><a href="#" > <i class="glyph-icon icon-child""></i> <span>Người dùng mới</span></a></li>
        <li><a href="#" > <i class="glyph-icon icon-typicons-users""></i> <span>Xem tất cả</span></a></li> --}}
        <li class="header"><span>Danh mục địa điểm</span></li>
        <li>
            <a href="{{ route('ALL_LIST_PLACE') }}" title="Danh sách địa điểm">
                <i class="glyph-icon icon-fire"></i>
                <span>Xem địa điểm</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ADD_TOURIST_PLACES') }}" title="Thêm địa điểm mới">
                <i class="glyph-icon icon-plus"></i>
                <span>Thêm địa điểm mới</span>
            </a>
        </li>
        {{-- <li>
            <a href="#" title="Pages">
                <i class="glyph-icon icon-elusive-network"></i>
                <span>Maps</span>
            </a>
        </li> --}}
        
        <li class="header"><span>Danh mục dịch vụ</span></li>

        <li>
            <a href="{{ route('_GET_VIEW_LIST_SERVICES_BY_FOODANDDRINK') }}" title="Danh sách dịch vụ ăn uống">
                <i class="glyph-icon icon-coffee"></i>
                <span>Ăn uống</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GET_VIEW_LIST_SERVICES_BY_HOTEL') }}" title="Danh sách dịch vụ khách sạn - nơi ở">
                <i class="glyph-icon icon-elusive-home"></i>
                <span>Khách sạn</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GET_VIEW_LIST_SERVICES_BY_SIGHTSEEING') }}" title="Danh sách các dịch vụ tham quan">
                <i class="glyph-icon icon-tree"></i>
                <span>Tham quan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GET_VIEW_SERVICES_BY_ENTERTAIMENTS') }}" title="Danh sách dịch vụ vui chơi giải trí">
                <i class="glyph-icon icon-soccer-ball-o"></i>
                <span>Vui chơi giải trí</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GET_VIEW_LIST_SERVICES_BY_TRANSPORT') }}" title="Danh sách dịch vụ vận chuyển">
                <i class="glyph-icon icon-rocket"></i>
                <span>Phương tiện di chuyển</span>
            </a>
        </li>
        <li class="header"><span>Danh mục khác</span></li>

        <li>
            <a href="{{ route('_GET_LIST_ALL_POINT') }}" title="Danh sách điểm dành cho dịch vụ">
                <i class="glyph-icon icon-file-powerpoint-o"></i>
                <span>Danh mục điểm</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GET_EVENT_TYPES') }}" title="Danh sách các loại hình sự kiện">
                <i class="glyph-icon icon-pied-piper"></i>
                <span>Danh mục loại hình sự kiện</span>
            </a>
        </li>
        <li>
            <a href="{{ route('_GETVIEW_LIST_SOCIAL') }}" title="Danh sách các mạng xã hội">
                <i class="glyph-icon icon-google-plus-square"></i>
                <span>Danh mục mạng xã hội</span>
            </a>
        </li>
        {{-- <li>
            <a href="javascript:void(0)" title="Danh mục người dùng">
                <i class="glyph-icon icon-location-arrow"></i>
                <span>Danh mục địa chỉ</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li><a href="{{ route('ALL_LIST_ADMIN') }}" title="Danh sách Tỉnh thành phố"><span>Tỉnh thành</span></a></li>
                    <li><a href="{{ route('ALL_LIST_MOD') }}" title="Danh sách quận huyện"><span>Quận/huyện</span></a></li>
                    <li><a href="{{ route('ALL_LIST_PARTNER') }}" title="Danh sách phường xã"><span>Phường/xã</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>
         --}}
        
    </ul><!-- #sidebar-menu -->
</div>