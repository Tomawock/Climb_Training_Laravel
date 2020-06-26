function checkAuthor(button)
{
    //alert(button.form.firstName.value + " " + button.form.lastName.value);
    firstName = (button.form.firstName.value).trim();
    firstName_msg = document.getElementById("invalid-firstName");
    firstName_msg.innerHTML = "";


    lastName = (button.form.lastName.value).trim();
    lastName_msg = document.getElementById("invalid-lastName");
    lastName_msg.innerHTML = "";


    var regularExpression = new RegExp("^([a-zA-Z]+)$", "g");
    var error = false;

    if (firstName === "")
    {
        firstName_msg.innerHTML = "The firstName field must not be empty";
        button.form.firstName.focus();
        error = true;
    } else if (!firstName.match(regularExpression))
    {
        firstName_msg.innerHTML = "The firstName must only contains letters, no digits or special characters";
        button.form.firstName.focus();
        error = true;
    } else if (lastName === "")
    {
        lastName_msg.innerHTML = "The lastName field must not be empty";
        button.form.lastName.focus();
        error = true;
    } else if (!lastName.match(regularExpression))
    {
        lastName_msg.innerHTML = "The lastName must only contains letters, no digits or special characters";
        button.form.lastName.focus();
        error = true;
    }

    if (!error)
    {
        if (button.value === "Create")
        {
            $.ajax({

                type: 'GET',

                url: '/ajax',

                data: {firstName: firstName, lastName: lastName},

                success: function (data) {

                    if (data.found)
                    {
                        error = true;
                        alert("Author already exists in the database");
                    } else {
                        button.form.submit();
                    }
                }

            });
        } else {
            button.form.submit();
        }
    }
}

function checkBook(button)
{
    title = (button.form.title.value).trim();
    title_msg = document.getElementById("invalid-title");
    title_msg.innerHTML = "";
    var error = false;

    if (title === "")
    {
        title_msg.innerHTML = "The title field must not be empty";
        button.form.title.focus();
        error = true;
    }

    if (!error)
    {
        if (button.value === "Create")
        {
            $.ajax({

                type: 'GET',

                url: '/ajaxBook',

                data: {title: title},

                success: function (data) {

                    if (data.found)
                    {
                        error = true;
                        alert("Book title already exists in the database");
                    } else {
                        button.form.submit();
                    }
                }

            });
        } else {
            button.form.submit();
        }
    }
}

function download() {

    var pdf = new jsPDF('l', 'pt', 'a4');


    var title = document.getElementById("title").innerHTML.trim();

    console.log();

    pdf.autoTable({html: '#toDowload'})
    pdf.save('table.pdf')
}