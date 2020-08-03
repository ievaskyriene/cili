@extends('layouts.app')

@section('content')
    
@foreach ($menus as $menu)
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Patiekalų sąrašas</div>

              <div class="card-body">
                <div class="form-group">
                  <label>Pavadinimas</label>
                  <a href="{{route('menu.edit',[$menu])}}" class="form-control">{{$menu->title}}</a>
                  <small class="form-text text-muted">Patiekalo pavadinimas.</small>
                </div>

                <div class="form-group">
                  <label>Kaina</label>
                  <a href="{{route('menu.edit',[$menu])}}" class="form-control">{{$menu->price}}</a>
                  <small class="form-text text-muted">Patiekalo kaina, EUR.</small>
                </div>

                <div class="form-group">
                  <label>Svoris</label>
                  <a href="{{route('menu.edit',[$menu])}}" class="form-control">{{$menu->weight}}</a>
                  <small class="form-text text-muted">Patiekalo svoris, gramais</small>
                </div>

                <div class="form-group">
                  <label>Mėsos kiekis</label>
                  <a href="{{route('menu.edit',[$menu])}}" class="form-control">{{$menu->meat}}</a>
                  <small class="form-text text-muted">Mėsos kiekis patiekle, gramais</small>
                </div>

                <div class="form-group">
                  <label>Aprašymas</label>
                  <a href="{{route('menu.edit',[$menu])}}" class="form-control">{!!$menu->about!!}</a>
                  <small class="form-text text-muted">Patiekalo aprašymas</small>
                </div>
  
                <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                 @csrf
                 <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
                <br><br>

                <img src="{{asset('images/'.$menu->portret)}}" style="width: 250px; height: auto;">

              
                <br><br>
             
                Šį patiekalą turi {{$menu->menuRestaurants->count()}} restoranai: 
              
                <br><br>
              
              <a href="{{route('menu.show', [$menu])}}"> Parodyti restoranus </a>
              
              <br>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
@endsection