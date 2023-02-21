@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/about.css">
    <title>Course:{{ $course->title }}</title>
</head>
<body>
    <section class="about" id="about">


    <div class="image">
        <iframe width="420" height="315"
            @if(Auth::guest())
                src="{{ asset('../'.$course['video_path']) }}"
            @endif
             @if(Auth::user())
                @if($enroll==0)
                     src="{{ asset('../'.$course['video_path']) }}"
                @endif
                @if($enroll==1)
                    src="https://www.youtube.com/embed/videoseries?list={{$course->url}}"
                @endif
            @endif
        allowfullscreen="allowfullscreen">
        </iframe>
    </div>
    <div class="content">
        <h1 style="font-size: 30px;margin-bottom:10px;">{{ $course->title }}</h1>
        <span>{{$count}} student enroll in it</span>
        <p>{{ $course->description }}</p>
    @if(Auth::user())
        @if(Auth::user()->user_role=="student")
                <form method="POST" action="/enroll/course/{{ $course->id}}">
                @csrf
            @if($enroll==0)
                <button class="btn">Enroll</button>
            @endif
            </form>
            @if($enroll==1)
                @if($quizzes!=null)
                        @if($scores==true)
                            @if($scores[0]->Score<50)
                                @if($scores[0]->Quiz_num==1)
                                    <form action="{{$quizzes[0]->Quiz_2}}">
                                            <input type="submit" class="btn"id="btnQuiz2" value="Quiz_2" >
                                    </form>
                                @endif
                                @isset($scores[1])
                                    @if($scores[1]->Score<50 )
                                        <form action="{{$quizzes[0]->Quiz_3}}" id="my-form">
                                            <input type="submit" class="btn" id="btnQuiz3" value="Quiz_3">
                                        </form>
                                    @endif
                                @endisset
                            @endif
                        @endif
                            @if($scores==false)
                                <form action="{{$quizzes[0]->Quiz_1}}" method="GET">
                                    <input type="submit" class="btn" id="btnQuiz1" value="Quiz_1" >
                                </form>
                            @endif
                 @endif
                @if($quizzes==null)
                    <span style="font-size: 20px;color:seagreen"> Wait until the quiz be ready</span>
                @endif
                @if($scores==true)
                    @if($scores[0]->Score>=50 )
                        <form action="/getcertificate/{{$course->id}}" method="GET">
                            <input type="submit" class="btn" id="btnQuiz3" value="Education Certificate">
                        </form>
                    @else
                        @isset($scores[1])
                            @if($scores[1]->Score>=50 )
                                <form action="/getcertificate/{{$course->id}}" method="GET">
                                    <input type="submit" class="btn" id="btnQuiz3" value="Education Certificate">
                                </form>
                            @endif
                        @endisset
                        @isset($scores[2])
                            @if($scores[2]->Score>=50 )
                                <form action="/getcertificate/{{$course->id}}" method="GET">
                                    <input type="submit" class="btn" id="btnQuiz3" value="Education Certificate">
                                </form>
                            @endif
                        @endisset
                    @endif
                @endif
            @endif
        @endif
    @endif

    @if(Auth::guest())
        <h1 style="font-size: 20px;color:seagreen">Go login or register
            to enroll the {{$course->title}} course </h1>
    @endif
    </div>
</section>

@endsection