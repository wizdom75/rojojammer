@extends('layouts.app')
@section('title', 'Plant & Tool Hire - RojoHammer ')
@section('content')

<div class="container-fluid p-0">
    @include('inc.slider')
</div>
<div class="container">


    <h2 class="mt-3 text-muted">Featured Products</h2>
    <div id="featured" class="row  ">

        <div v-for="product in featured" class=" col-6 col-sm-4 col-md-4 col-lg-3">
            @include('inc.product-card')
        </div>
    </div>

</div>
<script type="text/javascript">
    new Vue({
    el: '#featured',
    data () {
        return {
        featured: null,
        loading: true,
        errored: false,
        altImage : "https://via.placeholder.com/200"
        }
    },
    mounted () {
        axios
        .get('/api/featured-products')
        .then(response => {
            this.featured = response.data; 
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
@endsection