@extends('layouts.app')

@section('content')
    
    <div class="card card-default">
    <div class="card-header">{{isset($category) ? 'Edit Category' : 'Create Category'}}</div>
        <div class="card-body">
            <form action="{{isset($category) ? route('categories.update', $category): route('categories.store')}}" method="post">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                @if ($errors->any())
                    <div class="list-group-item text-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">{{$error}}</li>                                
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{isset($category) ? $category->name : ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{isset($category) ? 'Update' : 'Add'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection