var locX;
var locY;
var ctx;
var ido = 0;
var keido = 0;
var rad = 15;
var vel = 0.15;
var tan;
var cos;
var sin;
var mul;
var originx = 139.74140;
var originy = 35.64842;

function init() {
    var canvas = document.getElementById("location");
    
    if (canvas.getContext) {
        ctx = canvas.getContext('2d');
        setInterval(draw, 33);
    }
}

//ユーザーの現在の位置情報を取得
navigator.geolocation.watchPosition(successCallback, errorCallback);

/***** ユーザーの現在の位置情報を取得 *****/
function successCallback(position) {
  var gl_text = "緯度：" + position.coords.latitude + "<br>";
    gl_text += "経度：" + position.coords.longitude + "<br>";
    gl_text += "緯度・経度の誤差：" + position.coords.accuracy + "<br>";
    ido = position.coords.latitude;
    keido = position.coords.longitude;
  document.getElementById("show_result").innerHTML = gl_text;
}

/***** 位置情報が取得できない場合 *****/
function errorCallback(error) {
  var err_msg = "";
  switch(error.code)
  {
    case 1:
      err_msg = "位置情報の利用が許可されていません";
      break;
    case 2:
      err_msg = "デバイスの位置が判定できません";
      break;
    case 3:
      err_msg = "タイムアウトしました";
      break;
  }
  document.getElementById("show_result").innerHTML = err_msg;
  //デバッグ用→　document.getElementById("show_result").innerHTML = error.message;
}

function draw() {
    ctx.clearRect(0,0,1483,1028);
    ctx.beginPath();
    ctx.fillStyle = '#E8E8E8';
    calcLocation();
    if(locX > 0 && locX < 1483 && locY > 0 && locY < 1028){
      ctx.arc(locX, locY, 30, 0, Math.PI * 2.0, true);
      ctx.fill();

      rad += vel;
      if(rad > 20 || rad < 15){
          vel *= -1;
      }

      ctx.beginPath();
      ctx.fillStyle = '#001E62';
      ctx.arc(locX, locY, rad, 0, Math.PI * 2.0, true);
      ctx.fill();
    }
}

function calcLocation() {
  //console.log(keido);
  //console.log(ido);
  tan = (180 * 0.00309 - 1050 * 0.00037) / (1050 * 0.00309 - 180 * 0.00037);
  //console.log(tan);
  cos = Math.sqrt(1 / (1 + tan * tan));
  //console.log(cos);
  sin = Math.sqrt(tan * tan / (1 + tan * tan));
  //console.log(sin);
  mul = 1050 / (0.00309 * cos + 0.00037 * sin);
  //console.log(mul);
  locX = 280 + ((keido - originx) * cos + (ido - originy) * sin) * mul;
  //console.log(locX);
  locY = 730 + ((keido - originx) * sin + (ido - originy) * cos) * mul * (-1);
  //console.log(locY);
}
