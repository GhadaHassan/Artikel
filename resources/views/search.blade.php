@extends('layouts.app')

@section('title','Home')



@section('content')

    @auth
     
    <div class="container">
          
        <div class="row">
          <form class="form-inline my-2 my-lg-5" action="{{ url('/search') }}">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:900px">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      
        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Artikel</th>
                    <th scope="col">Benutzername</th>
                    <th scope="col">Kennwort</th>
                    <th scope="col">old Kennwort</th>
                    <th scope="col">Link</th>
                    <th scope="col">Bemerkungen</th>
                    <th scope="col">Modul</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($artikels as $artikel)
                  <tr>
                    <th scope="row">{{ $artikel->id }}</th>
                    <th>{{$artikel->name}}</th>
                    <td>{{$artikel->username}}</td>
                    <td>{{$artikel->password}}</td>
                    <td>{{$artikel->old_password}}</td>
                    <td>{{$artikel->link}}</td>
                    <td>{{$artikel->note}}</td>
                    <td class="text-primary">{{$artikel->modul->name}}</td>
                    
                  </tr>
                  @endforeach
                  
                </tbody>
            </table>
            {{ $artikels->links() }} 
        </div>
          
    </div>

    @else 
    
      @include('auth.login') 
    
    @endauth
@endsection