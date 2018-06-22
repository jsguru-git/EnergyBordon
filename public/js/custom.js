/*
 * Author Name: The Creatix
 * Author URI: http://www.TheCreatix.com
 */


/****************************************************************************
 General function
 ****************************************************************************/
var roundToTwo = function (num) {
    return +(Math.round(num + "e+2")  + "e-2");
};

var inPercentage = function( total, percentageVal ) {
    return (total/100)*percentageVal;
};

var getInputValue = function( idName,idNumb ) {

    var inputId;
    inputId = idName + "-" + idNumb;
    var inputValue = $(inputId).val();
    if(inputValue === '')
    {
        return  0;
    }else
    {
        return inputValue;
    }

};

var changePreValue = function() {

    var toEmail = $("#to").val();
    var name = $("#name").val();
    var fromEmail = $("#from").val();
    var mesg = $("#mesg").val();
    if(toEmail !== '')
    {
        $("#prevToEmail").html(toEmail);
    }
    if(name !== '')
    {
        $("#prevName").html(name);
        $("#emailHeading").html(name);
        $("#emailSub").html(name);
    }
    if(fromEmail !== '')
    {
        $("#prevFrmEmail").html(fromEmail);
    }
    if(mesg !== '')
    {
        $("#prevMesg").html(mesg);
    }

};

var taxSum;
taxSum = function () {

    var taxSum;
    /*---calculate sum of all taxes---*/
    var taxTotalArray = [];
    $('.taxVal').each(function () {
        var vv = $(this).val();
        if (vv === '') {
            vv = 0;
        }
        taxTotalArray.push(vv);
    });
    taxSum = 0;
    for (var k = 0; k < taxTotalArray.length; k++) {
        taxSum += parseFloat(taxTotalArray[k]);
    }
    taxSum = roundToTwo(taxSum); // round the decimal point 2 place
    return taxSum;

};

var itemsSum = function() {

    /*---calculate sum of all items---*/
    var totalArray= [];
    $('.ttInput').each(function(){
        var vv = $(this).val();
        if(vv === ''){
            vv = 0;
        }
        totalArray.push(vv);
    });
    var sum = 0;
    for(var i=0; i < totalArray.length; i++)
    {
        sum += parseFloat(totalArray[i]);
    }
    sum =   roundToTwo(sum); // round the decimal point 2 place
    return sum;

};


/****************************************************************************
 input calling function
 ****************************************************************************/
var removeItem = function( num ) {

    var itemTotalID;
    var itemTotal;
    var subTotal;
    var totalSubVal;
    var totalTaxSum;
    var totalBillVal;
    var totalSelector = $("#subTotalInput");

    itemTotalID = "#total-"+num;

    //getting the values
    itemTotal = $(itemTotalID).val();
    subTotal = totalSelector.val();
    totalSubVal =  roundToTwo(subTotal - itemTotal);
    totalSelector.val(totalSubVal);
    $("#subTotal").html(totalSubVal);

    //calling taxSum function
    totalTaxSum =  taxSum();
    totalBillVal = (parseInt(totalSubVal) + parseInt(totalTaxSum));

    //updating with new values
    $("#totalBill").html(roundToTwo(totalBillVal));
    $("#totalBillInput").val(roundToTwo(totalBillVal));

};

var removeTax = function (num) {

    var taxValueID;
    var taxValue;
    var totalBill;
    var totalBillVal;
    var totalBillInputSelector = $("#totalBillInput");

    taxValueID = "#taxValue-" + num;

    //getting the values
    taxValue = $(taxValueID).val();
    totalBill = $("#totalBillInput").val();
    if (taxValue === '') {
        taxValue = 0;
    }
    totalBillVal = roundToTwo(parseFloat(totalBill) - parseFloat(taxValue));

    //updating with new values
    $("#totalBill").html(totalBillVal);
    $("#totalBillInput").val(totalBillVal);

};

var calTotalAmount = function() {

    //calling itemsSum function
    var  itemsTotalSum =   itemsSum();
    //calling taxSum function
    var  totalTaxSum =   taxSum();
    var  totalBillVal = roundToTwo(parseFloat(itemsTotalSum) + parseFloat(totalTaxSum));
    //updating with new values
    $("#totalBillInput").val(totalBillVal);
    $("#totalBill").html(totalBillVal);
    return  totalBillVal;

};

