@extends('layout.app')

@section('slider')
{
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <form method="POST" action="{{route('register.action')}}">
                            @csrf
                            <input type="text" name="username" placeholder="Name" value="{{old('name')}}" />
                            
                            <input type="email" name="email" placeholder="Email Address"/>
                            <input type="password" name="password" placeholder="Password"/>
                            
                            <button type="submit" class="btn btn-default">Signup</button>
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
	