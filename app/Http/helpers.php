<?php

use App\Models\User\CompanySetting;



if (!function_exists('uploadFile')) {

    function uploadFile($file, $folder = '/'): ?string
    {
        if ($file) {
            $image_name = Rand() . '.' . $file->getClientOriginalExtension();
            return $file->storeAs($folder, $image_name, 'public');
        }
        return null;
    }
}


if (!function_exists('uploadFile')) {

    function uploadFile($file, $folder = '/'): ?string
    {
        if ($file) {
            $image_name = Rand() . '.' . $file->getClientOriginalExtension();
            return $file->storeAs($folder, $image_name, 'public');
        }
        return null;
    }
}

function setImage($url = null, $type = null, $default_image = true): string
{
    if ($type == 'user') {
        return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_user.png') : '');
    }
    return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_image.png') : '');
}

function company(): CompanySetting
{
    return CompanySetting::first();
}
