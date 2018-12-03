<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function (){
    return redirect('/index');
});


Route::get('index', 'HomeController@index');
Route::get('result/{id}', 'HomeController@result');
Route::get('home/winners/{id}/{type}', 'HomeController@winners');
//Route::get('index/viewcart', 'HomeController@viewCart');
Route::get('login', 'HomeController@login');
Route::post('postLogin', 'HomeController@postLogin');

Route::get('admin', 'AdminController@login');
Route::post('admin/login', 'AdminController@postLogin');

Route::get('whatsapp_hook','HomeController@whatsapp');

Route::group(['middleware' => 'auth'], function () {

    Route::get('agent/dashboard', 'AgentController@dashboard');
    Route::get('agent/games/show_tDlot', 'AgentController@show_tDlot');
    Route::get('agent/games/do_tDlot/{id}', 'AgentController@do_tDlot');
    Route::post('agent/games/buy_tdbet/{id}', 'AgentController@buy_tdbet');
    Route::get('agent/games/tD_detail/{id}', 'AgentController@tDdetail');
    Route::get('agent/games/auto_tDlot_refresh/{id}', 'AgentController@auto_tDlot_refresh');

    Route::get('agent/games/show_pic_play', 'AgentController@show_pic_play');
    Route::get('agent/games/do_pic_play/{id}', 'AgentController@do_pic_play');
    Route::post('agent/games/buy_pic_play/{id}', 'AgentController@buy_pic_play');
    Route::get('agent/games/auto_pic_refresh/{id}', 'AgentController@auto_pic_refresh');

    Route::get('agent/games/winnerlist/{id}', 'AgentController@winnerlist');
    Route::get('agent/games/buylist/{ID}', 'AgentController@buylist');

    Route::get('agent/games/pic_detail/{id}', 'AgentController@picdetail');
    Route::get('agent/deposit', 'AgentController@deposit');
    Route::post('agent/do_deposit', 'AgentController@do_deposit');
    Route::get('agent/withdraw', 'AgentController@withdraw');
    Route::post('agent/do_withdraw', 'AgentController@do_withdraw');
    Route::get('agent/profile', 'AgentController@profile');
    Route::post('agent/save_profile', 'AgentController@save_profile');
    Route::get('agent/show_changepassword', 'AgentController@show_changepassword');
    Route::post('agent/do_changepassword', 'AgentController@do_changepassword');
    Route::get('agent/logout', 'AgentController@logout');


    Route::group(['middleware' => 'role'], function () {

        Route::get('admin/index', 'AdminController@index');
        Route::get('admin/dashboard', 'AdminController@index');

        Route::get('admin/games/show_pic_play', 'AdminController@show_pic_play');
        Route::get('admin/games/save_new_draw', 'AdminController@save_new_draw');
        Route::get('admin/games/show_edit_pic_draw/{id}', 'AdminController@show_edit_draw');
        Route::post('admin/games/do_edit_draw/{id}', 'AdminController@do_edit_draw');
        Route::get('admin/games/delete_pic_draw/{id}', 'AdminController@del_pic_draw');
        Route::get('admin/games/show_analyse_pic_draw/{id}', 'AdminController@show_analyse_pic_draw');
        Route::get('admin/games/do_pic_report/{id}', 'AdminController@do_report_pic_draw');
        Route::get('admin/games/do_pic_declare/{id}', 'AdminController@do_pic_declare');
        Route::get('admin/games/show_pic_winners/{id}', 'AdminController@show_pic_winners');
        Route::get('admin/games/show_pic_soldlist/{id}', 'AdminController@show_pic_soldlist');


        Route::get('admin/games/show_tDlot', 'AdminController@show_tDlot');
        Route::get('admin/games/show_tDlot_analyse/{id}', 'AdminController@show_tDlot_analyse');
        Route::post('admin/games/save_new_tD_draw', 'AdminController@save_new_tD_draw');
        Route::get('admin/games/show_edit_tD_draw/{id}', 'AdminController@show_edit_tD_draw');
        Route::post('admin/games/do_edit_tD_draw/{id}', 'AdminController@do_edit_tD_draw');
        Route::get('admin/games/do_tD_report/{id}', 'AdminController@do_tD_report');
        Route::get('admin/games/back_tD_report', 'AdminController@back_tD_report');
        Route::get('admin/games/del_tD_draw/{id}', 'AdminController@del_tD_draw');
        Route::get('admin/games/do_tDlot_declare/{id}', 'AdminController@do_tDlot_declare');
        Route::get('admin/games/show_tDlot_winners/{id}', 'AdminController@show_tDlot_winners');
        Route::get('admin/games/show_tDlot_soldlist/{id}', 'AdminController@show_tDlot_soldlist');
        Route::get('admin/games/getexcel_sold/{id}/{type}', 'AdminController@getexcel_sold');
        Route::get('admin/games/getexcel_winner/{id}/{type}', 'AdminController@getexcel_winner');


        Route::get('admin/admin/show_admin_manage', 'AdminController@show_admin_manage');
        Route::post('admin/admin/new_admin', 'AdminController@new_admin');
        Route::get('admin/admin/show_edit_admin/{id}', 'AdminController@show_edit_admin');
        Route::post('admin/admin/do_edit_admin/{id}', 'AdminController@do_edit_admin');
        Route::get('admin/admin/do_del_admin/{id}', 'AdminController@do_del_admin');
        Route::get('admin/admin/do_admin_ban/{id}', 'AdminController@do_admin_ban');
        Route::get('admin/admin/do_admin_active/{id}', 'AdminController@do_admin_active');


        Route::get('admin/agent/show_agent_manage', 'AdminController@show_agent_manage');
        Route::post('admin/agent/new_agent', 'AdminController@new_agent');
        Route::get('admin/agent/show_edit_agent/{id}', 'AdminController@show_edit_agent');
        Route::post('admin/agent/do_edit_agent/{id}', 'AdminController@do_edit_agent');
        Route::get('admin/agent/do_del_agent/{id}', 'AdminController@do_del_agent');
        Route::get('admin/agent/do_agent_ban/{id}', 'AdminController@do_agent_ban');
        Route::get('admin/agent/do_agent_active/{id}', 'AdminController@do_agent_active');


        Route::get('admin/deposit', 'AdminController@show_deposit');
        Route::get('admin/allow_deposit/{id}', 'AdminController@allow_deposit');

        Route::get('admin/withdraw', 'AdminController@show_withdraw');
        Route::get('admin/allow_withdraw/{id}', 'AdminController@allow_withdraw');

        Route::get('admin/website', 'AdminController@website');

        Route::get('admin/show_changepassword', 'AdminController@show_changepassword');
        Route::post('admin/do_changepassword', 'AdminController@do_changepassword');

        Route::get('admin/logout', 'AgentController@logout');
    });

});

