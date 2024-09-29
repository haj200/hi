<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('images/favi.jpg')}}" type="image/gif" />
  <title>AUxiliaire-loginAdmin</title>
  <link rel="stylesheet" href="{{asset('./styleLoginAdmin.css')}}">
</head>

<body>
  <!-- partial:index.partial.html -->
  <!--ring div starts here-->
  <div class="ring">
    <i style="--clr:#ff0000;"></i>
    <i style="--clr:#ff0000;"></i>
    <i style="--clr:#ff0000;"></i>
    <form method="POST" class="login" action="{{ route('admin.login') }}">
      @csrf
      <h2>Login</h2>
  
      <!-- Custom Error Messages -->
      @if (session('error'))
          <div class="alert alert-danger links" >
              <strong>{{ session('error') }}</strong>
          </div>
      @endif
  
      <!-- Email Input -->
      <div class="inputBx">
          <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus autocomplete="username">
          @error('email')
              <span class="links" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  
      <!-- Password Input -->
      <div class="inputBx">
          <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  
      <!-- Submit Button -->
      <div class="inputBx">
          <input type="submit" value="Admin">
      </div>
  </form>
  </div>  
  </div>
  <!--ring div ends here-->
  <!-- partial -->

</body>

</html>

