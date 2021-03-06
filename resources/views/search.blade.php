@extends('layouts.app')

@section('title','Home')



@section('content')

    @auth
     
    <div class="container">
          
        <div class="row">
          <form class="form-inline my-2 my-lg-5" action="{{ url('/search') }}">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Suchen" aria-label="Search" style="width:900px">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Suchen</button>
          </form>
        </div>
      
        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
					  
                    <th scope="col">Modul</th>
                    <th scope="col">Artikel</th>
                    <th scope="col">Benutzername</th>
                    <th scope="col">Kennwort</th>
                    <th scope="col">Link</th>
                    <th scope="col">Bemerkungen</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($artikels as $artikel)
                  
                  <tr>
                    
                    {{-- <td style="font-size:20px; color:#05135E;font-weight: bold;">{{$artikel->modul->name}}</td> --}}
                    <td class="text-primary">
                      @foreach ($artikel->modul as $modul)
                      @if(count($artikel->modul) > 0)
                      {{$modul->name}} |
                      @endif
                      @endforeach
                      
                    </td>  
                    <td>{{$artikel->name}}</td>
                    <td>{{$artikel->username}}</td>
                    <td>{{$artikel->password}}</td>
                    <td><a href="{{$artikel->link}}" target="_blank">{{$artikel->link}}</a></td>
                    <td>{{$artikel->note}}</td>
                                        
                  </tr>
                  @endforeach
                  
                </tbody>
            </table>
           
        </div>
          
    </div>

    @else 
    
      @include('auth.login') 
    
    @endauth
@endsection