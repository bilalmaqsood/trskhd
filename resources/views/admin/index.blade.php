@extends('layouts.app')
@section('title' , 'Dashboard')
@section('css')
@endsection

@section('content')
<table width="98%" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;border:none;">
<tbody><tr>
<td>
<table cellspacing="0" cellpadding="5" align="center" style="width:100%;height:96%; vertical-align:top;border:none;">
<tbody>


<tr>
<td style="width:3px;">&nbsp;</td>
<td style="width:3px;">&nbsp;</td>
<td valign="top" align="left">
<h3>My Control Panel</h3>
<ul>
<li><a style="text-decoration:none" href="StudentPanel.php">Student Panel</a>
</li>
<li><a style="text-decoration:none" href="createTest.php">Section Test Panel</a></li>
<li><a style="text-decoration:none" href="testreport.php">Test Report</a></li>
<li><a style="text-decoration:none" href="createExam.php">Section Exam Panel</a></li>
<li><a style="text-decoration:none" href="examreport.php">Exam Report Annu</a></li>
<li><a style="text-decoration:none" href="create_classes.php">Create Classes</a></li>
<li><a style="text-decoration:none" href="view_classes.php">View Classes</a></li>
<li><a style="text-decoration:none" href="SMSDETAILS.php">SMS DETAILS</a></li>
<li><a style="text-decoration:none" href="holydays_calendar.php">My Basic Panel</a></li>

</ul>
<br>
<h3>Student Analysis</h3>
<ul>
<li><a target="_self" href="StudentReg.php">New Addmission</a></li>

<li><a target="_self" href="ShortStudentList.php">Short Student List</a></li>

</ul>
<br>
<h3>Staff Analysis</h3>
<ul>
<li><a target="_self" href="StaffReg.php">New Appoint</a></li>
<li><a target="_self" href="shotstufflist.php">Short Stuff List</a></li>
</ul>
<br>
</td>
<td style="width:3px;">&nbsp;</td>
<td valign="top" align="left" id="CPH_Main_My_Links_Sheet">
<h3>My SMS Panel</h3><ul><li><b>SMS All:-</b>&nbsp;&nbsp;(&nbsp;<a title="Send SMS to All Staff of School !" href="smsallstuff.php">Staff</a> | 
<a title="Send SMS to All Student of School !" href="smsallstudent.php">Student&nbsp;</a> | <a title="Send SMS to One Student of School !" href="onestudent_sms.php">One Student SMS&nbsp;</a>)
</ul>
<br>
<h3>Strength &amp; Capacity</h3>
<ul>
    <li>
        <a target="_self" href="CompleteSectionList.php">Complete Section List
        </a>
    </li>
        <li>
            <a target="_self" href="SectionStrengthAnalysis.php">Section Strength Analysis
            </a>
        </li>
</ul>
<br>
<h3>Total Amount and Expenditure</h3>
<ul>
    <li>
        <a target="_self" href="Total_amount.php">Total Amount and Expenditure
        </a>
    </li>
</ul>
<br>
<h3>Attendance Sheet</h3>
<ul>
<li>
        <a target="_self" href="fee_sheet.php">Fees Sheet
        </a>
    </li>
    <li>
        <a target="_self" href="fee_view_result.php">Fees Sheet Result
        </a>
    </li>
    <li>
        <a target="_self" href="listattendencestudent.php">Attendance Sheet
        </a>
    </li>
        <li>
        <a target="_self" href="attendence_list.php">Attendance List
        </a>
    </li>
</ul>
</td>
	
<td style="width:5px;">&nbsp;</td>
</tr>
</tbody></table>
@endsection

@section('js')

@endsection()