<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Order Detail</title>
   </head>
   <style>
      *{margin: 0; padding: 0;}
      @import  url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
   </style>
   <body>
      <table width="100%" border="0" style="background:#282828;font-family: verdana;color: #878787; ">
         <tbody>
            <tr>
               <td>&nbsp;</td>
               <td>
                  <table width="100%" border="0" style="background: #fff1f2;color: #878787;font-family: verdana; max-width: 700px; margin: 0 auto;">
                     <tbody>
                        <tr>
                           <td colspan="4">
                              <table width="100%" border="0">
                                 <tbody>
                                    <tr>
                                       <td align="center" style="padding: 10px 20px; padding-top: 15px;"><img src="<?php echo e(asset('admin_assets/images/mail/motorcycle-logo.png')); ?>" /></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td width="50">&nbsp;</td>
                           <td colspan="2">
                              <div style="background: #fff;font-family: verdana;  line-height: 35px; color: #878787; font-size: 14px;font-family: verdana;border: 2px solid #fde4e4;">
                                 <img src="<?php echo e(asset('admin_assets/images/mail/order-details.png')); ?>" />
                                 <div style="padding: 20px; text-align: center; ">
                                    <h3 style="font-size: 24px; color: #FF2D37;margin-bottom: 15px; ">Order Details</h3>
                                    <p style="font-family: verdana; "><b>Hello<span style="color: #FF2D37;"> Admin</span> , </b></p>
                                    <p style="font-family: verdana; line-height: 25px; margin-top: 10px; ">Order has been placed successfully. it's details are given below.</p>
                                 </div>
                                 <div style="padding: 20px; padding-bottom: 0px;">
                                    <table width="100%" border="0" style="padding: 20px; padding-bottom: 0px; line-height: 25px; color: #555;font-family: verdana; background: #FFF1F2;border-top: 2px solid rgba(245,0,0,1); ">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <h3 style="font-weight: bold; color: #FF2D37;">ORDER DETAILS</h3>
                                                <p><b>Order ID:</b> <?php echo e($order['order_custom_id']); ?> </p>
                                                <p><b>Order Date: </b><?php echo e(date('j F, Y h:i:s A',strtotime($order['created_at']))); ?></p>
                                                <p><b>Payment Method:</b><?php echo e($order['payment_method']); ?></p>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div style="padding: 20px;  padding-top: 0;">
                                    <table width="100%" border="0" style="padding: 20px; padding-top: 10px; line-height: 25px; color: #555;font-family: verdana; background: #FFF1F2;">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <h3 style="font-weight: bold; color: #FF2D37;">BILLING DETAILS</h3>
                                                <p><b>Name:</b> <?php echo e($order['b_fname']); ?>&nbsp;<?php echo e($order['b_lname']); ?> </p>
                                                <p><b>Country: </b><?php echo e($order['b_country']); ?></p>
                                                <p><b>State:</b><?php echo e($order['b_state']); ?></p>
                                                <p><b>Address:</b><?php echo e($order['b_address']); ?></p>
                                                <p><b>Pin Code:</b><?php echo e($order['b_pincode']); ?></p>
                                                <p><b>Phone:</b><?php echo e($order['b_phone']); ?></p>
                                                <h3 style="font-weight: bold; color: #FF2D37; margin-top: 15px;">SHIPPING DETAILS</h3>
                                                <p><b>Name:</b> <?php echo e($order['s_fname']); ?>&nbsp;<?php echo e($order['s_lname']); ?> </p>
                                                <p><b>Country: </b><?php echo e($order['s_country']); ?></p>
                                                <p><b>State:</b><?php echo e($order['s_state']); ?></p>
                                                <p><b>Address:</b><?php echo e($order['s_address']); ?></p>
                                                <p><b>Pin Code:</b><?php echo e($order['s_pincode']); ?></p>
                                                <p><b>Phone:</b><?php echo e($order['s_phone']); ?></p>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div style="padding: 20px; padding-top: 0;">
                                    <h2 style="font-size: 24px;color: #000;margin-bottom: 0px;font-weight: bold;margin-bottom: 10px;">Order Summary</h2>
                                    <div style="outline: none;border: 2px solid rgba(245,0,0,1);font-size: 14px;padding:10px 20px;">
                                       <div style="color: #878787;border-radius: 0.1em;overflow: hidden;">
                                          <table width="100%" border="0">
                                             <tbody>
                                                <tr>
                                                   <th style="border-bottom: 1px solid #ddd;" align="left" valign="top">Product</th>
                                                   <th style="border-bottom: 1px solid #ddd;" align="right" valign="top">Subtotal</th>
                                                </tr>

                                             <?php
                                             for($i=0; count($orderProduct) > $i; $i++)
                                             {
                                             ?>

                                                <tr>
                                                   <td style="border-bottom: 1px solid #ddd;" align="left" valign="top"><?php echo e($orderProduct[$i]['name']); ?>&nbsp; × &nbsp;<?php echo e($orderProduct[$i]['quantity']); ?> </td>
                                                   <td style="border-bottom: 1px solid #ddd;" align="right" valign="top"> <?php echo e(siteCurrentcy().$orderProduct[$i]['price'] * $orderProduct[$i]['quantity']); ?> </td>
                                                </tr>

                                             <?php
                                             }
                                             ?>


                                                <tr>
                                                   <td style="border-bottom: 1px solid #ddd;" align="left" valign="top">Subtotal</td>
                                                   <td style="border-bottom: 1px solid #ddd;" align="right" valign="top"><?php echo e(siteCurrentcy().$order['order_subtotal']); ?></td>
                                                </tr>

                                             <?php if($order['discount_amount'] > 0): ?>

                                                <tr>
                                                   <td style="border-bottom: 1px solid #ddd;" align="left" valign="top">Discount Amount</td>
                                                   <td style="border-bottom: 1px solid #ddd;" align="right" valign="top"> <?php echo e(siteCurrentcy().$order['discount_amount']); ?></td>
                                                </tr>

                                             <?php endif; ?>
                                                
                                                <tr>
                                                   <td align="left" valign="top">Total</td>
                                                   <td align="right" valign="top"><strong><?php echo e(siteCurrentcy().$order['order_total']); ?></strong></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <p style="margin-bottom: 10px; line-height: 25px; margin-top: 25px;">&nbsp;</p>
                                    <br>
                                    <b style="font-family: verdana; ">TEAM SK DISTRIBUTORS</b>
                                    <p style="font-family: verdana; ">Thank You</p>
                                 </div>
                              </div>
                           </td>
                           <td width="50">&nbsp;</td>
                        </tr>
                        <tr>
                           <td>&nbsp;</td>
                           <td colspan="2">&nbsp;</td>
                           <td>&nbsp;</td>
                        </tr>
                        <tr>
                           <td colspan="4" align="center"><img src="<?php echo e(asset('admin_assets/images/mail/auto_with_bike.png')); ?>" /></td>
                        </tr>
                        <tr>
                           <td style="color: #555;" colspan="4" align="center">
                              <h1 style=" text-align: center; font-size: 22px; margin-top: 18px; font-family: verdana;">INDIA'S TOP AUTOPARTS EXPORTERS</h1>
                              <p style=" text-align: center; font-size: 14px; margin-top: 10px; margin-bottom: 15px; font-family: verdana;">We provide a one stop shop solution for all your <br> replacement parts and accessories needs. </p>
                              <p style="margin-bottom:5px;"><b>Folow us:</b> </p>
                              <p>
                                 <a href="https://www.facebook.com/sk.autospares1967" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/facebook.png')); ?>" alt=""></a>
                                 <a href="https://www.instagram.com/sk.autospares1967/?hl=en" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/instagram.png')); ?>" alt=""></a>
                                 <a href="https://www.linkedin.com/company/sk-autospares/" target="_blank"><img style="height: 25px; width: 25px;" src="<?php echo e(asset('admin_assets/images/mail/linkd-in.png')); ?>" alt=""></a>
                              </p>
                              <p style="margin-bottom: 18px; font-size: 14px; line-height: 26px; color: #878787;font-family: verdana;">
                                 Email Id: Info@skexportsdelhi.com <br>				
                                 Contact us: +91-9999779791, +91-9953472873 <br>
                                 Address: SK Exports 1095/13 Naiwala Road, Karol Bagh, New Delhi- 110005
                              </p>
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
</html><?php /**PATH C:\xampp\htdocs\skmotor\resources\views/email/order_detail_for_admin.blade.php ENDPATH**/ ?>