SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `conference_name` varchar(255) DEFAULT NULL,
  `speaker_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `events` (`id`, `event_date`, `event_time`, `conference_name`, `speaker_name`) VALUES
(1, '2024-06-01', '14:00:00', 'Power Of Vulnerability: Leading to Authenticity', 'Brene Brown'),
(2, '2024-06-05', '19:00:00', 'Start With Why: Inspiring Leadership in Action', 'Simon Sinek'),
(3, '2024-06-10', '19:00:00', 'The Power of Presence: Unlocking Your Potential Through Body Language', 'Amy Cuddy'),
(4, '2024-06-15', '14:00:00', 'Journey to Self-Discovery: Pathways Inspired by Eat, Pray, Love', 'Elizabeth Gilbert'),
(5, '2024-06-20', '19:00:00', 'Unleash the Power Within: A Tony Robbins Experience', 'Tony Robbins'),
(6, '2024-06-25', '19:00:00', 'Embracing Shame: Transformative Pathways to Personal Growth', 'Brene Brown'),
(7, '2024-07-01', '19:00:00', 'Find Your Why: A Practical Workshop for Personal and Professional Growth', 'Simon Sinek'),
(8, '2024-07-05', '19:00:00', 'Presence in Practice: Body Language Workshops for Professional Success', 'Amy Cuddy'),
(9, '2024-07-10', '12:00:00', 'Cultivating Joy: Practices for a Fuller Life', 'Elizabeth Gilbert'),
(10, '2024-07-15', '19:00:00', 'Date with Destiny: Crafting the Life You Desire', 'Tony Robbins');


ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
