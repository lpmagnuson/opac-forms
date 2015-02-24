<?php
$author = $_GET['author'];
$title = $_GET['title'];
$biblink = $_GET['biblink'];
$location = $_GET['location'];
$callnum = $_GET['callnum'];
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <title>Online Reserve Request Form | Oviatt Library</title>
  <link type="text/css" rel="stylesheet" media="print" href="http://library.csun.edu/sites/all/themes/othello/css/print.css" />
  <meta http-equiv="cleartype" content="on">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .required {
            color: red;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../css/main.css">

        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
	<body>
	<div class="container region-inner region-content-inner">
	<div>
<h2>Online Reserve Request Form</h2>
<p>(The form is for use by faculty)<br />

Please see <a href="http://library.csun.edu/CourseReserves/ReserveMaterials">How to Place Materials on Reserve</a> before completing the form below.
<a href="http://library.csun.edu/docs/resreq.pdf">Printable form</a> (requires <a href="http://get.adobe.com/reader/">Adobe Reader</a>).</p>

<form action="mail.php" method="post" id="request">
<h3>Select Location to Place Materials on Reserve: <span class="required">*</span></h3>
<div class="radio">
<input type='radio' value='RPM' id='rbr' name='desk' checked><label for='rbr'>Reserves, Periodicals, & Microform (for most course reserve materials; exceptions below)</label>
<input type='radio' value='Music and Media' name='desk'id='mmr' ><label for='mmr'>Music and Media (Audio-visual materials for ALL courses; ALL materials for MUSIC courses; Exception: TCC items)</label>
<input type='radio' value='TCC Reserves' name='desk' id='tccr' ><label for='tccr'>Teacher Curriculum Center (for K-12 classroom materials and Juvenile literature) </label>
</div>
<h3>Instructor and Course Information:</h3>
<label for='name'>Instructor Name:<span class="required">*</span></label><input class='input-large' id='author' name='name' type='text' value='' ><br />
<label for='email'>Email Address:<span class="required">*</span></label><input class='input-large' id='email' name='email' type='text' value='' ><br />
<label for='department'>Department:<span class="required">*</span></label><input class='input-large' id='author' name='department' type='text' value='' ><br />
<label for='course_number'>Course Number:<span class="required">*</span></label><input class='input-large'  name='course_number' id='course_number' type='text' value='' ><br />
<label for='course_title'>Course Title:<span class="required">*</span></label><input class='input-large' id='course_title' name='course_title' type='text' value='' ><br />
<h3>Reserve Loan Period Desired</h3>
<p>Please select a loan period (required)<span class="required">*</span></p>
<div class="radio">
<input type='radio' value='E-Reserves' name='loan' id='eres' ><label for='eres'>E-Reserves (No Limit - email materials to librbr@csun.edu)</label>
<input type='radio' value='1hour' name='loan' id='1h' ><label for='1h'>1 Hour (Library Use Only) </label>
<input type='radio' value='2 Hours Overnight' name='loan' id='2hnight' ><label for='2hnight'>2 Hours & Overnight (May be checked out 1 hour before closing. Item due 1 hour after library reopens.)</label>
<input type='radio' value='2 Hours' name='loan' id='2h' ><label for='2h'>2 Hours (Library Use Only -- Required for Periodicals) </label>
<input type='radio' value='3 Hours' name='loan' id='3h' ><label for='3h'>3 Hours (Library Use Only -- Recommended for Videos) </label>
<input type='radio' value='1 Day' name='loan' id='1d' ><label for='1d'>1 Day</label>
<input type='radio' value='2 Days' name='loan' id='2d' ><label for='2d'>2 Days </label>
<input type='radio' value='7 Days' name='loan' id='7d' ><label for='7d'>7 Days (Non-Renewable)</label>
<label for='semester'>Reserve for<span class='required'>*</span></label>
<select name='semester' id='semester'>
  <option> - Select One - </option>
  <option >Summer Session I 2015</option>
  <option>Summer Session II 2015</option>
  <option>Summer Session III 2015</option>
  <option>Fall 2015</option>
  <option>Spring 2016</option>
</select>
<label for='remove1'>Take materials off reserve at end of:</label><input class='input-large' id='remove1' name='remove1' type='text' value='[semester/year]' ><br />
<label for='remove2'>Or After:</label><input class='input-large' id='remove2' name='remove2' type='text' value='mm/dd/yy' ><br />
</div>
<h3>Item to Put on Reserve:<h3>
<label for='author'>Author:</label><input class='input-xxlarge'   id='author' name='author' type='text' value='<?php echo $author; ?>' ><br />
<label for='title'>Title:</label><textarea class='input-xxlarge' form='request' id='title' name='title'><?php echo $title; ?></textarea><br />
<label for='biblink'>Link:</label><input class='input-xxlarge'  id='link' name='link' type='text' value='<?php echo $biblink; ?>' ><br />
<label for='location'>Location:</label><input class='input-xxlarge'  id='location' name='location' type='text' value='<?php echo $location; ?>' ><br />
<label for='callnum'>Call Number:</label><input class='input-xxlarge' id='callnum' name='callnum' type='text' value='<?php echo $callnum; ?>' ><br />
<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">
</form>
</div>
</div>
</body>
</html>