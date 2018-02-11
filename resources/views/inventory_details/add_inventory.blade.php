<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invenoty Title</title>
    <meta name="description" content="">
    <!-- Styles Start -->
    <link type="text/css" rel="stylesheet" href="assets/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/styles/bootstrap-theme.min.css">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/styles/custom.css">

<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Styles End -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
    
</head>
<body>

<div class="clear50"></div>
<!-- header starts  -->
<div class="container">
  <form method="post">
    <table id="myTable" class=" table order-list">
    <thead>
      <tr>
          <td><input type="text" name="title" class="form-control" placeholder="Enter Title Name"> </td>
          <td> <select name="year" id="years" class="form-control">
                        <option value='' selected disabled="">--Select Years--</option>
                        <option value="2017">2014</option>
                        <option value="2017">2015</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2020">2021</option>
                        <option value="2020">2022</option>
                        <option value="2020">2023</option>
                        <option value="2020">2024</option>
                        <option value="2020">2025</option>
                        <option value="2020">2026</option>
                        <option value="2020">2027</option>
                        <option value="2020">2028</option>
                        <option value="2020">2029</option>
                        <option value="2020">2030</option>
                    </select> 
                </td>
                <td>
                  <select id='months' name="month" class="form-control">
                    <option value='' selected disabled="">--Select Month--</option>
                    <option value='01'>Janaury</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                    </select> 
                </td>
            <td>
                <input type="button" class="btn btn-block" id="addrow" value="Add Row" />
            </td>
            <td>
                <button type="submit" class="btn btn-block btn-success">Save</button>
            </td>
        </tr>
        <tr>
            <td>Select Categroy</td>
            <td>Price</td>
            <td>Quntity</td>
            <td>Debit/Credit</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-3">
                <select name="cats" class="form-control">
                  <option value='' selected disabled="">--Select Categroy--</option>
                  <option value="1">copy</option>
                  <option value="2">uniform</option>
                </select>
            </td>
            <td class="col-sm-3">
                <input type="text" name="price"  class="form-control"/>
            </td>
            <td class="col-sm-2">
                <input type="text" name="qty"  class="form-control"/>
            </td>
            <td class="col-sm-3">
                <select name="debit_credit" class="form-control">
                  <option value="0">Debit</option>
                  <option value="1">Credit</option>
                </select>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
      <tr>
          <td></td>
          <td></td>
          <td>Total: 500</td>
          <td>Debit: 100</td>
          <td>Credit: 50</td>
        </tr>
    </tfoot>
    <div class="clearfix"></div>
</table>
</form>
</div>
    <!-- Scripts Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="assets/scripts/bootstrap.min.js"></script>
    <!-- Scripts End -->
<script type="text/javascript">
 $(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select name="cats' + counter + '" class="form-control"><option value='' selected disabled="">--Select Categroy--</option><option value="1">copy</option> <option value="2">uniform</option></select></td>';
        cols += '<td><input type="text" class="form-control" name="price' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="qty' + counter + '"/></td>';
        cols += '<td><select name="debit_credit' + counter + '" class="form-control"><option value="0">Debit</option><option value="1">Credit</option></select></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});

function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>
</body>
</html>