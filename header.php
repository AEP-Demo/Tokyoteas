<?php include('connA.php');?>

<!doctype html>
<html lang="en">  
  

<!-- Mirrored from tokyo-teas.myshopify.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 14 Oct 2013 15:13:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="cleartype" content="on">
    <meta name="robots" content="index,follow">
	<?php  $pageURL = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
    <title>
      
        Mobilia Shopify Theme | Tokyo Teas
      
    </title>
        
    
      <meta name="description" content="Mobilia is a beautifully responsive Shopify theme that seamlessly adapts for all screen sizes and devices." />
    

    
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@outofthesandbox">
      <meta name="twitter:creator" content="@outofthesandbox">
    

    
      
      <meta property="og:image" content="s/files/1/0179/8721/t/3/assets/logo2e2c.png?3378" />
      <meta property="og:url" content="index.php" />
      <meta property="og:title" content="Welcome" />
      <meta property="og:description" content="Mobilia is a beautifully responsive Shopify theme that seamlessly adapts for all screen sizes and devices." />
      <meta property="og:type" content="website" />
    
    
    <meta property="og:site_name" content="Tokyo Teas" />
    <meta name="author" content="Tokyo Teas">

    <!-- Mobile Specific Metas -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 

    <!-- Stylesheets -->
    <link href="<?php echo $hostName; ?>s/files/1/0179/8721/t/3/assets/styles2e2c.css?3378" rel="stylesheet" type="text/css"  media="all"  />
    <!--[if lte IE 8]>
      <link href="//cdn.shopify.com/s/files/1/0179/8721/t/3/assets/ie.css?3378" rel="stylesheet" type="text/css"  media="all"  />
    <![endif]-->
      
    <!-- Icons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $hostName; ?>s/files/1/0179/8721/t/3/assets/favicon2e2c.png?3378">
    <link rel="canonical" href="index.php" />

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=.|Asap:light,normal,bold|Asap:light,normal,bold|' rel='stylesheet' type='text/css'>
    
    
      
    <!-- jQuery and jQuery fallback -->
    <script src="<?php echo $hostName; ?>script/jquery/1.8.3/jquery.min.js"></script>
    <script>window.jQuery || document.write("<script src='<?php echo $hostName; ?>s/files/1/0179/8721/t/3/assets/jquery-1.8.3.min2e2c.js?3378'>\x3C/script>")</script>
    <script src="<?php echo $hostName; ?>s/files/1/0179/8721/t/3/assets/app2e2c.js?3378" type="text/javascript"></script>
    
    <script src="<?php echo $hostName; ?>s/shopify/option_selection7e72.js?3b1cc5466991a3639bab6e5fbec7b128250ad256" type="text/javascript"></script>        
    <script type="text/javascript">      var Shopify = Shopify || {};
      Shopify.shop = "tokyo-teas.myshopify.com";
      Shopify.theme = {"name":"mobilia","id":3591117};
	  
	  $(document).ready(function(){
		
		$('#add-to-cart , .purchase .action_button').click(function(evt){ //alert('hello');
			evt.preventDefault();
			if($('.cloudzoom').length){
				var product_imgPath = $('.flex-active').attr('src');
				var product_name = $('.product_name').html();
				var product_price = $('.current_price').parent('span').attr('content');
				var product_pageUrl = '<?php echo $pageURL; ?>';
				var product_category = $('a[title*="tagged"]').html();
				var product_quantity = 1;//$('#updates_249287710').val();
				
			}else{
				var product_imgPath = $(this).parents('.container').find('.modal_image img').attr('src');
				var product_name = $(this).parents('.container').find('h3').html();
				var product_price  = $(this).parents('.container').find('.current_price').html().trim().substring(1);
				var product_pageUrl = '<?php echo $pageURL; ?>';	 
				var product_category = $('a[title*="tagged"]').html();
				var product_quantity = 1;//$('#updates_249287710').val();
				
			}
			
			$.ajax({
				type: "POST",
				url: "<?php echo $hostName;?>addcart.php",
				data: { 'product_imgPath':product_imgPath, 'product_name':product_name , 'product_price':product_price , 'product_pageUrl':product_pageUrl, 'product_category':product_category, 'product_quantity':product_quantity },
				success:function(result){
				
				document.location.href= "<?php echo $hostName.'cart.php'; ?>";
			 }});
		
			
		});
		
	  });
	  
	  
	  /*
	  $(document).ready(function(){
		$('#add-to-cart').click(function(evt){ //alert('hello');
			evt.preventDefault();
			//var imgPath = $('.flex-active-slide').find('.cloudzoom , .flex-active').attr('src');
			var product_imgPath = $('.flex-active').attr('src');
			var product_name = $('.product_name').html();
			var product_price = $('.current_price').parent('span').attr('content');
			//alert(product_price);
			var product_pageUrl = '<?php echo $pageURL; ?>';
			$.ajax({
				type: "POST",
				url: "<?php echo $hostName;?>addcart.php",
				data: { 'product_imgPath':product_imgPath, 'product_name':product_name , 'product_price':product_price , 'product_pageUrl':product_pageUrl },
				success:function(result){
				//alert(result);
				//$(location).href('<?php echo $hostName."cart.php"; ?>')
				'<?php echo $hostName."cart.php"; ?>'
				document.location.href= "<?php echo $hostName.'cart.php'; ?>";
			 }});
			//alert(product_imgPath +' '+ product_name +' '+ product_price);
		});
		
	  });
	  */
