<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Enqury;
use Illuminate\Http\Request;

class InquiryReportController extends Controller
{
    public function index(Request $request)
    {
//        return $request->all();
        $filterData = $request->filterData;
        $queryData = $request->queryData;
        $queryDataFrom = $request->queryDataFrom;
        $queryDataTo = $request->queryDataTo;
        $items = Enqury::query()->latest();

        if($filterData != 'date_range' && $filterData != null){
            $items->when($filterData != null, function ($query) use ($queryData,$filterData) {
                return $query->where($filterData, 'like', '%' . $queryData . '%');
            });
        }
        $items->when($filterData == 'date_range', function ($query) use ($queryData, $queryDataFrom ,$queryDataTo) {
            return $query->whereDate('created_at','>=', $queryDataFrom)->whereDate('created_at','<=', $queryDataTo);
        });
        $en = $items->paginate(10);
        return view('dashboard.report.enquiryIndex', compact('en'));
    }

}