var calSubtotal = function() {

    //calling itemsSum function
    var itemsTotalSum =   itemsSum();
    //calling calTotalAmount function
    var  totalBillVal = calTotalAmount();
    //updating with new values
    $("#subTotalInput").val(itemsTotalSum);
    $("#subTotal").html(itemsTotalSum);
    //updating with new values
    $("#totalBill").html(totalBillVal);
    $("#totalBillInput").val(totalBillVal);

};

var calTotal = function(numb) {

    var result;
    var totalValue;
    //getting all inputs values
    var amountVal   =    getInputValue("#amount",numb);
    var priceVal    =    getInputValue("#price",numb);
    var discountVal =    getInputValue("#discount",numb);
    var vatVal      =    getInputValue("#vat",numb);

    //calculate to price of items
    var totalPrice = parseInt(amountVal) * parseFloat(priceVal);

    var taxFormat = $("#taxFormatInput").val();

    if(taxFormat != '%')
    {
        totalValue = roundToTwo(parseFloat(totalPrice) + parseFloat(vatVal));
    }
    else
    {
        var Inpercentage = inPercentage(totalPrice,vatVal);
        totalValue  =  roundToTwo(parseFloat(totalPrice) + parseFloat(Inpercentage));
    }

    var disFormat =  $("#DisFormatInput").val();
    if(disFormat != '%')
    {
        totalValue = roundToTwo(parseFloat(totalValue) - parseFloat(discountVal));
    }
    else
    {
        var discount = inPercentage(totalValue,discountVal);
        totalValue = roundToTwo(parseFloat(totalValue) - parseFloat(discount));
    }

    $("#result-"+numb).html(totalValue);
    var totalID = "#total-"+numb;
    $(totalID).val(roundToTwo(totalValue));

};

var changeTaxFormat = function(selectedValue) {

    if(selectedValue !== 'off')
    {

        $(".taxCol").show();
        $("#applyTaxInput").val('yes');
        var currency = $("#currencyInput").val(); // get current from currency input value
        $("#taxFormatInput").val(currency);

        if(selectedValue != '%')
        {
            if (($('.new-aadon-tax').length) == false)
            { // check if already not exist
                $(".vat").before('<div class="input-group-addon currenty new-aadon-tax">' + currency + '</div>')
            }
            $(".default-addon-tax").remove();
        }
        else
        {
            $("#taxFormatInput").val('%'); // apply also into hidden taxFormat input
            $(".new-aadon-tax").remove();
            if (($('.default-addon-tax').length) == false)
            { // check if already not exist
                $(".vat").after('<div class="input-group-addon  default-addon-tax">%</div>');
            }
        }

    }
    else
    {
        $("#applyTaxInput").val('no');
        $(".taxCol").hide();
    }

    expandDiv();

    var applyDiscount = $("#DisFormatInput").val();
    formatRest(selectedValue,applyDiscount);

}

var changeDiscountFormat = function(selectedValue) {
    if(selectedValue != 'off')
    {

        $(".disCol").show();
        $("#applyDiscount").val('yes');
        var currency = $("#currencyInput").val(); // get  hidden currency input value
        $("#DisFormatInput").val(currency);

        if(selectedValue != '%')
        {
            if (($('.new-aadon').length) == false)
            { // check if already not exist
                $(".discount").before('<div class="input-group-addon currenty new-aadon">' + currency + '</div>');
            }
            $(".default-addon").remove();
        }
        else
        {
            $("#DisFormatInput").val('%'); // apply also into hidden taxFormat input
            $(".new-aadon").remove();
            if (($('.default-addon').length) == false)
            { // check if already not exist
                $(".discount").after('<div class="input-group-addon  default-addon">%</div>');
            }
        }

    }
    else
    {
        $(".disCol").hide();
        $("#applyDiscount").val('no');
    }

    expandDiv();

    var applyTaxInput = $("#taxFormatInput").val();
    formatRest(applyTaxInput,selectedValue);

}

