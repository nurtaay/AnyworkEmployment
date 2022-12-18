@extends('layouts.adm')
@section('title','Vacancy page')
@section('content')
     <h1> Create! </h1>
     <div class="container text-white" style="padding: 10px;margin-top:60px; ">
         <div class="col" style="padding: 5px 300px 30px 300px; ">
             <form action="{{ route('adm.tournoments.store') }}" method="post" style="background-color: #66f;padding: 10px 30px 10px 30px ; border-radius: 20px" enctype="multipart/form-data">
                 @csrf
                 <div class="mb-2">
                     <label class="form-label">Name</label>
                     <input type="file" required name="image" class="form-control">
                 </div>
                 <div class="mb-2">
                     <label class="form-label">Name</label>
                     <input type="text" required name="name" class="form-control">
                 </div>
                 <div class="mb-2">
                     <label class="form-label">Content</label>
                     <input type="text" required name="content" class="form-control">
                </div>
                 <div class="mb-2">
                     <button class="btn btn-light">Add</button>
                </div>
             </form>
         </div>
     </div>
@endsection


