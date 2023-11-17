<?php include('header.php');?>
    
    <div class="toggle_menu nav">
      <ul class="mobile_menu">
        <li>
          <form class="search" action="<?php  echo $hostName; ?>search.php">
            <input type="hidden" name="type" value="article,product" />
            <input type="text" name="q" class="search_box" placeholder="Search..." value="" />
          </form>
        </li>
        
          
            <li ><a href="../index.php" title="Home">Home</a></li>
          
        
          
            <li ><a href="../pages/collections.php" title="Shop">Shop</a>
              <ul>
                
                  
                    <li ><a href="../collections/tea.php" title="Premium Tea">Premium Tea</a></li>
                  
                
                  
                  <li ><a href="../collections/teaware.php" title="Teaware">Teaware</a> 
                    <ul>
                                              
                        <li ><a href="../collections/teaware/products/kyusu-teapot.php" title="Kyusu Teapot">Kyusu Teapot</a></li>
                                              
                        <li ><a href="../collections/teaware/products/stone-tea-tray.php" title="Stone Tea Tray">Stone Tea Tray</a></li>
                                              
                        <li ><a href="../collections/teaware/products/bamboo-tea-tray.php" title="Bamboo Tea Tray">Bamboo Tea Tray</a></li>
                      
                    </ul>
                  </li>
                  
                
                  
                    <li ><a href="../collections/sidebar.php" title="Sidebar">Sidebar</a></li>
                  
                
              </ul>
            </li>
          
        
          
            <li ><a href="../blogs/news.php" title="Blog">Blog</a></li>
          
        
          
            <li ><a href="../pages/theme-features.php" title="Theme Features">Theme Features</a>
              <ul>
                
                  
                    <li ><a href="../pages/theme-settings.php" title="Theme Settings">Theme Settings</a></li>
                  
                
                  
                    <li ><a href="../pages/theme-styles.php" title="Theme Styles">Theme Styles</a></li>
                  
                
                  
                    <li ><a href="http://outofthesandbox.com/products/mobilia-theme-tokyo" title="Purchase Theme">Purchase Theme</a></li>
                  
                
              </ul>
            </li>
          
        
        
          
            <li>
              <a href="../pages/contact-us.php" title="Contact Us">Contact Us</a>
            </li>
          
        
        
          <li>
            <a href="login.php" title="My Account ">My Account</a>
          </li>
          
        
      </ul>
    </div>  
      
      <div class="fixed_header"></div>

      
        <div class="container main content"> 
      

      
        

<div class="sixteen columns clearfix collection_nav">
  <h1 class="collection_title">Checkout</h1>
</div>


<div class="clearfix" id="customer">  
  <div class="one-third column">
    &nbsp;
  </div>
  <div class="six columns" id="login_form">
    <div id="customer">
      <!-- Create Customer -->
      <div id="create-customer">

        <form method='post'  action="<?php  echo $hostName; ?>thanks.php" id='create_customer' accept-charset='UTF-8'>
			<input name='form_type' type='hidden' value='create_customer'/>
			<input name="utf8" type="hidden" value="✓"> 
          <?php $subTotal = 0;
				foreach($_SESSION['product'] as $key => $pro){ 
				$subTotal +=  $pro['product_price']*$pro['product_quantity'];
				}
			?>
		  <div  class="clearfix large_form">
            <label for="amount" class="login">Amount</label>
            <input type="text" value="<?php echo $subTotal ;?>" name="amount" id="amount" class="large" size="5"  readonly />
          </div>

          <div  class="clearfix large_form">
            <label for="first_name" class="login">Card Holder Name</label>
            <input type="text" value="" name="card_holder_name" id="card_holder_name" class="large" size="30" required />
          </div>
			
		<div  class="clearfix large_form">
            <label for="card_number" class="login">Card Type</label>
			<select name="card_type" class="large" required>
				<option value="Visa Card">Visa Card</option>
				<option value="Master Card">Master Card</option>
			</select>
            
          </div>
		  
          <div  class="clearfix large_form">
            <label for="card_number" class="login">Card Number</label>
            <input type="text" value="" name="card_number" id="card_number" class="large" size="16" required/>
          </div>
		  
		  <div  class="clearfix large_form">
            <label for="card_number" class="login">Expire Date</label>
			<select  class="small" name="month" id="month" required>
				<option value="">MM</option>
				<?php for($i=1 ; $i<=12; $i++){ 
				echo '<option value="'.$i.'">'.$i.'</option>';
				} ?>
			</select>
			<select class="small" name="year" id="year" required>
				<option value="">YYYY</option>
				<?php for($i=2010 ; $i<=2025; $i++){ 
				echo '<option value="'.$i.'">'.$i.'</option>';
				} ?>
			</select>
            
          </div>

          <div  class="clearfix large_form">
            <label for="CVV" class="login">CVV</label>
            <input type="password" value="" name="cvv" id="password" class="large password" maxlength="3" required />
          </div>

          <div class="action_bottom">
            <input class="action_button" type="submit" value="Pay" />
          
          </div>
        </form>
      </div><!-- /#create-customer -->
    </div>
  </div>
</div>

      
    </div> <!-- end container -->

      <?php include('footer.php');?> <!-- end footer -->
    
      <script type="text/javascript">
        (function() {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = '../script/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
      </script>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async=true;js.src="../script/twitter/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    

  </body>

<!-- Mirrored from tokyo-teas.myshopify.com/account/register by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 14 Oct 2013 15:15:57 GMT -->
</html>