function formatRest(taxFormat,disFormat){

    var amntArray= [];
    $('.amnt').each(function(){
        var v = $(this).val();
        amntArray.push(v);
    });

    var prcArray= [];
    $('.prc').each(function(){
        var v = $(this).val();
        prcArray.push(v);
    });

    var vatArray= [];
    $('.vat').each(function(){
        var v = $(this).val();
        vatArray.push(v);
    });

    var discountArray= [];
    $('.discount').each(function(){
        var v = $(this).val();
        discountArray.push(v);
    });

    var discountArray= [];
    $('.discount').each(function(){
        var v = $(this).val();
        discountArray.push(v);
    });

    var sum = 0;
    for(var i=0; i < amntArray.length; i++)
    {

        amtVal = amntArray[i];
        prcVal = prcArray[i];
        vatVal = vatArray[i];
        discountVal = discountArray[i];

        var result = amtVal * prcVal;

        if(vatVal == ''){
            vatVal = 0;
        }

        if(taxFormat == '%'){
            var Inpercentage = parseFloat(inPercentage(result,vatVal));
            var result =   parseFloat(result + Inpercentage);
        }else if(taxFormat == 'off'){
            var result = ( $("#amount-"+i).val() ) * ( $("#price-"+i).val() ) ;
            $("#vat-"+i).val('0');
        }else{
            var result =  parseInt(result) + parseInt(vatVal);
        }

        var discount = $("#discount-" + i).val();
        if(discount == ''){
            discount = 0;
        }

        var DisFormatInput = $("#DisFormatInput").val(); // apply also into hidden taxFormat input

        if(disFormat == '%'){
            var Inpercentage = parseFloat(inPercentage(result,discount));
            var result =   parseFloat(parseInt(result) - parseInt(Inpercentage));
        }else if(disFormat == 'off') {
            $("#discount-"+i).val('0');
        }else{
            var result =   parseFloat(parseInt(result) - parseInt(discount));
        }

        $("#total-"+i).val(result);
        $("#result-"+i).html(result);

        var sum = itemsSum();
        var itemSum =  taxSum();
        var totl = parseInt(sum) + parseInt(itemSum);

        $("#subTotalInput").val(sum);
        $("#subTotal").html(sum);
        $("#totalBill").html(totl);
        $("#totalBillInput").val(totl);

    }

}

function expandDiv(){

    var applyDiscount = $("#applyDiscount").val();
    var applyTaxInput = $("#applyTaxInput").val();

    if(applyTaxInput == 'no'  && applyDiscount != 'no' ){

        if($('#item-row').find('.col-sm-6').length != 0) {

            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-6');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-7');
            });
        }

        if($('#item-row').find('.col-sm-8').length != 0) {

            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-8');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-7');
            });
        }

    }else if(applyTaxInput != 'no'  && applyDiscount == 'no' )
    {

        if($('#item-row').find('.col-sm-6').length != 0) {
            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-6');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-7');
            });
        }

        if($('#item-row').find('.col-sm-8').length != 0) {
            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-8');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-7');
            });
        }

    }else if(applyTaxInput == 'no'  && applyDiscount == 'no' )
    {

        if($('#item-row').find('.col-sm-7').length != 0) {
            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-7');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-8');
            });
        }

        if($('#item-row').find('.col-sm-6').length != 0) {
            $('.extendable').each(function () {
                $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-6');
                $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-8');
            });
        }

    }
    else
    {
        $('.extendable').each(function () {
            $('#item-row, .items-pnl-head').find('.extendable').removeClass('col-sm-7');
            $('#item-row, .items-pnl-head').find('.extendable').addClass('col-sm-6');
        });
    }

}

var changeCurrency = function()
{
    var  DisFormatInputSelector = $("#DisFormatInput");
    var currency = $("#currency").val();

    $(".currenty").html(currency);

    //apply value into input which is hidden
    $("#currencyInput").val(currency);
    var taxFormatInput = DisFormatInputSelector.val();
    if(taxFormatInput !== '%')
    {
        $("#taxFormatInput").val(currency);
    }
    var disFormatInput = DisFormatInputSelector.val();
    if(disFormatInput !== '%')
    {
        $("#DisFormatInput").val(currency);
    }

};


/****************************************************************************
 invoice item form
 ****************************************************************************/
