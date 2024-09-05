<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      @include('admin.navbar');
        <!-- partial -->
        <div class="main-panel">
            <div class="add-product-content">
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success small">
                            <button type="button" class="close small" data-dismiss="alert" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                </div>
                <div class="text-center p-2">
                    <h2>Add Product</h2>
                </div>

                <div class="px-5 container">
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Product Name: </label>
                            <input class="form-control text-white" id="product_name" name="product_name" type="text" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <input class="form-control text-white" id="description" name="description" type="text" placeholder="Description" required>
                        </div>
                        <div class="row">
                            <div class="form-group col col-md-4">
                                <label for="price">Price: </label>
                                <input class="form-control text-white" id="price" name="price" type="number" placeholder="Price" required>
                            </div>
                            <div class="form-group col col-md-4">
                                <label for="quantity">Quantity: </label>
                                <input class="form-control text-white" id="quantity" name="quantity" type="number" placeholder="Quantity" required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="discount">Discount Price: </label>
                                <input class="form-control text-white" id="discount" name="discount" type="text" placeholder="Discount">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select class="form-control text-white" id="category" name="category" required>
                                <option value="" selected>Select Category</option>

                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group text-center">
                            <label for="image" class="form-label">Upload Image: </label>
                            <input class="form-control text-white" id="image" name="image" type="file" placeholder="Image" required>
                        </div>
                        <div>
                            <input type="submit" placeholder="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script');
  </body>
</html>