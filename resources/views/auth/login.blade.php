@include('layouts.header')
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <span class="title-1">
                                Iniciar Sesion
                            </span>                          
                        </div>
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="POST">
                             @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                         <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                                    </label>
                                    <label>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                            </a>
                                        @endif
                                    </label>
                                </div>
                                <button type="submit" class="au-btn au-btn--block btn-primary m-b-20">
                                    {{ __('Iniciar Sesion') }}
                                </button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Eres Nuevo?
                                    @if (Route::has('register'))
                                    <a class=" " href="{{ route('register') }}">
                                        {{ __('Registrate') }}
                                    </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')
