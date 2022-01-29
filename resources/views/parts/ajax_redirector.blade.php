@if(request()->ajax())
    <script>
        window.location.href = "{{env('APP_URL')}}";
    </script>
@endif
