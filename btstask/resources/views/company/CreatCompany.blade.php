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
                                <div class="font-bold text-xl">Create New Company</div>
                            </div>
                            <div class="form-responsive col-12">
                              <form class="col-12" action="{{route('Company.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="flex col-12">
                                <div class="form-group col-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                                </div>
                          
                                <div class="form-group col-4">
                                    <label for="logo">Uploade Logo</label>
                                    <input type="file" min="100kb"   id="logo" name="image" placeholder="Enter Logo">
                                    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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