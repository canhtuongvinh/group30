-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
-- 
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watermangroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `complianceauditor`
--

CREATE TABLE `complianceauditor` (
  `No.60PlusScoredAspects` int(11) NOT NULL,
  `No12PlusScoreHazardsPerClient` int(11) NOT NULL,
  `NoClimateRisks` int(11) NOT NULL,
  `NoClimateOpportunities` int(11) NOT NULL,
  `IndividualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complianceauditor`
--

INSERT INTO `complianceauditor` (`No.60PlusScoredAspects`, `No12PlusScoreHazardsPerClient`, `NoClimateRisks`, `NoClimateOpportunities`, `IndividualID`) VALUES
(17, 5, 92, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers - company`
--

CREATE TABLE `customers - company` (
  `CustomerID` int(11) NOT NULL,
  `CompanyName` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers - company`
--

INSERT INTO `customers - company` (`CustomerID`, `CompanyName`) VALUES
(0, 'ABC Company');

-- --------------------------------------------------------

--
-- Table structure for table `customers - individuals`
--

CREATE TABLE `customers - individuals` (
  `IndividualID` int(11) NOT NULL,
  `IndividualName` varchar(45) NOT NULL,
  `CompanyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers - individuals`
--

INSERT INTO `customers - individuals` (`IndividualID`, `IndividualName`, `CompanyID`) VALUES
(0, 'Ben Gibbons', 0);

-- --------------------------------------------------------

--
-- Table structure for table `graph`
--

CREATE TABLE `graph` (
  `GraphID` int(11) NOT NULL,
  `GraphName` varchar(60) NOT NULL,
  `GraphType` varchar(45) NOT NULL,
  `DataType` varchar(90) NOT NULL,
  `DataLocation` varchar(45) NOT NULL,
  `IndividualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `improvementtracker`
--

CREATE TABLE `improvementtracker` (
  `NoActionsSetByYearPerClient` int(11) NOT NULL,
  `TotalNoActionsOpenPerClient` int(11) NOT NULL,
  `%DueActions` varchar(30) NOT NULL,
  `%OutstandingActions` varchar(30) NOT NULL,
  `%RequiringV&VPerAccount` varchar(30) NOT NULL,
  `NoActionsClosedOnOrBeforeDueDatePerUser` int(11) NOT NULL,
  `NoActionsClosedAfterDueDatePerUser` int(11) NOT NULL,
  `NoActionsPerUser` int(11) NOT NULL,
  `IndividualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `improvementtracker`
--

INSERT INTO `improvementtracker` (`NoActionsSetByYearPerClient`, `TotalNoActionsOpenPerClient`, `%DueActions`, `%OutstandingActions`, `%RequiringV&VPerAccount`, `NoActionsClosedOnOrBeforeDueDatePerUser`, `NoActionsClosedAfterDueDatePerUser`, `NoActionsPerUser`, `IndividualID`) VALUES
(90, 4, '25.00', '25.00', '38.00', 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `legalregister`
--

CREATE TABLE `legalregister` (
  `%LegalRegisterRedPerClient` varchar(30) NOT NULL,
  `%LegalRegisterAmberPerClient` varchar(30) NOT NULL,
  `%LegalRegisterGreenPerClient` varchar(30) NOT NULL,
  `NoLegalRegistersRedPerUser` int(11) NOT NULL,
  `NoLegalRegistersAmberPerClient` int(11) NOT NULL,
  `NoLegalRegistersGreenPerClient` int(11) NOT NULL,
  `IndividualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `legalregister`
--

INSERT INTO `legalregister` (`%LegalRegisterRedPerClient`, `%LegalRegisterAmberPerClient`, `%LegalRegisterGreenPerClient`, `NoLegalRegistersRedPerUser`, `NoLegalRegistersAmberPerClient`, `NoLegalRegistersGreenPerClient`, `IndividualID`) VALUES
('33.33', '33.33', '33.34', 3, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `reportTitle` varchar(60) NOT NULL,
  `dataType` varchar(60) NOT NULL,
  `dataGenerated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IndividualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `reportTitle`, `dataType`, `dataGenerated`, `IndividualID`) VALUES
(0, 'Legal Register outstanding actions', 'No. Outstanding actions per account', '2023-03-17 14:58:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reportdata`
--

CREATE TABLE `reportdata` (
  `ReportDataType` int(11) NOT NULL,
  `GraphType` varchar(60) NOT NULL,
  `DataValues` int(11) NOT NULL,
  `DateGenerated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------




--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `ReportTitle` varchar(90) NOT NULL,
  `DateGenerated` date NOT NULL,
  `ReportData` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complianceauditor`
--
ALTER TABLE `complianceauditor`
  ADD KEY `IndividualID` (`IndividualID`);

--
-- Indexes for table `customers - company`
--
ALTER TABLE `customers - company`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `customers - individuals`
--
ALTER TABLE `customers - individuals`
  ADD PRIMARY KEY (`IndividualID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `graph`
--
ALTER TABLE `graph`
  ADD KEY `IndividualID` (`IndividualID`);

--
-- Indexes for table `improvementtracker`
--
ALTER TABLE `improvementtracker`
  ADD KEY `IndividualID` (`IndividualID`);

--
-- Indexes for table `legalregister`
--
ALTER TABLE `legalregister`
  ADD KEY `IndividualID` (`IndividualID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `IndividualID` (`IndividualID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complianceauditor`
--
ALTER TABLE `complianceauditor`
  ADD CONSTRAINT `complianceauditor_ibfk_1` FOREIGN KEY (`IndividualID`) REFERENCES `customers - individuals` (`IndividualID`);

--
-- Constraints for table `customers - individuals`
--
ALTER TABLE `customers - individuals`
  ADD CONSTRAINT `customers - individuals_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `customers - company` (`CustomerID`);

--
-- Constraints for table `graph`
--
ALTER TABLE `graph`
  ADD CONSTRAINT `graph_ibfk_1` FOREIGN KEY (`IndividualID`) REFERENCES `customers - individuals` (`IndividualID`);

--
-- Constraints for table `improvementtracker`
--
ALTER TABLE `improvementtracker`
  ADD CONSTRAINT `improvementtracker_ibfk_1` FOREIGN KEY (`IndividualID`) REFERENCES `customers - individuals` (`IndividualID`);

--
-- Constraints for table `legalregister`
--
ALTER TABLE `legalregister`
  ADD CONSTRAINT `legalregister_ibfk_1` FOREIGN KEY (`IndividualID`) REFERENCES `customers - individuals` (`IndividualID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`IndividualID`) REFERENCES `customers - individuals` (`IndividualID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
