@extends('layouts.frontend')

@section('content')


    <div class="container">
        <div raw>
            <div class="col-mid-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Category
                            <a href="{{url('category')}}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea type="text" name="description" rows="3" class="form-control"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" checked style="width:15px;height:15px"/><br/>Checked=visible, unchecked=hidden                                
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection