-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cytv`
--

-- --------------------------------------------------------

--
-- 資料表結構 `deposit`
--

CREATE TABLE `deposit` (
  `id` int(10) UNSIGNED NOT NULL,
  `memberId` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `point` int(10) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `deposit`
--

INSERT INTO `deposit` (`id`, `memberId`, `price`, `point`, `create_at`) VALUES
(1, 1, 250, 800, '2019-12-02 00:00:00'),
(2, 1, 100, 300, '2019-12-02 00:00:00'),
(3, 1, 100, 300, '2019-12-02 11:10:56'),
(4, 1, 100, 300, '2019-12-03 15:50:31'),
(5, 2, 100, 300, '2019-12-03 17:26:44');

-- --------------------------------------------------------

--
-- 資料表結構 `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `episode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `videoId` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `episodes`
--

INSERT INTO `episodes` (`id`, `episode`, `videoId`, `url`, `price`) VALUES
(1, '第一話&emsp;ゲーマー兄妹がファンタジー世界を征服するそうです', 1, 'video01.mp4', 100),
(2, '第二話&emsp;ゲーマー兄妹が獣耳っ子の国に目をつけたようです', 1, 'video01.mp4', 100),
(3, '第三話&emsp;ゲーマー兄妹の片割れが消えたようですが……？', 1, 'video01.mp4', 100),
(4, '第一話&emsp;残酷', 2, 'video02.mp4', 100),
(5, '第二話&emsp;育手・鱗滝左近次', 2, 'video02.mp4', 100),
(6, '第三話&emsp;錆兎と真菰', 2, 'video02.mp4', 100),
(7, '第四話&emsp;最終選別', 2, 'video02.mp4', 100),
(8, '第一話&emsp;「愛してる」と自動手記人形', 3, '#', 100),
(9, '第二話&emsp;「戻って来ない」', 3, '#', 100),
(10, '第三話&emsp;「あなたが、良き自動手記人形になりますように」', 3, '#', 100),
(11, '第一話&emsp;はじめての逆転', 4, 'video04.mp4', 100),
(12, '第二話&emsp;逆転姉妹 - 1st Trial', 4, 'video04.mp4', 100),
(13, '第一話&emsp;緑谷出久：オリジン', 5, 'video5.mp4', 100),
(14, '第二話&emsp;猛れクソナード', 5, 'video5.mp4', 100),
(15, '第一話&emsp;始まりの終わりと終わりの始まり', 6, '#', 100),
(16, '第二話&emsp;再会の魔女', 6, '#', 100),
(17, '第三話&emsp;ゼロから始まる異世界生活', 6, '#', 100),
(18, '第一話&emsp;終わりと始まり', 7, '#', 100),
(19, '第二話&emsp;階層守護者', 7, '#', 100),
(20, '第三話&emsp;カルネ村の戦い', 7, '#', 100),
(21, '第一話&emsp;葉秋？葉修？', 8, 'video08.mp4', 100),
(22, '第二話&emsp;網管高手', 8, 'video08.mp4', 100),
(23, '第三話&emsp;散人就是這麼任性', 8, 'video08.mp4', 100),
(24, '第四話&emsp;野圖BOSS是用來搶的！', 8, 'video08.mp4', 100),
(25, '第五話&emsp;一個人的遊戲？', 8, 'video08.mp4', 100),
(26, '第六話&emsp;劍聖', 8, 'video08.mp4', 100),
(27, '第七話&emsp;史上最大BOSS', 8, 'video08.mp4', 100),
(28, '第八話&emsp;年輕的朋友們來相會！', 8, 'video08.mp4', 100),
(29, '第九話&emsp;全民公敵', 8, 'video08.mp4', 100),
(30, '第十話&emsp;分析帝 數據黨', 8, 'video08.mp4', 100),
(31, '第十一話&emsp;用正確的姿勢告訴你什麼叫做兇殘', 8, 'video08.mp4', 100),
(32, '第十二話&emsp;十年榮耀一如既往', 8, 'video08.mp4', 100),
(33, '第一話&emsp;暴風竜ヴェルドラ', 9, '#', 100),
(34, '第二話&emsp;ゴブリンたちとの出会い', 9, '#', 100),
(35, '第一話&emsp;二千年後の君へ －シガンシナ陥落①－', 10, '#', 100),
(36, '第一話&emsp;自称霊能力者·霊幻新隆 ～とモブ～', 11, '#', 100),
(37, '第一話&emsp;森羅 日下部、入隊', 12, '#', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0 COMMENT '一般會員:0 ，管理者:1',
  `wallet` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission` tinyint(1) NOT NULL DEFAULT 0 COMMENT '停權:1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `token`, `level`, `wallet`, `permission`) VALUES
