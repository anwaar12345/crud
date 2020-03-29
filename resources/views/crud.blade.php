@extends("welcome")
@section("content")
<div style="margin-top:50px; margin-bottom:5px;">

        <div class="container">
       
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <h3 class="text-center text-info">Make a Post</h3>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        <form id="login-form" class="form" action="{{ route('create.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label  class="text-info">Post:</label><br>
                               <textarea name="post" cols="30" rows="5" class="form-control" style="resize:none;"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label  class="text-info">Upload Post Images:</label><br>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                            
                            <div class="form-group">
                                <label  class="text-info">Created By:</label><br>
                                <input type="text" name="createdby" class="form-control">
                            </div>


                            <div id="register-link" class="text-right">
                                <input type="submit" value="Create Post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection