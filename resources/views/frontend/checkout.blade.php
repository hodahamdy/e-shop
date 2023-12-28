@extends('layouts.front')

@section('title')
       Checkout 
@endsection

@section('content')

    <div class="container mt-3">
      <form action="{{url('place-order')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card"> 
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text"  name="fname" value="{{Auth::user()->name}}" class="form-control" placeholder="Enter Your First Name">
                            </div>    
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text"  name="lname" value="{{Auth::user()->lname}}" class="form-control" placeholder="Enter Your Last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text"  name="email"  value="{{Auth::user()->email}}" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text"  name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Enter Your Phone Number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Adderss</label>
                            <input type="text"  name="address"  value="{{Auth::user()->address}}" class="form-control" placeholder="Enter Your Adderss">
                        </div>
                    </div>
                </div>    
            </div>
        </div>    
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6> Order Details </h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach($cartitems as $item)
                                <tr>
                                    <td> {{$item->products->name}}</td>
                                    <td> {{$item->prod_qty}}</td>
                                    <td> {{$item->products->selling_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
      </form>  
    </div>


@endsection