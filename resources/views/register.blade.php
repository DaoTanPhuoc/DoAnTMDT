@extends('layout.app')

@section('slider')
{
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="#">
                            @csrf
                            <input type="text" placeholder="Name"/>
                            <input type="email" name="email" placeholder="Email Address"/>
                            <input type="password" name="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
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
	