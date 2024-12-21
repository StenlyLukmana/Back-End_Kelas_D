@extends('layouts.main')

@section('container')
<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('CREATE NEW CATEGORY') }} </div>
            <div class="card-body">
                <form action="/create-category" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Text">
                    </div>

                    <button type="submit" class="btn btn-primary">Insert</button>

                </form>
            </div>
        </div>
    </div>
@endsection