@extends('layouts.layout')

@section('content')
    <div class="app" id="app">
        <!--Vue load -->
    </div>
    <div>
        @if(\Auth::check())
            <div id="endBack" class="d-none">
                {!! Form::open(["route" => "trainning.store"]) !!}
                   {!! Form::number("point", null, ["class" => "form-control invisible","id" => "appInfo"]) !!}
                   {!! Form::submit('トップへ戻る', ["class" => "btn btn-primary btn-block"]) !!}  
                 {!! Form::close() !!}
            </div>
        @else
            <a href="/" class="d-none" id="back">トップへ戻る</a>
        @endif
    </div>
@endsection

<script>
    var app = "{{$app}}";
    console.log(app);
</script>