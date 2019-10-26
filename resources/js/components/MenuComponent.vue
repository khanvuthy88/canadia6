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
      <a class="nav-link" v-on:click.stop="showModal = true">About Canadia bank</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" v-on:click.stop="getHelp = true">Get Help</a>
    </li>
  <transition name="modal" v-if="showModal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container modal-about">

          <div class="modal-header shadow-sm">
            <slot name="header">
              <h3>About Canadia Bank</h3>
              <span class="close-button-img" @click="showModal = false"></span>
            </slot>
          </div>

          <div class="modal-body clearfix">
            <slot name="body">
              <div class="building">
                <img src="/../images/cnb.jpg">
              </div>
              <div class="content clearfix">
                <h5>Canadia Bank Plc. was established on 11th November 1991 as "Canadia Gold & Trust Corporation Ltd.", joint-venture between Cambodian - Canadians and the National Bank of Cambodia (Central Bank of Cambodia).</h5>
                <p>The bank's management consisted of former staff of the National Bank of Cambodia and its Cambodian – Canadian shareholders. The main activities were based on gold transactions, gold plaque manufacturing and lending to local merchants. On 19th April 1993 the name was changed into CANADIA BANK LTD., licensed as a Commercial Bank with the National Bank of Cambodia and registered with the Ministry of Commerce. On 16th December 2003 the name of the bank changed into CANADIA BANK PLC. (Public Limited Company).</p>
                <p>Since privatization in 1998 the Bank has become the largest local bank in Cambodia. With a worldwide network of correspondent banking relationships and a solid base of local and international customers CANADIA BANK PLC holds commanding market shares in loans as well as deposits.</p>
                <p>The bank offers a wide range of financial services through its Head Office and its 57 branches in Phnom Penh and major cities throughout the country.</p>
                <p>The bank offers a wide range of financial services through its Head Office and its 57 branches in Phnom Penh and major cities throughout the country.</p>
                <p>The bank offers a wide range of financial services through its Head Office and its 57 branches in Phnom Penh and major cities throughout the country.</p>
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
              <h3>Get Help</h3>
              <span class="close-button-img" @click="getHelp = false"></span>
            </slot>
          </div>

          <div class="modal-body get-help">
            <slot name="body">
              <div class="call col-md-6 text-center mt-5 mb-5">
                <img src="/../images/icons/phone.svg" class="mb-3">
                <h4>Call Center</h4>
                <h5>+855 23 868 222</h5>
              </div>
              <div class="chart col-md-6 text-center mt-5 mb-5">
                <img src="/../images/icons/chat.svg" class="mb-3">
                <h4>24/7 Chat</h4>
                <h5>We have a dedicated Chat team to help you anytime</h5>
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
    data:()=>{
      return{
        showModal: false,
        getHelp:false
      }
    }
  }
</script>