@extends("welcome")
@section("content")
<div class="container" style="margin-top:50px;">


@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
    <td>ID</td>
    <td>Post Content</td>
    <td>created By</td>
    <td>Post Pictures</td>
    <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        
@foreach($posts as $post)
<tr>
<td>
{{ $post->id }}
</td>
<td>
{{ $post->post }}
</td>
<td>
{{ $post->createdby }}
</td>
<td>

@foreach(json_decode($post->images,true) as $image)
<img src="images/{{ $image }}" style="width:100px; height:100px; border:1px solid grey;">  
@endforeach

</td>
<td>  
<form  method="POST" id="delete-form-{{ $post->id }}" action="{{ route('delete',$post->id) }}" style="display:none;">
@csrf
@method('DELETE')
</form>
<button onclick="if(confirm('You Really Want To Delete ? ')){
event.preventDefault();
document.getElementById('delete-form-{{ $post->id }}').submit();
}else{
    event.preventDefault();
    }

"
 class="btn btn-danger">Delete</button>
 <a href="{{ route('show',$post->id) }}" class="btn btn-primary">See Post</a>
<a href="{{ route('edit',$post->id) }}" class="btn btn-primary">Update</a>


</td>
 </tr>
@endforeach
      </tbody>
    </table>
    {{ $posts->links() }}

  </div>
</div>
@endsection