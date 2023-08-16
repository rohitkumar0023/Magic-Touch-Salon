-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) NOT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`) VALUES
(2, 'Poojal', 'poojal', 7347657337, 'p@gmail.com', 'poojal');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AptNumber` int(11) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(10, 15, 56547, '2022-11-24', '10:09:49', 'Engagement Makeup', '2022-11-18 04:16:13', 'rejected', 'Rejected', '2022-11-18 12:30:34'),
(11, 15, 6567, '2022-11-24', '10:09:49', 'nm  ', '2022-11-18 12:34:20', NULL, NULL, NULL),
(12, 15, 24283, '2022-11-23', '10:49:00', 'poojal', '2022-11-18 13:19:56', NULL, NULL, NULL),
(13, 15, 6661, '2022-11-25', '08:52:00', 'party', '2022-11-19 11:01:00', NULL, NULL, NULL),
(14, 15, 6751, '2022-12-03', '15:25:00', 'need best work', '2022-11-26 17:51:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(7, 'Riya', 'Poojal', 7347657337, 'pm@gmail.com', 'heyy', '2022-11-17 16:25:39', 1),
(8, 'jhfvf', 'ebvb', 7645678678, 'p@gmail.com', 'jhbcjhvc', '2022-11-18 12:41:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(10) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(20, 15, 1, 279871872, '2022-11-19 05:49:24'),
(21, 15, 4, 279871872, '2022-11-19 05:49:24'),
(22, 15, 7, 279871872, '2022-11-19 05:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Our primary concern is quality and hygiene. Our salon offers the finest quality services thanks to the latest technology. Our staff is well trained and experienced, and we offer advanced Skin, Hair, and Body Shaping services that will leave you feeling relaxed and stress free. Besides regular bleachings and facials, we provide a variety of hairstyles, bridal and cinematic makeup, and a variety of facial and fashion hair colours.    ', NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '1400, Sector 32, Janta Nagar, Ludhiana ', 'poojal@gmail.com', 8976945367, '10:30 am to 8:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`) VALUES
(1, 'O3 Facial', 'O3 Facial Kit is designed to control and prevent uneven skin tone & pigmentation issues while brightening and energizing the skin. The O3+ Whitening Cream SPF 30 protects your skin from UVA and UVB rays for 8 hours. It adds a natural glow to your skin and prevents tanning and sunburns.<br><br><br>        ', 1100, 'o3.jpg\r\n'),
(2, 'Fruit Facial', 'Fruit facials contain certain fruit acid like glycolic acid, alpha hydroxyl acid, citric acid, phenolic acid, vitamins and minerals in it. It highly detoxifies your skin, it excretes out all the toxins and it hydrates your face. Fruit facial has concentrates of fruits, that helps in deep cleansing of the skin. Fruit facials sustain the skin layers for shine and glow. It helps in reducing dark spots, dark imprints, pimple spots as well.', 500, 'fruit.jpg'),
(3, 'Charcoal Facial', 'Activated charcoal is created from bone char, coconut shells, peat, petroleum coke, coal, or bamboo. It is in the form of a fine black dust that is produced when regular charcoal is activated by exposing it to very high temperatures. A charcoal mask for the face is a great exfoliator that deeply cleanses the skin pores by absorbing excess oil making your skin feel relieved, brightened, and clean.', 1000, 'charcoal.jpg'),
(4, 'Deluxe Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 500, 'dman.jpg'),
(5, 'Deluxe Pedicure', 'A Deluxe Pedicure consists of a foot soak, foot scrub, nail cuticle work, and polish. A Deluxe Pedicure is the perfect way to pamper yourself with an at-home spa experience. A short massage and your nails are buffed and ready to paint.', 600, 'dpad.jpg'),
(6, 'Normal Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 300, 'The-Dummys-Guide-To-Using-A-Manicure-Kit_OI.jpg'),
(7, 'Normal Pedicure', 'A simple treatment that includes foot soaking, foot scrubbing with a pumice stone or foot file, nail clipping, nail shaping, foot and calf massage, moisturizer and nail polishing. \r\n<br><br><br>', 400, 'nped.jpg'),
(8, 'U-Shape Hair Cut', 'In U-Shape Hair Cut, the sides of cut hair are rounded giving it a curved look. U-shaped layers are a great way to add volume to long hair. Use a large-barrel curling iron to twist up the ends of each layer, and you\'ve got a romantic hairstyle that\'s sure to turn heads.', 250, 'uhair.jpg'),
(9, 'Layer Haircut', 'Classic layers can keep your hair looking on-trend and stylish, while also flattering the angles of round faces. A medium-length, shaggy hair style with side bangs that hit at the cheekbones is a great look for a round face. Layers add a lot of life and youthfulness to hair.', 550, 'layer.jpg'),
(10, 'Rebonding', 'Hair rebonding is a chemical process that changes your hair\'s natural texture and creates a smooth, straight style. It\'s also called chemical straightening. Hair rebonding is typically performed by a licensed cosmetologist at your local hair salon.', 3999, 'c362f21370120580f5779a2d019392851652852555.jpg'),
(11, 'Loreal Hair Color(Full)', 'Loreal Hair Color(Full),Loreal Hair Color(Full),Loreal Hair Color(Full)\r\n<br><br><br><br><br>', 1200, 'loreal.jpg'),
(12, 'Body Spa', 'It is typically a massage spa therapy that helps reduce pain. The technique involves using fingertips, palm, elbow, or even feet to apply firm pressure on certain body parts or acupoint to encourage blood flow and promote healing. <br><br>', 1500, 'bodyspa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(15, 'Poojal', 'Mehta', 7347657337, 'p@gmail.com', '12345', '2022-11-17 16:38:49'),
(18, 'jbjk', 'er', 8976890978, 'pz@gmail.com', '12345', '2022-11-24 06:25:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Userid` (`Userid`),
  ADD KEY `ServiceId` (`ServiceId`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD CONSTRAINT `tblbook_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD CONSTRAINT `tblinvoice_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `tbluser` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblinvoice_ibfk_2` FOREIGN KEY (`ServiceId`) REFERENCES `tblservices` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
