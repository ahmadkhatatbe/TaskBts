@extends('layouts.template')

@section('content')

            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                   
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 ">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full h-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Edit Employee</div>
                            </div>
                            <div class="form-responsive col-12">
                              <form class="col-12" action="{{route('Employee.update',$Employee->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="flex col-12">
                                <div class="form-group col-4">
                                    <label for="name">FirstName</label>
                                    <input type="text" name="company_id" value="{{$Employee->company_id}}" hidden>
                                   
                                    <input type="text" class="form-control"  name="firstName" value="{{$Employee->firstName}}" placeholder="Enter Name">
                                </div>
                                <div class="form-group col-4">
                                    <label for="email">LastName</label>
                                    <input type="text" class="form-control"  name="lastName" value="{{$Employee->lastName}}" placeholder="Enter lastName">
                                </div>
                          
                                <div class="form-group col-4">
                                    <label for="logo">Email</label>
                                    <input type="email" class="form-control"   id="logo" name="email" value="{{$Employee->email}}" placeholder="Enter email">
                                </div>
                                 </div>
                                 <div class="flex col-12">
                                    <div class="form-group col-4">
                                        <label for="name">phone</label>
                                     
                                        <input type="phone" class="form-control"  name="phone" value="{{$Employee->phone}}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Company</label>
                                        <select name="company_id" class="form-control" id="exampleFormControlSelect1">
                                            
                                            @foreach ($Companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                          
                                          
                                        </select>
                                      </div>
                              
                                    
                                     </div>
                                 <div class="form-group col-4">
                                 
                                    <input type="submit" class="btn btn-primary" value="Update"   >
                                </div>

                              </form>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
     
@endsection