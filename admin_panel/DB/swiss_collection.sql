-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2024 pada 02.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiss_collection`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(150) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `deliver_address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivered_to`, `phone_no`, `deliver_address`, `pay_method`, `pay_status`, `order_status`, `order_date`) VALUES
(1, 2, 'Self', '9802234675', 'Matepani-12', 'Cash', 0, 0, '2022-04-10'),
(3, 2, 'Test  Firstuser', '980098322', 'matepani-12', 'Khalti', 1, 0, '2022-04-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `variation_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 500),
(3, 3, 3, 1, 890);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp(),
  `BOM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `price`, `project_id`, `uploaded_date`, `BOM`) VALUES 
(1, 'Mesin Frais', 'Mesin frais adalah alat yang digunakan untuk menghasilkan permukaan berbentuk kompleks dengan cara menggerakkan pahat yang dipasang pada spindle secara vertikal atau horizontal ke arah benda kerja yang diposisikan pada meja mesin.', './uploads/frais.jpg', 27204100, 8, '2022-04-04','https://docs.google.com/spreadsheets/d/1vGrvCiecahXVHU6pJKtlb8Qa_0VZPFCs/edit#gid=1144798060'), 
(2, 'Mobile Robot Polebot', 'Mobile Robot Polebot adalah robot bergerak mandiri yang dirancang untuk melakukan berbagai tugas di lingkungan yang berbeda. Polebot dirancang dengan kemampuan navigasi dan manipulasi yang canggih untuk menangani berbagai situasi.', './uploads/polebot.png', 10099750, 1, '2022-04-04','https://docs.google.com/spreadsheets/d/1EU934hBDAy_FUgUY-icQxHB3cRC_z9_O/edit#gid=1075571455'), 
(3, 'Plant Dobot Conveyor', 'Plant Dobot Conveyor adalah sistem conveyor otomatis yang digunakan dalam proses manufaktur untuk mentransportasikan barang dari satu lokasi ke lokasi lain secara efisien.', './uploads/dobot.png', 23151697, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1lIv7u5vWKwsu2Au8zCJvwRAXfaiPwUrh/edit#gid=1993666332'), 
(4, 'Teaching Aid Akuisisi Data dan Instrumentasi', 'Teaching Aid Akuisisi Data dan Instrumentasi adalah alat yang digunakan dalam laboratorium pendidikan untuk mengajarkan prinsip-prinsip dasar akuisisi data dan pengukuran instrumentasi.', './uploads/akuisisi.png', 2749000, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1LiIxzDsU9JX4zdQT0RuPp2zUjftzG3Jg/edit#gid=822906798'), 
(5, 'Teaching Aid Automatic Filling System', 'Teaching Aid Automatic Filling System adalah sistem pengisian otomatis yang digunakan dalam lingkungan pendidikan untuk mendemonstrasikan prinsip-prinsip dasar sistem kontrol otomatis.', './uploads/AFS.jpg', 59309690, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1LbfFbNtkLdDwCbFpzBcW6WnY_Nv7YGJR/edit#gid=2124146226'), 
(6, 'Teaching Aid Digital', 'Teaching Aid Digital adalah alat pembelajaran yang dirancang untuk mengajarkan konsep-konsep dasar elektronika digital dan logika digital dalam lingkungan pendidikan.', './uploads/digital.jpg', 24098688, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1pZLtBTzZhVWcWXEMZZzCAAGZhPpBXHLu/edit#gid=1339784694'), 
(7, 'Teaching Aid IML', 'Teaching Aid IML adalah alat pembelajaran yang digunakan untuk mendemonstrasikan prinsip-prinsip dasar manufaktur injeksi molding dalam lingkungan pendidikan.', './uploads/IML.jpg', 88214600, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1WwjgI4OeYYhpBt2Kv6TscfKqwqe-K1TA/edit#gid=482085550'), 
(8, 'Teaching Aid Micro (Koper)', 'Teaching Aid Micro (Koper) adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar mikrokontroler dalam lingkungan pendidikan.', './uploads/microKoper.jpg', 1314100, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1SHv9mW8n5qp__hu9JL26tnRKpLudFML2/edit#gid=653997142'), 
(9, 'Teaching Aid Micro (Meja)', 'Teaching Aid Micro (Meja) adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar mikrokontroler dalam lingkungan pendidikan.', './uploads/microMeja.jpeg', 2514100, 1, '2024-03-08','https://drive.google.com/drive/folders/1IdtJLQY7p6vXYQzrltQUFQxo00Sv6laZ'), 
(10, 'Teaching Aid PLC (Koper)', 'Teaching Aid PLC (Koper) adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar kontrol logika terprogram (PLC) dalam lingkungan pendidikan.', './uploads/PLCKoper.jpeg', 14684500, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1kjaQGfZx6XwZEKlSvp8vyyPWgxKQ-UQD/edit#gid=1731591695'), 
(11, 'Teaching Aid PLC (Plant XYZ)', 'Teaching Aid PLC (Plant XYZ) adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar kontrol logika terprogram (PLC) dalam lingkungan pendidikan.', './uploads/PLCXYZ.jpeg', 14684500, 1, '2024-03-08','https://drive.google.com/drive/folders/1WY-_bt1lo0MtZRwnm7H6BCAbdenc_f3A'), 
(12, 'Teaching Aid Pneumatic (Koper)', 'Teaching Aid Pneumatic (Koper) adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar pneumatik dan sistem kontrol pneumatik dalam lingkungan pendidikan.', './uploads/pneumaticKoper.png', 12868000, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1kJ9tEW5nEbuvR2lpDGhXzvRDHKuFkcux/edit#gid=305134142'), 
(13, 'Teaching Aid SCADA', 'Teaching Aid SCADA adalah alat pembelajaran yang dirancang untuk mengajarkan konsep dasar sistem pengendalian dan akuisisi data supervisory control and data acquisition (SCADA) dalam lingkungan pendidikan.', './uploads/scada.png', 22194900, 1, '2024-03-08','https://docs.google.com/spreadsheets/d/1wcOhefSLFhWDYMAzIEdAcsUtVAoG9-ZJ/edit#gid=472505384');



-- --------------------------------------------------------

--
-- Struktur dari tabel `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `quantity_in_stock`) VALUES
(1, 1, 4, 5),
(2, 2, 3, 9),
(3, 2, 2, 3),
(6, 3, 3, 6),
(7, 4, 2, 8),
(8, 5, 4, 8),
(9, 6, 2, 10),
(10, 7, 2, 10),
(11, 1, 14, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `pemesan` varchar(150) NOT NULL,
  `No Order` int(11) NOT NULL,
  `Produk` varchar(55) NOT NULL,
  `PIC` int(255) NOT NULL,
  `Deadline` date DEFAULT NULL,
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`project_id`, `pemesan`, `No Order`, `Produk`, `PIC`, `Deadline`,`Status`) VALUES
(1, 'Teaching Aid', 1, 'Teaching Aid', 0, NULL),
(2, 'Robots\r\n', 0, '0', 0, NULL),
(8, 'Machine', 0, '0', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review_desc`) VALUES
(1, 2, 2, 'Comfortable and stylish. I loved it.'),
(2, 2, 5, 'Perfect dress for summer.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL,
  `salary` int(15) NOT NULL,
  `jumlah_project` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` enum('SuperAdmin','Admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(2, 'baru\r\n', '827ccb0eea8a706c4c34a16891f84e7b', 'SuperAdmin'),
(32, 'Vincent', 'e10adc3949ba59abbe56e057f20f883e', 'SuperAdmin'),
(42, 'Sugeng', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_cart` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `project_id` (`project_id`) USING BTREE;

--
-- Indeks untuk tabel `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD UNIQUE KEY `uc_wish` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
