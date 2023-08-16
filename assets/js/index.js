function validate_password() {
 
    var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('c_password').value;
    if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML
          = '☒ Use same password';
          document.getElementById('btn').disabled = true;
          document.getElementById('btn').style.opacity = (0.4);
        
    } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML =
            '🗹 Password Matched';
        document.getElementById('btn').disabled = false;
        document.getElementById('btn').style.opacity = (1);
    }
}

