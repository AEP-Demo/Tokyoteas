<?php include('header.php');
$deleteId = $_POST['deleteId'];
unset($_SESSION['product'][$deleteId]);
if($deleteId != null)
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

<pre><?php //print_r($_COOKIE['product']);?></pre>
<pre><?php //print_r($_SESSION['product']);?></pre>
    <div class="toggle_menu nav">
      <ul class="mobile_menu">
        <li>
          <form class="search" action="<?php  echo $hostName; ?>search.php">
            <input type="hidden" name="type" value="article,product" />
            <input type="text" name="q" class="search_box" placeholder="Search..." value="" />
          </form>
        </li>
        
          
            <li ><a href="index.php" title="Home">Home</a></li>
          
        
          
            <li ><a href="pages/collections.php" title="Shop">Shop</a>
              <ul>
                
                  
                    <li ><a href="collections/tea.php" title="Premium Tea">Premium Tea</a></li>
                  
                
                  
                  <li ><a href="collections/teaware.php" title="Teaware">Teaware</a> 
                    <ul>
                                              
                        <li ><a href="collections/teaware/products/kyusu-teapot.php" title="Kyusu Teapot">Kyusu Teapot</a></li>
                                              
                        <li ><a href="collections/teaware/products/stone-tea-tray.php" title="Stone Tea Tray">Stone Tea Tray</a></li>
                                              
                        <li ><a href="collections/teaware/products/bamboo-tea-tray.php" title="Bamboo Tea Tray">Bamboo Tea Tray</a></li>
                      
                    </ul>
                  </li>
                  
                
                  
                    <li ><a href="collections/sidebar.php" title="Sidebar">Sidebar</a></li>
                  
                
              </ul>
            </li>
          
        
          
            <li ><a href="blogs/news.php" title="Blog">Blog</a></li>
          
        
          
            <li ><a href="pages/theme-features.php" title="Theme Features">Theme Features</a>
              <ul>
                
                  
                    <li ><a href="pages/theme-settings.php" title="Theme Settings">Theme Settings</a></li>
                  
                
                  
                    <li ><a href="pages/theme-styles.php" title="Theme Styles">Theme Styles</a></li>
                  
                
                  
                    <li ><a href="http://outofthesandbox.com/products/mobilia-theme-tokyo" title="Purchase Theme">Purchase Theme</a></li>
                  
                
              </ul>
            </li>
          
        
        
          
            <li>
              <a href="pages/contact-us.php" title="Contact Us">Contact Us</a>
            </li>
          
        
        
          <li>
            <a href="account/login.php" title="My Account ">My Account</a>
          </li>
          
        
      </ul>
    </div>  
      
      <div class="fixed_header"></div>

      
        <div class="container main content"> 
      

      
          <div class="sixteen columns clearfix collection_nav">
    <h1 class="collection_title">Cart</h1>
  </div>

  <div class="sixteen columns">
    <div class="clearfix breadcrumb">
      
    </div>
  </div>

  
    <div class="sixteen columns">
    <div class="clearfix breadcrumb">
      
        <a href="collections/teaware.php">&lt; Continue Shopping</a>
      
    </div>
  </div>
  
  <div class="sixteen columns">
      <form id="cart_form" method="post" action="checkout.php">
        <div class="checkout_table_header">    
          <div class="eight columns alpha">      
            <h4>Item</h4>
          </div>
              
          <div class="three columns">
            <h4>Price</h4>
          </div>    
        
          <div class="two columns">
            <h4>Qty</h4>
          </div>
        
          <div class="three columns omega">
            <h4>Total</h4>
          </div>
        
          <div class="clear"></div>
        </div>
        
        <ul class="none">
        <?php
			$subTotal = 0;
			foreach($_SESSION['product'] as $key => $pro){ 
			$subTotal +=  $pro['product_price']*$pro['product_quantity'];
		?>
          <li>
          <div class="eight columns title_column alpha">
             <a title="Bamboo Tea Tray" href="<?php echo $pro['product_pageUrl'];?>" class="cart_image">
                <img width="100" alt="<?php echo $pro['product_name'];?>" src="<?php echo $pro['product_imgPath'];?>">
             </a>

            <p class="cart_price">
              $<?php echo $pro['product_price']*$pro['product_quantity'];?>
              <span class="price_total_text">
                <a title="Remove Item" href="/cart/change?line=1&amp;quantity=0">Remove</a>
              </span>
            </p>
            <p>
              <a title="Bamboo Tea Tray" href="<?php echo $pro['product_pageUrl'];?>"><?php echo $pro['product_name'];?></a>
            </p> 
            
            
          </div>
        
          <div class="three columns">
            <p class="price_total">
              $<?php echo $pro['product_price'];?>
            </p>
          </div>

          <div id="quantity_1" class="two columns mobile_right">
            <span class="quantity_label">Quantity:</span>
            <input type="text" value="<?php echo $pro['product_quantity']; ?>" id="updates_249287710" name="updates[]" class="quantity" size="1" onblur="updateQuantity(this.value, '<?php echo $key;?>');" onfocus="document.getElementById('checkout').parentNode.innerHTML = '<b>Enter a quantity first</b>';">
          </div>
          
          <div class="three columns mobile_right omega">
            <ul class="icons right cart_icons">
              <li class="close">
                <a title="Remove Item" onclick="deleteProduct('<?php echo $key;?>');" href="javascript:void(0);">X</a>
              </li>
            </ul>

            <span class="price_total">$<?php echo $pro['product_price']*$pro['product_quantity'];?></span>
          </div>
              
          <div class="sixteen columns clearfix alpha omega">
            <hr>
          </div>
        </li>
		<?php } ?>
        
          <!--<li>
          <div class="eight columns title_column alpha">
             <a title="Stone Tea Tray" href="/products/stone-tea-tray" class="cart_image">
               
               
                 
               
                 
               
                 
               
                 
               
               
                 <img alt="Stone Tea Tray" src="s/files/1/0179/8721/products/twt-604-7_1_small.jpeg?v=1351337570">
                          
             </a>

            <p class="cart_price">
              $320.00
              <span class="price_total_text">
                <a title="Remove Item" href="/cart/change?line=2&amp;quantity=0">Remove</a>
              </span>
            </p>
            <p>
              <a title="Stone Tea Tray" href="/products/stone-tea-tray">Stone Tea Tray</a>
            </p> 
            
            
          </div>
        
          <div class="three columns">
            <p class="price_total">
              $320.00
            </p>
          </div>

          <div id="quantity_2" class="two columns mobile_right">
            <span class="quantity_label">Quantity:</span>
            <input type="number" value="2" id="updates_249474208" name="updates[]" class="quantity" size="2" min="0">
          </div>
          
          <div class="three columns mobile_right omega">
            <ul class="icons right cart_icons">
              <li class="close">
                <a title="Remove Item" href="/cart/change?line=2&amp;quantity=0">X</a>
              </li>
            </ul>

            <span class="price_total">$640.00</span>
          </div>
              
          <div class="sixteen columns clearfix alpha omega">
            <hr>
          </div>
        </li>
        
          <li>
          <div class="eight columns title_column alpha">
             <a title="Kyusu Teapot" href="/products/kyusu-teapot" class="cart_image">
               
               
                 
               
                 
               
                 
               
               
                 <img alt="Kyusu Teapot" src="s/files/1/0179/8721/products/twpc-110-02_1_small.jpeg?v=1351336824">
                          
             </a>

            <p class="cart_price">
              $58.00
              <span class="price_total_text">
                <a title="Remove Item" href="/cart/change?line=3&amp;quantity=0">Remove</a>
              </span>
            </p>
            <p>
              <a title="Kyusu Teapot" href="/products/kyusu-teapot">Kyusu Teapot</a>
            </p> 
            
            
          </div>
        
          <div class="three columns">
            <p class="price_total">
              $58.00
            </p>
          </div>

          <div id="quantity_3" class="two columns mobile_right">
            <span class="quantity_label">Quantity:</span>
            <input type="number" value="1" id="updates_249474150" name="updates[]" class="quantity" size="2" min="0">
          </div>
          
          <div class="three columns mobile_right omega">
            <ul class="icons right cart_icons">
              <li class="close">
                <a title="Remove Item" href="/cart/change?line=3&amp;quantity=0">X</a>
              </li>
            </ul>

            <span class="price_total">$58.00</span>
          </div>
              
          <div class="sixteen columns clearfix alpha omega">
            <hr>
          </div>
        </li>
        
          <li>
          <div class="eight columns title_column alpha">
             <a title="Organic Gyokuro" href="/products/organic-gyokuro" class="cart_image">
               
               
                 
                   <img alt="Organic Gyokuro" src="s/files/1/0179/8721/products/0202GRECLG-2_small.jpeg?v=1366074705">
                   
                  
               
                 
               
                 
               
                 
               
                          
             </a>

            <p class="cart_price">
              $33.00
              <span class="price_total_text">
                <a title="Remove Item" href="/cart/change?line=4&amp;quantity=0">Remove</a>
              </span>
            </p>
            <p>
              <a title="Organic Gyokuro - 100g / Summer" href="/products/organic-gyokuro">Organic Gyokuro - 100g / Summer</a>
            </p> 
            
            
          </div>
        
          <div class="three columns">
            <p class="price_total">
              $33.00
            </p>
          </div>

          <div id="quantity_4" class="two columns mobile_right">
            <span class="quantity_label">Quantity:</span>
            <input type="number" value="3" id="updates_248270102" name="updates[]" class="quantity" size="2" min="0">
          </div>
          
          <div class="three columns mobile_right omega">
            <ul class="icons right cart_icons">
              <li class="close">
                <a title="Remove Item" href="/cart/change?line=4&amp;quantity=0">X</a>
              </li>
            </ul>

            <span class="price_total">$99.00</span>
          </div>
              
          <div class="sixteen columns clearfix alpha omega">
            <hr>
          </div>
        </li>
        -->
        </ul>
        <div class="thirteen columns align_right alpha">
          <h4 class="subtotal">
            Subtotal
          </h4>
        </div>

        <div class="three columns omega">
          <p class="subtotal_amount">
            <strong>$<?php echo $subTotal;?> USD</strong> 
            <small style="display:none" id="estimated-shipping">+ <em>$0.00</em> estimated shipping </small>

            
              <small class="excluding_tax"><em>Excluding tax &amp; shipping</em></small>
            
          </p>

        </div>

         
          <div class="four columns mobile_left alpha">
            <label for="note">Special Instructions:</label>
          </div>
        
          <div class="six columns">
            <textarea rows="2" name="note" id="note"></textarea>        
          </div>  
        
        
        <div class="three columns update_subtotal_text align_right ">
          <p>
            <a class="update_subtotal" href="#">Update Subtotal</a>
          </p>
        </div>

        <div class="three columns omega">
          <p>
            <input type="submit" value="Checkout" name="checkout" id="checkout" class="action_button">
          </p>
          
          

        </div>
      </form>
    </div>
  
	<div class="sixteen columns" id="shipping-calculator">
