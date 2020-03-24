@extends("welcome")
@section("content")

<div class="container">
  <div class="well">
      <div class="media">

    		
          @foreach(json_decode($post->images,true) as $image)
            <img class="media-object" src="../images/{{ $image }}" style="width:100px; height:100px; border:1px solid grey;">
            &nbsp;
            @endforeach
            
  		<div class="media-body">
    		<h4 class="media-heading">{{$post->createdby}}</h4>
          <p class="text-right">By {{$post->createdby}}</p>
          <p>{{$post->post}}</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> {{$post->created_at}} </span></li>
           
			</ul>
       </div>
    </div>
    <a href="/" class="btn btn-success">back</a>
    </div>

@endsection