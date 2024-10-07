SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `friends` (
  `FriendID` int(11) NOT NULL,
  `FriendWhoAdded` int(11) DEFAULT NULL,
  `FriendBeingAdded` int(11) DEFAULT NULL,
  `IsAccepted` tinyint(1) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `friends`
  ADD PRIMARY KEY (`FriendID`);
  
  ALTER TABLE `friends`
  MODIFY `FriendID` int(11) NOT NULL AUTO_INCREMENT;
