@extends('layouts.main')

@section('container')
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('CREATE NEW BOOK') }} </div>
            <div class="card-body">
                <form action="/create" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Text">
                    </div>
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Author</label>
                        <input name="author" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Author">
                    </div>
                    @error('author')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input Price">
                    </div>
                    @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Release</label>
                        <input name="release" type="date" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                    @error('release')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="formGroupExampleInput" placeholder="">
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Insert</button>

                </form>
            </div>
        </div>
    </div>

@endsection