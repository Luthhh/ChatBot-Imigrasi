<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat ImmiBot</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f8ff;
            /* AliceBlue for a light blue background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .chat-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 15px;
            /* Softer corners */
            box-shadow: 0 5px 20px rgba(0, 86, 179, 0.15);
            /* Softer, blue-tinted shadow */
            display: flex;
            flex-direction: column;
            height: calc(100vh - 100px);
            overflow: hidden;
            /* To contain the border-radius */
        }

        .chat-header {
            background: linear-gradient(to right, #1e90ff, #0d6efd);
            /* DodgerBlue to Primary Blue gradient */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .chat-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .chat-box {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .chat-message {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .chat-message .message-content {
            padding: 12px 18px;
            border-radius: 18px;
            max-width: 75%;
            line-height: 1.5;
        }

        .user-message .message-content {
            background-color: #0d6efd;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 3px;
            /* Sharper corner for speech bubble effect */
        }

        .bot-message .message-content {
            background-color: #e9f5ff;
            /* Light blue for bot messages */
            color: #333;
            align-self: flex-start;
            border: 1px solid #d1e7fd;
            border-bottom-left-radius: 3px;
            /* Sharper corner for speech bubble effect */
        }

        .chat-input {
            padding: 15px;
            border-top: 1px solid #e0e0e0;
            background-color: #f8f9fa;
        }

        #message-input:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Custom Scrollbar for a more integrated look */
        .chat-box::-webkit-scrollbar {
            width: 8px;
        }

        .chat-box::-webkit-scrollbar-track {
            background: #f8f9fa;
        }

        .chat-box::-webkit-scrollbar-thumb {
            background-color: #cce5ff;
            border-radius: 10px;
            border: 2px solid #f8f9fa;
        }

        .chat-box::-webkit-scrollbar-thumb:hover {
            background-color: #b3d7ff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.png') }}" alt="ImmiBot Logo" height="40">
                ImmiBot
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                </ul>
                <div class="d-flex ms-lg-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Tambahkan margin-top agar konten tidak ketiban navbar -->
    <div class="container mt-5 pt-4">
        <div class="chat-container">
            <div class="chat-header mb-3">
                <h4>ImmiBot 🤖</h4>
            </div>
            <div class="chat-box" id="chat-box">
                <div class="chat-message bot-message">
                    <div class="message-content">
                        Halo! Ada yang bisa dibantu terkait Imigrasi?
                    </div>
                </div>

                <!-- FAQ Suggestion -->
                <div id="faq-suggestions" class="my-3">
                    <div class="d-grid gap-2 col-10 mx-auto">
                        <button type="button" class="btn btn-outline-primary faq-btn">Apa saja jenis-jenis
                            visa?</button>
                        <button type="button" class="btn btn-outline-primary faq-btn">Bagaimana cara membuat
                            paspor?</button>
                        <button type="button" class="btn btn-outline-primary faq-btn">Berapa lama proses perpanjangan
                            KITAS?</button>
                        <button type="button" class="btn btn-outline-primary faq-btn">Chat dengan CS</button>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="chat-input mt-3">
                <form id="chat-form">
                    <div class="input-group">
                        <input type="text" id="message-input" class="form-control"
                            placeholder="Ketik pertanyaan Anda...">
                        <button type="button" class="btn btn-secondary" id="voice-btn">🎤</button>
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const chatForm = document.getElementById('chat-form');
        const input = document.getElementById('message-input');
        const chatBox = document.getElementById('chat-box');
        const faqContainer = document.getElementById('faq-suggestions');

        // Fungsi untuk menghapus tombol FAQ
        function removeFaqButtons() {
            if (faqContainer && faqContainer.parentNode) {
                faqContainer.remove();
            }
        }

        // Event listener untuk tombol FAQ
        if (faqContainer) {
            faqContainer.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('faq-btn')) {
                    const question = e.target.innerText;
                    input.value = question;
                    // Memicu submit form secara manual
                    chatForm.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
                }
            });
        }

        // Kirim pesan saat form dikirim
        chatForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const userMessage = input.value.trim();
            if (!userMessage) return;

            // Hapus tombol FAQ jika ada
            removeFaqButtons();

            // Tampilkan pesan pengguna
            appendMessage(userMessage, 'user-message');
            input.value = '';

            // Tampilkan indikator mengetik
            const typingIndicator = appendMessage('<i>ImmiBot sedang mengetik...</i>', 'bot-message', 'typing-indicator');

            try {
                const response = await fetch('{{ route('chat.ask') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: userMessage })
                });

                const data = await response.json();

                // Hapus indikator mengetik
                typingIndicator.remove();

                // Format hasil dari AI
                const formatted = (data.response || data.error)
                    .replace(/\n/g, '<br>')
                    .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                    .replace(/\*(.*?)\*/g, '<em>$1</em>');

                appendMessage(formatted, 'bot-message');

            } catch (err) {
                console.error('Error:', err);
                // Hapus indikator mengetik
                typingIndicator.remove();
                appendMessage('Terjadi kesalahan. Silakan coba lagi.', 'bot-message', null, true);
            }
        });

        // Fungsi untuk menambahkan pesan ke chat box
        function appendMessage(content, type, id = null, isError = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${type}`;
            if (id) {
                messageDiv.id = id;
            }

            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            if (isError) {
                contentDiv.classList.add('text-danger');
            }
            contentDiv.innerHTML = content;

            messageDiv.appendChild(contentDiv);
            chatBox.appendChild(messageDiv);

            // Auto-scroll ke bawah
            chatBox.scrollTop = chatBox.scrollHeight;
            return messageDiv;
        }

        // === Speech-to-Text ===
        const voiceBtn = document.getElementById('voice-btn');
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (SpeechRecognition) {
            const recognition = new SpeechRecognition();
            recognition.lang = 'id-ID';
            recognition.continuous = false;

            voiceBtn.addEventListener('click', () => {
                recognition.start();
                voiceBtn.innerText = '🎙️...';
            });

            recognition.onresult = function (event) {
                const transcript = event.results[0][0].transcript;
                input.value = transcript;
                voiceBtn.innerText = '🎤';
            };

            recognition.onerror = function (event) {
                console.error('Speech recognition error:', event.error);
                voiceBtn.innerText = '🎤';
            };

            recognition.onend = function () {
                voiceBtn.innerText = '🎤';
            };
        } else {
            voiceBtn.disabled = true;
            voiceBtn.title = "Browser tidak mendukung speech recognition";
        }
    </script>
</body>

</html>