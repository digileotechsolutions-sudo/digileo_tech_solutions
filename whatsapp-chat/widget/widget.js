(function() {
  'use strict';

  let convId = null;
  let agentStatus = 'online';
  let aiEnabled = true;
  let welcomeMsg = '';
  let offlineMsg = '';
  let whatsappNum = '254705359471';

  var scriptTag = document.currentScript || document.querySelector('script[src*="widget.js"]');
  var scriptPath = '';
  if (scriptTag) {
    scriptPath = scriptTag.src.substring(0, scriptTag.src.lastIndexOf('/'));
    scriptPath = scriptPath.substring(0, scriptPath.lastIndexOf('/'));
  }
  var API = (scriptPath || '/digileo_tech_solutions') + '/whatsapp-chat/api/chat.php';

  const btnHTML = `
    <button class="digileo-chat-btn" id="digileoChatBtn">
      <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-1.096-1.007-1.838-2.247-2.054-2.627-.217-.38-.023-.586.163-.771.168-.168.373-.425.56-.638.187-.213.249-.356.373-.597.124-.241.062-.451-.031-.627-.093-.175-.66-1.594-.906-2.183-.24-.589-.484-.497-.66-.497-.203-.006-.349-.008-.527.008-.177.016-.478.073-.73.332-.227.223-1.155 1.13-1.155 2.756 0 1.625 1.183 3.194 1.348 3.415.165.221 2.328 3.556 5.644 4.987.33.143.588.228.79.293.398.127.76.109 1.046.066.322-.049 1.005-.412 1.147-.81.142-.398.158-.738.111-.826-.047-.088-.173-.133-.347-.232z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.88.544 3.632 1.482 5.12L2 22l4.88-1.482C8.368 21.456 10.12 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
      <span class="badge" id="digileoBadge"></span>
    </button>`;

  const panelHTML = `
    <div class="digileo-chat-panel" id="digileoPanel">
      <div class="digileo-chat-header">
        <div class="avatar">💬</div>
        <div class="info">
          <h4 id="digileoBizName">Digileo Tech Solutions</h4>
          <div class="status"><span class="dot online" id="digileoStatusDot"></span><span id="digileoStatusText">Online</span></div>
        </div>
        <button class="close-btn" id="digileoCloseBtn">&times;</button>
      </div>
      <div class="digileo-chat-lead" id="digileoLead">
        <input type="text" id="digileoLeadName" placeholder="Your name" autocomplete="name">
        <input type="email" id="digileoLeadEmail" placeholder="Your email" autocomplete="email">
        <input type="tel" id="digileoLeadPhone" placeholder="Your phone number" autocomplete="tel">
        <textarea id="digileoLeadInquiry" placeholder="What are you looking for? (optional)" rows="1"></textarea>
        <span class="lead-hint">Please fill in your details so we can assist you better.</span>
      </div>
      <div class="digileo-chat-messages" id="digileoMessages"></div>
      <div class="digileo-chat-suggestions" id="digileoSuggestions"></div>
      <div class="digileo-chat-input">
        <button class="attach-btn" id="digileoAttachBtn" title="Attach file">📎</button>
        <textarea id="digileoMsgInput" placeholder="Type a message..." rows="1"></textarea>
        <button class="send-btn" id="digileoSendBtn">
          <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
        </button>
      </div>
      <div class="digileo-chat-powered">Powered by Digileo Chat</div>
    </div>`;

  const container = document.createElement('div');
  container.className = 'digileo-chat';
  container.id = 'digileoChat';
  container.innerHTML = btnHTML + panelHTML;
  document.body.appendChild(container);

  const btn = document.getElementById('digileoChatBtn');
  const panel = document.getElementById('digileoPanel');
  const closeBtn = document.getElementById('digileoCloseBtn');
  const messagesEl = document.getElementById('digileoMessages');
  const input = document.getElementById('digileoMsgInput');
  const sendBtn = document.getElementById('digileoSendBtn');
  const attachBtn = document.getElementById('digileoAttachBtn');
  const leadEl = document.getElementById('digileoLead');
  const leadName = document.getElementById('digileoLeadName');
  const leadEmail = document.getElementById('digileoLeadEmail');
  const leadPhone = document.getElementById('digileoLeadPhone');
  const leadInquiry = document.getElementById('digileoLeadInquiry');
  const suggestionsEl = document.getElementById('digileoSuggestions');
  const badge = document.getElementById('digileoBadge');
  const statusDot = document.getElementById('digileoStatusDot');
  const statusText = document.getElementById('digileoStatusText');

  function loadStatus() {
    fetch(API + '?action=status')
      .then(r => r.json())
      .then(d => {
        agentStatus = d.agent_status || 'offline';
        aiEnabled = d.ai_enabled !== false;
        const biz = document.getElementById('digileoBizName');
        if (biz && d.business_name) biz.textContent = d.business_name;
        welcomeMsg = d.welcome_message || 'Hello 👋 Welcome!';
        offlineMsg = d.offline_message || 'We are currently away.';
        if (d.whatsapp_number) whatsappNum = d.whatsapp_number;
        updateStatusUI();
      })
      .catch(() => {});
  }

  function updateStatusUI() {
    statusDot.className = 'dot ' + agentStatus;
    const labels = { online: 'Online', offline: 'Offline', away: 'Away' };
    statusText.textContent = labels[agentStatus] || 'Offline';
  }

  function addMessage(text, type, time) {
    const div = document.createElement('div');
    div.className = 'msg ' + type;
    div.textContent = text;
    if (time) {
      const t = document.createElement('div');
      t.className = 'time';
      t.textContent = time;
      div.appendChild(t);
    }
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function addTyping() {
    const div = document.createElement('div');
    div.className = 'msg ai';
    div.id = 'digileoTyping';
    div.innerHTML = '<div class="typing-dots"><span></span><span></span><span></span></div>';
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function removeTyping() {
    const el = document.getElementById('digileoTyping');
    if (el) el.remove();
  }

  function addImage(url) {
    const div = document.createElement('div');
    div.className = 'msg visitor';
    div.innerHTML = '<img src="' + url + '" alt="Image">';
    messagesEl.appendChild(div);
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function showSuggestions(faqs) {
    suggestionsEl.innerHTML = '';
    if (!faqs || !faqs.length) return;
    const shown = faqs.slice(0, 4);
    shown.forEach(f => {
      const chip = document.createElement('span');
      chip.className = 'chip';
      chip.textContent = f.question.length > 40 ? f.question.slice(0, 40) + '...' : f.question;
      chip.addEventListener('click', () => sendMessage(f.question));
      suggestionsEl.appendChild(chip);
    });
  }

  function sendMessage(text) {
    if (!text || !text.trim()) return;
    input.value = '';
    suggestionsEl.innerHTML = '';
    addMessage(text, 'visitor', new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));

    const leadData = {};
    if (leadName.value) leadData.name = leadName.value;
    if (leadEmail.value) leadData.email = leadEmail.value;
    if (leadPhone.value) leadData.phone = leadPhone.value;
    if (leadInquiry.value) leadData.inquiry = leadInquiry.value;

    addTyping();

    fetch(API + '?action=send', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(Object.assign({
        message: text.trim(),
        conversation_id: convId,
      }, leadData)),
    })
    .then(r => r.json())
    .then(d => {
      removeTyping();
      if (d.conversation_id) {
        convId = d.conversation_id;
        leadEl.style.display = 'none';
      }
      if (d.ai_reply) {
        setTimeout(() => addMessage(d.ai_reply, 'ai', new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })), 500);
      } else if (d.messages) {
        d.messages.forEach(m => {
          if (m.sender_type === 'ai' || m.sender_type === 'agent') {
            addMessage(m.message, m.sender_type, new Date(m.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));
          }
        });
      }
    })
    .catch(() => { removeTyping(); addMessage('Sorry, something went wrong. Please try again.', 'system'); });
  }

  function openPanel() {
    panel.classList.add('open');
    badge.classList.remove('show');

    if (!convId) {
      loadStatus();
      addMessage(welcomeMsg, 'ai', new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));

      fetch(API + '?action=faqs')
        .then(r => r.json())
        .then(d => { if (d.faqs) showSuggestions(d.faqs); })
        .catch(() => {});
    } else {
      fetch(API + '?action=history&conversation_id=' + convId)
        .then(r => r.json())
        .then(d => {
          if (d.messages) {
            messagesEl.innerHTML = '';
            d.messages.forEach(m => {
              if (m.sender_type === 'visitor') addMessage(m.message, 'visitor', new Date(m.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));
              else if (m.sender_type === 'ai' || m.sender_type === 'agent') addMessage(m.message, m.sender_type, new Date(m.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));
            });
          }
        })
        .catch(() => {});
    }
  }

  btn.addEventListener('click', () => {
    if (panel.classList.contains('open')) {
      panel.classList.remove('open');
    } else {
      openPanel();
    }
  });

  closeBtn.addEventListener('click', () => panel.classList.remove('open'));

  sendBtn.addEventListener('click', () => sendMessage(input.value));

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(input.value); }
  });

  input.addEventListener('input', () => {
    input.style.height = 'auto';
    input.style.height = Math.min(input.scrollHeight, 100) + 'px';
  });

  attachBtn.addEventListener('click', () => {
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*,.pdf,.doc,.docx';
    fileInput.onchange = function() {
      const file = this.files[0];
      if (!file) return;
      const formData = new FormData();
      formData.append('file', file);
      if (convId) formData.append('conversation_id', convId);
      fetch(API + '?action=upload', { method: 'POST', body: formData })
        .then(r => r.json())
        .then(d => {
          if (d.file_url) {
            if (d.type === 'image') addImage(d.file_url);
            else addMessage('📎 File uploaded', 'visitor');
          }
        })
        .catch(() => {});
    };
    fileInput.click();
  });

  leadName.addEventListener('blur', saveLead);
  leadEmail.addEventListener('blur', saveLead);
  leadPhone.addEventListener('blur', saveLead);
  leadInquiry.addEventListener('blur', saveLead);

  function saveLead() {
    if (!convId) return;
    fetch(API + '?action=lead', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        conversation_id: convId,
        name: leadName.value,
        email: leadEmail.value,
        phone: leadPhone.value,
        inquiry: leadInquiry.value,
      }),
    }).catch(() => {});
  }

  loadStatus();
})();
