@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            404 Error Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">404 page not found</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may return to dashboard.
                    </p>
                    <a href="{{ url('home') }}" class="btn btn-warning btn-flat">Go Back</a>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </section><!-- /.content -->
    

@endsection
