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
                            <td>Category</td>
                            <td>
                                <select name="category_id">
                                    <option></option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                                @if($cat->id == $product->category_id)
                                                selected
                                            @endif
                                        >{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="inline-error">{{ $errors->first('category_id') }}</div>
                                @endif
                            </td>
                            <td rowspan="5">
                                <img src="{{ asset($product->photo_path) }}" />
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>
                                <input type="text" name="title" value="{{ $product->title }}" />
                                @if($errors->has('title'))
                                    <div class="inline-error">{{ $errors->first('title') }}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="text" name="price" value="{{ $product->price }}" />
                                @if($errors->has('price'))
                                    <div class="inline-error">{{ $errors->first('price') }}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea name="description">{!! $product->description !!}</textarea>
                                @if($errors->has('description'))
                                    <div class="inline-error">{{ $errors->first('description') }}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" name="image" />
                                @if($errors->has('image'))
                                    <div class="inline-error">{{ $errors->first('image') }}</div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn" value="Save" style="margin-top:30px;" />
            </div>
        </form>
    </div>

    <div class="content-footer__container"></div>
@endsection

@section('content-bottom', '')
