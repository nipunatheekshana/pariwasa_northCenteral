<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class passwordChangeController extends Controller
{
    use commonFeatures;

    public function changePassword(Request $request){
        $validatedData= $request->validate([
            'password' => ['required','confirmed','min:6'],
        ]);
        try {

            $user = User::find(Auth::user()->id);
            if ($user) {
                if (Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->password);
                    $user->update();
                    return true;
                }
            }
            return false;
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadDistrict", "error", $exception->getMessage());
        }
    }
}
