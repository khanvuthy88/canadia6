<style lang="scss" scoped>
	.modal-body{
		img{
			float: left;
			width: 40%;
			margin-right: 15px;
			margin-bottom: 15px;
		}
		.get-help{
			width:100%;
			display: flex;
			justify-content: space-between;
			@media screen and (max-width: 37.5em){
				display: block;
			}
			.inner{
				width:49%;
				@media screen and (max-width: 37.5em){
					width: 100%;
				}
				img{
					float: none;
					width: 100%;
					max-width: 80px;
					margin: 15px auto 30px;
				}
			}
		}
		table{
			&.account-feature{
				width:100%;
				tr{
					td{
						border-bottom: 1px solid #dee2e6; 
						border-top: 0px;
						img{
							width: 38px;
						}
						&:first-child{
							width: 38px;
						}
						&:last-child{
							vertical-align: middle;
						}
					}
				}
			}
			&.account-condition{
				td{
					border-bottom: 1px solid #dee2e6; 
					border-top: 0px;
				}
				ul{
					li{
						padding: 0px !important;
					}
				}
			}
		}
	}
	#saving_account,
	#current_account,
	#current_plus,
	#fixed_deposit{
		.modal-body{
			padding: 0px;
			ul{
				li{
					padding: 1rem;
					a{
						text-decoration: none;
						text-transform: uppercase;
						padding-bottom: 1rem;
						&.active{
							border-bottom: 2px solid #ef5350;
						}
					}				
				}
			}
		}
		.modal-footer {
		    display: flex;
		    align-items: center;
		    justify-content: flex-end;
		    padding: 1rem;
		    border-top: 1px solid #dee2e6;
		    border-bottom-right-radius: 0.3rem;
		    border-bottom-left-radius: 0.3rem;
		}
		.tab-content{
			padding: 1rem;
		}
	}

	.image-block{
		width: 40%;
		float: left;
		img{
			width: 100%;
		}
	}
	.modal-content{
		border-radius: 0px;
	}
	.modal-content-block{
		width: 58%;
		float: left;
		margin-left: 15px;
	}
</style>

<template>
	<div v-if="show_model=1">
		<div class="modal fade" id="current_plus" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">            
		            <div class="modal-body">
		            	<!-- <slot></slot> -->
		                <ul class="nav nav-tabs shadow-sm">
		                  <li><a class="active" data-toggle="tab" href="#current_plus_feature">Main Features</a></li>
		                  <li><a data-toggle="tab" href="#current_plus_condition">Conditions</a></li>
		                  <li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
		                </ul>

		                <div class="tab-content">
		                	<h2>{{ account_name_string }}</h2>
		                  <div id="current_plus_feature" class="tab-pane fade show in active">
		                    <table class="table account-feature">
		                        <tbody>
		                            <tr>
		                                <td><img src="/../images/icons/1.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >No monthly service fee</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/2.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >0.45% p.a. of interest</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/5.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Deposit and withdrawal anytime</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/4.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Free iBanking & Mobile App</td>
		                            </tr>
		                        </tbody>
		                    </table>
		                   
		                  </div>
		                  <div id="current_plus_condition" class="tab-pane fade">
		                    <table class="table account-condition">
		                        <tbody>
		                            <tr>
		                                <td>Account eligibility</td>
		                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
		                            </tr>
		                            <tr>
		                                <td>Currency</td>
		                                <td>USD, KHR</td>
		                            </tr>
		                            <tr>
		                                <td>Minimum opening and ongoing balance</td>
		                                <td>USD 10*</td>
		                            </tr>
		                            <tr>
		                                <td>Interest rate</td>
		                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
		                            </tr>
		                            <tr>
		                                <td>Interest payment</td>
		                                <td>Semi-annually or upon account closure</td>
		                            </tr>
		                            <tr>
		                                <td>Monthly account service</td>
		                                <td>Free</td>
		                            </tr>
		                            <tr>
		                                <td>Access to account</td>
		                                <td>
		                                    <ul>
		                                        <li>Canadia Bank branches</li>
		                                        <li>Cash-In kiosks</li>
		                                        <li>ATM</li>
		                                        <li>Internet Banking</li>
		                                        <li>Mobile Banking</li>
		                                        <li>UnionPay Card / MasterCard / Visa Card</li>
		                                    </ul>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
		                            </tr>
		                        </tbody>
		                    </table>
		                  </div>
		                  
		                </div>
		            </div>
		            <div class="modal-footer">
		            	<form method="post" :action="action_url" accept-charset="UTF-8">
		            		<input type="hidden" name="_token" v-bind:value="csrf">
		            		<input name="saving_account" type="hidden" :value="account_type"> 
		            		<input id="agree_condition" required="required" name="agree_condition" type="radio" value="agree_condition"> 
		            		<label for=" I agree to Canadia Bank's term and condition"> I Agree To Canadia Bank's Term And Condition</label> 
		            		<input id="btn_create_account" type="submit" value="Submit" class="btn btn-primary">
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</template>

<script>
	export default{
		props:{
			modelName: String,
			action_url: String,
			account_type: String,
			account_name_string: String,
			csrf: String
		},
		data:()=>{
			return {
				show_model:0
			}
		}

	}
</script>