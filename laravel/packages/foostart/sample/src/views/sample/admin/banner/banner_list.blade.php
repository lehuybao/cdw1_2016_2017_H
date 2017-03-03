@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
     Admin area: {{ trans('sample::banner_admin.page_list') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            {{-- print messages --}}
            <?php $message = Session::get('message'); ?>
            @if( isset($message) )
                <div class="alert alert-success flash-message">{!! $message !!}</div>
            @endif
            {{-- print errors --}}
            @if($errors && ! $errors->isEmpty() )
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger flash-message">{!! $error !!}</div>
                @endforeach
            @endif

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> {!! $request->all() ? trans('sample::banner_admin.page_search') : trans('sample::banner_admin.page_list') !!}</h3>
                </div>
                <div class="panel-body">
                    @include('sample::sample.admin.banner.banner_item')
               </div>
           </div>
        </div>
        <div class="col-md-4">
            @include('laravel-authentication-acl::admin.group.search')
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
    <script>
        $(".delete").click(function(){
            return confirm("Are you sure to delete this item?");
        });
    </script>
@stop