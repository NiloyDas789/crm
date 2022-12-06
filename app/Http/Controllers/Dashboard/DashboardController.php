<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $c = Client::query()
            ->where('visa_expiry_date', '<', now()->addDays(10))
            ->get();
        return $c;
        return view('dashboard');
    }
    public function noteStore(Request $request)
    {
        $note = \App\Models\Dashboard\TaskNote::create([
            'note' => $request->note,
            'user_id' => auth()->id(),
        ]);
        return back();
    }

    public function noteDelete($id)
    {
        $note = \App\Models\Dashboard\TaskNote::find($id);
        $note->delete();
        return back();
    }

    public function visaExpireCheck()
    {
        $c = Client::query()
            ->where('visa_expiry_date', '<', now()->addDays(10))
            ->get();
        return $c;
    }
}
