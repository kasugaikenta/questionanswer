@extends('layouts.app')
@section('content')

<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <form action="{{ url('/answer/question',$question_id)}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
    <div class="form-group" id = "answer-form-area">
      <label for="listing" class="col-sm-3 control-label">質問者名</label>
      <input type="hidden" name="question_id" value="{{$question_id}}">
      <div class="col-sm-6"> 
      <?php
        use App\User;
        
        $questioner=User::where('id',$question->user_id)
          ->first();
      ?>
        <input type="text" name="questioner" class="form-control" value="{{ old('questioner', $questioner->name) }}" style="background-color : white" readonly>
      </div>
      <div>
        <label for="listing" class="col-sm-3 control-label">質問内容</label>
        <div class="col-sm-6"> 
          <textarea name="question_content" class="form-control" value="{{ old('question_content',$question->content) }}" style="resize : none; background-color : white" readonly>{{$question->content}}</textarea> 
        </div>
      </div>
      <div id="answer">
        <label for="listing" class="col-sm-3 control-label">回答</label>
        <div class="col-sm-6"> 
          <textarea name="answer_content" class="form-control"></textarea> 
        </div>
      </div>
      <?php
        date_default_timezone_set('Asia/Tokyo');
        $time = date("Y/m/d H:i:s");
      ?>
      <label for="listing" class="col-sm-3 control-label">回答日時</label> 
      <div class="col-sm-6"> 
        <input type="text" name="time" class="form-control" value="{{ old('time', $time) }}" style="background-color : white" readonly>
      </div>
      <label for="listing" class="col-sm-3 control-label">カテゴリ</label>
      <div class="col-sm-6">
        <input type="text" value="{{old('tag1',$question->tag1)}}" style="background-color : white" readonly>
        <input type="text" value="{{old('tag2',$question->tag2)}}" style="background-color : white" readonly>
        <input type="text" value="{{old('tag3',$question->tag3)}}" style="background-color : white" readonly>
      </div>
    </div>
    
    <div class="form-group"> 
      <div id="update"> 
        <button type="submit" id="answer-button" class="btn btn-default">
          回答する
        </button> 
      </div>
    </div>
  </form>
</div>
@endsection
