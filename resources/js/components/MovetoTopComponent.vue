<style lang="scss" scoped>
	$canadia-primary: #ef5350;
	$canadia-secondary: #00bcd4;
	.goTop{
		border-radius: 5px;
		background-color: $canadia-primary;
		// background-color: rgba(1, 14, 27, .7);
		position: fixed;
		width: 45px;
		height: 45px;
		display: block;
		right: 15px;
		bottom: 15px;
		border: none;
		opacity: 0;
		z-index: -1;
		.fa{
			color: white;
    		font-size: 22px;
		}
		&:hover{
			opacity: 1;
		    // background-color: rgb(1,14,27);
		    background-color: $canadia-secondary;
		}
	}
	.isVisible{
		opacity: .8;
		z-index: 4;
		transition: all .4s ease-in;
	}
</style>

<template>
	<div class="move-to-top">
		<button v-if="visible" class="goTop" @click="backToTop">
	        <i class="fa fa-angle-up" aria-hidden="true"></i>
	    </button>
	</div>
</template>

<script>
	export default{
		data:()=>{
			return{
				visible: false
			}
		},
		created(){
			window.addEventListener('scroll', () => {
				var backToTopButton = $('.goTop');
				if ($(document).scrollTop() > 250) {
					backToTopButton.addClass('isVisible');
      				return this.visible = true;
				}else{
					backToTopButton.removeClass('isVisible');
      				return this.visible = false;
				}
			});
		},
		methods:{
			backToTop: ()=>{
				$('html,body').stop().animate({
					scrollTop: 0
				}, 'slow', 'swing');
			}
		},
		
	}
</script>