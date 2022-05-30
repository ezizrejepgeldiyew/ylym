@extends('layouts.app1')
@section('skilet')
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
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">

                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <form action="{{ route('LessonName.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-2 label-control">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control col-6 @error('name') is-invalid @enderror"
                                            id="inputEmail3" placeholder="Name" name="name">
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="file" class="col-2 label-control">Surat</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control col-6"s
                                            id="file" placeholder="file" name="photo">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                            </div>
                        </form>
                    </div>



                    <div class="card">
                        @if (count($LessonName))
                            <div class="card-body p-0">

                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Ady</th>
                                            <th>Wagty</th>

                                            <th style="width: 10px">Ulgamlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LessonName as $k => $v)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td class="col-8">{{ $v->name }}</td>
                                                <td>{{ $v->updated_at }}</td>

                                                <td class="col-2">
                                                    <a href="{{ route('LessonName.edit', ['LessonName' => $v->id]) }}"
                                                        class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('LessonName.destroy', ['LessonName' => $v->id]) }}"
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
        </div>
    </section>
@endsection
