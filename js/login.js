$(document).ready(function () {
  var emailR = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/;
  var passwordR = /^[a-zA-Z0-9]{8,12}$/;

  $("#login").click(function () {
    if (
      emailR.test($("#email").val()) &&
      passwordR.test($("#password").val())
    ) {
      $.ajax({
        type: "POST", //傳送方式
        url: "../MemberContro.php", //傳送目的地
        data: {
          todo: 'login',
          email: $("#email").val(),
          password: $("#password").val()
        },
        success: function (res) {
          res = JSON.parse(res);
          if (res['success'] === true) {
            Swal.fire({
              position: 'top',
              icon: 'success',
              title: '登入成功',
              showConfirmButton: false,
              timer: 1500
            }).then(function () {
              window.location.href = "../backend/home_index.php"
            });
          } else if (res['success'] === false && res['error_code'] === 15) {
            Swal.fire({
              position: 'top',
              icon: 'error',
              title: '您已被停權!',
            })
          } else {
            Swal.fire({
              position: 'top',
              icon: 'error',
              title: '帳號密碼錯誤!',
            })
          }
        },
        error: function (error) {
          // console.log(error);
        }
      });
    } else {
      Swal.fire({
        position: 'top',
        icon: 'error',
        title: '資料輸入格式錯誤',
      })
    }
  });

});