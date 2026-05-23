-- McClean Elite Servicing Database Setup
-- Run this SQL to create the required tables

CREATE DATABASE IF NOT EXISTS mcclean;
USE mcclean;

-- Contact form submissions
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(20),
    service VARCHAR(100),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Booking / pickup requests
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    service VARCHAR(100) NOT NULL,
    pickup_date DATE NOT NULL,
    pickup_time VARCHAR(50),
    notes TEXT,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Testimonials
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(150) NOT NULL,
    rating TINYINT DEFAULT 5,
    review TEXT NOT NULL,
    service VARCHAR(100),
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample testimonials
INSERT INTO testimonials (customer_name, rating, review, service) VALUES
('Adaeze Okonkwo', 5, 'McClean Elite is simply the best! My gowns always come back looking brand new. Their attention to detail is unmatched in Benin City.', 'Dry Cleaning'),
('Emeka Nwosu', 5, 'I have been using their corporate laundry service for 6 months now. Consistent quality and always on time. Highly recommended!', 'Corporate Laundry'),
('Blessing Ighalo', 5, 'They handled my wedding dress with such care. The stain removal was perfect. I was worried but they delivered beyond expectations!', 'Stain Removal'),
('Chukwuemeka Eze', 4, 'Great service and affordable prices. The pickup and delivery is very convenient. Will keep using them.', 'Wash & Fold'),
('Ngozi Akpan', 5, 'My curtains look absolutely fresh after their cleaning service. Professional work and courteous staff. 5 stars!', 'Curtain Cleaning');
