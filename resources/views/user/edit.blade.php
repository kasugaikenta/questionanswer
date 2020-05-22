@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <!-- リスト更新フォーム -->
  <form action="{{ url('/user/edit/update')}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group row " style="margin-top:20px;"> 
        <label for="listing" class="col-sm-3 col-form-label text-md-right" >名前</label> 
        <div class="col-md-6"> 
          <!-- リスト名 --> 
          <input type="text" name="list_name" value="{{ old('user_name', $auth->name) }}" class="form-control"> 
        </div>
      </div>
      <div class="form-group row"> 
        <label for="listing" class="col-sm-3 col-form-label text-md-right">メールアドレス</label> 
        <div class="col-md-6"> 
          <!-- リスト名 --> 
          <input type="text" name="list_email" value="{{ old('user_email', $auth->email) }}" class="form-control"> 
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-md-3 col-form-label text-md-right">新しい{{ __('パスワード') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('user_password')}}">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('パスワードの確認') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
        </div>
      </div>
      
      <div class="form-group row"> 
        <div class="col-sm-12 text-center"> 
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-saved"></i> 更新
          </button> 
        </div>
      </div>
    </form>
</div>
@endsection