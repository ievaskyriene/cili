@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
               <div class="card-body">
            
                <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">
                    <div class="form-group">
                    <label>Pavadinimas</label>
                    <input type="text" class="form-control" name="restaurant_title" value = "{{$restaurant->title}}">
                    <small class="form-text text-muted">Įveskite naują restorano pavadinimą</small>
                    </div>

                    <div class="form-group">
                        <label>Žmonių kiekis, telpantis restorane</label>
                        <input type="text" class="form-control" name="restaurant_title" value = "{{$restaurant->customers}}">
                        <small class="form-text text-muted">Įveskite žmonių kiekį</small>
                    </div>

                    <div class="form-group">
                        <label>Restorano darbuotojų kiekis</label>
                        <input type="text" class="form-control" name="restaurant_title" value = "{{$restaurant->employees}}">
                        <small class="form-text text-muted">Įveskite restorano darbuotojų kiekį</small>
                    </div>

                    <div class="form-group">
                    <select name="menu_id">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                                {{$menu->title}}
                            </option>
                        @endforeach
                     </select>
                         <small class="form-text text-muted">Parinkite restoranui dienos patiekalą</small>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-secondary">EDIT</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection