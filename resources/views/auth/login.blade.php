<title>Login & Register</title>
<link rel="stylesheet" href="style.css">
<div class="container">
    <div class="form-container">
        <div class="signin-signup">

            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Masuk</h2>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <input type="submit" value="Login" class="btn solid">
            </form>

            <form method="POST" action="{{ route('register') }}" class="sign-up-form" enctype="multipart/form-data">
                @csrf
                <h2 class="title">Register</h2>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                    name="no_hp" value="{{ old('no_hp') }}" required placeholder="Nomor Handphone" onkeypress="return hanyaAngka(event)">
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-address"></i>
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                    name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat">
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-file"></i>
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" value="{{ old('foto') }}" required style="padding-top: 15px;">
                    @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <input type="submit" value="Sign up" class="btn solid">

            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Belum punya akun ? </h3>
                <p></p>
                <button class="btn transparent" id="sign-up-btn">Register</button>
            </div>
            <img src="img/pressplay.svg" class="image" alt="">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Sudah Punya Akun?</h3>
                <p></p>
                <button class="btn transparent" id="sign-in-btn">Login</button>
            </div>
            <img src="img/pressplay.svg" class="image" alt="">
        </div>
    </div>
</div>
<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
<script src="app.js"></script>

