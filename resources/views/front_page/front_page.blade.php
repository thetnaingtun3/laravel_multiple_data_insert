<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <title>Multipal Sand Data</title>
</head>
<body>
<div class="container">
    <br>
    <form action="/orders" method="POST">
        {{csrf_field()}}
        <section>
            <div class="panel panel-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="customer_name" class="form-control" placeholder="Please your name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="customer_address" class="form-control" placeholder="Your Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-footer">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Budget</th>
                        <th>Amount</th>
                        <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="product_name[]" required=""></td>
                        <td><input type="text" class="form-control" name="brand[]" required=""></td>
                        <td><input type="text" class="form-control quantity" name="quantity[]" required=""></td>
                        <td><input type="text" class="form-control budget" name="budget[]" required=""></td>
                        <td><input type="text" class="form-control amount" name="amount[]" required=""></td>
                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td>Total</td>
                        <td><b class="total"></b></td>
                        <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </form>
</div>
<script>
    $('tbody').delegate('.quantity,.budget', 'keyup', function () {
        var tr = $(this).parent().parent();
        var quantity = tr.find('.quantity').val();
        var budget = tr.find('.budget').val();
        var amount = (quantity * budget);
        tr.find('.amount').val(amount);
        total();
    });

    function total() {
        var total = 0;
        $('.amount').each(function (i, e) {
            var amount = $(this).val() - 0;
            total += amount;
        });
        $('.total').html(total + ".00 MMK");

    }

    $('.addRow').on('click', function () {
        addRow();
    });

    function addRow() {
        var tr = '<tr>' + '<td><input type="text" class="form-control" name="product_name[]" required=""></td>' +
            '<td><input type="text" class="form-control" name="brand[]" required=""></td>' +
            '<td><input type="text" class="form-control quantity" name="quantity[]" required=""></td>' +
            '<td><input type="text" class="form-control budget" name="budget[]" required=""></td>' +
            '<td><input type="text" class="form-control amount" name="amount[]" required=""></td>' +
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>' +
            '</tr>';
        $('tbody').append(tr);
    }

    $(".remove").live('click', function () {
        var last = $('tbody tr').length;
        if (last == 1) {
            alert("You can not remove last row");
        } else {
            $(this).parent().parent().remove();
        }
    });

</script>
</body>
</html>
