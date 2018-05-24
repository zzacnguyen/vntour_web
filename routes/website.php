<?php




Route::get('/','pageController@getindex')->name('/');



//========  GIOI THIEU ============
Route::get('gioi-thieu','pageController@getgioithieu')->name('gioi-thieu');

// ====== LOGIN ======


Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('registersuccess','pageController@getregisterSuccess')->name('registersuccess');
Route::get('logoutW','pageController@LogoutSession')->name('logoutW'); // logout
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','pageController@LoginSession')->name('loginpost');
Route::post('registerWpost','loginController@register_web')->name('registerWpost');
// login facebook
Route::get('login/facebook/redirect', 'loginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'loginController@handleProviderCallback');

//user
Route::get('user','pageController@getuser');

// load detail
Route::get('detail/id={id}&type={type}','pageController@getdetail')->name("detail");
Route::get('detail/s','pageController@getServiceTypeVicinity');
Route::get('save_rating/id={id}&rating={r}&detail={t}','publicDetail@save_rating');
Route::get('save_update_rating/id={id}&rating={r}&detail={t}','publicDetail@save_update_rating');
Route::get('paginate_rating/{idsv}&{page}&{limit}','publicDetail@paginate_rating');

Route::get('login_detail/{id}&{type}','publicDetail@login_detail');

Route::get('delete-rating/{idrating}','publicDetail@delete_rating');


// Route::get('count_rating_service/{idservice}','publicDetail@count_rating_service');



// load addplace
Route::get('addplace','pageController@getaddplace')->name('addplace');
Route::get('loadPalce','pageController@loadPalce')->name('addplace');



Route::post('addplace', 'pageController@postPlace');
//  load addservice
Route::get('addservice','pageController@getaddservice');

Route::get('city','pageController@getcount_place_city');

Route::get('lam/type={type}','pageController@findservicetocity');

Route::get('d/f={f}','pageController@typelam');

Route::get('lamdv/type={type}','pageController@getlam');

Route::get('count_place_Allcity','pageController@count_place_Allcity');
Route::get('count_place_display','pageController@count_place_display');

Route::get('lamindex/id={id}','publicDetail@get_service_id');



// detail service
Route::get('detail-service/id={id}','publicDetail@get_service_id');

Route::get('detail/id={id}&type={type}','publicDetail@get_detail');

Route::get('diadiem2/id={id}','publicDetail@dichvu_lancan');

Route::get('detail/get_top_view_service/{limit}','publicDetail@get_top_view_service'); //top view

Route::get('login_Detail/{id}&{type}','pageController@getlogin_Detail'); //login detail



//search public
Route::get('p_search','publicSearchController@get_search');

// place_city
// Route::get('city/{id}','publicSearchController@get_place_city');

Route::get('count_ser/{id}','publicSearchController@count_servies_type');
Route::get('get_all_place_city_type/{id}&type={t}','publicSearchController@get_all_place_city_type');

Route::get('image_city/{id}','pageController@image_city');




//================================= TEST ======================================
Route::get('count_city_service_all_image','pageController@count_city_service_all_image');
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');
Route::get('getlam/id={id}&l={l}','pageController@getServicesTake');
Route::get('likelam/{idser}','publicDetail@count_service_all_and_type');

Route::get('count_service_all_and_type/{id}','publicCityController@count_service_all_and_type');//test add view service
Route::get('phantrang/{id}','publicCityController@checkPaginate');

Route::get('getServicesTake/type={t}&id={i}','pageController@getServicesTake');

//tetx
Route::get('lamtr/{type}&lim={l}','pageController@gettypeService');

//================================ NEW ========================================

//get num service of city all
Route::get('count_city_service_all','pageController@count_city_service_all');



//================== add place ================
Route::get('addplace','publicaddplaceController@getaddplace')->name('addplace');

Route::get('loadDistrict/{idcity}','publicaddplaceController@loadDistrict');
Route::get('loadWard/{id}','publicaddplaceController@loadWard');





//================== search header =============
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');

Route::get('searchService_City_AllType/idcity={id}&keyword={k}','pageController@searchService_City_AllType');

Route::get('searchService_City_Type/idcity={id}&type={t}&keyword={k}','pageController@searchService_City_Type');

Route::get('searchServices_AllCity_idType/type={t}&keyword={k}','pageController@searchServices_AllCity_idType');

Route::get('conSearch/{idcity}&type={type}&keyword={key}&selecttype={ty}','pageController@conSearch');

Route::post('search-vicinity','pageController@get_search_vicinity')->name('search-vicinity');

Route::get('search-vicinity-type/{lat}&{lon}&{radius}&{type}&{page}&{limit}','pageController@get_vicinity_select_type');

Route::get('get-service-top-search','pageController@get_service_max_search');




Route::get('search','pageController@getpageSearch')->name('search');




//================= detail ==================
Route::get('checkLogin','publicDetail@checkLogin');
Route::get('ThemVaCapNhatLike/{id}','publicDetail@ThemVaCapNhatLike');

//============ check like
Route::get('checkLike/userid={d}&svid={s}','publicDetail@checkLike');


// ================ serviece city ==============
Route::get('city/{id}&type={type}&page={p}','publicCityController@getCity');

Route::get('city-all/id={id}&district={dis}&type={type}&fil={fil}&page={page}&li={li}','publicCityController@get_service_city_fillter');




// =============== user info ===========
Route::get('info','accountController@get_info_account')->name('info');
Route::post('info',['as'=>'postinfo','uses'=>'accountController@post_edit_info_account']);
Route::get('get_quyen_dangky','accountController@get_quyen_dangky');

Route::post('register-uplevel-user','accountController@register_uplevel_user')->name('register-uplevel-user');

//test

Route::get('getRating/{id}','publicDetail@getRating');
Route::get('checkUserRating/{idservice}&user_id={id}','publicDetail@checkUserRating');

Route::get('check-login','publicDetail@check_Login');




//====== place user


//====== service user
Route::get('service-user','accountController@getservice_user')->name('service-user');
Route::get('service-user/add/{id}','accountController@addservice_user');
Route::get('service-user/{type}','accountController@get_service_user_active');

Route::get('top-service-view','accountController@Top_service_view');
Route::get('top-service-rating-like/{type}','accountController@Top_service_rating_like');

Route::get('get-service-user-max-view','accountController@get_service_user_max_view');
Route::get('get-service-user-max-ating-like/{type}','accountController@get_service_user_max_rating_like');

//====== tripschudule
Route::get('get_tripchudule','accountController@get_tripchudule')->name('get_tripchudule');

Route::get('get_tripchudule_detail/{id}','accountController@get_tripchudule_detail');

Route::post('add_tripchudule','accountController@saveTripSchedule');

Route::post('add_detailtripchudule/{id}','accountController@saveDetailTripSchedule');

Route::get('schedule-delete/{id}','accountController@DeleteDetailTripSchedule');
Route::get('schedule-search-ervices/{key}','accountController@searchServices_All_lichtrinh');
Route::get('save-trip-schedule-array','accountController@saveTripSchedule_array');

Route::get('delete-schedule-detail/{id}','accountController@delete_Schedule_detail');




//get con search
Route::get('conSearch/{idcity}&type={type}&keyword={key}&select={select}','pageController@conSearch');
//service user
Route::get('add-service-user',['as'=>'serviceuser','uses'=>'accountController@get_add_service_user']);
Route::post('add-service-user',['as'=>'postserviceuser','uses'=>'accountController@post_add_service_user']);
Route::get('service-user',['as'=>'service_user','uses'=>'accountController@get_service_user']);
Route::get('service-user/add/{id}','accountController@addservice_user');
Route::get('server-user-edit/{id}',['as'=>'edit_service_user','uses'=>'accountController@edit_service_user']);
Route::post('server-user-edit/{id}',['as'=>'post_edit_service_user','uses'=>'accountController@post_edit_service_user']);

Route::get('load_place_ward/{id}','accountController@load_place_ward');

//place user
Route::get('place-user',['as'=>'placeuser','uses'=>'accountController@getPlace_user']);
Route::get('place-user/add',['as'=>'addplaceuser','uses'=>'accountController@addplace']);
Route::post('place-user/add',['as'=>'postaddplaceuser','uses'=>'accountController@post_addplace']);
Route::get('edit-place-user/{id}',['as'=>'edit_placeuser','uses'=>'accountController@edit_place_user']);
Route::post('edit-place-user/{id}',['as'=>'postedit_placeuser','uses'=>'accountController@post_edit_place_user']);

Route::get('place-user-list/{cur}&{limit}','accountController@getPlace_user_paginate');
//=========

// change pass
Route::post('change-pass','accountController@changePassword');


// save user search
	//save-user-search/{idserivce}&{iduser}
Route::get('save_user_search/{idservice}','accountController@save_user_search');
Route::get('list-user-search','pageController@get_user_search');

Route::get('detail-search/id={id}&type={type}','publicDetail@get_detail_search');



//dfdsfdsf

Route::get('list_place','accountController@list_place');








































?>
