@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            500 Error Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">500 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">500</h2>
        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>
          <p>
            We will work on fixing that right away.
            Meanwhile, you may return to dashboard.
          </p>
            <a href="{{ url('home') }}" title="Go Dashboard" class="btn btn-danger btn-flat">Go Back</a>
        </div>
      </div><!-- /.error-page -->

    </section><!-- /.content -->

@endsection
