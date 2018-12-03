<?php

namespace App\Http\Controllers;

use App\AdminPicbets;
use App\AdminTdbets;
use App\BuyerTdbets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\payment;
use App\User;
use App\Results;
use Illuminate\Support\Facades\Hash;
use App\BuyerPicbets;
use Session;

class AgentController extends Controller
{    


    public function __construct()
    {


    }

    public function dashboard(){

        $id = Auth::user()->id;
        $Sold_tDs = BuyerTdbets::where('buyerID',$id)->select('totalCost')->get();

        $tDSold = 0;
        foreach ($Sold_tDs as $Sold_tD){
            $tDSold += $Sold_tD->totalCost;
        }


        $Sold_pics = BuyerPicbets::where('buyerID',$id)->select('totalCost')->get();

        $picSold = 0;
        foreach ($Sold_pics as $Sold_pic){
            $picSold += $Sold_pic->totalCost;
        }

        $totalDeposit = 0;
        $deposit_datas = payment::where('userid',$id)
            ->where('role','0')
            ->select('payment')->get();

        foreach ($deposit_datas as $deposit_data){
            $totalDeposit += $deposit_data->payment;
        }

        $totalWithdraw = 0;
        $withdraw_datas = payment::where('userid',$id)
            ->where('role','1')
            ->select('payment')->get();

        foreach ($withdraw_datas as $withdraw_data){
            $totalWithdraw += $withdraw_data->payment;
        }

        $pendingDeposit = 0;
        $pendingDeposit = payment::where('userid',$id)
            ->where('role','0')
            ->where('status','0')->count();

        $pendingWithdraw = 0;
        $pendingWithdraw = payment::where('userid',$id)
            ->where('role','1')
            ->where('status','0')->count();

        $totalWon = 0;
        $Wons_data = Results::where('buyerID',$id)->get();

        if ($Wons_data == ''){
            $totalWon = 0;
        }

        foreach ($Wons_data as $Won_data){
            $totalWon += $Won_data->winningPrize;
        }

        $balance = 0;
        $id = Auth::user()->id;
        $totalPayment = payment::where('userid',$id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $data = array(
            'tDSold' => $tDSold,
            'picSold' => $picSold,
            'totalDeposit' => $totalDeposit,
            'totalWithdraw' => $totalWithdraw,
            'pendingDeposit' => $pendingDeposit,
            'pendingWithdraw' => $pendingWithdraw,
            'totalWon' => $totalWon
        );

        return view('Agent.Dashboard.dashboard', ['data'=>$data]);
    }
    public function show_tDlot(){

        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);
        Session::put('refresh_state', "no");

        $games_tD = AdminTdbets::where('status', 'pending')
            ->orwhere('status', 'active')->get();
        return view('Agent.Games.show_tDlot',['games_tD'=>$games_tD]);

    }

    public function do_tDlot($id){

        $buyerid = Auth::user()->id;

        $totalPayment = payment::where('userid',$buyerid)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $NowGames= AdminTdbets::where('id', $id)->get();
        $datas = BuyerTdbets::where('drawId',$id)->where('buyerID',$buyerid)->get();
        return view('Agent.Games.do_tDlot',['NowGames'=>$NowGames,'datas'=>$datas]);

    }

    public function auto_tDlot_refresh($id){
        $data = AdminTdbets::where('id',$id)->first();

        date_default_timezone_set("Asia/Kolkata");
        $now = date("d/m/Y H:i");

        if ($data->end_date == $now && Session::get('refresh_state') == "no"){
            Session::put('refresh_state', 'yes');
            echo "1";
        }else{
            echo $data->end_date;echo $now;
        }
    }

