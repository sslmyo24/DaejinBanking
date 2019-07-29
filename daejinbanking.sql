-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 19-07-29 08:55
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
  `cntnum` int(11) NOT NULL COMMENT '계약번호',
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
(13, 1, 1, '2019-08-26', 84375, 82459, 1917, 915625, '2019-07-29', '2019-07-29'),
(14, 1, 2, '2019-09-26', 84375, 82620, 1755, 831250, '0000-00-00', '0000-00-00'),
(15, 1, 3, '2019-10-26', 84375, 82782, 1593, 746874, '0000-00-00', '0000-00-00'),
(16, 1, 4, '2019-11-26', 84375, 82944, 1432, 662499, '0000-00-00', '0000-00-00'),
(17, 1, 5, '2019-12-26', 84375, 83105, 1270, 578124, '0000-00-00', '0000-00-00'),
(18, 1, 6, '2020-01-26', 84375, 83267, 1108, 493749, '0000-00-00', '0000-00-00'),
(19, 1, 7, '2020-02-26', 84375, 83429, 946, 409374, '0000-00-00', '0000-00-00'),
(20, 1, 8, '2020-03-26', 84375, 83591, 785, 324999, '0000-00-00', '0000-00-00'),
(21, 1, 9, '2020-04-26', 84375, 83752, 623, 240623, '0000-00-00', '0000-00-00'),
(22, 1, 10, '2020-05-26', 84375, 83914, 461, 156248, '0000-00-00', '0000-00-00'),
(23, 1, 11, '2020-06-26', 84375, 84076, 299, 71873, '0000-00-00', '0000-00-00'),
(24, 1, 12, '2020-07-26', 84375, 84237, 138, 0, '0000-00-00', '0000-00-00');

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
  `cntnum` int(11) NOT NULL COMMENT '계약번호',
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
(1, 1, 'A', 'S', '2019-07-26', '2020-07-26', 1, '한희정', '2019-07-26');

-- --------------------------------------------------------

--
-- 테이블 구조 `kcstmp`
--

CREATE TABLE `kcstmp` (
  `cntnum` int(11) NOT NULL COMMENT '계약번호',
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
(1, 1000000, 12, 1.8, 2.3, 0.5, '2020-07-26', 1);

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
  `trntyp` int(11) NOT NULL DEFAULT '1' COMMENT '청구서종류',
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

INSERT INTO `ktrnmp` (`trntyp`, `trndat`, `trnseq`, `actcde`, `acttyp`, `dramtw`, `cramtw`) VALUES
(1, '2019-07-29', 1, 110, 1, 82459, 0),
(1, '2019-07-29', 1, 901, 1, 1917, 0),
(1, '2019-07-29', 1, 101, 2, 0, 84375);

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
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `kamtmp`
--
ALTER TABLE `kamtmp`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
