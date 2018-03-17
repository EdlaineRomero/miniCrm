<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function chooser(){
    	Session::set('locale',Input::get('locale'));
    	return Redirect:;Back();
    }
}
