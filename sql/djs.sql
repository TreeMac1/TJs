-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2025 at 11:48 PM
-- Server version: 8.0.41-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djs`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `comment`, `created_at`, `image_path`) VALUES
(4, 'trey', '999.00', 'chicken', '2025-02-17 22:03:47', 'uploads/juice6.jpeg'),
(5, 'juice', '999.00', 'oj', '2025-02-17 22:03:47', 'uploads/juice7.jpeg'),
(6, 'wires', '199.00', 'lead', '2025-02-17 22:03:47', 'uploads/juice3.jpeg'),
(7, 'apples', '4.99', 'i love apples\r\n', '2025-02-17 22:03:47', NULL),
(8, 'apple juice', '2.77', 'llucky juice\r\n', '2025-02-17 22:03:47', 'uploads/juice3.jpeg'),
(9, 'oran', '123.00', 'juice', '2025-02-17 22:03:47', NULL),
(15, 'chicken', '100.00', 'nuygget', '2025-02-18 01:15:20', 'uploads/red_jungle_fowl.png'),
(16, 'kasey', '999.00', 'yay', '2025-02-18 14:25:32', 'uploads/juice1.jpeg'),
(18, 'juicepapaya', '12.00', 'rusty', '2025-02-20 00:15:02', 'uploads/juice1.jpeg'),
(19, 'jooce', '1.00', 'yummy', '2025-02-24 17:54:58', 'uploads/juice5.jpeg'),
(26, 'test5', '555.00', 'test', '2025-03-03 21:39:13', 'uploads/juice4.jpeg'),
(29, 'test543', '999.00', 'test', '2025-03-03 22:11:16', './uploads/juice1.jpeg'),
(30, 'juicie', '100.00', 'tst', '2025-03-05 20:49:08', './uploads/juice7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_picture`) VALUES
(1, 'trey', '$2y$10$XKNTTuIcGa0gLA4XerHmAO0OEC1bzj4ylxh0CJOrqQ0poXHvXN7nO', NULL, NULL),
(2, 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'tboyce2@my.wctc.edu', 'uploads/juice4.jpeg'),
(3, 'trey3', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', NULL, NULL),
(4, 'trey5', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', NULL, NULL),
(5, 'brii', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL),
(6, 'josh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'test1234@gmail.com', 'uploads/juice3.jpeg'),
(7, 'admin1', '$2y$10$89euQDAsYTUHoKz25j3cNuSMYk8URW9c00/OwF1GE0rqO.EKvdLNS', '', NULL),
(8, 'ZAP', '$2y$10$53DMuy0eOKFgLzfigqChJ.9Ow04oj/4pH2eETx8WqTmsmrXFQln1q', NULL, NULL),
(9, 'c:/Windows/system.ini', '$2y$10$lm5KRRsRZt.hWJ..8axQYOsqonQZoEsRW9ZH5ar8rIQvqmAq229Ni', NULL, NULL),
(10, '../../../../../../../../../../../../../../../../Windows/system.ini', '$2y$10$0CrKe7aO3tkKaz8dkNZgO.TOgLcrd1.Revwz4aAaHILUSLorjtRtK', NULL, NULL),
(11, 'c:\\Windows\\system.ini', '$2y$10$vnBWDR/6jT05gTY3yGn1F.kvxpsSJwkWXIUdsAf0gi5Ey75emlKy2', NULL, NULL),
(12, '..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\Windows\\system.ini', '$2y$10$LflZw7a8YLkx3uB.BJagXeUfTMgJ8BCfU3ePED.i04GVT4aySuDBy', NULL, NULL),
(13, '/etc/passwd', '$2y$10$OWXL.zEYhu6ck6eC9ddx/uqJrVufOC/H79K3c5Mf4fXoKvd02dliC', NULL, NULL),
(14, '../../../../../../../../../../../../../../../../etc/passwd', '$2y$10$xw3zVAEEvc3SvT2RN04QIO15Uqh3jGsm7o3W2WCo0BmwncqeE8ium', NULL, NULL),
(15, '/', '$2y$10$89NNQUTqFINNCHx/lNVZKeoBOpVdtNLbfhJXZWaGYRwMqHMd8ELOS', NULL, NULL),
(16, '../../../../../../../../../../../../../../../../', '$2y$10$nAfAm4e9FYYpAVTqEof0eeeU21WH2k.3Pf7Afje5GfECKoLymlWFS', NULL, NULL),
(17, 'c:/', '$2y$10$GUXmdV/deVao/1Xt/auEDua3o9i1RLyc6XoMCvjdd29dJ2GRAE87y', NULL, NULL),
(18, 'c:\\', '$2y$10$EU4s8YcF9w.u5qDh57/WPe1GhlMF3zf4njSallQgyZxfLDEQETwnS', NULL, NULL),
(19, 'WEB-INF/web.xml', '$2y$10$Xi8GxGL0OtTG15HDBWLumuDUgUI7vSc8rQruUQd2MAsPJrvsGD2.S', NULL, NULL),
(20, 'WEB-INF\\web.xml', '$2y$10$2pfqDE3NPpcM7cnamVbMaOnBsIvE1BocPosLukwZyhKReI3uplW.W', NULL, NULL),
(21, '/WEB-INF/web.xml', '$2y$10$k3G/AJaM8vnedRDixyQwT.SH0uOe6NzBPiotMlvkeQ88tbkEQ5eEK', NULL, NULL),
(22, '\\WEB-INF\\web.xml', '$2y$10$u7etFuVUNCWbsT2RdLocKOgTnIBnfVNQ12DC9qVYuuiKINa2evqcu', NULL, NULL),
(23, 'thishouldnotexistandhopefullyitwillnot', '$2y$10$1iMIWHHF44SWKxUmSBwmGu6YhI/dLG2bYJPWy/w5JJ3romO1Koo4S', NULL, NULL),
(24, 'register.php', '$2y$10$rzG4pM2kqJO5l2E9119LUOVeS2cmjeK0xNnZfGPCtqVo9cobBhDbK', NULL, NULL),
(25, '/register.php', '$2y$10$AVhXEIzq1p3NrGJvIIOdC.z474ICrHwQv769rQgoVMFQnI8bEpoLG', NULL, NULL),
(26, '\\register.php', '$2y$10$4x6SLIVr.R8lcFqMAY/Q6OGQdHQFJneencCiL7qsQ9YOo2ZgLcDd6', NULL, NULL),
(27, 'http://www.google.com/', '$2y$10$uTjhpCEQkxFitBckSUhyE..pSxArQFTXRCA.2hPkuRkBLQpBo13AG', NULL, NULL),
(28, 'http://www.google.com:80/', '$2y$10$umkRTphgDWab.GCpPgq7C.w0/87WqGgP/Z097W7tbdY0tI8Uzj74q', NULL, NULL),
(29, 'http://www.google.com', '$2y$10$6HQZwrVbSHWFaY2PnHtnK.sbcncXhg5Up57aIPffpjRq7FosTNc0y', NULL, NULL),
(30, 'http://www.google.com/search?q=ZAP', '$2y$10$GhLLZNHhtltib2ktuScxFe82TYhB/7t/22Afh000knp5aj3REdDc2', NULL, NULL),
(31, 'http://www.google.com:80/search?q=ZAP', '$2y$10$lm9o.o/RIZqL4kqXOhvNS.nOaleQ3YQC/zKdjsmLUfeiYqdzy.0e2', NULL, NULL),
(32, 'www.google.com/', '$2y$10$9LhDPpOnCXx4QX1QUcSk6u.DK8.zhcIUJPbel4kQiknp/.O5YbTW.', NULL, NULL),
(33, 'www.google.com:80/', '$2y$10$XYjSZyRzZpRp4ntoEQi69Oi0Az0U78usXOvOSh0f2s04gptdmXEKe', NULL, NULL),
(34, 'www.google.com', '$2y$10$ORblUq0Me18SdmiVym2bNuKaQYBKt8bp2tTq8TBwe7J9fTgJl/8Si', NULL, NULL),
(35, 'www.google.com/search?q=ZAP', '$2y$10$825twxbq7wMXMUvMebJvYOFEFslQZ2Lq45szcgwzrn.J1UC1exe5m', NULL, NULL),
(36, 'www.google.com:80/search?q=ZAP', '$2y$10$Y5jDqpzV0Ai6XTFl09MEsOjOMn8xC9locPtCl5atFoz6Emc59v0xy', NULL, NULL),
(37, '', '$2y$10$k7oAjytd/gMGFQ4a5906LORr0KqidWIR1Ft11TqJOn/07yXwdxqu6', NULL, NULL),
(38, '3487074294092940629.owasp.org', '$2y$10$uYQ3mmCHknjGYPCa8G6RnOxd.HC08hpAIt6fEE6YUIbsfFwS30X5y', NULL, NULL),
(39, 'http://3487074294092940629.owasp.org', '$2y$10$QfVVvRjxTmcQqSJS2TLxRuJpYX5OlQ7rd2tXYOf08jXiiKsS4Om6C', NULL, NULL),
(40, 'https://3487074294092940629.owasp.org', '$2y$10$GYjYWLlDHHzBkSH5bqiie.jBbjfB8vwc7s8iN5ZhaIDL/dl9dDrJK', NULL, NULL),
(41, 'https://3487074294092940629%2eowasp%2eorg', '$2y$10$JEL8sM6cjHg6TGLK3E06r.UYCSUbW./IHAZUYWohTqXF0ZvvjLuxa', NULL, NULL),
(42, '5;URL=\'https://3487074294092940629.owasp.org\'', '$2y$10$MOFKsxzOpoiWHIDoHGjf1Ovltoxt3GlwiCtjlNjVv4kZoeaW85zXC', NULL, NULL),
(43, 'URL=\'http://3487074294092940629.owasp.org\'', '$2y$10$rznuB1a2TB4hn2hNgMy8uOSFJg0XwfV1/J6d.N5hNQ8Dohq61o6ga', NULL, NULL),
(44, 'http://\\3487074294092940629.owasp.org', '$2y$10$AJIThQNqAeP1m64T4ic.LO.UhqTeg0vGAlI739RZEaOqSeGvD5Fq6', NULL, NULL),
(45, 'https://\\3487074294092940629.owasp.org', '$2y$10$NAjy.ye4t7Yfqr6fElPs/eqvO5xtylGlQRXqTAM7LPQNf6/JDqzuS', NULL, NULL),
(46, '//3487074294092940629.owasp.org', '$2y$10$MZfH7wQ0KpEg6NymsZ5xOOKxp3oO8lOjx/jzcohkgrXIaUBbICz/q', NULL, NULL),
(47, '<!--#EXEC cmd=\"ls /\"-->', '$2y$10$d1OhKldupt/ZUkQ4gSR7SeVMIq5hvZDIIPTVqj7bdzVLHNs77p4XS', NULL, NULL),
(48, '\"><!--#EXEC cmd=\"ls /\"--><', '$2y$10$WUg8xTB8MFOvh.S7TswSOOVRW5sqGvuzHcuo3PRwl6dN/Mc.P06QK', NULL, NULL),
(49, '<!--#EXEC cmd=\"dir \\\"-->', '$2y$10$igZGY907UKfzCCdUfiCEUunX8ol6KDwaZUEEM6/DeY7hStWqira6O', NULL, NULL),
(50, '\"><!--#EXEC cmd=\"dir \\\"--><', '$2y$10$W/5rUliGU7tNVc6khiLtJu5OvWOXrENIDG1zeAS1PGGhIVh0M/vva', NULL, NULL),
(51, '0W45pz4p', '$2y$10$lZPQhheAIFNombGLNRPvDe3lcVcZtJDfxdAYZatWZ6pc5QHOpeYkS', NULL, NULL),
(52, 'ZAP0W45pz4p', '$2y$10$.0tXD8u8lQCRlP8WxDXNm.S3PI85j6MUHVGcZK0XmTmbEMdqCrHMC', NULL, NULL),
(53, '\'\"<scrIpt>alert(1);</scRipt>', '$2y$10$cN6B7gNRBoud3U8WmOx/VeP5vt1U/SICRFa00wmqkM37OMYwlv9Le', NULL, NULL),
(54, '\'\"<img src=x onerror=prompt()>', '$2y$10$SNBxTNcCi7JdHllq4ateduaRBjwwyNsIDcjBO6Q7IgwsmGjyLwxSe', NULL, NULL),
(55, 'zApPX3sS', '$2y$10$xqG0pGTaxikWtNtKzTEFoOk/CtGeY3qxDMZykU9dEZHoqvnxRfH7G', NULL, NULL),
(56, '\'', '$2y$10$1MUQIqqjSiZwoQgE2jyRAOF26Om9LB9CiGKIysk2rBqnILwm/q/cq', NULL, NULL),
(57, 'ZAP\'', '$2y$10$mz6hN2CJJnL83B3k9bJc7Opizah6AI38wA2AD3N9cV8.su1ZFoUT6', NULL, NULL),
(58, '\"', '$2y$10$vk5X5zi7HMo5ycHpGQEteuZdCYE1X.nAxiuX5YBeLWwlFzcOroUAS', NULL, NULL),
(59, 'ZAP\"', '$2y$10$52kK0jMB7esh3AwCW72VIeWr3766Xu0a.WGQSGI4gHrEAfB88o14m', NULL, NULL),
(60, ';', '$2y$10$UiH70V085ZzYlkJlf8UlXeCTNlx6u.QYHseajWt5JIXJ8dCI4erNq', NULL, NULL),
(61, 'ZAP;', '$2y$10$2d9qEzj48Jxsj9LLwlV/POJkLmnsHaaP0uG2kICPrj5Xdzq9XRKbG', NULL, NULL),
(62, '\'(', '$2y$10$Lk6OrDLHv35NbrnLcbv2ReHgdDQo37rNUBXSIdLou6veRPfGFw/.a', NULL, NULL),
(63, 'ZAP\'(', '$2y$10$bsYHsD8dh1WdXIqGSn5HMOjemAICxq5ylZaHrkK/RRtnq7dGc6cqe', NULL, NULL),
(64, 'ZAP AND 1=1 -- ', '$2y$10$JIwbKNEOITvothzAY0wlzO.OUyOrrN4njLmswcBKPa.i4zE0w4fwe', NULL, NULL),
(65, 'ZAP\' AND \'1\'=\'1\' -- ', '$2y$10$RPd0DzAa22i9b3pfeRnL2uQvL6lllP8FnoS7QSeTEV1BDmfAHDvs6', NULL, NULL),
(66, 'ZAP\" AND \"1\"=\"1\" -- ', '$2y$10$BhuC/NSjx.5umu8LGnX3y.BvLo8PcJfPSr.tvs8cwUn.oEmQosc8a', NULL, NULL),
(67, 'ZAP AND 1=1', '$2y$10$RHQPFthJRWkf3gQS9d8DuO2vvhWDSUUKyijcQNH2RcMzIqDNtIWL.', NULL, NULL),
(68, 'ZAP\' AND \'1\'=\'1', '$2y$10$i4ov8PsjHZlhu3mcSxd51.jGcJ0hqYqEwGDpVkIdLDREWzPbZ5eJq', NULL, NULL),
(69, 'ZAP\" AND \"1\"=\"1', '$2y$10$HOVPp3GeakbOldAzD/RbQeMY.2QaoCPlwAeJf0QtDQyANs4M1C5JW', NULL, NULL),
(70, 'ZAP UNION ALL select NULL -- ', '$2y$10$NNtDLrebwaDTYp1qAxZvJe0rt/WLx6t8sawgfj4TPyGrx1xKDOBgy', NULL, NULL),
(71, 'ZAP\' UNION ALL select NULL -- ', '$2y$10$kLAtxeER9apcNXmcxUFrieZftnRt/igzvXSVLd7rC7qtbWy8umzEe', NULL, NULL),
(72, 'ZAP\" UNION ALL select NULL -- ', '$2y$10$RN8dhSh955LCEX702sNP2OmE3fk0Bt7oOC7E7fQK.EwDxhLKyocEG', NULL, NULL),
(73, 'ZAP) UNION ALL select NULL -- ', '$2y$10$KTXtq9VHIt1JfezxdniH7eSBqOTnpoCiQ.rb5NofUbXC4opf.18eu', NULL, NULL),
(74, 'ZAP\') UNION ALL select NULL -- ', '$2y$10$qsjEW80J1MlIJ0Wpzqrc5Oe/pqpklNOcAM0m4lX8qgHvezvig0Dv6', NULL, NULL),
(75, 'ZAP / sleep(15) ', '$2y$10$ehsG8Y13PmaPG073JlHiZuh7fwrV5rx6K0FQiCq.bTG6q/xYP4PtS', NULL, NULL),
(76, 'ZAP\' / sleep(15) / \'', '$2y$10$8QAqt9sDggX.akitZJQHbuGVCQ4VDPSIgMaJRfBPr0/IAY8kTexjq', NULL, NULL),
(77, 'ZAP\" / sleep(15) / \"', '$2y$10$fqe.ckhPrOwHUTc0cxBY0eL1JZde7nd7VPzZz4ugax75w/AxyJ11i', NULL, NULL),
(78, 'ZAP and 0 in (select sleep(15) ) -- ', '$2y$10$VQWfXHqRfic9etLdzgXDCObZ2tDLwcVKz9jUPfzO.EZqONl7g0HgK', NULL, NULL),
(79, 'ZAP\' and 0 in (select sleep(15) ) -- ', '$2y$10$Vkm.bzZXbFGvePCnFKtN0.OGAOEOJgUHIJiy3GjnrEtN2sTT0lYj.', NULL, NULL),
(80, 'ZAP\" and 0 in (select sleep(15) ) -- ', '$2y$10$aoxNwjFvDem9cXmLlQpk3eunWDUefw3lwKaGPrb9yaWCjYo4rMFc.', NULL, NULL),
(81, 'ZAP where 0 in (select sleep(15) ) -- ', '$2y$10$pkmn9iXXRJQNfJs9cChEROpOdq5VK4/HZ.ibSEXvd9MLeVfZGAMW.', NULL, NULL),
(82, 'ZAP\' where 0 in (select sleep(15) ) -- ', '$2y$10$QV5QP19UjuQ4gQDRojezgOLf3Nk6O2FQn4Vn0PzPGKz.BdMi79x3G', NULL, NULL),
(83, 'ZAP\" where 0 in (select sleep(15) ) -- ', '$2y$10$WRksOxnRS80zq2rcjNMBMOtRB1wIbtcK9BlB8sFfi7SGnypjPJEde', NULL, NULL),
(84, 'ZAP or 0 in (select sleep(15) ) -- ', '$2y$10$jxng3/GXx2Qst83fL3N/k.YZUsFq/Iz1bV88bUhQhVwCwdDYVDhaC', NULL, NULL),
(85, '; select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\' -- ', '$2y$10$PLF8UP/bPKIBmbLhvBr3uuOPbuaA3p2Lv4Bv3/if9kweCMatTBrgu', NULL, NULL),
(86, '\'; select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\' -- ', '$2y$10$7BXOpkzV7H.9m7tTEx/.Huh1foARN4k0Jmbkh3rLxBN.Xi5xLJTEa', NULL, NULL),
(87, '\"; select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\' -- ', '$2y$10$VmeQeq0vsS61wVz9Sppvb..RS.g629CaK28Ad42iGE5LmD/leD5Ca', NULL, NULL),
(88, '); select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\' -- ', '$2y$10$2q7XjRs/uiznfeU3q4/WGuqwXuaiR3ICh2.qcUcO1IafKu8BQs6ym', NULL, NULL),
(89, '\"java.lang.Thread.sleep\"(15000)', '$2y$10$0POELgGt8ll8kFwdb98TFu2DBJyW3dL8AUOsMgel/9jcaP8MQlfUS', NULL, NULL),
(90, 'ZAP / \"java.lang.Thread.sleep\"(15000) ', '$2y$10$ml9Q365079imwbeLYjp2LOUI5CZS9oLodADRK7z9TLOwOG7gVpSfS', NULL, NULL),
(91, 'ZAP\' / \"java.lang.Thread.sleep\"(15000) / \'', '$2y$10$/8VXxslFSvwR1foJLy8ReuVCLaK6CIR/Fh15jMnv.BY.cbvUlTG2G', NULL, NULL),
(92, 'ZAP\" / \"java.lang.Thread.sleep\"(15000) / \"', '$2y$10$sGkBk8KcbUP399166ZEvA.rWHphvjg63QH57hpKuPrR24qs1o3r1y', NULL, NULL),
(93, 'ZAP and exists ( select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\') -- ', '$2y$10$jMMO4OK/RH.kkhZK790LFuvsQw82YyZs2rfFIe/aYP6lGwfECh2b2', NULL, NULL),
(94, 'ZAP\' and exists ( select \"java.lang.Thread.sleep\"(15000) from INFORMATION_SCHEMA.SYSTEM_COLUMNS where TABLE_NAME = \'SYSTEM_COLUMNS\' and COLUMN_NAME = \'TABLE_NAME\') -- ', '$2y$10$9NoQbbY/lrTeLt1XV0GWFebO8V1/QpX.Up0Q1Or5szaFip0euQ3Ge', NULL, NULL),
(95, 'case when cast(pg_sleep(15.0) as varchar) > \'\' then 0 else 1 end', '$2y$10$P4Pkr3j8W8zS5axn8JGqquskVU.9Y3i/QLQylKcrsh7fr1tGzU9C.', NULL, NULL),
(96, 'case when cast(pg_sleep(15.0) as varchar) > \'\' then 0 else 1 end -- ', '$2y$10$It02kQaZw3x1hqFV6ARWsO9PebadSIF/98RDr3flLKm3EUx91tDZO', NULL, NULL),
(97, '\'case when cast(pg_sleep(15.0) as varchar) > \'\' then 0 else 1 end -- ', '$2y$10$C9cteA.yq3efYH/lHVyIiOIJjXHdPHg1DG3Z5HnJukkRPiJ8GZPZ2', NULL, NULL),
(98, '\"case when cast(pg_sleep(15.0) as varchar) > \'\' then 0 else 1 end -- ', '$2y$10$KWgRW.PD6jFHJGNWIILn3OzIXGOnRrHcnYyRUS4CknIu.q23qU16u', NULL, NULL),
(99, 'ZAP / case when cast(pg_sleep(15.0) as varchar) > \'\' then 0 else 1 end ', '$2y$10$dbio7pZpCrVYrZtPj2Eb5.8/BCs6NX0OLNFltoI5fm/ppK2x46dQe', NULL, NULL),
(100, 'case randomblob(100000) when not null then 1 else 1 end ', '$2y$10$DcE.hv7hf2psLLwpkkBAEuHRHf/D2V.2IAdFZOCh0m7bpYPc.trE2', NULL, NULL),
(101, 'y4rhjwrjh39q3rt6atmildhz95iempn1fet8u4zedcr410m8c02zormy', '$2y$10$njZeai/e9aeFEvmQCVd16eQ5RGQ.uzSz1aO5eox/vdLE3AyIN8SeO', NULL, NULL),
(102, 'case randomblob(1000000) when not null then 1 else 1 end ', '$2y$10$9jcblu859Q7WIZw6G0laquDRTgDfQtAXqJ.KD3ySET82WjUZlix72', NULL, NULL),
(103, 'case randomblob(10000000) when not null then 1 else 1 end ', '$2y$10$xJv442phpvrkU/0SXIMOQuaJfUq1HmnucoMtbiDQKAVv1UmKlF.Si', NULL, NULL),
(104, 'case randomblob(100000000) when not null then 1 else 1 end ', '$2y$10$wxsZvYX3hIn9kTqhsBrDSetMCJ4JbjH1BY8f6h0DQIZaSOJ4TcuxO', NULL, NULL),
(105, 'case randomblob(1000000000) when not null then 1 else 1 end ', '$2y$10$Gk23p8I84rxAPHGuoLk8m.goVADnLwySTVbjoSrKnl.RM7L6OdYb6', NULL, NULL),
(106, 'ZAP WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$1Z9rq9WvElyOyeqeV5qZpOS0THOjg7oZ6k9eCIauKyD7asvvL9QUW', NULL, NULL),
(107, 'ZAP\' WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$N/He/dpvEhMYqOaQfrNwheYC6YYhXJP1Qk5NFsyrJcS/6MtQexXMi', NULL, NULL),
(108, 'ZAP\" WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$EiBzFEYbHY1vZaqbz.HZ7uGkMW4d5L5A1PCi63HSejfvdZpfuHYIa', NULL, NULL),
(109, 'ZAP) WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$DfXEF4ZlzhNQTovB4tDaE.UcAR9N5Vi0IoxvfbYNSmxzwb/tIT8W6', NULL, NULL),
(110, 'ZAP) \' WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$cl13JwFxouup5x5sY/U05OHT4072CjoSL6kV66S8NHsnsWtYfRJXe', NULL, NULL),
(111, 'ZAP) \" WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$SiqJs6VTKJIrHsvHl42guusmVY2zfjr09/9AfHL1ZdxkdWNVyDWzm', NULL, NULL),
(112, 'ZAP)) WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$Iaz9ZBv0fiXpARhXcf8LFeWOV8k1gyJF0aO9u0XMnoS.uBtRKbHFy', NULL, NULL),
(113, 'ZAP)) \' WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$wIQ23OaL25cmvnA9syQ/rOQtewPjs8mE01.nKwLQgOhdlfRZ1cdrG', NULL, NULL),
(114, 'ZAP)) \" WAITFOR DELAY \'0:0:15\' -- ', '$2y$10$9DifZAv88ZSxkCEPfemJqOW/EO4BNZKzD2iV9A.pa7MdKgxv7brGm', NULL, NULL),
(115, 'ZAP) WAITFOR DELAY \'0:0:15\' (', '$2y$10$Xv9oVB6PLV167F94ZPwDD.WLiK4lJ4KhBrC3sGih.unXsbDRrDOQ6', NULL, NULL),
(116, '\";print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));$var=\"', '$2y$10$2B9H7KTvb8hG8Z5aRUmMuu.Rix8JwuRUes.eEWsKa9JmMngKttsye', NULL, NULL),
(117, '\';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));$var=\'', '$2y$10$HjCjhaSZf0vRA00ViblqKeruitgdC4KgT5UGNk3d5femvzMs5dEUa', NULL, NULL),
(118, '${@print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110))}', '$2y$10$lxeO8l1SJr6WcFHxRb8HneCtA5E5Ho.y77kGRMSqxCmPMgyPIa1hS', NULL, NULL),
(119, '${@print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110))}\\', '$2y$10$Dje8zXELIvsB5RX8jCS2xO/qLBCMvqJeOxozI8FaAVSEh6XBMGeMe', NULL, NULL),
(120, ';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));', '$2y$10$MspEiHXIxOu3H.2E8hXLdOPo123fa2vm55S2ES6SUqpqB5Tp987NS', NULL, NULL),
(121, '\"+response.write(229,352*234,927)+\"', '$2y$10$DLeEUNUdESb4RUYnNaXmBeHeZaSFwTNtJxxgaZsrFyLRVGPPUp8AG', NULL, NULL),
(122, '+response.write({0}*{1})+', '$2y$10$9.FojrRyNVoU.kia.CAZ1.Xw4S0cJCxLpGUmjVm1XqXzjWRpWRW1C', NULL, NULL),
(123, 'response.write(229,352*234,927)', '$2y$10$mASwfMIDslbqcFPgo.0YuOkDfpGZhcmoJMPNktYanXbzmlsaS2E9e', NULL, NULL),
(124, 'cat /etc/passwd', '$2y$10$GUO2eSiHiJYSM9Ng/w/Al.1mJ/e443M5wNkYen6XLgPRbToospI26', NULL, NULL),
(125, 'ZAP&cat /etc/passwd&', '$2y$10$3ZzyK7WfW3JwuAsiJA9AqOQ2WlvgTA2gvSyKGQKh5mg5UZuvNsGsu', NULL, NULL),
(126, 'ZAP;cat /etc/passwd;', '$2y$10$3txHKGVIXS1M/NyosdqLNuiAug2B5ttgIkGICZVrQcO6F.lXafTSa', NULL, NULL),
(127, 'ZAP\"&cat /etc/passwd&\"', '$2y$10$xmmJs2Pzn4g7OkZeQskwz.mnke8u/VgFRFLE2aCBi5syaLXWFgzlG', NULL, NULL),
(128, 'ZAP\";cat /etc/passwd;\"', '$2y$10$4MB5V4FklfG2Q3KOSg/RZe1BlWJk8SX7beCawXk1V5d9HtmySu38S', NULL, NULL),
(129, 'ZAP\'&cat /etc/passwd&\'', '$2y$10$lcTkYBNIlQRa9UKuq9m8ruduQI/Pt5rJD09W6WZyAPZ0UpyS0sKDW', NULL, NULL),
(130, 'ZAP\';cat /etc/passwd;\'', '$2y$10$suRngItlOCsgKg6udocPIO8fjyxr6bZT8LyjcYMdw/M8/rJxQpgoW', NULL, NULL),
(131, 'ZAP&sleep 15.0&', '$2y$10$Rtw1HqiywWBkofW1lEjQFuTVBFLXxsx/kHYWflKJLhnSC416zGZ4q', NULL, NULL),
(132, 'ZAP;sleep 15.0;', '$2y$10$1BvSrFyxfJLUTe9wD1SG.OTi9Jiz840qwJfERJLhEJLOkzYCXv2dW', NULL, NULL),
(133, 'ZAP\"&sleep 15.0&\"', '$2y$10$sUEbj.S.sdSvDuwNYzBhmuEBcEl9g1JABfV5pbj.dRquz8AmlGh/.', NULL, NULL),
(134, 'ZAP\";sleep 15.0;\"', '$2y$10$CQ.patWs4OyiPdrZD0TwuemwIFcT9j3AoRim5hXWdPymaOS9Qacva', NULL, NULL),
(135, 'ZAP\'&sleep 15.0&\'', '$2y$10$vPYT7aJHbpWdVZBGoq9Hg.aaB1IXKXtS.2yOAJRcxZWPqma4Qu.uq', NULL, NULL),
(136, 'ZAP\';sleep 15.0;\'', '$2y$10$Z52IjfRWbjLWzigcAGc1D.qoCx4Oz4OmfjP3rm9AiEcHpA8Iyc2JO', NULL, NULL),
(137, 'type %SYSTEMROOT%\\win.ini', '$2y$10$8z7U0i13F.Wa8XS/vf0nue5ydDkZiQxjc64AhmF0gZQ0umx15UPle', NULL, NULL),
(138, 'ZAP&type %SYSTEMROOT%\\win.ini', '$2y$10$WrHr/mBGtIp71Dhu2mzZReVhqjLrPby8KZNyyqgUCdo.C6.iKP6n2', NULL, NULL),
(139, 'ZAP|type %SYSTEMROOT%\\win.ini', '$2y$10$vb7MA.RD8HcE3bL3oIMrk.HP3jh2fvhJGEX3MK3iY1YJ32lp0CVRC', NULL, NULL),
(140, 'ZAP\"&type %SYSTEMROOT%\\win.ini&\"', '$2y$10$jGU4p6sawr4CJaxLuQfcrepazclk18zq63MclKeIVsJY8jutKLoTK', NULL, NULL),
(141, 'ZAP\"|type %SYSTEMROOT%\\win.ini', '$2y$10$xftiGb.l2DZvWOML6XqIz.UrdfcsMFDqSfL6kqXcuHPK8Cll2vmq6', NULL, NULL),
(142, 'ZAP\'&type %SYSTEMROOT%\\win.ini&\'', '$2y$10$H8DiFXd6zuHGjJZzgKKaUeMYKC4Mjv17yhGUTg/Gd38Qh4hRBWJJW', NULL, NULL),
(143, 'ZAP\'|type %SYSTEMROOT%\\win.ini', '$2y$10$gCCogYPuCwROrSmmp1qqMOswS9ZkFgM00eKdvgyfPnYAhVxTbYz3W', NULL, NULL),
(144, 'ZAP&timeout /T 15.0', '$2y$10$9BcHD221vTVwmkO0k2ZOJuZxVR/0dLKsTDYMilD4hm9MjAF5Bi/nm', NULL, NULL),
(145, 'ZAP|timeout /T 15.0', '$2y$10$k9aKpEeDW9nbZD2pb7V1quOPhQM1ABdKzxx51k0hGgdA6/ZBEEPuS', NULL, NULL),
(146, 'ZAP\"&timeout /T 15.0&\"', '$2y$10$kDd1lHvaR4IffdIt06lrIupL/AVdQS9F.PhQyY8I1oisjNzyPT3re', NULL, NULL),
(147, 'ZAP\"|timeout /T 15.0', '$2y$10$wCHSilCUlZ8z36sJ0.NyK..QJzrQrbPW0v29DGwimS4obyf7g3ZZe', NULL, NULL),
(148, 'ZAP\'&timeout /T 15.0&\'', '$2y$10$AwJcpt1egBKa53qtBdFJBOlc8lrzG4QP5lJUMAvUkHMxnN.V/dGzG', NULL, NULL),
(149, 'ZAP\'|timeout /T 15.0', '$2y$10$XywIy0Zle4VabLxdxVAmV.DrPCdT7UAn4f3f11AN/Iwu1J0ZpB6xi', NULL, NULL),
(150, 'get-help', '$2y$10$Y1kRiPNIp8p276rZ/XvNBuw8Sl9bbHZDv6VVYKWWtWJWfYomSalFi', NULL, NULL),
(151, 'ZAP;get-help', '$2y$10$CjzrGacsdXAqq6b08DdxHuL5GST/UG64PyjEkMuGNdnRA4mYsf32O', NULL, NULL),
(152, 'ZAP\";get-help', '$2y$10$5xLtnlij7ObtwLFouPLv6OrU5VgdoYepQ/0sNjhGcN6Z2tHyFobZm', NULL, NULL),
(153, 'ZAP\';get-help', '$2y$10$63dsPN86hOWKKrVq7M65ReeRkmvX/Ss1yse0Ryx3YaVBMBjj2Nzp.', NULL, NULL),
(154, 'ZAP;get-help #', '$2y$10$HkZbP451UtW1pNLqxq/WFum/tmmhPZy7nvpQD4sL4h5SrYaAulgcS', NULL, NULL),
(155, 'ZAP;start-sleep -s 15.0', '$2y$10$RvS.0WQz9pxMC.7/vdVOD.uAPQ.Z8wXRKGOoyM/vPVz7OSTpEoela', NULL, NULL),
(156, 'ZAP\";start-sleep -s 15.0', '$2y$10$8CZ/J6afNPeIl8yGu.M7JuS309FYr7uvI3t8gUDzkvJMnPN/6WG7.', NULL, NULL),
(157, 'ZAP\';start-sleep -s 15.0', '$2y$10$ZJjSGOivJ3XDw9iIkr2m/eUwD8N.60I2JTLkOX0VRHuI96m.AK5yK', NULL, NULL),
(158, 'ZAP;start-sleep -s 15.0 #', '$2y$10$d4e1yPnLc6VrVvhx95OahOv4zef8owbzYdSoXYG18/u5u4tdRA7lu', NULL, NULL),
(159, '\"\'', '$2y$10$YzRmd61BdYSFdfRXRuVFXOapNALYbFiLtM/LoETy0vJaJmiLfUFn6', NULL, NULL),
(160, '<!--', '$2y$10$OAV/TLN8IOkxoGit1XFp4.Qxn1kFPpGPBSntbYUMrXXBYyXCb93zq', NULL, NULL),
(161, ']]>', '$2y$10$Ad0OdQSesWWok04wG929.OoVVZaCJDlscGH5gocXD3sZukNz615v6', NULL, NULL),
(162, 'zj 3089*4367 zj', '$2y$10$HKBnXtowflWUesO.RqpGjuCw1pKRmG1EaFj7Is/0WnUAmPc44VZIC', NULL, NULL),
(163, 'zj{5454*8967}zj', '$2y$10$YU97nlniA6CL9.aZ33Q3Peo.gxFdMCUovvNN7yUsmjQrbvaBtXHQS', NULL, NULL),
(164, 'zj${1691*9785}zj', '$2y$10$Jhg15w5omSbmOcHzSqHOB.kvLd9odscPfrTnuEJYVRUNyJNjSKmN6', NULL, NULL),
(165, 'zj#{3109*3286}zj', '$2y$10$.BzRO1oAIxoZYhd6jtGREutTGYZ1XNcXajNHYYXjERfzL5DhHUcN6', NULL, NULL),
(166, 'zj{#5581*2981}zj', '$2y$10$ngoirmrAju/UpvnddDgRXekaB.QTXBSi4ggQ/P9ZsioEt4uIc8V6u', NULL, NULL),
(167, 'zj{@5174*6547}zj', '$2y$10$83.bvoCBsK8FHBNkGBOIaeLCC3WegQrifz46cqcds6JLpqt9hVNc2', NULL, NULL),
(168, 'zj{{4871*2988}}zj', '$2y$10$KO.x4m6Iu9PaOC5hr9TFMeQMnFjJ2qsm3DQT2x6Y19JUhhtYy8wPe', NULL, NULL),
(169, 'zj{{=4783*5761}}zj', '$2y$10$qKtbKngiBkV6h7ojagm3S.qA/UEs8Ugrp4Ye6cWSx/OMtFO5rPSh2', NULL, NULL),
(170, 'zj<%=7601*6711%>zj', '$2y$10$oSA73iesymI/IqlyEKvQmu2rZVFtHoXv1hb/VxuKCVAKeQpqn1QXm', NULL, NULL),
(171, 'zj#set($x=7677*9463)${x}zj', '$2y$10$q7Y12RcAHGTEx3mca8CwbeCjW5B97nfmbrh96rAhBFxORajnFFZDi', NULL, NULL),
(172, 'zj<p th:text=\"${4654*4929}\"></p>zj', '$2y$10$Rki6ThtJ34szGT0kKbF.K.zmep.mBBwyVgcE6b8yZrOkZXy5zzNGi', NULL, NULL),
(173, 'zj{@math key=\"1424\" method=\"multiply\" operand=\"8799\"/}zj', '$2y$10$WHq.hG0FEs5fJNP4ZrEzbenPtX65Qi8yKl3lP95YPhYh/O0DLEvce', NULL, NULL),
(174, 'zj{{12650|add:80520}}zj', '$2y$10$uFZZu.81Bu9fEx85v7Em9u8hA6eOlTumXSrUlZ/nVuNexMQddaitm', NULL, NULL),
(175, 'zj{{print \"4465\" \"8102\"}}zj', '$2y$10$gOyU5GTJzHtXf4r4GhNqou0EkQ0IbAUJRoQUXQsw11phJbulFh0pG', NULL, NULL),
(176, '<#assign ex=\"freemarker.template.utility.Execute\"?new()> ${ ex(\"sleep 15\") }', '$2y$10$ixVZIQNXKNsEsTeD44pwNO3qe/QurCs9HM5v7TFRGbQt34.eR4IE2', NULL, NULL),
(177, '#set($engine=\"\")\n#set($proc=$engine.getClass().forName(\"java.lang.Runtime\").getRuntime().exec(\"sleep 15\"))\n#set($null=$proc.waitFor())\n${null}', '$2y$10$wJL0EjGUuYrs9e.M4l2Fbu9s2S228qz2H6uCRd2QQ8n2EKuRwjk3C', NULL, NULL),
(178, '{{= global.process.mainModule.require(\'child_process\').execSync(\'sleep 15\').toString() }}', '$2y$10$Z4ewOFmqiAXQ4qcoH2PjUufhomlz7yypIueHPLtlzxUQkNZaenKX2', NULL, NULL),
(179, '<%= global.process.mainModule.require(\'child_process\').execSync(\'sleep 15\').toString()%>', '$2y$10$XOAA0/bELw9Ug4jRQMr1hOp6pq9lx7V8glukdL9DJY7q44boJvj16', NULL, NULL),
(180, '#{global.process.mainModule.require(\'child_process\').execSync(\'sleep 15\').toString()}', '$2y$10$zFfcOVYMs4demcaRZ6TqE.NLUQsFCmz8XYX6HXfqKTCzgplkKHvWa', NULL, NULL),
(181, '{{range.constructor(\"return eval(\\\"global.process.mainModule.require(\'child_process\').execSync(\'sleep 15\').toString()\\\")\")()}}', '$2y$10$8Apj9NldgpGz9fc3od9bq.hJR/gi3jO2x001ZvY0SLvxejdyhmOrS', NULL, NULL),
(182, '{{\"\".__class__.__mro__[1].__subclasses__()[157].__repr__.__globals__.get(\"__builtins__\").get(\"__import__\")(\"subprocess\").check_output(\"sleep 15\")}}', '$2y$10$pGoHI02AgJDuWIpKNr8nw.LPdtSP3h/4RAuJ5nFMYuQ8yID6Xdbay', NULL, NULL),
(183, '${__import__(\"subprocess\").check_output(\"sleep 15\", shell=True)}', '$2y$10$uBqQ7SSmzXIryU37Uan1juN.i3AQ947y1A1LW9isHG30TEMjptQP2', NULL, NULL),
(184, '{{__import__(\"subprocess\").check_output(\"sleep 15\", shell=True)}}', '$2y$10$RYMKCo9vHAzqSnGpjVckNeaoAnx/w.EAa4GvAiR5i5dAdH1UHmsaS', NULL, NULL),
(185, '<%=%x(sleep 15)%>', '$2y$10$5L1.AHGXeN39trfRXZtTceksE3NEaBif3uo3JVae342ZIMs1shOye', NULL, NULL),
(186, '#{%x(sleep 15)}', '$2y$10$nU4EBS61dalB.9PZuvJT7.S9YkPJJN.FnwKNJzDrJBnxzdTtebz5S', NULL, NULL),
(187, '{system(\"sleep 15\")}', '$2y$10$Sn3FoUWCZMNQ33zRDDeWKuSJgjhAIPUkQnt6P/Z62u/IjrbJvBrfW', NULL, NULL),
(188, 'ZAP%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s%n%s\n', '$2y$10$jrDxhlc85q1m6DZn1XB/iOBPUiDzCz.CBV9UhOBreC1ISwlfxYsX.', NULL, NULL),
(189, 'ZAP %1!s%2!s%3!s%4!s%5!s%6!s%7!s%8!s%9!s%10!s%11!s%12!s%13!s%14!s%15!s%16!s%17!s%18!s%19!s%20!s%21!n%22!n%23!n%24!n%25!n%26!n%27!n%28!n%29!n%30!n%31!n%32!n%33!n%34!n%35!n%36!n%37!n%38!n%39!n%40!n\n', '$2y$10$FhfuT0Ou8PpZ2Iu7x3j.teogcZ5vGg.EAnqIQLpGce/0Mv0GmeJNe', NULL, NULL),
(190, 'Set-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905', '$2y$10$kRorIiSvB8Hp7qDLJSkd7.Sm1IgAhzwStNT.YOcaGfqvXRhZ5vzYq', NULL, NULL),
(191, 'any\r\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905', '$2y$10$1izX5NUV2Ur23CLGBFPD5.znmGh1UslMoAwkR5BU40kA.d2Ozg5Sm', NULL, NULL),
(192, 'any?\r\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905', '$2y$10$CaJgH.RPY3XUqFSQ/2WB6ODSzJBzMiXNEXXzYhUE.4QR2Tkvy2Vbq', NULL, NULL),
(193, 'any\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905', '$2y$10$onue7pov2/zOgJNnf623f.j71h/icjhzKC7tB5XvqloJYQ0QNN/v6', NULL, NULL),
(194, 'any?\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905', '$2y$10$64q8KhTAf11opzTicFxkPuCdMIeJOotO4sjTt71n/eusQD37DREWq', NULL, NULL),
(195, 'any\r\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905\r\n', '$2y$10$N897D/UlbQA5/C6hM1MMCuvYYfKuPUA4L.WQxHKv06X50h3XoaM3C', NULL, NULL),
(196, 'any?\r\nSet-cookie: Tamper=94417c89-49ef-4eff-b109-382fd1e87905\r\n', '$2y$10$GR/4bNPeYhsvfSVV0lCG0O.nkhGDlMr01CBniKC34C6aWbGMfl.YS', NULL, NULL),
(197, '@', '$2y$10$nAOQB7KDZgI40s3sehcBAu7sCzf6UXmm.F2dHfJLbekIcFXa/Iamq', NULL, NULL),
(198, '+', '$2y$10$zfEK1DtFRNJkfkzvzUPw0ui5PK3FKhuTHfhdy0Ba5fKbK9DUqWy8q', NULL, NULL),
(199, '|', '$2y$10$vKj28hYxhRkrfBsejcdnV.u5PJHzh4L5fmAh3hnmifVOhMo3u0NKq', NULL, NULL),
(200, '<', '$2y$10$o7VBCRZUU.pvTvJ0r7h.deekAM/ki49LLV9SXNW96OH2uMTo7SkIu', NULL, NULL),
(201, '<xsl:value-of select=\"system-property(\'xsl:vendor\')\"/>', '$2y$10$oM3GDP0524HLN9u435II.e6Lhuq6xkYyZstfnIvhVhYY8Wo4R26Ea', NULL, NULL),
(202, 'system-property(\'xsl:vendor\')/>', '$2y$10$xCBVui4wzvbuPGO9Dbz2zOnbj5Glb8xZSEI2IaXgY6JlxqvvBKxr6', NULL, NULL),
(203, '\"/><xsl:value-of select=\"system-property(\'xsl:vendor\')\"/><!--', '$2y$10$SsGioLbz5mMOrGzpQ6RsIOHyMv46oHyaRtWunDiU5vGyWjnuLrQqy', NULL, NULL),
(204, '<xsl:value-of select=\"system-property(\'xsl:vendor\')\"/><!--', '$2y$10$Le3uSspW8iSqj7LqGe.vg.VZrj/E6a2XK5IRuzVzEMoHPaCyG5sxC', NULL, NULL),
(205, '<xsl:value-of select=\"document(\'http://10.151.107.3:22\')\"/>', '$2y$10$BAFpdaKtBe/GySFsyHPJgevDFH/CU/NRESkRR2yZOd3CJJ6KYX6nq', NULL, NULL),
(206, '<xsl:variable name=\"rtobject\" select=\"runtime:getRuntime()\"/>\n<xsl:variable name=\"process\" select=\"runtime:exec($rtobject,\'erroneous_command\')\"/>\n<xsl:variable name=\"waiting\" select=\"process:waitFor($process)\"/>\n<xsl:value-of select=\"$process\"/>', '$2y$10$sLXgFOj.T3Hg/KhbHGG2c.0yAT2NPpKjR0CNxgxhtmCXAJzt4d.Sy', NULL, NULL),
(207, '<xsl:value-of select=\"php:function(\'exec\',\'erroneous_command 2>&amp;1\')\"/>', '$2y$10$OthbhHSKU.l2fnLHJWh8lu7AqP2hYhTvaDDXQQ6cYbG6St0jiCcZK', NULL, NULL),
(208, 'debbye', '$2y$10$ICchN/CDLGjA8oQCzs5rFevWpvuXxvWIiIQpFH0345ETyIaI9axcO', NULL, NULL),
(209, 'trey.admin', '$2y$10$3pFokQolckYZjT1E5UFvBegZrQmj57nyjL.23iPMBqfpBx37I6uaO', 'test1234@gmail.com', ''),
(210, 'josh.admin', '$2y$10$jG0U1IS4wcgby2V/DKTsuu5d.z/4RceLrnkewNLLrE8TAL4OOoh6e', NULL, NULL),
(211, '\' or 1=1;--', '$2y$10$rUwo9/G917ZZAm38aK3w3e/pyc7qKYtikIbb/ML1gWaQBrABNehaq', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
