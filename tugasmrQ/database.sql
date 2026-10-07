CREATE DATABASE myteniz;
USE myteniz;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE cabang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    lokasi VARCHAR(150) NOT NULL
);

CREATE TABLE lapangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cabang_id INT NOT NULL,
    nama VARCHAR(50) NOT NULL,
    harga INT NOT NULL
);

CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    lapangan_id INT NOT NULL,
    tanggal DATE NOT NULL,
    jam TIME NOT NULL,
    status VARCHAR(30) DEFAULT 'Berhasil'
);

INSERT INTO cabang (nama,lokasi) VALUES
('MyTeniz Senayan','Jakarta Pusat'),
('MyTeniz Kemang','Jakarta Selatan'),
('MyTeniz BSD','Tangerang Selatan');

INSERT INTO lapangan
(cabang_id,nama,harga) VALUES
(1,'Court 01',85000),
(1,'Court 02',85000),
(2,'Court 01',75000),
(2,'Court 02',75000),
(3,'Court 01',70000),
(3,'Court 02',70000);