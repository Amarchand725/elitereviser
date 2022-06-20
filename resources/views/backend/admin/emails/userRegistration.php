<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Callix Sale System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
	   span{color: #fff;
			margin-left: 15px;
			/* font-size: -webkit-xxx-large; */
			font-weight: bold;
			font-family: monospace;
	   }
	   .a{color: #fff;
			margin-right: 20px;
			float:right;
			font-weight: bold;
			font-family: monospace;
	   }
	   p{
		  margin-bottom: -10px;
		  /* Margin-top: 0;
		  background: #5b5b5c; 
		  color: #565656;font-family: Georgia,serif;
		  font-size: 16px;
		  line-height: 25px;
		  Margin-bottom: 10px;
		  opacity:0.9 */
		   
	   }
	   .pfoot{
		  
		    color: #fff;
			font-size: 11px;
			line-height: 50px;
			font-weight: bold;
			margin-left: 30px;
			font-family: monospace;
           
		}
	   .ppfoot{
		   background:#5b5b5c;
		   Margin-bottom: 15px;
		   border-radius: 0px 0px 10px 10px;
		}
		.imgdiv{
			font-size: 26px;
			font-weight: 700;
			letter-spacing: -0.02em;
			line-height: 32px;
			color: #41637e;
			font-family: sans-serif;
			text-align: center;
		}
		.img{
			border:0;
			-ms-interpolation-mode: bicubic;
			display: block;
			Margin-left: auto;
			Margin-right: auto;
			max-width: 352px;
			background:#5b5b5c; 
			Margin-bottom:10px;
			height:108;
			opacity: 0.9;
		    border-radius: 10px 10px 0px 0px;
		}
		.bgimage{
			width: 800px;
			margin: 0 auto;
			/* background-image: url("http://static1.squarespace.com/static/5852f18a20099e30cd2c01dc/5853002bebbd1aa626056c84/5a7272338165f596c6d659d8/1517450213457/2%5B1%5D.jpg?format=1500w"); */
			/* background-color: #cccccc;	 */
			padding: 30px;
		}
		.contant{
			/* width: 352px; */
			margin: 0 auto;

		}
		.signature{
			margin-bottom:-15px !important;
		}
	   </style>
</head>
<body>
	<div class="bgimage">
		<div class="contant">
				<p>Dear <?php echo $name;?>,</p>
				</br>
				<p>Your login credentials are given below.</p>
				</br>
				<p><b>Email:</b> <?php echo $email;?></p>
				<p><b>Password:</b> <?php echo $password;?></p>
				<p><b>Link:</b> <a href="https://callix.ae/sales-crm/">https://callix.ae/sales-crm/</a></p>
				</br></br>
				<p>Best Regards,</p>
				<p><?php echo $sender_name;?></p>
				<p style="margin-bottom:-15px !important"><img src="<?= base_url('assets/email-logo.svg');?>" width="150px" height="80px" /></p>
				<p class=" signature"><?php echo $sender_email;?></p>
				<p class=" signature">407.IT Plaza-Dubai Silicon Oasis</p>
				<p class=" signature">DUBAI-UAE</p>
				<p class=" signature">Callix Call Centers Services.LLC</p>
				<p class=" signature"><a href="https://www.callix.ae/">www.callix.ae</a></p>
			</div>
	</div>
</body>
</html>