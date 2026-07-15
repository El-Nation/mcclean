<!-- ======================================================
     FOOTER
====================================================== -->
<footer>
  <div class="container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <div class="fb-logo">
          <img src="images/logo.jpg" alt="McClean Elite Servicing" class="logo-img-footer">
        </div>
        <p>
          Premium laundry and garment care services designed for busy individuals, families, and businesses. We handle your clothes with precision, care, and professionalism.
        </p>
        <div class="social-icons-footer" style="display: flex; gap: 15px; margin-top: 20px; color: var(--gray-400);">
          <span>🌐</span>
          <span>🔗</span>
        </div>
      </div>

      <!-- Contact Us -->
      <div class="footer-col">
        <h4>Contact Us</h4>
        <ul class="footer-contact-list">
          <li><span class="footer-icon">📞</span> <a href="tel:07066784058">07066784058</a></li>
          <li><span class="footer-icon">💬</span> <a href="https://wa.me/2347066784058">WhatsApp Chat</a></li>
          <li><span class="footer-icon">📧</span> <a href="mailto:smaxtech18@gmail.com">smaxtech18@gmail.com</a></li>
          <li><span class="footer-icon">📍</span> 166 New Lagos Rd, opp. zenith bank, Uselu, Benin City</li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <!-- Follow Us -->
      <div class="footer-col">
        <h4>Follow Us</h4>
        <ul class="footer-social-links" style="display: flex; gap: 15px; flex-direction: column;">
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">LinkedIn</a></li>
          <li><a href="#">WhatsApp</a></li>
        </ul>
      </div>

    </div><!-- /footer-grid -->

    <div class="footer-bottom">
      <span>© 2026 McClean Elite Servicing. All Rights Reserved.</span>
    </div>
  </div>
</footer>


<!-- ======================================================
     BOOKING MODAL
====================================================== -->
<div class="modal-overlay" id="booking-modal">
  <div class="modal-box">
    <div class="modal-header">
      <h3>📅 Schedule a Pickup</h3>
      <button class="modal-close" id="close-modal">✕</button>
    </div>
    <div class="modal-body">
      <form id="booking-form" novalidate>
        <div class="form-row">
          <div class="form-group">
            <label for="book-name">Full Name *</label>
            <input type="text" id="book-name" name="full_name" placeholder="John Doe" required />
          </div>
          <div class="form-group">
            <label for="book-email">Email Address *</label>
            <input type="email" id="book-email" name="email" placeholder="you@example.com" required />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="book-phone">Phone Number *</label>
            <input type="tel" id="book-phone" name="phone" placeholder="070XXXXXXXX" required />
          </div>
          <div class="form-group">
            <label for="book-service">Service Required *</label>
            <select id="book-service" name="service" required>
              <option value="">Select a service…</option>
              <option>Wash &amp; Fold</option>
              <option>Dry Cleaning</option>
              <option>Ironing Service</option>
              <option>Stain Treatment</option>
              <option>Bedding &amp; Curtains Care</option>
              <option>Pickup &amp; Delivery</option>
              <option>Corporate Solutions</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="book-address">Pickup Address *</label>
          <input type="text" id="book-address" name="address" placeholder="Your street address in Benin City" required />
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="book-date">Preferred Pickup Date *</label>
            <input type="date" id="book-date" name="pickup_date" required />
          </div>
          <div class="form-group">
            <label for="book-time">Preferred Time</label>
            <select id="book-time" name="pickup_time">
              <option value="">Any time</option>
              <option>8:00 AM – 10:00 AM</option>
              <option>10:00 AM – 12:00 PM</option>
              <option>12:00 PM – 2:00 PM</option>
              <option>2:00 PM – 4:00 PM</option>
              <option>4:00 PM – 6:00 PM</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="book-notes">Special Instructions</label>
          <textarea id="book-notes" name="notes" rows="3" placeholder="Any special care instructions or notes…"></textarea>
        </div>
        <button type="submit" class="btn btn-primary form-submit">Book Your Pickup Today →</button>
        <div id="booking-message" class="form-message"></div>
      </form>
    </div>
  </div>
</div>


<!-- WhatsApp float -->
<a href="https://wa.me/2347066784058" class="whatsapp-float" target="_blank" title="Chat on WhatsApp" aria-label="WhatsApp">💬</a>

<!-- Scroll to top -->
<button id="scroll-top" title="Back to top" aria-label="Back to top">↑</button>

<script src="js/main.js"></script>

<script>
// Set minimum date for booking to today
document.addEventListener('DOMContentLoaded', () => {
  const dateInput = document.getElementById('book-date');
  if (dateInput) {
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
  }
});
</script>

</body>
</html>
