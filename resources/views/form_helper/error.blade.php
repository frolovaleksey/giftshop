@if ($errors->has($name))
    @foreach($errors->get($name) as $err_msg )
        <p class="help-block">{{$err_msg}}</p>
    @endforeach
@endif