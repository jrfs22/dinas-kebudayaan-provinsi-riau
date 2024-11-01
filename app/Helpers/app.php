<?php

use Carbon\Carbon;

function isRouteActive($route)
{
    return request()->route()->getName() === $route;
}

// function isRouteParamActive($route, $param, $value)
// {
//     $currentRoute = request()->route()->getName();
//     $currentParam = request()->route($param);

//     if ($currentRoute !== $route) {
//         return false;
//     }

//     if ($param && $value) {
//         return $currentParam === $value;
//     }

//     return true;
// }

function getTime($time)
{
    return Carbon::parse($time)->format('H:i');
}

function isRouteParamActive($route, $param, $value)
{
    return request()->routeIs($route) && request()->route($param) == $value;
}

function isUtama($utama)
{
    return $utama == 1 ? 'Utama' : 'Cabang';
}

function indonesianDate($date)
{
    $carbonDate = Carbon::parse($date);

    return $carbonDate->translatedFormat('d F Y');
}

function getDay($date)
{
    $carbonDate = Carbon::parse($date);

    return $carbonDate->translatedFormat('d');
}

function getMonth($date)
{
    $carbonDate = Carbon::parse($date);

    return $carbonDate->translatedFormat('F');
}

function isFileExist($path, $default)
{
    if (file_exists(public_path($path))) {
        return asset($path);
    } else {
        return $default;
    }
}

function category($category)
{
    switch ($category) {
        case 'banner-description':
            return 'Banner Deskripsi';
        case 'banner-main-image':
            return 'Gambar Utama Banner';
        case 'banner-secondary-image':
            return 'Gambar Utama Banner';
    }
}

function surveyStatus($status, $type)
{
    switch ($status) {
        case 'inactive':
            $status = 'Tidak Aktif';
            $bg = 'bg-danger';
            break;
        case 'active':
            $status = 'Aktif';
            $bg = 'bg-info';
            break;
        case 'completed':
            $status = 'Selesai';
            $bg = 'bg-success';
            break;
    }

    return $type == 'status' ? $status : $bg;
}

function mediaSocial($platform)
{
    switch ($platform) {
        case 'facebook':
            $icon = 'fa-facebook-f';
            break;
        case 'twitter':
            $icon = 'fa-x-twitter';
            break;
        case 'youtube':
            $icon = 'fa-youtube';
            break;
        case 'linkedin':
            $icon = 'fa-linkedin-in';
            break;
        case 'instagram':
            $icon = 'fa-instagram';
            break;
        case 'tiktok':
            $icon = 'fa-tiktok';
            break;
        default:
            $icon = 'fa-globe';
    }

    return $icon;
}

function isDataNull($data)
{
    return $data === null ? 'sda' : $data;
}

function surveyStatusOnGuest($status)
{
    switch ($status) {
        case 'active':
            $status = 'Berlangsung';
            break;
        case 'completed':
            $status = 'Selesai';
            break;
    }

    return $status;
}

function isSuperAdmin()
{
    return auth()->user()->role === 'super admin' ? true : false;
}


function kategoriInformasiColor($index) {
    $colorCard = [
        'border-[#e5e5e5] hover:bg-[#F8B81F] hover:border-[#F8B81F]',
        'border-[#e5e5e5] hover:bg-[#39C0FA] hover:border-[#39C0FA]',
        'border-[#e5e5e5] hover:bg-[#F92596] hover:border-[#F92596]',
        'border-[#e5e5e5] hover:bg-[#5866EB] hover:border-[#5866EB]',
    ];

    return $colorCard[$index];
}

function kategoriInformasiColorIcon($index) {
    $colorIcon = [
        'bg-[#F8B81F]',
        'bg-[#39C0FA]',
        'bg-[#F92596]',
        'bg-[#5866EB]',
    ];

    return $colorIcon[$index];
}

function filterClassFormat($phrase) {
    return strtolower(str_replace(' ', '-', $phrase));
}
