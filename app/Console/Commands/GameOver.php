<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AdminTdbets;
use App\BuyerTdbets;
use App\Results;
use App\payment;

class GameOver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gameover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

//        date_default_timezone_set("Asia/Kolkata");
//        $now = strtotime(date("d/m/Y G:i"));

//        $nowDraws = AdminTdbets::where('status','active')->orwhere('status','pending')->get();
//
//        foreach ($nowDraws as $nowDraw){
//
//            $end_date = strtotime($nowDraw->end_date);
//
//            if ($end_date == $now){
//
//                $drawId = $nowDraw->id;
//
//                $winningData = AdminTdbets::where('id',$drawId)->first();
//
//                $winningNum = array($winningData->tDboardA,$winningData->tDboardB,$winningData->tDboardC);
//
//                $buyerNums = BuyerTdbets::where('drawId',$drawId)->get();
//
//                foreach ($buyerNums as $buyerNum){
//                    $aname = $buyerNum->boardA;
//                    $bname = $buyerNum->boardB;
//                    $cname = $buyerNum->boardC;
//                    $role = $buyerNum->role;
//                    $times = $buyerNum->betTimes;
//                    $ticketid = $buyerNum->ticketID;
//
//                    $tDbetNum = 0;$totalPrize = 0;
//                    if ($aname == ''){
//                        $aname = '';
//                    }
//                    if ($bname == ''){
//                        $bname = '';
//                    }
//                    if ($cname == ''){
//                        $cname = '';
//                    }
//
//                    $inputedNum = array($aname,$bname,$cname);
//
//                    if($role == 2){
//                        $totalPrize = $winningData->sDprizeOne;
//                    }
//                    if($role == 1){
//                        $totalPrize = $winningData->fDprizeOne;
//                    }
//
//                    $rightNum = 0;
//                    for ($i=0;$i<3;$i++){
//                        if($inputedNum[$i] == $winningNum[$i]){
//                            $rightNum += 1;
//                            if($role == 3){
//                                $tDbetNum ++;
//                            }
//                        }
//                    }
//
//                    if($tDbetNum == 3){
//                        $totalPrize = $winningData->tDprizeOne;
//                    }
//                    if($tDbetNum == 2){
//                        if(($inputedNum[1] == $winningNum[1]) && ($inputedNum[2] == $winningNum[2])){
//                            $totalPrize = $winningData->tDprizeTwo;
//                        }else{
//                            $rightNum = 100;
//                        }
//                    }
//                    if($tDbetNum == 1){
//                        if(($inputedNum[2] == $winningNum[2])){
//                            $totalPrize = $winningData->tDprizeThr;
//                        }else{
//                            $rightNum = 100;
//                        }
//                    }
//                    if($rightNum == 0){
//                        $rightNum = 100;
//                    }
//
//                    if (($role == $rightNum) || ($tDbetNum == $rightNum)){
//
//                        $results = new Results();
//
//                        $agentid = $buyerNum->buyerID;
//
//                        $results->winningPrize = $totalPrize * $times;
//                        $results->ticketID = $ticketid;
//                        $results->buyerID = $agentid;
//
//                        $results->save();
//
//                        $payment = payment::where('userid',$agentid)->orderBy('created_at','desc')->first();
//
//                        $payid = $payment->id;
//
//                        $totalPayment = $payment->totalPayment + $totalPrize * $times;
//
//                        payment::where('id',$payid)->update(['totalPayment'=>$totalPayment]);
//
//                    }
//                }
//            }
//        }
    }
}
