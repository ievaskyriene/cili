@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Restoranų sąrašas</h1>
                    <a href="{{route('restaurant.index')}}">RESET</a>
                    <form action="{{route('restaurant.index')}}" method="get">
                    <select name="menu_id">
                        <option value="0">Show All</option>
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" @if($selectId == $menu->id) selected @endif>{{$menu->title}}</option>
                        @endforeach
                        </select><br><br>
                        Sort By: <br>
                        Pavadinimas: <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif><br>
                        {{-- Plate: <input type="radio" name="sort" value="plate" @if('plate' == $sort) checked @endif><br>
                        Make_year: <input type="radio" name="sort" value="make_year" @if('make_year' == $sort) checked @endif><br> --}}
                        <button type="submit">FILTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($restaurants as $restaurant)
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
               
              <div class="form-group">
                {{-- <label>Restorano pavadinimas</label> --}}
                <div class="card-header" style = "text-align:center"><h3>{{$restaurant->title}}</h3></div>
                {{-- <div class="form-control">{{$restaurant->title}}</div> --}}
                {{-- <small class="form-text text-muted">Restorano pavadinimas</small> --}}
              </div>

              {{-- <div class="form-group">
                <label>Restorano klientų skaičius</label>
                <div class="form-control">{{$restaurant->customers}}</div>
                {{-- <small class="form-text text-muted">Restorano klientai</small> --}}
              {{-- </div> --}}

              {{-- <div class="form-group">
                <label>Restorano dienos patiekalo pavadinimas</label>
                <div class="form-control">{{$restaurant->restaurantMenu->title}}</div> --}}
                {{-- <small class="form-text text-muted">Patiekalo kaina</small> --}}
              {{-- </div> --}}

              {{-- <div class="form-group">
                <label>Restorano dienos patiekalo kaina</label>
                <div class="form-control">{{$restaurant->restaurantMenu->price}}</div> --}}
                {{-- <small class="form-text text-muted">Patiekalo kaina</small> --}}
              {{-- </div> --}}

              <a href="{{route('restaurant.edit', [$restaurant])}}">Koreguoti restorano duomenis</a> <a href="{{route('restaurant.show', [$restaurant])}}">Parodyti informaciją apie restoraną</a><br>
                <form action="{{route('restaurant.destroy', [$restaurant])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-secondary">DELETE</button>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
@endsection