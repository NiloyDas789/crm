<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanySettingController extends Controller
{
    public function editCompanySetting()
    {
        $this->checkPermission('settings.access');

        $company_setting = CompanySetting::first();
        return view('dashboard.settings.company_setting', compact('company_setting'));
    }

    public function updateCompanySetting(Request $request)
    {
        $this->checkPermission('settings.edit');

        $request->validate([
            'name'             => 'required|string',
            'mobile1'          => 'nullable|digits_between:10,15',
            'mobile2'          => 'nullable|digits_between:10,15',
            'email'            => 'nullable|email',
            'about'            => 'nullable|string',
            'about_editor'     => 'nullable|string',
            'about_footer'     => 'nullable|string',
            'facebook'         => 'nullable|string',
            'twitter'          => 'nullable|string',
            'instagram'        => 'nullable|string',
            'whatsapp'         => 'nullable|string',
            'location'         => 'nullable|string',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'footer_logo'      => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'meta_title'       => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $companySetting = CompanySetting::first();
        $logo = $companySetting->logo;

        if ($request->hasFile('logo')) {
            if (File::exists('storage/' . $companySetting->logo)) {
                File::delete('storage/' . $companySetting->logo);
            }
            $fileName = Rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $logo = $request->file('logo')->storeAs('images/logo', $fileName, 'public');
        }

        $companySetting->update([
            'name'             => $request->input('name'),
            'mobile1'          => $request->input('mobile1'),
            'mobile2'          => $request->input('mobile2'),
            'email'            => $request->input('email'),
            'about'            => $request->input('about'),
            'about_footer'     => $request->input('about_footer'),
            'facebook'         => $request->input('facebook'),
            'twitter'          => $request->input('twitter'),
            'instagram'        => $request->input('instagram'),
            'whatsapp'         => $request->input('whatsapp'),
            'location'         => $request->input('location'),
            'logo'             => $logo,
            'meta_title'       => $request->input('meta_title'),
            'meta_keywords'    => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
        ]);

        return back()->with('success', 'Settings Updated.');
    }
}
