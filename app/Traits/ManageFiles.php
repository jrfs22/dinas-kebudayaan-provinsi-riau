<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

trait ManageFiles
{
    function storeFile($file, $folder)
    {
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/' . $folder, $filename);

        return $folder . '/' . $filename;
    }

    function updateFile($file, $folder, $oldPathFile): string
    {
        $this->deleteFile($oldPathFile);
        return $this->storeFile($file, $folder);
    }

    function deleteFile($path)
    {
        if (Storage::exists('public/'. $path)) {
            Storage::delete('public/'. $path);
        }
    }
}
