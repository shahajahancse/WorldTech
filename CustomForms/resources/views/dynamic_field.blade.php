<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CustomForms</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .input-bg{
            background-color: #e9ecef;
            opacity: 1;
        }
        .button-fa{
            padding: 10px !important;
        }
    </style>
</head>
<body>
    <div class="pt-5 container">
        <div class="col-12">
            <div class="card">
                <div class="text-center card-header">
                    <h3 class="card-title pt-1">Dynamic Field Add</h3>
                </div>
                <form name="cart">
                    <table class="table table-borderless" name="cart">
                        <tbody id="add">
                            <tr name="line_items">
                              <td ><input type="text" name="qty" value="" class="form-control input-bg" placeholder="Quantity" required=""></td>
                              <td ><input type="text" name="price" value="" class="form-control input-bg" placeholder="Unit Price" required=""></td>
                              <td><span class="pt-5">=</span></td>

                              <td class="pl-0"><input type="text" name="item_total" value="" jAutoCalc="{qty} * {price}" class="form-control" placeholder="Total Price" readonly=""></td>

                              <td ><i class="fa fa-plus rounded-circle input-bg button-fa" id="add_more"></i></td>
                            </tr>
                        </tbody>
                        <tr name="line_items">
                          <td colspan="3"></td>
                          <td class="pl-0"><input type="text" name="sub_total" value="" jAutoCalc="SUM({item_total})" class="form-control"readonly=""></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="pl-0"><button class="float-right btn input-bg px-4 py-2">Submit</button></td>                  
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script src="{{ asset('/jautocalc.min.js') }}"></script>
    <script>

        $( document ).ready(function() {

            function autoCalcSetup() {
                $('form[name=cart]').jAutoCalc('destroy');
                $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
            }
            autoCalcSetup();


            $('#add_more').click(function(e){
                e.preventDefault();
                var html = '';
                html+='<tr name="line_items">';
                html+='<td ><input type="text" name="qty" value="" class="form-control input-bg" placeholder="Quantity" required=""></td>';

                html+='<td ><input type="text" name="price" value="" class="form-control input-bg" placeholder="Unit Price" required=""></td>';
                html+='<td><span class="pt-5">=</span></td>';

                html+='<td class="pl-0"><input type="text" name="item_total" value="" jAutoCalc="{qty} * {price}" class="form-control" readonly=""></td>';

                html+='<td ><i class="fas fa-times rounded-circle bg-danger button-fa" id="remove"></i></td>';
                html+='</tr>';
                var $added = $('#add').append(html);
                $added.find('input[type=text]').val('');
                autoCalcSetup()
            })


            $(document).on('click', '#remove', function(){
                $(this).closest('tr').remove();
                autoCalcSetup();
            })
        });
   

    </script>
    </script>
</body>
</html>



