<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function index()
    {
        return view("admin.pdf.index");
    }

    public function download()
    {
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->setPaper(array(0,0,612.00,792.00), 'portrait');
        $dompdf->loadView("admin.pdf.index");
        
        return $dompdf->stream("Reporte de reservas", array("Attachment" => 0));
    }
}
