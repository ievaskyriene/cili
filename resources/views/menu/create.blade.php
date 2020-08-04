@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Name:</label>
                                <input type="text" class="form-control" name="menu_title">
                                <small class="form-text text-muted">Įveskite pavadinimą.</small>
                           </div>
                           <div class="form-group">
                                <label>Kaina:</label>
                                <input type="number" class="form-control" name="menu_price" step=".01">
                                <small class="form-text text-muted">Įveskite kainą.</small>
                            </div>

                            <div class="form-group">
                                <label>Svoris:</label>
                                <input type="number" class="form-control" name="menu_weight">
                                <small class="form-text text-muted">Įveskite svorį.</small>
                            </div>

                            <div class="form-group">
                                <label>Mėsos kiekis:</label>
                                <input type="number" class="form-control" name="menu_meat">
                                <small class="form-text text-muted">Įveskite mėsos kiekį porcijoje.</small>
                            </div>

                            <div class="form-group">
                                <label>Tekstas:</label>
                                <textarea name="about" class="form-control" id="summernote"></textarea>
                                <small class="form-text text-muted">Įveskite menu tekstą.</small>
                            </div>

                            <div class="form-group">
                                Patiekalo nuotrauka <input type="file" name="portret">
                                <small class="form-text text-muted">Parinkite patiekalo nuotrauką.</small>
                            </div>

                            @csrf
                            <button type="submit" class = "btn btn-primary">ADD</button>
                         </form>
                    </div>
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
