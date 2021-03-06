
            <nav class="navbar-custom navbar navbar-expand-lg  navbar-light bg-dark">
                <a class="navbar-brand text-white" href="/">SHAHBLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right">
                    @if(Auth::user())
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                    
                            <a class="nav-link text-white" href="{{url('/create')}}">Add Posts <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item">
                    
                            <a class="nav-link text-white" href="{{url('/logout')}}">Logout <span class="sr-only">(current)</span></a>
                        </li>
                        @else
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="/login">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="/register">Register <span class="sr-only">(current)</span></a>
                        </li>
                        @endif
                       
                    </ul>
                </div>
            </nav>