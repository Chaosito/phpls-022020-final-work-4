@extends('layouts.gameshop')

@section('title', $title)

@section('content-main')
    <div class="content-main__container">
        <form method="POST" autocomplete="off">
            @csrf
            <div class="products-columns">
                <table class="table-custom-form">
                    <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="" />
                            @if($errors->has('title'))
                                <div class="inline-error">{{ $errors->first('title') }}</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description">{{ old('description') }}</textarea>
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
