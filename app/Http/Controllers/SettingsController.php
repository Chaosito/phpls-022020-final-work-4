<?php

namespace App\Http\Controllers;

use App\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class SettingsController extends Controller
{
    public function index()
    {
        $allSettings = Settings::all();
        return view('settings.main', ['title' => 'Настройки', 'all_settings' => $allSettings]);
    }

    public function save(Request $request)
    {
        $availableKeys = ['phone_number', 'orders_mail_to'];
        foreach($availableKeys as $key) {
            Settings::query()->where('key', $key)->update(['value' => $request->$key]);
        }
        return redirect()->route('site.settings');
    }
}
