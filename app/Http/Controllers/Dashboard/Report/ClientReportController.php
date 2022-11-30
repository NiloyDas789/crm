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
        $en = Client::query()->latest()->when($filterData != null, function ($query) use ($queryData,$filterData) {
            return $query->where($filterData, 'like', '%' . $queryData . '%');
        })->paginate(10);
        return view('dashboard.report.clientIndex', compact('en'));
    }
}
