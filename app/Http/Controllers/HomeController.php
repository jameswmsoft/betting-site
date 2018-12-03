<?php

namespace App\Http\Controllers;

use App\AdminPicbets;
use App\BuyerPicbets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AdminTdbets;
use stdClass;
use App\Results;
use App\BuyerTdbets;
use App\User;

class HomeController extends Controller
{


    public function index(){
        $datas = AdminTdbets::all();
        return view('front.index');
    }

    public function result($id){
        if($id == 0){
            $datas = AdminTdbets::all();
        }else{
            $datas = AdminPicbets::all();
        }

        $object = new stdClass;

        $object->data = $datas;
        echo json_encode($object);
    }

    public function winners($id,$type){

        if ($type == 0){
            $datas = Results::where('drawID',$id)->where('type',$type)->get();
        }else{
            $datas = Results::where('drawID',$id)->where('type',$type)->get();
        }


        foreach ($datas as $data){

            if($type == 0){
                $buyerbets = BuyerTdbets::where('ticketID', $data->ticketID)->first();
            }else {
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

        return view('front.Winners.winners',['datas'=>$datas,'type'=>$type]);
    }

    public function login(){
        return view('Agent/Login/login');
    }
    /**
     * @param Request $request
     */
    public function postLogin(Request $request){

        $userdata = array(
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
            'ban' => '1'
        );

        if (Auth::attempt($userdata)) {
            if(Auth::user()->role == 'admin'){
                return redirect('admin/index');
            }
            return redirect('agent/dashboard');
        }
        else{
            return redirect('login')->with('status','try');
        }
    }

    public function whatsapp(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://panel.apiwha.com/send_message.php?apikey=NUCPM8N7UFIB2G45N67B&number=917338911091&text=laraveltext",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        };
    }
}
