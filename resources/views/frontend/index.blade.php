@extends('layouts.landing-page')

@section('content')
    <div id="home" class="mb-5">
        @include('layouts.frontend._slide')
    </div>

    <div id="categories">
        @include('layouts.frontend._categories')
    </div>

    <div id="popularProducts">
        @include('layouts.frontend._popularProducts')
    </div>

    <div id="products">
        @include('layouts.frontend._products')
    </div>

@endsection