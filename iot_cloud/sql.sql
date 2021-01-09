SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; -- nicio valoare nu va fi initializata cu 0
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00"; -- setarea fusului orar pentru Bucuresti,Romania

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `UIDresult` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `specializare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `nume`, `prenume`, `specializare`) VALUES
('3933186123', 'ciobanu', 'cristian', 'ea');

ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UIDresult` (`UIDresult`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

