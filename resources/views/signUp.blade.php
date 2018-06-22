<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Sign Up</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <div style="width:100%; max-width: 350px; margin: 10px auto;">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align: center">Register Page</div>
                    <div class="panel-body">
                        @if(isset($msg))
                            <p class="bg-success text-success" style="padding: 8px;">{{$msg}}</p>
                        @endif
                        @if(isset($err))
                            <p class="bg-danger text-danger" style="padding: 8px;">{{$err}}</p>
                        @endif
                        <form action="<?=url('sign-up');?>" autocomplete="off" method="post">
                            {{csrf_field()}}
                            <input id="username" style="display:none" type="text" name="fakeusernameremembered">
                            <input id="password" style="display:none" type="password" name="fakepasswordremembered">

                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input id="username" name="username" class="form-control" type="text" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="Remember">Remember value</label>
                                <input id="Remember" name="Remember" class="form-control" type="text" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="conf-password1">Confirm Password</label>
                                <input id="conf-password" name="conf-password" type="password" class="form-control" autocomplete="new-password1">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>