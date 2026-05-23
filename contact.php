<?php include 'php/header.php'; ?>

<!-- ======================================================
     CONTACT SECTION
====================================================== -->
<section id="contact" class="section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="badge">📩 Get In Touch</div>
      <h2 class="section-heading">Contact Us</h2>
      <p class="section-subhead">We'd love to hear from you. Reach out for any inquiries or to schedule a service.</p>
    </div>

    <div class="contact-inner">

      <!-- Info side -->
      <div class="reveal">
        <div class="contact-info">
          <h3>Contact Information</h3>
          <p>Reach us through any of the channels below. Our concierge team is ready to help you with your garment care needs.</p>

          <div class="contact-items">
            <div class="contact-item">
              <div class="ci-icon">📞</div>
              <div>
                <div class="ci-label">Phone Number</div>
                <div class="ci-value"><a href="tel:07066784058">07066784058</a></div>
              </div>
            </div>
            <div class="contact-item">
              <div class="ci-icon">💬</div>
              <div>
                <div class="ci-label">WhatsApp</div>
                <div class="ci-value"><a href="https://wa.me/2347066784058" target="_blank">Chat on WhatsApp</a></div>
              </div>
            </div>
            <div class="contact-item">
              <div class="ci-icon">📧</div>
              <div>
                <div class="ci-label">Email Address</div>
                <div class="ci-value"><a href="mailto:smaxtech18@gmail.com">smaxtech18@gmail.com</a></div>
              </div>
            </div>
            <div class="contact-item">
              <div class="ci-icon">📍</div>
              <div>
                <div class="ci-label">Business Address</div>
                <div class="ci-value">166 New Lagos Rd, opp. zenith bank, Uselu, Benin City 300103, Edo</div>
              </div>
            </div>
            <div class="contact-item">
              <div class="ci-icon">🕒</div>
              <div>
                <div class="ci-label">Working Hours</div>
                <div class="ci-value">Mon – Sat &nbsp;|&nbsp; 8:00 AM – 6:00 PM</div>
              </div>
            </div>
          </div>

          <div class="social-links">
            <a class="social-link" href="https://wa.me/2347066784058" target="_blank" title="WhatsApp">💬</a>
            <a class="social-link" href="mailto:smaxtech18@gmail.com" title="Email">📧</a>
            <a class="social-link" href="tel:07066784058" title="Call">📞</a>
          </div>
        </div>
      </div>

      <!-- Form side -->
      <div class="contact-form-wrap reveal">
        <h3>Send Us a Message</h3>
        <form id="contact-form" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="c-name">Full Name *</label>
              <input type="text" id="c-name" name="full_name" placeholder="John Doe" required />
            </div>
            <div class="form-group">
              <label for="c-email">Email Address *</label>
              <input type="email" id="c-email" name="email" placeholder="you@example.com" required />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="c-phone">Phone Number</label>
              <input type="tel" id="c-phone" name="phone" placeholder="070XXXXXXXX" />
            </div>
            <div class="form-group">
              <label for="c-service">Service Interested In</label>
              <select id="c-service" name="service">
                <option value="">Select a service...</option>
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
            <label for="c-message">Your Message *</label>
            <textarea id="c-message" name="message" placeholder="Tell us how we can help you…" required></textarea>
          </div>
          <div class="contact-actions" style="display: flex; gap: 15px; margin-top: 10px;">
            <button type="submit" class="btn btn-primary form-submit" style="flex: 1;">Send via Email →</button>
            <button type="button" id="whatsapp-submit" class="btn btn-whatsapp" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; background: #25D366; border-color: #25D366; color: white;">
              <span>Chat on WhatsApp</span> 💬
            </button>
          </div>
          <div id="contact-message" class="form-message"></div>
        </form>
      </div>

    </div>

    <!-- Map Section -->
    <div class="map-container reveal" style="margin-top: 60px; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--gray-100);">
      <iframe 
        src="https://maps.google.com/maps?q=166%20New%20Lagos%20Rd,%20opp.%20zenith%20bank,%20Uselu,%20Benin%20City&t=&z=15&ie=UTF8&iwloc=&output=embed" 
        width="100%" 
        height="450" 
        style="border:0; display: block;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

  </div>
</section>

<?php include 'php/footer.php'; ?>
