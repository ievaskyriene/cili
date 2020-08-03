@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
               <div class="card-body">
                <form method="POST" action="{{route('restaurant.store')}}">

                    <div class="form-group">
                        <label>Pavadinimas</label>
                        <input type="text" class="form-control" name="restaurant_title" value = "{{old('restaurant_title')}}">
                        <small class="form-text text-muted">Įveskite restorano pavadinimą</small>
                    </div>

                    <div class="form-group">
                        <label>Žmonių kiekis, telpantis restorane:</label>
                        <input type="text" class="form-control" name="restaurant_customers" value = "{{old('restaurant_customers')}}">
                        <small class="form-text text-muted">Įveskite klientų kiekį</small>
                    </div>

                    <div class="form-group">
                        <label>Darbuotojų kiekis</label>
                        <input type="text" class="form-control" name="restaurant_employees" value = "{{old('restaurant_employees')}}">
                        <small class="form-text text-muted">Įveskite darbuotojų kiekį</small>
                    </div>

                    <div class="form-group">
                    <select name="menu_id">
                        @foreach ($menus as $menu)

                            <option value="{{$menu->id}}">{{$menu->title}}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Parinkite restorano patiekala</small>
                </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">ADD</son>
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