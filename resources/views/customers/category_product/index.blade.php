@extends('customers.layout.master')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <section class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
                @include('customers.category_product.component.aside_category')
            </div>
        </div>
    </section>
@endsection
