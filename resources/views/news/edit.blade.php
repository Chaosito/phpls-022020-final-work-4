@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <form method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="products-columns">
                <table class="table-custom-form">
                    <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="{{ $news->title }}" />
                            @if($errors->has('title'))
                                <div class="inline-error">{{ $errors->first('title') }}</div>
                            @endif
                        </td>
                        <td rowspan="3">
                            <img style="width:250px;" src="{{ asset($news->image_path) }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description">{!! $news->description !!}</textarea>
                            @if($errors->has('description'))
                                <div class="inline-error">{{ $errors->first('description') }}</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image</td><td><input type="file" name="image" />
                            @if($errors->has('image'))
                                <div class="inline-error">{{ $errors->first('image') }}</div>
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
