<?php
session_start();

$uid = $_SESSION['uid'];
$FirstName = $_SESSION['FirstName'];	
$DesignationHardCode = $_SESSION['DesignationHardCode'];	

if(($_SESSION['uid'] == "") || ($DesignationHardCode != "principal")){
	header('Location: ../login/login.php');
	exit();	
}

include '../configs/connection.php';

//fetch data from principal table begins
$sql = "SELECT * FROM principal WHERE pruid='$uid'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    // login success - output data of each row
    while($row = mysqli_fetch_assoc($result)){
		$PrincipalFirstName = $row["PrincipalFirstName"];
		$PrincipalLastName = $row["PrincipalLastName"];
		$DateofBirth = $row["DateofBirth"];
		$EmailId = $row["EmailId"];
		$Mobile = $row["Mobile"];
		$Sex = $row["Sex"];
		$ImageUpload = $row["ImageUpload"];

		$TenthBoard = $row["TenthBoard"];
		$TenthSchoolName = $row["TenthSchoolName"];
		$TenthDateOfCompleted = $row["TenthDateOfCompleted"];
		$TenthMarksObtained = $row["TenthMarksObtained"];
		$TwelfthBoard = $row["TwelfthBoard"];
		$TwelftSchoolCollegeUniversity = $row["TwelftSchoolCollegeUniversity"];
		$TwelftDateOfCompleted = $row["TwelftDateOfCompleted"];
		$TwelftMarksObtained = $row["TwelftMarksObtained"];
		$Graduation = $row["Graduation"];
		$GraduationCollegeUniversity = $row["GraduationCollegeUniversity"];
		$GraduationHonoursSubject = $row["GraduationHonoursSubject"];
		$GraduationDateOfCompleted = $row["GraduationDateOfCompleted"];
		$GraduationMarksObtained = $row["GraduationMarksObtained"];
		$MasterDegree = $row["MasterDegree"];
		$MasterCollegeUniversity = $row["MasterCollegeUniversity"];
		$MasterHonoursSubject = $row["MasterHonoursSubject"];
		$MasterDateOfCompleted = $row["MasterDateOfCompleted"];
		$MasterMarksObtained = $row["MasterMarksObtained"];
		$OtherDegree = $row["OtherDegree"];
		$OtherCollegeUniversity = $row["OtherCollegeUniversity"];
		$OtherHonoursSubject = $row["OtherHonoursSubject"];
		$OtherDateOfCompleted = $row["OtherDateOfCompleted"];
		$OtherMarksObtained = $row["OtherMarksObtained"];	
		
		$OrganisationName = $row["OrganisationName"];
		$Designation = $row["Designation"];
		$TimePeriod = $row["TimePeriod"];
		$OrganisationRemarks = $row["OrganisationRemarks"];	
		
		$PresentAddress = $row["PresentAddress"];	
		$PresentLandmark = $row["PresentLandmark"];	
		$PresentCountry = $row["PresentCountry"];	
		$PresentState = $row["PresentState"];	
		$PresentCity = $row["PresentCity"];	
		$PresentPinCode = $row["PresentPinCode"];	
		$PermanentAddress = $row["PermanentAddress"];	
		$PermanentLandmark = $row["PermanentLandmark"];	
		$PermanentCountry = $row["PermanentCountry"];	
		$PermanentState = $row["PermanentState"];	
		$PermanentCity = $row["PermanentCity"];	
		$PermanentPinCode = $row["PermanentPinCode"];	
		
		$PrincipalSchoolName = $row["PrincipalSchoolName"];
		$YourClass = $row["YourClass"];
		$YourSection = $row["YourSection"];
		$YourSubject = $row["YourSubject"];
		$YourClassRemarks = $row["YourClassRemarks"];

    }
}else{
    echo "0 results";
}
//fetch data from principal table ends

// profile picture begins
$DBPPPath = "../configs/principal-profile-pic.php?pruid=".$uid;
$DirectoryPPPath ="img/profile-pic.jpg";

