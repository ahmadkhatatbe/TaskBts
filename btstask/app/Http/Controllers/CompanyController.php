<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanyController extends Controller
{
   public function index(){
     $companies=Company::all();
return view('company.index')->with('companies', $companies);
   }
   public function show(){
     
    }
   public function create(){
    return view('company.CreatCompany');
   }
   public function store(CompanyRequest $request)

   {   
      $uploadPath = 'uploads/';

      $extension = $request->image->getClientOriginalExtension();

      $imageName = time() . Str::random(10) . '.' . $extension;
      
      $request->image->move($uploadPath, $imageName);
      
      $finalImagePathName = $uploadPath . $imageName;
      
      $data = Company::create([
          'logo' => $finalImagePathName,
          'name' => $request->name,
          'email' => $request->email,
      ]);
          $data->save();
      
      
     return redirect()->route('Company.index');
   
   }
   public function edit($id){
      $company = Company::find($id)->first();
      return view('company.EditCompany')->with('company', $company);
  }
  
  public function update(CompanyRequest $request)
  {
      $uploadPath = 'uploads/';
  
      $extension = $request->image->getClientOriginalExtension();
      $imageName = time() . Str::random(10) . '.' . $extension;
      $request->image->move($uploadPath, $imageName);
      $finalImagePathName = $uploadPath . $imageName;
  
      Company::where('id', $request->id)->update([
          'logo' => $finalImagePathName,
          'name' => $request->name,
          'email' => $request->email,
      ]);
  
      return redirect()->route('Company.index');
  }
  
   public function destroy($id){

    $company = Company::find($id)->first();
    $company->delete();
      
    return redirect()->route('Company.index');
    
   }

}
