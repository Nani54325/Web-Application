<?php

?>



<!DOCTYPE html>
<html>
<head>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


	
	<style type="text/css">
		 .mt-100 {
     margin-top: 100px
 }

 .container-fluid {
     margin-top: 50px
 }

 body {
     background-color: #f2f7fb
 }

 .card {
     border-radius: 5px;
     -webkit-box-shadow: 0 0 5px 0 rgba(43, 43, 43, 0.1), 0 11px 6px -7px rgba(43, 43, 43, 0.1);
     box-shadow: 0 0 5px 0 rgba(43, 43, 43, 0.1), 0 11px 6px -7px rgba(43, 43, 43, 0.1);
     border: none;
     margin-bottom: 30px;
     -webkit-transition: all 0.3s ease-in-out;
     transition: all 0.3s ease-in-out
 }

 .card .card-header {
     background-color: transparent;
     border-bottom: none;
     padding: 20px;
     position: relative
 }

 .card .card-block {
     padding: 1.25rem
 }

 .table-responsive {
     display: inline-block;
     width: 100%;
     overflow-x: auto
 }

 .card .card-block table tr {
     padding-bottom: 20px
 }

 .table>thead>tr>th {
     border-bottom-color: #ccc
 }

 .table th {
     padding: 1.25rem 0.75rem
 }

 td,
 th {
     white-space: nowrap
 }

 .tabledit-input:disabled {
     display: none
 }

 .btn-primary,
 .sweet-alert button.confirm,
 .wizard>.actions a {
     background-color: #4099ff;
     border-color: #4099ff;
     color: #fff;
     cursor: pointer;
     -webkit-transition: all ease-in 0.3s;
     transition: all ease-in 0.3s
 }

 .btn {
     border-radius: 2px;
     text-transform: capitalize;
     font-size: 15px;
     padding: 10px 19px;
     cursor: pointer
 }
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
// example.php will be used to send the data to the sever database
$('#example-1').Tabledit({
url: 'example.php',
editButton: false,
deleteButton: false,
hideIdentifier: true,
columns: {
identifier: [0, 'id'],
editable: [[2, 'first'], [3, 'last'],[3, 'nickname']]
}
});

});
	</script>

	<title></title>
</head>
<body>
<script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1567487539/jquery.tabledit.js"></script>
<div class="container mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit row with Click</h5>
                    <span>Click on row to perform edit action then Enter for save</span>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example-1">
                            <thead>
                                <tr>
                                    <th style="display: none;">#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>About</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" style="display: none;">1</th>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">Sam
                                        </span><input class="tabledit-input form-control input-sm" type="text" name="First Name" value="Mark
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span" style="">Motto
                                        </span><input class="tabledit-input form-control input-sm fill" type="text" name="Last Name" value="Otto
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Android Developer</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="display: none;">2</th>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">Mark
                                        </span><input class="tabledit-input form-control input-sm" type="text" name="First Name" value="Jacob
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">Henry
                                        </span><input class="tabledit-input form-control input-sm" type="text" name="Last Name" value="Thorntonkk
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Java Developer</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="display: none;">3</th>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">Larry
                                        </span><input class="tabledit-input form-control input-sm" type="text" name="First Name" value="Larry
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode" style="cursor: pointer;"><span class="tabledit-span">Pingor
                                        </span><input class="tabledit-input form-control input-sm" type="text" name="Last Name" value="the Bird
" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Hybris Developer</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>