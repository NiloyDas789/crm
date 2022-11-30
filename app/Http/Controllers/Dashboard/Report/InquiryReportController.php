<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Enqury;
use Illuminate\Http\Request;

class InquiryReportController extends Controller
{
    public function index(Request $request)
    {
        $filterData = $request->filterData;
        $queryData = $request->queryData;
        $en = Enqury::query()->latest()->when($filterData != null, function ($query) use ($queryData,$filterData) {
            return $query->where($filterData, 'like', '%' . $queryData . '%');
        })->paginate(10);
        return view('dashboard.report.enquiryIndex', compact('en'));
    }

}
