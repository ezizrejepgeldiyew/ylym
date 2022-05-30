@extends('layouts.app1')
@section('skilet')

@livewire('search_users')

    <div id="timer"></div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Statistika</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>F.A.A</th>
                                        <th>Sapagyn ady</th>
                                        <th>Dogry jogap</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($TalypLogin as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->User->name }}</td>
                                            <td>{{ $item->LessonName->name }}</td>
                                            <td>{{ count(json_decode($item->dogry_j)) }}</td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger"
                                                        style="width: {{ (count(json_decode($item->dogry_j)) * 100) / count(json_decode($item->jogap_s)) }}%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span
                                                    class="badge bg-danger">{{ (count(json_decode($item->dogry_j)) * 100) / count(json_decode($item->jogap_s)) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $TalypLogin->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </section>


    </div>
    <a href="{{ route('usertest',1) }}" id="log" hidden>

        <script>
        var time = {{ $time }}
        </script>
    <script src="{{ asset('js/script1.js') }}"></script>
@endsection
