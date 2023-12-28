@extends('layouts.front')

@section('title')
        WELCOME to E-shop ya userrrrrr
@endsection


@section('content')
        {{-- @include('layouts.inc.slider') --}}      
 
        <div class="py-5">
            <div class="container">
                <div class="row test2">
                    <h2>Featured Products</h2>
                    <div class="owl-carousel featured-carousel owl-theme">    
                     @foreach ($featured_products as $category)
                            
                            <div class="item py-6  ">
                                <div class="card test2">
                                    <img src="{{asset('assets/uploads/products/'.$category->image)}}">
                                    <div class="card-body ">
                                        <h5>{{$category->name}}</h5>
                                        <p>{{$category->description}}</p>
                                    </div>
                                </div>
                            </div>
                     @endforeach
                    </div>
                   
                </div>
            </div>
        </div>


        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2>Trending Category</h2>
                    <div class="owl-carousel featured-carousel owl-theme test2">    
                     @foreach ($trending_category as $trend)
                            
                            <div class="item ">
                                <a href="{{url('view-category/'.$trend->slug)}}">
                                <div class="card">
                                    <img src="{{asset('assets/uploads/category/'.$trend->image)}}">
                                    <div class="card-body">
                                        <h5>{{$trend->name}}</h5>
                                       
                                        <p>{{$trend->description}}</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                     @endforeach
                    </div>
                   
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        //this is for laptop screen 
        1000:{
            items:4
        }
    }
})
    </script>    

@endsection

<style>
   
</style>