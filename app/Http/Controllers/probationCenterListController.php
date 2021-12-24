<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Probation_center;
use Exception;
use Illuminate\Http\Request;

class probationCenterListController extends Controller
{
    use commonFeatures;
    public function loadProbationCenters(){
        try {
                $Probation_centers=Probation_center::all();
                return $this->responseBody(true, "loadProbationCenters", "found",$Probation_centers );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenters", "error", $exception->getMessage());
        }
    }
}
