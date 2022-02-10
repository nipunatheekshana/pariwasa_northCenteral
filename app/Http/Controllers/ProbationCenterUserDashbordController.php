<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProbationCenterUserDashbordController extends Controller
{
    use commonFeatures;
    public function loadProbationCenterID(){
        try {
            $loadProbationCenterID =Auth::user()->probationCenterId;

            return $this->responseBody(true, "loadProbationCenterID", "found", $loadProbationCenterID);
        }
        catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenterID", "error", $exception->getMessage());
        }
    }
}
