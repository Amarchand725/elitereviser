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
				<p>Dear <?php echo $contact_name;?>,</p>
				<br>
				<p>It was great speaking with you.</p>
				<br>
				<p>
				Callix is a 24/7 call answering solution that uses a human-centric approach to customer engagement backed by state of the art AI technology. Our multilingual agents answer calls on behalf of your business speaking over 10 languages, including English, French, Russian, Arabic, Malayalam, Hindi, Urdu, Tamil, and Tagalog.</p><br>
				<p>Here are some of the features that make us the contact center of choice for leading SMEs in the region:</p>
				</br>
				<p> &nbsp; &nbsp; &nbsp; • 24/7 unlimited inbound calls</p>
				<p> &nbsp; &nbsp; &nbsp; •	Dedicated key account manager</p>
				<p> &nbsp; &nbsp; &nbsp; •	System integration</p>
				<p> &nbsp; &nbsp; &nbsp; •	Instant mobile notifications (Android and IOS app)</p>
				<p> &nbsp; &nbsp; &nbsp; •	Instant email notifications</p>
				<p> &nbsp; &nbsp; &nbsp; •	Unlimited FAQs and answers</p>
				<p> &nbsp; &nbsp; &nbsp; •	Unique UAE landline number of your choice</p>
				<p> &nbsp; &nbsp; &nbsp; •	Call recording</p>
				<p> &nbsp; &nbsp; &nbsp; •	Customizable analytics dashboard</p>
				<p> &nbsp; &nbsp; &nbsp; •	Outbound call minutes on-demand (charged separately at 1AED/minute)</p>
				<br><br>
				<p>Our packages are valued at <b>999 AED</b>without system integration and <b>2,499 AED/month</b> with system integration (excluding VAT). With Callix, it takes under 5 minutes to set up your own contact center.</p>
				<br>
				<p>Please find attached a pamphlet for more information.</p>
				<p><span style="background: #FFEB3B;color: black; margin-left: 0px;">Kindly let me know the best time for us to meet to discuss this cost effective and unique solution.</span></p>
				<br>
				
				<!--<p>Click on the tab below to register your interest in meeting with me to discuss Callix solutions in detail.</p>-->
				<br>
				<p>Best Regards,</p>
				<p><?php echo $sender_name;?></p>
				<p style="margin-bottom:-15px !important"><img src="<?= base_url('assets/email-logo.svg'); ?>" width="150px" height="80px" /></p>
				<p class=" signature"><?php echo $sender_email;?></p>
				<?php if(!empty($sender_contact_no)){ ?>
				<p class=" signature">Contact Number: <?= $sender_contact_no; ?></p> <?php }?>
				<p class=" signature">407.IT Plaza-Dubai Silicon Oasis</p>
				<p class=" signature">DUBAI-UAE</p>
				<p class=" signature">Callix Call Centers Services.LLC <a href="https://www.callix.net/">www.callix.net</a></p>
			</div>
	</div>
</body>
</html>