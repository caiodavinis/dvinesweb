-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Nov-2015 às 22:18
-- Versão do servidor: 5.6.26
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laercio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastres`
--

CREATE TABLE IF NOT EXISTS `cadastres` (
  `cadastreId` int(11) NOT NULL,
  `cadastreType` int(11) NOT NULL,
  `cadastreName` varchar(255) NOT NULL,
  `cadastreNickName` varchar(255) NOT NULL,
  `cadastreGroupId` int(11) NOT NULL,
  `cadastreMail` varchar(255) NOT NULL,
  `cadastrePronoun` varchar(255) DEFAULT NULL,
  `cadastreAddress` varchar(255) NOT NULL,
  `cadastrePhone` varchar(255) NOT NULL,
  `cadastreObs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `groupDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `relationshipId` int(11) NOT NULL,
  `relationshipCadastreIdA` int(11) NOT NULL,
  `relationshipDescriptionAtoB` varchar(255) NOT NULL,
  `relationshipCadastreIdB` int(11) NOT NULL,
  `relationshipDescriptionBtoA` varchar(255) NOT NULL,
  `relationshipDateBegin` date NOT NULL,
  `relationshipDateEnd` date DEFAULT NULL,
  `relationshipObs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(10) NOT NULL,
  `userName` varchar(150) NOT NULL,
  `userLogin` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userChangePassword` tinyint(1) NOT NULL DEFAULT '0',
  `userPermission` int(10) NOT NULL,
  `userStatus` tinyint(1) NOT NULL,
  `userGender` varchar(10) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `userCPF` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userId`, `userName`, `userLogin`, `userPassword`, `userChangePassword`, `userPermission`, `userStatus`, `userGender`, `userMail`, `userCPF`) VALUES
(74, 'Caio Davinis', 'cdmsilva', '4cc7105dd5fb0a8e3a870d6768bd90f0', 0, 10, 1, 'male', 'caio_davinis@hotmail.com', '054.066.365-45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastres`
--
ALTER TABLE `cadastres`
  ADD PRIMARY KEY (`cadastreId`),
  ADD KEY `cadastreGroupId` (`cadastreGroupId`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`relationshipId`),
  ADD KEY `relationshipCadastreIdA` (`relationshipCadastreIdA`),
  ADD KEY `relationshipCadastreIdB` (`relationshipCadastreIdB`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userLogin` (`userLogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastres`
--
ALTER TABLE `cadastres`
  MODIFY `cadastreId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `relationshipId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastres`
--
ALTER TABLE `cadastres`
  ADD CONSTRAINT `cadastres_ibfk_1` FOREIGN KEY (`cadastreGroupId`) REFERENCES `groups` (`groupId`);

--
-- Limitadores para a tabela `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`relationshipCadastreIdA`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`relationshipCadastreIdB`) REFERENCES `users` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
