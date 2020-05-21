@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <!-- リスト更新フォーム -->
  <form action="{{ url('user/edit')}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
    @csrf
        @method('PUT')
        パスワードを入力してください
        <input type="text" name="bank_account_number">
        <br>
        <button type="submit">送信する</button>
    
  </form>
</div>
@endsection