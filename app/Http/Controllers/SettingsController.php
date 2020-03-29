<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

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
            $optValue = Settings::query()->where('key', $key)->first();
            if ($optValue !== null) {
                $optValue->update(['value' => $request->$key]);
            }

        }
        return redirect()->route('site.settings');
    }
}
