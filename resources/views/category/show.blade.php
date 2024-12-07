@extends('layouts.frontend')

@section('content')


    <div class="container">
        <div raw>
            <div class="col-mid-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Category Detail
                            <a href="{{url('category')}}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label>Name</label>
                                <p>
                                    {{$category->name}}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <p>
                                    {!! $category->description !!}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <p>
                                    {{$category->status == 1 ? 'checked':''}} 
                                </p>    
                            </div>
                            <div>
                                <br>
                                <a href="{{ route('categories.download', $category->id) }}" class="btn btn-primary">Download PDF</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection