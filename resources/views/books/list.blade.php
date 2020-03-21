@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="table table-bordered table-secondary" style="width:100%">
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-bottom')
    asdsda
    asdasd
@endsection
