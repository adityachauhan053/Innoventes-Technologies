<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('admin');
    }

    
    public function index()
    {
        return view('roman');
    }
    public function converToRoman(Request $request){
        if($request->isMethod('post')){
            $RequestData=$request->all();
            $arrayRoman    = explode(" ", $RequestData['roman']);
            $romanValueOne = $arrayRoman[0];
            $romanOperator = $arrayRoman[1];
            $romanValueTwo = $arrayRoman[2];
            if($romanValueOne && $romanValueTwo){
              $firstRoman=  $this->RomansToNumber($romanValueOne);
              $secondRoman=  $this->RomansToNumber($romanValueTwo);
              $getFinalValue = eval('return '.$firstRoman.$romanOperator.$secondRoman.';');
                if(isset($getFinalValue) && !empty($getFinalValue)):
                    $finalResult= $this->ConverToRomans($getFinalValue);
                    return view('roman',['finalResult'=>$finalResult]);
                endif;
            }
        }
    }
    
    private function ConverToRomans($num){ 
        $n = intval($num); 
        $res = ''; 
        $romanNumber = array( 
            'M'  => 1000, 
            'CM' => 900, 
            'D'  => 500, 
            'CD' => 400, 
            'C'  => 100, 
            'XC' => 90, 
            'L'  => 50, 
            'XL' => 40, 
            'X'  => 10, 
            'IX' => 9, 
            'V'  => 5, 
            'IV' => 4, 
            'I'  => 1); 

        foreach ($romanNumber as $romanKey => $number){ 
            $matches = intval($n / $number); 
            $res .= str_repeat($romanKey, $matches); 
            $n = $n % $number; 
	} 
        return $res; 
    }
    private function RomansToNumber($roman){
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' =>  5,
            'IV' => 4,
            'I' => 1,
         );
        $result = 0;
        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return $result;
    }
}

