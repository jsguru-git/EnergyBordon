<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Login</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
          .panel-primary {
              height: calc(100vh - 50px);
              min-height: 300px;
          }
        </style>
    </head>
    <body>
        <div class="container">
                   <div style="width:100%; max-width: 400px; margin: 0 auto;margin-top: 20px;">
                       <div class="panel panel-primary">
                           <div class="panel-heading" style="text-align: center; font-size:18px;">Login Page </div>
                           <div class="panel-body">
                               @if(isset($err))
                                   <p class="bg-danger text-danger" style="padding: 8px;">{{$err}}</p>
                               @endif
                               <form action="<?=url('/login');?>" autocomplete="off" method="post">
                                   <input id="username" style="display:none" type="text" name="fakeusernameremembered">
                                   <input id="password" style="display:none" type="password" name="fakepasswordremembered">

                                   <div class="form-group">
                                       <label for="real-username">User Name</label>
                                       <input id="real-username" name="real-username" class="form-control" type="text" autocomplete="off">
                                   </div>
                                   <div class="form-group">
                                       <label for="real-password">Password</label>
                                       <input id="real-password" name="real-password" type="password" class="form-control" autocomplete="new-password">
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-12">
                                           <button type="submit" class="btn btn-primary" style="width: 100%;font-size: 18px;">L o g i n</button>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-12" style="text-align: right; padding-top: 10px;">
                                           <a href="<?=url('/sign-up')?>">register</a>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
               </div>
         </div>
    </body>
</html>
