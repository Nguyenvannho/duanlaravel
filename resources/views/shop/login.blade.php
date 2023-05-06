@include('sweetalert::alert')

<style>
@import url('https://fonts.googleapis.com/css?family=Abel%7CAbril+Fatface%7CAlegreya%7CArima+Madurai%7CDancing+Script%7CDosis%7CMerriweather%7COleo+Script%7COverlock%7CPT+Serif%7CPacifico%7CPlayball%7CPlayfair+Display%7CShare%7CUnica+One%7CVibur');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
background-image: linear-gradient(to top, #A8EDEA 0%, #FED6E3 100%);
background-attachment: fixed;
  background-repeat: no-repeat;
    font-family: 'Vibur', cursive;
/*   the main font */
    font-family: 'Abel', sans-serif;
opacity: .95;
}
form {
    width: 450px;
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
}
form .con {
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-around;
    justify-content: space-around;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
      margin: 0 auto;
}
header {
    margin: 2% auto 10% auto;
    text-align: center;
}
header h2 {
    font-size: 250%;
    font-family: 'Playfair Display', serif;
    color: #3E403F;
}
header p {letter-spacing: 0.05em;}
.input-item {
    background: #fff;
    color: #333;
    padding: 14.5px 0px 15px 9px;
    border-radius: 5px 0px 0px 5px;
}
#eye {
    background: #fff;
    color: #333;
    margin: 5.9px 0 0 0;
    margin-left: -20px;
    padding: 15px 9px 19px 0px;
    border-radius: 0px 5px 5px 0px;
    float: right;
    position: relative;
    right: 1%;
    top: -.2%;
    z-index: 5;
    cursor: pointer;
}
/* inputs form  */
input[class="form-input"]{
    width: 240px;
    height: 50px;
    margin-top: 2%;
    padding: 15px;
    font-size: 16px;
    font-family: 'Abel', sans-serif;
    color: #5E6472;
    outline: none;
    border: none;
    border-radius: 0px 5px 5px 0px;
    transition: 0.2s linear;
}
input[id="txt-input"] {width: 250px;}
/* focus  */
input:focus {
    transform: translateX(-2px);
    border-radius: 5px;
}
button {
    display: inline-block;
    color: #252537;
    width: 280px;
    height: 50px;
    padding: 0 20px;
    background: #fff;
    border-radius: 5px;
    outline: none;
    border: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s linear;
    margin: 7% auto;
    letter-spacing: 0.05em;
}
/* Submits */
.submits {
    width: 48%;
    display: inline-block;
    float: left;
    margin-left: 2%;
}
/*       Forgot Password button FAF3DD  */
.frgt-pass {background: transparent;}
/*     Sign Up button  */
.sign-up {background: #B8F2E6;}
/* buttons hover */
button:hover {
    transform: translatey(3px);
    box-shadow: none;
}
/* buttons hover Animation */
button:hover {
    animation: ani9 0.4s ease-in-out infinite alternate;
}
@keyframes ani9 {
    0% {
        transform: translateY(3px);
    }
    100% {
        transform: translateY(5px);
    }
}
</style>
<div class="overlay">
    <form action="{{route('shop.checklogin')}}" method="post">
        @csrf
       <div class="con">
       <header class="head-form">
          <h2>Đăng nhập</h2>
       </header>
       <br>
       <div class="field-set">
             <input class="form-input" id="txt-input" type="email" placeholder="Email" name="email" required>
          <br>
          <input class="form-input" id="txt-input" type="password" placeholder="Mật khẩu"  name="password" required>
          <br>
          <button class="log-in">Đăng nhập</button>
       </div>
     
       <div class="other">
          <button class="btn submits frgt-pass">Quên mật khẩu?</button>
              <a href="{{route('shop.register')}}">Đăng kí</a>
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          </button>
       </div>
      </div>
    </form>
    </div>