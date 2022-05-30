@extends('layouts.app1')
@section('skilet')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sapagy sayla</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        @foreach ($LessonName as $item)
                            <div class="col-sm-6">
                                <a href="{{ route('usertest',$item->id) }}"><img class="img-fluid mb-3" src="/surat/{{$item->photo }}"
                                        alt="{{ $item->name }}"></a>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