</script>
<?php 
$del = $_POST['deleteId'];
if($del == null)
{
?>
<script type="text/javascript">
	/****** DO NOT MODIFY BELOW CODE *******/
	var cartItemMap = new Object();
	var cartItem1 = null;
	var cartItem2 = null;
	var cartItem3 = null;
	<?php
		$size = 0;
		foreach($_SESSION['product'] as $key => $pro){ 
			$size = $size + 1;
		}
		$i = 1;
		foreach($_SESSION['product'] as $key => $pro){ 
			
			if($size > 3){
				$size = $size -1;
			}
			else{
	?>
	if("<?php echo $pro['product_name'] ?>" != ''){
		cartItem<?php echo $i ?> = new Object();
		cartItem<?php echo $i ?>.productName = "<?php echo $pro['product_name'] ?>";
		cartItem<?php echo $i ?>.productPrice = "<?php echo $pro['product_price'] ?>";
		cartItem<?php echo $i ?>.productQuantity = <?php echo $pro['product_quantity'] ?>;
		cartItem<?php echo $i ?>.productCategory = "<?php echo $pro['product_category'] ?>";
		cartItemMap[<?php echo $key ?>] = cartItem<?php echo $i ?>;
	}
	<?php
			$i = $i + 1;
			}
		}
		?>	
</script>
<?php 
}
?>


<script type="text/javascript">var __st={"a":1798721,"offset":-14400,"u":"6e83f8925393"};</script>
<script type="text/javascript">    //<![CDATA[
    (function() {
      function asyncLoad() {
        var urls = ["//s.shopify.com/javascripts/shopify_stats.js?v=5"];
        for (var i = 0; i < urls.length; i++) {
          var s = document.createElement('script');
          s.type = 'text/javascript';
          s.async = true;
          s.src = urls[i];
          var x = document.getElementsByTagName('script')[0];
          x.parentNode.insertBefore(s, x);
        }
      }
      window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad, false);
    })();
    //]]>
