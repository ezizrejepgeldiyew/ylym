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
                        <form action="{{ route('LessonName.update',['LessonName'=>$LessonName->id]) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-2 label-control">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control col-6 @error('name') is-invalid @enderror"
                                            id="inputEmail3" placeholder="Name" name="name" value="{{ $LessonName->name }}">
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
@endsection
