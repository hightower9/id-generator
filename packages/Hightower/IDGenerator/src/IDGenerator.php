<?php

namespace Hightower\IdGenerator;

use Illuminate\Database\Eloquent\Model;

class IDGenerator
{
    /**
     * ID Code Generation
     * 
     * @param Model $model
     * @param string $trow
     * @param int $length
     * @param string $prefix
     * @return string 
     * 
     */
    public static function IDGenerate(Model $model, string $trow, int $length, string $prefix) : string
    {
        $data = $model::max($trow);
        if(!$data){
            $og_length = $length - 1;
            $last_number = 1;
        }else{
            $code = substr($data, strlen($prefix));
            $actual_last_number = ($code/1) * 1;
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i = 0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.$zeros.$last_number;
    }
}
