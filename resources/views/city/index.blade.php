@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">@lang('list of cities')</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{ route('city.create') }}" class="btn btn-primary rounded pull-right"><i
                            class="fa fa-plus"></i> @lang('add city')</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border custom-table m-b-0">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-right">@lang('action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->city }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('city.edit',$city) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> @lang('update')</a></li>
                                            <li><a href="{{ route('city.destroy',$city) }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('{{ 'form-'.$city->id }}').submit();"><i
                                                            class="fa fa-trash-o m-r-5"></i> @lang('delete')</a>
                                                <form id="{{ 'form-'.$city->id }}"
                                                      action="{{ route('city.destroy',$city) }}" method="POST"
                                                      style="display: none;">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop