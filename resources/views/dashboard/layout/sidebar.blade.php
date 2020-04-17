<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{url('admin/assets/img/sidebar-2.jpg')}}">

    <div class="logo">
      <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
        Creative Tim
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">

        <li class="nav-item {{is_active('users')}}" > 
          <a class="nav-link" href="{{url('/dashboard/users')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>

        <li class="nav-item {{is_active('moduls')}}">
 
          <a class="nav-link" href="{{url('/dashboard/moduls')}}">
            <i class="material-icons">bubble_chart</i>
            <p>Moduls</p>
          </a>
        </li>


        <li class="nav-item {{is_active('artikels')}}">
       
          <a class="nav-link" href="{{url('/dashboard/artikels')}}">
            <i class="material-icons">dashboard</i>
            <p>Artikels</p>
          </a>
        </li>

    

     

        
        <!-- your sidebar here -->
      </ul>
    </div>
  </div>