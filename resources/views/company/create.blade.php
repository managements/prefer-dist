@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-4">
                <h4 class="page-title">{{ __('create') }}</h4>
            </div>
        </div>
        {{ Form::open(['method'=>'POST','url'=>route('companies.store'),'enctype'=>"multipart/form-data"]) }}
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input name="brand_" class="form-control" type="file">
                    <small class="help-block">{{ __('your brand please') }}</small>
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('name',__('validation.attributes.name'),['class'=>'control-label']) }}
                        {{ Form::text('name',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('email',__('validation.attributes.email'),['class'=>'control-label']) }}
                        {{ Form::email('email',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('tel',__('validation.attributes.phone'),['class'=>'control-label']) }}
                        {{ Form::tel('tel',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('tel'))
                        <span class="text-danger">{{ $errors->first('tel') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('speaker',__('validation.attributes.speaker'),['class'=>'control-label']) }}
                        {{ Form::text('speaker',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('speaker'))
                        <span class="text-danger">{{ $errors->first('speaker') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('licence',__('validation.attributes.licence'),['class'=>'control-label']) }}
                        {{ Form::text('licence',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('licence'))
                        <span class="text-danger">{{ $errors->first('licence') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('address',__('validation.attributes.address'),['class'=>'control-label']) }}
                        {{ Form::text('address',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('build',__('validation.attributes.build'),['class'=>'control-label']) }}
                        {{ Form::text('build',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('build'))
                        <span class="text-danger">{{ $errors->first('build') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('floor',__('validation.attributes.floor'),['class'=>'control-label']) }}
                        {{ Form::text('floor',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('floor'))
                        <span class="text-danger">{{ $errors->first('floor') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('apt_nbr',__('validation.attributes.apt_nbr'),['class'=>'control-label']) }}
                        {{ Form::text('apt_nbr',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('apt_nbr'))
                        <span class="text-danger">{{ $errors->first('apt_nbr') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('zip',__('validation.attributes.zip'),['class'=>'control-label']) }}
                        {{ Form::text('zip',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('zip'))
                        <span class="text-danger">{{ $errors->first('zip') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="">
                        <select name="city" id="city" class="" title="city">
                            <option>----------</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
            </div>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('sold',__('validation.attributes.sold'),['class'=>'control-label']) }}
                        {{ Form::text('sold',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('sold'))
                        <span class="text-danger">{{ $errors->first('sold') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-focus">
                        {{ Form::label('turnover',__('validation.attributes.turnover'),['class'=>'control-label']) }}
                        {{ Form::text('turnover',null,['class'=> 'form-control floating','required']) }}
                    </div>
                    @if($errors->has('turnover'))
                        <span class="text-danger">{{ $errors->first('turnover') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group text-center col-md-4 col-md-offset-8">
            <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('add') }}</button>
        </div>

        {{ Form::close() }}
    </div>
@stop