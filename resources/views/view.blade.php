@extends('layouts.main')

@section('container')
<div class="container col-md-8" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('LIST OF BOOKS') }} </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Price</th>
                                <th scope="col">Release</th>
                                <th scope="col">Category</th>
                                @can('admin')
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            <!-- for(int i=0 ; i<2 ; i++){
                                printf(blablabla);
                            } -->
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/images/'.$book->image) }}" alt="{{ $book->title }}" style="height:50px"></td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->price }}</td>
                                <td>{{ $book->release }}</td>
                                <td>{{ $book->category->name }}</td>
                                @can('admin')
                                <td>
                                        <a href="/update/{{ $book->id }}"><button type="button" class="btn btn-success">Update</button></a>
                                    </td>
                                <td>
                                    <form action="{{ route('deleteBook', ['id' => $book->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

@endsection