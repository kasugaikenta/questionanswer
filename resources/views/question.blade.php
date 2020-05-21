@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')
  <!-- 質問作成フォーム -->
  <form action="{{ url('questionsave')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <div　class="col-sm-6">
        <label for="listing" class="col-sm-3 control-label">質問者名</label> 
        <div class="col-sm-6"> 
          <input type="text" name="questioner" class="form-control" value="{{ old('questioner', Auth::user()->name) }}" style="background-color : white" readonly>
        </div>
        <label for="listing" class="col-sm-3 control-label">質問内容</label> 
        <div class="col-sm-6"> 
          <textarea name="question_content" class="form-control"></textarea>
        </div>
        <?php
          date_default_timezone_set('Asia/Tokyo');
          $time = date("Y/m/d H:i:s");
        ?>
        <label for="listing" class="col-sm-3 control-label">質問日時</label> 
        <div class="col-sm-6"> 
          <input type="text" name="time" class="form-control" value="{{ old('time', $time) }}"  style="background-color : white" readonly>
        </div>
        <label for="listing" class="col-sm-3 control-label">カテゴリ</label>
        <div class="col-sm-6">
          <select name="categorie_tag1" value="old{{'-'}}">
            <option value="{{'-'}}" selected>-</option>
            <option value="{{'C言語'}}">C言語</option>
            <option value="{{'C++'}}">C++</option>
            <option value="{{'Java'}}">Java</option>
            <option value="{{'HTML'}}">HTML</option>
            <option value="{{'CSS'}}">CSS</option>
            <option value="{{'Java Script'}}">Java Script</option>
            <option value="{{'PHP'}}">PHP</option>
            <option value="{{'Ruby'}}">Ruby</option>
          </select>
          <select name="categorie_tag2" value="old{{'-'}}">
            <option value="{{'-'}}" selected>-</option>
            <option value="{{'C言語'}}">C言語</option>
            <option value="{{'C++'}}">C++</option>
            <option value="{{'Java'}}">Java</option>
            <option value="{{'HTML'}}">HTML</option>
            <option value="{{'CSS'}}">CSS</option>
            <option value="{{'Java Script'}}">Java Script</option>
            <option value="{{'PHP'}}">PHP</option>
            <option value="{{'Ruby'}}">Ruby</option>
          </select>
          <select name="categorie_tag3" value="old{{'-'}}">
            <option value="{{'-'}}" selected>-</option>
            <option value="{{'C言語'}}">C言語</option>
            <option value="{{'C++'}}">C++</option>
            <option value="{{'Java'}}">Java</option>
            <option value="{{'HTML'}}">HTML</option>
            <option value="{{'CSS'}}">CSS</option>
            <option value="{{'Java Script'}}">Java Script</option>
            <option value="{{'PHP'}}">PHP</option>
            <option value="{{'Ruby'}}">Ruby</option>
          </select>
        </div>
      </div>
      <div class="form_group">
          <button type="submit" class="btn btn-default">質問する</button>
      </div>
    </div>
  </form>
</div> 
@endsection