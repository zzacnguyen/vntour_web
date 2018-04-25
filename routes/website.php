<?php




Route::get('/','pageController@getindex')->name('/');


// ====== LOGIN ======
Route::get('checkLogin','pageController@checkLogin');


Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('registersuccess','pageController@getregisterSuccess')->name('registersuccess');
Route::get('logoutW','loginController@logoutW')->name('logoutW');
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','pageController@postLoginW')->name('loginpost');
Route::post('registerWpost','loginController@registerW')->name('registerWpost');
// login facebook
Route::get('login/facebook/redirect', 'loginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'loginController@handleProviderCallback');

//user
Route::get('user','pageController@getuser');

// load detail
Route::get('detail/id={id}&type={type}','pageController@getdetail')->name("detail");
Route::get('detail/s','pageController@getServiceTypeVicinity');

// load addplace
Route::get('addplace','pageController@getaddplace')->name('addplace');
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

Route::get('lamdeptrai/{l},{log}&type={t},radius={r}','publicDetail@searchServicesVicinity');


// detail service
Route::get('detail-service/id={id}','publicDetail@get_service_id');

Route::get('detail/id={id}&type={type}','publicDetail@get_detail');

Route::get('diadiem2/id={id}','publicDetail@dichvu_lancan');



//search public
Route::get('p_search','publicSearchController@get_search');

// place_city
Route::get('city/{id}','publicSearchController@get_place_city');

Route::get('count_ser/{id}','publicSearchController@count_servies_type');
Route::get('get_all_place_city_type/{id}&type={t}','publicSearchController@get_all_place_city_type');

Route::get('image_city/{id}','pageController@image_city');


//================================= TEST ======================================
Route::get('count_city_service_all_image','pageController@count_city_service_all_image');
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');
Route::get('getlam/id={id}&l={l}','pageController@getServicesTake');
Route::get('likelam/{idser}','publicDetail@like_service');
Route::get('checklogin','pageController@checkLogin');



//================================ NEW ========================================

//get num service of city all
Route::get('count_city_service_all','pageController@count_city_service_all');



//================== add place ================
Route::get('addplace','publicaddplaceController@getaddplace')->name('addplace');

Route::get('loadDistrict/{idcity}','publicaddplaceController@loadDistrict');
Route::get('loadWard/{id}','publicaddplaceController@loadWard');





//================== search header =============
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');

















































































?>