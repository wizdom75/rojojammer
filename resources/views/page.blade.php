@extends('layouts.app')
@section('title', $page->title)
@section('content')
<div class="container-fluid col-lg-11 col-xl-10">
    <!-- Breadcrumbs -->
    @include('inc.breadcrumb')
    <h1 class="text-muted">{{ $page->title }}</h1>
    <div class="text-muted pl-3">{!! $page->body !!}</div>
</div>
@endsection