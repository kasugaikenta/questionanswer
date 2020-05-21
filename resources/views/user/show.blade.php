@extends('layouts.app')
@section('content')
<div>

  <!-- カードの詳細情報-->
  {{csrf_field()}} 
    <div>
      <div>
        <div class="text-center ">
          <div class="col-md-12 control-label" style="margin-top:30px;">
            <label>名前</label>
          </div>
          <div class="col-md-12 " style="margin-bottom:30px;">
            <p>{{$user->name}}</p>
          </div>
        </div>
        <div class="text-center">
          <div class="col-md-12 control-label">
            <label>メールアドレス</label>
          </div>
          <div class="col-md-12" style="margin-bottom:30px;">
            <p>{{$user->email}}</p>
          </div>
        </div>
        <div class="text-center">
          <div class="col-md-12 control-label">
            <label>パスワード</label>
          </div>
          <div class="col-md-12" style="margin-bottom:30px;">
            <p>********</p>
          </div>
        </div>
        <div class="text-center">
          <div class="col-md-12 control-label">
            <label>登録日時</label>
          </div>
          <div class="col-md-12 " style="margin-bottom:30px;">
            <p>{{$user->created_at}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class=" col-md-12 text-center"> 
        <a class="cardDetail_link" href="/user/edit">
          <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i>&nbsp;&nbsp;編集する</button>
        </a>
      </div>
    </div>

  
</div> 
@endsection