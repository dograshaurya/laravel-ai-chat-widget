Run the installation command:

php artisan ai-chat:install

This will:

Publish configuration files
Run database migrations
Create default chatbot settings
Configuration

After installation, open:

/admin/ai-chat/settings

From here you can:

Add your OpenAI API key
Customize chatbot behavior
Change welcome message
Enable or disable chatbot
Customize colors
Managing FAQs

To train your chatbot, go to:

/admin/ai-chat/faqs

Add questions and answers relevant to your business.

For example:

Question	Answer
What services do you provide?	We provide Laravel, WordPress, React.js, and custom web development services.
Do you offer API integrations?	Yes, we integrate payment gateways, CRMs, booking APIs, and third-party systems.

The chatbot will automatically use these FAQs when answering visitors.

Example Use Cases

This package works well for:

Agency websites
SaaS products
Business websites
Support systems
Portfolio websites
Client service websites
Database Tables

The package creates the following tables automatically:

ai_chat_messages
ai_chat_settings
ai_chat_faqs
ai_chat_leads
Tech Stack

Built with:

Laravel 11+
PHP 8.2+
OpenAI API
MySQL
Blade
Vanilla JavaScript
Roadmap

Current features:

 Floating chatbot widget
 OpenAI integration
 FAQ-based responses
 Admin settings panel
 Chat history
 Smart FAQ matching

Planned features:

 Better modern UI
 Typing animation
 PDF training
 Dark mode
 Multi-language support
 WhatsApp integration
 Analytics dashboard
Contributing

Contributions are welcome.

If you find bugs, have feature ideas, or want to improve the package, feel free to open an issue or submit a pull request.

Support

If this package helped you, consider giving it a ⭐ on GitHub.

It helps the project grow and motivates future improvements.

License

This package is open-source and licensed under the MIT License.

Author

Shaurya

Laravel Developer • WordPress Expert • AI Integrations

Feel free to connect or contribute to the project.