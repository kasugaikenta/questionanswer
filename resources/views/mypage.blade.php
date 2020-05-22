@extends('layouts.app')
@section('content')


<div class="question_list_container">
    <div class="question_list">
        <h2></h2>
        <h2>マイページ あなたの質問一覧</h2>
        <div class="container">
            <div class="row">
                @foreach ($questions as $question)
                    @if($question->flag == 1)
                        <!--styleのbackgroundは消しても大丈夫です。-->
                        <div class="col-md-5 question_wrapper" id="omote">
                            <div class="tuuti">
                                <div class="question-list">
                                    <a class="question_answer_link" href="/question/viewed/{{$question->id}}">
                                        <!--消してもいいやつ-->
                                        <!--<i class="glyphicon glyphicon-ok">通知</i>-->
                                        <!--通知機能をわかりやすくしたかったからつけたやつ-->
                                        <h3 class="question_title">{{ $question->title }}</h3><!-- 質問のタイトル -->
                                        <div class="question_time">{{ date($question->created_at) }}</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="question_wrapper-behind" id="behind" style="background-color:red;">
                            <div class="tuuti" id="ushiro">
                                <div class="question-list">
                                    <a class="question_answer_link" href="/question/viewed/{{$question->id}}">
                                        <!--消してもいいやつ-->
                                        <!--<i class="glyphicon glyphicon-ok">通知</i>-->
                                        <!--通知機能をわかりやすくしたかったからつけたやつ-->
                                        <h3 class="question_title">{{ $question->title }}</h3><!-- 質問のタイトル -->
                                        <div id="option">
                                            <div class="question_time">{{ date($question->created_at) }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <script>
                            var element = document.getElementById("omote");
                            var width = element.clientWidth;
                            var width_behind = document.getElementById("behind");
                            width_behind.style.width = (width)*1.05+"px";
                        </script>
                    @endif
                @endforeach
                
                @foreach ($questions as $question)
                    @if($question->flag == 0)
                        <div class="col-md-5 question_wrapper">
                            <div class="question-list">
                                <a class="question_answer_link" href="/detail/{{$question->id}}">
                                    <h3 class="question_title">{{ $question->title }}</h3><!-- 質問のタイトル -->
                                    <div id="option">
                                        <div class="question_time">{{ date($question->created_at) }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="btnWrapper">
        <a class="btn" href="{{ url('/question') }}">質問する</a> <!-- ログインしてなかったらログイン画面へ -->
    </div>
</div>
@endsection
