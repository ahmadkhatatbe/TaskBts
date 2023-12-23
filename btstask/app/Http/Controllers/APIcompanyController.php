<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class APIcompanyController extends Controller
{
    public function getAllCompanies()
    {
        try {
            $companies = Company::all();
            return response()->json(['companies' => $companies], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching companies'], 500);
        }
    }

    public function getCompany($id)
    {
        try {
            $company = Company::with('employees')->find($id);

            if (!$company) {
                return response()->json(['error' => 'Company not found'], 404);
            }

            return response()->json(['company' => $company], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the company'], 500);
        }
    }
    
}
