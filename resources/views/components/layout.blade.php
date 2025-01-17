<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"
/>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- AlpineJS JavaScript -->
<script src="//unpkg.com/alpinejs" defer></script>

<!-- jQuery, Popper.js, and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-eZsKsVe8wH3/Hl3Zgxy4BJvMZ9jKzHYe52DR2PdPYO6vXBx6cKjEiBZ6OshU0vEd9Wc8+PscTzTbT02KjZsWwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
body {
    background: url("/images/desk.jpg"), linear-gradient(to bottom right, #f5f5f5, #dcdcdc);
    height: 100vh;
    background-size: cover;
    background-blend-mode: overlay;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
}
</style>

<body>

</div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand header" href="/">{{ __("Book Library") }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('authors.index') }}"><i class="fas fa-home"></i> {{ __("List All Authors") }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('books.index') }}"><i class="fas fa-home"></i> {{ __("List All Books") }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('authors.create') }}"><i class="fas fa-plus"></i> {{ __("Create a new Author") }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.create') }}"><i class="fas fa-plus"></i> {{ __("Create a new Book") }}</a>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __("Log In") }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __("Register") }}</a>
              </li>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
        </ul>      
    </div>
</nav>

  @yield('content')

</body>
</html>

<script>   
let usedLaterScript = document.createElement('script');   
usedLaterScript.src = 'used-later.js';   
document.body.appendChild(usedLaterScript); 
document.getElementById("close-footer").addEventListener("click", function() {
    document.querySelector(".footer").style.display = "none";
});
</script>