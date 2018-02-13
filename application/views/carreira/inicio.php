<style>

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
@import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");
body {
  font-family: 'Montserrat', sans-serif;
  background: #112233;
}

.weather-card {
  margin: 60px auto;
  margin-top: 15px;
  margin-bottom: 15px;
  height: 570px;
  width: 450px;
  background: #fff;
  box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
  overflow: hidden;
}
.weather-card .top {
  position: relative;
  height: 380px;
  width: 100%;
  overflow: hidden;
  background: url("https://s-media-cache-ak0.pinimg.com/564x/cf/1e/c4/cf1ec4b0c96e59657a46867a91bb0d1e.jpg") no-repeat;
  background-size: cover;
  background-position: center center;
  text-align: center;
}
.weather-card .top .wrapper {
  padding: 30px;
  position: relative;
  z-index: 1;
}
.weather-card .top .wrapper .mynav {
  height: 20px;
}
.weather-card .top .wrapper .mynav .lnr {
  color: #fff;
  font-size: 20px;
}
.weather-card .top .wrapper .mynav .lnr-chevron-left {
  display: inline-block;
  float: left;
}
.weather-card .top .wrapper .mynav .lnr-cog {
  display: inline-block;
  float: right;
}
.weather-card .top .wrapper .heading {
  margin-top: 20px;
  font-size: 35px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .location {
  margin-top: 20px;
  font-size: 21px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .temp {
  margin-top: 20px;
}
.weather-card .top .wrapper .temp a {
  text-decoration: none;
  color: #fff;
}
.weather-card .top .wrapper .temp a .temp-type {
  font-size: 85px;
}
.weather-card .top .wrapper .temp .temp-value {
  display: inline-block;
  font-size: 85px;
  font-weight: 600;
  color: #fff;
}
.weather-card .top .wrapper .temp .deg {
  display: inline-block;
  font-size: 35px;
  font-weight: 600;
  color: #fff;
  vertical-align: top;
  margin-top: 10px;
}
.weather-card .top:after {
  content: "";
  height: 100%;
  width: 100%;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
}
.weather-card .bottom {
  padding: 0 30px;
  background: #1e282c;
}
.weather-card .bottom .wrapper .forecast {
  overflow: hidden;
  margin: 0;
  font-size: 0;
  padding: 0;
  padding-top: 20px;
  max-height: 155px;
}
.weather-card .bottom .wrapper .forecast a {
  text-decoration: none;
  color: #000;
}
.weather-card .bottom .wrapper .forecast .go-up {
  text-align: center;
  display: block;
  font-size: 25px;
  margin-bottom: 10px;
  color: #eeeeee;
}
.weather-card .bottom .wrapper .forecast li {
  display: block;
  font-size: 25px;
  font-weight: 400;
  color: #6b6b6b;
  line-height: 1em;
  margin-bottom: 30px;
}
.weather-card .bottom .wrapper .forecast li .date {
  display: inline-block;
}
.weather-card .bottom .wrapper .forecast li .condition {
  display: inline-block;
  vertical-align: middle;
  float: right;
  font-size: 25px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp {
  display: inline-block;
  vertical-align: top;
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  font-weight: 400;
  padding-top: 2px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .deg {
  display: inline-block;
  font-size: 10px;
  font-weight: 600;
  margin-left: 3px;
  vertical-align: top;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .temp-type {
  font-size: 20px;
}
.weather-card .bottom .wrapper .forecast li.active {
  color: #eeeeee;
}
.weather-card.rain .top {
  background: url("http://img.freepik.com/free-vector/girl-with-umbrella_1325-5.jpg?size=338&ext=jpg") no-repeat;
  background-size: cover;
  background-position: center center;
}


</style>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="weather-card one">
				<div class="top">
					<div class="wrapper">
						<div class="mynav">
							<a href="javascript:;"><span class="lnr lnr-chevron-left"></span></a>
							<a href="javascript:;"><span class="lnr lnr-cog"></span></a>
						</div>
						<h1 class="heading">Clear night</h1>
						<h3 class="location">Dhaka, Bangladesh</h3>
						<p class="temp">
							<span class="temp-value">20</span>
							<span class="deg">0</span>
							<a href="javascript:;"><span class="temp-type">C</span></a>
						</p>
					</div>
                </div>
                <div style="height:40px; background-color: #1a2226; width:100%;">
                </div>
				<div class="bottom">
					<div class="wrapper">
						<ul class="forecast">
							<a href="javascript:;"><span class="lnr lnr-chevron-up go-up"></span></a>
							<li class="active">
								<span class="date">INTZ x CNB</span>
								<span class="lnr lnr-sun condition">
									<span class="temp">Sem.01.Ano.02</span>
								</span>
							</li>
							<li>
								<span class="date">INTZ x paiN</span>
								<span class="lnr lnr-cloud condition">
									<span class="temp">Sem.02.Ano.02</span></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="weather-card rain">
				<div class="top">
					<div class="wrapper">
						<div class="mynav">
							<a href="javascript:;"><span class="lnr lnr-chevron-left"></span></a>
							<a href="javascript:;"><span class="lnr lnr-cog"></span></a>
						</div>
						<h1 class="heading">Rainy day</h1>
						<h3 class="location">Sylhet, Bangladesh</h3>
						<p class="temp">
							<span class="temp-value">16</span>
							<span class="deg">0</span>
							<a href="javascript:;"><span class="temp-type">C</span></a>
						</p>
					</div>
				</div>
				<div class="bottom">
					<div class="wrapper">
						<ul class="forecast">
							<a href="javascript:;"><span class="lnr lnr-chevron-up go-up"></span></a>
							<li class="active">
								<span class="date">Yesterday</span>
								<span class="lnr lnr-sun condition">
									<span class="temp">22<span class="deg">0</span><span class="temp-type">C</span></span>
								</span>
							</li>
							<li>
								<span class="date">Tomorrow</span>
								<span class="lnr lnr-cloud condition">
									<span class="temp">18<span class="deg">0</span><span class="temp-type">C</span></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>