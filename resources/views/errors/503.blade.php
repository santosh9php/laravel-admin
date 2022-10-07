<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        *{ margin: 0px; padding: 0px; }
        html, body{ height:100%; width:100%; font-family: 'Poppins', sans-serif;

background: rgba(255,224,226,1);
background: -moz-radial-gradient(center, ellipse cover, rgba(255,224,226,1) 0%, rgba(255,174,179,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,224,226,1)), color-stop(100%, rgba(255,174,179,1)));
background: -webkit-radial-gradient(center, ellipse cover, rgba(255,224,226,1) 0%, rgba(255,174,179,1) 100%);
background: -o-radial-gradient(center, ellipse cover, rgba(255,224,226,1) 0%, rgba(255,174,179,1) 100%);
background: -ms-radial-gradient(center, ellipse cover, rgba(255,224,226,1) 0%, rgba(255,174,179,1) 100%);
background: radial-gradient(ellipse at center, rgba(255,224,226,1) 0%, rgba(255,174,179,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffe0e2', endColorstr='#ffaeb3', GradientType=1 );


        }

        .top_padding{padding-top:15%;}
         
    </style>
</head>
<body>
    <div class="top_padding">

        <center>
        <img src="<?php echo e(asset('frontend_assets/image/503.png')); ?>" alt="imgpayment" class="img-1 img-responsive">
        <h1 style="color:red;    text-transform: capitalize;">We are currently down for maintenance</h1>
        <div class="text-center subtitle">We will be up in couple of hours. Thanks for patience</div>
        </center>
 
    
      
        
        <!-- You can add your maintenance image here -->
        <!-- <div class="text-center">
            <img src="{{ asset('images/maintenance.png') }}" alt="Maintenance Image" class="maintenance-image">
        </div> -->
    </div>
</body>
</html>
