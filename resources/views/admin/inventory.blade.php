<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
    <style>
        thead, tbody{
            color: white;
        }
        .table-size{
            width: 100px;
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
            <div class="inventory-content">
                <div>
                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success small">
                                <button type="button" class="close small" data-dismiss="alert" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                    </div>
                    <div class="p-2 text-center">
                        <h2>Inventory</h2>
                    </div>
                    <div class="container">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Category</th>
                                <th>Delete</th>
                            </tr>
                            <tbody>
                                @foreach ($product as $product)
                                <tr>
                                    <td class="text-center"><img src="/product/{{$product->image}}" alt=""></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>₱{{$product->price}}</td>

                                    @if ($product->discount_price == 0)
                                        <td> - - </td>
                                    @else
                                        <td>₱{{ $product->discount_price }}</td>
                                    @endif
                                    
                                    <td>{{$product->category}}</td>
                                    <td>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure about this action?')" href="{{url('delete_product', $product->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script');
  </body>
</html>