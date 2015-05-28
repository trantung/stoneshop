
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .form-login-account{
        min-width: 30%;
        max-width: 30%;
        margin: 0 auto;
        margin-top: 15%;
    }
    body{
        /*background: rgba(0, 0, 0, 0.81);*/
        background: blue;
    }
    #form-login>h3{
        margin-top: 5px;
        font-size: 20px;
    }
    #form-login{
        background: #fff;
        padding:10px;
        margin: 10px;
        border-radius: 7px;
        border:solid 5px rgba(200, 200, 200, 1);
    }
    </style>
</head>
<body>
<div class="form-login-account">
    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div style = "color:red">{{ $error }}</div>
        @endforeach
    @endif

    {{ Form::open(array('id'=> 'form-login' ,'route'=>'post.admin.login')) }}
    <h3>Login admin shop</h3>
    <div class="input-group input-group-sm">
      {{Form::text('email','',array('class'=>'form-control','placeholder'=>'Email đăng nhập'))}}
    </div>
        <br/>
    <div class="input-group input-group-sm">
      
      {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password đăng nhập'))}}
    </div>
    <br/>
        {{ Form::submit('Login', array('id' => 'submit', 'class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    
</div>
</body>