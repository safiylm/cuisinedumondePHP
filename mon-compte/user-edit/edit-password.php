<div class="container-donnees-personnelles">
            <h2>Modifier son mot de passe </h2>
            <form action="donnees-personnelles/post-edit-password.php" method="post">

            
                <label>Entrez votre mot de passe actuel :</label>
                <div class="password-input-btn">
                <input type="password" name="ancien-password" id="ancien-password" class="form-control" />
                <button type="button" onclick="toggleseepwd('ancien-password')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg></button>
                </div>
                <label>Entrez votre nouveau mot de passe :</label>
                <div class="password-input-btn">
                    <input type="password" name="new1-password" id="new1-password" class="form-control" oninput="checkpassword(value, true)" />
                    <button type="button" onclick="toggleseepwd('new1-password')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                        </svg>
                    </button>
                </div>
                <div id="info-pwd"></div>

                <label>Confirmez votre nouveau mot de passe :</label>
                <div class="password-input-btn">
                    <input type="password" name="new2-password" id="new2-password" class="form-control" oninput="checkpassword2(value)" />
                    <button type="button" onclick="toggleseepwd('new2-password')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                        </svg>
                    </button>
                </div>
                <div id="info-pwd-confirm"></div>
                <button type="submit" id="btn-submit-edit-password" class="btn btn-primary">Modifier votre mot de passe</button>
            </form>


        </div>


        <script>

            
    function toggleseepwd(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

    }


    document.getElementById("btn-submit-edit-password").disabled = true
    pwdvalid = false
    pwd2valid = false


    function checkpassword(pwd, pwdconfirmexiste = false) {

        if (pwd.length < 8) {
            document.getElementById('info-pwd').innerHTML = "Votre mot de passe doit contenir <li>Une majuscule</li> <li>Une minuscule</li> " +
                "<li>Un chiffre</li> <li>Un caractère spécial</li>  <li>Minimum 8 caractères</li> <br /> "
        } else {
            if (pwd.match(/[A-Z]/, 'g')) {
                maj = ' : <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> \n';

                if (pwd.match(/[a-z]/, 'g')) {
                    min = ' : <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> \n';

                    if (pwd.match(/[0-9]/, 'g')) {
                        nb = ' : <svg xmlns="http://www.w3.org/2000/svg" color="green"  width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> \n';

                        if (pwd.match(/[$|*|-|_|&|@|+]/, 'g')) {
                            spec = '  : <svg xmlns="http://www.w3.org/2000/svg" color="green"  width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> \n';

                            document.getElementById('info-pwd').innerHTML = " <li>Une majuscule " + maj + " </li> <li>Une minuscule" + min + "</li> " +
                                "<li>Un chiffre " + nb + "</li> <li>Un caractère spécial " + spec + '</li>  <li>Minimum 8 caractères  <svg xmlns="http://www.w3.org/2000/svg" color="green" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg></li> <br /> '

                            pwdvalid = true
                            console.log("my password is valid?" + pwdvalid)
                        } else {
                            spec = 'Ne contient pas de caractère spéciale\n'
                        }

                    } else {
                        nb = 'Ne contient pas de nombre\n'
                    }
                } else {
                    min = 'Ne contient pas de minuscule\n'
                }
            } else {
                maj = 'Ne contient pas de majuscule \n'
            }
        }
        if (pwdvalid == true && pwd2valid == true && pwdconfirmexiste == true) {
            document.getElementById("btn-submit-edit-password").disabled = false;
        }
        if (pwdvalid == true && pwdconfirmexiste == false) {
            document.getElementById("btn-submit-edit-password").disabled = false;
        }
    }


    function checkpassword2(pwd) {

        if (document.getElementById("new2-password").value == document.getElementById("new1-password").value && document.getElementById("new1-password").value.length > 7) {
            document.getElementById("info-pwd-confirm").innerHTML = '\nLes nouveaux mots de passe sont identiques <svg xmlns="http://www.w3.org/2000/svg" color="green"  width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg> \n';

            pwd2valid = true
        } else {
            document.getElementById("info-pwd-confirm").innerHTML = '\nLes nouveaux mot de passes ne sont pas identiques ou ils ne contiennent pas tout ce qu\'il faut! <svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/> </svg>'
        }
        if (pwdvalid == true && pwd2valid == true) {
            document.getElementById("btn-submit-edit-password").disabled = false;
        }
    }

        </script>




<style>
    .container-donnees-personnelles {
        padding: 30px;
        box-sizing: border-box;
        border-radius: 5%;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        max-width: 600px;
        margin-bottom: 70px;

        h2 {
            margin-bottom: 20px;
            color: darkslategrey;
        }

        button,
        input {
            width: 100%;
            outline: none !important;
        }

        .password-input-btn{
            display: flex;

            input{
                width: 90%;
                border-radius: 10px  0 0 10px;

            }
            button{
                width: 10%;
                border: none;
                background-color: #0d6efd;
                color: white;
                border-radius: 0 10px 10px 0  ;
            }
        }   
    
        button[type="submit"]{
            margin: 20px 0;
        }
    }



    @media screen and (max-device-width: 900px) {
        .container-donnees-personnelles {
            width: 100vw;

            button,
            input {
                width: 100%;
            }
        }
    }
</style>