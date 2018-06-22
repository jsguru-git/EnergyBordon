
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="<?=asset('js/circle-progress.min.js');?>"></script>
    <script src="<?=asset('js/flot/jquery.flot.js');?>"></script>
    <script src="<?=asset('js/flot/jquery.flot.time.js');?>"></script>
    <script src="<?=asset('js/jquery.canvasjs.min.js');?>"></script>
    <link rel="stylesheet" href="<?=asset('css/circle.css');?>">

    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <title>Dashboard</title>
    <style type="text/css">
        #chartContainer{
            height: 100%;
            width: 100%;
        }
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

        .btn-primary {
            padding: 5px 5px;
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
        
        .hidden_linechart > div:nth-child(2) {
            display: none;
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

        /*@media(max-width: 1268px){
            .over768{
                font-size: 2vw!important;
            }
            .c100 {
                font-size: 5em!important;

            }

        }*/

        @media only screen and (max-width: 1920px){
            #btn_bar{
                width: 25%!important;
                margin-left: 7%!important;

            }
            #btn_line{
                width: 25%!important;

            }
            #btn_circle{
                width: 25%!important;

            }

            #ele_btn_bar{
                width: 25%!important;
                margin-left: 7%!important;
            }
            #ele_btn_line{
                width: 25%!important;

            }
            #ele_btn_circle{
                width: 25%!important;

            }
            .below768 {
                display: none;
            }
            .over768{
                display:inline;
                font-size: 2vw!important;
            }

            #container_p{
                font-size: 8px;
            }
            .btn-circle.btn-xl {
                width: 40px;
                height: 40px;
                padding: 10px 16px;
                border-radius: 35px;
                font-size: 24px;
                line-height: 1.33;
            }

            #effect{
                height: 40px;
            }

            .c100 {
                font-size: 7vw!important;

            }
            #p_solar_power{
                font-size: 9px;
            }
            #css100_new_per {
                font-size: 11vw!important;
            }
            #per_h {
                font-size: 11vw!important;
            }

        }

        @media only screen and (max-width: 1360px){
            .c100 {
                font-size: 6vw!important;

            }
            #css100_new_per {
                font-size: 12vw!important;
            }
            #per_h {
                font-size: 12vw!important;
            }
        }
        @media only screen and (max-width: 1024px){
            #p_solar_power {
                font-size: 11px;
            }

            #container_p {
                font-size: 11px;
            }

            #font_sign {
                font-size: 11px;
            }
            .c100 {
                font-size: 7vw!important;

            }
            #css100_new_per {
                font-size: 15vw!important;
            }
            #per_h {
                font-size: 15vw!important;
            }
        }


        @media only screen and (max-width: 767px){

            /*body {
                font-size: 12px;
            }*/
            #font_sign{
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
                font-size: 4vw!important;
            }

            .over768{
                display: none;

            }

            .below768{
                display: inline;
                font-size: 4vw!important;

            }

            #effect{
                height: 40px;
            }

            #container_p{
                font-size: 12px!important;
            }

           .c100 {
                font-size: 25vw!important;

            }

            #p_solar_power {
                font-size: 12px;
            }

            #css100_new_per {
                font-size: 35vw!important;
            }
            #per_h {
                font-size: 35vw!important;
            }
        }

    </style>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div style="width:100%;height:auto; margin: 0 auto;margin-top:10px;">
            <div class="panel panel-primary">
                <div class="panel-body"  style="background-color: #ced1d1;">
                    <form action="<?=url('sign-up');?>" autocomplete="off" method="post">
                        <div class="row">
                            <div class="col-md-offset-3" id="description">
                                <a class="btn btn-primary " style="background: linear-gradient(to bottom, #292929 0%, #fff1fd 100%);width: 100%" role="button" >
                                    <span class="over768">MONTHLY ENERGY CONSUMPTION Outside Air Temperature <span class="outTemper">00.0</span> 'c</span>
                                    <span class="below768">MONTHLY ENERGY CONSUMPTION</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3 cmp-pnl" style="margin-top: 7%">
                                <div class="inner-cmp-pnl">
                                    <div class="col-xs-6  col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('dashboard');?>" id="btn_summary" class="btn btn-primary" style="width: 100%;border-radius: 20%;background: linear-gradient(to bottom, #ff9741 0%, #e3beab 100%);" role="button">
                                            <img src="images/atom.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>
                                    <div  class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('energy_data');?>" class="btn btn-primary " style="width: 100%;border-radius: 20%;background: linear-gradient(to bottom, #ff9741 0%, #e3beab 100%);" role="button">
                                            <img src="images/chart.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>

                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('view_cost');?>" id="btn_pound" class="btn btn-primary " style="width: 100%;border-radius: 20%;background: linear-gradient(to bottom, #ff9741 0%, #e3beab 100%);" role="button">
                                            <img src="images/pound.png" style="width: 100%;float: none" />
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a href="<?=url('setting');?>" class="btn btn-primary " style="width: 100%;border-radius: 20%;background: linear-gradient(to bottom, #ff9741 0%, #e3beab 100%);" role="button">
                                            <img src="images/contact.png" style="width: 100%;float: none" />
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6"  style="text-align: left;margin-top: 5%" >
                                        <a  class="btn btn-primary " style="position: relative;border-radius: 20%;width: 100%;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/blank.png"  style="width: 100%; float: none" />
                                            <!-- <span id="font_sign" style="color: #080808; font-size: 0.8vw;position: absolute;top:70%;right:30%" >SOLAR</span> -->
                                        </a>

                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-6" style="text-align: left;margin-top: 5%" >
                                        <a class="btn btn-primary " style="width: 100%;border-radius: 20%;background: linear-gradient(to bottom, #ff9741 0%, #ffb5b3 100%);" role="button">
                                            <img src="images/blank.png" style="width: 100%; float: none" />
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 cmp-pnl">

                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">
                                            <div class="row" style="width: 100%">

                                                <input type="text" class="form-control" style="text-align: center;margin: 15px" value="Solar Power vs Electricity" id="e_Electrical" name="e_Electrical" disabled>
                                            </div >

                                            <div class="clearfix" style="width: 100%;margin-bottom: 7%;border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-top: 12%;padding-left: 0%;padding-bottom: 5%">

                                                <div  class="col-sm-12">
                                                    <div class="col-xs-6 col-sm-6 cmp-pnl">
                                                        <div id="css100_1_1" class="">
                                                            <span id = "percent_s_1" style="color: #080808"></span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                        </div> 
                                                        <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:40%" >Solar</span>
                                                    </div>
                                                    <div class="col-xs-6  col-sm-6 cmp-pnl">
                                                        <div id="css100_1_2" class="" >
                                                            <span id = "percent_s_2" style="color: #080808"></span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                        </div>
                                                        <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:40%" >Electic</span>
                                                    </div>
                                                </div>

                                                <div  class="row" >
                                                </div>

                                                <div class="container" style="width: 100%;text-align: center;padding-top: 5%">
                                                    <p id="container_p">Percentage of Electricity produced by solar power</p>
                                                    <div class="progress" style="height: 50px;border-style: solid;border-color: #6f7898;">
                                                        <div id="bar_percentage" class="progress-bar" role="progressbar" aria-valuemax="100" style="width:44%;background-color: #519d51;padding-top: 15px">
                                                            <span id="bar_percentage_value"></span>
                                                        </div>
                                                        <div id="remain_bar_percentage" class="progress-bar" role="progressbar" aria-valuemax="100" style="width:11%;background-color: #d9af54;padding-top: 15px">
                                                            <span id="bar_percentage_value_1"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix" style="width: 100%;text-align: center">
                                                    <p id="p_solar_power">You are using solar power: Efficiently</p>
                                                    <div id="effect" class="panel panel-warning" style=";border-style: solid;border-color: #6b6861;">
                                                        <button id = "1" type="button" class="btn btn-danger btn-circle btn-xl" style=""><i class="fa fa-heart"></i>
                                                        </button>

                                                        <button id = "2" type="button" class="btn btn-warning btn-circle btn-xl" style="border-color: #ffc7f0"><i class="fa fa-times"></i>
                                                        </button>

                                                        <button id = "3" type="button" class="btn btn-success btn-circle btn-xl"  style=""><i class="fa fa-link"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div  class="col-sm-12">
                                                    <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 50%">
                                                        <div id="css100" class="c100 p21 green">
                                                            <span  style="color: #080808">21%</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                        </div>
                                                        <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:30%" >PV Used</span>
                                                    </div>
                                                    <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 50%">
                                                        <div id="css100" class="c100 p47 orange" >
                                                            <span  style="color: #080808">47%</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                        </div>
                                                        <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:30%" >Exported</span>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- <div style="border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-left: 24px;padding-top: 15px">
                                                <p style="font-weight:bold; font-size:16px;color:blue;">House</p>
                                                <p style="font-weight:bold">Temperature: 24.5 DegC</p>
                                                <p style="font-weight:bold">Humidity: 24.5 % </p>
                                                <p style="font-weight:bold">CO2: 1,200 ppm</p>

                                            </div> -->

                                            <div class="house-info" style="border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-left: 24px;padding-top: 15px">
                                                
                                            </div>
                                            

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">
                                            <input type="text" class="form-control" style="text-align: center;margin-bottom: 5%;margin-top: 6%" value="Electricity (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>

                                            <div style="border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-bottom: 8%">
                                                <div id="chartContainer_newline" style="position: relative;width:100%;height:200px;margin-top: 15px;margin-bottom: 15%"></div>
                                                <div style="margin-top: 0%">
                                                    <div id="ele_btn_bar" class="btn btn-primary" style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);margin-left: 2%;width: 30%;margin-right: 2%" role="button" >
                                                        <img src="images/chart.png" style="width: 100%;height: auto; float: none" />
                                                    </div>
                                                    <div id="ele_btn_line" class="btn btn-primary" style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);width: 30%;margin-right: 2%" role="button" >
                                                        <img src="images/line.png" style="width: 100%;height: auto; float: none" />
                                                    </div>
                                                    <div id="ele_btn_circle" class="btn btn-primary" style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);width: 30%;margin-right: 0px" role="button" >
                                                        <img src="images/percentage.png" style="width: 100%;height: auto; float: none" />
                                                    </div>
                                                </div>
                                                <div  class="row" >
                                                    <div  id="mar-bottom" class="col-sm-12" style="padding-top: 5%;padding-bottom: 10%">
                                                        <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 45%;position: relative">
                                                            <div id="css100_2_1" class="">
                                                                <span id="percent_2_1"  style="color: #080808"></span>
                                                                <div class="slice">
                                                                    <div class="bar"></div>
                                                                    <div class="fill"></div>
                                                                </div>
                                                            </div>
                                                            <span id="font_sign" style="color: #080808; position: absolute;top:100%;right:32%" >Cooker</span>
                                                        </div>
                                                        <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 45%;position: relative">
                                                            <div id="css100_2_2" class=""  >
                                                                <span id="percent_2_2" style="color: #080808"></span>
                                                                <div class="slice">
                                                                    <div class="bar"></div>
                                                                    <div class="fill"></div>
                                                                </div>
                                                            </div>
                                                            <span id="font_sign" style="color: #080808; position: absolute;top:100%;right:35%" >Lights</span>

                                                        </div>
                                                    </div>

                                                    <div  class="col-sm-12">
                                                        <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 45%;position: relative">
                                                            <div id="css100_2_3" class="">
                                                                <span id="percent_2_3" style="color: #080808"></span>
                                                                <div class="slice">
                                                                    <div class="bar"></div>
                                                                    <div class="fill"></div>
                                                                </div>
                                                            </div>
                                                            <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:30%" >Kitchen</span>
                                                        </div>
                                                        <div class="col-xs-6  col-sm-6 cmp-pnl" style="width: 45%;position: relative">
                                                            <div id="css100_2_4" class="" >
                                                                <span id="percent_2_4" style="color: #080808"></span>
                                                                <div class="slice">
                                                                    <div class="bar"></div>
                                                                    <div class="fill"></div>
                                                                </div>
                                                            </div>
                                                            <span id="font_sign" style="color: #080808; position: absolute;top:90%;right:30%" >Sockets</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 cmp-pnl">
                                        <div class="inner-cmp-pnl">

                                            <input type="text" class="form-control" style="text-align: center;margin-bottom: 5%;margin-top: 15px" value="Heating vs Hot Water (kwh)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>

                                            <div style="border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;padding-top: 7%">
                                                <div id="chartContainer" style="position: relative;height: 200px; width: 100%;margin-bottom: 0%"></div>

                                                <style>
                                                    li.red:before{
                                                        content: "⬤ ";
                                                        color: rgb(192, 80, 78);
                                                    }
                                                    li.blue:before{
                                                        content: "⬤ ";
                                                        color: rgb(79, 129, 188);
                                                    }
                                                </style>

                                                <ul id="li_view" style="list-style: none;margin-top: 9px;height: 4%;margin-left: 13%">

                                                    <li id="li_view1" class="blue">
                                                        Heating
                                                    </li>
                                                    <li id="li_view2" class="red">
                                                        Hot Water
                                                    </li>
                                                </ul>

                                                <div style="margin-top: 15%">
                                                    <div id="btn_bar" class="btn btn-primary " style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);margin-left: 2%;width: 30%;margin-right: 2%" role="button" >
                                                        <img src="images/chart.png" style="width: 100%;height: auto; float: none" />
                                                    </div>
                                                    <a id="btn_line" class="btn btn-primary " style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);width: 30%;margin-right: 2%" role="button" >
                                                        <img src="images/line.png" style="width: 100%;height: auto; float: none" />
                                                    </a>
                                                    <a id="btn_circle" class="btn btn-primary " style="background: linear-gradient(to bottom, #ecf3f5 0%, #ecf3f5 100%);width: 30%;margin-right: 0px" role="button" >
                                                        <img src="images/percentage.png" style="width: 100%;height: auto; float: none" />
                                                    </a>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" style="text-align: center;margin-top: 20px;border-radius: 10px" value="Combine Energy by month(£)" id="e_Electrical" name="e_Electrical" required="required" aria-required="true" disabled>

                                            <div style="border: 1px solid;border-color: #ffe2ca;background-color: #f5f8f8;border-radius: 10px;margin-top: 3%">
                                                <div style="height: 20%;border: 1px solid;border-color: #424242;background-color: #f5f8f8;border-radius: 10px;padding-top: 0%">
                                                    <div id="combine" style="position: relative; width: 30%; display: inline; float: left;">
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
                                                    <!-- <div style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #acacac;">
                                                        <div id="per_1" style="height: 33%; position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                            <span id="val_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                        <div id="per_2" style="height: 33%; position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                            <span id="val_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                        <div id="per_3" style="height: 33%; position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                            <span id="val_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                        </div>
                                                    </div> -->
                                                    
                                                    <div class="bar-chart" style="position: relative; width: 70%; height: 100%; display: inline; float: left; border-radius: 7px; background-color: #acacac;">
                                                        <div id="per_1">
                                                            <div style="position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                                <span id="val_1" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>    
                                                            </div>
                                                        </div>
                                                        <div id="per_2">
                                                            <div style="position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                                <span id="val_2" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                            </div>
                                                        </div>
                                                        <div id="per_3">
                                                            <div style="position: relative; border-radius: 7px; background-color: #3b3b3b; margin: 0% 0%">
                                                                <span id="val_3" style="position: absolute;top: 50%; left:100%; transform: translateY(-50%)"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                <!-- </div> -->

                            </div>

                        </div>

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
            async: false,
            url: "<?=url('get-data');?>",
            data: {
            },
            success: function (resp) {
                console.log("****************");
                console.log(resp['temper']);
                console.log(resp['humidity']);
                console.log(resp['co2']);
                console.log(resp['outtemper']);
                data_copy = resp;
                // alert(JSON.stringify(data_copy));
            }
        });

        // render house temperature
        var insert_temper = '<p style="font-weight:bold; font-size:16px;color:blue;">House</p>' +
                            '<p style="font-weight:bold">Temperature: ' + data_copy["temper"] + ' DegC</p>'+
                            '<p style="font-weight:bold">Humidity: ' + data_copy["humidity"] + ' % </p>'+
                            '<p style="font-weight:bold">CO2: ' + data_copy["co2"] + ' ppm</p>';
        $('.house-info').html(insert_temper);

        var insert_banner = data_copy["outtemper"];
        $('.outTemper').html(insert_banner);

        for (var i = 0; i < 4; i++)
        {
            if (i == data_copy['remember'])
            {
                jQuery('#' + i).css('opacity', '0.9');
            }
            else{
                jQuery('#' + i).css('opacity', '0.2');
            }
        }

        function get_max(a, b, c){
            m = a;
            if (m < b) m = b;
            if (m < c) m = c;
            length = (Math.floor(m)).toString().length;
            result = Math.pow(10, length)*1.2;
            return result;
        }

        sum = 0;
        for (var j = 0; j < 6;j++)
        {
            sum += data_copy["h_energy"][j];
        }
        average = sum/6;
        max = get_max(data_copy["h_energy"][0], data_copy["h_energy"][1], average);
        per_1_1 = 100*data_copy["h_energy"][0]/max;
        per_1_2 = 100*data_copy["h_energy"][1]/max;
        per_1_3 = 100*average/max;
        console.log(max);

        $("#per_1").innerWidth(per_1_1 + "%");
        $("#per_2").innerWidth(per_1_2 + "%");
        $("#per_3").innerWidth(per_1_3 + "%");


        $("#val_1").text(data_copy["h_energy"][0]);
        $("#val_2").text(data_copy["h_energy"][1]);
        $("#val_3").text(Math.floor(average));

        $percent_1_1 = Math.floor(100 * data_copy['average_e']/(data_copy['average_e'] + data_copy['average_s']));

        $percent_2_1 = Math.floor(100 * data_copy['sum_cook']/(data_copy['sum_cook'] + data_copy['sum_light'] + data_copy['sum_kitchen']));
        $percent_2_2 = Math.floor(100 * data_copy['sum_light']/(data_copy['sum_cook'] + data_copy['sum_light'] + data_copy['sum_kitchen']));
        $percent_2_3 = Math.floor(100 * data_copy['sum_kitchen']/(data_copy['sum_cook'] + data_copy['sum_light'] + data_copy['sum_kitchen']));
        $percent_2_4 = 100 - $percent_2_1 - $percent_2_2;

        $percent_circle_2 = Math.floor(100 * data_copy['count'][0]/(data_copy['average_e'] * 6));

        $("#css100_1_1").addClass("c100 p" + $percent_1_1 + " green");
        $("#percent_s_1").text($percent_1_1 + "%");

        $("#css100_1_2").addClass("c100 p" + (100 - $percent_1_1) + " orange");
        $("#percent_s_2").text((100 - $percent_1_1) + "%");

        $("#bar_percentage").innerWidth($percent_1_1 + "%");
        $("#remain_bar_percentage").innerWidth((100 - $percent_1_1) + "%");

        $("#bar_percentage_value").text($percent_1_1 + "%");
        $("#bar_percentage_value_1").text((100 - $percent_1_1) + "%");


        $("#css100_2_1").addClass("c100 p" + $percent_2_1 + " green");
        $("#percent_2_1").text($percent_2_1 + "%");


        $("#css100_2_2").addClass("c100 p" + $percent_2_2 + " orange");
        $("#percent_2_2").text($percent_2_2 + "%");


        $("#css100_2_3").addClass("c100 p" + $percent_2_3 + " green");
        $("#percent_2_3").text($percent_2_3 + "%");


        $("#css100_2_4").addClass("c100 p" + $percent_2_4 + " orange");
        $("#percent_2_4").text($percent_2_4 + "%");


        console.log(data_copy['date'][0]);
        for (i = 0;i < 6;i++)
        {
            dateStr = data_copy['date'][i];
            var parts = dateStr.split("-");
            data_copy['date'][i] = [];
            data_copy['date'][i][0] = parts[0];
            data_copy['date'][i][1] = parts[1];
            data_copy['date'][i][2] = parts[2];

            console.log(data_copy['date'][i]);
        }
        console.log(data_copy['date']);


        var myConfig = {
            "type":"line",
            "plotarea":{
                "adjust-layout":true
            },
            "scale-x":{
                "label":{
                    "text":"By month"
                },
                "labels":[
                    data_copy['date'][5][1],
                    data_copy['date'][4][1],
                    data_copy['date'][3][1],
                    data_copy['date'][2][1],
                    data_copy['date'][1][1],
                    data_copy['date'][0][1]
                ]
            },
            "series":[
                {
                    "values":[
                        data_copy['count'][5],
                        data_copy['count'][4],
                        data_copy['count'][3],
                        data_copy['count'][2],
                        data_copy['count'][1],
                        data_copy['count'][0]
                    ],
                }
            ]
        };

        zingchart.render({
            id : 'chartContainer_newline',
            data : myConfig,
            height: "100%",
            width: "100%"
        });



        var data1 = [
            [0, data_copy['count'][0]], [1, data_copy['count'][1]],
            [2, data_copy['count'][2]], [3, data_copy['count'][3]],
            [4, data_copy['count'][4]], [5, data_copy['count'][5]],
        ];


        $.plot($("#flotcontainer_line"), [
            {
                data: data1,
                lines: { show: true}
            }
        ]);

        $('#circle_progress_1').circleProgress({
            value: 0.88,
            size: 80,
            fill: {
                gradient: ["red", "orange"]
            }
        });


        $('#circle_progress_2').circleProgress({
            value: 0.22,
            size: 80,
            fill: {
                gradient: ["red", "orange"]
            }
        });

        $('#circle_progress_3').circleProgress({
            value: 0.55,
            size: 80,
            fill: {
                gradient: ["red", "orange"]
            }
        });

        $('#btn_line').on("click", function() {
            $('#chartContainer').html("");
            ///////////////////////////////////////////
            $('#chartContainer').removeClass("hidden_linechart");
            $("#li_view").css("display","block");
            ///////////////////////////////////////////

            var myConfig = {
                "type":"line",
                "plotarea":{
                    "adjust-layout":true
                },
                "scale-x":{
                    "label":{
                        "text":"By month",
                    },
                    "labels":[
                        data_copy['date'][5][1],
                        data_copy['date'][4][1],
                        data_copy['date'][3][1],
                        data_copy['date'][2][1],
                        data_copy['date'][1][1],
                        data_copy['date'][0][1],
                    ]
                },
                "series":[
                    {
                        "values":[
                            data_copy['h_energy'][5],
                            data_copy['h_energy'][4],
                            data_copy['h_energy'][3],
                            data_copy['h_energy'][2],
                            data_copy['h_energy'][1],
                            data_copy['h_energy'][0]
                        ]
                    },
                    {
                        "values":[
                            data_copy['hw_energy'][5],
                            data_copy['hw_energy'][4],
                            data_copy['hw_energy'][3],
                            data_copy['hw_energy'][2],
                            data_copy['hw_energy'][1],
                            data_copy['hw_energy'][0]
                        ]
                    }
                ]
            };

            zingchart.render({
                id : 'chartContainer',
                data : myConfig,
                height: "100%",
                width: "100%"
            });

        });

        $('#btn_bar').on("click", function() {
            $('#chartContainer').html("");
            //////////////////////////////////////
            $('#li_view').css("display","block");
            $('#chartContainer').addClass("hidden_linechart");
            //////////////////////////////////////
            var chart1 = new CanvasJS.Chart("chartContainer", {
                title:{
                    text: ""
                },

                data: [  //array of dataSeries
                    { //dataSeries - first quarter
                        /*** Change type "column" to "bar", "area", "line" or "pie"***/
                        type: "column",
                        name: "First Quarter",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y}",
                        indexLabel: "{y}",
                        dataPoints: [
                            { label: "this month(heating)", y: data_copy['h_energy'][0] },
                            { label: "last month(heating)", y: data_copy['h_energy'][1] }
                        ]
                    },
                    { //dataSeries - second quarter

                        type: "column",
                        name: "Second Quarter",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y}",
                        dataPoints: [
                            { label: "this month", y: data_copy['s_energy'][0] },
                            { label: "last month", y: data_copy['s_energy'][1] }
                        ]
                    }
                ]
            });

            chart1.render();


        });



        $('#ele_btn_line').on("click", function() {
            $('#chartContainer_newline').html("");
            ////////////////////////////////
            $('#chartContainer_newline').removeClass("hidden_linechart");
            ////////////////////////////////
            var myConfig = {
                "type":"line",
                "plotarea":{
                    "adjust-layout":true
                },
                "scale-x":{
                    "label":{
                        "text":"By month",

                    },
                    "labels":[
                        data_copy['date'][5][1],
                        data_copy['date'][4][1],
                        data_copy['date'][3][1],
                        data_copy['date'][2][1],
                        data_copy['date'][1][1],
                        data_copy['date'][0][1],
                    ]
                },
                "series":[
                    {
                        "values":[
                            data_copy['count'][5],
                            data_copy['count'][4],
                            data_copy['count'][3],
                            data_copy['count'][2],
                            data_copy['count'][1],
                            data_copy['count'][0]
                        ]
                    }
                ]
            };

            zingchart.render({
                id : 'chartContainer_newline',
                data : myConfig,
                height: "100%",
                width: "100%"
            });

        });


        $percent_h =  Math.floor(100 * data_copy['h_energy'][0]/(data_copy['average_h'] * 6));
        $('#btn_circle').on("click", function() {
            /////////////////////////////////////////
            $("#li_view").css("display","none");
            $('#chartContainer').addClass("hidden_linechart");
            /////////////////////////////////////////
            var insert_circle = '<div id="per_h" class="" style="vertical-align: middle;position: absolute;top:10%;right:20%">' +
                    '<span id="span_h" style="color: #080808">43%</span>'+
                    '<div class="slice">'+
                    '<div class="bar"></div>'+
                    '<div class="fill"></div>'+
                    '</div>'+
                    '</div>';
            $('#chartContainer').html(insert_circle);

            $("#per_h").addClass("c100 p" + $percent_h + " green");
            $("#span_h").text($percent_h + "%");

        });

        $('#ele_btn_bar').on("click", function() {
            /////////////////////////////////////
            $('#chartContainer_newline').addClass("hidden_linechart");
            /////////////////////////////////////
            var chart_2 = new CanvasJS.Chart("chartContainer_newline", {
                animationEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: ""
                },
                data: [{
                    type: "column",
                    name: "First Quarter",
                    showInLegend: true,
                    toolTipContent: "{label} <br/> {y}",
                    indexLabel: "{y}",
                    dataPoints: [
                        { label: "this month",             y: data_copy['count'][0]},
                        { label: "last month",            y: data_copy['count'][1]}
                    ]
                }]
            });
            chart_2.render();

        });

        $('#ele_btn_circle').on("click", function() {

            ///////////////////////////////////
            $('#chartContainer_newline').addClass("hidden_linechart");
            ///////////////////////////////////
            var insert_circle = '<div id="css100_new_per" class="" width="300" style="vertical-align: middle;position: absolute;top:10%;right:20%;">' +
                    '<span id="new_circle_2"  style="color: #080808"></span>'+
                    '<div class="slice">'+
                    '<div class="bar"></div>'+
                    '<div class="fill"></div>'+
                    '</div>'+
                    '</div>';
            $('#chartContainer_newline').html(insert_circle);

            $("#css100_new_per").addClass("c100 p" + $percent_circle_2 + " green");

            $("#new_circle_2").text($percent_circle_2 + "%");
        });
        $("#btn_line").click();
        $("#btn_bar").click();

    });


</script>