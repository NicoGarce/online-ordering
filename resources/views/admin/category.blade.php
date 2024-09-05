<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
    <style>
        .custom-padding{
            padding-left: 100px;
            padding-right: 100px;
        }

        thead, tbody{
            color: white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar');
        <!-- partial -->
        @include('admin.navbar');
        <!-- partial -->
        <div class="main-panel">
            <div class="category-content">
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success small">
                            <button type="button" class="close small" data-dismiss="alert" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                </div>
                <div class="text-center p-2">
                    <h2>Add Category</h2>
                </div>
                <div class="container">
                    <form class="text-center" action="{{url('/add_category')}}" method="POST">

                        @csrf

                        <div class="custom-padding">
                            <input class="form-control text-white" name="category_name" type="text" placeholder="Enter Category Name">
                        </div>
                        
                        <div class="p-3">
                            <input class="btn btn-primary" name="submit" type="submit" placeholder="Submit">
                        </div>
                        
                    </form>
                </div>

                <div class="px-5 container">
                    <table class="table table-bordered">
                            <tr>
                              <th scope="col">Categories</th>
                              <th scope="col">Action</th>
                            </tr>
                          <tbody>
                            @foreach ($data as $categories)
        
                            <tr>
                                <td>{{$categories->category_name}}</td>
                                <td><a class="btn btn-danger" onclick="return confirm('Are you sure about this action?')" href="{{url('delete_category' ,$categories->id)}}">Delete</a></td>
                            </tr>

                            @endforeach
                          </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script');
  </body>
</html>