    public function buy_tdbet(Request $request,$id){

        $aname = $request->input('aname');
        $bname = $request->input('bname');
        $cname = $request->input('cname');
        $times = $request->input('sname');
        $role = $request->input('role');
        $total_cost = $request->input('totalCost');

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


        $agentid = Auth::user()->id;
        $has_payment = payment::where('userid', $agentid)->first();

        if($has_payment == ''){
            return redirect('agent/games/do_tDlot/'.$id)->withNotdeposit('success');
        }else{
            $approve_payment = payment::where('userid', $agentid)->where('status','1')->orderby('created_at','desc')->first();

            if($approve_payment == ''){
                return redirect('agent/games/do_tDlot/'.$id)->withPendingdeposit('success');
            }else{
                $left_payment = $approve_payment->totalPayment;
                if ($total_cost > $left_payment){
                    return redirect('agent/games/do_tDlot/'.$id)->withExceeddeposit('success');
                }else{
                    payment::where('userid',$agentid)->update(['totalPayment'=>$left_payment-$total_cost]);
                    Session::put('balance', $left_payment-$total_cost);
                }
            }
        }

        $tickets = BuyerTdbets::select('ticketID')->get()->toArray();

        if (count($tickets) == 0){
            $tmp =mt_rand(100000,999999);
            $ticketid = $role.'D'.$id.$tmp;
        }else{

            while(true) {

                $totalnum = 0;$partnum = 0;
                $tmp =mt_rand(10000,99999);
                $randNum = $role.'D'.$id.$tmp;

                for ($i=0;$i<count($tickets);$i++) {
                    $totalnum ++;
                    $t_id = $tickets[$i];
                    if ($t_id == $randNum) {
                        break;
                    }else{
                        $partnum ++;
                        $ticketid = $randNum;
                        continue;
                    }
                }
                if ($totalnum == $partnum){
                    break;
                }
            }
        }


        $buyerTdbets = new BuyerTdbets();

        $buyerTdbets->betType = $role;
        $buyerTdbets->betTimes = $times;
        $buyerTdbets->totalCost = $total_cost;
        $buyerTdbets->boardA = $aname;
        $buyerTdbets->boardB = $bname;
        $buyerTdbets->boardC = $cname;
        $buyerTdbets->ticketID = $ticketid;
        $buyerTdbets->role = $role;
        $buyerTdbets->drawId = $id;
        $buyerTdbets->buyerId =  Auth::user()->id;

        $buyerTdbets->save();

        return redirect('agent/games/do_tDlot/'.$id)->withBuypic('success');
        
    }