if(!empty($ImageUpload)){
	$ProfilePicture = $DBPPPath;
}else{
	$ProfilePicture = $DirectoryPPPath;	
}
// profile picture ends

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>:: Info 4 Child ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- The styles -->
<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/charisma-app.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href='css/fullcalendar.css' rel='stylesheet'>
<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
<link href='css/chosen.css' rel='stylesheet'>
<link href='css/uniform.default.css' rel='stylesheet'>
<link href='css/colorbox.css' rel='stylesheet'>
<link href='css/jquery.cleditor.css' rel='stylesheet'>
<link href='css/jquery.noty.css' rel='stylesheet'>
<link href='css/noty_theme_default.css' rel='stylesheet'>
<link href='css/elfinder.min.css' rel='stylesheet'>
<link href='css/elfinder.theme.css' rel='stylesheet'>
<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
<link href='css/opa-icons.css' rel='stylesheet'>
<link href='css/uploadify.css' rel='stylesheet'>
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- The fav icon -->
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<!-- topbar starts -->
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"> <img alt=""/> <span>ABC</span></a>
      <!-- theme selector starts -->
      <div class="btn-group pull-right theme-container" > <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu" id="themes">
          <li><a data-value="classic" href="#"><i class="icon-blank"></i> 1</a></li>
          <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Default</a></li>
          <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> 2</a></li>
          <li><a data-value="redy" href="#"><i class="icon-blank"></i> 3</a></li>
          <li><a data-value="journal" href="#"><i class="icon-blank"></i> 4</a></li>
          <li><a data-value="simplex" href="#"><i class="icon-blank"></i> 5</a></li>
          <li><a data-value="slate" href="#"><i class="icon-blank"></i> 6</a></li>
          <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> 7</a></li>
          <li><a data-value="united" href="#"><i class="icon-blank"></i> 8</a></li>
        </ul>
      </div>
      <!-- theme selector ends -->
      <!-- user dropdown starts -->
      <div class="btn-group pull-right" > <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user"></i><span class="hidden-phone">Welcome <?php echo $FirstName; ?>!</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
        <li><a href="profile.php">View Profile</a></li>
          <li><a href="../login/login.php">Logout</a></li>
        </ul>
      </div>
      <!-- user dropdown ends -->
      <div class="top-nav nav-collapse">
        <ul class="nav">
          <li><a href="#">Visit Site</a></li>
          <li>
            <form class="navbar-search pull-left">
              <input placeholder="Search" class="search-query span2" name="query" type="text">
            </form>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
