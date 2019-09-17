<style lang="scss" scoped>
	$canadia-primary: #ef5350;
	$canadia-secondary: #00bcd4;
	.account-types{
		display: flex;
		@media screen and (max-width: 35.7em){
	    	display: block;
	    }
		.type{
			min-height: 600px;
		    position: relative;
		    width: 100%;
		    @media screen and (max-width: 37.5em){
				min-height: auto;
			}
		    .background-image-1,
		    .background-image-2{
		    	background-size: cover;
			    background-repeat: no-repeat;
			    height: 60%;
				background-position: 50%;
				@media screen and (max-width: 37.5em){
					min-height: 250px;
				}
		    }
		    .background-image-1{
	    		background-image: url(/../images/dailyneedssmall.jpg);
	    	}
	    	.background-image-2{
	    		background-image: url(/../images/growyourmoneysmall_01.jpg);			    
	    	}
	    	.type-1{
	    		background-color: $canadia-primary;
	    	}
	    	.type-2{
	    		background-color: $canadia-secondary;
	    	}
	    	.content{
	    		height: 40%;
			    color: #ffffff;
			    text-align: center;
			    padding: 5% 0px;
			    @media screen and (max-width: 37.5em){
			    	height: auto;
			    }
			    .wrapper{
			    	width: 61%;
				    margin: 0px auto 0px;
				    padding-bottom: 30px;
			    }
			    .btn{
			    	background-color: inherit;
			    	border-radius: 0px !important;
			    	width: 220px;
			    	height: 47px;
			    	&:hover{
			    		background-color: #fff !important;
			    		color: $canadia-primary !important;
			    	}
			    	a{
			    		text-decoration: none;
			    		&:hover{
			    			color: $canadia-primary !important;
			    		}
			    	}
			    }
			    .btn-canadia{
		    	    text-transform: uppercase;
				    padding: 5px 15px;
				    border: 2px solid #ffffff !important;
				    background-color: inherit !important;
			    }
	    	}
		}
	}
	.modal-enter {
	  opacity: 0;
	}

	.modal-leave-active {
	  opacity: 0;
	}

	.account-daily-needs,
	.account-fixed-deposit{
		background-size: cover;
    	background-repeat: no-repeat;
    	width: 100%;
    	padding: 30px 0px;
    	.card{
    		img{
    			max-width: 70px;
			    text-align: center;
			    margin: 30px auto 10px;
    		}
    		.card-body{
    			text-align: center;
    			min-height: 246px;
    			button{
    				width: 91%;
				    bottom: 15px;
				    position: absolute;
				    right: 15px;
				    left: 15px;
				    &.btn{
				    	border-radius: 0px !important;
				    	text-transform: uppercase;
				    }
    			}
    		}
    	}
	}
	.account-daily-needs{
		background-image: url(/../images/dailyneedssmall.jpg);
	}
	.account-fixed-deposit{
		background-image: url(/../images/growyourmoneysmall_01.jpg);
	}

