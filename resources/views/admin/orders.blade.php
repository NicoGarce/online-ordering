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
          <div>
            @if(session()->has('message'))
                <div class="alert alert-success small">
                    <button type="button" class="close small" data-dismiss="alert" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session()->get('message')}}
                </div>
            @endif
          </div>
          <h2>Orders</h2>
          <div class="container p-3">
              <table class="table table-responsive">
                <tr class="text-white text-center">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Payment Status</th>
                  <th>Delivery Status</th>
                  <th>Delivered</th>
                </tr>

                <tbody>
                  @foreach ($orders as $orders)
                      <tr class="text-white text-center">
                        <td>{{$orders->name}}</td>
                        <td>{{$orders->email}}</td>
                        <td>{{$orders->address}}</td>
                        <td>{{$orders->phone}}</td>
                        <td>{{$orders->product_name}}</td>
                        <td>{{$orders->quantity}}</td>
                        <td>{{$orders->price}}</td>
                        <td>{{$orders->payment_status}}</td>
                        <td>{{$orders->delivery_status}}</td>

                        @if ($orders->delivery_status=='To Ship')
                          <td><a href="{{url('delivered', $orders->id)}}" class="btn btn-primary">Delivered</a></td>
                        @else
                          <td><a href="{{url('delivered', $orders->id)}}" class="btn btn-success disabled">Delivered</a></td>
                        @endif
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