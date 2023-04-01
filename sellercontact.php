<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
        BASE_URL = "<?php echo base_url();?>";
    </script>
    <!--https://semantic-ui.com/collections/message.html هاام-->
	<title><?=$data->company_name;?>Welcome In My New Site</title>
    <!--shortcut icon section Start--> 
    <link rel="shortcut icon" href="<?=base_url('materialize/image/menu/shop.jpg')?>">
    <!-- materialize css file include-->
    <link rel="stylesheet" href="<?=base_url() ?>materialize/css/bootstrap.min.css" />
    <!-- My-style css file include-->
    <link rel="stylesheet" href="<?=base_url('materialize/css/ecommerce/login-address-pink.css');?>" />
    <!-- materialize fontawesome file include-->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro">
    <link rel="stylesheet" href="<?=base_url('materialize/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=base_url() ?>materialize/css/hover.css" />
    
    <!--animation css-->
    <link rel="stylesheet" href="<?=base_url('materialize/css/animate.css')?>">
    <!--animation css-->
    
    <script src="<?php echo base_url('materialize/js/html5shiv.min.js');?>"></script>
	<script src="<?=base_url()?>materialize/js/respond.js"></script>

</head>
<body>
	<div class="page-contain">
		
		<div class="page_login">
			<!--f-->
			<div class="img-login">
				<img src="<?=base_url('materialize/image/slide/draw(36).png');?>">
			</div>
			<div class="form-login">
				<!--success message start-->
				<div class="alert alert-dismissible alert-success">
  					<strong>Well done!</strong> You successfully read <a href="#" class="alert-link"></a>
				</div>
				<!--success message end-->
				<h1>Sign Up</h1>
				<form id="my_form" action="<?=base_url('seller/insertSellercontact/').$data->count_id ;?>" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="seller_fname" id="fname" placeholder="first Name" value="<?php echo $data->seller_fname; ?>" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="seller_lname" id="lname" placeholder="Last Name" value="<?=$data->seller_lname;?>" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="seller_address" id="address" placeholder="address" value="<?=$data->seller_address;?>" required>
					</div>
					<div class="form-group">
						<select class="form-control" id="city" name="seller_city" required>
							
								<?php if($data->seller_city > -1){ ?>
							<option selected value="<?=$data->seller_city?>">
								<?=$data->seller_city?>
							</option>
									<?php } 
								else{ ?>
							<option selected disabled value="" >choose your city</option>	
								<?php }
							
							foreach($cities as $city){?>
								<option value="<?=$city->city ;?>"><?=$city->city;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-text">
						<input type="radio" checked>
						<p>i agree all statement in <span>Terms & Conditions</span></p>
					</div>
					<div class="form-submit">
						<button type="submit" name="submit" class="btn btn-primary" id="btn-form">SIGN UP</button>
						<p>Already Have account !? <span>LOGIN</span></p>
					</div>
				</form>
			</div>
		
		</div>
	
	</div>
    
<!-- materialize JQuery file include-->
   	<script src="<?=base_url()?>materialize/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url()?>materialize/js/bootstrap.min.js"></script>
    <!--for color animate jquery-->
    <script src="https://cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>
    
    <!--for wow animate -->
    <script src="<?=base_url('materialize/js/wow.min.js')?>"></script>
	<script> new WOW().init();</script>
    <!-- for wow animate -->
    <!-- my javascript-->
	<script src="<?=base_url('materialize/js/myjavascript.js')?>"></script>

</body>
</html> 
<script>
	$(document).ready(function(){		


		$("input,select").focus(function(){
			$(this).parent().addClass("active");
		});
		$("input,select").blur(function(){
			$(this).parent().removeClass("active");
		});
		
	/* send form update for insertSellercontact to add new or update data*/

		$('#my_form').on("submit",function(event){
			var fname 	= $('#fname').val(),
			lname 		= $('#lname').val(),
			address 	= $('#address').val(),
			city		= $('#city').val(),
			submit		= $('#btn-form').val();
			if(fname !== "" && lname !== "" && address !== "" && city !==""){
				event.preventDefault();
				$.ajax({
				url 	: "<?=base_url('seller/insertSellercontact/').$data->count_id ;?>",
				method 	: "POST",
				data	:{seller_fname:fname, seller_lname:lname, seller_address:address, seller_city:city,submit:submit},
				dataType:"json",
				success :function(data){
					if(data.error){alert(data.checkInfo);}
					else{ $('.alert-success').animate({opacity:1.0},2000,function(){$(this).animate({opacity:0},6000)})   }
				}	
			});
				
			}
			else{alert("error");}

		});
	/* send form update for insertSellercontact to add new or update data*/	
		
		
		
		
	})

</script>
