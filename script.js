function sendMessage()
{
    let name = document.querySelector('#name').value;
    let email = document.querySelector('#email').value;
    let message = document.querySelector('#message').value;

    if (name === '' || email === '' || message === '')
    {
        document.querySelector('.alert').style.display = 'block';
        return;
    }

    fetch('save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body:
            'name=' + encodeURIComponent(name) +
            '&email=' + encodeURIComponent(email) +
            '&message=' + encodeURIComponent(message)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);

        document.querySelector('#name').value = '';
        document.querySelector('#email').value = '';
        document.querySelector('#message').value = '';
    });
}

function hidde()
{
    document.querySelector('.alert').style.display = 'none';
}