<?php

namespace App\Http\Controllers;

use App\BuyerPicbets;
use App\BuyerTdbets;
use App\Results;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\AdminPicbets;
use App\AdminTdbets;
use App\payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{


    public function index(){

        $total_agent = User::where('role','agent')->count();

        $ban_agent = User::where('role','agent')
            ->where('ban','0')->count();

        $ticketSold_pic = BuyerPicbets::all()->count();
        $ticketSold_tD = BuyerTdbets::all()->count();
        $ticketSold = $ticketSold_pic + $ticketSold_tD;

        $ticketWon = Results::all()->count();

        $tD_active = AdminTdbets::where('status','active')->count();

        $pic_active = AdminPicbets::where('status','active')->count();

        $tD_draws = AdminTdbets::all()->count();

        $pic_draws = AdminPicbets::all()->count();

        $deposit_pending = payment::where('status','0')
            ->where('role','0')->count();

        $withdraw_pending = payment::where('status','0')
            ->where('role','1')->count();

        $total_deposit_datas = payment::where('role','0')->get();

        $total_deposit = 0;
        foreach ($total_deposit_datas as $total_deposit_data){
            $total_deposit += $total_deposit_data->payment;
        }

        $total_withdraw_datas = payment::where('role','1')->get();

        $total_withdraw = 0;
        foreach ($total_withdraw_datas as $total_withdraw_data){
            $total_withdraw += $total_withdraw_data->payment;
        }

        $data = array(
            'total_agent' => $total_agent,
            'ban_agent' => $ban_agent,
            'ticketSold' => $ticketSold,
            'ticketWon' => $ticketWon,
            'tD_active' => $tD_active,
            'pic_active' => $pic_active,
            'tD_draws' => $tD_draws,
            'deposit_pending' => $deposit_pending,
            'pic_draws' => $pic_draws,
            'withdraw_pending' => $withdraw_pending,
            'total_deposit' => $total_deposit,
            'total_withdraw' => $total_withdraw
        );

        return view('Admin.Dashboard.dashboard',['data'=>$data]);
    }

    public function login(){
        return view('Admin.Login.login');
    }
    /**
     * @param Request $request
     */
    public function postLogin(Request $request){

        $userdata = array(
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
            'role'  => 'admin',
            'ban' => '1'
        );

        if (Auth::attempt($userdata)) {
            return redirect('admin/index');
        }
        else{
            return redirect('admin')->with('status','try');
        }
    }


    public function show_pic_play(){

        $datas = AdminPicbets::all();

        foreach ($datas as $data){

            $status = $data->status;

            if($status == 'pending' || $status == 'active') {
                $last_sdate = $data->start_date;
                $last_edate = $data->end_date;

                AdminPicbets::where('id', $data->id)->update([
                    'status' => $this->game_status($last_sdate, $last_edate)
                ]);
            }
        }

        return view('Admin.Games.show_pic_play', ['datas' => $datas]);

    }

    public function save_new_draw(Request $request){

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $AdminPicbets = new AdminPicbets();

        $AdminPicbets->start_date = $request->input('start_date');
        $AdminPicbets->end_date = $request->input('end_date');
        $AdminPicbets->ticketCost = $request->input('cost');
        $AdminPicbets->totalSold = 0;
        $AdminPicbets->boardA = $request->input('board_a');
        $AdminPicbets->boardB = $request->input('board_b');
        $AdminPicbets->boardC = $request->input('board_c');
        $AdminPicbets->boardD = $request->input('board_d');
        $AdminPicbets->boardE = $request->input('board_e');
        $AdminPicbets->prizeOne = $request->input('prize_one');
        $AdminPicbets->prizeTwo = $request->input('prize_two');
        $AdminPicbets->prizeThr = $request->input('prize_thr');
        $AdminPicbets->prizeFor = $request->input('prize_for');
        $AdminPicbets->winningNum = '';

        $AdminPicbets->status = $this->game_status($start_date,$end_date);

        $AdminPicbets->save();

        return redirect('admin/games/show_pic_play')->withSavedraw('success');
    }

    public function show_edit_draw(Request $request,$id){

        $Draw = AdminPicbets::where('id', $id)->first();
        return view('Admin.Games.edit_pic_play', ['Draw'=>$Draw]);

    }

    public function do_edit_draw(Request $request,$id){

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $ticketCost = $request->input('cost');
        $boardA = $request->input('board_a');
        $boardB = $request->input('board_b');
        $boardC = $request->input('board_c');
        $boardD = $request->input('board_d');
        $boardE = $request->input('board_e');
        $prizeOne = $request->input('prize_one');
        $prizeTwo = $request->input('prize_two');
        $prizeThr = $request->input('prize_thr');
        $prizeFor = $request->input('prize_for');
        $status = $this->game_status($start_date,$end_date);

        AdminPicbets::where('id',$id)->update([
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'ticketCost'=>$ticketCost,
            'boardA'=>$boardA,
            'boardB'=>$boardB,
            'boardC'=>$boardC,
            'boardD'=>$boardD,
            'boardE'=>$boardE,
            'prizeOne'=>$prizeOne,
            'prizeTwo'=>$prizeTwo,
            'prizeThr'=>$prizeThr,
            'prizeFor'=>$prizeFor,
            'status'=>$status
        ]);

//        Session::forget('declare'.$id);
        return redirect('admin/games/show_pic_play')->withSavedraw('success');
    }

    public function del_pic_draw($id){

        AdminPicbets::find($id)->delete();
        Session::forget('declare'.$id);

        return redirect('/admin/games/show_pic_play')->withDelagent('success');
    }

    public function show_analyse_pic_draw($id){

        $analyData = AdminPicbets::where('id',$id)->first();

        $analyNum = array($analyData->boardA,$analyData->boardB,$analyData->boardC,$analyData->boardD,$analyData->boardE);

        $WinningPrizeData[] = array();

        $betWinningPrizedata = new BetTimedata();

        for ($j = 0;$j<5;$j++){

            if($j == 0){
                $board = 'boardA';
            }elseif($j == 1){
                $board = 'boardB';
            }elseif($j == 2){
                $board = 'boardC';
            }elseif($j == 3){
                $board = 'boardD';
            }else{
                $board = 'boardE';
            }

            $space_betWinningPrize = BuyerPicbets::where($board,'')->where('drawId',$id)->sum('winningPrize');

            $part_betWinningPrize = BuyerPicbets::where($board,$analyNum[$j])->where('drawId',$id)->sum('winningPrize');

            if($analyNum[$j] == 0){
                $WinningPrizeData[$j] = $part_betWinningPrize - $space_betWinningPrize;
            }else{
                $WinningPrizeData[$j] = $part_betWinningPrize;
            }

            $betWinningPrizedata->$board = $WinningPrizeData[$j];

        }

        return view('Admin.Games.show_pic_analyse',['betWinningPrizedata' => $betWinningPrizedata,'DrawId' => $id,'analyData'=>$analyData]);

    }

    public function do_report_pic_draw(Request $request,$id){
        $selectnum = $request->input('selectnum');

        $analyData = AdminPicbets::where('id',$id)->first();

        if($selectnum == 'A'){
            $reportnum = $analyData->boardA;
            $board = 'boardA';
        }elseif ($selectnum == 'B'){
            $reportnum = $analyData->boardB;
            $board = 'boardB';
        }elseif ($selectnum == 'C'){
            $reportnum = $analyData->boardC;
            $board = 'boardC';
        }elseif ($selectnum == 'D'){
            $reportnum = $analyData->boardD;
            $board = 'boardD';
        }else{
            $reportnum = $analyData->boardE;
            $board = 'boardE';
        }

        $part_betWinningPrize = BuyerPicbets::where($board,$reportnum)->where('drawId',$id)->sum('winningPrize');
        $part_betTotalCost = BuyerPicbets::where($board,$reportnum)->where('drawId',$id)->sum('totalCost');

        if($reportnum == 0){
            $space_betWinningPrize = BuyerPicbets::where($board,'')->where('drawId',$id)->sum('winningPrize');
            $space_betTotalCost = BuyerPicbets::where($board,'')->where('drawId',$id)->sum('totalCost');
            $WinningPrizeData = $part_betWinningPrize - $space_betWinningPrize;
            $TotalCostData = $part_betTotalCost - $space_betTotalCost;
        }else{
            $WinningPrizeData = $part_betWinningPrize;
            $TotalCostData = $part_betTotalCost;
        }

        $data = array('winningPrize' => $WinningPrizeData,'totalCost' => $TotalCostData);
        echo json_encode($data);

    }

    public function do_pic_declare(Request $request,$id){

        $declareNum = $request->input('declare_pic');
        $selectnum = $request->input('declare_selectnum');

        $data = AdminPicbets::where('id',$id)->first();

        date_default_timezone_set("Asia/Kolkata");
        $now = date("d/m/Y H:i");

        AdminPicbets::where('id',$id)->update(['end_date'=>$now,'status' => 'expire','winningNum' => $declareNum]);

        if($selectnum == 'A'){
            $board = 0;
        }elseif ($selectnum == 'B'){
            $board = 1;
        }elseif ($selectnum == 'C'){
            $board = 2;
        }elseif ($selectnum == 'D'){
            $board = 3;
        }else{
            $board = 4;
        }

        $buyers = BuyerPicbets::where('drawId',$id)->get();

        foreach ($buyers as $buyer){

            $BuyNum = array($buyer->boardA,$buyer->boardB,$buyer->boardC,$buyer->boardD,$buyer->boardE);

            if ($BuyNum[$board] == $declareNum){

                $results = new Results();

                $results->winningPrize = $buyer->winningPrize;
                $results->ticketID = $buyer->ticketID;
                $results->buyerID = $buyer->buyerID;
                $results->drawID = $id;
                $results->type = '1';

                $results->save();

                $payment = payment::where('userid',$buyer->buyerID)->orderBy('created_at','desc')->first();

                $payid = $payment->id;

                $totalPayment = $payment->totalPayment + $buyer->winningPrize;

                payment::where('id',$payid)->update(['totalPayment'=>$totalPayment]);

            }
        }

        $doDeclare = 'declare'.$id;
        Session::put($doDeclare,'true');
        echo $data;

    }

    public function show_admin_manage(){

        $admins = User::where('role', 'admin')->get();

        return view('Admin.Admin.show_admin',['admins'=>$admins]);
    }

    public function show_agent_manage(){

        $users = User::where('role', 'agent')->get();

        return view('Admin.Agent.show_agent',['users'=>$users]);
    }


    public function show_tDlot(){

        $datas = AdminTdbets::all();

        foreach ($datas as $data){

            $status = $data->status;

            if($status == 'pending' || $status == 'active') {
                $last_sdate = $data->start_date;
                $last_edate = $data->end_date;

                AdminTdbets::where('id', $data->id)->update([
                    'status' => $this->game_status($last_sdate, $last_edate)
                ]);
            }
        }

        return view('Admin.Games.show_tDlot',['datas'=>$datas]);
    }

    public function show_tDlot_analyse($id){

        $TimeData[] = array();

        $betTimedata = new BetTimedata();

        for ($j = 0;$j<3;$j++){

            if($j == 0){
                $board = 'boardA';
            }elseif($j == 1){
                $board = 'boardB';
            }else{
                $board = 'boardC';
            }

            for($i=0;$i<10;$i++){
                $space_betTimes = BuyerTdbets::where($board,'')->where('drawId',$id)->sum('betTimes');
                $part_betTimes = BuyerTdbets::where($board,$i)->where('drawId',$id)->sum('betTimes');

                if($i == 0){                         
                        $TimeData[$i] = $part_betTimes - $space_betTimes;                   
                }else{
                    $TimeData[$i] = $part_betTimes;  
                }

            }

            $min[$j] = min($TimeData);

            $betTimedata->$board = $TimeData;

            $status = AdminTdbets::where('id',$id)->first()->tDboardA;

        }

        return view('Admin.Games.show_tDlot_analyse',['betTimedata' => $betTimedata,'DrawId' => $id,'min'=>$min,'status'=>$status]);
    }

    public function save_new_tD_draw(Request $request){

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $AdminTdbets = new AdminTdbets();

        $AdminTdbets->start_date = $request->input('start_date');
        $AdminTdbets->end_date = $request->input('end_date');
        $AdminTdbets->tDticketCost = $request->input('tD_bet_cost');
        $AdminTdbets->tDtotalSold = 0;
        $AdminTdbets->tDboardA = '';
        $AdminTdbets->tDboardB = '';
        $AdminTdbets->tDboardC = '';
        $AdminTdbets->tDprizeOne = $request->input('tD_bet_prize_one');
        $AdminTdbets->tDprizeTwo = $request->input('tD_bet_prize_two');
        $AdminTdbets->tDprizeThr = $request->input('tD_bet_prize_thr');

        $AdminTdbets->sDticketCost = $request->input('sD_bet_cost');
        $AdminTdbets->sDtotalSold = 0;
        $AdminTdbets->sDprizeOne = $request->input('sD_bet_prize_one');

        $AdminTdbets->fDticketCost = $request->input('fD_bet_cost');
        $AdminTdbets->fDtotalSold = 0;
        $AdminTdbets->fDprizeOne = $request->input('fD_bet_prize_one');

        $AdminTdbets->status = $this->game_status($start_date,$end_date);

        $AdminTdbets->save();

        return redirect('admin/games/show_tDlot')->withSavedraw('success');

    }

    public function show_edit_tD_draw($id){

        $Draw = AdminTdbets::where('id', $id)->first();
        return view('Admin.Games.edit_tDlot', ['Draw'=>$Draw]);
    }

    public function do_edit_tD_draw(Request $request,$id){

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tDticketCost = $request->input('tD_bet_cost');

        $tDprizeOne = $request->input('tD_bet_prize_one');
        $tDprizeTwo = $request->input('tD_bet_prize_two');
        $tDprizeThr = $request->input('tD_bet_prize_thr');

        $sDticketCost = $request->input('sD_bet_cost');
        $sDprizeOne = $request->input('sD_bet_prize_one');

        $fDticketCost = $request->input('fD_bet_cost');

        $fDprizeOne = $request->input('fD_bet_prize_one');

        $status = $this->game_status($start_date,$end_date);

        AdminTdbets::where('id',$id)->update([
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'tDticketCost'=>$tDticketCost,
            'sDticketCost'=>$sDticketCost,
            'fDticketCost'=>$fDticketCost,

            'tDprizeOne'=>$tDprizeOne,
            'tDprizeTwo'=>$tDprizeTwo,
            'tDprizeThr'=>$tDprizeThr,

            'sDprizeOne'=>$sDprizeOne,

            'fDprizeOne'=>$fDprizeOne,

            'status'=>$status
        ]);

        return redirect('admin/games/show_tDlot')->withSavedraw('success');

    }

    public function do_tD_report(Request $request,$id){
        $reportA = $request->input('reportA');
        $reportB = $request->input('reportB');
        $reportC = $request->input('reportC');

        $tD_first = BuyerTdbets::where('drawId',$id)->where('role','3')->where('boardA',$reportA)->where('boardB',$reportB)->where('boardC',$reportC)->sum('betTimes');

        $tD_second_data = BuyerTdbets::where('drawId',$id)->where('role','3')->where('boardB',$reportB)->where('boardC',$reportC)->sum('betTimes');

        $tD_second = $tD_second_data - $tD_first;
        $tD_third_data = BuyerTdbets::where('drawId',$id)->where('role','3')->where('boardC',$reportC)->sum('betTimes');

        $tD_third = $tD_third_data - $tD_second_data;
        $sD_datas = BuyerTdbets::where('drawId',$id)->where('role','2')->get();

        $sD_first = 0;
        if(count($sD_datas) == 0){
            $sD_first = 0;
        }else{
            foreach ($sD_datas as $sD_data) {
                $winNum = array($sD_data->boardA,$sD_data->boardB,$sD_data->boardC);

                $reportNum = array($reportA,$reportB,$reportC);

                $sD_rightNum = 0;
                for($i=0;$i<3;$i++){
                    if($winNum[$i]==$reportNum[$i]){
                        $sD_rightNum++;
                    }
                } 

                if($sD_rightNum == 2){
                    $sD_first += $sD_data->betTimes;
                }
            }
        }

        $fD_datas = BuyerTdbets::where('drawId',$id)->where('role','1')->get();
        $fD_first = 0;

        if(count($fD_datas) == 0){
            $fD_first = 0;
        }else{
            foreach ($fD_datas as $fD_data) {
                $winNum = array($fD_data->boardA,$fD_data->boardB,$fD_data->boardC);

                $reportNum = array($reportA,$reportB,$reportC);

                $fD_rightNum = 0;
                for($i=0;$i<3;$i++){
                    if($winNum[$i]==$reportNum[$i]){
                        $fD_rightNum++;
                    }
                } 

                if($fD_rightNum == 1){
                    $fD_first += $fD_data->betTimes;
                }
            }
        }

        $data = array('tDfirst' => $tD_first,'tDsecond' => $tD_second,'tDthird' =>$tD_third,'sDfirst' => $sD_first,'fDfirst' => $fD_first);
        echo json_encode($data);
    }

    public function back_tD_report(){
        return redirect('admin/games/show_tDlot');
    }

    public function del_tD_draw($id){
        AdminTdbets::find($id)->delete();

        return redirect('/admin/games/show_tDlot')->withDelagent('success');
    }

    public function do_tDlot_declare(Request $request,$id){
        $declareA = $request->input('declareA');
        $declareB = $request->input('declareB');
        $declareC = $request->input('declareC');

        date_default_timezone_set("Asia/Kolkata");
        $now = date("d/m/Y H:i");

        $winningData = AdminTdbets::where('id',$id)->first();

        if($winningData->end_date <= $now){

            AdminTdbets::where('id',$id)->update(['tDboardA'=>$declareA,'tDboardB'=>$declareB,'tDboardC'=>$declareC,'status' => 'expire']);

        }else{

            AdminTdbets::where('id',$id)->update(['tDboardA'=>$declareA,'tDboardB'=>$declareB,'tDboardC'=>$declareC,'end_date'=>$now,'status' => 'expire']);

        }

            $winningNum = array($declareA,$declareB,$declareC);

            $buyerNums = BuyerTdbets::where('drawId',$id)->get();

            foreach ($buyerNums as $buyerNum){
                $aname = $buyerNum->boardA;
                $bname = $buyerNum->boardB;
                $cname = $buyerNum->boardC;
                $role = $buyerNum->role;
                $times = $buyerNum->betTimes;
                $ticketid = $buyerNum->ticketID;

                $tDbetNum = 0;$totalPrize = 0;
                if ($aname == ''){
                    $aname = '';
                }
                if ($bname == ''){
                    $bname = '';
                }
                if ($cname == ''){
                    $cname = '';
                }

                $inputedNum = array($aname,$bname,$cname);

                if($role == 2){
                    $totalPrize = $winningData->sDprizeOne;
                }
                if($role == 1){
                    $totalPrize = $winningData->fDprizeOne;
                }

                $rightNum = 0;
                for ($i=0;$i<3;$i++){
                    if($inputedNum[$i] == $winningNum[$i]){
                        $rightNum += 1;
                        if($role == 3){
                            $tDbetNum ++;
                        }
                    }
                }

                if($tDbetNum == 3){
                    $totalPrize = $winningData->tDprizeOne;
                }
                if($tDbetNum == 2){
                    if(($inputedNum[1] == $winningNum[1]) && ($inputedNum[2] == $winningNum[2])){
                        $totalPrize = $winningData->tDprizeTwo;
                    }else{
                        $rightNum = 100;
                    }
                }
                if($tDbetNum == 1){
                    if(($inputedNum[2] == $winningNum[2])){
                        $totalPrize = $winningData->tDprizeThr;
                    }else{
                        $rightNum = 100;
                    }
                }
                if($rightNum == 0){
                    $rightNum = 100;
                }

                if (($role == $rightNum) || ($tDbetNum == $rightNum)){

                    $results = new Results();

                    $agentid = $buyerNum->buyerID;

                    $results->winningPrize = $totalPrize * $times;
                    $results->ticketID = $ticketid;
                    $results->buyerID = $agentid;
                    $results->drawID = $id;
                    $results->type = '0';

                    $results->save();

                    $payment = payment::where('userid',$agentid)->orderBy('created_at','desc')->first();

                    $payid = $payment->id;

                    $totalPayment = $payment->totalPayment + $totalPrize * $times;

                    payment::where('id',$payid)->update(['totalPayment'=>$totalPayment]);

                }
            }

        $data = AdminTdbets::where('id',$id)->first();
        echo $data;
    }

    public function show_tDlot_winners($id){

        $datas = Results::where('drawID',$id)->where('type','0')->get();

        foreach ($datas as $data){

            $buyerTdbets = BuyerTdbets::where('ticketID',$data->ticketID)->first();

            $data->betType = '';
            $data->boardA = '';
            $data->boardB = '';
            $data->boardC = '';

            if (!is_null($buyerTdbets)) {
                $data->betType = $buyerTdbets->betType;
                $data->boardA = $buyerTdbets->boardA;
                $data->boardB = $buyerTdbets->boardB;
                $data->boardC = $buyerTdbets->boardC;
            }

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }
        return view('Admin.Games.show_tDlot_winners',['drawID'=>$id,'datas'=>$datas]);
    }

    public function show_pic_winners($id){
        $datas = Results::where('drawID',$id)->where('type','1')->get();

        foreach ($datas as $data){

            $buyerPicbets = BuyerPicbets::where('ticketID',$data->ticketID)->first();

            $data->betType = '';
            $data->boardA = '';
            $data->boardB = '';
            $data->boardC = '';
            $data->boardD = '';
            $data->boardE = '';

            if (!is_null($buyerPicbets)) {
                $data->betType = $buyerPicbets->betType;
                $data->boardA = $buyerPicbets->boardA;
                $data->boardB = $buyerPicbets->boardB;
                $data->boardC = $buyerPicbets->boardC;
                $data->boardD = $buyerPicbets->boardD;
                $data->boardE = $buyerPicbets->boardE;
            }

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }
        return view('Admin.Games.show_pic_winners',['drawID'=>$id,'datas'=>$datas]);
    }

    public function show_tDlot_soldlist($id){

        $datas = BuyerTdbets::where('drawID',$id)->get();

        foreach ($datas as $data){

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }
        return view('Admin.Games.show_tDlot_soldlist',['drawID'=>$id,'datas'=>$datas]);
    }

    public function show_pic_soldlist($id){

        $datas = BuyerPicbets::where('drawID',$id)->get();

        foreach ($datas as $data){

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }
        return view('Admin.Games.show_pic_soldlist',['drawID'=>$id,'datas'=>$datas]);
    }

    public function getexcel_sold($id,$type){

        if ($type == 0){
            $datas = BuyerTdbets::where('drawID',$id)->get();
        }else{
            $datas = BuyerPicbets::where('drawID',$id)->get();
        }


        foreach ($datas as $data){

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }

        $Info = array();$i = 0;
        array_push($Info, ['id','Username','BetType','WinningNumber','TotalCost','TicketID']);
        foreach ($datas as $data) {
            $i++;
            if ($type == 0){
                $winningNumber = $data->boardA. " " .$data->boardB. " ". $data->boardC;
            }else{
                $winningNumber = $data->boardA. " " .$data->boardB. " ". $data->boardC. " " .$data->boardD. " " .$data->boardE;
            }

            $totalCost = $data->totalCost. "  ₹";
            array_push($Info,[$i,$data->username,$data->betType,$winningNumber,$totalCost,$data->ticketID]);
        }
        Excel::create('Solds', function($excel) use ($Info) {

            $excel->setTitle('Solds');
            $excel->setCreator('milad')->setCompany('Test');
            $excel->setDescription('Solds file');
            $excel->sheet('sheet1', function($sheet) use ($Info) {
//                $sheet->setRightToLeft(true);
                $sheet->fromArray($Info, null, 'A1', false, false);
            });

        })->download('xls');
    }

    public function getexcel_winner($id,$type){

        $datas = Results::where('drawID',$id)->where('type',$type)->get();

        foreach ($datas as $data){

            if($type == 0){
                $buyerbets = BuyerTdbets::where('ticketID',$data->ticketID)->first();
            }else{
                $buyerbets = BuyerPicbets::where('ticketID',$data->ticketID)->first();
            }

            $data->betType = '';
            $data->boardA = '';
            $data->boardB = '';
            $data->boardC = '';
            $data->boardD = '';
            $data->boardE = '';

            if (!is_null($buyerbets)) {
                $data->betType = $buyerbets->betType;
                $data->boardA = $buyerbets->boardA;
                $data->boardB = $buyerbets->boardB;
                $data->boardC = $buyerbets->boardC;
                if($type == 1){
                    $data->boardD = $buyerbets->boardD;
                    $data->boardE = $buyerbets->boardE;
                }
            }

            $user = User::find($data->buyerID);

            $data->username = '';

            if (!is_null($user)) {
                $data->username = User::find($data->buyerID)->username;
            }

        }

        $Info = array();$i = 0;
        array_push($Info, ['id','Username','BetType','WinningNumber','WinningPrize','TicketID']);
        foreach ($datas as $data) {
            $i++;
            if ($type == 0){
                $winningNumber = $data->boardA. " " .$data->boardB. " ". $data->boardC;
            }else{
                $winningNumber = $data->boardA. " " .$data->boardB. " ". $data->boardC. " ". $data->boardD. " " .$data->boardE;
            }

            $winningPrize = $data->winningPrize. "  ₹";
            array_push($Info,[$i,$data->username,$data->betType,$winningNumber,$winningPrize,$data->ticketID]);
        }
        Excel::create('Winner', function($excel) use ($Info) {

            $excel->setTitle('Winner');
            $excel->setCreator('milad')->setCompany('Test');
            $excel->setDescription('Winner file');
            $excel->sheet('sheet1', function($sheet) use ($Info) {
//                $sheet->setRightToLeft(true);
                $sheet->fromArray($Info, null, 'A1', false, false);
            });

        })->download('xls');
    }

    public function new_admin(Request $request){

        $userid = $request->input('userid');
        $password = $request->input('password');
        $mobile = $request->input('mobile');
        $check_dash = $request->input('check_dash');
        $check_game = $request->input('check_game');
        $check_agent = $request->input('check_agent');
        $check_deposit = $request->input('check_deposit');
        $check_withdraw = $request->input('check_withdraw');
        $check_admin = $request->input('check_admin');

        $users = new User();

        $users->username = $userid;
        $users->firstname = 'admin';
        $users->lastname = 'admin';
        $users->fullname = 'admin admin';
        $users->email = 'admin@admin.com';
        $users->phonenumber =$mobile;
        $users->password = bcrypt($password);

        $users->role = 'admin';
        $users->ban = '1';
        $users->save();

        return redirect('admin/admin/show_admin_manage')->withSaveagent('success');

    }

    public function new_agent(Request $request){

        $userid = $request->input('userid');
        $password = $request->input('password');
        $mobile = $request->input('mobile');

        $users = new User();

        $users->username = $userid;
        $users->firstname = 'agent';
        $users->lastname = 'agent';
        $users->fullname = 'agent agent';
        $users->email = 'agent@agent.com';
        $users->phonenumber =$mobile;
        $users->password = bcrypt($password);

        $users->role = 'agent';
        $users->ban = '1';
        $users->save();

        return redirect('admin/agent/show_agent_manage')->withSaveagent('success');

    }

    public function show_edit_admin($id){

        $admins = User::where('id',$id)->get();
        return view('Admin.Admin.show_edit_admin',['admins'=>$admins]);
    }

    public function show_edit_agent($id){

        $users = User::where('id',$id)->get();
        return view('Admin.Agent.show_edit_agent',['users'=>$users]);
    }

    public function do_edit_admin(Request $request,$id){

        $username = $request->input('userid');
        $phone = $request->input('mobile');
        $old_pass = ($request->input('old_pass'));

        if($old_pass != ''){
            $hashedPassword = User::where('id',$id)->first()->password;

            if (Hash::check($old_pass, $hashedPassword)) {
                $newpassword = bcrypt($request->input('new_pass'));
                User::where('id',$id)->update(['password'=>$newpassword]);
            }else{
                return redirect('/admin/admin/show_admin_manage')->withProfilepasserror('error');
            }
        }

        User::where('id',$id)->update([
            'username'=>$username,
            'phonenumber'=>$phone
        ]);

        return redirect('/admin/admin/show_admin_manage')->withSaveagent('success');
    }

    public function do_edit_agent(Request $request,$id){

        $username = $request->input('userid');
        $phone = $request->input('mobile');
        $old_pass = ($request->input('old_pass'));

        if($old_pass != ''){
            $hashedPassword = User::where('id',$id)->first()->password;

            if (Hash::check($old_pass, $hashedPassword)){
                $newpassword = bcrypt($request->input('new_pass'));
                User::where('id',$id)->update(['password'=>$newpassword]);
            }else{
                return redirect('/admin/agent/show_agent_manage')->withProfilepasserror('error');
            }
        }

        User::where('id',$id)->update([
            'username'=>$username,
            'phonenumber'=>$phone
        ]);

        return redirect('/admin/agent/show_agent_manage')->withSaveagent('success');
    }

    public function do_del_admin($id){

        User::find($id)->delete();

        return redirect('/admin/admin/show_admin_manage')->withDelagent('success');

    }

    public function do_del_agent($id){

        User::find($id)->delete();

        return redirect('/admin/agent/show_agent_manage')->withDelagent('success');

    }

    public function do_admin_ban($id){
        User::where('id',$id)->update([
            'ban'=>'0',
        ]);
        return redirect('/admin/admin/show_admin_manage')->withSuccess('success');
    }

    public function do_admin_active($id){
        User::where('id',$id)->update([
            'ban'=>'1',
        ]);
        return redirect('/admin/admin/show_admin_manage')->withSuccess('success');
    }

    public function do_agent_ban($id){
        User::where('id',$id)->update([
            'ban'=>'0',
        ]);
        return redirect('/admin/agent/show_agent_manage')->withSuccess('success');
    }

    public function do_agent_active($id){
        User::where('id',$id)->update([
            'ban'=>'1',
        ]);
        return redirect('/admin/agent/show_agent_manage')->withSuccess('success');
    }

    public function show_deposit(){

        $datas = payment::where('role','=' ,'0')->get();

        foreach ($datas as $data) {

            $user = User::find($data->userid);

            $data->username = '';
            $data->phone = '';

            if (!is_null($user)) {
                $data->username = User::find($data->userid)->username;
                $data->phone = User::find($data->userid)->phonenumber;
            }

        }

        return view('Admin.Deposit.deposit',['datas'=>$datas]);
    }

    public function allow_deposit($id){

        payment::where('id',$id)->update(['status'=>'1']);

        return redirect('admin/deposit')->withAllowdeposit('success');
    }

    public function show_withdraw(){

        $datas = payment::where('role','=' ,'1')->get();

        foreach ($datas as $data) {

            $user = User::find($data->userid);

            $data->username = '';
            $data->phone = '';

            if (!is_null($user)) {
                $data->username = User::find($data->userid)->username;
                $data->phone = User::find($data->userid)->phonenumber;
            }

        }

        return view('Admin.Withdraw.withdraw',['datas'=>$datas]);
    }

    public function allow_withdraw($id){
        payment::where('id',$id)->update(['status'=>'1']);

        return redirect('admin/withdraw')->withAllowdeposit('success');
    }

    public function show_changepassword(){
        return view('Admin.Login.changepassword');
    }

    public function do_changepassword(Request $request){

        $agentid = Auth::user()->id;
        $password = ($request->input('cu_pass'));

        $hashedPassword = Auth::user()->password;

        if (Hash::check($password, $hashedPassword)) {
            $newpassword = bcrypt($request->input('new_pass'));
            User::where('id',$agentid)->update(['password'=>$newpassword]);
            return redirect('login');
        }else{
            return redirect('/admin/show_changepassword')->withProfilepasserror('error');
        }
    }

    public function website(){
        return view('Admin.Website.website');
    }

    public function game_status($start_date,$end_date){

        date_default_timezone_set("Asia/Kolkata");

        $start_date = str_replace("/", "-", $start_date);
        $end_date = str_replace("/", "-", $end_date);

        $start_date   = strtotime(date($start_date));
        $end_date =  strtotime(date($end_date));

        $now = strtotime(date("d-m-Y H:i"));

        if($now < $start_date){
            return 'pending';
        }
        if(($start_date <= $now) && ($now <= $end_date)){
            return 'active';
        }
        if ($end_date < $now){
            return 'expire';
        }

    }

}
 class BetTimedata {
    function BetTimedata() {
        $this->boardA = "";
        $this->boardB = "";
        $this->boardC = "";
        $this->boardD = "";
        $this->boardE = "";
    }
}