@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>

               <div class="card-body">
              
                <form method="POST" action="{{route('menu.update',[$menu->id])}}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pavadinimas</label>
                       <input type="text" name="menu_title" class="form-control" value="{{$menu->title}}">
                        <small class="form-text text-muted">Įveskite naują pavadinimą.</small>
                    </div>
                    <div class="form-group">
                        <label>Kaina</label>
                        <input type="text" name="menu_price" class="form-control" value="{{$menu->price}}">
                        <small class="form-text text-muted">Įveskite naują kainą.</small>
                    </div>

                    <div class="form-group">
                        <label>Porcijos svoris</label>
                        <input type="text" name="menu_weight" class="form-control" value="{{$menu->weight}}">
                        <small class="form-text text-muted">Įveskite naują svorį.</small>
                    </div>

                    <div class="form-group">
                        <label>Mėsos kiekis porcijoje</label>
                        <input type="text" name="menu_meat" class="form-control" value="{{$menu->meat}}">
                        <small class="form-text text-muted">Įveskite naują mėsos kiekį porcijoje.</small>
                    </div>

                    <div class="form-group">
                        <label>Tekstas:</label>
                        <textarea name="about" class="form-control" value="{{$menu->about}}" id="summernote"></textarea>
                        <small class="form-text text-muted">Įveskite menu tekstą.</small>
                    </div>


                    <div class="form-group">
                        <img src="{{asset('images/'.$menu->portret)}}" style="width: 250px; height: auto;">
                    </div>
                    <div class="form-group">
                        Profile picture: <input type="file" name="portret">
                        <small class="form-text text-muted">Pakeiskite patiekalo nuotrauka.</small>
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