</script>
<link rel="stylesheet" href="<?php echo $hostName; ?>global/theme-controls.css" type="text/css" />
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id; js.async=true;
      js.src = "../connect.facebook.net/en_US/all.js#xfbml=1&status=0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="header">
      <div class="container content"> 
        <div class="sixteen columns homepage">
        <div class="one-third column logo alpha">
          <a href="<?php echo $hostName; ?>" title="Tokyo Teas">
            
              <img src="<?php echo $hostName; ?>s/files/1/0179/8721/t/3/assets/logo2e2c.png?3378" alt="Tokyo Teas" />
            
          </a>
        </div>
        
        <div class="two-thirds column nav omega">
          <div class="mobile_hidden mobile_menu_container">
            <ul class="top_menu search_nav">
              
              
                
                  <li>
                    <a href="<?php echo $hostName; ?>pages/contact-us.php" title="Contact Us">Contact Us</a>
                  </li>
                
              
              
                <li>
                  <a href="<?php echo $hostName; ?>account/login.php" title="My Account ">My Account</a>
                </li>
                
              
              
                <li>
                  <form class="search" action="<?php  echo $hostName; ?>search.php">
                    <input type="hidden" name="type" value="product" />
					<input type="text" name="q" class="search_box" placeholder="Search..." value="" onfocus="document.getElementById('div_filter').style.display='';"/>
					<div style="display:none;" id="div_filter">
  					<select name="filter" class="search_box">
						<option  selected="selected" value="">Select filter type</option>
						<option  value="Premium">Premium</option>
						<option  value="Teaware">Teaware</option>
						<option  value="Sale">Sale</option>
					</select>
					</div>
                  </form>
                </li>
              
            </ul>
            <ul class="main menu">
              
                
                  <li><a href="<?php echo $hostName; ?>index.php" title="Home" class="active">Home</a></li>
                
              
                
                  <li><a href="<?php echo $hostName; ?>pages/collections.php" title="Shop"  >Shop 
                    <span class="arrow">?</span></a> 
                    <ul>
                      
                        
                          <li><a href="<?php echo $hostName; ?>collections/tea.php" title="Premium Tea">Premium Tea</a></li>
                        
                      
                        
                        <li><a href="<?php echo $hostName; ?>collections/teaware.php" title="Teaware">Teaware <span class="arrow"> ?</span></a> 
                          <ul>
                                                    
                              <li><a href="<?php echo $hostName; ?>collections/teaware/products/kyusu-teapot.php" title="Kyusu Teapot">Kyusu Teapot</a></li>
                                                    
                              <li><a href="<?php echo $hostName; ?>collections/teaware/products/stone-tea-tray.php" title="Stone Tea Tray">Stone Tea Tray</a></li>
                                                    
                              <li><a href="<?php echo $hostName; ?>collections/teaware/products/bamboo-tea-tray.php" title="Bamboo Tea Tray">Bamboo Tea Tray</a></li>
                            
                          </ul>
                        </li>
                        
                      
                        
                          <li><a href="<?php echo $hostName; ?>collections/sidebar.php" title="Sidebar">Sidebar</a></li>
                        
                      
                    </ul>
                  </li>
                
              
                
                  <li><a href="<?php echo $hostName; ?>blogs/news.atom" title="Blog" >Blog</a></li>
                
              
                
                  <!--<li><a href="pages/theme-features.php" title="Theme Features"  >Theme Features 
                    <span class="arrow">?</span></a> 
                    <ul>
                      
                        
                          <li><a href="pages/theme-settings.php" title="Theme Settings">Theme Settings</a></li>
                        
                      
                        
                          <li><a href="pages/theme-styles.php" title="Theme Styles">Theme Styles</a></li>
                        
                      
                        
                          <li><a href="http://outofthesandbox.com/products/mobilia-theme-tokyo" title="Purchase Theme">Purchase Theme</a></li>
                        
                      
                    </ul>
                  </li>
				  -->
                
              
            </ul>
          </div>
          <ul class="nav_buttons menu">
            <li class="navicon_button">
              <a href="#" class="navicon" title="View Menu">Menu</a>
            </li>
            <li>
              <a href="<?php echo $hostName; ?>cart.php" class="cart " title="Shopping Cart">Cart <pre><?php //print_r($_COOKIE['product']);?></pre></a>
            </li>
          </ul>
        </div>

        
      </div>
    </div>
    </div>