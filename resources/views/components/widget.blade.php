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
    border:none;
    border-radius:50%;
    background:#2563eb;
    color:#fff;
    font-size:26px;
    cursor:pointer;
    z-index:9999;
}

#chat-box{
    position:fixed;
    right:20px;
    bottom:95px;
    width:360px;
    background:white;
    border-radius:12px;
    box-shadow:0 0 20px rgba(0,0,0,.15);
    overflow:hidden;
    z-index:9999;
}

.chat-header{
    background:#2563eb;
    color:white;
    padding:15px;
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
    outline:none;
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

    const sendBtn =
        document.getElementById('send-message');

    const input =
        document.getElementById('chat-input');

    const messages =
        document.getElementById('chat-messages');

    // Toggle widget
    if (toggleBtn) {
        toggleBtn.addEventListener(
            'click',
            function () {

                chatBox.style.display =
                    chatBox.style.display === 'none'
                        ? 'block'
                        : 'none';
            }
        );
    }

    // Send button
    if (sendBtn) {
        sendBtn.addEventListener(
            'click',
            sendMessage
        );
    }

    // Enter key send
    if (input) {
        input.addEventListener(
            'keypress',
            function (e) {

                if (e.key === 'Enter') {
                    e.preventDefault();
                    sendMessage();
                }
            }
        );
    }

    async function sendMessage()
    {
        const text = input.value.trim();

        if (!text) return;

        // User message
        messages.innerHTML += `
            <div style="
                text-align:right;
                margin-bottom:10px;
            ">
                <span style="
                    background:#2563eb;
                    color:white;
                    padding:10px 14px;
                    border-radius:12px;
                    display:inline-block;
                    max-width:80%;
                    word-break:break-word;
                ">
                    ${escapeHtml(text)}
                </span>
            </div>
        `;

        input.value = '';

        // Scroll
        messages.scrollTop =
            messages.scrollHeight;

        // Disable while sending
        sendBtn.disabled = true;
        sendBtn.innerText = 'Sending...';

        // Typing indicator
        const typingId =
            'typing-' + Date.now();

        messages.innerHTML += `
            <div
                id="${typingId}"
                class="bot-message"
            >
                Typing...
            </div>
        `;

        messages.scrollTop =
            messages.scrollHeight;

        try {

            const response =
                await fetch(
                    '/ai-chat/send-message',
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type':
                                'application/json',
                            'Accept':
                                'application/json',
                            'X-CSRF-TOKEN':
                                '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: text
                        })
                    }
                );

            const raw =
                await response.text();

            let data;

            try {
                data = JSON.parse(raw);
            } catch {

                data = {
                    success: false,
                    error:
                        'Invalid server response'
                };

                console.error(raw);
            }

            // Remove typing
            document
                .getElementById(typingId)
                ?.remove();

            if (data.success) {

                messages.innerHTML += `
                    <div class="bot-message">
                        ${escapeHtml(
                            data.reply
                        )}
                    </div>
                `;

            } else {

                messages.innerHTML += `
                    <div class="bot-message"
                        style="
                            background:#fee2e2;
                            color:#dc2626;
                        "
                    >
                        ${
                            data.error
                            ?? data.message
                            ?? 'Something went wrong'
                        }
                    </div>
                `;
            }

        } catch (error) {

            document
                .getElementById(typingId)
                ?.remove();

            messages.innerHTML += `
                <div class="bot-message"
                    style="
                        background:#fee2e2;
                        color:#dc2626;
                    "
                >
                    Failed to connect
                    to server.
                </div>
            `;

            console.error(error);

        } finally {

            sendBtn.disabled = false;
            sendBtn.innerText = 'Send';

            messages.scrollTop =
                messages.scrollHeight;
        }
    }

    // Prevent HTML injection
    function escapeHtml(text)
    {
        const div =
            document.createElement('div');

        div.innerText = text;

        return div.innerHTML;
    }

});
</script>