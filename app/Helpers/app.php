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