</style>
<template>
	<div class="accounts">
		<div class="account-types">
			<div class="type clearfix">
				<div class="background-image-1"></div>
				<div class="content type-1">
					<div class="wrapper">
						<h2 class="mb-4">Accounts for Daily Needs</h2> 
						<p class="mb-4">Find out more about our range of current and savings accounts for your daily needs.</p> 
						<button class="btn-canadia btn text-white" v-on:click="getCurrentAccount(1,'.account-daily-needs')">
							discover
						</button>
					</div>
				</div>
			</div>
			<div class="type clearfix">
				<div class="background-image-2"></div>
				<div class="content type-2">
					<div class="wrapper">
						<h2 class="mb-4">Accounts to Grow Your Money</h2> 
						<p class="mb-4">Find out more about our range of current and savings accounts for your daily needs.</p> 
						<button class="btn-canadia btn text-white" v-on:click="getCurrentAccount(2,'.account-fixed-deposit')">
							discover
						</button>
					</div>
				</div>
			</div>
		</div>
		<transition name="modal" enter-active-class="animated slideInLeft" leave-active-class="animated slideOutLeft">
			<div class="account-daily-needs" v-if="correntaccount==1">
				<div class="container">
					<div class="row">
		                <div class="col-md-12">
		                    <h1 class="text-center mt-3 mb-5 text-white">Accounts for Daily Needs</h1>
		                </div>
		            </div>
					<div class="row">
						<div class="col-md-4 col-sm-12 mb-3">
							<div class="card">
								<img src="/../images/icons/cnb-join-saving-icon.svg" class="card-img-top"> 
								<div class="card-body">
									<h1>Savings Account</h1> 
									<p>Our most popular bank account that helps you reach saving goal with 0.45% p.a. interest rate when you regularly save each month.</p> 
									<button 
										@click.prevent="showModal"
										data-name="Savings Account"
										data-url="frontend/account/account_saving/create"
										data-value="account_saving"
										data-toggle="modal" 
										class="btn btn-primary btn-canadia">Learn more</button>
								</div>
							</div>
						</div> 
						<div class="col-md-4 col-sm-12 mb-3">
							<div class="card">
								<img src="/../images/icons/cnb-join-current-icon.svg" class="card-img-top"> 
								<div class="card-body">
									<h1>Elite Account</h1> 
									<p>Our traditional bank account to help manage your daily financial needs. Enjoy easy payments or transfers whether in Cambodia or overseas 24/7.</p> 
									<button 
										@click.prevent="showModal"
										data-name="Elite Account"
										data-toggle="modal" 
										data-url="frontend/account/elite_account/create"
										data-value="elite_account"
										class="btn btn-primary btn-canadia">Learn more</button>
								</div>
							</div>
						</div> 
						<div class="col-md-4 col-sm-12 mb-3">
							<div class="card">
								<img src="/../images/icons/cnb-join-current-plus-icon.svg" class="card-img-top"> 
								<div class="card-body">
									<h1>Current Account</h1> 
									<p>Get the maximum value from your daily activity and earn 0.45% p.a. interest on top of your balance.</p> 
									<button 
										@click.prevent="showModal"
										data-name="Current Account"
										data-url="frontend/account/current_account/create"
										data-value="current_account"
										data-toggle="modal" 
										class="btn btn-primary btn-canadia">Learn more</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</transition>
		<transition enter-active-class="animated slideInRight" leave-active-class="animated slideOutRight" name="modal">
			<div class="account-fixed-deposit" v-if="correntaccount == 2">
				<div class="container">
		            <div class="row">
		                <div class="col-md-12">
		                    <h1 class="text-center mt-3 mb-5 text-white">Accounts to Grow Your Money</h1>
		                </div>
		            </div>
		            <div class="row">	                
		                <div class="col-md-6 col-sm-12 mt15">
		                    <div class="card">
		                        <img class="card-img-top" src="/../images/icons/cnb-join-fixed-deposit.svg">
		                        <div class="card-body">
		                            <h1>Fixed Deposit</h1>
		                            <p>Make your money work hard for you and get high return of up to 4.75% p.a. on your savings. You can choose the term of the deposit between 1 month and 2 years.</p>
		                            <button 
		                            	@click.prevent="showModal"
		                            	data-name="Fixed deposit Account"
										data-url="fixed-deposit"
										data-value="account_fiexed_deposit"
		                            	data-toggle="modal" 
		                            	class="btn btn-primary secondary-background">Learn more</button>
		                        </div>
		                    </div>
		                </div>                
		            </div>
		        </div>
			</div>
		</transition>
		<modalaccount-component v-bind:csrf="token_string" v-bind:account_name_string="account_name" v-bind:action_url="action_url" v-bind:account_type="value"></modalaccount-component>
	</div>	
</template>

<script>
	import ModalAccountComponent from './ModalAccountComponent.vue';
	export default{
		components:{
			'modalaccount-component': ModalAccountComponent,
		},
		data:()=>{
			return{
				correntaccount:1,
				action_url: '',
				value: '',
				account_name: '',
				token_string: ''
			}			
		},
		methods:{
			getCurrentAccount(account,selector){
				return this.correntaccount = account;
			},
			showModal(){
				let url = window.location;
				let link_url = url+event.target.getAttribute('data-url');
				this.token_string = $('meta[name="csrf-token"]').attr('content');
				this.action_url= link_url;
				this.value= event.target.getAttribute('data-value');
				this.account_name = event.target.getAttribute('data-name');
				$('#current_plus').modal('show')
			}
		}
	}
</script>