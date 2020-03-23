@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <form method="POST" autocomplete="off">
            @csrf
            <div class="products-columns">
                <table style="width:100%;">
                    <thead>
                        <tr><th>Description</th><th>Value</th></tr>
                    </thead>
                    <tbody>
                    @foreach($all_settings as $opt)
                        <tr>
                            <td>{{ $opt->human_description }}</td>
                            <td><input style="width:100%;" type="text" name="{{ $opt->key }}" value="{{ $opt->value }}" /></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <input type="submit" value="Save" style="margin-top:30px;" />
            </div>
        </form>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom', '')
