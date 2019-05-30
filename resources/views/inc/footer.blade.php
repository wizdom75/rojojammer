<div class="container-fluid footer-webstore mt-3" >
        <footer class="container page-footer font-small blue pt-4 footer-webstore" >
      
          <!-- Footer Links -->
          <div class="container-fluid text-center text-md-left">
      
            <!-- Grid row -->
            <div class="row">
      
              <!-- Grid column -->
              <div class="col-md-6 mt-md-0 mt-3">
      
                <!-- Content -->
                <h5 class="brand"><i class="fas fa-globe text-success"></i> {{ config('app.name', 'RojoHammer') }}</h5>
                <div class="footer-address muted">
                @if(App\Setting::first())
                    {!! App\Setting::first()->address !!}
                    <p>{!! App\Setting::first()->postcode !!}</p>
                    <p><i class="fas fa-envelope"></i> &nbsp;{{ App\Setting::first()->email }}</p>
                    <p><i class="fas fa-phone"></i> &nbsp;{!! App\Setting::first()->phone !!}</p>
                  @endif
                </div>
              </div>
              <!-- Grid column -->
      
              <hr class="clearfix w-100 d-md-none pb-3">
      
              <!-- Grid column -->
              <div class="col-md-3 mb-md-0 mb-3">
      
                  <!-- Links -->
                  <h5 class="lead">Learn more</h5>
      
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-light" href="/page/about-us">About</a>
                    </li>
                    <li>
                      <a class="text-light" href="/page/privacy">Privacy</a>
                    </li>
                    <li>
                      <a class="text-light" href="/page/terms">Terms</a>
                    </li>
                    <li>
                      <a class="text-light" href="/page/cookies">Cookie policy</a>
                    </li>
                  </ul>
      
                </div>
                <!-- Grid column -->
      
                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">
      
                  <!-- Links -->
                  <h5 class="">See more</h5>
      
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-light" href="/categories">Categories</a>
                    </li>
                    <li>
                      <a class="text-light" href="/contact">Contact us</a>
                    </li>
                  </ul>
      
                </div>
                <!-- Grid column -->
      
            </div>
            <!-- Grid row -->
      
          </div>
          <!-- Footer Links -->
      
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">{{ config('app.name', 'RojoHammer') }} © 2019
          </div>
          <!-- Copyright -->
      
        </footer>
        <!-- Footer -->
      </div>