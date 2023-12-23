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
                                <div class="font-bold text-xl">CreateNewEmployee</div>
                            </div>
                            <div class="form-responsive col-12">
                              <form class="col-12" action="{{route('Employee.store')}}" method="POST">
                                @csrf
                              @method('POST')
                                <div class="flex col-12">
                                <div class="form-group col-4">
                                    <label for="name">FirstName</label>
                                    <input type="text" name="company_id" hidden>
                                   
                                    <input type="text" class="form-control"  name="firstName"  placeholder="Enter firstName">
                                    @error('firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="email">LastName</label>
                                    <input type="text" class="form-control"  name="lastName"  placeholder="Enter lastName">
                                    @error('lastName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                          
                                <div class="form-group col-4">
                                    <label for="logo">Email</label>
                                    <input type="email"   class="form-control" name="email"  placeholder="Enter email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                 </div>
                                 <div class="flex col-12">
                                    <div class="form-group col-4">
                                        <label for="name">phone</label>
                                     
                                        <input type="phone" class="form-control"  name="phone"  placeholder="Enter Name">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                 
                                    <input type="submit" class="btn btn-primary" value="Create"   >
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