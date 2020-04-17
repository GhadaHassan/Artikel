@extends('layouts.app')

@section('title','Home')



@section('content')

    @auth
      <div class="container">

        <div class="row">
          <br>
          <h3>Search</h3>
        </div>
        
        <div class="row">
          <form class="form-inline my-2 my-lg-5" action="{{ url('/search') }}">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:900px">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
            
      </div>

    @else 
      @include('auth.login') 
      
    @endauth


     

 
@endsection