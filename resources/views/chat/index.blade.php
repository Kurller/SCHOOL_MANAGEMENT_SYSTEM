<!DOCTYPE html>
<html>
<head>
    <title>School AI Chat</title>
</head>

<body>

<h1>School AI Assistant</h1>

<input id="message" placeholder="Ask something...">

<button onclick="sendMessage()">
Send
</button>

<p id="reply"></p>


<script>

async function sendMessage(){

    let message = document.getElementById('message').value;


    let response = await fetch('/chat', {

        method:'POST',

        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },

        body:JSON.stringify({
            message:message
        })

    });


    let data = await response.json();

let replyBox = document.getElementById('reply');

if(data.success){
    replyBox.innerHTML = data.reply;
}
else{
    replyBox.innerHTML = data.error.error.message;
}
}

</script>


</body>
</html>