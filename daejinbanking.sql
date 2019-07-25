-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 19-07-25 14:14
-- 서버 버전: 10.1.36-MariaDB
-- PHP 버전: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `daejinbanking`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `kcltmp`
--

CREATE TABLE `kcltmp` (
  `clcode` int(11) NOT NULL COMMENT '이용자코드',
  `clhnme` varchar(10) NOT NULL COMMENT '이용자명',
  `cladrs` varchar(100) NOT NULL COMMENT '이용자주소',
  `cmpnum` varchar(100) NOT NULL COMMENT '법인 (주민) 번호',
  `clblic` varchar(100) NOT NULL COMMENT '사업자등록번호',
  `cltel` varchar(100) NOT NULL COMMENT '이용자전화번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kcltmp`
--

INSERT INTO `kcltmp` (`clcode`, `clhnme`, `cladrs`, `cmpnum`, `clblic`, `cltel`) VALUES
(1, '박건희', '서울 강남구 수서동 대진디자인고등학교', '990122-1234567', '164-05-12543', '010-1234-4321');

-- --------------------------------------------------------

--
-- 테이블 구조 `kcntmp`
--

CREATE TABLE `kcntmp` (
  `clcode` int(11) NOT NULL COMMENT '이용자코드',
  `cntnum` int(11) NOT NULL COMMENT '계약번호',
  `cntcls` varchar(1) NOT NULL COMMENT '계약상태',
  `cntbrn` varchar(1) NOT NULL COMMENT '부점코드',
  `cnttem` varchar(1) NOT NULL COMMENT '팀코드',
  `cntdat` date NOT NULL COMMENT '계약체결일',
  `cntend` date NOT NULL COMMENT '만료일',
  `grkey` varchar(1) NOT NULL COMMENT '거치기간유무',
  `rntcal` int(11) NOT NULL COMMENT '납입방법',
  `userid` varchar(20) NOT NULL COMMENT '작업자'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `kdptmp`
--

CREATE TABLE `kdptmp` (
  `cntbrn` varchar(1) NOT NULL,
  `cntnme` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kdptmp`
--

INSERT INTO `kdptmp` (`cntbrn`, `cntnme`) VALUES
('S', '서울'),
('B', '부산'),
('D', '대구'),
('K', '광주');

-- --------------------------------------------------------

--
-- 테이블 구조 `kratfp`
--

CREATE TABLE `kratfp` (
  `RATCDE` int(11) NOT NULL COMMENT '기준금리코드',
  `RATNME` varchar(20) NOT NULL COMMENT '기준금리이름',
  `INTRAT` float NOT NULL COMMENT '적용이자율'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kratfp`
--

INSERT INTO `kratfp` (`RATCDE`, `RATNME`, `INTRAT`) VALUES
(1, 'CD', 1.8),
(2, '국고채', 1.5),
(3, '회사채', 2);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `kcltmp`
--
ALTER TABLE `kcltmp`
  ADD PRIMARY KEY (`clcode`);

--
-- 테이블의 인덱스 `kratfp`
--
ALTER TABLE `kratfp`
  ADD PRIMARY KEY (`RATCDE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
