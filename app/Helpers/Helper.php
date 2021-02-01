<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\Operator;
class Helper {

    public static function zain_kuwait(){
        $country = Country::where('title', 'Kuwait')->first();
        if(!empty($country)){
            $op = Operator::where('country_id', $country->id)->where('name', 'Zain')->first();
            if(!empty($op)){
                return $op->id;
            }
        }
        return 1;
    }

    public static function du_kuwait(){
        $country = Country::where('title', 'Kuwait')->first();
        if(!empty($country)){
            $op = Operator::where('country_id', $country->id)->where('name', 'Du')->first();
            if(!empty($op)){
                return $op->id;
            }
        }
        return 2;
    }



}
?>
