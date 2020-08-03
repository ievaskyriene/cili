@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Restoranas</div>
               <div class="card-body">

                <div class="form-group">
                    <label>Restorano pavadinimas</label>
                    <div class="form-control" name="restaurant_title" value = "">{{$restaurant->title}}</div>
                </div>

                <div class="form-group">
                    <label>Dienos patiekalas</label>
                    <div class="form-control" name="restaurant_title" value = "">{{$restaurant->restaurantMenu->title}}</div>
                </div>

                <div class="form-group">
                    <label>Dienos patiekalo kaina</label>
                    <div class="form-control" name="restaurant_title" value = "">{{$restaurant->restaurantMenu->price}}</div>
                </div>

                <div class="form-group">
                    <label>Restorane telpa klientų</label>
                    <div class="form-control" name="restaurant_title" value = "">{{$restaurant->customers}}</div>
                </div>

                <div class="form-group">
                    <label>Restorane dirba darbuotoju</label>
                    <div class="form-control" name="restaurant_title" value = ""> {{$restaurant->employees}}
                </div>
                 </div>
            </div>
         </div>
    </div>
</div>
@endsection