(1, 'Brad', 'brad1111@gmail.com', '$2y$10$0S4qEUuJK0kslt.wTPyD6ebnFQUZe6MJj5BJRDKZqoP0mzyqwT2vC', 'cc1a812abb9d861c35bcc5bd99585777d946a694e43e6d07e5fc73bf21cf5524', 1, 1500, 0),
(2, 'Eric8787', 'Eric8787@gmail.com', '$2y$10$MDpnzgXUfD2Cs/s36J1PeOR0wFIYY8txWdhPnkjqaps88GYUZAqcC', '4d79a983b84e495eff39d865775a12e30625deff04cafe4173743e22fef06f31', 0, 200, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `moneycategory`
--

CREATE TABLE `moneycategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `point` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `moneycategory`
--

INSERT INTO `moneycategory` (`id`, `price`, `point`) VALUES
(1, 100, 300),
(2, 250, 800),
(3, 500, 1700),
(4, 1000, 3500),
(5, 2500, 10000);

-- --------------------------------------------------------

--
-- 資料表結構 `shopping`
--

CREATE TABLE `shopping` (
  `id` int(10) UNSIGNED NOT NULL,
  `memberId` int(10) UNSIGNED NOT NULL,
  `episodeId` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `shopping`
--

INSERT INTO `shopping` (`id`, `memberId`, `episodeId`, `cost`, `create_at`) VALUES
(1, 1, 30, 100, '0000-00-00 00:00:00'),
(2, 1, 21, 100, '2019-12-03 09:26:27'),
(3, 2, 33, 100, '2019-12-03 17:52:58');

-- --------------------------------------------------------

--
-- 資料表結構 `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descript` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img2` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `videos`
--

INSERT INTO `videos` (`id`, `name`, `descript`, `img1`, `img2`) VALUES
(1, '遊戲人生', '空與白既是尼特族又是家裡蹲，但是在網路上卻是被奉為都市傳說的天才遊戲玩家兄妹。\r\n稱呼現實世界為「垃圾遊戲」的兩人，某一天被自稱是「神」的少年——特圖召喚至棋盤上的世界「迪司博德」，那是個戰爭為神所禁止，「遊戲決定一切」的世界，甚至連國界也一樣。\r\n被其他種族逼至絕境，只剩下最後都市——「艾爾奇亞」的「人類種」，空與白利用自己的才智以及策略，在通過遊戲取得艾爾奇亞王的地位後，僅用短短幾個月就成功將艾爾奇亞從生死邊緣反轉為世界第二大國。', 'thumb-1920-512323.jpg', '0001548187.jpg'),
(2, '鬼滅之刃', '以大正時代為故事舞台，講述了主角竈門炭治郎全家被鬼殺害，為了尋求唯一倖存但被鬼化的妹妹變回人的方法，踏上了斬鬼之旅所描寫的純和風劍戟奇譚。', '01_kimetunoyaiba-1024x638.jpg', 'b09d22_1fb4ea0a57d6402790a2fa9b0a7a0b4f_mv21.jpg'),
(3, '紫羅蘭永恆花園', '後世打字機的原形，是奧蘭多博士為盲眼而無法執筆的小說家妻子而發明，博士稱其為「自動手記人偶」，而後成為整個代筆界的稱呼。從事替人書寫工作的代筆者被稱為「自動手記人偶」。\r\n\r\n因戰爭而失去雙手，後來裝上了義肢的少女——女主角薇爾莉特·艾佛加登，正是一名屬於C·H郵政社的金髮藍瞳自動手記人偶少女。為了能夠理解在戰場上重要之人所傳達的話語，她去往不同的地方，踏上一段尋找何謂「愛」的旅程，為不同的委託人工作，將對方的思念化作一封封的信件，將重要之言傳遞出去。', 'zlopfjmnnktaao6zcxib.jpg', 'LACM-14714.jpg'),
(4, '逆轉裁判', '逆轉裁判系列（日版名：逆転裁判，英文版名：Ace Attorney）是卡普空製作的法庭戰鬥冒險遊戲，遊戲中玩家扮演辯護律師，通過偵查收集證據，然後在假想規則的日本法庭上質疑檢察官和證人的證詞來為嫌疑人獲得「無罪」的判決作為勝利目的。', '07efaedf8589dc1572829bdf1c9da651.jpg', 'B5diFguCAAAbfRH.jpg'),
(5, '我的英雄學院', '《我的英雄學院》故事圍繞在主人翁綠谷出久身上，他最初是個沒有個性的少年，但他仍憧憬並渴望成為一位英雄，也期望自己能進入培育英雄的菁英學校雄英高校就讀。但周圍的人都不看好沒有個性的他能成為能力者，讓他總是在他人的嘲笑與輕視中度過。直到他遇上了自己最仰慕的英雄，被人稱為「和平的象徵」的歐爾麥特，他的夢想將因此獲得會化為現實的可能性。出久在經過歐爾麥特的十個月特訓後，獲得歐爾麥特的個性「One・for・All」。之後，進入了雄英高校。', '19080317310980.jpg', '152379.jpg'),
(6, 'RE:0', '身為家裏蹲的少年菜月昴，在從便利商店回家途中突然發生意外被傳送到異世界。少年原以為自己完全沒有任何特長。但本來應該因為遭遇襲擊死去，回過神來後一切卻都被重置。發現自己「死亡回歸」的特殊能力後，為了拯救少女，少年跨越無數次絕望，一次次地死亡並重新來過。', '0001420915.jpg', '70a516c6ad5f531155cac8f4db356e00.jpg'),
(7, 'OVERLORD', '一款席捲遊戲界的網路遊戲「YGGDRASIL（世界樹）」，在營運十二年後停止一切服務，一名喜歡該遊戲的普通上班族「飛鼠」，在營運的最後一刻來到遊戲中曾名噪一時、由其擔任會長的強大公會—「安茲·烏爾·恭」的根據地納薩力克大墳墓進行最後巡禮，等待營運的結束。\r\n\r\n—原本應該是如此。\r\n\r\n雖然營運時間結束，玩家角色卻無法登出遊戲。而公會內的NPC也開始擁有自己的思想、如活人般地活動起來。在原本的遊戲中擁有骷髏魔法師外表的飛鼠，就這樣與他率領的公會展開前所未有的奇幻傳奇冒險。', 'overlord-season-3-episode.jpg', '8f902598ec637ab75f0a3492442dbcaf.jpg'),
(8, '全職高手', '故事讲述网游荣耀中被誉为教科书级别的顶尖高手叶修，因为种种原因遭到俱乐部的驱逐，离开职业圈的他寄身于一家网吧成了一个小小的网管，但是，拥有十年游戏经验的他，在荣耀新开的第十区重新投入了游戏，带着对往昔的回忆，和一把未完成的自制武器，开始了重返巅峰之路。', '51dae14d57252a5fd057a05ccd124d3f180265f1.jpg', '500x500.jpg'),
(9, '轉生史萊姆', '由一個普通的37歲上班族三上悟轉生到異世界成為史萊姆，他將會在這個伴隨著劍與魔法的新「人」生（史萊姆生）中，掀起席捲整個異世界的巨大風暴。', '18082405411061.jpg', '9bc5QTw.jpg'),
(10, '進撃の巨人', '在故事開始前的一百年，巨大的類人生物「巨人」突然出現，毫無理由地消滅大半人類。殘餘的人類建造了三道同心圓高牆，最外圍的是「瑪利亞之牆」、中間是「羅塞之牆」、最內側是「席納之牆」，人類懷抱著搖搖欲墜的和平居住在牆內百年之久，許多人在牆內出生長大、不曾見過巨人。這一切在某一天起了變化，一個六十公尺的超大型巨人突襲並破壞了希干希納區（瑪利亞之牆外）的城門，而另一個全身穿上鎧甲的盔甲巨人則打碎了瑪利亞之牆的城門，讓一大群巨人得以進入該區。', 'header_tchinese.jpg', 'attack.jpg'),
(11, '路人超能100', '平凡的中學二年級少年影山茂夫，因其微弱的存在感而遭人戲稱為「路人」，但不起眼的他其實是強大的天生超能力者。歷經每一次的成長，路人開始認為自己的超能力是危險的存在，為了不讓超能力失控，路人無意識的壓抑著情感。雖然只想平凡的度過每一天，但各種麻煩卻接二連三找上他，隨著被壓抑的情感在內心一點點膨脹，路人體內積累的力量也蠢蠢欲動。', 'maxrssesdefault.jpg', '15469314647.jpg'),
(12, '炎炎消防隊', '故事開始的250年前，世界各地的某些地方噴出火焰，導致陸地四分五裂，也使得許多國家消失、大量生物滅絕，部分國家的遺民進入仍然完好的東京皇國生活，受到移民影響，多數人開始將姓和名倒過來稱呼，而原國主義者則排斥這種變化並盡可能維持原有傳統，因此雙方多有衝突。', '15635916645.jpg', '007iocwWly1fyk0qwxe6gj30fm0m2dj8.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberId` (`memberId`);

--
-- 資料表索引 `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `episode` (`episode`),
  ADD KEY `videoId` (`videoId`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- 資料表索引 `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `videoId` (`episodeId`);

--
-- 資料表索引 `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`);

--
-- 資料表的限制式 `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`videoId`) REFERENCES `videos` (`id`);

--
-- 資料表的限制式 `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `shopping_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `shopping_ibfk_2` FOREIGN KEY (`episodeId`) REFERENCES `episodes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
