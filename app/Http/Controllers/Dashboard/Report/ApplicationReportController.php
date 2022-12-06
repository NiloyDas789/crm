<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Application;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Enqury;
use App\Models\Dashboard\OfficeCheckin;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Workflow;
use Illuminate\Http\Request;

class ApplicationReportController extends Controller
{
    public function index(Request $request)
    {
//        "filterData": "date_range",
//"queryDataFrom": "2022-12-15",
//"queryType": null,
//"queryDataTo": "2022-12-22"

        $filterData = $request->filterData;
        $queryData = $request->queryData;
        $queryDataFrom = $request->queryDataFrom;
        $queryDataTo = $request->queryDataTo;
        $applications = Application::query()->latest()
            ->when($filterData == 'client_id', function ($query) use ($queryData, $filterData) {
                return $query->whereHas('client', function ($query) use ($queryData) {
                    return $query->where('first_name', 'like', '%' . $queryData . '%');
                });
            })->when($filterData == 'date_range', function ($query) use ($queryData, $queryDataFrom ,$queryDataTo) {
                return $query->whereDate('created_at','>=', $queryDataFrom)->whereDate('created_at','<=', $queryDataTo);
            })
            ->searchFilter($filterData, $queryData, 'partner_id','partner')
            ->searchFilter($filterData, $queryData, 'workflow_id','workflow')
            ->searchFilter($filterData, $queryData, 'product_id','product')
            ->paginate(10);
        return view('dashboard.report.applicationIndex', compact('applications'));
    }

}
