<div id="ai-chat-widget">

    <button id="chat-toggle">
        💬
    </button>

    <div id="chat-box" style="display:none;">

        <div class="chat-header">
            AI Assistant
        </div>

        <div id="chat-messages">
            <div class="bot-message">
                {{ $settings->welcome_message ?? 'Hi 👋 How can I help?' }}
            </div>
        </div>

        <div class="chat-footer">
            <input
                type="text"
                id="chat-input"
                placeholder="Type message..."
            >

            <button id="send-message">
                Send
            </button>
        </div>

    </div>

</div>

<style>
#chat-toggle{
    position:fixed;
    bottom:20px;
    right:20px;
    width:65px;
    height:65px;
    border-radius:50%;
    border:none;
    cursor:pointer;
    font-size:26px;
    background:#2563eb;
    color:#fff;
    z-index:9999;
}

#chat-box{
    position:fixed;
    bottom:95px;
    right:20px;
    width:360px;
    background:#fff;
    border-radius:12px;
    box-shadow:0 0 20px rgba(0,0,0,.15);
    overflow:hidden;
    z-index:9999;
}

.chat-header{
    background:#2563eb;
    color:white;
    padding:16px;
    font-weight:bold;
}

#chat-messages{
    height:350px;
    overflow-y:auto;
    padding:15px;
}

.bot-message{
    background:#f3f4f6;
    padding:10px;
    border-radius:10px;
    margin-bottom:10px;
}

.chat-footer{
    display:flex;
    border-top:1px solid #ddd;
}

#chat-input{
    flex:1;
    border:none;
    padding:15px;
}

#send-message{
    border:none;
    background:#2563eb;
    color:white;
    padding:15px;
    cursor:pointer;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn =
        document.getElementById('chat-toggle');

    const chatBox =
        document.getElementById('chat-box');

    toggleBtn.addEventListener('click', () => {

        chatBox.style.display =
            chatBox.style.display === 'none'
                ? 'block'
                : 'none';

    });

});
</script>