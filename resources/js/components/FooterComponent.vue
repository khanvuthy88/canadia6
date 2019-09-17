<template id='footer'>
	<section id="footer">
		<div class="section footer wrapper" data-anchor="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						<ul class="footer-contact">
							<li class="phone">
								<p>General Inquiry</p>
								<p>023 868 222</p>
							</li>
							<li class="address">
								<p>Find Canadia Bank</p>
								<p>Locate our Branch and ATM</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-md-12">
								<ul class="footer-useful-menu">
									<li>Privacy</li>
									<li>Important Information</li>
									<li>Term and Condition</li>
									<li>Cookies</li>
								</ul>
							</div>
							<div class="col-md-12 mt-3">
								<p>© 1991-{{ new Date().getFullYear() }}, Canadia Bank Plc. No. 315, Ang Doung St. Corner Monivong Blvd, Phnom Penh, Cambodia.</p>
							</div>
						</div>
						
					</div>
					<div class="col-md-6 col-sm-12">
						<ul class="find-us">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default{
		data : ()=>{
			return{

			}
		}
	}
</script>

<style lang="scss" scoped>
	#footer{
		width:100%;
		background: #333;
		color: #fff;
	}
	.footer{
		border-bottom: 1px solid #444;
		padding: 30px 0px;
		ul{
			margin: 0px;
			padding: 0px;
			display: flex;
		    justify-content: space-between;	
			li{				
				list-style: none;
				// margin-left: 15px;
				&.phone,
				&.address{
					p{
						margin-left: 27px;
					}
				}	
				&.phone{	
					margin-right: 10px;				
					&:before{
						background-image: url(/../images/icons/phone-icon.svg);
						background-repeat: no-repeat;
						content: '';
						position: absolute;
						width: 20px;
						height: 100%;
					    background-position: 0% 50%;
					}
				}
				&.address{
					&:before{
						background-image: url(/../images/icons/locate-icon.svg);
						background-repeat: no-repeat;
						content: '';
						position: absolute;
						width: 20px;
						height: 100%;
					    background-position: 0% 50%;
					}
				}
				p{
					margin: 0px;
					padding: 0px;
				}					
			}
		}
	}
	.footer-content{
		padding: 1em 0px;
		ul{
			margin: 0px;
			padding: 0px;
			&.footer-useful-menu{
				li{
					display: inline;
					list-style: none;
					padding: 0px;
					padding: 5px 7px;
					&:first-child{
						padding-left: 0px;
					}
				}
			}
			&.find-us{
			    transform: translateY(-50%);
			    top: 50%;
			    position: absolute;
			    right: 0px;
			    margin-right: 49px;
			    margin-bottom: 0px;
			    margin-top: 0px;
			    li{
			    	list-style: none;
			    	display: inline-block;
			    	padding: 0px;
			    	a{
			    		position: relative;
					    text-decoration: none;
					    display: block;
					    height: 50px;
					    width: 50px;
					    border-radius: 50%;
					    border: none !important;
					    .fa{
					    	font-size: 2em;
						    line-height: 45px;
						    color: #fff;
						    margin-left: 14px;
					    }
					    &:before{
					    	content: "";
						    position: absolute;
						    top: 7%;
						    left: 7%;
						    width: 85%;
						    height: 85%;
						    opacity: 0.8;
						    border-radius: 50%;
					    }
			    	}
			    }
			}
		}
	}
</style>