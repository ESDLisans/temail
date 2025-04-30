import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Import Trix Editor
import Trix from 'trix';
window.Trix = Trix; // Make Trix globally available if needed

document.addEventListener('trix-before-initialize', () => {
  // You can customize Trix configuration here if needed
  // Trix.config.blockAttributes.heading1.tagName = "h3";
})
