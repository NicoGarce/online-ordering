<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Online Ordering</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <!-- header section strats -->
         @include('home.header')
      <!-- end header section -->
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success small">
                    <button type="button" class="close small" data-dismiss="alert" aria-hidden="true" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session()->get('message')}}
                </div>
            @endif
        </div>
      <!-- cart section -->
      <div class="pt-5">
        <div class="container">
            <table class="table table-hover">
                <tr class="text-center">
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <tbody>
                    <?php $totalPrice= 0; ?>
                    @foreach ($cart as $cart)
                    <tr class="text-center">
                        <td><img style="height: 100px; width: 100px;" class="img-fluid" src="/product/{{$cart->image}}" alt=""></td>
                        <td>{{$cart->product_name}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->price}}</td>
                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{url('remove_cart', $cart->id)}}">Remove</a></td>
                    </tr>

                    <?php $totalPrice= $totalPrice+ $cart->price ?>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right px-5 pb-2">
                <h3 class="">Total Price: {{$totalPrice}}</h3>
            </div>

            <div class="text-right px-5 pb-2">
                <a href="{{url('cash_order')}}" class="btn btn-sm text-white" style="background: #7764bb;">Checkout</a>
            </div>
        </div>
        
      </div>
      <!-- end cart section -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>