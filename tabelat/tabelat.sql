CREATE TABLE sponsors(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,\
    image_path TEXT
);

INSERT INTO sponsors (sponsor_name, image_path) VALUES
('KFC Kosova', '/UEB25_GR3/Photos/Home/logo-kfc.png'),
('Air Prishtina', '/UEB25_GR3/Photos/Home/logo-airprishtina.png'),
('Sach Pizza', '/UEB25_GR3/Photos/Home/logo-pizza.png'),
('Prishtina Mall', '/UEB25_GR3/Photos/Home/logo-prishtinamall.png'),
('Pro Credit Bank', '/UEB25_GR3/Photos/Home/logo-bank.png'),
('Sach Caffe', '/UEB25_GR3/Photos/Home/logo-sach.png'),
('Universiteti i Prishtinës', '/UEB25_GR3/Photos/Home/logo-up.png'),
('Swiss Diamond Hotel', '/UEB25_GR3/Photos/Home/logo-swiss.png');