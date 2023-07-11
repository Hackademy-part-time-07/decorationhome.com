<x-layout>
    <div class="position_login">
        <img class="account_img" src="https://static.vecteezy.com/system/resources/previews/002/806/305/original/home-office-concept-man-working-from-home-student-or-freelancer-freelance-or-studying-concept-illustration-flat-style-vector.jpg" alt="loginImg">
          <section>
              <h2>Iniciar sesión</h2>
                  <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="position_form">
                           <label for="email"> <b>{{ __('Email') }} </b></label>
                                <input class="input_form" id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                           

                        <div class="position_form">
                          <label for="password"> <b>{{ __('Contraseña') }}</b></label>
                                <input class="input_form" id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            
                        <div class="position_btween">
                           <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember"> <b>{{ __('Recordar') }}</b></label>
                        </div>
                                
                        <div class="position_form">
                           <button class="btn" type="submit"">{{ __('entrar') }}</button>
                        </div> 
                        <div class="position_form">
                          @if (Route::has('password.request'))
                                    <a class="search btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('contraseña olvidada?') }}
                                    </a>
                                @endif
                        </div>      
                                
                  </form>
        </section>
 </div> 
    
</x-layout>
