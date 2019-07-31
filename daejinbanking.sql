-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 19-07-31 06:11
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
CREATE DATABASE IF NOT EXISTS `daejinbanking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `daejinbanking`;

-- --------------------------------------------------------

--
-- 테이블 구조 `kactmp`
--

CREATE TABLE `kactmp` (
  `actcde` int(11) NOT NULL COMMENT '계정코드',
  `actnme` varchar(255) NOT NULL COMMENT '계정명'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kactmp`
--

INSERT INTO `kactmp` (`actcde`, `actnme`) VALUES
(101, '현금'),
(102, '당좌예금'),
(103, '보통예금'),
(104, '유가증권'),
(105, '외상매출금'),
(106, '대손충당금'),
(107, '받을어음'),
(108, '대손충당금'),
(109, '단기대여금'),
(110, '장기대여금'),
(111, '미수금'),
(112, '미수수익'),
(113, '선급금'),
(114, '선급비용'),
(115, '상품'),
(116, '제품'),
(117, '반제품'),
(118, '토지'),
(119, '건물'),
(120, '비품'),
(121, '기계장치'),
(122, '차양운반구'),
(251, '외상매입금'),
(252, '지급어음'),
(260, '단기차입금'),
(270, '장기차입금'),
(271, '미지급금'),
(272, '미지급비용'),
(273, '예수금'),
(274, '선수금'),
(275, '선수수익'),
(331, '자본금'),
(401, '상품매출'),
(901, '이자수익'),
(902, '배당금수익'),
(903, '수수료수익'),
(904, '임대료'),
(905, '유형자산처분이익'),
(906, '투자자산처분이익'),
(907, '대손충당금환입'),
(908, '잡이익'),
(909, '자산수증이익'),
(910, '채무면제이익');

-- --------------------------------------------------------

--
-- 테이블 구조 `kamtmp`
--

