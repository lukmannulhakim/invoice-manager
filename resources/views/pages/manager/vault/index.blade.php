@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{trans('users.list')}} ({{$vaults->count()}})</h3>
                        <div class="box-tools">
                            <a href="{{action('Manager\VaultController@create')}}" class="btn btn-default btn-flat pull-right">
                                <i class="fa fa-user-plus"></i> {{trans('vault.create-action')}}
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{trans('vault.table-name')}}</th>
                                <th>{{trans('vault.table-description')}}</th>
                                <th>{{trans('vault.table-documents')}}</th>
                                <th>{{trans('vault.table-users')}}</th>
                                <th>{{trans('general.created-at')}}</th>
                                <th>{{trans('vault.table-actions')}}</th>
                            </tr>
                            </thead>
                            <tbody class="animated fadeIn">
                            @foreach($vaults as $vault)
                                <tr>
                                    <td class="font-w600">{{$vault->name}}</td>
                                    <td>{{$vault->description}}</td>
                                    <td>{{$user->documents->count()}}</td>
                                    <td>{{$user->users->count()}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{action('Manager\VaultController@show', $vault->id)}}" class="btn btn-flat btn-default" type="button" data-toggle="tooltip" title="{{trans('users.show-action')}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{action('Manager\VaultController@edit', $vault->id)}}" class="btn btn-flat btn-info" type="button" data-toggle="tooltip" title="{{trans('users.edit-action')}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{action('Manager\VaultController@destroy',['id' => $vault->id])}}" class="btn btn-flat btn-danger" data-method="DELETE" data-toggle="tooltip" title="{{trans('user:delete-action')}}" data-token="{{csrf_token()}}" data-confirm="{{trans('app.user.delete-action-warning')}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $vaults->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection