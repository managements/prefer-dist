@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('update') }}</h4>
            </div>
        </div>
        {{ Form::open(['method'=>'PUT','url'=>route('range.update',$id)]) }}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('range',__('validation.attributes.range'),['class'=>'control-label']) }}
                        {{ Form::text('range',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('range'))
                        <span class="text-danger">{{ $errors->first('range') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group text-center col-md-4 col-md-offset-8">
            <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('edit') }}</button>
        </div>

        {{ Form::close() }}
    </div>
@stop