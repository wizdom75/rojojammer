<div class="card-body col-12 p-0 mt-3 m-0">
    <img v-if="product.images" :src="'/'+product.images.path" class="card-img-top" :alt="product.title" id="'prod_image_'+product.id"  height="250">
    <img v-else src="https://via.placeholder.com/250x250"  class="img-fluid" alt="Card image cap">
    <h1 class="text-muted lead mt-2">@{{product.title.substring(0,140)}}</h1>
    <a  class="text-muted lead" :href="'/product/'+product.slug">
        <button id="" class="btn btn-outline-primary btn-block rounded-0">See more info</button>
    </a>
    <button :id="product.id" class="btn btn-outline-success btn-block rounded-0 mt-2" data-toggle="modal" :data-target="'#priceQuoteModal-'+product.id">Request quote</button>
</div>

@include('inc.quote-modal')