function ValidateForm()
{
    var nameOk = true;
    //Verify empty name
    if (document.getElementById('name').value === "")
    {
        document.getElementById('name').classList.add('inputError');
        nameOk = false;

    }
    else{
        document.getElementById('name').classList.remove('inputError');
    }


    //verify empty message
    var messageOk = true;
    if (document.getElementById('message').value === "")
    {
        document.getElementById('message').classList.add('inputError');
        messageOk = false;
    }
    else{
        document.getElementById('message').classList.remove('inputError');

    }


    //Verify email
    var emailOk = true;
    var email = document.getElementById('email').value;

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat))
    {
        document.getElementById('email').classList.remove('inputError');

    }
    else {
        document.getElementById('email').classList.add('inputError');
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


