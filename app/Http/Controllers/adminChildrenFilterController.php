<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminChildrenFilterController extends Controller
{
    use commonFeatures;
    public function loadChildren(){
        try {
            $Children = Child::all();
            return $this->responseBody(true, "loadChildren", "found",$Children );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChildren", "error", $exception->getMessage());
        }
    }
}
