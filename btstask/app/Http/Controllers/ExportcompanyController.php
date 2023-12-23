<?php

namespace App\Http\Controllers;
use App\Models\Company;
use PDF;
use Illuminate\Http\Request;

class ExportcompanyController extends Controller
{
    public function generatePDFcompany()
    { $company=Company::all();
        
        // Your data to be included in the PDF
        $data = [
            'title' => 'Company',
            'company' =>$company ,
            
        ];

        // Load the view and pass the data
        $pdf = PDF::loadView('view', $data);

        // Download the PDF file
        return $pdf->download('document.pdf');
    }
}
