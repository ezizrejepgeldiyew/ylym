@extends('layouts.app1')
@section('skilet')
    <h1 class="m-0">Dashboard v2</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <form action="{{ route('Questions.update', ['Question' => $Question->id]) }}" method="POST"
                            class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="1" class="col-2 label-control">Sapagyň ady</label>
                                    <select class="form-control col-6" name="lesson_id" id="1">
                                        <option value="{{ $Question->id }}">{{ $Question->LessonName->name }}
                                        </option>
                                        @foreach ($LessonName as $item)
                                            @if ($item->id != $Question->lesson_id)
                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="question" class="col-2 label-control">Sorag</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control col-6 @error('question') is-invalid @enderror" id="question"
                                            placeholder="Name" name="question" value="{{ $Question->question }}">
                                    </div>
                                </div>
                            </div>

                            @foreach (json_decode($Question->answers) as $item)
                                <div class="card-body">
                                    <div class="form-group row">

                                        <label for="answers" class="col-2 label-control">A</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control col-6 @error('answers') is-invalid @enderror"
                                                id="answers" placeholder="Name" name="answers[]"
                                                value="{{ $item }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jogap" class="col-2 label-control">Jogap</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control col-6 @error('jogap') is-invalid @enderror" id="jogap"
                                            placeholder="jogap" name="right_answer" value="{{ $Question->right_answer }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="bal" class="col-2 label-control">Bal</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control col-6 @error('bal') is-invalid @enderror" id="bal"
                                            placeholder="Name" name="bal" value="{{ $Question->bal }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="text/javascript">
    $.(".checkbox").click(function(){
        var right_answer = new array();
        $("input[id=rigth_answer]:checked").each(function() {
                right_answer.push(this.value);
            });
            console.log(right_answer);
            $('.right_answer').val(right_answer)
    })
    </script>
@endsection