CREATE TABLE `kamtmp` (
  `idx` int(11) NOT NULL,
  `cntnum` bigint(20) NOT NULL COMMENT '계약번호',
  `amtodr` int(11) NOT NULL COMMENT '회차',
  `amtdue` date NOT NULL COMMENT '납기일',
  `rntamt` int(11) NOT NULL COMMENT '원리금',
  `prnamt` int(11) NOT NULL COMMENT '원금',
  `intamt` int(11) NOT NULL COMMENT '이자',
  `prnmal` int(11) NOT NULL COMMENT '미회수원금',
  `bildat` date NOT NULL COMMENT '발행일',
  `recdat` date NOT NULL COMMENT '수납일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kamtmp`
--

INSERT INTO `kamtmp` (`idx`, `cntnum`, `amtodr`, `amtdue`, `rntamt`, `prnamt`, `intamt`, `prnmal`, `bildat`, `recdat`) VALUES
(1, 20190730001, 1, '2019-10-30', 252161, 248328, 3833, 1747839, '2019-07-30', '2019-07-30'),
(2, 20190730001, 2, '2020-01-30', 252161, 248811, 3350, 1495678, '0000-00-00', '0000-00-00'),
(3, 20190730001, 3, '2020-04-30', 252161, 249294, 2867, 1243517, '0000-00-00', '0000-00-00'),
(4, 20190730001, 4, '2020-07-30', 252161, 249778, 2383, 991356, '0000-00-00', '0000-00-00'),
(5, 20190730001, 5, '2020-10-30', 252161, 250261, 1900, 739195, '0000-00-00', '0000-00-00'),
(6, 20190730001, 6, '2021-01-30', 252161, 250744, 1417, 487034, '0000-00-00', '0000-00-00'),
(7, 20190730001, 7, '2021-04-30', 252161, 251228, 933, 234873, '0000-00-00', '0000-00-00'),
(8, 20190730001, 8, '2021-07-30', 252161, 251711, 450, 0, '0000-00-00', '0000-00-00');

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
(1, '박건희', '서울 강남구 수서동 대진디자인고등학교', '990122-1234567', '164-05-12543', '010-1234-4321'),
(2, '홍길동', 'ㅁㄴㅇㄻㄴㅇㄹ', '9901213-1234', '123-12-1234', '01-1234-1234');

-- --------------------------------------------------------

--
-- 테이블 구조 `kcntmp`
--

CREATE TABLE `kcntmp` (
  `clcode` int(11) NOT NULL COMMENT '이용자코드',
  `cntnum` bigint(20) NOT NULL COMMENT '계약번호',
  `cntcls` varchar(1) NOT NULL COMMENT '계약상태',
  `cntbrn` varchar(1) NOT NULL COMMENT '부점코드',
  `cntdat` date NOT NULL COMMENT '계약체결일',
  `cntend` date NOT NULL COMMENT '만료일',
  `rntcal` int(11) NOT NULL COMMENT '납입방법',
  `userid` varchar(20) NOT NULL COMMENT '작업자',
  `cntrec` date NOT NULL COMMENT '접수일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kcntmp`
--

INSERT INTO `kcntmp` (`clcode`, `cntnum`, `cntcls`, `cntbrn`, `cntdat`, `cntend`, `rntcal`, `userid`, `cntrec`) VALUES
(1, 20190730001, 'B', 'S', '2019-07-30', '2021-07-30', 1, '한희정', '2019-07-30');

-- --------------------------------------------------------

--
-- 테이블 구조 `kcstmp`
--

CREATE TABLE `kcstmp` (
  `cntnum` bigint(20) NOT NULL COMMENT '계약번호',
  `acqcst` int(11) NOT NULL COMMENT '여신금액',
  `cntpym` int(11) NOT NULL COMMENT '총납일횟수',
  `basrat` float NOT NULL COMMENT '기준금리',
  `rntrat` float NOT NULL COMMENT '연신요율',
  `spread` float NOT NULL COMMENT '가산금리',
  `grend` date NOT NULL COMMENT '만료일',
  `amtcyc` int(11) NOT NULL COMMENT '납입주기'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `kcstmp`
--

INSERT INTO `kcstmp` (`cntnum`, `acqcst`, `cntpym`, `basrat`, `rntrat`, `spread`, `grend`, `amtcyc`) VALUES
(20190730001, 2000000, 8, 1.8, 2.3, 0.5, '2021-07-30', 3);

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

-- --------------------------------------------------------

--
-- 테이블 구조 `ktrnmp`
--

CREATE TABLE `ktrnmp` (
  `idx` int(11) NOT NULL,
  `trndat` date NOT NULL COMMENT '지급일(입금일)',
  `trnseq` int(11) NOT NULL COMMENT '지급청구서번호',
  `actcde` int(11) NOT NULL COMMENT '계정코드',
  `acttyp` int(11) NOT NULL COMMENT '차대변코드',
  `dramtw` int(11) NOT NULL COMMENT '차변금액-원화',
  `cramtw` int(11) NOT NULL COMMENT '대변금액-원화'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `ktrnmp`
--

INSERT INTO `ktrnmp` (`idx`, `trndat`, `trnseq`, `actcde`, `acttyp`, `dramtw`, `cramtw`) VALUES
(1, '2019-07-30', 1, 110, 1, 248328, 0),
(2, '2019-07-30', 1, 901, 1, 3833, 0),
(3, '2019-07-30', 1, 101, 2, 0, 252161),
(20, '2019-07-30', 2, 101, 1, 123123, 0),
(21, '2019-07-30', 2, 120, 1, 123123, 0),
(22, '2019-07-30', 2, 101, 2, 0, 246246);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `kamtmp`
--
ALTER TABLE `kamtmp`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `kcltmp`
--
ALTER TABLE `kcltmp`
  ADD PRIMARY KEY (`clcode`);

--
-- 테이블의 인덱스 `kcntmp`
--
ALTER TABLE `kcntmp`
  ADD PRIMARY KEY (`cntnum`);

--
-- 테이블의 인덱스 `kcstmp`
--
ALTER TABLE `kcstmp`
  ADD PRIMARY KEY (`cntnum`);

--
-- 테이블의 인덱스 `kratfp`
--
ALTER TABLE `kratfp`
  ADD PRIMARY KEY (`RATCDE`);

--
-- 테이블의 인덱스 `ktrnmp`
--
ALTER TABLE `ktrnmp`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `kamtmp`
--
ALTER TABLE `kamtmp`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `ktrnmp`
--
ALTER TABLE `ktrnmp`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
