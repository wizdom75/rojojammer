@extends('layouts.app')
@section('title', $product->title)
@section('content')
<div class="container-fluid col-xl-10">
    @include('inc.breadcrumb')
            <input type="hidden" id="prod_id" value="{{$product->id}}">
                <div id="product">
                    <section v-if="errored">
                        <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
                    </section>
                    <section v-else >
                        <div class="mx-auto" v-if="loading">
                                <div class="spinner-border text-secondary" role="status">
                                        <span class="sr-only">Loading...</span>
                                </div>
                        </div>    
                        <div class="row mb-3">
                                <div class="col-sm-8 col-md-6 col-lg-5">
                                    <img  v-if="product.images" :src="'/'+product.images.path" class="card-img-top" :alt="product.title" id="prod_image" height="400">
                                    <img v-else src="https://via.placeholder.com/450x450"  class="img-fluid" alt="Card image cap">
                                </div>
                                <div class="col-md-6 col-lg-7" >
                                    <h2 class="card-title h4 text-success"  v-html="product.title"></h2>
                                    <p v-if="product.details" class="lead text-muted"><small v-html="product.specs"></small></p>
                                    <button :id="product.id" class="btn btn-outline-success rounded-0 mt-2" data-toggle="modal" :data-target="'#priceQuoteModal-'+product.id">Request quote</button>
                                    @include('inc.quote-modal')
                                </div>
                        </div>
                        
                        <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Product Details</a>
                                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Related products</a>
                                    
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" v-html="product.details"></div>

                                <div class="tab-pane fade  p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                                <div v-for="product in related" class="  col-6 col-sm-4 col-md-4 col-lg-3">
                                                        @include('inc.product-card')
                                                </div>
                                            </div>
                                </div>
                            </div>
                    </section>
                    
                </div>
                
                <script type="text/javascript">
                    new Vue({
                    el: '#product',
                    data () {
                        return {
                        product: null,
                        images: null,
                        related: null,
                        loading: true,
                        errored: false,
                        altImage : "https://via.placeholder.com/200"
                        }
                    },
                    filters: {
                        currencydecimal (value) {
                        return value.toFixed(2)
                        }
                    },
                    mounted () {
                        let prod_id = document.getElementById("prod_id").value;
                        axios
                        .get('/api/product/'+prod_id)
                        .then(response => {
                            this.product = response.data;
                            return axios.get('/api/related-products');
                        }).then(response => {
                            this.related = response.data;  
                        }).catch(error => {
                            console.log(error)
                            this.errored = true
                        })
                        .finally(() => this.loading = false)
                    },
                    methods: {
                        imageLoadError () {
                            document.getElementById('prod_image').src='https://via.placeholder.com/200';
                        console.log('Image failed to load');
                        }
                    }
                    });


                </script>
            </div>
@endsection