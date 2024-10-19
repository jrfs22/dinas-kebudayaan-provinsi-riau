<?php

use Carbon\Carbon;

function isRouteActive($route)
{
    return request()->route()->getName() === $route;
}

function isUtama($utama)
{
    return $utama == 1 ? 'Utama' : 'Cabang';
}

function indonesianDate($date) {
    $carbonDate = Carbon::parse($date);

    return $carbonDate->translatedFormat('d F Y');
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

function surveyStatus ($status, $type)
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
