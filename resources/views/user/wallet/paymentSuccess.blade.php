<html>
<head>
	<style>
		.bg {
  background-color: #6c7bee;
  width: 480px;
  overflow: hidden;
  margin: 0 auto;
  box-sizing: border-box;
  padding: 40px;
  font-family: 'Roboto';
  margin-top: 40px;
}
.card {
  background-color: #fff;
  width: 100%;
  float: left;
  margin-top: 40px;
  border-radius: 5px;
  box-sizing: border-box;
  padding: 80px 30px 25px 30px;
  text-align: center;
  position: relative;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.card__success {
  position: absolute;
  top: -50px;
  left: 145px;
  width: 100px;
  height: 100px;
  border-radius: 100%;
  background-color: #60c878;
  border: 5px solid #fff;
}
.card__success i {
  color: #fff;
  line-height: 100px;
  font-size: 45px;
}
.card__msg {
  text-transform: uppercase;
  color: #55585b;
  font-size: 18px;
  font-weight: 500;
  margin-bottom: 5px;
}
.card__submsg {
  color: #959a9e;
  font-size: 16px;
  font-weight: 400;
  margin-top: 0px;
}
.card__body {
  background-color: #f8f6f6;
  border-radius: 4px;
  width: 100%;
  margin-top: 30px;
  float: left;
  box-sizing: border-box;
  padding: 30px;
}
.card__avatar {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  display: inline-block;
  margin-right: 10px;
  position: relative;
  top: 7px;
}
.card__recipient-info {
  display: inline-block;
}
.card__recipient {
  color: #232528;
  text-align: left;
  margin-bottom: 5px;
  font-weight: 600;
}
.card__email {
  color: #838890;
  text-align: left;
  margin-top: 0px;
}
.card__price {
  color: #232528;
  font-size: 70px;
  margin-top: 25px;
  margin-bottom: 30px;
}
.card__price span {
  font-size: 60%;
}
.card__method {
  color: #d3cece;
  text-transform: uppercase;
  text-align: left;
  font-size: 11px;
  margin-bottom: 5px;
}
.card__payment {
  background-color: #fff;
  border-radius: 4px;
  width: 100%;
  height: 100px;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  justify-content: center;
}
.card__credit-card {
  width: 50px;
  display: inline-block;
  margin-right: 15px;
}
.card__card-details {
  display: inline-block;
  text-align: left;
}
.card__card-type {
  text-transform: uppercase;
  color: #232528;
  font-weight: 600;
  font-size: 12px;
  margin-bottom: 3px;
}
.card__card-number {
  color: #838890;
  font-size: 12px;
  margin-top: 0px;
}
.card__tags {
  clear: both;
  padding-top: 15px;
}
.card__tag {
  text-transform: uppercase;
  background-color: #f8f6f6;
  box-sizing: border-box;
  padding: 3px 5px;
  border-radius: 3px;
  font-size: 10px;
  color: #d3cece;
}


	</style>
</head>
<body>
	<div class="bg">
  
		<div class="card">
		  
		  <span class="card__success"><img src="https://www.austinuy.com/images/deliver.gif" alt="" width="90"></span>
		  
		  <h1 class="card__msg">Payment Complete</h1>
		  <h2 class="card__submsg">We have successfully recieved your payment</h2>
		  
		  <div class="card__body">
			
			<img src="https://icons-for-free.com/iconfiles/png/512/avatar-1320568024619304547.png" class="card__avatar">
			<div class="card__recipient-info">
			  <p class="card__recipient">Nath Green</p>
			  <p class="card__email">hello@nathgreen.co.uk</p>
			</div>
			<div class="card__recipient-info">
				<p class="card__email">The Details of the transactions will be available in your dashboard and will also be mailed to you.</p>
				<p class="card__email">Go Back to Your <a href="http://localhost:8000/user/wallet/add" class="btn btn-success">Dashboard</a></p>
			  </div>
			<h1 class="card__price"><span>$</span>{{$FinalAmount}}<span>.00</span></h1>
			
			<p class="card__method">Payment method</p>
			<div class="card__payment">
			  <img src="https://images.indianexpress.com/2017/02/paytm-logo-759.jpg" class="card__credit-card">
			  <div class="card__card-details">
				<p class="card__card-type">{{$paymentMode ?? ''}}</p>
				<p class="card__card-number"></p>          
			  </div>
			</div>
			
		  </div>
		  
		  <div class="card__tags">
			  <span class="card__tag">{{$txStatus}}</span>
			  <span class="card__tag">#{{$referenceId ?? ''}}</span>        
		  </div>
		  
		</div>
		
	  </div>
	</body>
</html>