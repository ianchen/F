$(".login-btn").click(function(){
  var account = $("#account").val();
  var password = $("#pwd").val();
  $.ajax({
    url: "../Fpi/login.php",
    type: "post",
    dataType: "json",
    data: {
      a: account,
      p: password
    },
    success: function(response){ 
      uid = response.uid;
      token = response.token;
      if("1" == response.first){
        $("#update-info")
        .modal('show')
        .css({
          width: 'auto',
          'margin-left': function () {
            return -($(this).width() / 2);
          }
        });
      }else{
        window.location.replace("user?uid=" + response.uid + "&t=" + response.token);
      }
    },
    error: function(response){
      alert("登入資訊有誤,請檢查帳號密碼.");
    }
  });
});
$("#close-frame").click(function(){
  var password1 = $("#pwd-1").val();
  var password2 = $("#pwd-2").val();
  var introduce = $("#introduce").val();
  if(!password1){
    alert("尚未填寫密碼");
    return;
  }
  if(!password2){
    alert("尚未填寫密碼");
    return;
  }
  if(password1 !== password2){
    alert("確認密碼不符");
    return;
  }
  if(!introduce){
    alert("自我介紹尚未填寫");
    return;
  }
  var interests = [];
  for(var i = 1; i <= 10; i++){
    if(!!$("#interest-" + i).attr("checked")){
      interests.push(i);
    }  
  }
  $.ajax({
    url: "../Fpi/firstUpdate.php",
    type: "post",
    dataType: "json",
    data: {
      uid: uid,
      introduce: introduce,
      interests: interests,
      p: password1
    },
    success: function(response){
      window.location.replace("user?uid=" + uid + "&t=" + token);
    },
    error: function(response){
      alert("登入資訊有誤,請檢查帳號密碼.");
    }
  });

});

