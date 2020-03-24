@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <form method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="products-columns">
                <table style="width:100%;">
                    <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="{{ $news->title }}" />
                            @if($errors->has('title'))
                                <span style="color:red;">{{ $errors->first('title') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description">{!! $news->description !!}</textarea>
                            @if($errors->has('description'))
                                <span style="color:red;">{{ $errors->first('description') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image</td><td><input type="file" name="image" />
                            <img style="width:250px;" src="{{ asset($news->image_path) }}" />
                            @if($errors->has('image'))
                                <span style="color:red;">{{ $errors->first('image') }}</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" value="Save" style="margin-top:30px;" />
            </div>
        </form>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom', '')
