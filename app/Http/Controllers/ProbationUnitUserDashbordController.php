<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProbationUnitUserDashbordController extends Controller
{
    use commonFeatures;
    public function loadProbationUnitID(){
        try {
            $loadProbationUnitID =Auth::user()->probationUnitid;

            return $this->responseBody(true, "loadProbationUnitID", "found", $loadProbationUnitID);
        }
        catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitID", "error", $exception->getMessage());
        }
    }
}
