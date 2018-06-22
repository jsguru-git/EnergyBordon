
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>Dashboard</title>

    <style type="text/css">
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 24px;
            line-height: 1.33;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }


        #flotcontainer {
            width: 600px;
            height: 400px;
            text-align: left;
        }

        #flotcontainer_line {
            width: 100%;
            height: 200px;
            color: #133d55;
            text-align: center;
            margin: 0 auto;
        }

        .easyPieChart {
            position: relative;
            text-align: center;
        }

        .bar-chart > [id ^='per'] {
            height: 34%;
        }
        
        [id ^='per'] > div {
            height: 95%;
        }    

        canvas {
            top: 22px;
            position: relative;
            text-align: center;}
        /*@media(max-width: 768px){
            #font_sign{
                font-size: 3vw!important;
            }

            #description{
                width: 100%;
                font-size: 3vw!important;
            }

            #des_span{
                font-size: 3vw!important;
            }

            #des_cost{
                font-size: 3vw!important;
            }

            #des_span1{
                font-size: 2vw!important;
            }

            #effect{
                height: 13%;
            }

            #css100{
                font-size: 66px;
            }
        }
        .c100 {
            font-size:6vw;
        }*/

        @media only screen and (max-width: 1920px){
            .below768 {
                display: none;
            }
            .over768{
                display:inline;
                font-size: 2vw!important;
            }
        }

        /*@media only screen and (max-width: 1024px){
            #p_solar_power {
                font-size: 11px;
            }

            #container_p {
                font-size: 11px;
            }

            #font_sign {
                font-size: 11px;
            }
        }*/

        @media only screen and (max-width: 768px){

           /* #font_sign{
                font-size: 12px;
            }

            #mar-bottom{
                margin-bottom: 33%!important;
            }

            #title_description{
                margin-top: 100px;
            }

            #description{
                width: 100%;
                font-size: 3vw!important;
            }

            #combine{
                font-size: 3vw!important;
            }*/

            .over768{
                display: none;

            }

            .below768{
                display: inline;
                font-size: 4vw!important;

            }
/*
            #effect{
                height: 40px;
            }

            #container_p{
                font-size: 12px!important;
            }

            .c100 {
                font-size:16vw;

            }

            #p_solar_power {
                font-size: 12px;
            }*/
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div style="width:100%;height:100%; min-height:600px;margin: 0 auto;margin-top:10px;">
            <div class="panel panel-primary">
                <div class="panel-body"  style="background-color: #e0eae3;">
                    <form  autocomplete="off" method="post">
                        <div class="row">
                            <div class="col-md-offset-3" id="description">
                                <a  class="btn btn-primary btn-lg " style="background: linear-gradient(to bottom, #292929 0%, #fff1fd 100%);width: 100%" role="button" >
                                    <span class="over768">MONTHLY ENERGY COSTS Outside Air Temperature <span class="outTemper">00.0</span> 'c</span>
                                    <span class="below768">MONTHLY ENERGY COSTS</span>
                                </a>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-3 cmp-pnl" style="margin-top: 3%">
                                <div class="inner-cmp-pnl">
                                    <div class="col-xs-6  col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('dashboard');?>" id="btn_summary" class="btn btn-primary btn-lg " style="width: 100%;border-radius: 20px;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/atom.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a  href="<?=url('energy_data');?>" class="btn btn-primary btn-lg " style="width: 100%;border-radius: 20px;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/chart.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('view_cost');?>" id="btn_pound" class="btn btn-primary btn-lg " style="width: 100%;border-radius: 20px;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/pound.png" style="width: 100%;float: none" />
                                        </a>
                                    </div>
                                    <div  class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a  href="<?=url('setting');?>" class="btn btn-primary btn-lg " style="width: 100%;border-radius: 20px;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/contact.png" style="width: 100%;float: none" />
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6"  style="text-align: left;margin-top: 5%" >
                                        <a  class="btn btn-primary btn-lg " style="position: relative;border-radius: 20px;width: 100%;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/blank.png"  style="width: 100%; float: none" />
                                            <!-- <span id="font_sign" style="color: #080808; font-size: 0.8vw;position: absolute;top:70%;right:30%" >SOLAR</span> -->
                                        </a>

                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a class="btn btn-primary btn-lg " style="width: 100%;border-radius: 20px;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/blank.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 cmp-pnl">

                                <div id="main_information">
                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">
                                            <input type="text" class="form-control" style="color: #2a27b0;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Water Consumption Total (M3)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px">
                                                <div class="row" style="margin: 0px; width: 100%; height: 100%; padding: 0%">
                                                    <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                        <div style="width: 100%; height: 33%; position: relative;">
                                                            <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                        </div>
                                                        <div style="width: 100%; height: 33%; position: relative;">
                                                            <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                        </div>
                                                        <div style="width: 100%; height: 33%; position: relative;">
                                                            <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c2c2c2;">
                                                        <div id="per_1_1">
                                                            <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                                <span id="val_1_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                            </div>
                                                        </div>
                                                        <div id="per_1_2"> 
                                                            <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                                <span id="val_1_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                            </div>
                                                        </div>
                                                        <div id="per_1_3">
                                                            <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                                <span id="val_1_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <input type="text" class="form-control" style="color: #2a27b0;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Gas Consumption Total (M3)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_2_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                            <span id="val_2_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_2_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                            <span id="val_2_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_2_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #45adf0; margin: 0% 0%">
                                                            <span id="val_2_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="color: #2a27b0;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Electrical Energy Consumed (kWh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_3_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #678ff0; margin: 0% 0%">
                                                            <span id="val_3_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_3_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #678ff0; margin: 0% 0%">
                                                            <span id="val_3_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_3_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #678ff0; margin: 0% 0%">
                                                            <span id="val_3_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">
                                            <input type="text" class="form-control" style="color: #bc1218;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Produced By Solar Panel (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #9d8175;background-color: #f5f8f8;border-radius: 10px">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_4_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_4_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_4_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_4_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_4_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_4_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="color: #7e5061;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Total Heat used for Heating and Hot Water (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_5_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #c37dff; margin: 0% 0%">
                                                            <span id="val_5_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_5_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #c37dff; margin: 0% 0%">
                                                            <span id="val_5_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_5_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #c37dff; margin: 0% 0%">
                                                            <span id="val_5_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="color: #bc1218;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Cooker Energy Total (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_6_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_6_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_6_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_6_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_6_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: lightcoral; margin: 0% 0%">
                                                            <span id="val_6_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">

                                            <input type="text" class="form-control" style="color: #965c74;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Lighting Energy Total (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-top: 0%">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 32%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_7_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #2a27b0; margin: 0% 0%">
                                                            <span id="val_7_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_7_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #2a27b0; margin: 0% 0%">
                                                            <span id="val_7_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_7_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #2a27b0; margin: 0% 0%">
                                                            <span id="val_7_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="color: #865769;text-align: center;margin-bottom: 5%;margin-top: 15px" value="Kitchen Sockets Energy Total (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-top: 0%">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 32%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_8_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #1ea31d; margin: 0% 0%">
                                                            <span id="val_8_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_8_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #1ea31d; margin: 0% 0%">
                                                            <span id="val_8_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_8_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #1ea31d; margin: 0% 0%">
                                                            <span id="val_8_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="text-align: center;margin-bottom: 5%;margin-top: 15px" value="Combined Energy Total (kwh/m3)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>
                                            <div style="height: 15%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-top: 0%">
                                                <div  style="position: relative; width: 30%; display: inline; float: left;">
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">this: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 33%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">last: </span>
                                                    </div>
                                                    <div style="width: 100%; height: 32%; position: relative;">
                                                        <span style="position: absolute;top: 50%; left:5%; transform: translateY(-50%)">average: </span>
                                                    </div>
                                                </div>
                                                <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #c1c1c1;">
                                                    <div id="per_9_1">
                                                        <div style="position: relative; border-radius: 7px; background-color: #3d3d3d; margin: 0% 0%">
                                                            <span id="val_9_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_9_2">
                                                        <div style="position: relative; border-radius: 7px; background-color: #3d3d3d; margin: 0% 0%">
                                                            <span id="val_9_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                    <div id="per_9_3">
                                                        <div style="position: relative; border-radius: 7px; background-color: #3d3d3d; margin: 0% 0%">
                                                            <span id="val_9_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                       <!--  <div class="row">
                            <div id="description">
                                <div class="col-sm-offset-3" style="background-color: #e0eae3;height: 87%width: 70%;">
                                    <div id="des_cost"  class="btn btn-primary btn-lg " style="height: 14%;margin-top: 1%;background-color: #fffefa" role="button" >
                                        <div class="col-xs-1 col-sm-1" style="">
                                            <div class="col-sm-3" style="align-content: center">
                                            </div>
                                        </div>
                                        <div  class="col-xs-11 col-sm-11" style="text-align: left;color: #212121">
                                            <p id="des_span1">Hi and welcome to your home. Please feel free it contact us </p>
                                            <p id="des_span1">using the comments section of if you get stuck please click here</p>
                                            <p id="des_span1">the self help training videos.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div> -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>



<script >

    $(document).ready(function () {

        data_copy = null;
        $.ajax({
            type: "post",
            async: false,
            url: "<?=url('get_inf');?>",
            data: {},
            success: function (resp) {
                console.log("****************");
                data_copy = resp['all'];
                console.log(data_copy);
            }
        });

        outtemper = null;
        $.ajax({
            async: false,
            url: "<?=url('get-data');?>",
            data: {
            },
            success: function (resp) {
                outtemper = resp['outtemper'];
            }
        });

        // render banner
        var insert_banner = outtemper;
        $('.outTemper').html(insert_banner);
        //per-1
        function get_max(a, b, c){
            m = a;
            if (m < b) m = b;
            if (m < c) m = c;
            length = (Math.floor(m)).toString().length;
            result = Math.pow(10, length)*1 + 100;

            return result;
        }

        for (var i = 0;i < 9; i++)
        {
            sum = 0;
            for (var j = 0; j < 6;j++)
            {
                sum += data_copy[i][j];
            }
            average = sum/6;
            max = get_max(data_copy[i][0], data_copy[i][1], average);
            per_1_1 = 100*data_copy[i][0]/max;
            per_1_2 = 100*data_copy[i][1]/max;
            per_1_3 = 100*average/max;
            console.log(max + "-" + per_1_1 + "-" + per_1_2 + "-" + per_1_3);

            $("#per_" + (i+1) + "_1").innerWidth(per_1_1 + "%");
            $("#per_" + (i+1) + "_2").innerWidth(per_1_2 + "%");
            $("#per_" + (i+1) + "_3").innerWidth(per_1_3 + "%");

            $("#val_" + (i+1) + "_1").text(data_copy[i][0]);
            $("#val_" + (i+1) + "_2").text(data_copy[i][1]);
            $("#val_" + (i+1) + "_3").text(Math.floor(average));


        }

    });

</script>