////////////////////////check password////////////////////////////
function checkpw(){

   
    let password = document.getElementById('password').value //4
    let cfpassword = document.getElementById('cfpassword').value //4
    var passcount = cfpassword.length //4
    if(passcount != 0){
        if(cfpassword != password){
            $(':input[type="submit"]').prop('disabled', true);
            $(':input[type="submit"]').css('hover',"none");
            $(':input[type="submit"]').css('background-color',"gray");
            $("#passwordcf-feed").html('**รหัสผ่านไม่ตรงกัน')
            $("#cfpassword").css("border-color","#dc3545")
            
            
        }else {
            $(':input[type="submit"]').prop('disabled', false);
            $(':input[type="submit"]').css('background-color',"rgb(39,39,42)");
            $("#cfpassword").css("border-color","#198754")
            $("#passwordcf-feed").html('')
        }
    }else{
        $(':input[type="submit"]').prop('disabled', false);
        $("#cfpassword").css("border-color","rgb(209,213,219)")
        $("#passwordcf-feed").html('')
    }
    console.log(passcount)
    console.log(password)
   }