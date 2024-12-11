-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS tech_shop;
USE tech_shop;

-- Tạo bảng danh mục sản phẩm
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,               -- Tên danh mục
    description TEXT,                         -- Mô tả danh mục
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Ngày tạo
);

-- Tạo bảng thương hiệu
CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,               -- Tên thương hiệu
    country VARCHAR(100),                     -- Quốc gia của thương hiệu
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Ngày tạo
);

-- Tạo bảng sản phẩm
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,               -- Tên sản phẩm
    description TEXT,                         -- Mô tả sản phẩm
    price DECIMAL(10, 2) NOT NULL,            -- Giá sản phẩm
    stock INT DEFAULT 0,                      -- Số lượng sản phẩm
    category_id INT,                          -- FK đến bảng danh mục
    brand_id INT,                             -- FK đến bảng thương hiệu
    image_url VARCHAR(255),                   -- URL hình ảnh sản phẩm
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (brand_id) REFERENCES brands(id)
);

-- Tạo bảng người dùng
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,    -- Tên đăng nhập
    password VARCHAR(255) NOT NULL,           -- Mật khẩu (đã mã hóa)
    email VARCHAR(255) NOT NULL UNIQUE,       -- Email người dùng
    phone VARCHAR(15),                        -- Số điện thoại
    address TEXT,                             -- Địa chỉ
    is_admin BOOLEAN DEFAULT FALSE,           -- Phân quyền (admin hoặc user)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tạo bảng giỏ hàng
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,                              -- FK đến bảng users
    product_id INT,                           -- FK đến bảng products
    quantity INT DEFAULT 1,                   -- Số lượng sản phẩm
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Tạo bảng đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,                              -- FK đến bảng users
    total_amount DECIMAL(10, 2),              -- Tổng số tiền của đơn hàng
    status ENUM('Pending', 'Processing', 'Completed', 'Cancelled') DEFAULT 'Pending', -- Trạng thái đơn hàng
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tạo bảng chi tiết đơn hàng
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,                             -- FK đến bảng orders
    product_id INT,                           -- FK đến bảng products
    quantity INT NOT NULL,                    -- Số lượng sản phẩm
    price DECIMAL(10, 2),                     -- Giá tại thời điểm mua
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Thêm dữ liệu mẫu cho bảng danh mục
INSERT INTO categories (name, description) 
VALUES ('Robot', 'Các loại robot thông minh'), 
       ('Thiết bị gia dụng', 'Đồ gia dụng thông minh'),
       ('Phụ kiện', 'Các loại phụ kiện thông minh');

-- Thêm dữ liệu mẫu cho bảng thương hiệu
INSERT INTO brands (name, country) 
VALUES ('iRobot', 'USA'), 
       ('Xiaomi', 'China'), 
       ('Dyson', 'UK');

-- Thêm dữ liệu mẫu cho bảng sản phẩm
INSERT INTO products (name, description, price, stock, category_id, brand_id, image_url) 
VALUES 
('Robot hút bụi iRobot Roomba', 'Robot hút bụi thông minh', 500.00, 10, 1, 1, 'images/roomba.jpg'),
('Máy hút bụi Dyson V11', 'Máy hút bụi không dây thông minh', 700.00, 5, 2, 3, 'images/dyson.jpg'),
('Camera an ninh Xiaomi', 'Camera quan sát thông minh', 100.00, 20, 3, 2, 'images/xiaomi_camera.jpg');

-- Thêm dữ liệu mẫu cho bảng người dùng
INSERT INTO users (username, password, email, phone, address, is_admin) 
VALUES 
('admin', MD5('admin123'), 'admin@example.com', '0123456789', '123 Admin Street', TRUE),
('user1', MD5('password1'), 'user1@example.com', '0987654321', '456 User Lane', FALSE);

-- Thêm dữ liệu mẫu cho bảng giỏ hàng
INSERT INTO cart (user_id, product_id, quantity) 
VALUES 
(2, 1, 2), 
(2, 3, 1);

-- Thêm dữ liệu mẫu cho bảng đơn hàng
INSERT INTO orders (user_id, total_amount, status) 
VALUES 
(2, 1100.00, 'Completed');

-- Thêm dữ liệu mẫu cho bảng chi tiết đơn hàng
INSERT INTO order_details (order_id, product_id, quantity, price) 
VALUES 
(1, 1, 2, 500.00), 
(1, 3, 1, 100.00);
