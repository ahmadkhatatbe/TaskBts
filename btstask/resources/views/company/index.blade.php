@extends('layouts.template')

@section('content')

            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

            
                   

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Companies</div>
                            </div>
                            <div class="m-2 flex justify-content-between">
                                <div>
                               <a href="{{route('Company.create')}}" class="btn btn-success p-2 ">CreateNewCompnay</a>
                               <a href="{{route('generatePDFcompany')}}" class="btn btn-success p-2 ">ExportPDF</a>
                            </div>
                               <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Company Data" />
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>action</th>
                                    <th>action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                            </div>
                            <div id="your-pagination-links">
                                <!-- Pagination links will be inserted here dynamically -->
                            </div>
                            
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!-- Progress Bar -->
                  
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
           $(document).ready(function () {

            fetch_customer_data();

function fetch_customer_data(query = '', page = 1) {
    $.ajax({
        url: "{{ route('searchcompany') }}",
        method: 'GET',
        data: { query: query, page: page }, // Pass the page parameter
        dataType: 'json',
        success: function (data) {
            $('tbody').html(data.table_data);
            $('#your-pagination-links').html(data.pagination_links);
            $('#total_records').text(data.total_data);
        }
    });
}

$(document).on('keyup', '#search', function () {
    var query = $(this).val();
    fetch_customer_data(query);
});

// Update the click event for pagination links
$(document).on('click', '#your-pagination-links a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_customer_data($('#search').val(), page);
});

    $(document).on('keyup', '#search', function () {
        var query = $(this).val();
        fetch_customer_data(query);
    });

    
});

            $(document).ready(function () {
        $('.delete-form').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var id = $(this).find('.delete-link').data('id');
            if (confirm('Are you sure you want to delete this record?')) {
                // If the user confirms, submit the form
                $(this).submit();
            }
        });
    });
            </script>
     
@endsection