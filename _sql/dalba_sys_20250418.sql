-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: dalba_sys
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_announcement`
--

DROP TABLE IF EXISTS `tb_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_announcement` (
  `a_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `a_year` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_announcement`
--

LOCK TABLES `tb_announcement` WRITE;
/*!40000 ALTER TABLE `tb_announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_attach`
--

DROP TABLE IF EXISTS `tb_attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_attach` (
  `at_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `b_type` varchar(20) NOT NULL,
  `b_id` bigint(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_old_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_attach`
--

LOCK TABLES `tb_attach` WRITE;
/*!40000 ALTER TABLE `tb_attach` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_board_attach`
--

DROP TABLE IF EXISTS `tb_board_attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_board_attach` (
  `ba_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `b_idx` varchar(64) NOT NULL COMMENT '게시판 FK',
  `ba_file_org` varchar(128) DEFAULT NULL COMMENT '첨부파일원본명',
  `ba_file_chg` varchar(128) DEFAULT NULL COMMENT '첨부파일서버명',
  `ba_file_size` int(11) DEFAULT NULL COMMENT '첨부파일사이즈',
  `s_dt` datetime DEFAULT NULL COMMENT '등록일',
  PRIMARY KEY (`ba_idx`),
  KEY `idx_board_attach_b_idx` (`b_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='게시판  첨부파일 관리';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_board_attach`
--

LOCK TABLES `tb_board_attach` WRITE;
/*!40000 ALTER TABLE `tb_board_attach` DISABLE KEYS */;
INSERT INTO `tb_board_attach` VALUES (1,'1','IR Material - 2024년 사업보고서(2025.03.18).pdf','20250404100932_rS.pdf',1015750,NULL),(2,'3','IR Material - 증권신고서(지분증권)(2025.03.25).pdf','20250404101401_GS.pdf',1883545,NULL),(3,'6','전자증권 전환대상 주권 등의 권리자 보호 안내 공고문.pdf','20250404102159_30.pdf',91556,NULL),(4,'7','[달바글로벌] 주식분할 주권제출 공고문.pdf','20250404102447_4C.pdf',160380,NULL),(5,'7','[달바글로벌] 주식분할 주권제출 공고문.pdf','20250404102507_zt.pdf',160380,NULL),(10,'29','[금융감독원] IPO 공모주 청약 시 소비자 당부사항.pdf','20250411163450_h8.pdf',271932,NULL),(11,'29','공모주 청약 관련 사칭 문서.jpg','20250411163450_Mq.jpg',252931,NULL);
/*!40000 ALTER TABLE `tb_board_attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_board_info`
--

DROP TABLE IF EXISTS `tb_board_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_board_info` (
  `b_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `bbs_cd` varchar(20) NOT NULL COMMENT '게시판코드 ir_result, ir_presentations, ir_orders, announcements, news_corp, news_brand, news_blog, news_career, news_others',
  `m_idx` int(11) DEFAULT NULL COMMENT '작성자IDX',
  `passwd` varchar(200) DEFAULT NULL COMMENT '비밀번호',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `content` longtext COMMENT '내용',
  `v_cnt` int(9) DEFAULT '0' COMMENT '조회수',
  `ip` varchar(20) DEFAULT '' COMMENT '글쓴이IP',
  `url` varchar(255) DEFAULT NULL,
  `is_view` enum('Y','N') DEFAULT 'Y' COMMENT '화면노출여부. 노출시 Y',
  `is_top` int(11) DEFAULT '1' COMMENT 'TOP여부 : 상단고정 : 0',
  `b_file_org` varchar(128) DEFAULT NULL COMMENT '첨부파일 원본명',
  `b_file_chg` varchar(128) DEFAULT NULL COMMENT '첨부파일 서버명',
  `b_file_size` int(11) DEFAULT NULL COMMENT '첨부파일 사이즈',
  `w_year` varchar(10) DEFAULT NULL COMMENT 'announcements 연도',
  `w_dt` date DEFAULT NULL COMMENT '등록일시',
  `m_dt` datetime DEFAULT NULL COMMENT '수정일시(상시)',
  `is_del` enum('Y','N') DEFAULT 'N' COMMENT '삭제:Y/삭제안됨:N',
  PRIMARY KEY (`b_idx`),
  KEY `bbs_cd` (`bbs_cd`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='게시판 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_board_info`
--

LOCK TABLES `tb_board_info` WRITE;
/*!40000 ALTER TABLE `tb_board_info` DISABLE KEYS */;
INSERT INTO `tb_board_info` VALUES (1,'ir_results',1,NULL,'2024 사업보고서','',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,NULL,'2025-03-25','2025-04-04 17:18:23','N'),(3,'ir_results',1,NULL,'증권신고서','',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,NULL,'2025-03-25','2025-04-04 17:18:43','N'),(4,'ir_results',1,NULL,'IR Book (2025 1Q)','',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,NULL,'2025-04-30','2025-04-04 17:18:54','N'),(5,'announcements',1,NULL,'외부감사인 선임 공고','&#039; 주식회사 등의 외부감사에 관한 법률 &#039; 제12조 제1항 및 동법 시행령 제18조 제1항에 의거하여 아래와 같이 \r\n외부감사인 선임되었음을 공고합니다.\r\n\r\n                                                                     -  아  래  -\r\n\r\n1. 감사법인 : 한영회계법인\r\n2.선임기간 : 2024년 1월 1일 ~ 2024년 12월 31일\r\n\r\n주식회사 달바글로벌 대표이사 반 성 연',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,'2025','2025-04-04','2025-04-04 17:25:01','N'),(6,'announcements',1,NULL,'전자증권 전환대상 주권 등의 권리자 보호 안내','당사의 전자증권제도 도입&middot;시행에 따라 전자등록일[&rsquo;24. 9. 23.(월)] 당시 예탁되지 아니한 전환대상주권 등의 권리자를 보호하기 위하여「주식&middot; 사채 등의 전자등록에 관한 법률」제27조 제1항에 근거하여 아래의 사항을 공고 합니다\r\n\r\n                                                                               -  아  래  -\r\n                                                                               \r\n당사의 증권이 전자등록 됨에 따라 전자등록일[&rsquo;24. 9. 23.(월)]부터 소유중인 실물증권은 효력을 잃게 됩니다\r\n\r\n당사의 실물증권 보유자는 해당 증권을 &rsquo;24. 9. 19.(목) 오전 11시까지 당사에 실물증권을 제출하고 거래 증권사 계좌에 입고 요청하여야 합니다.\r\n\r\n당사는 전자증권등록일 전 영업일 &rsquo;24. 9. 20.(금)의 주주명부에 기재된 권리자를 기준으로 전자등록이 되도록 전자등록기관(한국예탁결제원)에 요청합니다.',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,'2025','2025-04-04',NULL,'N'),(7,'announcements',1,NULL,'주식분할(액면분할)에 따른 주권제출공고','주식분할(액면분할)에 따른 주권제출공고\r\n당사는 2024년 7월 17일 개최된 임시주주총회에서 1주의 금액 500원의 보통주 1주를 1주의 금액 100원의 보통주 5주로 분할하기로 결의하였으므로 다음과 같이 공고하오니 구주권을 가진 주주님과 질권자님께서는 해당 기간 내에 구주권을 제출하여 주시기 바랍니다.\r\n\r\n다 음\r\n주식분할(액면분할)에 관한 사항\r\n\r\n대상주권 : 주식회사 달바글로벌 기명식 보통주\r\n주식분할(액면분할) 전후의 액면금액 및 발행주식 수\r\n\r\n\r\n구주권 제출기간 : 2024년 7월 18일 ~2024년 8월 18일 (1개월간)\r\n\r\n주식분할(액면분할) 효력 발생일 : 2024년 8월 19일',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,'2025','2025-04-04','2025-04-04 10:25:07','N'),(8,'news_corp',1,NULL,'낙관적 밸류에이션 대비 절반 몸값 내놨다','유가증권시장 상장을 추진하는 달바글로벌이 증권신고서를 제출하고 증시입성 일정과 공모구조를 공개했다. 시장의 예상보다 한참 낮은 몸값을 제시한게 눈길을 끈다. 최근 기업가치를 과대평가하는 &#039;공모가 뻥튀기&#039;에 대한 경계심이 확산하는 가운데 나온 행보다.',0,'220.116.84.234','https://www.thebell.co.kr/free/content/ArticleView.asp?key=202503261440521920108776','Y',1,NULL,NULL,NULL,NULL,'2025-04-04','2025-04-04 12:27:51','N'),(9,'news_corp',1,NULL,'[공간차트]한국 화장품 수출 증가율 순위 TOP10, 1위 달바..2~5위 마녀공장.뷰티스킨.본느...','한국 화장품 상위 74개 기업들의 지난해 해외 매출 비중을 분석해 본 결과 달바글로벌(이하 달바)의 해외 매출 증가율이 가낭 높아, 1위로 나타났다.',0,'220.116.84.234','https://www.newsspace.kr/news/article.html?no=5402','Y',1,NULL,NULL,NULL,NULL,'2025-04-04','2025-04-04 12:30:29','N'),(10,'news_corp',1,NULL,'국내 인디브랜드 매출 TOP 달바, 한국 1위 찍고 글로벌로...','프리미엄 비건 뷰티 브랜드 발다(d&#039;Alba)가 2024년 해외매출 1400억원을 기록하며 작년 대비 3배 이상(210%)성장 했다.',0,'220.116.84.234','https://www.newsspace.kr/mobile/article.html?no=5196','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(11,'news_corp',1,NULL,'[단독]화장품 브랜다 달바 상장한다. 비모뉴먼트 IPO 추진','승무워 미스트로 이름을 알린 화장품 브랜드 달바를 운영하는 미몬모뉴먼트가 기업공개에 나선다.',0,'220.116.84.234','','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(20,'news_corp',1,NULL,'비모뉴먼트 달바, 작년 매출 2000억원 돌파,해외서 날았다','프리미엄 비건 뷰티 브랜드 비모뉴먼트 달바(d&rsquo;Alba)가 지난해 연간 매출 2000억을 돌파했다고 19일 밝혔다.',0,'220.116.84.234','https://biz.newdaily.co.kr/site/data/html/2024/03/19/2024031900072.html','Y',1,NULL,NULL,NULL,NULL,'2025-04-04','2025-04-04 17:48:08','N'),(21,'news_corp',1,NULL,'국민 미스트 브랜드, 달바의 브랜드 마케팅 이야기','승무원 미스트, 화이트 트러플 세럼, 워터풀 에센스 선크림, 톤업 선쿠션, 수분광 미스트 하면 떠오르는 단 하나의 브랜드가 있다.',0,'220.116.84.234','https://www.womansense.co.kr/woman/article/54833','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(22,'news_corp',1,NULL,'달바, 아시아 글로벌 엠버서더  호시 와 동행 이어간다','달바는 인기그룹 세븐틴의 멤버 호시와 아시아 글로벌 엠버서더 계약 연장을 맺었다고 17일 밝혔다.\r\n\r\n출처 : 매일일보(http://www.m-i.kr)',0,'220.116.84.234','https://dalba.career.greetinghr.com/dalbaglobal#55ea28d2-6726-4f42-8ba3-667ddd90468e','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(23,'news_corp',1,NULL,'달바, 콜라겐 젤리로 이너뷰티 브랜드 가파른 성장','비건 뷰티 브랜드 달바의 이너뷰티 브랜드 비거너리(veganery)가 식물성 콜라겐 젤리 라이브 방송을 성공적으로 마치며 판매량이 가파른 성장세를 보이고 있다고 27일 밝혔다.\r\n',0,'220.116.84.234','https://news.mtn.co.kr/news-detail/2023042714370776367','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(24,'news_corp',1,NULL,'비거너리 바이 달바, 해양 생태계 보호에 앞장','비건 뷰티 브랜드 달바 이너뷰티 브랜드 비거너리 바이 달바(이하 비거너리)가 해양 정화 활동을 진행 중인 환경 공익재단에 판매 수익금의 일부를 기부했다고 21일 밝혔다.',0,'220.116.84.234','https://m.edaily.co.kr/News/Read?newsId=03545686635808016&amp;mediaCodeNo=257','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(25,'news_corp',1,NULL,'달바, 트러플 디 알바 성황리 오픈','프리미엄 뷰티 트렌드를 선도하고 있는 &lsquo;달바(d&rsquo;Alba)&rsquo;가 트러플을 오감으로 경험할 수 있는 카페 겸 다이닝바인 &lsquo;트러플 디 알바(Truffle di Alba)&rsquo; 일명 &lsquo;트러플 바&rsquo;의 런칭 소식을 전했다.\r\n\r\n',0,'220.116.84.234','https://www.jangup.com/news/articleView.html?idxno=91008','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(26,'news_corp',1,NULL,'뷰티와 미식을 한 번에! 뷰티를 먹고 마시는 공간4','프리미엄 뷰티 브랜드 달바(d&rsquo;Alba)가 이탈리안 다이닝 바 &lsquo;트러플 디 알바(Truffle di alba)를 무브먼트랩 한남에 오픈했다.',0,'220.116.84.234','https://www.marieclairekorea.com/beauty/2023/12/beaut-palce-for-food-and-beverage/?utm_source=naver&amp;utm_medium=partnership','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(27,'news_corp',1,NULL,'달바의 트러플 디 알바','트러플을 오감으로 경험할 수 있는 뉴 레스토랑, 달바의 트러플 디 알바.',0,'220.116.84.234','https://www.allurekorea.com/2023/08/26/truffle-di-alba/?utm_source=naver&amp;utm_medium=partnership','Y',1,NULL,NULL,NULL,NULL,'2025-04-04',NULL,'N'),(29,'announcements',1,NULL,'공모주 청약 관련 사칭 주의 안내','최근 당사 및 당사의 투자기관을 사칭하여 \r\n공모주 사전 청약을 유도하고, \r\n개인정보와 금전의 제공을 요구하는 \r\n불법 사기 행위가 발생하고 있어 깊은 우려를 표합니다.\r\n\r\n달바글로벌은 이와 같은 사칭 및 불법 투자 권유 행위와 전혀 무관하며, 이를 통한 개인정보 제공이나 금전 지급은 삼가해 주시기 바랍니다.\r\n\r\n투자자 여러분께서는 사칭 사례로 인한 피해를 입지 않도록 \r\n각별히 주의해 주시기 바랍니다.\r\n\r\n관련하여 의심되는 연락이나 피해 사례가 있으실 경우, \r\n당사 고객센터 또는 관계 기관에 즉시 신고하여 주시기 바랍니다.\r\n\r\n달바글로벌 고객센터 02-332-7727\r\n',0,'14.39.225.65','','Y',1,NULL,NULL,NULL,'2025','0000-00-00',NULL,'N');
/*!40000 ALTER TABLE `tb_board_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ir`
--

DROP TABLE IF EXISTS `tb_ir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ir` (
  `i_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ir`
--

LOCK TABLES `tb_ir` WRITE;
/*!40000 ALTER TABLE `tb_ir` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_member`
--

DROP TABLE IF EXISTS `tb_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_member` (
  `m_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `m_type` varchar(10) DEFAULT NULL COMMENT '회원 구분 - AD: 마스터관리자, SD: 부관리자',
  `user_id` varchar(80) NOT NULL COMMENT '회원ID',
  `user_pwd` varchar(100) NOT NULL COMMENT '회원 비밀번호',
  `user_name` varchar(40) NOT NULL COMMENT '회원 이름',
  `w_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '가입일시',
  PRIMARY KEY (`m_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='회원관리';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_member`
--

LOCK TABLES `tb_member` WRITE;
/*!40000 ALTER TABLE `tb_member` DISABLE KEYS */;
INSERT INTO `tb_member` VALUES (1,'AD','admin','sha256:1000:B2V+DKE0zlPDXQMAowO7ze8dHsSsWH4s:04aV6OBqUF9pQ1axYIShNBsUmQBKF03O','admin','2025-02-06 01:46:53');
/*!40000 ALTER TABLE `tb_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_news`
--

DROP TABLE IF EXISTS `tb_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_news` (
  `n_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_news`
--

LOCK TABLES `tb_news` WRITE;
/*!40000 ALTER TABLE `tb_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-18 15:58:19
