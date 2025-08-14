-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- 생성 시간: 25-06-27 17:14
-- 서버 버전: 5.5.68-MariaDB
-- PHP 버전: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `dalba_sys`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `tb_board_info`
--

CREATE TABLE IF NOT EXISTS `tb_board_info` (
  `b_idx` int(11) NOT NULL COMMENT 'PK',
  `bbs_cd` varchar(20) NOT NULL COMMENT '게시판코드 ir_result, ir_presentations, ir_orders, announcements, news_corp, news_brand, news_blog, news_career, news_others',
  `m_idx` int(11) DEFAULT NULL COMMENT '작성자IDX',
  `passwd` varchar(200) DEFAULT NULL COMMENT '비밀번호',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목 (history에서는 기간)',
  `content` longtext COMMENT '내용',
  `v_cnt` int(9) DEFAULT '0' COMMENT '조회수',
  `ip` varchar(20) DEFAULT '' COMMENT '글쓴이IP',
  `url` varchar(255) DEFAULT NULL,
  `is_view` enum('Y','N') DEFAULT 'Y' COMMENT '화면노출여부. 노출시 Y',
  `is_top` int(11) DEFAULT '1' COMMENT 'TOP여부 : 상단고정 : 0',
  `b_file_org` varchar(128) DEFAULT NULL COMMENT '첨부파일 원본명',
  `b_file_chg` varchar(128) DEFAULT NULL COMMENT '첨부파일 서버명',
  `b_file_size` int(11) DEFAULT NULL COMMENT '첨부파일 사이즈',
  `w_ymd` varchar(10) DEFAULT NULL COMMENT 'announcements 날짜',
  `w_dt` date DEFAULT NULL COMMENT '등록일시',
  `m_dt` datetime DEFAULT NULL COMMENT '수정일시(상시)',
  `is_del` enum('Y','N') DEFAULT 'N' COMMENT '삭제:Y/삭제안됨:N',
  `w_year` varchar(10) DEFAULT NULL COMMENT 'history 연도',
  `subject_eng` varchar(255) DEFAULT NULL COMMENT '영문 제목',
  `content_eng` longtext COMMENT '영문 내용'
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COMMENT='게시판 테이블';

--
-- 테이블의 덤프 데이터 `tb_board_info`
--

INSERT INTO `tb_board_info` (`b_idx`, `bbs_cd`, `m_idx`, `passwd`, `subject`, `content`, `v_cnt`, `ip`, `url`, `is_view`, `is_top`, `b_file_org`, `b_file_chg`, `b_file_size`, `w_ymd`, `w_dt`, `m_dt`, `is_del`, `w_year`, `subject_eng`, `content_eng`) VALUES
(1, 'ir_results', 1, NULL, '2024 Annual Report (KOR)', '', 0, '14.39.225.65', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-03-25', '2025-06-10 15:24:32', 'N', NULL, '', ''),
(3, 'ir_results', 1, NULL, 'Securities Registration Statement (KOR)', '', 0, '14.39.225.65', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-03-25', '2025-06-10 15:24:43', 'N', NULL, '', ''),
(5, 'announcements', 1, NULL, '외부감사인 선임 공고', '<p>'' 주식회사 등의 외부감사에 관한 법률 '' 제12조 제1항 및 동법 시행령 제18조 제1항에 의거하여 아래와 같이 외부감사인 선임되었음을 공고합니다.&nbsp;</p><p>&nbsp;</p><p>- 아 래 -</p><p>&nbsp;1. 감사법인 : 한영회계법인&nbsp;</p><p>2.선임기간 : 2024년 1월 1일 ~ 2024년 12월 31일&nbsp;</p><p>주식회사 달바글로벌</p><p>&nbsp;대표이사 반 성 연</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, '2025-04-25', '2025-04-04', '2025-05-21 16:25:57', 'N', '2025', NULL, '<p>1</p>'),
(6, 'announcements', 1, NULL, '전자증권 전환대상 주권 등의 권리자 보호 안내', '<p>당사의 전자증권제도 도입·시행에 따라 전자등록일[’24. 9. 23.(월)] 당시 예탁되지 아니한 전환대상주권 등의 권리자를 보호하기 위하여「주식· 사채 등의 전자등록에 관한 법률」제27조 제1항에 근거하여 아래의 사항을 공고 합니다 - 아 래 - 당사의 증권이 전자등록 됨에 따라 전자등록일[’24. 9. 23.(월)]부터 소유중인 실물증권은 효력을 잃게 됩니다 당사의 실물증권 보유자는 해당 증권을 ’24. 9. 19.(목) 오전 11시까지 당사에 실물증권을 제출하고 거래 증권사 계좌에 입고 요청하여야 합니다. 당사는 전자증권등록일 전 영업일 ’24. 9. 20.(금)의 주주명부에 기재된 권리자를 기준으로 전자등록이 되도록 전자등록기관(한국예탁결제원)에 요청합니다.</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, '2025-04-25', '2025-04-04', '2025-05-08 11:34:01', 'N', '2025', NULL, NULL),
(7, 'announcements', 1, NULL, '주식분할(액면분할)에 따른 주권제출공고', '<p>주식분할(액면분할)에 따른 주권제출공고 당사는 2024년 7월 17일 개최된 임시주주총회에서 1주의 금액 500원의 보통주 1주를 1주의 금액 100원의 보통주 5주로 분할하기로 결의하였으므로 다음과 같이 공고하오니 구주권을 가진 주주님과 질권자님께서는 해당 기간 내에 구주권을 제출하여 주시기 바랍니다. 다 음 주식분할(액면분할)에 관한 사항 대상주권 : 주식회사 달바글로벌 기명식 보통주 주식분할(액면분할) 전후의 액면금액 및 발행주식 수 구주권 제출기간 : 2024년 7월 18일 ~2024년 8월 18일 (1개월간) 주식분할(액면분할) 효력 발생일 : 2024년 8월 19일</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, '2025-04-03', '2025-04-04', '2025-05-08 11:34:05', 'N', '2025', NULL, NULL),
(8, 'news_brand', 1, NULL, '낙관적 밸류에이션 대비 절반 몸값 내놨다', '<p>유가증권시장 상장을 추진하는 달바글로벌이 증권신고서를 제출하고 증시입성 일정과 공모구조를 공개했다.&nbsp;</p><p>시장의 예상보다 한참 낮은 몸값을 제시한게 눈길을 끈다. 최근 기업가치를 과대평가하는 ''공모가 뻥튀기''에 대한 경계심이 확산하는 가운데 나온 행보다.</p>', 0, '220.116.84.234', 'https://www.thebell.co.kr/free/content/ArticleView.asp?key=202503261440521920108776', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', '2025-05-09 11:52:12', 'N', NULL, NULL, NULL),
(9, 'news_corp', 1, NULL, '[공간차트]한국 화장품 수출 증가율 순위 TOP10, 1위 달바..2~5위 마녀공장.뷰티스킨.본느...', '<p>한국 화장품 상위 74개 기업들의 지난해 해외 매출 비중을 분석해 본 결과 달바글로벌(이하 달바)의 해외 매출 증가율이 가낭 높아, 1위로 나타났다.</p>', 0, '220.116.84.234', 'https://www.newsspace.kr/news/article.html?no=5402', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', '2025-05-08 15:47:34', 'N', NULL, NULL, NULL),
(10, 'news_corp', 1, NULL, '국내 인디브랜드 매출 TOP 달바, 한국 1위 찍고 글로벌로...', '<p>프리미엄 비건 뷰티 브랜드 달바(d''Alba)가 2024년 해외매출 1400억원을 기록하며 작년 대비 3배 이상(210%)성장 했다.</p>', 0, '220.116.84.234', 'https://www.newsspace.kr/mobile/article.html?no=5196', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', '2025-05-08 17:32:42', 'N', NULL, NULL, NULL),
(11, 'news_corp', 1, NULL, '[단독]화장품 브랜다 달바 상장한다. 비모뉴먼트 IPO 추진', '승무워 미스트로 이름을 알린 화장품 브랜드 달바를 운영하는 미몬모뉴먼트가 기업공개에 나선다.', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(20, 'news_corp', 1, NULL, '비모뉴먼트 달바, 작년 매출 2000억원 돌파,해외서 날았다', '프리미엄 비건 뷰티 브랜드 비모뉴먼트 달바(d&rsquo;Alba)가 지난해 연간 매출 2000억을 돌파했다고 19일 밝혔다.', 0, '220.116.84.234', 'https://biz.newdaily.co.kr/site/data/html/2024/03/19/2024031900072.html', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', '2025-04-04 17:48:08', 'N', NULL, NULL, NULL),
(21, 'news_corp', 1, NULL, '국민 미스트 브랜드, 달바의 브랜드 마케팅 이야기', '승무원 미스트, 화이트 트러플 세럼, 워터풀 에센스 선크림, 톤업 선쿠션, 수분광 미스트 하면 떠오르는 단 하나의 브랜드가 있다.', 0, '220.116.84.234', 'https://www.womansense.co.kr/woman/article/54833', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(22, 'news_corp', 1, NULL, '달바, 아시아 글로벌 엠버서더  호시 와 동행 이어간다', '달바는 인기그룹 세븐틴의 멤버 호시와 아시아 글로벌 엠버서더 계약 연장을 맺었다고 17일 밝혔다.\r\n\r\n출처 : 매일일보(http://www.m-i.kr)', 0, '220.116.84.234', 'https://dalba.career.greetinghr.com/dalbaglobal#55ea28d2-6726-4f42-8ba3-667ddd90468e', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(23, 'news_corp', 1, NULL, '달바, 콜라겐 젤리로 이너뷰티 브랜드 가파른 성장', '비건 뷰티 브랜드 달바의 이너뷰티 브랜드 비거너리(veganery)가 식물성 콜라겐 젤리 라이브 방송을 성공적으로 마치며 판매량이 가파른 성장세를 보이고 있다고 27일 밝혔다.\r\n', 0, '220.116.84.234', 'https://news.mtn.co.kr/news-detail/2023042714370776367', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(24, 'news_corp', 1, NULL, '비거너리 바이 달바, 해양 생태계 보호에 앞장', '비건 뷰티 브랜드 달바 이너뷰티 브랜드 비거너리 바이 달바(이하 비거너리)가 해양 정화 활동을 진행 중인 환경 공익재단에 판매 수익금의 일부를 기부했다고 21일 밝혔다.', 0, '220.116.84.234', 'https://m.edaily.co.kr/News/Read?newsId=03545686635808016&amp;mediaCodeNo=257', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(25, 'news_corp', 1, NULL, '달바, 트러플 디 알바 성황리 오픈', '프리미엄 뷰티 트렌드를 선도하고 있는 &lsquo;달바(d&rsquo;Alba)&rsquo;가 트러플을 오감으로 경험할 수 있는 카페 겸 다이닝바인 &lsquo;트러플 디 알바(Truffle di Alba)&rsquo; 일명 &lsquo;트러플 바&rsquo;의 런칭 소식을 전했다.\r\n\r\n', 0, '220.116.84.234', 'https://www.jangup.com/news/articleView.html?idxno=91008', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(26, 'news_corp', 1, NULL, '뷰티와 미식을 한 번에! 뷰티를 먹고 마시는 공간4', '프리미엄 뷰티 브랜드 달바(d&rsquo;Alba)가 이탈리안 다이닝 바 &lsquo;트러플 디 알바(Truffle di alba)를 무브먼트랩 한남에 오픈했다.', 0, '220.116.84.234', 'https://www.marieclairekorea.com/beauty/2023/12/beaut-palce-for-food-and-beverage/?utm_source=naver&amp;utm_medium=partnership', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(27, 'news_corp', 1, NULL, '달바의 트러플 디 알바', '트러플을 오감으로 경험할 수 있는 뉴 레스토랑, 달바의 트러플 디 알바.', 0, '220.116.84.234', 'https://www.allurekorea.com/2023/08/26/truffle-di-alba/?utm_source=naver&amp;utm_medium=partnership', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-04', NULL, 'N', NULL, NULL, NULL),
(29, 'announcements', 1, NULL, '공모주 청약 관련 사칭 주의 안내', '<p>최근 당사 및 당사의 투자기관을 사칭하여 공모주 사전 청약을 유도하고, 개인정보와 금전의 제공을 요구하는 불법 사기 행위가 발생하고 있어 깊은 우려를 표합니다. 달바글로벌은 이와 같은 사칭 및 불법 투자 권유 행위와 전혀 무관하며, 이를 통한 개인정보 제공이나 금전 지급은 삼가해 주시기 바랍니다. 투자자 여러분께서는 사칭 사례로 인한 피해를 입지 않도록 각별히 주의해 주시기 바랍니다. 관련하여 의심되는 연락이나 피해 사례가 있으실 경우, 당사 고객센터 또는 관계 기관에 즉시 신고하여 주시기 바랍니다. 달바글로벌 고객센터 02-332-7727</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, '2024-04-23', '2025-04-04', '2025-05-08 11:34:15', 'N', '2024', NULL, NULL),
(35, 'achievements', 1, NULL, '33', '', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-04-28', NULL, 'N', '2025', NULL, NULL),
(38, 'achievements', 1, NULL, '0.5', '', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-08', NULL, 'N', '2016', NULL, NULL),
(39, 'achievements', 1, NULL, '2', '', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-08', NULL, 'N', '2017', NULL, NULL),
(40, 'achievements', 1, NULL, '7', '', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-08', NULL, 'N', '2018', NULL, NULL),
(41, 'achievements', 1, NULL, '50', '', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-19', '2025-05-19 15:55:26', 'N', '2050', NULL, NULL),
(61, 'history', 1, NULL, '12월', '<p>미스트 세럼 누적 판매 1,000만개 달성</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', '2025-05-22 09:38:25', 'N', '2021', 'Dec', '<p>Cumulative Sales of Mist Serum Reach 10 Million Units</p>'),
(62, 'history', 1, NULL, '3월', '<p>러시아 최대 e-commerce 와일드베리 세럼 카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2022', NULL, '<p>No. 1 in the Serum Category on Wildberries, Russia''s Largest E-Commerce Platform</p>'),
(63, 'history', 1, NULL, '1월', '<p>쿠팡 선케어, 에신스. 앰플 카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', '2025-05-22 09:44:41', 'N', '2023', '1', '<p>No. 1 in the Sun Care, Essence, and Ampoule Categories on Coupang</p>'),
(64, 'history', 1, NULL, '1월', '<p>미스트 세럼 누적 판매 2,000만개 달성</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2023', '1월', '<p>Cumulative Sales of Mist Serum Reach 20 Million Units</p>'),
(65, 'history', 1, NULL, '12월', '<p>미스트 세럼 누적 판매 3,000만개 달성</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2023', '12월', '<p>Cumulative Sales of Mist Serum Reach 30 Million Units</p>'),
(66, 'history', 1, NULL, '12월', '<p>수출 1억불 달성(누적 2200억원)</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', '2025-05-22 13:49:19', 'N', '2024', '12', '<p>Achieved USD 100 million in exports (Cumulative total: KRW 220 billion)</p>'),
(67, 'history', 1, NULL, '12월', '<p>일본 립스 2024 베스트 코스메 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2024', '12', '<p>Ranked No. 1 in Japan''s LIPS 2024 Best Cosmetics</p>'),
(68, 'history', 1, NULL, '12월', '<p>일본 아마존/앳코스메 미스트 카테고리1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2024', '12월', ''),
(69, 'history', 1, NULL, '12월', '<p>베트남 쇼피 스킨케어 카테고리 Top 3</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2024', '12월', '<p>베트남 쇼피 스킨케어 카테고리 Top 3</p>'),
(70, 'history', 1, NULL, '12월', '<p>독일/스페인 아마존 Sunscreens 카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', NULL, 'N', '2024', '12월', ''),
(71, 'history', 1, NULL, '2H', '<p>미스트 세럼 누적 판매 4,000만개 달성</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-20', '2025-05-22 17:05:17', 'N', '2024', '2H', '<p>미스트 세럼 누적 판매 4,000만개 달성</p>'),
(72, 'history', 1, NULL, '2H', '<p>선크림 누적 판매 1,000만개 달성</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-20', '2025-05-22 18:01:01', 'N', '2024', '2H', '<p>선크림 누적 판매 1,000만개 달성</p>'),
(73, 'history', 1, NULL, '7월', '<p>미국/캐나다/독일/스페인/호주/영국 아마존 미스트&nbsp;</p><p>세럼 Face Mist 카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-19', '2025-05-22 18:07:18', 'N', '2024', '7월', '<p>미국/캐나다/독일/스페인/호주/영국 아마존 미스트 세럼 Face Mist 카테고리 1위</p>'),
(74, 'history', 1, NULL, '7월', '<p>일본 큐텐 미스트 카테고리, 선크림 UV 케어&nbsp;</p><p>카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-18', '2025-05-22 18:07:00', 'N', '2024', '7월', '<p>일본 큐텐 미스트 카테고리, 선크림 UV 케어 카테고리 1위</p>'),
(75, 'history', 1, NULL, '7월', '<p>일본 라쿠텐 세럼 토너 스킨케어 카테고리 1위,&nbsp;</p><p>모델링 마스크 카테고리 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-18', '2025-05-22 18:06:42', 'N', '2024', '7월', '<p>일본 라쿠텐 세럼 토너 스킨케어 카테고리 1위, 모델링 마스크 카테고리 1위</p>'),
(76, 'history', 1, NULL, '6월', '<p>올영세일 스킨케어 1위&nbsp;<br>(화이트 트러플 퍼스트 스프레이 세럼)</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-17', '2025-05-22 18:05:58', 'N', '2024', '6월', '<p>올영세일 스킨케어 1위 (화이트 트러플 퍼스트 스프레이 세럼)</p>'),
(77, 'history', 1, NULL, '1H', '<p>네이버 뷰티 전체 카테고리 내 거래액 1위</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-17', NULL, 'N', '2024', '1H', '<p>네이버 뷰티 전체 카테고리 내 거래액 1위</p>'),
(78, 'history', 1, NULL, '1H', '<p>쿠팡 에센스 부분 베스트 제품 수상<br>(화이트 트러플 수프림 세럼)</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-16', NULL, 'N', '2024', '1H', '<p>쿠팡 에센스 부분 베스트 제품 수상<br>(화이트 트러플 수프림 세럼)</p>'),
(79, 'history', 1, NULL, '1H', '<p>올리브영 스킨케어 전체 제품 판매량 &nbsp;Top 3<br>(화이트 트러플 퍼스트 스프레이 세럼)</p>', 0, '220.116.84.234', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-15', NULL, 'N', '2024', '1H', '<p>올리브영 스킨케어 전체 제품 판매량 &nbsp;Top 3<br>(화이트 트러플 퍼스트 스프레이 세럼)</p>'),
(88, 'ir_presentations', 1, NULL, '2025. 1Q IR Book (KOR &middot; ENG)', '<p>· 2025. 1Q IR Book (KOR · ENG)&nbsp;</p>', 0, '14.39.225.65', '', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-22', '2025-05-30 16:35:46', 'N', NULL, 'IR BOOK (2025 1Q)', '<p>· 2025. 1Q IR Book (KOR · ENG)&nbsp;</p>'),
(89, 'ir_others', 1, NULL, '2025.1Q Factsheet (ENG)', '<p>Please click the link button below</p>', 0, '14.39.225.65', 'https://docs.google.com/spreadsheets/d/1qQAReJfvupyRJFql22JOaE1SEUypeFG2g_OFIz7I5NY/edit?gid=16826140#gid=16826140', 'Y', 1, NULL, NULL, NULL, NULL, '2025-05-27', '2025-06-11 11:32:28', 'N', NULL, '2025.1Q Factsheet (ENG)', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `tb_board_info`
--
ALTER TABLE `tb_board_info`
  ADD PRIMARY KEY (`b_idx`),
  ADD KEY `bbs_cd` (`bbs_cd`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `tb_board_info`
--
ALTER TABLE `tb_board_info`
  MODIFY `b_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
