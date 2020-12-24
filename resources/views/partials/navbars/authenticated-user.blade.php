<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/products/create">Add product</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/categories/create">Add category</a>
    </li>
</ul>   
<ul class= "navbar-nav ml-auto">
  <form class="form-inline my-2 my-lg-0" method="POST" action="/logout">
  @csrf
  <span style='color:white' class="px-5">{{auth()->user()->name}}</span>

  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
  </form> 
</ul>  