    public function show_pic_play(){

        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);
        $games_pic = AdminPicbets::where('status', 'pending')
            ->orwhere('status', 'active')->get();
        return view('Agent.Games.show_pic_play',['games_pic'=>$games_pic]);
    }

    public function do_pic_play($id){

        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $NowGames= AdminPicbets::where('id', $id)->get();
        $datas = BuyerPicbets::where('drawId', $id)->get();
        return view('Agent.Games.do_pic_play',['NowGames'=>$NowGames,'datas'=>$datas]);
    }

    public function buy_pic_play(Request $request,$id){

        $betNum = 5;
        $aname = $request->input('bet_aname');
        $bname = $request->input('bet_bname');
        $cname = $request->input('bet_cname');

        $dname = $request->input('bet_dname');
        $ename = $request->input('bet_ename');
        $times = $request->input('sname');
        $totalPrize = $request->input('pic_total_prize');

        $total_cost = $request->input('total_cost');

        if($aname == ''){
            $aname = '';
            $betNum--;
        }
        if($bname == ''){
            $bname = '';
            $betNum--;
        }
        if($cname == ''){
            $cname = '';
            $betNum--;
        }
        if($dname == ''){
            $dname = '';
            $betNum--;
        }
        if($ename == ''){
            $ename = '';
            $betNum--;
        }

        $agentid = Auth::user()->id;
        $has_payment = payment::where('userid', $agentid)->first();

        if($has_payment == ''){
            return redirect('agent/games/do_pic_play/'.$id)->withNotdeposit('success');
        }else{
            $approve_payment = payment::where('userid', $agentid)->where('status','1')->first();

            if($approve_payment == ''){
                return redirect('agent/games/do_pic_play/'.$id)->withPendingdeposit('success');
            }else{
                $left_payment = $approve_payment->totalPayment;
                if ($total_cost > $left_payment){
                    return redirect('agent/games/do_pic_play/'.$id)->withExceeddeposit('success');
                }else{
                    payment::where('userid',$agentid)->update(['totalPayment'=>$left_payment-$total_cost]);
                    Session::put('balance', $left_payment-$total_cost);
                }
            }
        }

        $tickets = BuyerPicbets::select('ticketID')->get()->toArray();

        if (count($tickets) == 0){
            $tmp =mt_rand(100000,999999);
            $ticketid = 'P'.$id.$tmp;
        }else{

            while(true) {

                $totalnum = 0;$partnum = 0;
                $tmp =mt_rand(10000,99999);
                $randNum = 'P'.$id.$tmp;
                for ($i=0;$i<count($tickets);$i++) {
                    $totalnum ++;
                    $t_id = $tickets[$i];
                    if ($t_id == $randNum) {
                        break;
                    }else{
                        $partnum ++;
                        $ticketid = $randNum;
                        continue;
                    }
                }
                if ($totalnum == $partnum){
                    break;
                }
            }
        }

        $buyerPicbets = new BuyerPicbets();

        $buyerPicbets->betType = $betNum;
        $buyerPicbets->betTimes = $times;
        $buyerPicbets->totalCost = $total_cost;
        $buyerPicbets->boardA = $aname;
        $buyerPicbets->boardB = $bname;
        $buyerPicbets->boardC = $cname;
        $buyerPicbets->boardD = $dname;
        $buyerPicbets->winningPrize = $totalPrize;
        $buyerPicbets->boardE = $ename;
        $buyerPicbets->ticketID = $ticketid;
        $buyerPicbets->buyerId =  Auth::user()->id;
        $buyerPicbets->drawId =  $id;

        $buyerPicbets->save();

        return redirect('agent/games/do_pic_play/'.$id)->withBuypic('success');

    }

    public function auto_pic_refresh($id){

        $data = AdminPicbets::where('id',$id)->first();

        date_default_timezone_set("Asia/Kolkata");
        $now = date("d/m/Y H:i");

        if ($data->end_date < $now || Session::has('declare'.$id)){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function winnerlist($id){

        $datas = Results::where('buyerID',Auth::user()->id)->where('type',$id)->get();

        foreach ($datas as $data){

            if ($id == 0) {
                $buyerbets = BuyerTdbets::where('ticketID', $data->ticketID)->first();
            }else{
                $buyerbets = BuyerPicbets::where('ticketID', $data->ticketID)->first();
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
                if($id == '1'){
                    $data->boardD = $buyerbets->boardD;
                    $data->boardE = $buyerbets->boardE;
                }
            }

        }
        return view('Agent.Games.winner',['datas'=>$datas,'type'=>$id]);
    }

    public function buylist($id){
        $buyerid = Auth::user()->id;

        $totalPayment = payment::where('userid',$buyerid)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        if($id == 0) {
            $datas = BuyerTdbets::where('buyerID', $buyerid)->get();
        }else{
            $datas = BuyerPicbets::where('buyerID', $buyerid)->get();
        }
        return view('Agent.Games.buylist',['datas'=>$datas,'type'=>$id]);
    }

    public function picdetail($id){

        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $nowgame = AdminPicbets::where('id',$id)->first();
        return view('Agent.Games.pic_detail',['nowgame'=>$nowgame]);
    }

    public function tDdetail($id){
        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $nowgame = AdminTdbets::where('id',$id)->first();
        return view('Agent.Games.tD_detail',['nowgame'=>$nowgame]);
    }

    public function deposit(){
        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $datas = payment::where('userid',Auth::user()->id)->where('role','0')->get();

        return view('Agent.Deposit.deposit',['datas'=>$datas]);
    }

    public function do_deposit(Request $request){
        $deposit = $request->input('deposit');
        $agentid = Auth::user()->id;

        $data = payment::where('userid',$agentid)->first();

        $totalPayment = 0;
        if ($data == null){
            $totalPayment = $deposit;
        }else {
            $payment = payment::where('userid', $agentid)
                ->orderBy('created_at','desc')->first()->totalPayment;
            $totalPayment = $payment + $deposit;
        }

        $payment = new payment();
        $payment->payment = $deposit;
        $payment->userid = $agentid;
        $payment->role = '0';
        $payment->status = '0';
        $payment->totalPayment = $totalPayment;
        $payment->save();

        return redirect('agent/deposit')->withDeposit('success');
    }

    public function withdraw(){
        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        $datas = payment::where('userid',Auth::user()->id)->where('role','1')->get();
        return view('Agent.Withdraw.withdraw',['datas'=>$datas]);
    }

    public function do_withdraw(Request $request){
        $withdraw = $request->input('withdraw');
        $agentid = Auth::user()->id;

        $data = payment::where('userid',$agentid)->first();

        if (count($data) == 0){
            return redirect('agent/withdraw')->withWithdrawerror('error');
        }else {
            $totalPayment = payment::where('userid', $agentid)
                ->orderBy('created_at','desc')->first()->totalPayment;
        }

        $payment = new payment();
        $payment->payment = $withdraw;
        $payment->userid = $agentid;
        $payment->role = '1';
        $payment->status = '0';
        $payment->totalPayment = $totalPayment - $withdraw;
        $payment->save();

        return redirect('agent/withdraw')->withWithdrawsuccess('success');
    }

    public function profile(){
        $totalPayment = payment::where('userid',Auth::user()->id)->orderby('created_at','desc')->first();

        $balance = ($totalPayment == '') ? 0 : $totalPayment->totalPayment;

        Session::put('balance', $balance);

        return view('Agent.Profile.profile');
    }

    public function save_profile(Request $request){

        $agentid = Auth::user()->id;

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $password = ($request->input('cu_pass'));

        if($password != ''){
            $hashedPassword = Auth::user()->password;

            if (Hash::check($password, $hashedPassword)) {
                $newpassword = bcrypt($request->input('new_pass'));
                User::where('id',$agentid)->update(['password'=>$newpassword]);
            }else{
                return redirect('/agent/profile')->withProfilepasserror('error');
            }
        }

        User::where('id',$agentid)->update([
            'firstname'=>$firstname,
            'email'=>$email,
            'lastname'=>$lastname,
            'username'=>$username,
            'phonenumber'=>$phone
        ]);

        return redirect('/agent/profile')->withProfilesuccess('success');
    }

    public function show_changepassword(){
        return view('Agent.Profile.changepassword');
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
            return redirect('/agent/show_changepassword')->withProfilepasserror('error');
        }
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return redirect('login');
    }

    public function users(){

        $user = User::all();

        echo json_encode($user);

    }

}
