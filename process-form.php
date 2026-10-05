<?php
require_once __DIR__ . '/config/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  jsonResponse(['success' => false, 'message' => 'Invalid request method.'], 405);
}

$formType = $_POST['form_type'] ?? '';

if (!verifyCsrf()) {
  jsonResponse(['success' => false, 'message' => 'Security validation failed. Please refresh the page and try again.'], 403);
}

switch ($formType) {
  case 'contact':
    handleContactForm();
    break;
  case 'quote':
    handleQuoteForm();
    break;
  case 'newsletter':
    handleNewsletterForm();
    break;
  default:
    jsonResponse(['success' => false, 'message' => 'Unknown form type.'], 400);
}

function handleContactForm() {
  $name = sanitizeInput($_POST['name'] ?? '');
  $email = sanitizeInput($_POST['email'] ?? '');
  $phone = sanitizeInput($_POST['phone'] ?? '');
  $company = sanitizeInput($_POST['company'] ?? '');
  $subject = sanitizeInput($_POST['subject'] ?? '');
  $message = sanitizeInput($_POST['message'] ?? '');
  $quantity = sanitizeInput($_POST['quantity'] ?? '');

  if (empty($name)) {
    jsonResponse(['success' => false, 'message' => 'Please provide your name.'], 400);
  }

  $logData = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'subject' => $subject,
    'message_length' => strlen($message),
  ];
  if (!empty($quantity)) $logData['quantity'] = $quantity;

  logError("Contact form submission", $logData);
  logAccess("Contact form submitted by {$name}" . ($email ? " ({$email})" : ''));

  $notifyMessage = "New Inquiry\n\n";
  $notifyMessage .= "Name: {$name}\n";
  if ($company) $notifyMessage .= "Company: {$company}\n";
  if ($email) $notifyMessage .= "Email: {$email}\n";
  if ($phone) $notifyMessage .= "Phone: {$phone}\n";
  if ($subject) $notifyMessage .= "Subject: {$subject}\n";
  if ($quantity) $notifyMessage .= "Quantity: {$quantity}\n";
  $notifyMessage .= "Message: {$message}\n";

  $headers = "From: " . ($email ?: 'noreply@digileotechsolutions.com');
  @mail('digileotechsolutions@gmail.com', "New Inquiry: {$subject}", $notifyMessage, $headers);

  jsonResponse(['success' => true, 'message' => 'Thank you! Your message has been received. We will get back to you shortly.']);
}

function handleQuoteForm() {
  $name = sanitizeInput($_POST['name'] ?? '');
  $company = sanitizeInput($_POST['company'] ?? '');
  $email = sanitizeInput($_POST['email'] ?? '');
  $phone = sanitizeInput($_POST['phone'] ?? '');
  $service = sanitizeInput($_POST['service'] ?? '');
  $budget = sanitizeInput($_POST['budget'] ?? '');
  $timeline = sanitizeInput($_POST['timeline'] ?? '');
  $description = sanitizeInput($_POST['description'] ?? '');

  if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($description)) {
    jsonResponse(['success' => false, 'message' => 'Please fill in all required fields.'], 400);
  }

  if (!validateEmail($email)) {
    jsonResponse(['success' => false, 'message' => 'Please enter a valid email address.'], 400);
  }

  if (!validatePhone($phone)) {
    jsonResponse(['success' => false, 'message' => 'Please enter a valid phone number.'], 400);
  }

  $logData = [
    'name' => $name,
    'company' => $company,
    'email' => $email,
    'phone' => $phone,
    'service' => $service,
    'budget' => $budget,
    'timeline' => $timeline,
  ];
  logError("Quote request", $logData);
  logAccess("Quote requested by {$name} ({$email}) for {$service}");

  $notifyMessage = "New Quote Request\n\n";
  $notifyMessage .= "Name: {$name}\n";
  $notifyMessage .= "Company: {$company}\n";
  $notifyMessage .= "Email: {$email}\n";
  $notifyMessage .= "Phone: {$phone}\n";
  $notifyMessage .= "Service: {$service}\n";
  $notifyMessage .= "Budget: {$budget}\n";
  $notifyMessage .= "Timeline: {$timeline}\n";
  $notifyMessage .= "Description: {$description}\n";

  @mail('digileotechsolutions@gmail.com', "Quote Request: {$service} - {$name}", $notifyMessage, "From: {$email}");

  jsonResponse(['success' => true, 'message' => 'Thank you! Your quote request has been received. We will get back to you within 24 hours.']);
}

function handleNewsletterForm() {
  $email = sanitizeInput($_POST['email'] ?? '');

  if (empty($email) || !validateEmail($email)) {
    jsonResponse(['success' => false, 'message' => 'Please enter a valid email address.'], 400);
  }

  logError("Newsletter subscription", ['email' => $email]);
  logAccess("Newsletter subscribed: {$email}");

  jsonResponse(['success' => true, 'message' => 'Thank you for subscribing to our newsletter!']);
}
