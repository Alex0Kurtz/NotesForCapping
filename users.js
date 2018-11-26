$(document).ready(()=> {
 
    $('#updatePasswordButton').on('click', (e) => {
        e.preventDefault();
        resetMessages('#updateEmailButton');
        let data = getFormData($("form"));
        let oldPassword, newPassword, verifyPassword;
        [oldPassword, newPassword, verifyPassword] = [$('#old_password').val(), $('#new_password').val(), $('#verify_newpassword').val()];
       
        // TODO: move to a validate function and return 1 flag along with email verify
        if(!oldPassword || !newPassword || !verifyPassword) {
            updateError(null,'Incomplete form!', '#updatePasswordMessage');
            return
        }
 
        if (newPassword === verifyPassword) {
            fetch('/change-password', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                   userPassword: verifyPassword
                })
            }).then(res => res.json(), 
            res.redirect('/logout'))
            .catch(err => updateError(err, 'Password Update Failed'));
        } else if(newPassword != verifyPassword){
            updateError(null, 'passwords Do not Match!', '#updatePasswordMessage');
        } else {
            updateError(null, 'Invalid Password!', '#updatePasswordMessage');
        }
    });
 });
 
 
 function updateError(err, msg, el) {
    $(el).html(msg);
    $(el).addClass('alert alert-danger');
    console.log(err);
 }
 
 function updateSuccess(msg, el) {
    $(el).text(msg);
    // TODO: clear inputs
    $(el).removeClass('alert alert-danger')
    $(el).addClass('alert alert-success');
 }
 
 function resetMessages(el) {
    $(el).text();
    $(el).removeClass('alert alert-success alert-danger');
 }

 function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}