<!--
  <h4>Shipping rates calculator</h4>
    
  <div class="clearfix" id="shipping-calculator-form-wrapper">
    
      <div id="address_country_container" class="four columns alpha">
        <label for="address_country">Country</label>
        <select data-default="United States" name="address[country]" id="address_country"><option data-provinces="[]" value="">- Please Select --</option>
<option data-provinces="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;American Samoa&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;Armed Forces Americas&quot;,&quot;Armed Forces Europe&quot;,&quot;Armed Forces Pacific&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Federated States of Micronesia&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Guam&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Marshall Islands&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Carolina&quot;,&quot;North Dakota&quot;,&quot;Northern Mariana Islands&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Palau&quot;,&quot;Pennsylvania&quot;,&quot;Puerto Rico&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virgin Islands&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;Washington DC&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" value="United States">United States</option>
<option data-provinces="[]" value="United Kingdom">United Kingdom</option>
<option data-provinces="[&quot;Australian Capital Territory&quot;,&quot;New South Wales&quot;,&quot;Northern Territory&quot;,&quot;Queensland&quot;,&quot;South Australia&quot;,&quot;Tasmania&quot;,&quot;Victoria&quot;,&quot;Western Australia&quot;]" value="Australia">Australia</option>
<option data-provinces="[&quot;Alberta&quot;,&quot;British Columbia&quot;,&quot;Manitoba&quot;,&quot;New Brunswick&quot;,&quot;Newfoundland&quot;,&quot;Northwest Territories&quot;,&quot;Nova Scotia&quot;,&quot;Nunavut&quot;,&quot;Ontario&quot;,&quot;Prince Edward Island&quot;,&quot;Quebec&quot;,&quot;Saskatchewan&quot;,&quot;Yukon&quot;]" value="Canada">Canada</option>
<option data-provinces="[]" value="">---</option>
<option data-provinces="[]" value="Afghanistan">Afghanistan</option>
<option data-provinces="[]" value="Aland Islands">Aland Islands</option>
<option data-provinces="[]" value="Albania">Albania</option>
<option data-provinces="[]" value="Algeria">Algeria</option>
<option data-provinces="[]" value="Andorra">Andorra</option>
<option data-provinces="[]" value="Angola">Angola</option>
<option data-provinces="[]" value="Anguilla">Anguilla</option>
<option data-provinces="[]" value="Antigua And Barbuda">Antigua And Barbuda</option>
<option data-provinces="[&quot;Buenos Aires&quot;,&quot;Buenos Aires City&quot;,&quot;Catamarca&quot;,&quot;Chaco&quot;,&quot;Chobut&quot;,&quot;Corrientes&quot;,&quot;C\u00f3rdoba&quot;,&quot;Ente R\u00edos&quot;,&quot;Formosa&quot;,&quot;Jujuy&quot;,&quot;La Pampa&quot;,&quot;La Rioja&quot;,&quot;Mendoza&quot;,&quot;Misiones&quot;,&quot;Neuqu\u00e9n&quot;,&quot;R\u00edo Negro&quot;,&quot;Salta&quot;,&quot;San Juan&quot;,&quot;San Luis&quot;,&quot;Santa Cruz&quot;,&quot;Santa Fe&quot;,&quot;Santiago Del Estero&quot;,&quot;Tierra del Fuego&quot;,&quot;Tucum\u00e1n&quot;]" value="Argentina">Argentina</option>
<option data-provinces="[]" value="Armenia">Armenia</option>
<option data-provinces="[]" value="Aruba">Aruba</option>
<option data-provinces="[&quot;Australian Capital Territory&quot;,&quot;New South Wales&quot;,&quot;Northern Territory&quot;,&quot;Queensland&quot;,&quot;South Australia&quot;,&quot;Tasmania&quot;,&quot;Victoria&quot;,&quot;Western Australia&quot;]" value="Australia">Australia</option>
<option data-provinces="[]" value="Austria">Austria</option>
<option data-provinces="[]" value="Azerbaijan">Azerbaijan</option>
<option data-provinces="[]" value="Bahamas">Bahamas</option>
<option data-provinces="[]" value="Bahrain">Bahrain</option>
<option data-provinces="[]" value="Bangladesh">Bangladesh</option>
<option data-provinces="[]" value="Barbados">Barbados</option>
<option data-provinces="[]" value="Belarus">Belarus</option>
<option data-provinces="[]" value="Belgium">Belgium</option>
<option data-provinces="[]" value="Belize">Belize</option>
<option data-provinces="[]" value="Benin">Benin</option>
<option data-provinces="[]" value="Bermuda">Bermuda</option>
<option data-provinces="[]" value="Bhutan">Bhutan</option>
<option data-provinces="[]" value="Bolivia">Bolivia</option>
<option data-provinces="[]" value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
<option data-provinces="[]" value="Botswana">Botswana</option>
<option data-provinces="[]" value="Bouvet Island">Bouvet Island</option>
<option data-provinces="[&quot;Acre&quot;,&quot;Alagoas&quot;,&quot;Amap\u00e1&quot;,&quot;Amazonas&quot;,&quot;Bahia&quot;,&quot;Cear\u00e1&quot;,&quot;Distrito Federal&quot;,&quot;Esp\u00edrito Santo&quot;,&quot;Goi\u00e1s&quot;,&quot;Maranh\u00e3o&quot;,&quot;Mato Grosso&quot;,&quot;Mato Grosso do Sul&quot;,&quot;Minas Gerais&quot;,&quot;Paran\u00e1&quot;,&quot;Para\u00edba&quot;,&quot;Par\u00e1&quot;,&quot;Pernambuco&quot;,&quot;Piau\u00ed&quot;,&quot;Rio Grande do Norte&quot;,&quot;Rio Grande do Sul&quot;,&quot;Rio de Janeiro&quot;,&quot;Rond\u00f4nia&quot;,&quot;Roraima&quot;,&quot;Santa Catarina&quot;,&quot;Sergipe&quot;,&quot;S\u00e3o Paulo&quot;,&quot;Tocantins&quot;]" value="Brazil">Brazil</option>
<option data-provinces="[]" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option data-provinces="[]" value="Brunei">Brunei</option>
<option data-provinces="[]" value="Bulgaria">Bulgaria</option>
<option data-provinces="[]" value="Burkina Faso">Burkina Faso</option>
<option data-provinces="[]" value="Burma">Burma</option>
<option data-provinces="[]" value="Burundi">Burundi</option>
<option data-provinces="[]" value="Cambodia">Cambodia</option>
<option data-provinces="[&quot;Alberta&quot;,&quot;British Columbia&quot;,&quot;Manitoba&quot;,&quot;New Brunswick&quot;,&quot;Newfoundland&quot;,&quot;Northwest Territories&quot;,&quot;Nova Scotia&quot;,&quot;Nunavut&quot;,&quot;Ontario&quot;,&quot;Prince Edward Island&quot;,&quot;Quebec&quot;,&quot;Saskatchewan&quot;,&quot;Yukon&quot;]" value="Canada">Canada</option>
<option data-provinces="[]" value="Cape Verde">Cape Verde</option>
<option data-provinces="[]" value="Cayman Islands">Cayman Islands</option>
<option data-provinces="[]" value="Central African Republic">Central African Republic</option>
<option data-provinces="[]" value="Chad">Chad</option>
<option data-provinces="[]" value="Chile">Chile</option>
<option data-provinces="[]" value="China">China</option>
<option data-provinces="[]" value="Christmas Island">Christmas Island</option>
<option data-provinces="[]" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option data-provinces="[]" value="Colombia">Colombia</option>
<option data-provinces="[]" value="Comoros">Comoros</option>
<option data-provinces="[]" value="Congo">Congo</option>
<option data-provinces="[]" value="Congo, The Democratic Republic Of The">Congo, The Democratic Republic Of The</option>
<option data-provinces="[]" value="Cook Islands">Cook Islands</option>
<option data-provinces="[]" value="Costa Rica">Costa Rica</option>
<option data-provinces="[]" value="Croatia">Croatia</option>
<option data-provinces="[]" value="Cuba">Cuba</option>
<option data-provinces="[]" value="Curaçao">Curaçao</option>
<option data-provinces="[]" value="Cyprus">Cyprus</option>
<option data-provinces="[]" value="Czech Republic">Czech Republic</option>
<option data-provinces="[]" value="Côte d'Ivoire">Côte d'Ivoire</option>
<option data-provinces="[]" value="Denmark">Denmark</option>
<option data-provinces="[]" value="Djibouti">Djibouti</option>
<option data-provinces="[]" value="Dominica">Dominica</option>
<option data-provinces="[]" value="Dominican Republic">Dominican Republic</option>
<option data-provinces="[]" value="Ecuador">Ecuador</option>
<option data-provinces="[]" value="Egypt">Egypt</option>
<option data-provinces="[]" value="El Salvador">El Salvador</option>
<option data-provinces="[]" value="Equatorial Guinea">Equatorial Guinea</option>
<option data-provinces="[]" value="Eritrea">Eritrea</option>
<option data-provinces="[]" value="Estonia">Estonia</option>
<option data-provinces="[]" value="Ethiopia">Ethiopia</option>
<option data-provinces="[]" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option data-provinces="[]" value="Faroe Islands">Faroe Islands</option>
<option data-provinces="[]" value="Fiji">Fiji</option>
<option data-provinces="[]" value="Finland">Finland</option>
<option data-provinces="[]" value="France">France</option>
<option data-provinces="[]" value="French Guiana">French Guiana</option>
<option data-provinces="[]" value="French Polynesia">French Polynesia</option>
<option data-provinces="[]" value="French Southern Territories">French Southern Territories</option>
<option data-provinces="[]" value="Gabon">Gabon</option>
<option data-provinces="[]" value="Gambia">Gambia</option>
<option data-provinces="[]" value="Georgia">Georgia</option>
<option data-provinces="[]" value="Germany">Germany</option>
<option data-provinces="[]" value="Ghana">Ghana</option>
<option data-provinces="[]" value="Gibraltar">Gibraltar</option>
<option data-provinces="[]" value="Greece">Greece</option>
<option data-provinces="[]" value="Greenland">Greenland</option>
<option data-provinces="[]" value="Grenada">Grenada</option>
<option data-provinces="[]" value="Guadeloupe">Guadeloupe</option>
<option data-provinces="[&quot;Alta Verapaz&quot;,&quot;Baja Verapaz&quot;,&quot;Chimaltenango&quot;,&quot;Chiquimula&quot;,&quot;El Progreso&quot;,&quot;Escuintla&quot;,&quot;Guatemala&quot;,&quot;Huehuetenango&quot;,&quot;Izabal&quot;,&quot;Jalapa&quot;,&quot;Jutiapa&quot;,&quot;Pet\u00e9n&quot;,&quot;Quetzaltenango&quot;,&quot;Quich\u00e9&quot;,&quot;Retalhuleu&quot;,&quot;Sacatep\u00e9quez&quot;,&quot;San Marcos&quot;,&quot;Santa Rosa&quot;,&quot;Solol\u00e1&quot;,&quot;Suchitep\u00e9quez&quot;,&quot;Totonicap\u00e1n&quot;,&quot;Zacapa&quot;]" value="Guatemala">Guatemala</option>
<option data-provinces="[]" value="Guernsey">Guernsey</option>
<option data-provinces="[]" value="Guinea">Guinea</option>
<option data-provinces="[]" value="Guinea Bissau">Guinea Bissau</option>
<option data-provinces="[]" value="Guyana">Guyana</option>
<option data-provinces="[]" value="Haiti">Haiti</option>
<option data-provinces="[]" value="Heard Island And Mcdonald Islands">Heard Island And Mcdonald Islands</option>
<option data-provinces="[]" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option data-provinces="[]" value="Honduras">Honduras</option>
<option data-provinces="[]" value="Hong Kong">Hong Kong</option>
<option data-provinces="[]" value="Hungary">Hungary</option>
<option data-provinces="[]" value="Iceland">Iceland</option>
<option data-provinces="[&quot;Andaman and Nicobar&quot;,&quot;Andhra Pradesh&quot;,&quot;Arunachal Pradesh&quot;,&quot;Assam&quot;,&quot;Bihar&quot;,&quot;Chandigarh&quot;,&quot;Chattisgarh&quot;,&quot;Dadra and Nagar Haveli&quot;,&quot;Daman and Diu&quot;,&quot;Delhi&quot;,&quot;Goa&quot;,&quot;Gujarat&quot;,&quot;Haryana&quot;,&quot;Himachal Pradesh&quot;,&quot;Jammu and Kashmir&quot;,&quot;Jharkhand&quot;,&quot;Karnataka&quot;,&quot;Kerala&quot;,&quot;Lakshadweep&quot;,&quot;Madhya Pradesh&quot;,&quot;Maharashtra&quot;,&quot;Manipur&quot;,&quot;Meghalaya&quot;,&quot;Mizoram&quot;,&quot;Nagaland&quot;,&quot;Orissa&quot;,&quot;Puducherry&quot;,&quot;Punjab&quot;,&quot;Rajasthan&quot;,&quot;Sikkim&quot;,&quot;Tamil Nadu&quot;,&quot;Tripura&quot;,&quot;Uttar Pradesh&quot;,&quot;Uttarakhand&quot;,&quot;West Bengal&quot;]" value="India">India</option>
<option data-provinces="[&quot;Aceh&quot;,&quot;Bali&quot;,&quot;Bangka Belitung&quot;,&quot;Banten&quot;,&quot;Bengkulu&quot;,&quot;Gorontalo&quot;,&quot;Jakarta&quot;,&quot;Jambi&quot;,&quot;Jawa Barat&quot;,&quot;Jawa Tengah&quot;,&quot;Jawa Timur&quot;,&quot;Kalimantan Barat&quot;,&quot;Kalimantan Selatan&quot;,&quot;Kalimantan Tengah&quot;,&quot;Kalimantan Timur&quot;,&quot;Kalimantan Utara&quot;,&quot;Kepulauan Riau&quot;,&quot;Lampung&quot;,&quot;Maluku&quot;,&quot;Maluku Utara&quot;,&quot;Nusa Tenggara Barat&quot;,&quot;Nusa Tenggara Timur&quot;,&quot;Papua&quot;,&quot;Papua Barat&quot;,&quot;Riau&quot;,&quot;Sulawesi Barat&quot;,&quot;Sulawesi Selatan&quot;,&quot;Sulawesi Tengah&quot;,&quot;Sulawesi Tenggara&quot;,&quot;Sulawesi Utara&quot;,&quot;Sumatra Barat&quot;,&quot;Sumatra Selatan&quot;,&quot;Sumatra Utara&quot;,&quot;Yogyakarta&quot;]" value="Indonesia">Indonesia</option>
<option data-provinces="[]" value="Iran, Islamic Republic Of">Iran, Islamic Republic Of</option>
<option data-provinces="[]" value="Iraq">Iraq</option>
<option data-provinces="[]" value="Ireland">Ireland</option>
<option data-provinces="[]" value="Isle Of Man">Isle Of Man</option>
<option data-provinces="[]" value="Israel">Israel</option>
<option data-provinces="[&quot;Agrigento&quot;,&quot;Alessandria&quot;,&quot;Ancona&quot;,&quot;Aosta&quot;,&quot;Arezzo&quot;,&quot;Ascoli Piceno&quot;,&quot;Asti&quot;,&quot;Avellino&quot;,&quot;Bari&quot;,&quot;Barletta-Andria-Trani&quot;,&quot;Belluno&quot;,&quot;Benevento&quot;,&quot;Bergamo&quot;,&quot;Biella&quot;,&quot;Bologna&quot;,&quot;Bolzano&quot;,&quot;Brescia&quot;,&quot;Brindisi&quot;,&quot;Cagliari&quot;,&quot;Caltanissetta&quot;,&quot;Campobasso&quot;,&quot;Carbonia-Iglesias&quot;,&quot;Caserta&quot;,&quot;Catania&quot;,&quot;Catanzaro&quot;,&quot;Chieti&quot;,&quot;Como&quot;,&quot;Cosenza&quot;,&quot;Cremona&quot;,&quot;Crotone&quot;,&quot;Cuneo&quot;,&quot;Enna&quot;,&quot;Fermo&quot;,&quot;Ferrara&quot;,&quot;Florence&quot;,&quot;Foggia&quot;,&quot;Forli-Cesena&quot;,&quot;Frosinone&quot;,&quot;Genoa&quot;,&quot;Gorizia&quot;,&quot;Grosseto&quot;,&quot;Imperia&quot;,&quot;Isernia&quot;,&quot;L'Aquila&quot;,&quot;La Spezia&quot;,&quot;Latina&quot;,&quot;Lecce&quot;,&quot;Lecco&quot;,&quot;Livorno&quot;,&quot;Lodi&quot;,&quot;Lucca&quot;,&quot;Macerata&quot;,&quot;Mantua&quot;,&quot;Massa and Carrara&quot;,&quot;Matera&quot;,&quot;Medio Campidano&quot;,&quot;Messina&quot;,&quot;Milan&quot;,&quot;Modena&quot;,&quot;Monza and Brianza&quot;,&quot;Naples&quot;,&quot;Novara&quot;,&quot;Nuoro&quot;,&quot;Ogliastra&quot;,&quot;Olbia-Tempio&quot;,&quot;Oristano&quot;,&quot;Padua&quot;,&quot;Palermo&quot;,&quot;Parma&quot;,&quot;Pavia&quot;,&quot;Perugia&quot;,&quot;Pesaro and Urbino&quot;,&quot;Pescara&quot;,&quot;Piacenza&quot;,&quot;Pisa&quot;,&quot;Pistoia&quot;,&quot;Pordenone&quot;,&quot;Potenza&quot;,&quot;Prato&quot;,&quot;Ragusa&quot;,&quot;Ravenna&quot;,&quot;Reggio Calabria&quot;,&quot;Reggio Emilia&quot;,&quot;Rieti&quot;,&quot;Rimini&quot;,&quot;Rome&quot;,&quot;Rovigo&quot;,&quot;Salerno&quot;,&quot;Sassari&quot;,&quot;Savona&quot;,&quot;Siena&quot;,&quot;Sondrio&quot;,&quot;Syracuse&quot;,&quot;Taranto&quot;,&quot;Teramo&quot;,&quot;Terni&quot;,&quot;Trapani&quot;,&quot;Trento&quot;,&quot;Treviso&quot;,&quot;Trieste&quot;,&quot;Turin&quot;,&quot;Udine&quot;,&quot;Varese&quot;,&quot;Venice&quot;,&quot;Verbano-Cusio-Ossola&quot;,&quot;Vercelli&quot;,&quot;Verona&quot;,&quot;Vibo Valentia&quot;,&quot;Vicenza&quot;,&quot;Viterbo&quot;]" value="Italy">Italy</option>
<option data-provinces="[]" value="Jamaica">Jamaica</option>
<option data-provinces="[]" value="Japan">Japan</option>
<option data-provinces="[]" value="Jersey">Jersey</option>
<option data-provinces="[]" value="Jordan">Jordan</option>
<option data-provinces="[]" value="Kazakhstan">Kazakhstan</option>
<option data-provinces="[]" value="Kenya">Kenya</option>
<option data-provinces="[]" value="Kiribati">Kiribati</option>
<option data-provinces="[]" value="Korea, Democratic People's Republic Of">Korea, Democratic People's Republic Of</option>
<option data-provinces="[]" value="Kosovo">Kosovo</option>
<option data-provinces="[]" value="Kuwait">Kuwait</option>
<option data-provinces="[]" value="Kyrgyzstan">Kyrgyzstan</option>
<option data-provinces="[]" value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
<option data-provinces="[]" value="Latvia">Latvia</option>
<option data-provinces="[]" value="Lebanon">Lebanon</option>
<option data-provinces="[]" value="Lesotho">Lesotho</option>
<option data-provinces="[]" value="Liberia">Liberia</option>
<option data-provinces="[]" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option data-provinces="[]" value="Liechtenstein">Liechtenstein</option>
<option data-provinces="[]" value="Lithuania">Lithuania</option>
<option data-provinces="[]" value="Luxembourg">Luxembourg</option>
<option data-provinces="[]" value="Macao">Macao</option>
<option data-provinces="[]" value="Macedonia, Republic Of">Macedonia, Republic Of</option>
<option data-provinces="[]" value="Madagascar">Madagascar</option>
<option data-provinces="[]" value="Malawi">Malawi</option>
<option data-provinces="[&quot;Johor&quot;,&quot;Kedah&quot;,&quot;Kelantan&quot;,&quot;Kuala Lumpur&quot;,&quot;Labuan&quot;,&quot;Melaka&quot;,&quot;Negeri Sembilan&quot;,&quot;Pahang&quot;,&quot;Perak&quot;,&quot;Perlis&quot;,&quot;Pulau Pinang&quot;,&quot;Putrajaya&quot;,&quot;Sabah&quot;,&quot;Sarawak&quot;,&quot;Selangor&quot;,&quot;Terengganu&quot;]" value="Malaysia">Malaysia</option>
<option data-provinces="[]" value="Maldives">Maldives</option>
<option data-provinces="[]" value="Mali">Mali</option>
<option data-provinces="[]" value="Malta">Malta</option>
<option data-provinces="[]" value="Martinique">Martinique</option>
<option data-provinces="[]" value="Mauritania">Mauritania</option>
<option data-provinces="[]" value="Mauritius">Mauritius</option>
<option data-provinces="[]" value="Mayotte">Mayotte</option>
<option data-provinces="[&quot;Aguascalientes&quot;,&quot;Baja California&quot;,&quot;Baja California Sur&quot;,&quot;Campeche&quot;,&quot;Chiapas&quot;,&quot;Chihuahua&quot;,&quot;Coahuila&quot;,&quot;Colima&quot;,&quot;Distrito Federal&quot;,&quot;Durango&quot;,&quot;Guanajuato&quot;,&quot;Guerrero&quot;,&quot;Hidalgo&quot;,&quot;Jalisco&quot;,&quot;Michoac\u00e1n&quot;,&quot;Morelos&quot;,&quot;M\u00e9xico&quot;,&quot;Nayarit&quot;,&quot;Nuevo Le\u00f3n&quot;,&quot;Oaxaca&quot;,&quot;Puebla&quot;,&quot;Quer\u00e9taro&quot;,&quot;Quintana Roo&quot;,&quot;San Luis Potos\u00ed&quot;,&quot;Sinaloa&quot;,&quot;Sonora&quot;,&quot;Tabasco&quot;,&quot;Tamaulipas&quot;,&quot;Tlaxcala&quot;,&quot;Veracruz&quot;,&quot;Yucat\u00e1n&quot;,&quot;Zacatecas&quot;]" value="Mexico">Mexico</option>
<option data-provinces="[]" value="Moldova, Republic of">Moldova, Republic of</option>
<option data-provinces="[]" value="Monaco">Monaco</option>
<option data-provinces="[]" value="Mongolia">Mongolia</option>
<option data-provinces="[]" value="Montenegro">Montenegro</option>
<option data-provinces="[]" value="Montserrat">Montserrat</option>
<option data-provinces="[]" value="Morocco">Morocco</option>
<option data-provinces="[]" value="Mozambique">Mozambique</option>
<option data-provinces="[]" value="Namibia">Namibia</option>
<option data-provinces="[]" value="Nauru">Nauru</option>
<option data-provinces="[]" value="Nepal">Nepal</option>
<option data-provinces="[]" value="Netherlands">Netherlands</option>
<option data-provinces="[]" value="Netherlands Antilles">Netherlands Antilles</option>
<option data-provinces="[]" value="New Caledonia">New Caledonia</option>
<option data-provinces="[&quot;Auckland&quot;,&quot;Bay of Plenty&quot;,&quot;Canterbury&quot;,&quot;Gisborne&quot;,&quot;Hawke's Bay&quot;,&quot;Manawatu-Wanganui&quot;,&quot;Marlborough&quot;,&quot;Nelson&quot;,&quot;Northland&quot;,&quot;Otago&quot;,&quot;Southland&quot;,&quot;Taranaki&quot;,&quot;Tasman&quot;,&quot;Waikato&quot;,&quot;Wellington&quot;,&quot;West Coast&quot;]" value="New Zealand">New Zealand</option>
<option data-provinces="[]" value="Nicaragua">Nicaragua</option>
<option data-provinces="[]" value="Niger">Niger</option>
<option data-provinces="[]" value="Nigeria">Nigeria</option>
<option data-provinces="[]" value="Niue">Niue</option>
<option data-provinces="[]" value="Norfolk Island">Norfolk Island</option>
<option data-provinces="[]" value="Norway">Norway</option>
<option data-provinces="[]" value="Oman">Oman</option>
<option data-provinces="[]" value="Pakistan">Pakistan</option>
<option data-provinces="[]" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
<option data-provinces="[]" value="Panama">Panama</option>
<option data-provinces="[]" value="Papua New Guinea">Papua New Guinea</option>
<option data-provinces="[]" value="Paraguay">Paraguay</option>
<option data-provinces="[]" value="Peru">Peru</option>
<option data-provinces="[]" value="Philippines">Philippines</option>
<option data-provinces="[]" value="Pitcairn">Pitcairn</option>
<option data-provinces="[]" value="Poland">Poland</option>
<option data-provinces="[&quot;Aveiro&quot;,&quot;A\u00e7ores&quot;,&quot;Beja&quot;,&quot;Braga&quot;,&quot;Bragan\u00e7a&quot;,&quot;Castelo Branco&quot;,&quot;Coimbra&quot;,&quot;Faro&quot;,&quot;Guarda&quot;,&quot;Leiria&quot;,&quot;Lisboa&quot;,&quot;Madeira&quot;,&quot;Portalegre&quot;,&quot;Porto&quot;,&quot;Santar\u00e9m&quot;,&quot;Set\u00fabal&quot;,&quot;Viana do Castelo&quot;,&quot;Vila Real&quot;,&quot;Viseu&quot;,&quot;\u00c9vora&quot;]" value="Portugal">Portugal</option>
<option data-provinces="[]" value="Qatar">Qatar</option>
<option data-provinces="[]" value="Republic of Cameroon">Republic of Cameroon</option>
<option data-provinces="[]" value="Reunion">Reunion</option>
<option data-provinces="[]" value="Romania">Romania</option>
<option data-provinces="[&quot;Altai Krai&quot;,&quot;Altai Republic&quot;,&quot;Amur Oblast&quot;,&quot;Arkhangelsk Oblast&quot;,&quot;Astrakhan Oblast&quot;,&quot;Belgorod Oblast&quot;,&quot;Bryansk Oblast&quot;,&quot;Chechen Republic&quot;,&quot;Chelyabinsk Oblast&quot;,&quot;Chukotka Autonomous Okrug&quot;,&quot;Chuvash Republic&quot;,&quot;Irkutsk Oblast&quot;,&quot;Ivanovo Oblast&quot;,&quot;Jewish Autonomous Oblast&quot;,&quot;Kabardino-Balkarian Republic&quot;,&quot;Kaliningrad Oblast&quot;,&quot;Kaluga Oblast&quot;,&quot;Kamchatka Krai&quot;,&quot;Karachay\u2013Cherkess Republic&quot;,&quot;Kemerovo Oblast&quot;,&quot;Khabarovsk Krai&quot;,&quot;Khanty-Mansi Autonomous Okrug&quot;,&quot;Kirov Oblast&quot;,&quot;Komi Republic&quot;,&quot;Kostroma Oblast&quot;,&quot;Krasnodar Krai&quot;,&quot;Krasnoyarsk Krai&quot;,&quot;Kurgan Oblast&quot;,&quot;Kursk Oblast&quot;,&quot;Leningrad Oblast&quot;,&quot;Lipetsk Oblast&quot;,&quot;Magadan Oblast&quot;,&quot;Mari El Republic&quot;,&quot;Moscow&quot;,&quot;Moscow Oblast&quot;,&quot;Murmansk Oblast&quot;,&quot;Nizhny Novgorod Oblast&quot;,&quot;Novgorod Oblast&quot;,&quot;Novosibirsk Oblast&quot;,&quot;Omsk Oblast&quot;,&quot;Orenburg Oblast&quot;,&quot;Oryol Oblast&quot;,&quot;Penza Oblast&quot;,&quot;Perm Krai&quot;,&quot;Primorsky Krai&quot;,&quot;Pskov Oblast&quot;,&quot;Republic of Adygeya&quot;,&quot;Republic of Bashkortostan&quot;,&quot;Republic of Buryatia&quot;,&quot;Republic of Dagestan&quot;,&quot;Republic of Ingushetia&quot;,&quot;Republic of Kalmykia&quot;,&quot;Republic of Karelia&quot;,&quot;Republic of Khakassia&quot;,&quot;Republic of Mordovia&quot;,&quot;Republic of North Ossetia\u2013Alania&quot;,&quot;Republic of Tatarstan&quot;,&quot;Rostov Oblast&quot;,&quot;Ryazan Oblast&quot;,&quot;Saint Petersburg&quot;,&quot;Sakha Republic (Yakutia)&quot;,&quot;Sakhalin Oblast&quot;,&quot;Samara Oblast&quot;,&quot;Saratov Oblast&quot;,&quot;Smolensk Oblast&quot;,&quot;Stavropol Krai&quot;,&quot;Sverdlovsk Oblast&quot;,&quot;Tambov Oblast&quot;,&quot;Tomsk Oblast&quot;,&quot;Tula Oblast&quot;,&quot;Tver Oblast&quot;,&quot;Tyumen Oblast&quot;,&quot;Tyva Republic&quot;,&quot;Udmurtia&quot;,&quot;Ulyanovsk Oblast&quot;,&quot;Vladimir Oblast&quot;,&quot;Volgograd Oblast&quot;,&quot;Vologda Oblast&quot;,&quot;Voronezh Oblast&quot;,&quot;Yamalo-Nenets Autonomous Okrug&quot;,&quot;Yaroslavl Oblast&quot;]" value="Russia">Russia</option>
<option data-provinces="[]" value="Rwanda">Rwanda</option>
<option data-provinces="[]" value="Saint Barthélemy">Saint Barthélemy</option>
<option data-provinces="[]" value="Saint Helena">Saint Helena</option>
<option data-provinces="[]" value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
<option data-provinces="[]" value="Saint Lucia">Saint Lucia</option>
<option data-provinces="[]" value="Saint Martin">Saint Martin</option>
<option data-provinces="[]" value="Saint Pierre And Miquelon">Saint Pierre And Miquelon</option>
<option data-provinces="[]" value="Samoa">Samoa</option>
<option data-provinces="[]" value="San Marino">San Marino</option>
<option data-provinces="[]" value="Sao Tome And Principe">Sao Tome And Principe</option>
<option data-provinces="[]" value="Saudi Arabia">Saudi Arabia</option>
<option data-provinces="[]" value="Senegal">Senegal</option>
<option data-provinces="[]" value="Serbia">Serbia</option>
<option data-provinces="[]" value="Seychelles">Seychelles</option>
<option data-provinces="[]" value="Sierra Leone">Sierra Leone</option>
<option data-provinces="[]" value="Singapore">Singapore</option>
<option data-provinces="[]" value="Slovakia">Slovakia</option>
<option data-provinces="[]" value="Slovenia">Slovenia</option>
<option data-provinces="[]" value="Solomon Islands">Solomon Islands</option>
<option data-provinces="[]" value="Somalia">Somalia</option>
<option data-provinces="[&quot;Eastern Cape&quot;,&quot;Free State&quot;,&quot;Gauteng&quot;,&quot;KwaZulu-Natal&quot;,&quot;Limpopo&quot;,&quot;Mpumalanga&quot;,&quot;North West&quot;,&quot;Northern Cape&quot;,&quot;Western Cape&quot;]" value="South Africa">South Africa</option>
<option data-provinces="[]" value="South Georgia And The South Sandwich Islands">South Georgia And The South Sandwich Islands</option>
<option data-provinces="[]" value="South Korea">South Korea</option>
<option data-provinces="[&quot;A Coru\u00f1a&quot;,&quot;Albacete&quot;,&quot;Alicante&quot;,&quot;Almer\u00eda&quot;,&quot;Asturias&quot;,&quot;Badajoz&quot;,&quot;Baleares&quot;,&quot;Barcelona&quot;,&quot;Burgos&quot;,&quot;Cantabria&quot;,&quot;Castell\u00f3n&quot;,&quot;Ceuta&quot;,&quot;Ciudad Real&quot;,&quot;Cuenca&quot;,&quot;C\u00e1ceres&quot;,&quot;C\u00e1diz&quot;,&quot;C\u00f3rdoba&quot;,&quot;Girona&quot;,&quot;Granada&quot;,&quot;Guadalajara&quot;,&quot;Guip\u00fazcoa&quot;,&quot;Huelva&quot;,&quot;Huesca&quot;,&quot;Ja\u00e9n&quot;,&quot;La Rioja&quot;,&quot;Las Palmas&quot;,&quot;Le\u00f3n&quot;,&quot;Lleida&quot;,&quot;Lugo&quot;,&quot;Madrid&quot;,&quot;Melilla&quot;,&quot;Murcia&quot;,&quot;M\u00e1laga&quot;,&quot;Navarra&quot;,&quot;Ourense&quot;,&quot;Palencia&quot;,&quot;Pontevedra&quot;,&quot;Salamanca&quot;,&quot;Santa Cruz de Tenerife&quot;,&quot;Segovia&quot;,&quot;Sevilla&quot;,&quot;Soria&quot;,&quot;Tarragona&quot;,&quot;Teruel&quot;,&quot;Toledo&quot;,&quot;Valencia&quot;,&quot;Valladolid&quot;,&quot;Vizcaya&quot;,&quot;Zamora&quot;,&quot;Zaragoza&quot;,&quot;\u00c1lava&quot;,&quot;\u00c1vila&quot;]" value="Spain">Spain</option>
<option data-provinces="[]" value="Sri Lanka">Sri Lanka</option>
<option data-provinces="[]" value="St. Vincent">St. Vincent</option>
<option data-provinces="[]" value="Sudan">Sudan</option>
<option data-provinces="[]" value="Suriname">Suriname</option>
<option data-provinces="[]" value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option>
<option data-provinces="[]" value="Swaziland">Swaziland</option>
<option data-provinces="[]" value="Sweden">Sweden</option>
<option data-provinces="[]" value="Switzerland">Switzerland</option>
<option data-provinces="[]" value="Syria">Syria</option>
<option data-provinces="[]" value="Taiwan">Taiwan</option>
<option data-provinces="[]" value="Tajikistan">Tajikistan</option>
<option data-provinces="[]" value="Tanzania, United Republic Of">Tanzania, United Republic Of</option>
<option data-provinces="[]" value="Thailand">Thailand</option>
<option data-provinces="[]" value="Timor Leste">Timor Leste</option>
<option data-provinces="[]" value="Togo">Togo</option>
<option data-provinces="[]" value="Tokelau">Tokelau</option>
<option data-provinces="[]" value="Tonga">Tonga</option>
<option data-provinces="[]" value="Trinidad and Tobago">Trinidad and Tobago</option>
<option data-provinces="[]" value="Tunisia">Tunisia</option>
<option data-provinces="[]" value="Turkey">Turkey</option>
<option data-provinces="[]" value="Turkmenistan">Turkmenistan</option>
<option data-provinces="[]" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option data-provinces="[]" value="Tuvalu">Tuvalu</option>
<option data-provinces="[]" value="Uganda">Uganda</option>
<option data-provinces="[]" value="Ukraine">Ukraine</option>
<option data-provinces="[&quot;Abu Dhabi&quot;,&quot;Ajman&quot;,&quot;Dubai&quot;,&quot;Fujairah&quot;,&quot;Ras al-Khaimah&quot;,&quot;Sharjah&quot;,&quot;Umm al-Quwain&quot;]" value="United Arab Emirates">United Arab Emirates</option>
<option data-provinces="[]" value="United Kingdom">United Kingdom</option>
<option data-provinces="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;American Samoa&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;Armed Forces Americas&quot;,&quot;Armed Forces Europe&quot;,&quot;Armed Forces Pacific&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Federated States of Micronesia&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Guam&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Marshall Islands&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Carolina&quot;,&quot;North Dakota&quot;,&quot;Northern Mariana Islands&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Palau&quot;,&quot;Pennsylvania&quot;,&quot;Puerto Rico&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virgin Islands&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;Washington DC&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" value="United States">United States</option>
<option data-provinces="[]" value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option data-provinces="[]" value="Uruguay">Uruguay</option>
<option data-provinces="[]" value="Uzbekistan">Uzbekistan</option>
<option data-provinces="[]" value="Vanuatu">Vanuatu</option>
<option data-provinces="[]" value="Venezuela">Venezuela</option>
<option data-provinces="[]" value="Vietnam">Vietnam</option>
<option data-provinces="[]" value="Virgin Islands, British">Virgin Islands, British</option>
<option data-provinces="[]" value="Wallis And Futuna">Wallis And Futuna</option>
<option data-provinces="[]" value="Western Sahara">Western Sahara</option>
<option data-provinces="[]" value="Yemen">Yemen</option>
<option data-provinces="[]" value="Zambia">Zambia</option>
<option data-provinces="[]" value="Zimbabwe">Zimbabwe</option></select>
      </div>

      <div style="" id="address_province_container" class="four columns">
        <label id="address_province_label" for="address_province">State</label>
        <select data-default="" name="address[province]" id="address_province"><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="American Samoa">American Samoa</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="Armed Forces Americas">Armed Forces Americas</option><option value="Armed Forces Europe">Armed Forces Europe</option><option value="Armed Forces Pacific">Armed Forces Pacific</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Guam">Guam</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Marshall Islands">Marshall Islands</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Palau">Palau</option><option value="Pennsylvania">Pennsylvania</option><option value="Puerto Rico">Puerto Rico</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virgin Islands">Virgin Islands</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="Washington DC">Washington DC</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select>
      </div> 
    
      <div id="address_zip_container" class="three columns">
        <label for="address_zip">Zip/Postal Code</label>
        <input type="text" name="address[zip]" class="styled-input" id="address_zip">
      </div>
      
      <div id="get-rates-container" class="four columns offset-by-one omega">
        <label for="get-rates-submit">&nbsp;</label>
        <input type="button" value="Calculate shipping rates" class="get-rates styled-submit" id="get-rates-submit">
      </div>
    
  </div> 
  -->
  <!-- .shipping-calculator-form-wrapper -->

  <div id="wrapper-response"></div>
  
</div>
      
    </div> <!-- end container -->
	<form name="deleteForm" id="deleteForm" method="post" action="">
		<input type="hidden" name="deleteId" id="deleteId"/>
	</form>
	<script type="text/javascript">
	function deleteProduct(delKey){
			if(!confirm('Do you want to remove product "' + cartItemMap[delKey].productName + '" from cart.\nQuantity: ' + cartItemMap[delKey].productQuantity))
				return false;
			//document.getElementById('deleteId').value = delKey;
			$('#deleteId').val(delKey);
			$('#deleteForm').submit();
			
	}
	function updateQuantity(val, key){
		$.ajax({
				type: "GET",
				url: "<?php echo $hostName;?>updatecart.php?k=" + key + "&v=" + val,
				success:function(result){
				document.location.href= "<?php echo $hostName.'cart.php'; ?>";
			 }});
	}
	</script>

   <?php include('footer.php');?> <!-- end footer -->

    
      <script type="text/javascript">
        (function() {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'script/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
      </script>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async=true;js.src="script/twitter/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    

  </body>

<!-- Mirrored from tokyo-teas.myshopify.com/cart by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 14 Oct 2013 15:15:43 GMT -->
</html>