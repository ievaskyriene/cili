@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$menu->title}} yra šiuose restoranuose</div>
               <div class="card-body">
                @foreach ($menu->menuRestaurants as $restaurant)
                
                <div class="form-group">
                <label>Restorano pavadinimas</label>
                <div name="menu_weight" class="form-control" value=""><h3>{{$restaurant->title}}</h3></div>
                {{-- <small class="form-text text-muted">Įveskite naują svorį.</small> --}}
                </div>
                <div class="form-group">
                    <label>Restorane telpa klientu</label>
                    <div name="menu_weight" class="form-control" value="">{{$restaurant->customers}} </div>
                </div>
                <div class="form-group">
                    <label>Restorane dirba darbuotoju</label>
                    <div name="menu_weight" class="form-control" value="">{{$restaurant->employees}} </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection