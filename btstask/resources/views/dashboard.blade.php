@extends('layouts.template')

@section('content')

            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Stats Row Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                       

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    {{$companyCount}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Company
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                   {{$employeeCount}}
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Employees
                                </a>
                            </div>
                        </div>

                        
                    </div>

                </div>
                       
            
                    <!--/Profile Tabs-->
               
            </main>
            <!--/Main-->
        </div>
     
@endsection