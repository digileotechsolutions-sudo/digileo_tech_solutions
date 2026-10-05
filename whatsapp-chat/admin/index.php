<?php
require_once __DIR__ . '/../db.php';
requireAuth();
$page = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Admin - <?= ucfirst($page) ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', 'Segoe UI', sans-serif; background: #f0f2f5; display: flex; min-height: 100vh; }
    .sidebar { width: 240px; background: #075E54; color: #fff; flex-shrink: 0; display: flex; flex-direction: column; }
    .sidebar .brand { padding: 20px; font-size: 18px; font-weight: 700; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar .brand i { font-size: 24px; }
    .sidebar nav { flex: 1; padding: 12px; }
    .sidebar nav a { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: 500; transition: all 0.2s; margin-bottom: 2px; }
    .sidebar nav a:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .sidebar nav a.active { background: rgba(255,255,255,0.15); color: #fff; font-weight: 600; }
    .sidebar .user { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 13px; }
    .sidebar .user .name { font-weight: 600; }
    .sidebar .user a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 12px; }
    .sidebar .user a:hover { color: #fff; }
    .main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
    .topbar { background: #fff; padding: 16px 24px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e0e0e0; }
    .topbar h2 { font-size: 20px; font-weight: 700; color: #1a1a1a; }
    .topbar .actions { display: flex; align-items: center; gap: 16px; }
    .topbar .actions .notif { position: relative; cursor: pointer; }
    .topbar .actions .notif .count { position: absolute; top: -6px; right: -6px; background: #D32F2F; color: #fff; font-size: 10px; min-width: 18px; height: 18px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-weight: 700; display: none; }
    .topbar .actions .notif .count.show { display: flex; }
    .topbar .status-select { padding: 6px 12px; border: 1px solid #e0e0e0; border-radius: 6px; font-size: 13px; outline: none; cursor: pointer; }
    .content { flex: 1; padding: 24px; overflow-y: auto; }
    .card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.04); margin-bottom: 20px; }
    .card h3 { font-size: 16px; font-weight: 600; color: #1a1a1a; margin-bottom: 16px; }
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 24px; }
    .stat-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.04); }
    .stat-card .stat-icon { font-size: 28px; margin-bottom: 8px; }
    .stat-card .stat-value { font-size: 28px; font-weight: 800; color: #1a1a1a; }
    .stat-card .stat-label { font-size: 13px; color: #666; margin-top: 4px; }
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    table th { text-align: left; padding: 12px 16px; color: #666; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #f0f0f0; }
    table td { padding: 12px 16px; border-bottom: 1px solid #f5f5f5; }
    .badge { display: inline-flex; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
    .badge.active { background: #dbeafe; color: #1d4ed8; }
    .badge.waiting { background: #fef3c7; color: #d97706; }
    .badge.resolved { background: #d1fae5; color: #059669; }
    .badge.closed { background: #f3f4f6; color: #6b7280; }
    .badge.online { background: #d1fae5; color: #059669; }
    .badge.offline { background: #f3f4f6; color: #6b7280; }
    .badge.away { background: #fef3c7; color: #d97706; }
    .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; }
    .btn-primary { background: #075E54; color: #fff; }
    .btn-primary:hover { background: #128C7E; }
    .btn-danger { background: #dc2626; color: #fff; }
    .btn-danger:hover { background: #b91c1c; }
    .btn-sm { padding: 6px 12px; font-size: 12px; }
    .btn-success { background: #25D366; color: #fff; }
    .btn-success:hover { background: #1da851; }
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; align-items: center; justify-content: center; }
    .modal-overlay.open { display: flex; }
    .modal { background: #fff; border-radius: 16px; padding: 28px; width: 500px; max-width: 90vw; max-height: 80vh; overflow-y: auto; }
    .modal h3 { font-size: 18px; margin-bottom: 16px; }
    .modal label { font-size: 13px; font-weight: 600; color: #333; display: block; margin-bottom: 4px; }
    .modal input, .modal textarea, .modal select { width: 100%; padding: 10px 14px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; margin-bottom: 14px; outline: none; font-family: inherit; }
    .modal input:focus, .modal textarea:focus { border-color: #25D366; box-shadow: 0 0 0 3px rgba(37,211,102,0.1); }
    .modal textarea { min-height: 80px; resize: vertical; }
    .modal .modal-actions { display: flex; gap: 8px; justify-content: flex-end; margin-top: 8px; }
    .notif-dropdown { display: none; position: absolute; top: 100%; right: 0; width: 320px; background: #fff; border-radius: 12px; box-shadow: 0 8px 32px rgba(0,0,0,0.12); z-index: 100; max-height: 400px; overflow-y: auto; }
    .notif-dropdown.open { display: block; }
    .notif-dropdown .notif-item { padding: 12px 16px; border-bottom: 1px solid #f0f0f0; font-size: 13px; cursor: pointer; }
    .notif-dropdown .notif-item:hover { background: #f9fafb; }
    .notif-dropdown .notif-item .notif-title { font-weight: 600; color: #1a1a1a; }
    .notif-dropdown .notif-item .notif-msg { color: #666; font-size: 12px; margin-top: 2px; }
    .notif-dropdown .notif-item.unread { background: #f0fdf4; }
    .notif-dropdown .notif-empty { padding: 24px; text-align: center; color: #999; font-size: 13px; }
    .empty-state { text-align: center; padding: 40px; color: #999; }
    .empty-state i { font-size: 40px; margin-bottom: 12px; }
    .conv-preview { cursor: pointer; transition: background 0.2s; }
    .conv-preview:hover { background: #f9fafb; }
    .conv-preview td { vertical-align: top; }
    @media (max-width: 768px) { .sidebar { width: 60px; } .sidebar .brand span, .sidebar nav a span, .sidebar .user span { display: none; } .sidebar nav a { justify-content: center; padding: 12px; } .sidebar .user { text-align: center; } }
  </style>
</head>
<body>
  <aside class="sidebar">
    <div class="brand"><i class="fab fa-whatsapp"></i><span>Chat Admin</span></div>
    <nav>
      <a href="?page=dashboard" class="<?= $page === 'dashboard' ? 'active' : '' ?>"><i class="fas fa-th-large"></i><span>Dashboard</span></a>
      <a href="?page=conversations" class="<?= $page === 'conversations' ? 'active' : '' ?>"><i class="fas fa-comments"></i><span>Conversations</span></a>
      <a href="?page=faqs" class="<?= $page === 'faqs' ? 'active' : '' ?>"><i class="fas fa-question-circle"></i><span>FAQs</span></a>
      <a href="?page=agents" class="<?= $page === 'agents' ? 'active' : '' ?>"><i class="fas fa-users"></i><span>Agents</span></a>
      <a href="?page=settings" class="<?= $page === 'settings' ? 'active' : '' ?>"><i class="fas fa-cog"></i><span>Settings</span></a>
      <a href="?page=analytics" class="<?= $page === 'analytics' ? 'active' : '' ?>"><i class="fas fa-chart-bar"></i><span>Analytics</span></a>
    </nav>
    <div class="user">
      <div class="name"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['agent_name']) ?></div>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a>
    </div>
  </aside>
  <div class="main">
    <div class="topbar">
      <h2><?= ucfirst(str_replace('_', ' ', $page)) ?></h2>
      <div class="actions">
        <select class="status-select" id="agentStatus">
          <option value="online">🟢 Online</option>
          <option value="away">🟡 Away</option>
          <option value="offline">🔴 Offline</option>
        </select>
        <div class="notif" id="notifBell">
          <i class="fas fa-bell" style="font-size:18px;"></i>
          <span class="count" id="notifCount">0</span>
          <div class="notif-dropdown" id="notifDropdown"></div>
        </div>
      </div>
    </div>
    <div class="content" id="appContent"></div>
  </div>

  <div class="modal-overlay" id="modalOverlay"><div class="modal" id="modalContent"></div></div>

  <script src="../widget/widget.js"></script>
  <script>
  const API = 'api.php';
  let notifInterval;

  function loadPage() {
    const page = '<?= $page ?>';
    if (page === 'dashboard') loadDashboard();
    else if (page === 'conversations') loadConversations();
    else if (page === 'faqs') loadFAQs();
    else if (page === 'agents') loadAgents();
    else if (page === 'settings') loadSettings();
    else if (page === 'analytics') loadAnalytics();
  }

  function loadDashboard() {
    fetch(API + '?action=stats').then(r => r.json()).then(d => {
      const el = document.getElementById('appContent');
      el.innerHTML = `
        <div class="stats-grid">
          <div class="stat-card"><div class="stat-icon">💬</div><div class="stat-value">${d.total}</div><div class="stat-label">Total Conversations</div></div>
          <div class="stat-card"><div class="stat-icon">🟢</div><div class="stat-value">${d.active}</div><div class="stat-label">Active</div></div>
          <div class="stat-card"><div class="stat-icon">⏳</div><div class="stat-value">${d.waiting}</div><div class="stat-label">Waiting</div></div>
          <div class="stat-card"><div class="stat-icon">✅</div><div class="stat-value">${d.resolved}</div><div class="stat-label">Resolved</div></div>
          <div class="stat-card"><div class="stat-icon">📩</div><div class="stat-value">${d.new_today}</div><div class="stat-label">New Today</div></div>
          <div class="stat-card"><div class="stat-icon">✉️</div><div class="stat-value">${d.messages_today}</div><div class="stat-label">Messages Today</div></div>
        </div>
        <div class="card"><h3>📈 Conversations (Last 7 Days)</h3><div id="chartContainer"><canvas id="chartCanvas" height="200"></canvas></div></div>
        <div class="card"><h3>🆕 Recent Conversations</h3><div id="recentConvs"></div></div>
      `;
      if (d.chart && d.chart.length) {
        const labels = d.chart.map(c => c.date.slice(5));
        const vals = d.chart.map(c => c.count);
        setTimeout(() => drawChart(labels, vals), 100);
      }
      fetch(API + '?action=conversations').then(r => r.json()).then(d2 => {
        const rc = document.getElementById('recentConvs');
        if (!d2.conversations || !d2.conversations.length) { rc.innerHTML = '<div class="empty-state"><i class="fas fa-inbox"></i><p>No conversations yet</p></div>'; return; }
        let html = '<table><thead><tr><th>ID</th><th>Contact</th><th>Status</th><th>Agent</th><th>Date</th></tr></thead><tbody>';
        d2.conversations.slice(0, 10).forEach(c => {
          html += `<tr class="conv-preview" onclick="location='?page=conversations&id=${c.id}'">
            <td>#${c.id}</td><td>${c.contact_name || c.contact_phone || 'Anonymous'}</td>
            <td><span class="badge ${c.status}">${c.status}</span></td>
            <td>${c.agent_name || '-'}</td>
            <td>${new Date(c.created_at).toLocaleDateString()}</td></tr>`;
        });
        html += '</tbody></table>';
        rc.innerHTML = html;
      });
    });
  }

  function drawChart(labels, vals) {
    const canvas = document.getElementById('chartCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const w = canvas.parentElement.offsetWidth || 600;
    canvas.width = w; canvas.height = 200;
    const max = Math.max(...vals, 1); const pad = 40; const bw = (w - pad * 2) / labels.length;
    ctx.clearRect(0, 0, w, 200);
    ctx.fillStyle = '#075E54';
    vals.forEach((v, i) => {
      const h = (v / max) * 140;
      const x = pad + i * bw + bw * 0.15;
      const y = 180 - h;
      ctx.beginPath(); ctx.roundRect(x, y, bw * 0.7, h, 4); ctx.fill();
      ctx.fillStyle = '#666'; ctx.font = '11px Inter, sans-serif'; ctx.textAlign = 'center';
      ctx.fillText(labels[i], x + bw * 0.35, 196);
      ctx.fillStyle = '#075E54';
    });
  }

  function loadConversations() {
    const params = new URLSearchParams(location.search);
    const detailId = params.get('id');
    if (detailId) return loadConversationDetail(detailId);

    fetch(API + '?action=conversations').then(r => r.json()).then(d => {
      const el = document.getElementById('appContent');
      if (!d.conversations || !d.conversations.length) {
        el.innerHTML = '<div class="card"><div class="empty-state"><i class="fas fa-inbox"></i><p>No conversations yet</p></div></div>';
        return;
      }
      let html = '<div class="card"><h3>All Conversations</h3><table><thead><tr><th>ID</th><th>Contact</th><th>Phone</th><th>Email</th><th>Status</th><th>Agent</th><th>Date</th><th></th></tr></thead><tbody>';
      d.conversations.forEach(c => {
        html += `<tr>
          <td>#${c.id}</td>
          <td><strong>${c.contact_name || 'Anonymous'}</strong></td>
          <td>${c.contact_phone || '-'}</td>
          <td>${c.contact_email || '-'}</td>
          <td><span class="badge ${c.status}">${c.status}</span></td>
          <td>${c.agent_name || '-'}</td>
          <td>${new Date(c.created_at).toLocaleDateString()}</td>
          <td><a href="?page=conversations&id=${c.id}" class="btn btn-primary btn-sm">View</a></td>
        </tr>`;
      });
      html += '</tbody></table></div>';
      el.innerHTML = html;
    });
  }

  function loadConversationDetail(id) {
    fetch(API + `?action=conversation_detail&id=${id}`).then(r => r.json()).then(d => {
      const c = d.conversation;
      if (!c) return;
      const el = document.getElementById('appContent');
      let msgsHtml = '';
      (c.messages || []).forEach(m => {
        const align = m.sender_type === 'visitor' ? 'right' : 'left';
        const bg = m.sender_type === 'visitor' ? '#dcf8c6' : m.sender_type === 'agent' ? '#e8f5e9' : '#fff';
        msgsHtml += `<div style="text-align:${align};margin-bottom:8px;">
          <div style="display:inline-block;background:${bg};padding:10px 14px;border-radius:12px;max-width:80%;font-size:14px;border-bottom-${align === 'right' ? 'right' : 'left'}-radius:4px;">
            ${m.message} <div style="font-size:10px;color:#999;margin-top:4px;">${new Date(m.created_at).toLocaleTimeString()}</div>
          </div></div>`;
      });
      el.innerHTML = `
        <div style="display:grid;grid-template-columns:1fr 320px;gap:20px;">
          <div class="card" style="display:flex;flex-direction:column;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
              <h3>Conversation #${c.id}</h3>
              <select onchange="updateStatus(${c.id}, this.value)" style="padding:6px 12px;border:1px solid #e0e0e0;border-radius:6px;font-size:13px;">
                <option value="active" ${c.status === 'active' ? 'selected' : ''}>Active</option>
                <option value="waiting" ${c.status === 'waiting' ? 'selected' : ''}>Waiting</option>
                <option value="resolved" ${c.status === 'resolved' ? 'selected' : ''}>Resolved</option>
                <option value="closed" ${c.status === 'closed' ? 'selected' : ''}>Closed</option>
              </select>
            </div>
            <div style="flex:1;background:#e5ddd5;padding:16px;border-radius:12px;overflow-y:auto;max-height:400px;">${msgsHtml}</div>
            <div style="display:flex;gap:8px;margin-top:12px;">
              <textarea id="agentMsgInput" style="flex:1;padding:10px 14px;border:1px solid #e0e0e0;border-radius:8px;resize:none;font-family:inherit;font-size:14px;" rows="2" placeholder="Type a reply..."></textarea>
              <button onclick="sendAgentMsg(${c.id})" class="btn btn-success" style="align-self:flex-end;"><i class="fas fa-paper-plane"></i> Send</button>
            </div>
          </div>
          <div>
            <div class="card"><h3>Contact Info</h3>
              <p style="font-size:14px;margin-bottom:6px;"><strong>Name:</strong> ${c.contact_name || '-'}</p>
              <p style="font-size:14px;margin-bottom:6px;"><strong>Email:</strong> ${c.contact_email || '-'}</p>
              <p style="font-size:14px;margin-bottom:6px;"><strong>Phone:</strong> ${c.contact_phone || '-'}</p>
              <p style="font-size:14px;margin-bottom:6px;"><strong>Inquiry:</strong> ${c.inquiry || '-'}</p>
              <p style="font-size:14px;"><strong>Source:</strong> ${c.source}</p>
            </div>
            <div class="card"><h3>Agent</h3><p style="font-size:14px;">${c.agent_name || 'Not assigned'}</p></div>
          </div>
        </div>`;
    });
  }

  function updateStatus(id, status) {
    fetch(API + '?action=update_conversation_status', {
      method: 'POST', headers: {'Content-Type':'application/json'},
      body: JSON.stringify({id, status})
    }).then(r => r.json()).then(d => { if (d.success) location.reload(); });
  }

  function sendAgentMsg(convId) {
    const input = document.getElementById('agentMsgInput');
    const msg = input.value.trim();
    if (!msg) return;
    fetch(API + '?action=send_agent_message', {
      method: 'POST', headers: {'Content-Type':'application/json'},
      body: JSON.stringify({conversation_id: convId, message: msg})
    }).then(r => r.json()).then(d => { if (d.success) { input.value = ''; location.reload(); } });
  }

  function loadFAQs() {
    fetch(API + '?action=faqs').then(r => r.json()).then(d => {
      const el = document.getElementById('appContent');
      let html = '<div class="card"><div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;"><h3>FAQs</h3><button onclick="showFaqModal()" class="btn btn-primary"><i class="fas fa-plus"></i> Add FAQ</button></div>';
      if (!d.faqs || !d.faqs.length) {
        html += '<div class="empty-state"><i class="fas fa-question-circle"></i><p>No FAQs yet</p></div></div>';
        el.innerHTML = html; return;
      }
      html += '<table><thead><tr><th>Question</th><th>Category</th><th>Active</th><th></th></tr></thead><tbody>';
      d.faqs.forEach(f => {
        html += `<tr>
          <td>${f.question}</td><td><span class="badge" style="background:#e0e7ff;color:#4338ca;">${f.category}</span></td>
          <td>${f.is_active ? '✅' : '❌'}</td>
          <td>
            <button onclick='showFaqModal(${JSON.stringify(f).replace(/'/g,"\\'")})' class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
            <button onclick="deleteFaq(${f.id})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </td></tr>`;
      });
      html += '</tbody></table></div>';
      el.innerHTML = html;
    });
  }

  function showFaqModal(faq) {
    const modal = document.getElementById('modalContent');
    modal.innerHTML = `
      <h3>${faq ? 'Edit FAQ' : 'Add FAQ'}</h3>
      <label>Question</label><input id="faqQ" value="${faq ? faq.question : ''}">
      <label>Answer</label><textarea id="faqA" rows="4">${faq ? faq.answer : ''}</textarea>
      <label>Category</label><input id="faqC" value="${faq ? faq.category : 'general'}">
      ${faq ? `<label>Active</label><select id="faqActive"><option value="1" ${faq.is_active ? 'selected' : ''}>Yes</option><option value="0" ${!faq.is_active ? 'selected' : ''}>No</option></select>` : ''}
      <div class="modal-actions">
        <button onclick="closeModal()" class="btn" style="background:#f3f4f6;">Cancel</button>
        <button onclick="${faq ? `updateFaq(${faq.id})` : 'addFaq()'}" class="btn btn-primary">Save</button>
      </div>`;
    document.getElementById('modalOverlay').classList.add('open');
  }

  function addFaq() {
    const q = document.getElementById('faqQ').value;
    const a = document.getElementById('faqA').value;
    const c = document.getElementById('faqC').value;
    fetch(API + '?action=add_faq', {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({question:q,answer:a,category:c})})
      .then(r=>r.json()).then(d=>{if(d.success){closeModal();loadFAQs();}});
  }

  function updateFaq(id) {
    const q = document.getElementById('faqQ').value;
    const a = document.getElementById('faqA').value;
    const c = document.getElementById('faqC').value;
    const act = document.getElementById('faqActive').value === '1';
    fetch(API + '?action=update_faq', {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id,question:q,answer:a,category:c,is_active:act})})
      .then(r=>r.json()).then(d=>{if(d.success){closeModal();loadFAQs();}});
  }

  function deleteFaq(id) {
    if (!confirm('Delete this FAQ?')) return;
    fetch(API + `?action=delete_faq&id=${id}`).then(r=>r.json()).then(d=>{if(d.success)loadFAQs();});
  }

  function loadAgents() {
    fetch(API + '?action=agents').then(r => r.json()).then(d => {
      const el = document.getElementById('appContent');
      let html = '<div class="card"><div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;"><h3>Support Agents</h3><button onclick="showAgentModal()" class="btn btn-primary"><i class="fas fa-plus"></i> Add Agent</button></div>';
      if (!d.agents || !d.agents.length) { html += '<div class="empty-state"><i class="fas fa-users"></i><p>No agents</p></div></div>'; el.innerHTML = html; return; }
      html += '<table><thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Since</th><th></th></tr></thead><tbody>';
      d.agents.forEach(a => {
        html += `<tr><td><strong>${a.name}</strong></td><td>${a.email}</td><td>${a.role}</td>
          <td><span class="badge ${a.status}">${a.status}</span></td>
          <td>${new Date(a.created_at).toLocaleDateString()}</td>
          <td>${a.role !== 'admin' ? `<button onclick="deleteAgent(${a.id})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>` : ''}</td></tr>`;
      });
      html += '</tbody></table></div>';
      el.innerHTML = html;
    });
  }

  function showAgentModal() {
    const modal = document.getElementById('modalContent');
    modal.innerHTML = `
      <h3>Add Agent</h3>
      <label>Name</label><input id="agentName">
      <label>Email</label><input id="agentEmail" type="email">
      <label>Password</label><input id="agentPass" type="password">
      <div class="modal-actions">
        <button onclick="closeModal()" class="btn" style="background:#f3f4f6;">Cancel</button>
        <button onclick="addAgent()" class="btn btn-primary">Save</button>
      </div>`;
    document.getElementById('modalOverlay').classList.add('open');
  }

  function addAgent() {
    const name = document.getElementById('agentName').value;
    const email = document.getElementById('agentEmail').value;
    const pass = document.getElementById('agentPass').value;
    fetch(API + '?action=add_agent', {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({name,email,password:pass})})
      .then(r=>r.json()).then(d=>{if(d.success){closeModal();loadAgents();}});
  }

  function deleteAgent(id) {
    if (!confirm('Delete this agent?')) return;
    fetch(API + `?action=delete_agent&id=${id}`).then(r=>r.json()).then(d=>{if(d.success)loadAgents();});
  }

  function loadSettings() {
    fetch(API + '?action=settings').then(r => r.json()).then(d => {
      const s = d.settings || {};
      const el = document.getElementById('appContent');
      el.innerHTML = `
        <div class="card"><h3>⚙️ System Settings</h3>
          <label>Business Name</label><input id="s_business_name" value="${s.business_name || ''}" class="s-input">
          <label>Welcome Message</label><textarea id="s_welcome_message" rows="2" class="s-input">${s.welcome_message || ''}</textarea>
          <label>WhatsApp Number</label><input id="s_whatsapp_number" value="${s.whatsapp_number || ''}" class="s-input">
          <label>OpenAI API Key</label><input id="s_openai_api_key" value="${s.openai_api_key || ''}" type="password" class="s-input">
          <label>OpenAI Model</label><select id="s_openai_model" class="s-input">
            <option value="gpt-3.5-turbo" ${s.openai_model === 'gpt-3.5-turbo' ? 'selected' : ''}>GPT-3.5 Turbo</option>
            <option value="gpt-4" ${s.openai_model === 'gpt-4' ? 'selected' : ''}>GPT-4</option>
            <option value="gpt-4-turbo" ${s.openai_model === 'gpt-4-turbo' ? 'selected' : ''}>GPT-4 Turbo</option>
          </select>
          <label>AI Enabled</label><select id="s_ai_enabled" class="s-input">
            <option value="true" ${s.ai_enabled === 'true' ? 'selected' : ''}>Yes</option>
            <option value="false" ${s.ai_enabled !== 'true' ? 'selected' : ''}>No</option>
          </select>
          <label>Auto-assign Agent</label><select id="s_auto_assign_agent" class="s-input">
            <option value="true" ${s.auto_assign_agent === 'true' ? 'selected' : ''}>Yes</option>
            <option value="false" ${s.auto_assign_agent !== 'true' ? 'selected' : ''}>No</option>
          </select>
          <label>Business Hours</label><input id="s_business_hours" value="${s.business_hours || ''}" class="s-input">
          <label>Offline Message</label><textarea id="s_offline_message" rows="2" class="s-input">${s.offline_message || ''}</textarea>
          <div style="margin-top:16px;"><button onclick="saveSettings()" class="btn btn-primary"><i class="fas fa-save"></i> Save Settings</button></div>
        </div>
        <div class="card"><h3>📱 WhatsApp Business API</h3>
          <label>WhatsApp Phone Number ID</label><input id="s_whatsapp_phone_number_id" value="${s.whatsapp_phone_number_id || ''}" class="s-input">
          <label>WhatsApp Business API Token</label><input id="s_whatsapp_business_api_token" value="${s.whatsapp_business_api_token || ''}" type="password" class="s-input">
          <p style="font-size:12px;color:#666;margin-top:8px;"><i class="fas fa-info-circle"></i> Required for WhatsApp Cloud API integration. Get these from the Meta Developer Portal.</p>
        </div>`;
    });
  }

  function saveSettings() {
    const keys = ['business_name','welcome_message','whatsapp_number','openai_api_key','openai_model','ai_enabled','auto_assign_agent','business_hours','offline_message','whatsapp_phone_number_id','whatsapp_business_api_token'];
    const data = {};
    keys.forEach(k => { const el = document.getElementById('s_' + k); if (el) data[k] = el.value; });
    fetch(API + '?action=settings', {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)})
      .then(r=>r.json()).then(d=>{ if (d.success) alert('Settings saved!'); });
  }

  function loadAnalytics() {
    fetch(API + '?action=stats').then(r => r.json()).then(d => {
      const el = document.getElementById('appContent');
      el.innerHTML = `
        <div class="stats-grid">
          <div class="stat-card"><div class="stat-icon">💬</div><div class="stat-value">${d.total}</div><div class="stat-label">Total</div></div>
          <div class="stat-card"><div class="stat-icon">📩</div><div class="stat-value">${d.new_today}</div><div class="stat-label">New Today</div></div>
          <div class="stat-card"><div class="stat-icon">✉️</div><div class="stat-value">${d.messages_today}</div><div class="stat-label">Msgs Today</div></div>
          <div class="stat-card"><div class="stat-icon">✅</div><div class="stat-value">${d.resolved}</div><div class="stat-label">Resolved</div></div>
        </div>
        <div class="card"><h3>📈 Weekly Overview</h3>
          <p style="color:#666;font-size:14px;">Analytics data is captured for every conversation and message. Detailed reporting with date ranges and export coming soon.</p>
        </div>`;
    });
  }

  function loadNotifications() {
    fetch(API + '?action=notifications').then(r => r.json()).then(d => {
      const count = document.getElementById('notifCount');
      const dropdown = document.getElementById('notifDropdown');
      if (d.unread > 0) { count.textContent = d.unread; count.classList.add('show'); } else { count.classList.remove('show'); }
      let html = '';
      if (!d.notifications || !d.notifications.length) { html = '<div class="notif-empty">No notifications</div>'; }
      else {
        d.notifications.forEach(n => {
          html += `<div class="notif-item ${n.is_read ? '' : 'unread'}" onclick="markNotifRead(${n.id})">
            <div class="notif-title">${n.title}</div>
            <div class="notif-msg">${n.message}</div>
            <div style="font-size:11px;color:#999;margin-top:2px;">${new Date(n.created_at).toLocaleString()}</div>
          </div>`;
        });
      }
      dropdown.innerHTML = html;
    });
  }

  function markNotifRead(id) {
    fetch(API + `?action=mark_read&id=${id}`).then(() => loadNotifications());
  }

  document.getElementById('notifBell')?.addEventListener('click', (e) => {
    e.stopPropagation();
    document.getElementById('notifDropdown').classList.toggle('open');
    fetch(API + '?action=mark_read');
  });
  document.addEventListener('click', () => document.getElementById('notifDropdown')?.classList.remove('open'));

  document.getElementById('agentStatus')?.addEventListener('change', function() {
    fetch(API + '?action=update_agent_status', {
      method: 'POST', headers: {'Content-Type':'application/json'},
      body: JSON.stringify({status: this.value})
    });
  });

  function closeModal() { document.getElementById('modalOverlay').classList.remove('open'); }
  document.getElementById('modalOverlay')?.addEventListener('click', (e) => { if (e.target === e.currentTarget) closeModal(); });

  loadPage();
  loadNotifications();
  notifInterval = setInterval(loadNotifications, 10000);
  </script>
</body>
</html>
