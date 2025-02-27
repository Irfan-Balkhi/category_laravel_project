@extends('layouts.frontend')

@section('content')


    <div class="container">
        <div raw>
            <div class="col-mid-12">
                @session('status')
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>Categories list
                            <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    
                                <tr>
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->name}}</td>
                                    <td>{{ $category->description}}</td>
                                    <td>{{ $category->status == 1 ? 'Visible':'Hidden'}}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('category.show', $category->id)}}" class="btn btn-info">Show</a>
                                        
                                        <form action="{{ route('category.destroy',$category->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" href="" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('categories.download', $category->id) }}" class="btn btn-primary">Download</a>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection