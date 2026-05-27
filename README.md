# Laravel AI Chat Widget

A plug-and-play AI chatbot package for Laravel powered by OpenAI.

Add an intelligent AI assistant to your Laravel website with a floating chatbot widget, FAQ training, admin settings panel, lead capture, and smart responses.

Perfect for agencies, SaaS products, business websites, support systems, and portfolio sites.

---

## ✨ Features

- ✅ Floating AI Chat Widget
- ✅ OpenAI Integration
- ✅ FAQ-Based AI Responses
- ✅ Admin Settings Panel
- ✅ Chat History
- ✅ Smart FAQ Matching
- ✅ Lead Capture Support
- ✅ Easy Laravel Integration
- ✅ Lightweight & Developer Friendly

---

## 🚀 Installation

Install the package via Composer:

```bash
composer require shaurya/laravel-ai-chat-widget
```

Run the installation command:

```bash
php artisan ai-chat:install
```

This command will automatically:

- Publish configuration files
- Run database migrations
- Create default chatbot settings
- Prepare required assets

---

## 💬 Add Widget to Your Website

Add the chatbot widget anywhere in your Blade file:

```blade
<x-ai-chat-widget />
```

Recommended placement:

```blade
</body>
```

Example:

```blade
<body>

    @yield('content')

    <x-ai-chat-widget />

</body>
```

---

## ⚙️ Configuration

After installation, open:

```text
/admin/ai-chat/settings
```

From the settings panel you can:

- Add your OpenAI API key
- Choose AI model
- Customize chatbot behavior
- Change welcome message
- Enable or disable chatbot
- Customize widget colors
- Configure FAQ matching
- Manage lead capture

---

## 📚 Managing FAQs

To train your chatbot, visit:

```text
/admin/ai-chat/faqs
```

Add questions and answers related to your business.

### Example FAQs

| Question | Answer |
|-----------|--------|
| What services do you provide? | We provide Laravel, WordPress, React.js, and custom web development services. |
| Do you offer API integrations? | Yes, we integrate payment gateways, CRMs, booking APIs, and third-party systems. |

The chatbot will automatically use FAQs to provide smarter and more relevant responses to visitors.

---

## 🎯 Example Use Cases

This package works well for:

- Agency Websites
- SaaS Products
- Business Websites
- Customer Support Systems
- Portfolio Websites
- Client Service Websites
- Landing Pages
- Lead Generation Funnels

---

## 🗄️ Database Tables

The package automatically creates the following tables:

```text
ai_chat_messages
ai_chat_settings
ai_chat_faqs
ai_chat_leads
```

---

## 🛠️ Tech Stack

Built with:

- Laravel 11+
- PHP 8.2+
- OpenAI API
- MySQL
- Blade
- Vanilla JavaScript

---

## 🛣️ Roadmap

### Current Features

- [x] Floating chatbot widget
- [x] OpenAI integration
- [x] FAQ-based responses
- [x] Admin settings panel
- [x] Chat history
- [x] Smart FAQ matching

### Upcoming Features

- [ ] Modern enhanced UI
- [ ] Typing animation
- [ ] PDF training support
- [ ] Dark mode
- [ ] Multi-language support
- [ ] WhatsApp integration
- [ ] Analytics dashboard
- [ ] Conversation export

---

## 🤝 Contributing

Contributions are welcome.

If you'd like to improve the package, fix bugs, or suggest features, feel free to open an issue or submit a pull request.

---

## ⭐ Support

If this package helped you, please consider giving it a star on GitHub.

It helps the project grow and motivates future improvements.

---

## 📄 License

This package is open-source software licensed under the **MIT License**.

---

## 👨‍💻 Author

**Shaurya**

Laravel Developer • WordPress Expert • AI Integrations

Feel free to contribute, connect, or suggest improvements.