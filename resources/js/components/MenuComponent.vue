<style lang="scss" scoped>
$canadia-primary: #ef5350;
$canadia-secondary: #00bcd4;
  .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-get-help{
  max-width: 641px;
}
.modal-about{
  max-width: 1091px;
}
.modal-container {
  // width: 300px;
  max-height: 500px !important;
  margin: 0px auto;
  // padding: 20px 30px;
  background-color: #fff;
  // border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header{
  span{
    &.close-button-img{
      background-image: url(/../images/icons/close_red.svg);
      background-repeat: no-repeat;
      background-position: center;
      width: 37px;
      height: 37px;
      top: 16px;
      float: right;
      z-index: 999;
      right: 16px;
      cursor: pointer;
    }
  }
}
.modal-header h3 {
  margin-top: 0;
  color: $canadia-primary;
}
.modal-body{
  padding: 0px !important;
  .building,
  .content{
    float: left;
  }
  .building{
    width: 33.33333%;
    img{
      width: 100%;
      max-height: 444px;
    }
  }
  .content{
    max-height: 444px;
    width: 66.66667%;
    padding: 15px;
    overflow: auto;
    background-color: #fff;
  }
}

.get-help{
  display: flex;
  justify-content:space-between;
  div{
    &:first-child{
      border-right: 1px solid #eee;
    }
  }
}


.modal-default-button {
  float: right;
}

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
ul{
  &.navbar-nav{
    li{
      a{
        cursor: pointer;
      }
    }
  }
}
</style>
<template>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" v-on:click.stop="showModal = true">{{ about_canadia_menu }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" v-on:click.stop="getHelp = true">{{ get_help_canadia_menu }}</a>
    </li>
  <transition name="modal" v-if="showModal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container modal-about">

          <div class="modal-header shadow-sm">            
            <h3>{{ title }}</h3>
            <span class="close-button-img" @click="showModal = false"></span>            
          </div>

          <div class="modal-body clearfix">
            <slot name="body">
              <div class="building">
                <img src="/../images/cnb.jpg">
              </div>
              <div class="content clearfix">
                <h5>{{ head_title }}</h5>
                <div v-html="about_content"/>
              </div>
            </slot>
          </div>

        </div>
      </div>
    </div>
  </transition>
  <transition name="modal" v-if="getHelp">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container modal-get-help">
          <div class="modal-header shadow-sm">
            <slot name="header">
              <h3>{{ get_help_title }}</h3>
              <span class="close-button-img" @click="getHelp = false"></span>
            </slot>
          </div>

          <div class="modal-body get-help">
            <slot name="body">
              <div class="call col-md-6 text-center mt-5 mb-5">
                <img src="/../images/icons/phone.svg" class="mb-3">
                <h4>{{ get_help_cal_center }}</h4>
                <h5>+855 23 868 222</h5>
              </div>
              <div class="chart col-md-6 text-center mt-5 mb-5">
                <img src="/../images/icons/chat.svg" class="mb-3">
                <h4>24/7 {{ get_help_chart_text }}</h4>
                <h5 v-html="get_help_chat_content"/>
              </div>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</ul>
</template>

<script>
  export default{
    props: [
      'title',
      'head_title',
      'about_content',
      'get_help_title',
      'get_help_chat_content',
      'get_help_chat',
      'get_help_cal_center',
      'get_help_chart_text',
      'about_canadia_menu',
      'get_help_canadia_menu'
    ],
    data:()=>{
      return{
        showModal: false,
        getHelp:false,
      }
    }
  }
</script>