function ValidateForm()
{
    var nameOk = true;
    //Verify empty name
    if (document.getElementById('name').value === "")
    {
        document.getElementById('name').style.border = "solid 2px red";
        nameOk = false;

    }
    else{
        document.getElementById('name').style.border = "1px solid #ccc";
    }


    //verify empty message
    var messageOk = true;
    if (document.getElementById('message').value === "")
    {
        document.getElementById('message').style.border = "solid 2px red";
        messageOk = false;
    }
    else{
        document.getElementById('message').style.border = "1px solid #ccc";

    }


    //Verify email
    var emailOk = true;
    var email = document.getElementById('email').value;

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat))
    {
        document.getElementById('email').style.border = "1px solid #ccc";

    }
    else {
        document.getElementById('email').style.border = "solid 2px red";
        emailOk=false;
    }

    //send if everything is ok
    if (emailOk && messageOk && nameOk)
    {
        document.getElementById("alert").style.display="none";
        document.getElementById("contactForm").submit();
        return;
    }
    document.getElementById("alert").style.display="block";
}


