@extends('layout.app')

@section('slider')
{
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
						
					@if (session('sucess'))
						<p class="alert alert-sucess">{{session('sucess')}}</p>
					@endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <form method="POST" action="{{route('login.action')}}">
                            @csrf
                            
                            <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}"/>
                            <input type="password" name="password" placeholder="Password"/>
                            
                            <button type="submit" class="btn btn-default">login</button>
                            <a class="btn btn-danger" href="{{route('index')}}">Back</a>
                        </form>
                    </div><!--/sign up form-->
                </div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				
			</div>
		</div>
	</section><!--/form-->
}
@endsection
	

