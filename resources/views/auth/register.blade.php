<x-layout>
  <header>
    <div class="container">
        <div class="row">
          <div class="contenedor_position">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-body p-4 p-sm-5" style="background-color:var(--card)">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                <form method="POST" action="{{ route('register') }}">
                  @csrf
    
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="myusername" required autofocus>
                    <label for="floatingInputUsername">Username</label>
                  </div>
    
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="floatingInputEmail">Email address</label>
                  </div>
    
                  <hr>
    
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
    
                  <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <label for="floatingPasswordConfirm">Confirm Password</label>
                  </div>
    
                  <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                  </div>
    
                  <a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>
    
                  <hr class="my-4">
    
                  <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                      <i class="fab fa-google me-2"></i> Sign up with Google
                    </button>
                  </div>
    
                  <div class="d-grid">
                    <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                      <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                    </button>
                  </div>
    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </header>
    

</x-layout>