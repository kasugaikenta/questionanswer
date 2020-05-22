@extends('layouts.app')
@section('content')
<?php
    date_default_timezone_set('Asia/Tokyo');
?>

<!-- stylesheetの読み込み20200520 16:04 -->
<link href="{{ secure_asset('css/index.css') }}" rel="stylesheet">

<!-- imageの追加20200520 -->
<!-- class'filter'を削除 2020/5/22 9:55 -->
<div class="top-page">
    <img class="top-image" src="{{ secure_asset('/images/top2.png') }}">
    <div id="main_titles">
        <h1>engのたまり場</h1>
    </div>
    <p>ひとりじゃない、みんなで作り上げよう</p>
</div>
    
<div class="question_list_container">
    <div class="question_list">
        <div　id="top-h2"><h2>質問一覧</h2></div>
        <form action="{{ url('search')}}" method="GET">
        {{csrf_field()}} 
            <label for="listing" class="col-sm-3 control-label">タグ検索</label>
                <select name="categorie_tag" class="border border-secondary rounded">
                    <option value="{{'-'}}">-</option>
                    <option value="{{'すべて'}}">すべて</option>
                    <option value="{{'C言語'}}">C言語</option>
                    <option value="{{'C++'}}">C++</option>
                    <option value="{{'Java'}}">Java</option>
                    <option value="{{'HTML'}}">HTML</option>
                    <option value="{{'CSS'}}">CSS</option>
                    <option value="{{'Java Script'}}">Java Script</option>
                    <option value="{{'PHP'}}">PHP</option>
                    <option value="{{'Ruby'}}">Ruby</option>
                    
                </select>
            <button type="submit" class="btn-outline-secondary rounded">検索</button>
        </form>
        
        <form action="{{ url('searchkeywords')}}" method="GET">
        {{csrf_field()}} 
            <label for="listing" class="col-sm-3 control-label">キーワード検索</label>
            <input type="text" name="search_keywords" class="border border-secondary rounded" value="{{old('search_keywords',$search_keywords)}}">
            <button type="submit" class="btn-outline-secondary rounded">検索</button>
        </form>
        <?php
            if(empty($questions)){
                echo("<p>検索結果が得られませんでした...</p>");
                echo("<p>わからなければ聞いてみよう！</p>");
                echo("<p>↓</p>");
            }else if($search_keywords == ""){
                echo("<p>検索テキストには、必ず言葉を入力してください。<p>");
            }
        ?>
        <div class="container">
            <div class="row">
                @foreach ($questions as $question)
                    <div class="col-md-5 question_wrapper">
                        <!-- divタグ追加20200520 17:37 -->
                        <div class="question-list">
                            <a class="question_answer_link" href="/detail/{{$question->id}}">
                                <h3 class="question_title">{{ $question->title }}</h3> <!-- 質問のタイトル -->
                                <div id="option"><!-- title以外の文字を薄くするoption追加 2020/05/22 9:57 -->
                                    <div id="tag-design" class="chose_categorie">
                                        @if($question->tag1 != "-")
                                            <input type="text" value="{{old('tag1',$question->tag1)}}" style="background-color : white" readonly>
                                        @endif
                                        @if($question->tag2 != "-")
                                            <input type="text" value="{{old('tag2',$question->tag2)}}" style="background-color : white" readonly>
                                        @endif
                                        @if($question->tag3 != "-")
                                            <input type="text" value="{{old('tag3',$question->tag3)}}" style="background-color : white" readonly>
                                        @endif
                                    </div>
                                    <!-- 20200520 17:38 -->
                                    <div class="question_user">{{ $question->user->name }}</div> <!-- ユーザ名 pタグのがいい？ -->
                                    <div class="question_time">{{ $question->created_at }}</div> <!-- 投稿日時 -->
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="btnWrapper">
        <a class="btn" href="{{ url('/question') }}">質問する</a> <!-- ログインしてなかったらログイン画面へ -->
    </div>
</div>

@endsection

