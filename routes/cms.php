<?php
	//BẤM CTRL F ĐỂ TÌM CÁC LINK HIỆN CÓ

/*
1. TRANG CHỦ
2. THÊM TASK
3. XOÁ TASK
4. NGƯỜI DÙNG - ADMIN
5. NGƯỜI DÙNG - MODERTAROR
6. NGƯỜI DÙNG - DOANH NGHIỆP
7. NGƯỜI DÙNG - CỘNG TÁC VIÊN
8. NGƯỜI DÙNG - HƯỚNG DẪN VIÊN DU LỊCH
9. TẤT CẢ NGƯỜI DÙNG
10. DANH SÁCH ĐỊA ĐIỂM
11. THÊM ĐỊA ĐIỂM - GET
12. THÊM ĐỊA ĐIỂM - POST
13. THÊM DỊCH VỤ - GET
14. THÊM DỊCH VỤ - POST
15. DỊCH VỤ - DANH SÁCH
16. VUI CHƠI GIẢI TRÍ - GET
17. 

4. 







*/





	// Route::get('qt-test', 'CMS_ModuleController@_DISPLAY_NEW_USER');
	

	//TRANG CHỦ
	Route::get('lvtn-dashboard', 'CMS_ModuleController@getDashboard')->name('ADMIN_DASHBOARD');
	

	//THÊM TASK
	Route::post('lvtn-dashboard', 'CMS_AddDataController@_POST_TASK');
	

	//XOÁ TASK
	Route::get('delete-task/{id}', 'CMS_DeleteDataController@_DELETE_TASK')->name('DELETE_TASK');







	//NGƯỜI DÙNG - ADMIN
	Route::get('lvnt-list-admin','CMS_ComponentController@_DISPLAY_LIST_ADMIN_USER')->name('ALL_LIST_ADMIN');


	//NGƯỜI DÙNG - MODERTAROR
	Route::get('lvnt-list-mod','CMS_ComponentController@_DISPLAY_LIST_MODERATOR_USER')->name('ALL_LIST_MOD');


	//NGƯỜI DÙNG - DOANH NGHIỆP
	Route::get('lvnt-list-enterpirse','CMS_ComponentController@_DISPLAY_LIST_ENTERPRISE')->name('ALL_LIST_ENTERPRISE');


	//NGƯỜI DÙNG - CỘNG TÁC VIÊN
	Route::get('lvnt-list-partner','CMS_ComponentController@_DISPLAY_LIST_PARTNER')->name('ALL_LIST_PARTNER');
	


	////NGƯỜI DÙNG - HƯỚNG DẪN VIÊN DU LỊCH
	Route::get('lvnt-list-tour-guide','CMS_ComponentController@_DISPLAY_LIST_TOURGUIDE')->name('ALL_LIST_TOURGUIDE');


	//TẤT CẢ NGƯỜI DÙNG
	Route::get('lvtn-list-user', 'CMS_ComponentController@_DISPLAY_LIST_ALL_USER')->name('ALL_LIST_USER');


	//DANH SÁCH ĐỊA ĐIỂM
	Route::get('lvtn-list-address', 'CMS_ComponentController@_DISPLAY_TOURIST_PLACES')->name('ALL_LIST_PLACE');

	//THÊM ĐỊA ĐIỂM - GET
	Route::get('lvtn-add-tourist-places', 'CMS_ModuleController@_GETVIEW_ADD_TOURIST_PLACES')->name('ADD_TOURIST_PLACES');
	//THÊM ĐỊA ĐIỂM - POST
	Route::post('lvtn-add-tourist-places', 'CMS_AddDataController@_POST_TOURIST_PLACES');

	//THÊM DỊCH VỤ - GET
	Route::get('lvtn-add-services', 'CMS_ModuleController@_GETVIEW_ADD_SERVICES')->name('_GETVIEW_ADD_SERVICES');
	//THÊM DỊCH VỤ - POST


	//DỊCH VỤ - DANH SÁCH
	Route::get('lvnt-list-services','CMS_ComponentController@_DISPLAY_LIST_SERVICES')->name('ALL_LIST_SERVICES');


	Route::post('lvtn-add-services', 'CMS_AddDataController@_POST_ADD_SERVICES');

	//DANH SÁCH DỊCH VỤ
		//VUI CHƠI GIẢI TRÍ - GET
		Route::get('lvtn-services-entertaiments', 'CMS_ComponentController@_GET_VIEW_LIST_SERVICES_BY_ENTERTAIMENTS')->name('_GET_VIEW_SERVICES_BY_ENTERTAIMENTS');
		// Route::get('lvtn-')
		//ĂN UỐNG - ẨM THỰC


		//KHÁCH SẠN NƠI Ở




		// THAM QUAN



		// VUI CHƠI GIẢI TRÍ


	