</div>
<!-- topbar ends -->
<div class="container-fluid">
  <div class="row-fluid">
    <!-- left menu starts -->
    <div class="span2 main-menu-span">
      <div class="well nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
          <li class="nav-header hidden-tablet">Menu</li>
          <li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
          <li><a class="ajax-link" href="profile.php"><i class="icon-user"></i><span class="hidden-tablet"> View Profile</span></a></li>
		   <li><a class="ajax-link" href="edit-profile.php"><i class="icon-user"></i><span class="hidden-tablet"> Edit Profile</span></a></li>
          <li><a class="ajax-link" href="gallery.php"><i class="icon-briefcase"></i><span class="hidden-tablet"> Gallery</span></a></li>
          <li><a class="ajax-link" href="Event-manager.php"><i class="icon-eye-close"></i><span class="hidden-tablet"> Event Management</span></a></li>
		  <li><a class="ajax-link" href="schedule-manager.php"><i class="icon-tags"></i><span class="hidden-tablet"> Schedule Management</span></a></li>
           <li><a class="ajax-link" href="message.php"><i class="icon-bullhorn"></i><span class="hidden-tablet">Message Centre</span></a></li>
          <li><a class="ajax-link" href="notification.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Notification</span></a></li>
		  <li><a class="ajax-link" href="allstudent.php"><i class="icon-bell"></i><span class="hidden-tablet"> View All Student</span></a></li>
           <li><a class="ajax-link" href="teacher-atten.php"><i class=" icon-envelope"></i><span class="hidden-tablet">Teacher's Attandance</span></a></li>
          <li><a class="ajax-link" href="teacher-performance.php"><i class="icon-picture"></i><span class="hidden-tablet"> Teacher's Performance</span></a></li>
		 
          
        </ul>
        <label id="for-is-ajax" class="hidden-tablet" for="is-ajax">
        <input id="is-ajax" type="checkbox">
        Ajax on menu</label>
      </div>
      <!--/.well -->
    </div>
    <!--/span-->
    <!-- left menu ends -->
    <noscript>
    <div class="alert alert-block span10">
      <h4 class="alert-heading">Warning!</h4>
      <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
    </noscript>
    <div id="content" class="span10">
      <!-- content starts -->
      <div>
        <ul class="breadcrumb">
          <li> <a href="#">Home</a> <span class="divider">/</span> </li>
          <li> <a href="#">Dashboard</a> </li>
        </ul>
      </div>
      <div class="sortable row-fluid"> <a data-rel="tooltip" title="6 Unread Notification." class="well span3 top-block" href="#"> <span class="icon32 icon-color icon-pin"></span>
        <div>School Notification</div>
        <div>507</div>
        <span class="notification">6</span> </a> <a data-rel="tooltip" title="4 Assignment not submitted." class="well span3 top-block" href="#"> <span class="icon32 icon-color icon-clipboard"></span>
        <div>Total Assignment</div>
        <div>228</div>
        <span class="notification green">4</span> </a> <a data-rel="tooltip" title="next holiday on 5th may" class="well span3 top-block" href="#"> <span class="icon32 icon-color icon-calendar"></span>
        <div> Next Holiday</div>
        <div>5th may</div>
       <!-- <span class="notification yellow">RS 34</span>--> </a> <a data-rel="tooltip" title="12 Unread messages." class="well span3 top-block" href="#"> <span class="icon32 icon-color icon-envelope-closed"></span>
        <div>Messages</div>
        <div>25</div>
        <span class="notification red">12</span> </a> </div>
		
		
		<div class="row-fluid">
		<div class="span12">
				<div class="span3"><img src="<?php echo $ProfilePicture; ?>" width="240" height="240"></div>
				<div class="span5 show-grid">
                <h2>Welcome <?php echo $PrincipalFirstName . " ".$PrincipalLastName; ?>!</h2>
             <h4><?php echo $PrincipalSchoolName; ?></h4>
             <table class="table table-condensed">
							
							  <tbody>
								<tr>
									<td style="border:none">Full Name:</td>
									<td class="center" style="border:none"><?php echo $PrincipalFirstName . " ".$PrincipalLastName; ?></td>
								                        
								</tr>
								<tr>
									<td style="border:none">Date of Birth:</td>
									<td class="center" style="border:none"><?php echo $DateofBirth; ?></td>
									                               
								</tr>
								<tr>
									<td style="border:none">Phone:</td>
									<td class="center" style="border:none"><?php echo $Mobile; ?></td>
								                         
								</tr>
								<tr>
									<td style="border:none">Email:</td>
									<td style="border:none" class="center"><?php echo $EmailId; ?></td>
									                         
								</tr>
								                          
							  </tbody>
						 </table>
                </div>
				<div class="span4">
                 <br clear="all">
                  <br clear="all">
                   <br clear="all">
             <h4> Total No. Of Principals added with I4C : <span>1</span> </h4>
              <h4> Total No. Of Teachers added with I4C : <span>12</span> </h4>
                 <h4> Total No. Of Students added with I4C : <span>270</span> </h4>
                <br clear="all">
                 
                 <p class="left">
							<a href="#" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i>Request For Add More</a> 
							
						</p>
                </div>
				
				</div>
			</div>
		
		
		<div class="box">
					<div class="box-header well">
						<h2><i class="icon-list-alt"></i> Class Performance</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="stackchart" class="center" style="height:300px;"></div>

						<p class="stackControls center">
							<input class="btn" type="button" value="With stacking">
							<input class="btn" type="button" value="Without stacking">
						</p>

						<p class="graphControls center">
							<input class="btn btn-primary" type="button" value="Bars">
							<input class="btn btn-primary" type="button" value="Lines">
							<input class="btn btn-primary" type="button" value="Lines with steps">
						</p>
					</div>
				</div>
      
      <div class="row-fluid sortable">
        <div class="box span6">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-flag"></i> Notification</h2>
            <div class="box-icon"> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> </div>
          </div>
          <div class="box-content">
          <table class="table table-striped">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Date </th>
									  <th>Message</th>
									  <th>Detail</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>Info4Child.com</td>
									<td class="center">yyyy/mm/dd</td>
									<td class="center">Hello All, How r u?</td>
									<td class="center">
										<button class="btn btn-primary" data-rel="tooltip" data-original-title="View Detail"><i class="icon-edit icon-white"></i></button>
									</td>                                       
								</tr>
								<tr>
									<td>Info4Child.com</td>
									<td class="center">yyyy/mm/dd</td>
									<td class="center">We are Launching soon </td>
									<td class="center">
										<button class="btn btn-primary" data-rel="tooltip" data-original-title="View Detail"><i class="icon-edit icon-white"></i></button>
									</td>                                       
								</tr>
								<tr>
									<td>Rakesh Goyal</td>
									<td class="center">yyyy/mm/dd</td>
									<td class="center">hello sir, today i can't come school.</td>
									<td class="center">
										<button class="btn btn-primary" data-rel="tooltip" data-original-title="View Detail"><i class="icon-edit icon-white"></i></button>
									</td>                                        
								</tr>
							    
							  </tbody>
						 </table>
          </div>
        </div>
        <!--/span-->
        <div class="box span6">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-hand-right"></i> Student of the month</h2>
            <div class="box-icon"> <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="span3"><img src="img/profile-pic.jpg"> </div>
            <div class="span9"><h3>Rakesh Goyal </h3>
            <h5>Class: 6 </h5>
           <blockquote class="pull-right">
										<p>Congrats him. on this month he got topper rank in school. he got 99% result in last month with aptitude section</p>
										<small>Updated By:  <cite title="">Info4Child.com</cite></small>
									  </blockquote>
           </div>
            <br clear="all">
          </div>
        </div>
        <!--/span-->
        
      </div>
	  
	  
	  
	  
      <!--/row-->
      <!-- content ends -->
    </div>
    <!--/#content.span10-->
  </div>
  <!--/fluid-row-->
  <hr>
  <div class="modal hide fade" id="myModal">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <h3>Settings</h3>
    </div>
    <div class="modal-body">
      <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">Close</a> <a href="#" class="btn btn-primary">Save changes</a> </div>
  </div>
  <footer>
    <p class="pull-left">&copy; <a href="#" target="_blank">Info 4 Child</a> 2014</p>
    <p class="pull-right">Powered by: <a href="#">Info 4 Child</a></p>
  </footer>
</div>
<!--/.fluid-container-->
<!-- external javascript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script>
<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="js/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="js/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="js/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="js/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src="js/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src="js/bootstrap-typeahead.js"></script>
<!-- tour library -->
<script src="js/bootstrap-tour.js"></script>
<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calander plugin -->
<script src='js/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>
<!-- chart libraries start -->
<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.pie.min.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<!-- chart libraries end -->
<!-- select or dropdown enhancer -->
<script src="js/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<script src="js/jquery.uniform.min.js"></script>
<!-- plugin for gallery image view -->
<script src="js/jquery.colorbox.min.js"></script>
<!-- rich text editor library -->
<script src="js/jquery.cleditor.min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- file manager library -->
<script src="js/jquery.elfinder.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
</body>
</html>
