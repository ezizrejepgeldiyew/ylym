@extends('layouts.app1')
@section('skilet')
    <h1 class="m-0">Dashboard v2</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <form action="{{ route('TalypLogin.update', ['TalypLogin' => $TalypLogin->id]) }}" method="POST"
                            class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-2 label-control">Doly ady</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control col-6 @error('name') is-invalid @enderror" id="name"
                                             name="name" value="{{ $TalypLogin->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="email" class="col-2 label-control">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control col-6 @error('email') is-invalid @enderror" id="email"
                                             name="email" value="{{ $TalypLogin->email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="password" class="col-2 label-control">Parol</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control col-6 @error('password') is-invalid @enderror" id="password"
                                             name="password" value="{{ $TalypLogin->password }}">
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
@endsection
