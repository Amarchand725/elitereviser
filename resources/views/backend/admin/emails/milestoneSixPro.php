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
		  margin-bottom: -5px;
		  left: 10px;
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
			margin-bottom:-10px !important;
		}
		.InnerDiv{
			margin-left: 30px;
		}
		.InnerDiv1{
			margin-left: 45px;
		}
	   </style>
</head>
<body>
	<div class="bgimage">
		<div class="contant">
				<p>Dear <?php echo $contact_name;?>,</p>
				</br>
				<p>Thank you for your interest in Callix.</p>
				</br>
				<p>Following our recent discussion on <?php echo $discussion_date;?> with regards to Callix call answering services, I am happy to offer you our <b>Callix Pro Package </b> which has the following 
benefits:</p>
				<div class="InnerDiv"><p><b>•	Call answering services for unlimited inbound calls 24/7- </b>  This means that our team of agents will be answering your calls 24/7 on your behalf, responding to every query according to your FAQs and responses.</p>
				<p><b>•	Unlimited number of FAQs (provided by you) - </b>Smart FAQs will enable our agents to interact with your clients effectively and efficiently.</p>
				<p>•<b> A unique landline number -</b> You have the option of having calls forwarded to Callix from your current number. You can do this by requesting call forwarding services from your communications service provider (Etisalat or Du). The other option is to advertise the Callix number and have your customers call us directly. <b>This also means you will have a centralized number for all your incoming calls. </b></p>
				<p><b>•	Instant SMS and email notifications - </b>Every time we interact with your clients, you will receive a notification via SMS and email.</p>
				<p><b>•	Call forwarding -</b>If there are certain calls you would like us to forward to you (those that require your expertise) kindly let us know. Please note that all calls forwarded to UAE landline numbers will bear no extra costs. However, standard carrier charges apply for the calls forwarded to mobile numbers.</p>
				<p><b>•	Call recording - </b>All the calls are voice recorded and can be accessed through your dashboard. These conversations are also available in English text, in order for you to understand the conversation, regardless of which language was spoken during the exchange.</p>
				<p><b>•	Multilingual agents - </b> Your calls will be answered by multilingual agents who speak more than 10 languages including <b> English, French, Russian, Arabic, Malayalam, Hindi, Urdu, Tamil, and Tagalog.</b></p>
				<p>• You can <b>customize the greeting and ending </b> of every call.</p>
				<p>• We also offer <b>outbound calling services </b> which you can use for the following purposes:</p>
				</div>
				<div class="InnerDiv1"><p> 1.	To notify your staff in case of emergencies. (Kindly define what constitutes as an emergency)</p>
				<p> 2.	Confirming deliveries</p>
				<p> 3.	Conducting surveys.</p>
				<p> 4.	Qualifying leads.</p>
				</div>
				<p>Outbound calls are billable per minute at the price of <b>1AED.</b> This service is available only on demand and charged separately.</p>
				<p>The value of the Pro Package is <b> <?php if(!empty($discount_price)){ echo $discount_price;}else{ echo"2,499";}?>  AED/month </b> excluding VAT.</p>
				<p><b>If you are in agreement with the above, kindly confirm via email so that I can generate your quotation straight away!</b></p>
				<p><b>SO WHAT HAPPENS NEXT?</b></p>
				<p>The next steps after this are as follows:</p>
				<div class="InnerDiv1"><p> 1. Once you approve the quotation (through a link sent to you via email or by accessing the quotation from your dashboard) an invoice will be automatically generated.</p>
				<p> 2. The expectation is for the payment to be done immediately after the invoice is generated.   Your receipt will be generated after payment. Our billing cycle starts on the first of every month.  At the time of DID generation, the service will be deemed as active and you will be billed from that day until the 1st on a prorated basis if the payment date is any other date but the 1st.</p>
				<p> 3. You will be required to provide your TRN number and to forward your FAQs.</p>
				<p> 4. Our Operations team will get in touch with you to discuss your FAQs and for you to sign the NDA and contract. You are encouraged to take minutes of this meeting and forward them to me for record-keeping and to avoid ambiguity.</p>
				<p> 5. Our agents will be trained with regards to your business which will take between 2-3 days (our Client Coordination Team will advise you accordingly).</p>
				<p> 6. Your FAQs will be uploaded onto your dashboard for our agents to have access.</p>
				<p> 7. Your account goes live!</p>
				</div>
				<p><b>In order for us give you an amazing experience; kindly answer the questions on the attached form.</b></p>
				<p>If you have any questions, do not hesitate to call or email me.</p>
				<br><br>
				<p>Best Regards,</p>
				<p><?php echo $sender_name;?></p>
				<p style="margin-bottom:-15px !important"><img src="<?= base_url('assets/email-logo.svg');?>" width="150px" height="80px" /></p>
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