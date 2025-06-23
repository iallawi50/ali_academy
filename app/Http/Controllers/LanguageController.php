<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function languageSwitch($lang)
    {
        $lang = $lang == "ar" ? "ar" : "en";
        Session::put("locale", $lang);


        return redirect()->back();
    }
}
