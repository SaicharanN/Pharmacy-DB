@extends('layouts.app')



<SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
           
            element2.name = "txtbox[]";
            cell2.appendChild(element2);

            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            
            element3.name = "txtbox1[]";
            cell3.appendChild(element3);


        }

        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }


            }
            }catch(e) {
                alert(e);
            }
        }

    </SCRIPT>

 </head>



@section('content')

<div>
<form action="/create" method="post">
    <table>
  <div class="container">
	{{ csrf_field() }}
    <label><b style="color:red">PatientID</b></label>
    <input placeholder="Enter PId" name="Pid" required>

    <label><b style="color:red">Patient Name</b></label>
    <input placeholder="Enter Pt Name" name="Pname" required>

    <label><b style="color:red">Patient Age</b></label>
    <input placeholder="Enter Pt Age" name="age" required>
        
    <label><b style="color:red">Sex</b></label>
    <input placeholder="Enter Pt Gender" name="Sex" required>

    
  </div>

<br>
<INPUT style="margin-left:450px; background-color: blue; color:white" type="button" value="Add Row" onclick="addRow('dataTable')" />

    <INPUT style="margin-left:2px; background-color: blue; color:white"  type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

    <TABLE style="margin-left:450px"  id="dataTable" width="350px" border="1">
        <TR>
            <TD><INPUT type="checkbox" name="chk"/></TD>
            <TD><label><b>DrugId</b></label>
    <input placeholder=""  required name="drugid">
            
            <TD><label><b>Quantity</b></label>
    <input placeholder="" required name="Quantity">
        </TR>
   

    </TABLE>

<br>
<input type="Submit" name="Submit" value="submit" style="
        background-color: white;
        color: black;
        padding: 14px 20px;
        margin-left: 600px;
        border: none;
        cursor: pointer;
        width: 6%;">
<!---<a href="/"><input style="
        background-color: white;
        color: black;
        padding: 14px 20px;
        margin-left: 600px;
        border: none;
        cursor: pointer;
        width: 6%;"
        >Submit</button></a> -->
</table>
</form>

</div>




@endsection