@extends('layouts.app1')
@section('skilet')
    <h1 class="m-0">Dashboard v2</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                                <form action="{{ route('Questions.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="custom-file text-left">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Sign in</button>
                                </form>
                        </div>
                    </div>

                    <div class="card">
                        @if (count($Question))
                            <div class="card-body p-0">

                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Sapagyň ady</th>
                                            <th>Sorag</th>
                                            <th>Jogaplar</th>
                                            <th>Dogry Jogap</th>
                                            <th>Bal</th>
                                            <th>Goýlan Wagty</th>
                                            <th style="width: 10px">Ulgamlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Question as $k => $v)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td>
                                                    {{ $v->LessonName->name }}
                                                </td>
                                                <td>{{ $v->question }}</td>
                                                <td>
                                                    @foreach (json_decode($v->answers) as $item)
                                                        {{ $item }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $v->right_answer }}</td>
                                                <td>{{ $v->bal }}</td>
                                                <td>{{ $v->updated_at }}</td>

                                                <td class="col-2">
                                                    <a href="{{ route('Questions.edit', ['Question' => $v->id]) }}"
                                                        class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('QuestionExport',$v->id) }}"
                                                        class="btn btn-success btn-sm float-left mr-1">
                                                        <i class="fas fa-file-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('Questions.destroy', ['Question' => $v->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Siz pozmak isleyanizmi')">
                                                            <i class="fas fa-trash-alt"></i></button>
                                                    </form>



                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        @else
                            <p>Maglumat yok</p>
                        @endif
                    </div>

                </div>
            </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(".checkbox").click(function() {
            var right_answer = new Array();
            $("input[id=rigth_answer]:checked").each(function() {
                right_answer.push(this.value);
            });
            console.log(right_answer);
            $('.right_answer').val(right_answer)
        });
    </script>
@endsection
