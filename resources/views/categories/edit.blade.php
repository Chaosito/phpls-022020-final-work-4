@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <form method="POST" autocomplete="off">
            @csrf
            <div class="products-columns">
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>
                                <input type="text" name="title" value="{{ $category->title }}" />
                                @if($errors->has('title'))
                                    <span style="color:red;">{{ $errors->first('title') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr><td>Description</td><td><textarea name="description">{{ $category->description }}</textarea></td></tr>
                    </tbody>
                </table>
                <input type="submit" value="Save" style="margin-top:30px;" />
            </div>
        </form>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom', '')
