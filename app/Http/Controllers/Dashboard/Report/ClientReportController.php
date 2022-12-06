<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Client;
use Illuminate\Http\Request;

class ClientReportController extends Controller
{
    public function index(Request $request)
    {
        $filterData = $request->filterData;
        $queryData = $request->queryData;
        $queryDataFrom = $request->queryDataFrom;
        $queryDataTo = $request->queryDataTo;

        $items = Client::query()->latest();
        if($filterData != 'date_range'){
            $items->when($filterData != null, function ($query) use ($queryData,$filterData) {
                return $query->where($filterData, 'like', '%' . $queryData . '%');
            });
        }
        $items->when($filterData == 'date_range', function ($query) use ($queryData, $queryDataFrom ,$queryDataTo) {
             return $query->whereDate('created_at','>=', $queryDataFrom)->whereDate('created_at','<=', $queryDataTo);
        });
        $en = $items->paginate(10);
        return view('dashboard.report.clientIndex', compact('en'));
    }
}
