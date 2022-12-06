<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\OfficeCheckin;
use Illuminate\Http\Request;

class OfficeCheckReportController extends Controller
{
    public function index(Request $request)
    {
        $filterData = $request->filterData;
        $queryData = $request->queryData;
        $queryDataFrom = $request->queryDataFrom;
        $queryDataTo = $request->queryDataTo;
        $officeCheckIn = OfficeCheckin::query()->latest()->searchFilter($filterData, $queryData, 'contact_id','contact');

        if($filterData != 'contact_id' && $filterData != null && $filterData != 'date_range'){

            $officeCheckIn->when($filterData != null, function ($query) use ($queryData,$filterData) {
                return $query->where($filterData, 'like', '%' . $queryData . '%');
            });
        }

        $officeCheckIn->when($filterData == 'date_range', function ($query) use ($queryData, $queryDataFrom ,$queryDataTo) {
             return $query->whereDate('created_at','>=', $queryDataFrom)->whereDate('created_at','<=', $queryDataTo);
        });
        $items = $officeCheckIn->paginate(10);
        return view('dashboard.report.office-check-in', compact('items'));
    }
}
