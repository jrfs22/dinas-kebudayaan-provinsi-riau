<?php

function isRouteActive($route)
{
    return request()->route()->getName() === $route;
}

function isUtama($utama)
{
    return $utama == 1 ? 'Utama' : 'Cabang';
}
