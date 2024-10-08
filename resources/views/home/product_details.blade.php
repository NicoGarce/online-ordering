<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
      <div class="hero-area">
      <!-- header section strats -->
         @include('home.header')
      <!-- end header section -->
      
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px;">
        <div class="box">
           <div class="img-box">
              <img style="margin:auto; width:400px" src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                 {{$product->product_name}}
              </h5>

              @if ($product->discount_price!=null)
              <h6 style="color: green">
                 ${{$product->discount_price}}
              </h6>

              <h6 style="text-decoration:line-through; color:gray;">
                 ${{$product->price}} 
              </h6>

              @else
              <h6>
                 ${{$product->price}}
              </h6>
              @endif
              <h6>
                Stock: {{$product->quantity}}
             </h6>
             <h6>
                Category: {{$product->category}}
             </h6>
             <h6>
                Description: {{$product->description}}
             </h6>
             
             <form action="{{ url('add_cart', $product->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="number" name="quantity" value="1" min="1">
                    </div>
                </div>
                <div class="options-container">
                  <div class="options col-md-4">
                     <input class="option2" type="submit" value="Add to Cart">
                 </div>
                </div>
                
                
             </form>
           </div>
        </div>
     </div>

      <!-- footer start -->
      <footer>
      </footer>
      <!-- footer end -->
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