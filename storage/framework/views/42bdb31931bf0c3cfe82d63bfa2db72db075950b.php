<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Coupon</title>
</head>
	<style>
		*{margin: 0; padding: 0;}
		@import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
	</style>
<body>
<table width="100%" border="0" style="background:#282828;font-family: poppins;color: #555; ">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>
			<table width="100%" border="0" style="background: #fff1f2;color: #555; font-family: 'Poppins', sans-serif; max-width: 700px; margin: 0 auto;">
			  <tbody>
				 
				<tr>
				  <td colspan="4"><table width="100%" border="0">
				    <tbody>
				      <tr>
				        <td align="center" style="padding: 10px 20px; padding-top: 15px;"><img src="<?php echo e(asset('admin_assets/images/mail/motorcycle-logo.png')); ?>" /></td>
			          </tr>
			        </tbody>
			      </table></td>
			    </tr>
			 
				<tr>
				   <td width="50">&nbsp;</td>
				   <td colspan="2" style="text-align: center;">
						<div style="background: #fff;font-family: poppins;  line-height: 35px; color: #555; font-size: 14px;font-family:arial;border: 2px solid #fde4e4;">
				  
							   <img src="<?php echo e(asset('admin_assets/images/mail/offers.png')); ?>" />
							    <div style="padding: 20px;">
								  	<br>

									<p style="font-family: poppins; font-size: 40px; "><b>Save <span style="color: #FF2D37;">

									<?php if($coupon['discount_type'] == ''): ?>
										<?php echo e(siteCurrentcy()); ?>

									<?php endif; ?>

									<?php echo e($coupon['cart_discount']); ?><?php echo e($coupon['discount_type']); ?> 

									Off</span></b></p>  
									  <p style="font-family: poppins; font-size:16px; line-height: 24px; margin: 15px 0;"> 

									  <?php echo e($coupon['description']); ?>


									</p>

									<p style="font-family: poppins; font-size:20px;">Coupon Code: <span style="color: #FF2D37; font-weight: 800;">

									<?php echo e($coupon['coupon_code']); ?>


									</span> </p> 

									<p style="font-family: poppins; font-size:14px; margin-bottom: 15px;"> 
										Start Date <span style=" font-weight: 800;">

										<?php echo e($coupon['coupon_start_date']); ?>


									</span> 
										Expiry Date <span style=" font-weight: 800;">

										<?php echo e($coupon['coupon_expiry_date']); ?>


									</span>  

									</p>

										<p style="font-family: poppins; font-size:14px; margin-bottom: 15px;"> 
										min. purchase  <span style=" font-weight: 800;">

										<?php echo e(siteCurrentcy()); ?><?php echo e($coupon['minimum_purchase_limit']); ?>


										</span> 
									 
										 </p> 
									<br>
									<b style="font-family: poppins; ">TEAM SK DISTRIBUTORS</b>
									<p style="font-family: poppins; ">Thank You</p> <br>
				                </div>
				  
				        </div>
					</td>
				    <td width="50">&nbsp;</td>
				</tr>
				<tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="4" align="center"><img src="<?php echo e(asset('admin_assets/images/mail/auto_with_bike.png')); ?>" /></td>
			    </tr>
				
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
				  
				    <td colspan="4" align="center">
					
						<h1 style=" text-align: center; font-size: 22px; margin-top: 18px; font-family: poppins;">INDIA'S TOP AUTOPARTS EXPORTERS</h1>
	   					<p style=" text-align: center; font-size: 14px; margin-top: 10px; margin-bottom: 15px; font-family: poppins;">We provide a one stop shop solution for all your <br> replacement parts and accessories needs. </p>
					  
					  
					 	<p style="margin-bottom:5px;"><b>Folow us:</b> </p> 
					
					   	<p>
					    <a href="https://www.facebook.com/sk.autospares1967" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/facebook.png')); ?>" alt=""></a>
	    				<a href="https://www.instagram.com/sk.autospares1967/?hl=en" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/instagram.png')); ?>" alt=""></a>
	    				<a href="https://www.linkedin.com/company/sk-autospares/" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/linkd-in.png')); ?>" alt=""></a></p>
					  
					    <p style="margin-bottom: 18px; font-size: 14px; line-height: 26px; color: #555;font-family: poppins;">
			 				Email Id: Info@skexportsdelhi.com <br>				
	    					Contact us: +91-9999779791, +91-9953472873 <br>
	    					Address: SK Exports 1095/13 Naiwala Road, Karol Bagh, New Delhi- 110005</p>
					</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
			  </tbody>
			</table>
		</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/admin/email/send_coupon.blade.php ENDPATH**/ ?>