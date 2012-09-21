$(".login-btn").click(function(){
  var account = $(".account > input").val();
  var password = $(".password > input").val();
  $.ajax({
    url: "../../server/login.php",
    type: "post",
    dataType: "json",
    data: {
      a: account,
      p: password
    },
    success: function(response){ 
              window.location.replace("user?uid=" + response.uid + "&t=" + response.token);
             },
    error: function(response){
             alert("登入資訊有誤,請檢查帳號密碼.");
           }
  });
});
