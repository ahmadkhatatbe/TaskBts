<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDF;
use DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){
        $employees = Employee::all();

// Count the number of employees and company
$employeeCount = $employees->count();
$company=Company::all();
$companyCount = $company->count();

        return view('dashboard')->with('employeeCount', $employeeCount)->with('companyCount', $companyCount);


    }
    public function generatePDFemployee()
    { $employees=Employee::all();
        // Your data to be included in the PDF
        $data = [
            'title' => 'Employee',
            'employees' =>$employees ,
        ];

        // Load the view and pass the data
        $pdf = PDF::loadView('pdf.view', $data);

        // Download the PDF file
        return $pdf->download('document.pdf');
    }
    

    // search for employees
    public function searchemployee(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
    
            $data = DB::table('employees')
                ->where('firstName', 'like', '%' . $query . '%')
                ->orWhere('id', 'like', '%' . $query . '%')
                ->orderBy('id')
                ->paginate(10); // Adjust the number of items per page as needed
    
            $total_row = $data->total();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                        <tr>
                            <td>' . $row->id . '</td>
                            <td>' . $row->firstName . '</td>
                            <td>' . $row->lastName . '</td>
                            <td>' . $row->email . '</td>
                            <td>' . $row->phone . '</td>
                            <td><a href="' . route('Employee.edit', $row->id) . '" class="edit-link" data-id="' . $row->id . '">Edit</a></td>
                            <td>
                                <form action="' . route('Employee.destroy', $row->id) . '" method="POST" class="delete-form">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete-link" data-id="' . $row->id . '">Delete</button>
                                </form>
                            </td>
                        </tr>';
                }
            } else {
                $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                ';
            }
    
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
                'pagination_links' => $data->links()->toHtml(),
            );
            return response()->json($data);
        }
    }
    
    //  search for companies
    public function searchcompany(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
    
            $data = DB::table('companies')
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('id', 'like', '%' . $query . '%')
                ->paginate(10); // Adjust the number of items per page as needed
    
            $total_row = $data->total();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                        <tr>
                            <td>' . $row->id . '</td>
                            <td>' . $row->name . '</td>
                            <td>' . $row->email . '</td>
                            <td><img width="100px" height="50px" src="' . $row->logo . '" ></td>
                            <td><a href="' . route('Company.edit', $row->id) . '" class="edit-link" data-id="' . $row->id . '">Edit</a></td>
                            <td>
                                <form action="' . route('Company.destroy', $row->id) . '" method="POST" class="delete-form">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete-link" data-id="' . $row->id . '">Delete</button>
                                </form>
                            </td>
                        </tr>';
                }
            } else {
                $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                ';
            }
    
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
                'pagination_links' => $data->links()->toHtml(), // Add this line for pagination links
            );
            return response()->json($data);
        }
    }
    


}
