<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Main Board</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        .panel-body {
            height: calc(100vh - 70px);
            min-height: 320px;
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <!-- <div class="col-sm-12" > -->
            <div style="width:100%; max-width: 500px;height:auto; margin: 0 auto;margin-top:10px;">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align: center; font-size: 18px;">main Page</div>
                    <div class="panel-body" style="background-color: #f5eded">

                            <div class="row">
                            <div class="col-sm-12 col-xs-12" style="text-align: left;height: 45px; padding-top: 20px;margin-top: 10px" >
                                <a href="<?=url('/dashboard')?>" class="btn btn-primary btn-lg " style="width: 100%;background: linear-gradient(to bottom, #f54827 0%, #ffb5b3 100%);" role="button">
                                    <img src="images/atom.png" style="width: 30px; float: right" />
                                    <span>Summary</span>
                                </a>
                            </div>
                            <div class="col-sm-12 col-xs-12" style="text-align: left;height: 45px; padding-top: 20px;margin-top: 10px">
                                <a href="<?=url('/energy_data')?>" class="btn btn-primary btn-lg " style="background: linear-gradient(to bottom, #f55f34 0%, #ff99cc 100%);width: 100%" role="button" >
                                    <img src="images/chart.png" style="width: 30px; float: right" />
                                    <span>Energy Data</span>
                                </a>
                            </div>
                            <div class="col-sm-12 col-xs-12" style="text-align: left;height: 45px; padding-top: 20px;margin-top: 10px">
                                <a href="<?=url('/view_cost')?>" class="btn btn-primary btn-lg " style="background: linear-gradient(to bottom, #f5563d 0%, #ff99cc 100%);width: 100%" role="button">
                                    <img src="images/pound.png" style="width: 30px; float: right" />
                                    <span>Energy Costs
                                    </span>
                                </a>
                            </div>
                            <div class="col-sm-12 col-xs-12" style="text-align: left;height: 45px; padding-top: 20px;margin-top: 10px">
                                <a href="<?=url('/setting')?>" class="btn btn-primary btn-lg " style="background: linear-gradient(to bottom, #f56350 0%, #ff99cc 100%);width: 100%" role="button">
                                    <img src="images/contact.png" style="width: 30px; float: right" />
                                    <span>Setting
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>

</body>
</html>