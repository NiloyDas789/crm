<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Application;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Workflow;
use Illuminate\Http\Request;

class ApplicationReportController extends Controller
{
    public function index()
    {
        $applications = Application::query()->latest()->get();
        return view('dashboard.report.applicationIndex', compact('applications'));
    }
    public function search(Request $request)
    {

        if($request->filterData == 'client_id'){
          $dd =   Client::query()->where('first_name', 'like', '%' . $request->queryData . '%')->pluck('id');
//                                ->orWhere('last_name', 'like', '%' . $request->queryData . '%')
        }
        if($request->filterData == 'workflow_id'){
          $dd =   Workflow::query()->where('name', 'like', '%' . $request->queryData . '%')->pluck('id');

        }if($request->filterData == 'partner_id'){
          $dd =   Partner::query()->where('name', 'like', '%' . $request->queryData . '%')->pluck('id');
        }
        if($request->filterData == 'product_id'){
          $dd =   Product::query()->where('name', 'like', '%' . $request->queryData . '%')->pluck('id');
        }
        $applications = Application::query()
                    ->whereIn($request->filterData, $dd)->get();
        return view('dashboard.report.application.reportTable', compact('applications'));
    }
}
