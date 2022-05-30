@extends('layouts.app1')
@section('skilet')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        @foreach ($Question as $item)
                            <div class="card">
                                <nav class="  navbar navbar-expand-lg navbar-light bg-info shadow-sm">
                                    <div class="card-body">
                                        <h4 class="text-center mb-1 ">{{ $item->LessonName->name }}</h4>
                                    </div>
                                </nav>
                                <div class="card-body">
                                    <h4 class="text-center mb-1">{{ $item->bal }} ballyk sorag</h4>



                                    <p class="font-weight-bold mb-2">
                                        Sorag : <span class="text-left">{{ $item->question }}</span>
                                    </p>
                                    <form action="{{ route('answertest',$item->id) }}" method="post">
                                        @csrf


                                        <input type="radio" name="jogap" value="{{ $item->answers['1'] }}">
                                        {{ $item->answers['1'] }}
                                        <br>
                                        <input type="radio" name="jogap" value="{{ $item->answers['3'] }}">
                                        {{ $item->answers['3'] }}<br>
                                        <input type="radio" name="jogap" value="{{ $item->answers['5'] }}">
                                        {{ $item->answers['5'] }}
                                        <br>
                                        <input type="radio" name="jogap" value="{{ $item->answers['7'] }}">
                                        {{ $item->answers['7'] }}
                                        <br>
                                        <center><button class="btn btn-info" id="button-addon2">Barla</button></center>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            @dd($posts);
                            
                        </div>

                        {{ $Question->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
