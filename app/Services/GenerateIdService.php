<?php
namespace App\Services;
use App\Contracts\IGenerateIdService;

class GenerateIdService implements IGenerateIdService {
    public function generate($modelInstance, $digit) {

        $range = "";
        for($i=0;$i<$digit;$i++) {
            $range .= "9";
        }

        do {
            $randNum = str_pad(mt_rand(1, (int)$range), $digit, '0', STR_PAD_LEFT);
            $ifExist = $modelInstance::where('id', $randNum)->count();
        } while($ifExist > 0);
        
        return $randNum;
    }


}