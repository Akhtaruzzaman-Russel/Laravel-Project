<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Project;
use App\Models\Setting;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($pid){
        // Retrieve all invoices from the database
        // Implement pagination if necessary
        $invoices = Income::where('project_id', $pid)->get();
        $data=Project::where('id', $pid)->firstOrFail();
         $setting=Setting::where('status',0)->firstOrFail();
        return view('admin.invoice.index', compact('invoices', 'data','setting'));
    }
    public function pdf($pid){
        // Retrieve all invoices from the database
        // Implement pagination if necessary
        $invoices = Income::where('project_id', $pid)->get();
        $data=Project::where('id', $pid)->firstOrFail();
         $setting=Setting::where('status',0)->firstOrFail();
         $pdf = Pdf::loadView('admin.invoice.index', compact('invoices', 'data','setting'));
         return $pdf->download('invoice.pdf'); // Save to storage/app/public/invoice.pdf
    }
}
