<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Setting</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="container-fluid">
            <div class="" style="width:100%; max-width: 768px; margin: 0 auto;margin-top: 20px;">
                <div class="panel panel-primary">
                    <div class="clearfix panel-heading" style="text-align: center;background-color: #6ab7f2; font-size: 20px;">
                            Setting Page
                    </div>
                    <div class="panel-body">

                        <form action="<?=url('/cost_setting');?>" autocomplete="off" method="post">

                            <div class="row">
                                <div class="col-sm-12 cmp-pnl">
                                    <div class="inner-cmp-pnl">
                                        <h4>Cost Settings (£)</h4>
                                        <div class="form-group">
                                            <label for="e_Electrical" class="caption"> <span style="color: #3a3d98;">Electrical Energy</span></label>
                                            <input class="form-control" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" value = "<?php echo $cost[0]->e_cost; ?>" placeholder="0.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="water" class="caption"><span style="color: #3a3d98;">Water</span></label>
                                            <input class="form-control" id="water" name="water" required="required" aria-required="true" value = "<?php echo $cost[0]->w_cost; ?>" placeholder="0.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="Gas" class="caption"><span style="color: #3a3d98;">Gas Energy</span></label>
                                            <input id="Gas" class="form-control" name="Gas" required="required" aria-required="true" value = "<?php echo $cost[0]->g_cost; ?>" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-offset-4 col-xs-4 cmp-pnl">
                                    <button type="submit" id="setting_btn" class="btn btn-primary" style="width: 100%;">Submit</button>                                    
                                    <a class="btn btn-primary" href="<?=url('main-board');?>" style="margin-top: 10px;width: 100%;color: #fefffb" role="button" >
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       <!--  </div>
    </div> -->
</div>
<script>
    $(document).ready(function(){

        
        
        
    })
</script>

</body>
</html>