@extends('layouts.app1')
@section('skilet')
    <h1 class="m-0">Dashboard v2</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('TalypLogin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="custom-file text-left">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Import data</button>
                                {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        @if (count($TalypLogin) > 1)
                            <div class="card-body p-0">

                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Doly ady</th>
                                            <th>Email</th>
                                            <th>Parol</th>
                                            <th>Goýlan Wagty</th>
                                            <th style="width: 10px">Ulgamlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TalypLogin as $k => $v)
                                            @if ($k + 1 > 1)
                                                <tr>
                                                    <td>{{ $k }}</td>
                                                    <td>{{ $v->name }}</td>
                                                    <td>{{ $v->email }}</td>
                                                    <td>{{ $v->password }}</td>
                                                    <td>{{ $v->updated_at }}</td>

                                                    <td class="col-2">
                                                        <a href="{{ route('TalypLogin.edit', ['TalypLogin' => $v->id]) }}"
                                                            class="btn btn-info btn-sm float-left mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="{{ route('TalypLoginExport',$v->id) }}"
                                                            class="btn btn-success btn-sm float-left mr-1">
                                                            <i class="fas fa-file-alt"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('TalypLogin.destroy', ['TalypLogin' => $v->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Siz pozmak isleyanizmi')">
                                                                <i class="fas fa-trash-alt"></i></button>
                                                        </form>



                                                    </td>
                                                </tr>
                                            @endif
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
@endsection
