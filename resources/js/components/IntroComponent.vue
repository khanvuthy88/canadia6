<style lang="scss" scoped>
$canadia-primary: #ef5350;
$canadia-secondary: #00bcd4;
	.intro{
		width: 100%;
		background: url(/../images/cnb-openaccount-home.jpg);
		background-position: 0% 90%;
	    min-height: 560px;
	    background-repeat: no-repeat;
	    background-size: cover;
	    @media screen and (max-width: 35.7em){
	    	background-position: 17% 90%;
	    }
	    .wrapper{
	    	padding: 15% 0px;
    		text-align: center;
    		.btn{
    			border-radius: 0px !important;
    			a{
    				color: #fff;
    				text-transform: uppercase;
    				&:hover{
    					text-decoration: none;    					
    				}
    			}
    			&:hover{
    				background-color: $canadia-secondary;
    			}
    		}
	    }	    
	}
</style>

<template>
	<div class="intro">	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wrapper">
						<h1 class="text-center text-white">Accounts for Daily Needs</h1> 
						<p class="text-center text-white">
							Find out more about our range of current and savings accounts for your daily needs.
						</p> 
						<button class="btn btn-canadia text-center text-white">
							<a id="create-account" @click.prevent="gotoSection('#accounts')">Choose account type</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
	    	gotoSection:function(selector){
	    		document.querySelector(selector).scrollIntoView({ behavior: 'smooth' });
	    	}
	    }
    }
</script>