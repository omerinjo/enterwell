$(document).ready(function () {

    $(".form-control").focusin(function () {
        $(this).parent().addClass("label-animate");
    });
    // $(".form-control").focusout(function () {
    //     $(this).parent().removeClass("label-animate");
    // });

    $(window).click(function () {
        if (!$(event.target).is('.form-control')) {
            $(".form-control").each(function () {
                if ($(this).val() == '') {
                    $(this).parent().removeClass("label-animate");
                }
            });
        }
    });
});


(function () {
    // FORM SUBMIT
    var submitBtn = document.querySelector('#submit-btn')
    if (submitBtn) {
        submitBtn.addEventListener('click', () => {
            var formData = {}
            var inputs = document.querySelectorAll('.form-input-field')

            inputs.forEach(element => {
                let key = document.getElementById(element.id).value
                if (!key) {
                    document.querySelector(`label[for=${element.id}]`).className = "require"
                    document.getElementById(element.id).focus();
                    return
                }
                formData[element.id] = key
            });

            if (Object.values(formData).length > 9) {
                var xhttp = new XMLHttpRequest();
                var url = window.location.href + "/wp-json/enterwell/v1/game";
                xhttp.open('POST', url, true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.onload = () => {
                    console.log(xhttp)
                    if (xhttp.response == 1 && xhttp.status == 200) {
                        document.querySelector(".overlay").classList.toggle("show")
                    } else if (xhttp.response == 0) {
                        document.querySelector(".overlay-error").classList.toggle("show")

                    }

                    if (this.readyState == 4 && this.status == 200) {
                        console.log("result 200")
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                };
                var res = xhttp.send(JSON.stringify(formData));
                console.log("resss", res)
            }
        })
    }

    // FORM MODAL HIDE
    var btnMolads = document.querySelectorAll(".button-modal")
    btnMolads.forEach(element => {
        element.addEventListener('click', (e) => {
            console.log("eee", e.target.id)
            document.querySelector(`.${e.target.id}`).classList.toggle("show")

        })
    })


})()