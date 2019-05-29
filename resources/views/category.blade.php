@extends('layouts.app')
@section('title', $category->title)
@section('content')
<div class="container-fluid col-lg-11 col-xl-10">
        @include('inc.breadcrumb')
        <h1 class="h3 text-muted">{{ $category->title }}</h1>

        @isset($category)
        <input type="hidden" id="catId" value="{{$category->id}}">

            @if($category->parent_id == 0)
                <div class="btn-group btn-group-toggle">
                
                    @foreach (App\Category::where('parent_id', $category->id)->get() as $item)
            
                        <a class="btn btn-outline-secondary rounded-0" href="/browse/{{ $item->slug }}">{{$item->title }}</a>
            
                    @endforeach 
                </div>
            @endif 

        @endisset

        <div id="products" >
        <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>
        <section v-else>
            <div v-if="loading" class="spinner-border text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
            </div>
    <div  class="row mt-2">
            <div v-for="product in products" class=" col-6 col-sm-6 col-md-4 col-lg-3">
                    @include('inc.product-card')
            </div>
    </div>

           
        </section>
        <div class="mt-5">
            {{-- Include the pagination blade template --}}
            @include('inc.paginate')
        </div>
    </div>
    <script type="text/javascript">
    
        new Vue({
        el: '#products',
        data () {
            return {
            products: null,
            catId: null,
            loading: true,
            errored: false,
            pagination: null
            }
        },
        filters: {
            currencydecimal (value) {
            return value.toFixed(2)
            }
        },
        mounted () {
            let catId = document.getElementById('catId').value;
            let baseURL = '/api/products/'+catId;
            let pg = 1;
            axios
            .get(baseURL+'?page='+pg)
            .then(response => {
                this.products = response.data.data,
                this.pagination = response.data;
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        },
        methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(val) {
            let baseURL = '/api/products/'+this.catId;
			axios.get(val)
				.then(response => {
                    this.products = response.data.data,
                    this.pagination = response.data
				});
		},
                imageLoadError () {
                    document.getElementById('prod_image').src='https://via.placeholder.com/200';
                console.log('Image failed to load');
                }
    },
    methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(val) {
        let q = document.getElementById("sq").value;
        let baseURL = '/api/search/'+q;
        axios.get(val)
            .then(response => {
                this.products = response.data.data,
                this.pagination = response.data
            });
    }
}
        });
    </script>
</div>


@endsection