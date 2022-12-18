@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 200px">
            <div class="col-md-10">
                <form action="{{ route('wallet.store', Auth::user()->id)}}" method="post">
                    @csrf
                    <div class="form-group" style="width: 330px">

                        <label for="titleInput">Money</label>
                        <input type="number" class="form-control @error('cash') is-invalid @enderror" id="nameInput" name="cash" placeholder="Enter cash">
                        <div class="invalid-feedback"></div>
                    </div>
                    <button class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
