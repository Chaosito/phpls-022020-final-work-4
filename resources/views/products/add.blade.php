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
                        <td>Category</td>
                        <td>
                            <select name="category_id">
                                <option></option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                    @if($cat->id == $current_category)
                                        selected
                                    @endif
                                    >{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span style="color:red;">{{ $errors->first('category_id') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="{{ old('title') }}" />
                            @if($errors->has('title'))
                                <span style="color:red;">{{ $errors->first('title') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="{{ old('price') }}" />
                            @if($errors->has('price'))
                                <span style="color:red;">{{ $errors->first('price') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span style="color:red;">{{ $errors->first('description') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image</td><td><input type="file" name="image" />
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
