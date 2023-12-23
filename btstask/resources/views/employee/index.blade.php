@extends('layouts.template')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

            
                   

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Employees</div>
                            </div>
                            <div class="m-2 flex justify-content-between">
                                <div>
                               <a href="{{route('Employee.create')}}" class="btn btn-success p-2 ">CreateNewEmployee</a>
                               <a href="{{route('generatePDFemployee')}}" class="btn btn-success p-2 ">ExportPDF</a>
                             </div>
                             <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Employee Data" />
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                    <th>firstName</th>
                                    <th>lastName</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>action</th>
                                    <th>action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                            </div>
                            <!-- Update your pagination links container -->
<div id="employee-pagination-links">
    <!-- Pagination links will be inserted here dynamically -->
</div>
                        </div>
                        <!-- /card -->

                    </div>

                    
                </div>
            </main>
            <!--/Main-->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function(){
             
                fetch_employee_data();

function fetch_employee_data(query = '', page = 1) {
    $.ajax({
        url: "{{ route('searchemployee') }}",
        method: 'GET',
        data: { query: query, page: page }, // Pass the page parameter
        dataType: 'json',
        success: function (data) {
            $('tbody').html(data.table_data);
            $('#employee-pagination-links').html(data.pagination_links);
            $('#total_records').text(data.total_data);
        }
    });
}

$(document).on('keyup', '#search', function () {
    var query = $(this).val();
    fetch_employee_data(query);
});

// Update the click event for pagination links
$(document).on('click', '#employee-pagination-links a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_employee_data($('#search').val(), page);
});
             
                $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch_customer_data(query);
                });
            });

            
            </script>
@endsection