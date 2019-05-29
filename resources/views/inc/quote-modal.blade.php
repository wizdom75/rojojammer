
    <!-- Modal -->
    <form action="/create-quote" method="POST">
        @csrf
      <div class="modal fade bd-example-modal-lg" :id="'priceQuoteModal-'+product.id" tabindex="-1" role="dialog" aria-labelledby="priceQuoteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg rounded-0" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h4 class="modal-title text-success" id="priceQuoteModalTitle">Price Quote for <span class="font-weight-bold"> @{{product.title}}</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body row">
              <div class="col-md-6">
                  <div class="col-auto">
                      <div class="input-group mb-2 mt-1">
                        <div class="prod-img input-group-prepend">
                                <img v-if="product.images" :src="'/'+product.images.path" class="img-thumbnail rounded-0" :alt="product.title" :id="'prod_image_'+product.id" height="300">
                                <img v-else src="https://via.placeholder.com/300x300"  class="img-fluid rounded-0" alt="Card image cap">
                                <input type="hidden" name="product_id" :value="product.id">
                        </div>
                      </div>
                    </div>
              </div>
         
                <div class="form-group col-md-6 mt-2">
                    <label class="text-muted modal-title h5 mt-1" for="name_Quote">Name:</label>
                    <input name="name" type="text" class="form-control text-muted rounded-0" id="name_Quote" placeholder="Name Lastname">
                    
                    <label class="text-muted modal-title h5 mt-1" for="email_Quote">Email:</label>
                    <input name="email" type="email" class="form-control text-muted rounded-0" id="email_Quote" placeholder="name@example.com">
                    
                    <label class="text-muted modal-title h5 mt-1" for="message_Quote">Message:</label>
                    <textarea name="message" type="textarea" class="form-control text-muted rounded-0" id="message_Quote" placeholder="I would like a quote for ...."></textarea>
                    
                </div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-success btn-block rounded-0" >Submit Quote Request</button>
              
            </div>
            <p class="container small text-muted">I agree that rojohammer.com will inform me of special shop offers and services. I can withdraw my consent to this at any time, as outlined in the <a href="/page/privacy">Privacy Policy</a>.</p>
          </div>
        </div>
      </div>
    </form>