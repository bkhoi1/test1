//====================================    Hiệu ứng lướt của Đăng nhập Đăng kí(sign.php)   =====================================
function slideSignUp() {
  const curtain = document.getElementsByClassName("curtain");
  const slideMessage = document.getElementsByClassName("sign-message");
  curtain[0].style.transform = "translateX(-100%)";
  curtain[0].style.transition = "all 1s ease-out";
  slideMessage[0].innerHTML =
    "<h2>Chào mừng bạn đến với Computism!</h2><br>" +
    "<p>Để mua hàng cũng như sớm nhận được những thông báo vầ các đợt khuyến mại của " +
    "Computism, hãy đăng kí bằng tài khoản bằng thông tin của bạn</p><br><br>" +
    "<p class='sign-question'>Đã có tài khoản?</p>" +
    "<button class='sign-btn' onclick='slideSignIn()'>Đăng nhập ngay</button>";
}

function slideSignIn() {
  const curtain = document.getElementsByClassName("curtain");
  const slideMessage = document.getElementsByClassName("sign-message");
  curtain[0].style.transform = "translateX(0)";
  curtain[0].style.transition = "all 1s ease-out";
  slideMessage[0].innerHTML =
    "<h2>Chào mừng bạn trở lại!</h2><br>" +
    "<p>Để tiếp tục mua hàng một cách nhanh chóng cũng như sớm nhận được những thông báo vầ các đợt khuyến mại mới nhất  của " +
    "Computism, hãy đăng nhập bằng thông tin tài khoản và mật khẩu ở form đăng nhập bên cạnh</p><br><br>" +
    "<p class='sign-question'>Chưa có tài khoản?</p>" +
    "<button class='sign-btn' onclick='slideSignUp()'>Đăng kí ngay</button>";
}

//===========================================  Chuyển slide Sản phẩm mới   =====================================================
const images = document.getElementById("slideImages");
let counter = 0;
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
nextBtn.addEventListener("click", () => {
  if (counter < 3) {
    counter++;
    images.style.transform = `translateX(${-50 * counter}%)`;
    images.style.transition = "all 1s ease";
  }
});
prevBtn.addEventListener("click", () => {
  if (counter > 0) {
    counter--;
    images.style.transform = `translateX(${-50 * counter}%)`;
    images.style.transition = "all 1s ease";
  }
});
