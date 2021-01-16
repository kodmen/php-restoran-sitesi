


function git(){

    if (kontrol()){
        var url = "process/form/book-process.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#book_form").serialize(),
            success: function () {
                alertify.success('Randevunuz oluşturuldu');

                alertify.alert('Randevunuz oluşturuldu');
                temizle();
            },
            error: function (e) {
                console.log("hata", e)
                alertify.alert('hata');
            }
        });
    }else {
        alertify.error("Randevu oluşturulamadı!!");
    }

}

function kontrol(){

    var bool = true;

    if($("#people").val()=="" ||$("#time").val()=="" || $("#date").val()=="" ||
        $("#username").val()=="" || $("#email").val()=="" || $("#phone").val()==""){
        bool = false;
    } else if (!ValidateEmail($("#email").val())){
        bool = false;
       // alertify.alert('epostanızın hatalı girdiniz');
        alertify.alert('eposta eksik', 'epostanızı kontorl ediniz lütfen');

    } else if(!phonenumber($("#phone").val())){
        bool = false;
        alertify.alert('telefonunuzu xxx xxx xxxx şeklinde tekrardan yazınız');

    }

   return bool;
}

function temizle(){
    $("#people").val("");
    $("#time").val("");
    $("#date").val("");
    $("#username").val("");
    $("#email").val("");
    $("#phone").val("");

}



function ValidateEmail(mail)
{
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
    {
        return (true)
    }

    return (false)
}

function phonenumber(inputtxt)
{
    if(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(inputtxt))
    {
        return true;
    }
    else {
        return false;
    }
}