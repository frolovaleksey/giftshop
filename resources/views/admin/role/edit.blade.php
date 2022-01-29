@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::model($item, array('route' => array('roles.update', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}

        @include('admin.role.form')

    @endcomponent

</div></div></div></div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet light">

            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green-sharp bold uppercase">{{__('role.copy_permissions')}}</span>
                </div>
            </div>
            <div class="portlet-body">
                {!! Form::model($item, array('route' => array('role.copy_permission', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}
                <div class="form-body">
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">{{__('role.role')}}</label>
                        <div class="col-md-4">
                            <select name="role" class="form-control">
                                <option value="">--</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-success" type="submit" value="save">{{__('global.copy')}}</button>
                            </div>
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">

        <div class="portlet light">

            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green-sharp bold uppercase">{{__('role.permissions')}}</span>
                </div>
            </div>

            <div class="portlet-body">

                {!! Form::model($item, array('route' => array('role_set_permission', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}
                <td class="form-body">
                    <tr class="form-group">
                        <table class="table table-bordered table-hover">
                        @foreach( $permissions as $item_permission )
                            <tr @if( $item->hasPermissionTo($item_permission->name) )class="checked" @endif>
                                <td>
                                    @if( $item->hasPermissionTo($item_permission->name) )
                                        {!! Form::checkbox('permissions[]', $item_permission->name, true ) !!}
                                    @else
                                        {!! Form::checkbox('permissions[]', $item_permission->name, false ) !!}
                                    @endif
                                </td>
                                <td>
                                    {{__('permissions.'.$item_permission->name) }}
                                </td>
                                <td>
                                    {{$item_permission->name}}
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>

                @include('global.form_submit', ['cancel_url'=>route('users.index')])

                {!! Form::close() !!}


@endsection
