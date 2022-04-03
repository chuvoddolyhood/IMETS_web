function confirm_Del(name){
    return confirm("Xóa bệnh "+ name + " ?");
}

$(document).ready(function(){
    $('#search').keyup(function(){
        var name = $(this).val();
        var ID_Appointment = document.getElementById('ID_Appointment').value;
        

        // alert(ID_Appointment);
        if(name==''){
            $('#back_result').css({'display':'none'});
            $('#back_result').html('');
        } else{
            // alert (name);
            $.post('./modules_staff/checkup/diagnose_search.php', {name:name, ID_Appointment:ID_Appointment}, function(data){
                $('#back_result').css({'display':'block'});
                $('#back_result').html(data);
            })
        }
        
    });

    $('#user').click(function(){
        alert ('name');
    });

    $('#abc').click(function(){
        alert ('name');
    });
})


function add_diagnose(){
    var ID_Appointment = document.getElementById('ID_Appointment').value;
    var reasoncheckup = document.getElementById('reasoncheckup').value;
    var bodycheck = document.getElementById('bodycheck').value;
    var bodypartscheck = document.getElementById("bodypartscheck").value;
    
    var pulserate = document.getElementById("pulserate").value;
    var temp = document.getElementById("temp").value;
    var bloodpressure = document.getElementById("bloodpressure").value;
    var breathing = document.getElementById("breathing").value;
    var height = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;

    var result = document.getElementById("result").value;
    var dicection = document.getElementById("dicection").value;
    var advice = document.getElementById("advice").value;
    var dateRecheckup = document.getElementById("dateRecheckup").value;

    // alert(reasoncheckup+bodycheck+bodypartscheck+pulserate+temp+bloodpressure+breathing+height+weight+result+dicection+advice+dateRecheckup+ID_Appointment);

    // call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "./modules_staff/checkup/diagnose.php?reasoncheckup="+reasoncheckup+"&bodycheck="+bodycheck+"&bodypartscheck="+bodypartscheck+"&pulserate="+pulserate+"&temp="+temp+"&bloodpressure="+bloodpressure+"&breathing="+breathing+"&height="+height+"&weight="+weight+"&result="+result+"&dicection="+dicection+"&advice="+advice+"&dateRecheckup="+dateRecheckup+"&ID_Appointment="+ID_Appointment;
    var asynchronous = true;
        ajax.open(method, url, asynchronous);

    //send
    ajax.send();
        
    //receive
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            alert(response);
            // window.location.href='./index.php?page_layout=cart';
        }
    }
        
}