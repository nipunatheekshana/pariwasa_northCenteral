<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Probation_unit;
use Exception;
use Illuminate\Http\Request;

class probationUnitListController extends Controller
{
    use commonFeatures;
    public function loadProbationUnits(){
        try {
                $Probation_unit=Probation_unit::all();
                return $this->responseBody(true, "loadProbationUnits", "found",$Probation_unit );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnits", "error", $exception->getMessage());
        }
    }
}
