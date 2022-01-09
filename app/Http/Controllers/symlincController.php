<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class symlincController extends Controller
{
    public function test(){
        $targetFolder = $_SERVER['DOCUMENT_ROOT'];
        $linkFolder = 'Directory /domains/ncprobationdept.com/public_html';
        symlink($targetFolder,$linkFolder);
        echo $targetFolder;
    }

}