$(document).ready(function() {

    $("#uploadFile").on("change", function(){

        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test( files[0].type))
        { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){
                // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            };
        }

    });

    //--------------------rem tax------------------
    $('#tax-row').on('click', '.remTax', function(){

        var inputLength = $('.taxVal').length-1;
        if(inputLength === 0){
            $("#taxCounter").val(0);
        }

        $(this).parent().parent().fadeOut("slow", function() {
            $(this).remove();
            $('.taxVal').each(function( index ){
                $(this).attr('id','taxValue-'+index);
                $("#taxCounter").val(index+1);
            });
            $('.remTax').each(function( index ){
                var clickFun = 'removeTax("'+index+'")';
                $(this).attr('onclick',clickFun);
            });
        });

        return false;

    });

    //--------------------add tax------------------
    $("#addTax").click(function(){
        var taxCounterSelector = $("#taxCounter");
        var intId = $("#item_row div").length + 1;
        var currency =$("#currencyInput").val();
        var taxCounter = taxCounterSelector.val();
        var functionNum  = "'"+taxCounter+"'";
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"item_row" + intId + "\"/>");
        var removeButton = $("<div style=\"clear: both; height: 10px\"></div> <div class=\"col-sm-2\"> <button type=\"button\" class=\"btn btn-danger remTax\"  aria-label=\"Left Align\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Remove\" id=\"add\"  onclick=\"removeTax("+ functionNum +")\"> <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span> </button> </div>");
        var title = $("<div class=\"col-sm-5\"> <input type=\"text\" class=\"form-control\" placeholder=\"Tax title\" name=\"taxTitle[]\"></div>");
        var value = $("<div class=\"col-sm-5\"><div class=\"input-group\"> <div class=\"input-group-addon\"><span class='currenty'>"+currency+"</span></div><input type=\"text\" class=\"form-control taxVal\" onkeypress=\"return isNumber(event)\" placeholder=\"Value\" id=\"taxValue-"+taxCounter+"\" name=\"taxValue[]\"  autocomplete=\"off\" onkeyup=\"calTotalAmount()\"></div></div>");
        var val = parseInt(taxCounter)+1;
        taxCounterSelector.val(val);
        removeButton.hover(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        fieldWrapper.append(fieldWrapper);
        fieldWrapper.append(removeButton);
        fieldWrapper.append(title);
        fieldWrapper.append(value);
        $("#tax-row").append(fieldWrapper);
    });

    $('[data-toggle="tooltip"]').tooltip();

    //--------------------rem items------------------
    $('#item-row').on('click', '.remItem', function(){

        $(this).parent().parent().parent().fadeOut("slow", function() {
            $(this).remove();
            $('.amnt').each(function( index ){
                $(this).attr('id','amount-'+index);
                var keyupFun1 = 'calTotal("'+ index +'")'+ ',calSubtotal()';
                $(this).attr('onkeyup',keyupFun1);
                $("#counter").val(index);
            });
            $('.prc').each(function( index ){
                $(this).attr('id','price-'+index);
                var keyupFun1 = 'calTotal("'+ index +'")'+ ',calSubtotal()';
                $(this).attr('onkeyup',keyupFun1);
            });
            $('.vat').each(function( index ){
                $(this).attr('id','vat-'+index);
                var keyupFun1 = 'calTotal("'+ index +'")'+ ',calSubtotal()';
                $(this).attr('onkeyup',keyupFun1);
            });
            $('.discount').each(function( index ){
                $(this).attr('id','discount-'+index);
                var keyupFun1 = 'calTotal("'+ index +'")'+ ',calSubtotal()';
                $(this).attr('onkeyup',keyupFun1);
            });
            $('.ttInput').each(function( index ){
                $(this).attr('id','total-'+index);
            });
            $('.ttlText').each(function( index ){
                $(this).attr('id','result-'+index);
            });
            $('.remItem').each(function( index ){
                var newIndex = parseInt(index)+1;
                var clickFun = 'removeItem("'+ newIndex +'")';
                $(this).attr('onclick',clickFun);
            });
        });

        return false;

    });

    //--------------------add items------------------
    $('#invocie_form').validate();

    $('#add').click(function() {

        var intId = $("#item_row div").length + 1;
        var currency = "€";
        var taxFormat = $("#taxFormatInput").val();
        var disFormat = $("#DisFormatInput").val();
        var countSelector =  $("#counter");
        var counter = countSelector.val();
        var applyTaxInput =  $("#applyTaxInput").val();
        var applyDiscount =  $("#applyDiscount").val();
        var val = parseInt(counter)+1;
        countSelector.val(val);
        val = val +555;
        //alert(val);
        var functionNum  = "'"+val+"'";
        var fieldWrapper = $("<div class=\"fieldwrapper\"/>");
        var removeButton = $("<div class=\"col-sm-1 col\"> <p><button   type=\"button\" onclick=\"removeItem("+functionNum+")\" class=\"btn btn-danger remItem\" aria-label=\"Left Align\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Remove\"> <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span> </button></p> </div> ");
        var product = $("<div class=\"col-sm-4 col extendable\"> <input type=\"text\"  class=\"form-control  firstCol req\"  name=\"proName[]\"> <textarea class=\"form-control\"  style=\"margin-top: 5px\" name=\"proDesc[]\"></textarea></div>");
        var image = $("<div class=\"col-sm-2 col\" > <input type=\"file\" name=\"picture[]\"  id=\"image-"+val+"\"> </div>");
        var amount = $("<div class=\"col-sm-1 col\" > <input type=\"text\" value='1' class=\"form-control req amnt\" name=\"amount[]\"  id=\"amount-"+val+"\" onkeypress=\"return isNumber(event)\" onkeyup=\"calTotal("+functionNum+"),calSubtotal()\" autocomplete=\"off\"> </div>");
        var price = $("<div class=\"col-sm-1 col\"> <div class=\"input-group\"> <div class=\"input-group-addon\"><span class='currenty'>"+currency+"</span></div> <input type=\"text\" class=\"form-control req prc\" name=\"price[]\" id=\"price-"+val+"\" onkeypress=\"return isNumber(event)\" onkeyup=\"calTotal("+functionNum+"),calSubtotal()\" autocomplete=\"off\"> </div> </div>");
        if(taxFormat !== '%')
        {
            vat = $("<div class=\"col-sm-1 col taxCol\" ><div class=\"input-group\"> <div class=\"input-group-addon currenty new-aadon-tax\">"+currency+"</div> <input type=\"text\" class=\"form-control vat\" name=\"vat[]\" id=\"vat-"+val+"\" onkeypress=\"return isNumber(event)\" onkeyup=\"calTotal("+functionNum+"),calSubtotal()\"  autocomplete=\"off\"> </div></div>");
        }
        else
        {
            vat = $("<div class=\"col-sm-1 col taxCol\" ><div class=\"input-group\"> <input type=\"text\" class=\"form-control vat\" name=\"vat[]\" id=\"vat-"+val+"\" onkeypress=\"return isNumber(event)\"  onkeyup=\"calTotal("+functionNum+"),calSubtotal()\" autocomplete=\"off\"> <div class=\"input-group-addon default-addon-tax\">%</div></div></div>");
        }
        if(disFormat !== '%')
        {
            discount = $("<div class=\"col-sm-1 col disCol\" ><div class=\"input-group\"> <div class=\"input-group-addon currenty new-aadon\">"+currency+"</div> <input type=\"text\" class=\"form-control discount\" name=\"discount[]\" id=\"discount-"+val+"\" onkeypress=\"return isNumber(event)\" onkeyup=\"calTotal("+functionNum+"),calSubtotal()\" autocomplete=\"off\"> </div></div>");
        }
        else
        {
            discount = $("<div class=\"col-sm-1 col disCol\" ><div class=\"input-group \"> <input type=\"text\" class=\"form-control discount\" name=\"discount[]\" id=\"discount-"+val+"\" onkeypress=\"return isNumber(event)\"  onkeyup=\"calTotal("+functionNum+"),calSubtotal()\" autocomplete=\"off\"> <div class=\"input-group-addon  default-addon\">%</div></div></div>");
        }
        var total = $("<div class=\"col-sm-1 col\"><p><span class=\"currenty\">"+currency+"</span><span class='ttlText' id=\"result-"+val+"\">0</span></p><input type=\"hidden\" class='ttInput' name=\"total[]\" id=\"total-"+val+"\"  value=\"0\"></div>");
        var clearFix = $("<div class=\"clearfix\"></div>");
        removeButton.hover(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        fieldWrapper.append(fieldWrapper);
        fieldWrapper.append(removeButton);
        fieldWrapper.append(product);
        fieldWrapper.append(image);
        fieldWrapper.append(amount);
        fieldWrapper.append(price);
        fieldWrapper.append(vat);
        fieldWrapper.append(discount);
        fieldWrapper.append(total);
        fieldWrapper.append(clearFix);
        $("#item-row").append(fieldWrapper);

        $('.firstCol:last').rules('add', {
            required: true
        });

        //hide tax div if not tax apply
        if(applyTaxInput != 'yes')
        {
            $(".taxCol").hide();
        }

        //hide discount div if not tax apply
        if(applyDiscount != 'yes')
        {
            $(".disCol").hide();
        }

        expandDiv();

    });

    $( "#billingDate" ).datepicker({dateFormat: 'dd.m.yy', showAnim: 'drop' });

    $( "#dueDate").datepicker({dateFormat: 'dd.m.yy', showAnim: 'drop' });

});