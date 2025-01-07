<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BackupController extends Controller
{
    public function index()
    {
        $files = Storage::disk('public')->allFiles('AquaStudios');
        $backups = [];
        foreach ($files as $file) {
            if (substr($file, -4) == '.zip') {
                $backups[] = [
                    'file_path' => $file,
                    'file_name' => str_replace('AquaStudios/', '', $file),
                    /* 'file_size' => $file->size($file),
                    'last_modified' => $file->lastModified($file), */
                ];
            }
        }
        $backups = collect(array_reverse($backups));
        return view("admin.backup.backups")->with(compact('backups'));
    }

    public static function humanFileSize($size, $unit = "")
    {
        if ((!$unit && $size >= 1 << 30) || $unit == "GB")
            return number_format($size / (1 << 30), 2) . "GB";
        if ((!$unit && $size >= 1 << 20) || $unit == "MB")
            return number_format($size / (1 << 20), 2) . "MB";
        if ((!$unit && $size >= 1 << 10) || $unit == "KB")
            return number_format($size / (1 << 10), 2) . "KB";
        return number_format($size) . " bytes";
    }

    public function create()
    {
        try {
            /* only database backup*/
            Artisan::call('backup:run --only-db');
            /* all backup */
            /* Artisan::call('backup:run'); */
            $output = Artisan::output();
            Log::info("Backpack\BackupManager -- new backup started \r\n" . $output);
            session()->flash('success', '¡Copia de seguridad creada con éxito!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    public function download($file_name)
    {
        $fs = Storage::disk('public')->url('AquaStudios/' . $file_name);

        return redirect($fs);
    }

    public function delete($file_name)
    {
        $fs = Storage::disk('public')->url('AquaStudios/' . $file_name);
        Storage::delete('AquaStudios/' . $file_name);

        session()->flash('delete', '¡Copia de seguridad eliminada satisfactoriamente!');
        return redirect()->back();
    }
}
