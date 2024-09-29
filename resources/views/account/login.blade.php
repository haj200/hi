<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('images/favi.jpg')}}" type="image/gif" />
  <title>AUxiliaire-login</title>
  <link rel="stylesheet" href="{{asset('./styleLoginUser.css')}}">
</head>

<body>
  <!-- partial:index.partial.html -->
  <!--ring div starts here-->
  <div class="ring">
    <i style="--clr:#00ff0a;"></i>
    <i style="--clr:#ff0057;"></i>
    <i style="--clr:#fffd44;"></i>
    <form method="POST" class="login" action="{{ route('account.login') }}">
      @csrf
      <h2>Login</h2>
  
      @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif
  
      <div class="inputBx">
          <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus autocomplete="username">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  
      <div class="inputBx">
          <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  
      <div class="inputBx">
          <input type="submit" value="se connecter">
      </div>
  
      <div class="links">
          <a href="{{route('home')}}">contacter les responsables</a>
      </div>
  </form>
  
  </div>
  <!--ring div ends here-->
  <!-- partial -->

</body>

</html>

