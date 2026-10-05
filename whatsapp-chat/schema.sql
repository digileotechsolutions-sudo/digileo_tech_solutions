CREATE DATABASE IF NOT EXISTS digileo_chat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE digileo_chat;

CREATE TABLE agents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','agent') DEFAULT 'agent',
  status ENUM('online','offline','away') DEFAULT 'offline',
  avatar VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE conversations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  contact_name VARCHAR(100) DEFAULT NULL,
  contact_email VARCHAR(100) DEFAULT NULL,
  contact_phone VARCHAR(50) DEFAULT NULL,
  inquiry TEXT DEFAULT NULL,
  source ENUM('website','whatsapp') DEFAULT 'website',
  status ENUM('active','waiting','resolved','closed') DEFAULT 'active',
  agent_id INT DEFAULT NULL,
  assigned_at TIMESTAMP NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (agent_id) REFERENCES agents(id) ON DELETE SET NULL
);

CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT NOT NULL,
  sender_type ENUM('visitor','agent','ai','system') NOT NULL,
  sender_id INT DEFAULT NULL,
  message TEXT,
  message_type ENUM('text','image','pdf','location','file') DEFAULT 'text',
  file_url VARCHAR(500) DEFAULT NULL,
  is_read TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE
);

CREATE TABLE faqs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(500) NOT NULL,
  answer TEXT NOT NULL,
  category VARCHAR(100) DEFAULT 'general',
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE ai_responses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  trigger_keywords TEXT NOT NULL,
  response TEXT NOT NULL,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  setting_key VARCHAR(100) NOT NULL UNIQUE,
  setting_value TEXT NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE analytics (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_type VARCHAR(50) NOT NULL,
  event_data JSON DEFAULT NULL,
  conversation_id INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE SET NULL
);

CREATE TABLE notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  agent_id INT DEFAULT NULL,
  title VARCHAR(200) NOT NULL,
  message TEXT NOT NULL,
  type ENUM('info','warning','success','new_message') DEFAULT 'info',
  is_read TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (agent_id) REFERENCES agents(id) ON DELETE CASCADE
);

INSERT INTO settings (setting_key, setting_value) VALUES
('business_name', 'Digileo Tech Solutions'),
('welcome_message', 'Hello 👋 Welcome to our website. How can we help you today?'),
('whatsapp_number', '254705359471'),
('openai_api_key', ''),
('openai_model', 'gpt-3.5-turbo'),
('whatsapp_business_api_token', ''),
('whatsapp_phone_number_id', ''),
('ai_enabled', 'true'),
('auto_assign_agent', 'true'),
('business_hours', 'Open 24/7 Online Support'),
('offline_message', 'We are currently away. Please leave a message and we will get back to you soon.');

INSERT INTO faqs (question, answer, category) VALUES
('What delivery services do you offer?', 'Digileo Tech Solutions offers comprehensive digital solutions including graphic design, web design, web development, software & hardware solutions, printing services, and IT consultancy.', 'services'),
('What are your delivery charges?', 'Our delivery charges vary based on location, package size, and urgency. Please contact us for a personalized quote. We offer competitive rates starting from KSh 500 for local deliveries.', 'pricing'),
('How can I track my delivery?', 'You can track your delivery by contacting our support team via WhatsApp or email. We provide real-time updates on your delivery status.', 'tracking'),
('What areas do you cover?', 'We cover Nairobi and its environs, with expanding coverage across major towns in Kenya. Contact us to confirm delivery to your specific location.', 'locations'),
('How do I book a delivery?', 'You can book a delivery by contacting us on WhatsApp, filling the chat form on this website, or calling us directly. Provide pickup and drop-off details, package description, and preferred time.', 'booking'),
('What are your operating hours?', 'We are open 24/7 for online support and deliveries. Our team is always ready to serve you.', 'hours'),
('How can I contact support?', 'You can reach us via WhatsApp at +254 705 359 471, email at digileotechsolutions@gmail.com, or through the live chat on this website.', 'contact');
