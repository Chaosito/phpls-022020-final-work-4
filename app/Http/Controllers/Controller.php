<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\ProductCategories;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $categories = ProductCategories::query()->limit(5)->get(['id', 'title']);
        $phoneTo = Settings::query()->select('value')->where('key','=','phone_number')->first();

        View::share('main_categories', $categories);
        View::share('phone_to', $phoneTo->value);
    }
}
