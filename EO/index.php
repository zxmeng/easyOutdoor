<?php
	require_once 'core/init.php';
	if (Session::exists('home')) {
		echo Session::flash('home');
	}
?>

<!--
<?php
	$user = new User();
	if ($user->isLoggedIn()) {
?>

<?php
	} else {
	}
?>
-->

<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>EasyOutdoor</title>

		<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
			<link rel="stylesheet" href="css/masonry-lawrence.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
				<?php include 'lr.php';?>
			</header>

		<!-- Main -->
			<div id="main">
				<div align="center">
					<img class="header-picture"src="images/logo@20150303.png" >
				</div>
				<div align="center" style="margin:1em 0 1em 0;">
					<div class="mode-button">
						ALL | CALENDER | MAP | REFERENCE
					</div>
				</div>
				<div class="masonry">
				   <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
				   <div class="item">
				   		<div class="item-name">1香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div>
				   <!--end 1 event-->
				   
				   <div class="item">
				   		<div class="item-name">2香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div>
				   <div class="item">
				   		<div class="item-name">3香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div>
				   <div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div><div class="item">
				   		<div class="item-name">4香港中文大學大部行</div>
				   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
				   		<div class="item-infomation">
				   			<h2>Date:</h2>2015 - 04 - 22<br/>
				   			<h2>Time:</h2>11:00 - 13:00<br/>
				   			<h2>Venue:</h2>本部<br/>
				   			<h2>Description:</h2>香港中文大學，簡稱中大，是一所坐落於香港沙田的公立研究型大學。大學於1963年創校，並於1966年開辦香港首間研究院。其最初是由三所現有的書院合併而成，當中的源流最早可追索至1949年。其中的崇基學院和聯合書院，本身亦是由一些於清末至民國時期、在中國內地建立的教會及私立大學合併而成。<br/>
				   		</div>
				   		<div align="right">
				   		<div class="button">More Infomation</div></div>
				   </div>
			</div>
			</div>

		<!-- Footer -->
			<footer id="footer">
			</footer>

		<?php include 'register-popup.php';?>
		<?php include 'login-popup.php';?>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

	</body>
</html>