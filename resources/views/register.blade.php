@extends('layouts.main')

@section('container')

<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Register User') }} </div>
            <div class="card-body">
                <form action="/register" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Text">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Input Text">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Input Text">
                    </div>

                    <button type="submit" class="btn btn-primary">Insert</button>

                    <small>Already have an account? <a href="/login">Login Here!</a></small>

                </form>
            </div>
        </div>
    </div>

@endsection