# 📧 TempMail - Professional Temporary Email Service

A modern, professional temporary email service built with Laravel 11. Create disposable email addresses, receive emails instantly, and manage them with a Gmail-inspired interface.

## ✨ Features

### 🎯 Core Features
- **Instant Email Generation** - Create temporary email addresses with one click
- **Real-time Email Receiving** - Get emails instantly with automatic refresh
- **Gmail-inspired Interface** - Professional, clean, and intuitive design
- **Email Management** - Star, search, delete, and organize emails
- **Forward Emails** - Forward received emails to your real email address
- **Dark/Light Mode** - Toggle between themes for better user experience

### 🛡️ Privacy & Security
- **No Registration Required** - Use instantly without creating accounts
- **Auto-deletion** - Emails automatically deleted after 10 hours
- **No Tracking** - Privacy-focused with no user tracking
- **GDPR Compliant** - Meets European privacy standards

### 📱 Modern UI/UX
- **Responsive Design** - Works perfectly on all devices
- **Professional Typography** - Clean, readable fonts
- **Smooth Animations** - Polished user interactions
- **Accessibility** - Screen reader friendly

### 🔧 Admin Features
- **Complete Admin Panel** - Manage all aspects of the site
- **Domain Management** - Add/remove email domains
- **Blog System** - Built-in blog with rich editor
- **Site Settings** - Customize appearance, logos, and settings
- **SMTP Configuration** - Easy email server setup
- **Menu Management** - Customize navigation menus
- **Ad Management** - Manage advertisement slots

### 🚀 Developer Features
- **RESTful API** - Complete API for integration
- **Modern Tech Stack** - Laravel 11, Tailwind CSS, Alpine.js
- **Queue System** - Background job processing
- **Caching** - Redis support for performance
- **File Storage** - Local and S3 compatible storage

## 🛠️ Tech Stack

- **Backend**: Laravel 11 (PHP 8.3+)
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/PostgreSQL (SQLite for development)
- **Cache**: Redis
- **Email**: SMTP + IMAP
- **Queue**: Redis/Database
- **Assets**: Vite

## 📋 Requirements

### Development
- PHP 8.3+
- Composer 2.0+
- Node.js 18+
- SQLite (included)

### Production
- PHP 8.3+ (with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, IMAP)
- MySQL 8.0+ or PostgreSQL 13+
- Redis 6.0+
- Web server (Nginx/Apache)
- SSL Certificate

## 🚀 Quick Start

### Development Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url> tempmail
   cd tempmail
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   php artisan db:seed
   ```

5. **Build assets and start**
   ```bash
   npm run build
   php artisan serve
   ```

6. **Access the application**
   - Website: http://localhost:8000
   - Admin Panel: http://localhost:8000/admin
   - Login: admin@example.com / password

### Production Deployment

1. **Use the deployment script**
   ```bash
   chmod +x deploy.sh
   ./deploy.sh
   ```

2. **Configure environment**
   ```bash
   cp env.production.example .env
   # Edit .env with your production settings
   ```

3. **Set up web server** (see DEPLOYMENT.md for detailed Nginx/Apache configs)

4. **Configure SSL certificate**
   ```bash
   sudo certbot --nginx -d yourdomain.com
   ```

For detailed deployment instructions, see [DEPLOYMENT.md](DEPLOYMENT.md).

## 📚 Documentation

### API Documentation
Visit `/api-docs` on your installation for complete API documentation with examples.

### Key Endpoints
- `GET /api/v1/domains` - Get available domains
- `GET /api/v1/emails` - Get emails for an address
- `GET /api/v1/messages/{id}` - Get specific message
- `POST /generate-email` - Generate new temporary email

### Admin Panel
Access the admin panel at `/admin` with these features:
- **Dashboard** - Overview and statistics
- **Domains** - Manage email domains
- **Pages** - Create and edit pages
- **Blog** - Manage blog posts
- **Site Settings** - Configure appearance and functionality
- **SMTP Settings** - Email server configuration
- **Menu Management** - Customize navigation
- **Ad Slots** - Manage advertisements

## 🎨 Customization

### Themes
The application supports light and dark themes. Default theme can be changed in:
```php
// resources/views/components/temp-mail-header.blade.php
localStorage.setItem('theme', 'light'); // or 'dark'
```

### Branding
Customize your brand through the admin panel:
- Upload your logo
- Set site title and description
- Configure favicon
- Customize colors and styling

### Email Domains
Add your own domains through Admin Panel > Domains or via database:
```php
Domain::create([
    'domain' => 'yourdomain.com',
    'is_active' => true
]);
```

## 🔧 Configuration

### Email Settings
Configure IMAP for receiving emails:
```env
IMAP_HOST=your-imap-server.com
IMAP_PORT=993
IMAP_USERNAME=your-email@domain.com
IMAP_PASSWORD=your-password
IMAP_ENCRYPTION=ssl
```

### Cache & Performance
For better performance in production:
```env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

### File Storage
For file uploads, configure storage:
```env
FILESYSTEM_DISK=s3  # or local
AWS_ACCESS_KEY_ID=your-key
AWS_SECRET_ACCESS_KEY=your-secret
AWS_BUCKET=your-bucket
```

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

Manual testing checklist:
- [ ] Email generation works
- [ ] Email receiving works
- [ ] Search functionality
- [ ] Admin panel access
- [ ] API endpoints respond
- [ ] Mobile responsiveness

## 📊 Monitoring

### Logs
Monitor application logs:
```bash
tail -f storage/logs/laravel.log
```

### Performance
Check queue status:
```bash
php artisan queue:monitor
```

### Backup
Use the included backup script:
```bash
chmod +x backup.sh
./backup.sh
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

### Common Issues
- **500 Error**: Check storage permissions
- **Emails not receiving**: Verify IMAP settings
- **Assets not loading**: Run `npm run build`
- **Database errors**: Check .env configuration

### Getting Help
1. Check the logs: `storage/logs/laravel.log`
2. Review configuration: `php artisan about`
3. Clear caches: `php artisan optimize:clear`

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Alpine.js
- PHP-IMAP Library

---

**TempMail** - Professional temporary email service for modern web applications.

Built with ❤️ using Laravel 11
