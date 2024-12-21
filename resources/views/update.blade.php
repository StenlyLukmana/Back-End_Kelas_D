@extends('layouts.main')

@section('container')
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __($book->title) }}</div>
            <div class="card-body">
                <form action="/update/{{ $book->id }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $book->title }}">
                    </div>
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Author</label>
                        <input name="author" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $book->author }}">
                    </div>
                    @error('author')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $book->price }}">
                    </div>
                    @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Release</label>
                        <input name="release" type="date" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $book->release }}">
                    </div>
                    @error('release')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $book->image }}">
                    </div>
                    @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" id="">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $book->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection