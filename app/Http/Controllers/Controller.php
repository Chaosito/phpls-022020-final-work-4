<?php

namespace App\Http\Controllers;

use App\ProductCategories;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $globalViewData = [];

    public function __construct()
    {
        $this->globalViewData['main_categories'] = ProductCategories::query()->limit(5)->get(['id', 'title']);
    }
}
