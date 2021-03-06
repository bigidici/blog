@extends('layouts.app')

@section('content')
    
    <div class="d-flex justify-content-end mb-2">

        <a href="{{route('posts.create')}}" class="btn btn-success">Add</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
           
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                </thead>
                <tbody>
                 @foreach ($posts as $post)
                <tr>
                    
                    <td><img src="{{asset("storage/".$post->image)}}" alt="" width="120px" heigth="60px"></td> 
                    <td>{{$post->title}}</td>       
                      
                    <td>
                        <a href="{{route('posts.edit', $post)}}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$post->id}})">Delete</button>
                    </td>
                </tr>  
                 
     
                 @endforeach
                </tbody>
            </table>
 
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                   <form action="" method="post" id="deleteCategoryForm">
                       @csrf
                       @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">Etes vous sur de vouloir supprimer cette categorie ?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                   </form>
            
                </div>
            </div>

@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/posts/'+ id
            
            $('#deleteModal').modal('show')
             
        }
    </script>
@endsection
