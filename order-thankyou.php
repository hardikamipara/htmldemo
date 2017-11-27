<?php
	/*----------File Information----------*/
	#Project : Oil Pixel
	#File Created By : Avani Trivedi & Mona Kathrotiya
	#File Created Date : 19 June 2015
	#File Edited By :
	#File Edited Date :
	/*----------File Information----------*/
	
	include ("includes/connection.php");
	$obj = new myclass();
	session_start();
?><!DOCTYPE html>
<html>
<head>
<title>Thank You - Oilpixel</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include("includes/header.php"); ?>
<meta name="description" content="Thank You - Oilpixel">
<meta name="keywords" content="" />
<meta property="og:title" content="Oilpixel - Thank You"/>
<meta property="og:description" content="Thank You - Oilpixel"/>
<meta property="og:url" content="https://www.oilpixel.com/thankyou">
<link rel="canonical" href="https://www.oilpixel.com/thankyou">

<?php include("includes/js_css.php") ?>
</head>
<body>

<!-- HEADER DIV -->
<?php 
	include("includes/menu.php");
?>
<!-- HEADER DIV -->

<!-- PAGE TITLE -->
<div class="pagetitle">
	<h1>THANKS FOR <span>GETTING IN TOUCH</span></h1>
   
</div>
<!-- PAGE TITLE -->

<!-- DIV FOR DISPLAY MESSAGE -->
<div class="col-pad-top-bottom">
	<div class="container">
	  <div class="thankyoudiv">	    
    	<div class="thankstext">
        	<h5>We will get <span>back to you very soon</span></h5>
            <p>Meanwhile, since you are already here, we invite you to study our paintings, read our blogs and give us your suggestions on how we can serve you better.</p>
        </div>
      </div>
    </div>
</div>
<!-- DIV FOR DISPLAY MESSAGE -->

<!-- RECENT WORK --->
<div class="recentwork">
    <h3>Recent <span>Paintings</span></h3>
    <div class="container2">
        <?php
						$SelectRecentPaintings = $obj->sql_query("SELECT *,tbl_painting.URLSlug AS PaintingSlug FROM tbl_painting LEFT JOIN tbl_category ON tbl_painting.CategoryID = tbl_category.CategoryID WHERE PaintingID in (SELECT max(PaintingID) from tbl_painting GROUP BY CategoryID) AND tbl_category.Status = 'Active' ORDER BY tbl_category.DisplayOrder LIMIT 4");
						for($i=0;$i<count($SelectRecentPaintings);$i++)
						{
							if(!empty($SelectRecentPaintings[$i]['PaintingSmallImage']))
							{
                    ?>
            <div class="divhover">
                <a href="gallery/<?php echo $SelectRecentPaintings[$i]['PaintingSlug']; ?>">
                    <div class="hvr-reveal">
                        <img src="upload_data/painting_image/painting_small_image/<?php echo $SelectRecentPaintings[$i]['PaintingSmallImage']; ?>" alt="<?php echo $SelectRecentPaintings[$i]['PaintingImageAlt']; ?>" title="<?php echo $SelectRecentPaintings[$i]['PaintingImageTitle']; ?>">
                        <div class="mask">
                            <div href="digital-paintings-gallery/<?php echo $SelectRecentPaintings[$i]['PaintingSlug']; ?>" class="info">
                                <h5><?php echo stripslashes($SelectRecentPaintings[$i]['PaintingName']); ?></h5>
                                <p>
                                    <?php echo stripslashes($SelectRecentPaintings[$i]['PaintingSize']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
							}
						}
					?>
                <div class="clr"></div>
    </div>
    <div class="canvasbtn"> <a href="get-painted">create my canvas </a> </div>
</div>	        
<!-- RECENT WORK --->
<div class="clr"></div>

<!--- BLOG --->
<?php include("includes/blog.php"); ?>
<!--- BLOG --->

<!-- FOOTER -->
<?php include("includes/footer.php"); ?>
<!-- FOOTER -->

<script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>

<!-- SCRIPT FOR SUMMARY -->
<script>
 $(document).ready(function() {
        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.

        var summaries = $('#summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.page-header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.blogbg').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: -1
            });
        });
    });
</script>
<!-- SCRIPT FOR SUMMARY -->

</body>
</html>