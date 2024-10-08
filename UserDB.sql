SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SelectedDate` date NOT NULL,
  `ConfirmationNumber` varchar(255) NOT NULL,
  UNIQUE (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `Users` (`UserID`, `FirstName`, `LastName`, `Email`, `SelectedDate`, `ConfirmationNumber`) VALUES
(1, 'micheal', 'myers', 'myers@gmail.com', '2024-05-10', ''),
(2, 'world', 'world', 'orld@gmail.com', '2024-06-01', 'CONF171496229850207'),
(3, 'class', '337', 'csit@gmail.com', '2024-06-20', 'CONF171496239729193');

ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

COMMIT;
