-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: db2142.perfora.net
-- Generation Time: Jun 03, 2011 at 05:19 AM
-- Server version: 5.0.91
-- PHP Version: 5.2.6-1+lenny10
-- 
-- Database: `db_nteu`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `banners`
-- 

CREATE TABLE `banners` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(1000) NOT NULL,
  `name` text NOT NULL,
  `linkImg` varchar(1000) NOT NULL,
  `imageListingID` int(16) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `banners`
-- 

INSERT INTO `banners` VALUES (29, 'Banner 2', '1298481283Banner2.jpg', 'http://nteu296.org/', 1, '2011-02-09');
INSERT INTO `banners` VALUES (27, 'Banner 1', '1298481274Banner1.jpg', 'http://nteu296.org/', 3, '2011-02-09');
INSERT INTO `banners` VALUES (32, 'Banner 3', '1298481308Banner3.jpg', 'http://nteu296.org/', 4, '2011-02-23');
INSERT INTO `banners` VALUES (33, 'Banner 4', '1298481322Banner4.jpg', 'http://nteu296.org/', 2, '2011-02-23');

-- --------------------------------------------------------

-- 
-- Table structure for table `bc_admin`
-- 

CREATE TABLE `bc_admin` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userName` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `bc_admin`
-- 

INSERT INTO `bc_admin` VALUES (1, 'admin', 'info@nteu296.org', 'admin', 'Admin@123', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `contacts`
-- 

CREATE TABLE `contacts` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `contacts`
-- 

INSERT INTO `contacts` VALUES (7, 'test', 'test@test.com', 'test', 'test');
INSERT INTO `contacts` VALUES (8, 'test1', 'tst@test.cvom', 'test', 'test');
INSERT INTO `contacts` VALUES (9, 'test1', 'tst@test.cvom', 'test', 'test');
INSERT INTO `contacts` VALUES (10, 'test1', 'tst@test.cvom', 'test', 'test');
INSERT INTO `contacts` VALUES (11, 'test1', 'tst@test.cvom', 'test', 'test');
INSERT INTO `contacts` VALUES (12, 'test1', 'tst@test.cvom', 'test', 'test');
INSERT INTO `contacts` VALUES (13, 'test1', 'tst@test.cvom', 'test', 'test');

-- --------------------------------------------------------

-- 
-- Table structure for table `custom_pages`
-- 

CREATE TABLE `custom_pages` (
  `id` int(11) NOT NULL auto_increment,
  `seoname` varchar(255) NOT NULL,
  `pagetitle` varchar(1000) NOT NULL,
  `pagetitle2` varchar(1000) NOT NULL,
  `mainHeading` varchar(255) NOT NULL,
  `subHeading` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `headerBGImage` varchar(255) NOT NULL,
  `headerImage` varchar(255) NOT NULL,
  `herderHeading` varchar(255) NOT NULL,
  `headerText` text NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `metakeywords` varchar(255) NOT NULL,
  `metadescription` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `custom_pages`
-- 

INSERT INTO `custom_pages` VALUES (1, 'index', 'The National Treasury Employees Union', 'Chapter 296', '', '', '&lt;p&gt;Welcome to the website of Chapter 296 of the National Treasury Employees Union (NTEU)!&lt;/p&gt;\r\n&lt;p&gt;We share NPS&amp;rsquo; desire to have a productive and happy workforce that strives to accomplish all of NPS&amp;rsquo; missions. We represent NPS staff. We share information in a timely fashion that is not readily available elsewhere. We give NPS staff the opportunity (sometimes by compiling anonymous comments) to participate in NPS&amp;rsquo; development of policies/decisions that affect staff and the workplace. We ensure that individuals know their rights as Federal employees and we stand by employees to ensure that NPS Management follows appropriate policies and procedures.&lt;/p&gt;\r\n&lt;p&gt;We hope that you find the website useful. Please explore the site. Please &lt;a href=&quot;contact.html&quot;&gt;&lt;strong&gt;contact us&lt;/strong&gt;&lt;/a&gt; if you have any questions or suggestions about the website or Chapter 296.&lt;/p&gt;', '', '', '', '', 'Welcome to NTEU', 'Welcome to NTEU Welcome to NTEU', 'Welcome to NTEU Welcome to NTEU Welcome to NTEU');
INSERT INTO `custom_pages` VALUES (2, 'about', 'About Us', '', '', '', '&lt;p&gt;&lt;strong&gt;&lt;em&gt;&quot;To organize Federal employees to work together to ensure that every Federal employee is treated with dignity and respect.&quot;&lt;/em&gt;&lt;/strong&gt;&lt;br /&gt; &lt;br /&gt; We are the official Union organization that represents the National Park Service staff in the Washington, D.C., metropolitan area, and various locations throughout the continental USA. If you are organizationally part of the National Park Service Washington Office staff, we represent you.We strive to work in partnership with agency officials to accomplish mutual goals, and maintain a productive and empowered workforce.&lt;br /&gt; &lt;br /&gt; We put our best foot forward to provide substantive information that impacts the quality of our constituent&amp;rsquo;s work life, in a timely manner. &lt;br /&gt; &lt;br /&gt; We serve as a pillar of strength for every bargaining unit employee in their time of need, and act on their behalf, regardless of membership status. Bargaining unit status is based solely on the classification of your position within the agency. Union members are employees that pay dues.&lt;br /&gt; &lt;br /&gt; We will inform you of your rights.&lt;/p&gt;', '', '1298889932image.jpg', '', '', 'About Us', 'About Us', 'About Us');
INSERT INTO `custom_pages` VALUES (12, 'committees', 'Committees', '', '', '', '&lt;p&gt;&lt;strong&gt;By-Laws&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;John Renaud, Chair&lt;br /&gt;202-354-2066&lt;/li&gt;\r\n&lt;li&gt;Victoria Clarke, Rebecca Shiffer (Members)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Communications&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Mike Bando, Chair and IT Security&lt;br /&gt;202-354-2231&lt;/li&gt;\r\n&lt;li&gt;Ngu Nyindem, Webmaster and IT Security&lt;br /&gt;202-641-1926&lt;/li&gt;\r\n&lt;li&gt;Victoria Clarke (Member)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Legislation&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Ann Sulkovsky, Chair&lt;br /&gt;202-354-2083&lt;/li&gt;\r\n&lt;li&gt;Linda McCLelland, Deputy Chair&lt;br /&gt;202-354-2258&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Membership&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;John Renaud, Chair&lt;br /&gt;202-354-2066&lt;/li&gt;\r\n&lt;li&gt;Jim Evans, Lea Anne Chapman* (Members)&lt;br /&gt;*Membership Lists&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Nominations and Elections&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Rebecca Shiffer, Chair&lt;br /&gt;202-354-2029&lt;/li&gt;\r\n&lt;li&gt;Rosa Wilson, Jim Evans, John Renaud (Members)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Telework&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Erika Seibert, Chair&lt;br /&gt;202-354-2217&lt;/li&gt;\r\n&lt;li&gt;John Renaud (Member)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p style=&quot;font-weight: bold; font-size: 16px; padding-top: 20px;&quot;&gt;Miscellaneous (alphabetical)&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Dues&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Liz Petrella, Lead&lt;br /&gt;202-354-2040&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Employee ID Badges&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Rudy D&amp;rsquo;Alessandro&lt;br /&gt;202-354-1805&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Federal Transportation Subsidy Program&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Liz Petrella, Co-Lead&lt;br /&gt;202-354-2040&lt;/li&gt;\r\n&lt;li&gt;Gary Sachau, Co-Lead&lt;br /&gt;202-354-2044&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;National Academy of Public Administration&#039;s (NAPA&#039;s)  Report on Parkside Cultural Resource&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Rudy D&amp;rsquo;Alessandro&lt;br /&gt;202-354-1805&lt;/li&gt;\r\n&lt;li&gt;Michele Aubrey, Sue Renaud, Kristen McMasters (Members)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Official Personnel File Conversion&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Victoria Clarke, Co-Lead&lt;br /&gt;202-513-7172&lt;/li&gt;\r\n&lt;li&gt;Robert Hyde, Co-Lead&lt;br /&gt;202-513-7148&lt;/li&gt;\r\n&lt;li&gt;John Renaud, Co-Lead&lt;br /&gt;202-354-2066&lt;/li&gt;\r\n&lt;/ul&gt;', '', '', '', '', 'Committees', '', '');
INSERT INTO `custom_pages` VALUES (8, 'press-room', 'WELCOME TO THE CHAPTER 296 PRESS ROOM!', '', '', '', '&lt;p&gt;For news about Chapter 296 this is one-stop shopping.  Here you will find announcements of interest on WASO employment opportunities, members needing leave donations, and upcoming events, including information on Chapter meetings.&lt;/p&gt;\r\n&lt;p&gt;Check out the links below to find out the latest information:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;NTEU Headquarters Website&lt;/li&gt;\r\n&lt;li&gt;Monthly Chapter Meeting (aka, 3rd Thursday Brown Bag Luncheon)&lt;/li&gt;\r\n&lt;li&gt;Vacancy Announcements&lt;/li&gt;\r\n&lt;li&gt;Executive Board Meetings&lt;/li&gt;\r\n&lt;li&gt;Stewards Meetings&lt;/li&gt;\r\n&lt;li&gt;Upcoming Events&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;MEMBERS ARE ENCOURAGED TO DIRECT THEIR QUESTIONS, OR SUGGESTIONS ABOUT INFORMATION TO BE POSTED ON THE CHAPTER WEBSITE, TO CHAPTER LEADERS AT ANYTIME.&lt;/strong&gt;&lt;/p&gt;', '', '', '', '', 'Press Room', '', '');
INSERT INTO `custom_pages` VALUES (9, 'member-area', 'WELCOME TO THE CHAPTER 296 MEMBER AREA!', '', '', '', '&lt;p&gt;In the future this area will be restricted to Chapter 296 members only.  During the interim, general information is being provided to all visitors under the following four sections.&lt;br /&gt;&lt;br /&gt; &lt;strong&gt;Archives&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Therein are reference documents conveniently grouped for quick access by Shop Stewards, Committee staff, et al.  The documents include, but are not limited to, Chapter Meeting reports, and forms (e.g., for recruitment of new members, leave donations, grievance checklists, etc.)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Grievances&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Therein is information on both the &amp;ldquo;Individual&amp;rdquo; and &amp;ldquo;Institutional&amp;rdquo; type of grievances.  Only numbers and general fact patterns are provided in the Individual type.&lt;/li&gt;\r\n&lt;li&gt;FYI, Institutional grievances can affect small groups of employees from any workgroup within the organization, the entire workforce, or any range in between.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;REMINDER ANY IDENTIFYING INFORMATION WILL BE REDACTED BEFORE POSTING TO THE WEBSITE ONLY NUMBERS AND GENERAL FACT PATTERNS ARE PROVIDED &lt;/strong&gt;&lt;br /&gt;&lt;br /&gt; &lt;strong&gt;Legislative Matters&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Therein is information on current National Treasury Employee Union legislative priorities, plus information on other legislative matters of interest to Federal employees, specifically National Park Service staff in the Washington Office.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;Hot Topics&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Therein is the latest information on subjects relative to WASO employment.  As new Hot Topics are added, the older stories will be moved to the Archives Section of the website.  Visitors should follow the links below:    \r\n&lt;ul&gt;\r\n&lt;li&gt;H1N1 (Swine Flu)&lt;/li&gt;\r\n&lt;li&gt;Electronic Official Personnel Files&lt;/li&gt;\r\n&lt;li&gt;New ID Badges&lt;/li&gt;\r\n&lt;li&gt;Federal Transit Subsidy Program&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;strong&gt;MEMBERS ARE ENCOURAGED TO DIRECT THEIR QUESTIONS, OR SUGGESTIONS ABOUT INFORMATION TO BE POSTED ON THE CHAPTER WEBSITE, TO CHAPTER LEADERS AT ANYTIME.&lt;/strong&gt;&lt;/p&gt;', '', '', '', '', 'MEMBER AREA', '', '');
INSERT INTO `custom_pages` VALUES (10, 'executive-board', 'Executive Board', '', '', '', '&lt;div class=&quot;executive&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;President&lt;/strong&gt;&lt;br /&gt; John W. Renaud&lt;br /&gt; 202-354-2066&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;First Vice President&lt;/strong&gt;&lt;br /&gt; Victoria C. Clarke&lt;br /&gt; 202-513-7172&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Second Vice President&lt;/strong&gt;&lt;br /&gt; Richard Waldbauer&lt;br /&gt; 202-354-6969&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Secretary&lt;/strong&gt;&lt;br /&gt; Robin Coates&lt;br /&gt; 202-354-2201&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Treasurer&lt;/strong&gt;&lt;br /&gt; Vishnu Persaud&lt;br /&gt; 202-513-7147&lt;/p&gt;\r\n&lt;/div&gt;', '', '', '', '', 'Executive Board', '', '');
INSERT INTO `custom_pages` VALUES (11, 'shop-stewards', 'Shop Stewards', '', '', '', '&lt;div class=&quot;shop&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;Chief Steward&lt;/strong&gt;&lt;br /&gt;&lt;strong&gt;Rudy D&amp;rsquo;Alesssandro&lt;/strong&gt;&lt;br /&gt;202-354-1805&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Victoria Clarke&lt;/strong&gt;&lt;br /&gt;202-513-7172&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Robert Hyde&lt;/strong&gt;&lt;br /&gt;202-513-7148&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Ngu Nyindem&lt;/strong&gt;&lt;br /&gt;202-354-1454&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;John Koren&lt;/strong&gt;&lt;br /&gt;703-487-9145&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Jennifer Wellock&lt;/strong&gt;&lt;br /&gt;202-354-2039&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;James Bird&lt;/strong&gt;&lt;br /&gt;202-354-1837&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Harry Butowsky&lt;/strong&gt;&lt;br /&gt;202-354-2261&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Valerie Brown&lt;/strong&gt;&lt;br /&gt;202-513-7158&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Ann Sulkovsky &lt;/strong&gt;&lt;br /&gt;202-354-2083&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Erika Seibert &lt;/strong&gt;&lt;br /&gt;202-354-2217&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Linda Griffin &lt;/strong&gt;&lt;br /&gt; 202-354-2075&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Liz Petrella &lt;/strong&gt;&lt;br /&gt; 202-354-2040&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Randy Stanley &lt;/strong&gt;&lt;br /&gt; 970-267-2194&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Rebecca Shiffer &lt;/strong&gt;&lt;br /&gt; 202-354-2029&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Robin Coates &lt;/strong&gt;&lt;br /&gt; 202-354-2201&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Vishnu Persuad &lt;/strong&gt;&lt;br /&gt; 202-354-7147&lt;/p&gt;\r\n&lt;/div&gt;', '', '', '', '', 'Shop Stewards', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_admin_master`
-- 

CREATE TABLE `demo_admin_master` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(255) collate latin1_general_ci default NULL,
  `admin_user` varchar(20) collate latin1_general_ci default NULL,
  `admin_password` varchar(20) collate latin1_general_ci default NULL,
  `admin_email` varchar(100) collate latin1_general_ci default NULL,
  `is_active` int(1) NOT NULL default '1',
  `admin_type` int(1) NOT NULL default '0',
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `demo_admin_master`
-- 

INSERT INTO `demo_admin_master` VALUES (1, 'Superadmin', 'admin', 'kenaldo1', 'santanu.patra85@gmail.com', 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_content_master`
-- 

CREATE TABLE `demo_content_master` (
  `content_id` int(10) NOT NULL auto_increment,
  `title` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `content_description` longtext character set latin1 collate latin1_general_ci,
  `meta_title` text character set latin1 collate latin1_general_ci,
  `meta_description` text character set latin1 collate latin1_general_ci,
  `meta_keyword` text character set latin1 collate latin1_general_ci,
  `is_active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `demo_content_master`
-- 

INSERT INTO `demo_content_master` VALUES (2, 'About Us', '<div class="content" id="content_container">\r\n<p><strong><em>&quot;To organize Federal employees to work together to ensure that every Federal employee is treated with dignity and respect.&quot;</em></strong><br />\r\n<br />\r\nWe are the official Union organization that represents the National Park Service staff in the Washington, D.C., metropolitan area, and various locations throughout the continental USA. If you are organizationally part of the National Park Service Washington Office staff, we represent you.<br />\r\n<br />\r\n<img border="0" align="left" src="http://www.nteu296.com/resources/Fotolia_10883510_XS.jpg" alt="" /><img border="0" align="left" src="resources/spacer.gif" alt="" /> We strive to work in partnership with agency officials to accomplish mutual goals, and maintain a productive and empowered workforce.<br />\r\n<br />\r\nWe put our best foot forward to provide substantive information that impacts the quality of our constituent&rsquo;s work life, in a timely manner. <br />\r\n<br />\r\nWe serve as a pillar of strength for every bargaining unit employee in their time of need, and act on their behalf, regardless of membership status. Bargaining unit status is based solely on the classification of your position within the agency. Union members are employees that pay dues.<br />\r\n<br />\r\nWe will inform you of your rights. </p>\r\n</div>', NULL, NULL, NULL, 1);
INSERT INTO `demo_content_master` VALUES (3, 'Press Room', '<div id="content_container" class="content">\r\n              <p/><p>WELCOME TO THE CHAPTER 296 PRESS ROOM!</p>  \r\n\r\n<p>For news about Chapter 296 this is one-stop shopping.  Here you will find announcements of interest on WASO employment opportunities, members needing leave donations, and upcoming events, including information on Chapter meetings.</p>\r\n\r\n<p>Check out the links below to find out the latest information:\r\n\r\n</p><ul><li>NTEU Headquarters Website</li>\r\n<li>Monthly Chapter Meeting (aka, 3rd Thursday Brown Bag Luncheon)</li>\r\n<li>Vacancy Announcements</li>\r\n<li>Executive Board Meetings</li>\r\n<li>Stewards Meetings</li>\r\n<li>Upcoming Events</li></ul>\r\n\r\n<p><strong>MEMBERS ARE ENCOURAGED TO DIRECT THEIR QUESTIONS, OR SUGGESTIONS ABOUT INFORMATION TO BE POSTED ON THE CHAPTER WEBSITE, TO CHAPTER LEADERS AT ANYTIME.</strong></p>\r\n\r\n\r\n              \r\n            </div>', NULL, NULL, NULL, 1);
INSERT INTO `demo_content_master` VALUES (4, 'Member Area', '<div id="content_container" class="content">\r\n              <p>\r\n              WELCOME TO THE CHAPTER 296 MEMBER AREA!<br/><br/>\r\n\r\nIn the future this area will be restricted to Chapter 296 members only.  During the interim, general information is being provided to all visitors under the following four sections.<br/><br/>\r\n\r\n<strong>Archives</strong><br/>\r\n\r\n</p><ul><li>Therein are reference documents conveniently grouped for quick access by Shop Stewards, Committee staff, et al.  The documents include, but are not limited to, Chapter Meeting reports, and forms (e.g., for recruitment of new members, leave donations, grievance checklists, etc.)</li></ul>\r\n\r\n<strong>Grievances</strong><br/>\r\n\r\n<ul><li>Therein is information on both the â€œIndividualâ€ and â€œInstitutionalâ€ type of grievances.  Only numbers and general fact patterns are provided in the Individual type.</li>  \r\n\r\n<li>FYI, Institutional grievances can affect small groups of employees from any workgroup within the organization, the entire workforce, or any range in between.</li></ul> \r\n\r\n\r\n<strong>REMINDER\r\nANY IDENTIFYING INFORMATION WILL BE REDACTED\r\nBEFORE POSTING TO THE WEBSITE\r\nONLY NUMBERS AND GENERAL FACT PATTERNS\r\nARE PROVIDED\r\n</strong><br/><br/>\r\n<strong>Legislative Matters</strong><br/>\r\n\r\n<ul><li>Therein is information on current National Treasury Employee Union legislative priorities, plus information on other legislative matters of interest to Federal employees, specifically National Park Service staff in the Washington Office.</li></ul>\r\n\r\n<strong>Hot Topics</strong><br/>\r\n\r\n	<ul><li>Therein is the latest information on subjects relative to WASO employment.  As new Hot Topics are added, the older stories will be moved to the Archives Section of the website.  Visitors should follow the links below:\r\n\r\n<ul><li>H1N1 (Swine Flu)</li>\r\n	<li>Electronic Official Personnel Files</li>\r\n	<li>New ID Badges</li>\r\n	<li>Federal Transit Subsidy Program</li></ul></li></ul>\r\n\r\n<strong>MEMBERS ARE ENCOURAGED TO DIRECT THEIR QUESTIONS, OR SUGGESTIONS ABOUT INFORMATION TO BE POSTED ON THE CHAPTER WEBSITE, TO CHAPTER LEADERS AT ANYTIME.</strong>\r\n\r\n              \r\n            </div>', NULL, NULL, NULL, 1);
INSERT INTO `demo_content_master` VALUES (5, 'Home', '<div id="content_container" class="content">\r\n<p align="left">Welcome to the website of Chapter 296 of the National Treasury Employees Union (NTEU)!<br />\r\n<br />\r\nWe share NPS&rsquo; desire to have a productive and happy workforce that strives to accomplish all of NPS&rsquo; missions. We represent NPS staff. We share information in a timely fashion that is not readily available elsewhere. We give NPS staff the opportunity (sometimes by compiling anonymous comments) to participate in NPS&rsquo; development of policies/decisions that affect staff and the workplace. We ensure that individuals know their rights as Federal employees and we stand by employees to ensure that NPS Management follows appropriate policies and procedures.<br />\r\n<br />\r\nWe hope that you find the website useful. Please explore the site. Please <a href="contact_us.php">contact us</a> if you have any questions or suggestions about the website or Chapter 296.</p>\r\n</div>', NULL, NULL, NULL, 1);
INSERT INTO `demo_content_master` VALUES (6, 'Contact Us', '<p>For any inquiries or comments, please send us an email to <a href="mailto:info@nteu296.org">info@nteu296.org</a>. Our mailing address is: <br/>\r\n                <br/>\r\n                202-354-2221 <br/>\r\n                NTEU Chapter 296 <br/>\r\n                1201 Eye Street, NW <br/>\r\n                Room 843 <br/>\r\n                Washington, DC 20005 <br/>\r\n                <br/>\r\n              </p>', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_event`
-- 

CREATE TABLE `demo_event` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `order_no` int(10) NOT NULL default '0',
  `is_active` int(1) NOT NULL default '1',
  `description` text character set latin1 collate latin1_general_ci,
  `date` date default NULL,
  `filepath` varchar(128) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `demo_event`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `demo_eventbb`
-- 

CREATE TABLE `demo_eventbb` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `order_no` int(10) NOT NULL default '0',
  `is_active` int(1) NOT NULL default '1',
  `description` text character set latin1 collate latin1_general_ci,
  `date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `demo_eventbb`
-- 

INSERT INTO `demo_eventbb` VALUES (6, 'Test Meeting', 0, 1, 'Test', '2009-12-11');

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_eventchapter`
-- 

CREATE TABLE `demo_eventchapter` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `order_no` int(10) NOT NULL default '0',
  `is_active` int(1) NOT NULL default '1',
  `description` text character set latin1 collate latin1_general_ci,
  `date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `demo_eventchapter`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `demo_job`
-- 

CREATE TABLE `demo_job` (
  `job_id` int(11) NOT NULL auto_increment,
  `job_title` varchar(255) default NULL,
  `job_url` varchar(255) default NULL,
  `job_series` varchar(255) default NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` int(1) NOT NULL default '1',
  PRIMARY KEY  (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `demo_job`
-- 

INSERT INTO `demo_job` VALUES (7, 'Wildlife Management Program Manager', 'http://jobview.usajobs.gov/GetJob.aspx?JobID=84578734&JobTitle=Wildlife+Management+Program+Manager&vw=d&brd=3876&ss=0&FedEmp=N&FedPub=Y&q=National+Par', 'GS-0486-13/14', '2009-11-16', '2009-12-04', 1);
INSERT INTO `demo_job` VALUES (5, 'Administrative Officer', 'http://jobview.usajobs.gov/GetJob.aspx?JobID=84614091&JobTitle=Administrative+Officer&sort=rv&vw=d&brd=3876&ss=0&FedEmp=N&FedPub=Y&q=National+Park+Ser', 'GS-0341-09', '2009-11-16', '2009-12-07', 1);
INSERT INTO `demo_job` VALUES (6, 'Program Assistant', 'http://jobview.usajobs.gov/GetJob.aspx?JobID=84890021&JobTitle=Program+Assistant&sort=rv&vw=d&brd=3876&ss=0&FedEmp=N&FedPub=Y&q=National+Park+Service+', 'GS-0303-06/07', '2009-12-01', '2009-12-22', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_member`
-- 

CREATE TABLE `demo_member` (
  `member_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `is_active` int(1) NOT NULL default '1',
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `demo_member`
-- 

INSERT INTO `demo_member` VALUES (3, 'Sharon Njemanze', 'Sharon_Njemanze@nps.gov', 1);
INSERT INTO `demo_member` VALUES (4, 'Sean Clifford', 'sean_clifford@nps.gov', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_news`
-- 

CREATE TABLE `demo_news` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(255) collate latin1_general_ci default NULL,
  `order_no` int(10) NOT NULL default '0',
  `is_active` int(1) NOT NULL default '1',
  `description` text collate latin1_general_ci,
  `date` date default NULL,
  `filepath` varchar(128) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `demo_news`
-- 

INSERT INTO `demo_news` VALUES (4, 'New Deputy Chief Steward for NTEU Chapter 296', 3, 1, '<p>I am pleased to inform you that Rudy DAlessandro has agreed to assume the role of Deputy Chief Steward for Chapter 296. Rudy will assist Chief Steward Bob Hyde in the administration of the Chief Steward''s Offices.</p>\r\n<p>I know that Rudy will carry out this responsibility in fine fashion.</p>\r\n<p>Yours,</p>\r\n<p>John W. Renaud<br />\r\nPresident<br />\r\nNTEU Chapter 296<br />\r\nNational Park Service<br />\r\nTelephone: 202-354-2066<br />\r\nFax: 202 - 371-6443</p>', '2009-11-30', 'InsideDOI.pdf');
INSERT INTO `demo_news` VALUES (12, 'NTEU Wins Important Step in Contract Dispute', 2, 1, '<p><strong>NTEU Wins Important Step in Contract Dispute</strong></p>\r\n<p>NTEU won a very important decision last week in its fight to give NPS employees (represented by NTEU Chapter 296) the same kind of benefits the vast majority of the 150,000 federal employees represented by NTEU have. The Federal Service Impasses Panel, a federal agency with the final say over resolving bargaining disputes, ordered Park Service management to do something it has avoided doing for years. NPS was ordered to stop wasting time in negotiations and was told that if its bargaining team can&rsquo;t make the decisions needed to reach agreement with the NTEU Chapter 296 bargaining team, that the Panel would take over for the negotiators and make the decisions for them. Just to show that it means business, the Panel took the very unusual step of ordering management to immediately file its last best offer on more than two dozen contract articles followed quickly by written arguments as to why its proposal is better than NTEU&rsquo;s. Once it gets those papers, the Panel is empowered to tell management what its employment policies will be in those articles.</p>\r\n<p>The Panel imposed this very unusual decision after NTEU showed how management negotiators have been wasting time and agency funds on virtually useless bargaining discussions for years. The Panel further ordered management to submit another two dozen plus articles to an expedited bargaining process under the guidance of an outside neutral mediator. For any articles that are not settled via the expedited bargaining process, the neutral mediator will collect facts and issue a written recommendation. That recommendation will go to the Panel where it could be upheld and given final and binding legal status insofar as ending the bargaining process.<br />\r\n&nbsp;<br />\r\nAs a result of this decision, NTEU&rsquo;s bargaining team members have begun work with NTEU&rsquo;s national negotiators and legal staff to make our case as to why Park Service employees should be treated just as well as other federal employees when it comes to cash rewards for good performance, alternative work schedules, working at home, compensation for suggestions adopted, fair and open promotion procedures, safety, leave, and stipends for things like child care, public transportation and other costs. These are just a few of the issues that will be resolved by this process. If you have questions about the bargaining, talk to one of the team members listed. We also hope that you will get behind NTEU and show management your support for better working conditions. Any NTEU Chapter 296 bargaining team member can tell you how to do that. Remember, these decisions will determine your working conditions for the next four years. As soon as the bargaining process is over, the resulting contract will be submitted for ratification to the union and management. Please note that only Chapter 296 members in good standing as of the date of the union ratification meeting can cast a ratification vote..</p>', '2010-10-26', NULL);
INSERT INTO `demo_news` VALUES (13, 'Message from NTEU National President', 1, 1, '<p>On Monday, January 17, our nation will observe the federal holiday in honor of Dr. Martin Luther King, Jr. This year marks the 25th anniversary of the first celebration of this federal holiday which is observed by many through participation in a national day of service. Information about the day of service and how to participate and find projects in your area is available at www.mlkday.gov.  </p>\r\n<p>I encourage you to distribute and post these fliers in your workplace as appropriate. </p>\r\n<p>  							Colleen M. Kelley <br />\r\n</p>\r\nNational President', '2011-01-12', 'mlkflier.pdf');

-- --------------------------------------------------------

-- 
-- Table structure for table `demo_none`
-- 

CREATE TABLE `demo_none` (
  `content_id` int(10) NOT NULL auto_increment,
  `title` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `content_description` longtext character set latin1 collate latin1_general_ci,
  `meta_title` text character set latin1 collate latin1_general_ci,
  `meta_description` text character set latin1 collate latin1_general_ci,
  `meta_keyword` text character set latin1 collate latin1_general_ci,
  `is_active` tinyint(1) NOT NULL default '1',
  `filepath` varchar(128) default NULL,
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `demo_none`
-- 

INSERT INTO `demo_none` VALUES (12, 'Membership Drive', '<p>As we make huge push in our membership drive, you may find use for these documents:</p>\r\n<ol>\r\n    <li><a href="http://www.nteu296.com/documents/Membership Recruitment Incentives.doc">Membership Recruitment Incentives</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/1187.pdf">1187</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/NTEUFacts.pdf">NTEU Facts</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/CMK Letter to BUEs.pdf">Letter from NTEU National President to Chapter 296</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/Doubters.pdf">Doubter''s Reading</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/NPSContract2009.pdf">2009 NPS Contract</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/NTEUMemberBenefits.pdf">NTEU Member Benefits</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/recruitment poster.pub">Recruitment Poster</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/Sample Recruitment Speech.doc">Sample Recruitment Speech</a> </li>\r\n    <li><a href="http://www.nteu296.com/documents/FY2010DuesCharts.xls">FY 2010 Dues Charts</a> </li>\r\n    <li><a href="http://www.nteu296.org/documents/WASOEmployeesList.xls">WASO Employees List</a> </li>\r\n</ol>', 'FY 2010 Dues Chart', NULL, NULL, 1, NULL);
INSERT INTO `demo_none` VALUES (14, 'December 24th Half Day Closing', 'On December 11, 2009, the White House announced a half-day closing&nbsp;of Federal agencies for December 24, 2009.&nbsp;', NULL, NULL, NULL, 1, 'Dec 24 Half Day.pdf');
INSERT INTO `demo_none` VALUES (15, 'FEEA is there for federal employees.', 'The <strong>Federal Employee Education and Assistance Fund (FEEA)</strong> has helped thousands of federal employees affected by natural disasters and is preparing to help any federal employee impacted by the devastating flooding in Tennessee, Mississippi and Kentucky. <br />\r\n<br />\r\n<font size="5" color="#ff0000">But FEEA needs your help. </font><br />\r\n<br />\r\nIt is the only organization dedicated solely to federal employees and the vast majority of its funding comes directly from other federal employees. Your immediate donation will allow federal workers impacted by the flooding to receive emergency assistance.<br />\r\n<br />\r\n<font size="5" color="#ff0000">Any amount can help FEEA continue with its 20-year history of assisting federal employees.</font>', NULL, NULL, NULL, 1, 'FEEAFlier(Attach1).pdf');
INSERT INTO `demo_none` VALUES (16, 'FEEA Can Help', '<strong><font size="4">HAVE THE FLOOD WATERS:<br />\r\n</font></strong>\r\n<ol>\r\n    <li><strong><font size="4">REACHED YOUR HOME</font></strong></li>\r\n    <li><strong><font size="4">FLOODED YOUR CAR</font></strong></li>\r\n</ol>\r\n<font size="5" color="#ff6600">FEEA CAN HELP.</font><br />\r\n<br />\r\nThe<strong> Federal Employee Education and Assistance Fund (FEEA) </strong>provides fast emergency assistance funds to federal employees impacted by natural disasters. Through emergency assistance or no-interest loans, FEEA can help you with the short-term assistance you need to get through the initial days of a disaster.', NULL, NULL, NULL, 1, 'FEEAFlier(Attach2).pdf');

-- --------------------------------------------------------

-- 
-- Table structure for table `membersArea`
-- 

CREATE TABLE `membersArea` (
  `id` int(12) NOT NULL auto_increment,
  `title` varchar(500) collate latin1_german2_ci NOT NULL,
  `href` varchar(500) collate latin1_german2_ci NOT NULL,
  `fileName` varchar(500) collate latin1_german2_ci NOT NULL,
  `linkUrl` varchar(500) collate latin1_german2_ci NOT NULL,
  `catId` int(12) NOT NULL,
  `recType` varchar(400) collate latin1_german2_ci NOT NULL,
  `metatitle` varchar(500) collate latin1_german2_ci NOT NULL,
  `metakeywords` text collate latin1_german2_ci NOT NULL,
  `metadescription` text collate latin1_german2_ci NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `membersArea`
-- 

INSERT INTO `membersArea` VALUES (2, 'NTEU 296 2005 Ratified Contract', 'nteu-296-2005-ratified-contract', 'nteu_contract.doc', 'http://nteu296.org/', 0, 'archives', '', '', '', '2011-03-29 02:27:00');
INSERT INTO `membersArea` VALUES (3, 'Union WASO NPS Agreement NFFE', 'union-waso-nps-agreement-nffe', 'Union WASO NPS Agreement NFFE Signed.pdf', '', 0, 'archives', '', '', '', '2011-03-29 02:29:00');
INSERT INTO `membersArea` VALUES (4, 'Amendment to NFFE Union Contract', 'amendment-to-nffe-union-contract', 'Amendment to NFFE Union Contract signed.pdf', '', 0, 'archives', '', '', '', '2011-03-29 02:30:00');
INSERT INTO `membersArea` VALUES (5, 'Chapter 296 Adopted Bylaws December 10, 2002', 'chapter-296-adopted-bylaws-december-10-2002', 'Chapter 296 Adopted Bylaws December 10, 2002.doc', '', 0, 'archives', '', '', '', '2011-03-29 02:30:00');
INSERT INTO `membersArea` VALUES (6, 'Dues Chart for FY 2011', 'dues-chart-for-fy-2011', '2011_Dues_Charts.xlsx', '', 0, 'archives', '', '', '', '2011-03-29 02:31:00');
INSERT INTO `membersArea` VALUES (7, 'Membership Form SF1187', 'membership-form-sf1187', 'SF1187_296a_Membership Form.pdf', '', 0, 'archives', '', '', '', '2011-03-29 02:31:00');
INSERT INTO `membersArea` VALUES (9, 'Active Grievances â€“ Numbers and General Fact Patterns', 'active-grievances-a-numbers-and-general-fact-patterns', '', '', 1, 'grievances', '', '', '', '2011-03-29 02:41:00');
INSERT INTO `membersArea` VALUES (10, 'Pay Parity', 'pay-parity', '', '', 0, 'legislative', '', '', '', '2011-03-29 02:44:00');
INSERT INTO `membersArea` VALUES (11, 'New Director', 'new-director', '', '', 0, 'hot', '', '', '', '2011-03-29 02:44:00');
INSERT INTO `membersArea` VALUES (12, 'New ID Badges', 'new-id-badges', '', '', 0, 'hot', '', '', '', '2011-03-29 02:44:00');
INSERT INTO `membersArea` VALUES (13, 'Year to Date â€“ 2009 â€“ General Fact Patterns, Numbers, and Results', 'year-to-date-a-2009-a-general-fact-patterns-numbers-and-results', '', '', 1, 'grievances', '', '', '', '2011-03-29 06:55:00');
INSERT INTO `membersArea` VALUES (14, 'Active Grievances â€“ List each one -- Fact pattern â€“ Status â€“ Next Steps', 'active-grievances-a-list-each-one-fact-pattern-a-status-a-next-steps', '', '', 2, 'grievances', '', '', '', '2011-03-29 06:55:00');
INSERT INTO `membersArea` VALUES (15, 'Year to Date â€“ 2009 -- List each one -- Fact pattern â€“ Status â€“ Next Steps', 'year-to-date-a-2009-list-each-one-fact-pattern-a-status-a-next-steps', '', '', 2, 'grievances', '', '', '', '2011-03-29 06:55:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `membersAreaCategories`
-- 

CREATE TABLE `membersAreaCategories` (
  `id` int(12) NOT NULL auto_increment,
  `catTitle` varchar(500) collate latin1_german2_ci NOT NULL,
  `dated` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `membersAreaCategories`
-- 

INSERT INTO `membersAreaCategories` VALUES (1, 'Individual Grievances', '2011-03-29');
INSERT INTO `membersAreaCategories` VALUES (2, 'Institutional Grievances ', '2011-03-29');

-- --------------------------------------------------------

-- 
-- Table structure for table `posts`
-- 

CREATE TABLE `posts` (
  `id` int(12) NOT NULL auto_increment,
  `title` varchar(600) NOT NULL,
  `href` varchar(600) NOT NULL,
  `shortdescr` text NOT NULL,
  `descr` text NOT NULL,
  `recType` varchar(255) NOT NULL,
  `fileName` varchar(600) NOT NULL,
  `metatitle` varchar(600) NOT NULL,
  `metakeywords` varchar(600) NOT NULL,
  `metadescription` text NOT NULL,
  `publish_date` date NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- Dumping data for table `posts`
-- 

INSERT INTO `posts` VALUES (27, 'FEEA Can Help', 'feea-can-help', 'FEEA Can Help', '&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size: medium;&quot;&gt;HAVE THE FLOOD WATERS:&lt;br /&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;&lt;strong&gt;&lt;span style=&quot;font-size: medium;&quot;&gt;REACHED YOUR HOME&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;&lt;span style=&quot;font-size: medium;&quot;&gt;FLOODED YOUR CAR&lt;/span&gt;&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p&gt;&lt;span style=&quot;color: #ff6600; font-size: large;&quot;&gt;FEEA CAN HELP.&lt;/span&gt;&lt;br /&gt; &lt;br /&gt; The&lt;strong&gt; Federal Employee Education and Assistance Fund (FEEA) &lt;/strong&gt;provides fast emergency assistance funds to federal employees impacted by natural disasters. Through emergency assistance or no-interest loans, FEEA can help you with the short-term assistance you need to get through the initial days of a disaster.				&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;\r\n&lt;div&gt;&lt;/div&gt;', 'announcements', 'FEEAFlier(Attach2).pdf', 'FEEA Can Help', '', '', '1970-01-01', '2011-02-26 01:41:00');
INSERT INTO `posts` VALUES (30, 'My First Blog', 'my-first-blog', 'My first Blog short description My first Blog short description My first Blog short description My first Blog short description My first Blog short description My first Blog short description', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 'blogs', '', 'My First Blog', '', '', '1969-12-31', '2011-02-26 01:55:00');
INSERT INTO `posts` VALUES (26, 'Chapter Members in Leave Donation Status', 'chapter-members-in-leave-donation-status', 'Chapter Members in Leave Donation Status', '&lt;div style=&quot;font-size: 12px;&quot;&gt;&lt;ol&gt;\r\n&lt;li&gt;&lt;a href=&quot;mailto:sean_clifford@nps.gov&quot;&gt;Sean Clifford&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;mailto:Sharon_Njemanze@nps.gov&quot;&gt;Sharon Njemanze&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ol&gt;&lt;/div&gt;', 'announcements', '', 'Chapter Members in Leave Donation Status', '', '', '1970-01-01', '2011-02-26 01:40:00');
INSERT INTO `posts` VALUES (31, 'My Second Blog', 'my-second-blog', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 'blogs', '', 'My Second Blog', '', '', '1970-01-01', '2011-02-26 01:56:00');
INSERT INTO `posts` VALUES (25, 'WASO Job Openings', 'waso-job-openings', 'WASO Job Openings for Wildlife Management Program Manager, Program Assistant and Administrative Officer.', '&lt;table border=&quot;1&quot; width=&quot;500&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;th&gt;Job Title&lt;/th&gt; &lt;th&gt;Series &amp;amp; Grade&lt;/th&gt; &lt;th&gt;Opening Period&lt;/th&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84578734&amp;amp;JobTitle=Wildlife+Management+Program+Manager&amp;amp;vw=d&amp;amp;brd=3876&amp;amp;ss=0&amp;amp;FedEmp=N&amp;amp;FedPub=Y&amp;amp;q=National+Par&quot;&gt;Wildlife Management Program Manager&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0486-13/14&lt;/td&gt;\r\n&lt;td&gt;Monday, 16th November, 2009 to&lt;br /&gt; Friday, 4th December, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84890021&amp;amp;JobTitle=Program+Assistant&amp;amp;sort=rv&amp;amp;vw=d&amp;amp;brd=3876&amp;amp;ss=0&amp;amp;FedEmp=N&amp;amp;FedPub=Y&amp;amp;q=National+Park+Service+&quot;&gt;Program Assistant&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0303-06/07&lt;/td&gt;\r\n&lt;td&gt;Tuesday, 1st December, 2009 to&lt;br /&gt; Tuesday, 22nd December, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84614091&amp;amp;JobTitle=Administrative+Officer&amp;amp;sort=rv&amp;amp;vw=d&amp;amp;brd=3876&amp;amp;ss=0&amp;amp;FedEmp=N&amp;amp;FedPub=Y&amp;amp;q=National+Park+Ser&quot;&gt;Administrative Officer&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0341-09&lt;/td&gt;\r\n&lt;td&gt;Monday, 16th November, 2009 to&lt;br /&gt; Monday, 7th December, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;!--   \r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84654702&amp;aid=86568172-20119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84654702&amp;amp;aid=86568172-20119&amp;amp;WT.mc_n=125&quot;&gt;Access Identity Management Specialist&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0301-13&lt;/td&gt;\r\n&lt;td&gt;Thursday, November 19, 2009 to Thursday, December 03, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84643886&amp;aid=86568172-20119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84643886&amp;amp;aid=86568172-20119&amp;amp;WT.mc_n=125&quot;&gt;Management Analyst&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0343-12&lt;/td&gt;\r\n&lt;td&gt;Thursday, November 19, 2009 to Thursday, December 03, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84415289&amp;aid=86568172-18119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84415289&amp;amp;aid=86568172-18119&amp;amp;WT.mc_n=125&quot;&gt;Support Services Specialist&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0342-09&lt;/td&gt;\r\n&lt;td&gt;Tuesday, November 17, 2009 to Tuesday, December 01, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84651039&amp;aid=86568172-18119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84651039&amp;amp;aid=86568172-18119&amp;amp;WT.mc_n=125&quot;&gt;Access Identity Management Specialist&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0301-12&lt;/td&gt;\r\n&lt;td&gt;Tuesday, November 17, 2009 to Tuesday, December 01, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84578734&amp;aid=86568172-17119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84578734&amp;amp;aid=86568172-17119&amp;amp;WT.mc_n=125&quot;&gt;Wildlife Management Program Manager&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0486-13/14&lt;/td&gt;\r\n&lt;td&gt;Monday, November 16, 2009 to Friday, December 04, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84614091&amp;aid=86568172-17119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=84614091&amp;amp;aid=86568172-17119&amp;amp;WT.mc_n=125&quot;&gt;Administrative Officer&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-0341-09&lt;/td&gt;\r\n&lt;td&gt;Monday, November 16, 2009 to Monday, December 07, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=83831257&amp;aid=86568172-13119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=83831257&amp;amp;aid=86568172-13119&amp;amp;WT.mc_n=125&quot;&gt;Information Technology Specialist (Enterprise Archtitect)&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-2200-13/14&lt;/td&gt;\r\n&lt;td&gt;Thursday, November 12, 2009 to Thursday, December 03, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;a href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=83816076&amp;aid=86568172-13119&amp;WT.mc_n=125&quot; _mce_href=&quot;http://jobview.usajobs.gov/GetJob.aspx?JobID=83816076&amp;amp;aid=86568172-13119&amp;amp;WT.mc_n=125&quot;&gt;Information Technology Specialist (Enterprise Architect)&lt;/a&gt;&lt;/td&gt;\r\n&lt;td&gt;GS-2200-12/13&lt;/td&gt;\r\n&lt;td&gt;Thursday, November 12, 2009 to Thursday, December 03, 2009&lt;/td&gt;\r\n&lt;/tr&gt;\r\n--&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;', 'announcements', '', '', '', '', '1970-01-01', '2011-02-26 01:39:00');
INSERT INTO `posts` VALUES (24, 'New Deputy Chief Steward for NTEU Chapter 296', 'new-deputy-chief-steward-for-nteu-chapter-296', 'I am pleased to inform you that Rudy DAlessandro has agreed to assume the role of Deputy Chief Steward for Chapter 296. Rudy will assist Chief Steward Bob Hyde in the administration of the Chief Steward&#039;s Offices.', '&lt;p&gt;I am pleased to inform you that Rudy DAlessandro has agreed to assume the role of Deputy Chief Steward for Chapter 296. Rudy will assist Chief Steward Bob Hyde in the administration of the Chief Steward&#039;s Offices.&lt;/p&gt;\r\n&lt;p&gt;I know that Rudy will carry out this responsibility in fine fashion.&lt;/p&gt;\r\n&lt;p&gt;Yours,&lt;/p&gt;\r\n&lt;p&gt;John W. Renaud&lt;br /&gt; President&lt;br /&gt; NTEU Chapter 296&lt;br /&gt; National Park Service&lt;br /&gt; Telephone: 202-354-2066&lt;br /&gt; Fax: 202 - 371-6443&lt;/p&gt;', 'news', '', 'New Deputy Chief Steward for NTEU Chapter 296', '', '', '1970-01-01', '2011-02-26 01:37:00');
INSERT INTO `posts` VALUES (23, 'NTEU Wins Important Step in Contract Dispute', 'nteu-wins-important-step-in-contract-dispute', 'NTEU won a very important decision last week in its fight to give NPS employees (represented by NTEU Chapter 296) the same kind of benefits the vast majority of the 150,000 federal employees represented by NTEU have. The Federal Service Impasses Panel, a federal agency with the final say over resolving bargaining disputes, ordered Park Service management to do something it has avoided doing for years.', '&lt;p&gt;NTEU won a very important decision last week in its fight to give NPS employees (represented by NTEU Chapter 296) the same kind of benefits the vast majority of the 150,000 federal employees represented by NTEU have. The Federal Service Impasses Panel, a federal agency with the final say over resolving bargaining disputes, ordered Park Service management to do something it has avoided doing for years. NPS was ordered to stop wasting time in negotiations and was told that if its bargaining team can&amp;rsquo;t make the decisions needed to reach agreement with the NTEU Chapter 296 bargaining team, that the Panel would take over for the negotiators and make the decisions for them. Just to show that it means business, the Panel took the very unusual step of ordering management to immediately file its last best offer on more than two dozen contract articles followed quickly by written arguments as to why its proposal is better than NTEU&amp;rsquo;s. Once it gets those papers, the Panel is empowered to tell management what its employment policies will be in those articles.&lt;/p&gt;\r\n&lt;p&gt;The Panel imposed this very unusual decision after NTEU showed how management negotiators have been wasting time and agency funds on virtually useless bargaining discussions for years. The Panel further ordered management to submit another two dozen plus articles to an expedited bargaining process under the guidance of an outside neutral mediator. For any articles that are not settled via the expedited bargaining process, the neutral mediator will collect facts and issue a written recommendation. That recommendation will go to the Panel where it could be upheld and given final and binding legal status insofar as ending the bargaining process.&lt;br /&gt; &amp;nbsp;&lt;br /&gt; As a result of this decision, NTEU&amp;rsquo;s bargaining team members have begun work with NTEU&amp;rsquo;s national negotiators and legal staff to make our case as to why Park Service employees should be treated just as well as other federal employees when it comes to cash rewards for good performance, alternative work schedules, working at home, compensation for suggestions adopted, fair and open promotion procedures, safety, leave, and stipends for things like child care, public transportation and other costs. These are just a few of the issues that will be resolved by this process. If you have questions about the bargaining, talk to one of the team members listed. We also hope that you will get behind NTEU and show management your support for better working conditions. Any NTEU Chapter 296 bargaining team member can tell you how to do that. Remember, these decisions will determine your working conditions for the next four years. As soon as the bargaining process is over, the resulting contract will be submitted for ratification to the union and management. Please note that only Chapter 296 members in good standing as of the date of the union ratification meeting can cast a ratification vote..&lt;/p&gt;', 'news', '', 'NTEU Wins Important Step in Contract Dispute', '', '', '1970-01-01', '2011-02-26 01:36:00');
INSERT INTO `posts` VALUES (22, 'Message from NTEU National President', 'message-from-nteu-national-president', 'On Monday, January 17, our nation will observe the federal holiday in honor of Dr. Martin Luther King, Jr. This year marks the 25th anniversary of the first celebration of this federal holiday which is observed by many through participation in a national day of service. Information about the day of service and how to participate and find projects in your area is available at www.mlkday.gov.', '&lt;p&gt;On Monday, January 17, our nation will observe the federal holiday in honor of Dr. Martin Luther King, Jr. This year marks the 25th anniversary of the first celebration of this federal holiday which is observed by many through participation in a national day of service. Information about the day of service and how to participate and find projects in your area is available at www.mlkday.gov.&lt;/p&gt;\r\n&lt;p&gt;I encourage you to distribute and post these fliers in your workplace as appropriate.&lt;/p&gt;\r\n&lt;p&gt;Colleen M. Kelley&lt;/p&gt;\r\n&lt;p&gt;National President&lt;/p&gt;', 'news', 'mlkflier.pdf', 'Message from NTEU National President', '', '', '1970-01-01', '2011-02-26 01:36:00');
INSERT INTO `posts` VALUES (28, 'FEEA is there for federal employees.', 'feea-is-there-for-federal-employees', 'FEEA is there for federal employees.', '&lt;p&gt;The &lt;strong&gt;Federal Employee Education and Assistance Fund (FEEA)&lt;/strong&gt; has helped thousands of federal employees affected by natural disasters and is preparing to help any federal employee impacted by the devastating flooding in Tennessee, Mississippi and Kentucky. &lt;br /&gt; &lt;br /&gt; &lt;span style=&quot;color: #ff0000; font-size: large;&quot;&gt;But FEEA needs your help. &lt;/span&gt;&lt;br /&gt; &lt;br /&gt; It is the only organization dedicated solely to federal employees and the vast majority of its funding comes directly from other federal employees. Your immediate donation will allow federal workers impacted by the flooding to receive emergency assistance.&lt;br /&gt; &lt;br /&gt; &lt;span style=&quot;color: #ff0000; font-size: large;&quot;&gt;Any amount can help FEEA continue with its 20-year history of assisting federal employees.&lt;/span&gt;&lt;/p&gt;', 'announcements', 'FEEAFlier(Attach1).pdf', 'FEEA is there for federal employees.', '', '', '1970-01-01', '2011-02-26 01:44:00');
INSERT INTO `posts` VALUES (29, 'December 24th Half Day Closing', 'december-24th-half-day-closing', 'On December 11, 2009, the White House announced a half-day closing of Federal agencies for December 24, 2009.', '&lt;p&gt;On December 11, 2009, the White House announced a half-day closing&amp;nbsp;of Federal agencies for December 24, 2009.&amp;nbsp;&lt;/p&gt;', 'announcements', 'Dec 24 Half Day.pdf', 'December 24th Half Day Closing', '', '', '1970-01-01', '2011-02-26 01:45:00');
INSERT INTO `posts` VALUES (32, 'My Third Blog', 'my-third-blog', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 'blogs', '', 'My Third Blog', '', '', '1970-01-01', '2011-02-26 01:56:00');
INSERT INTO `posts` VALUES (33, 'Current Third Thursday Brown Bag Lunch Notice', 'current-third-thursday-brown-bag-lunch-notice', 'Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice', '&lt;p&gt;Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice Test Event Current Third Thursday Brown Bag Lunch Notice&lt;/p&gt;', 'events', '', 'Current Third Thursday Brown Bag Lunch Notice', '', '', '1969-12-31', '2011-02-26 01:57:00');
INSERT INTO `posts` VALUES (34, 'Chapter Meetings and Parties', 'chapter-meetings-and-parties', 'I just changed it .. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 'events', '', 'Chapter Meetings and Parties', '', '', '1969-12-31', '2011-02-26 01:58:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `id` int(12) NOT NULL auto_increment,
  `title` varchar(600) NOT NULL,
  `href` varchar(600) NOT NULL,
  `image` varchar(600) NOT NULL,
  `descr` text NOT NULL,
  `imageListingID` int(16) NOT NULL,
  `metaTitle` varchar(600) NOT NULL,
  `metaKeys` varchar(600) NOT NULL,
  `metaDescr` text NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` VALUES (1, 'Test', 'test', '1297464817desk1.png', '&lt;p&gt;Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1 Test data will be here1&lt;/p&gt;', 6, 'test', '2teest', '23test', '2011-02-11 16:28:00');
INSERT INTO `products` VALUES (3, 'Computer', 'computer', '1297464877desk3.png', '&lt;p&gt;Test data Test data Test data Test data Test data&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt; Test data Test data &lt;/strong&gt;&lt;strong&gt; Test data Test data &lt;/strong&gt;&lt;strong&gt; Test data Test data &lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Test data Test data Test data TTest data Test data Test data&lt;/em&gt;&lt;/p&gt;', 5, 'Test data', 'Test dataTest data', 'Test dataTest dataTest data', '2011-02-11 16:54:00');
INSERT INTO `products` VALUES (4, 'Computer 2', 'computer-2', '1297466429deskright.png', '&lt;div class=&quot;rc&quot;&gt;\r\n&lt;h2 class=&quot;why&quot;&gt;&lt;span&gt;Why do we use it?&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;It  is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using &#039;Content here, content here&#039;, making it  look like readable English. Many desktop publishing packages and web  page editors now use Lorem Ipsum as their default model text, and a  search for &#039;lorem ipsum&#039; will uncover many web sites still in their  infancy. Various versions have evolved over the years, sometimes by  accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;\r\n&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It  has roots in a piece of classical Latin literature from 45 BC, making it  over 2000 years old. Richard McClintock, a Latin professor at  Hampden-Sydney College in Virginia, looked up one of the more obscure  Latin words, consectetur, from a Lorem Ipsum passage, and going through  the cites of the word in classical literature, discovered the  undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33  of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by  Cicero, written in 45 BC. This book is a treatise on the theory of  ethics, very popular during the Renaissance. The first line of Lorem  Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section  1.10.32.&lt;/p&gt;\r\n&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It  has roots in a piece of classical Latin literature from 45 BC, making it  over 2000 years old. Richard McClintock, a Latin professor at  Hampden-Sydney College in Virginia, looked up one of the more obscure  Latin words, consectetur, from a Lorem Ipsum passage, and going through  the cites of the word in classical literature, discovered the  undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33  of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by  Cicero, written in 45 BC. This book is a treatise on the theory of  ethics, very popular during the Renaissance. The first line of Lorem  Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section  1.10.32.&lt;/p&gt;\r\n&lt;/div&gt;', 7, 'TestTest', 'Test', 'TestTestTestTest', '2011-02-11 17:20:00');
INSERT INTO `products` VALUES (5, 'Nano Processing Unit | [NPU]', 'nano-processing-unit-npu', '1297786670NPU.jpg', '&lt;div class=&quot;our_pro&quot;&gt;\r\n&lt;p&gt;Our NanoProcessing Units (NPU) are a series of fuel processors that manufacture stable emulsions of oil (diesel) and water, with the addition of our additive. This innovative alternative fuel (M-Fuel) provides diesel and heavy oil users with enhanced combustion performance, reduced fuel costs and consumption, and decreased emissions.The NPU series offer seamless integration and are adaptable to a wide range of operating conditions. The customizable design allows for scalability of output configuration in a variety of motive and stationary applications.&lt;/p&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPU.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;Nano Processing Unit &lt;strong&gt;[NPU]&lt;/strong&gt; Features&lt;/h1&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;M-Fuel requires NO modifications to existing engines or equipment.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Creates a stable alternative fuel using existing oil and water supply.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Can be utilized for all diesel &amp;amp; heavy oil applications.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Oil/Water/Additive ratios are dependent on the application for the fuel.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Reduces oil consumption up to 38%.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Dramatic reduction in fuel costs.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Significant reduction of gas emissions.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Near elimination of particulate emissions.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Reduces build up of soot in engines and increases thermal efficiency.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Internally cleaner engines, increased engine life, and reduced maintenance frequency.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Fast and customizable installation.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Requires minimal voltage power supply.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Small footprint dimensions.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Remote monitoring for easy maintenance.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Auto control system accessed via internet.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Preprogrammed and fully automated controls.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Qualifies for emulsion fuel tax credit (USA).&lt;/h3&gt;\r\n&lt;h1&gt;Nano Processing Unit &lt;strong&gt;[NPU]&lt;/strong&gt; Specifications&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPU_spec.gif&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;', 2, '', '', '', '2011-02-15 10:17:00');
INSERT INTO `products` VALUES (7, 'Oil Extraction Unit [OEU]', 'oil-extraction-unit-oeu', '1297792106OEU.gif', '&lt;div class=&quot;our_pro&quot;&gt;\r\n&lt;p&gt;Ecolocap&#039;sOil Extraction Unit (OEU) line is a series of full hot press, chemical free oil extraction processing units. Our OEU&#039;s can be applied to stand alone oil extraction operations or as the front end processor for biodiesel production facilities. Raw materials are transferred via screw transportation device to our patented heat processing system where we dry, cook, and roast the material to get it best suited for oil extraction. Heated materials are then transferred to the oil extraction units where they separate oil from oil cake. Clean oil is then transferred to degumming device to make suitable for biodiesel feedstock.&lt;br /&gt;&lt;br /&gt; Our process increases extraction ratios compared to other technologies, reduces production costs with no chemical use, and can even produce very high grade cooking oils. In addition, our all in one containerized plant design dramatically reduces capital expenses and production costs.&lt;/p&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/OEU.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;Oil Extraction Unit &lt;strong&gt;[OEU]&lt;/strong&gt; Features&lt;/h1&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Completely mechanical, chemical free, full hot press extraction processor.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Fully automated and computer controlled for increased efficiency.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Patented radiant heat processing device: raw material is dried, cooked, and roasted.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Radiant heating device increases oil yields and prepares material for mechanical press.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Ideal for all types of crops, seeds, animal fats, microalgae, and powders (unique).&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Increased oil production (min. 3%) and reduced operating costs.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Capacity/unit &amp;ndash;15MT to 50MT per day.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Minimized operation personnel.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Reduces required maintenance frequency.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Fast and easy installation.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Fast and easy installation.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Small footprint dimensions.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Auto cleaning system for ease of use.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Remote monitoring for easy maintenance.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Auto control system accessed via internet.&lt;/h3&gt;\r\n&lt;h1&gt;Oil Extraction Unit &lt;strong&gt;[OEU]&lt;/strong&gt; Models:&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/OEU_sepc.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;Oil Extraction Unit &lt;strong&gt;[OEU]&lt;/strong&gt; Diagram &amp;ndash;Front View:&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/OEU_comp1.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;Oil Extraction Unit &lt;strong&gt;[OEU]&lt;/strong&gt; Devices:&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/OEU_comp2.gif&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;', 1, '', '', '', '2011-02-15 11:48:00');
INSERT INTO `products` VALUES (6, 'Nano Processing Waste Unit [NPW]', 'nano-processing-waste-unit-npw', '1297789180NPW.jpg', '&lt;div class=&quot;our_pro&quot;&gt;\r\n&lt;p&gt;Our Nano Processing Waste units (NPW) are a series of biodiesel processors employing the most efficient technology in the industry today. Our single step process can utilize the broadest range of feedstock with no pre-processing. Our pressure and temperature controlled process along with solid bio ceramic catalyst balls, electrolysis, high frequency nano mixing, and our additive we reduce chemical consumption and production costs significantly. NPW units offer seamless integration and are adaptable to a wide range of operating conditions in both existing biodiesel facilities and turn-key startups.&lt;/p&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPW.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;Nano Processing Waste Unit &lt;strong&gt;[NPW]&lt;/strong&gt; Features&lt;/h1&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Extremely efficient and cost effective process.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Guaranteed ASTM 6751 quality biodiesel and high purity glycerin by product.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Utilize the broadest range of feedstock with no pre-processing step.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Small footprint, drastic reduction in plant size, and very low capital expenses.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Electronically controlled process for increased consistency and maximum productivity.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Hybrid batch/continuous flow system.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Scalable as an addition to existing facilities or as the primary technology for turnkey startups.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Reduced production costs per gallon.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;High production &amp;amp; conversion ratios.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Reduced chemical consumption.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Increased methanol recoveryn.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Water free and limited waste system.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Unique back end refinery system.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Can be preprogrammed &amp;amp; remotely controlled through internet for ease of use.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Annual Production/unit: 500K &amp;ndash;6 Million GPY.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Stainless steel durable design.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Warranty: 1 Yr. Parts/Labor/Service , 5 Yr. Parts.&lt;/h3&gt;\r\n&lt;img src=&quot;images/bullet.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h3&gt;Installation &amp;amp; instruction provided.&lt;/h3&gt;\r\n&lt;h1&gt;Nano Processing Waste Unit &lt;strong&gt;[NPW]&lt;/strong&gt; Specifications&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPW_spec.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;&lt;strong&gt;[NPW]&lt;/strong&gt; Production Line&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPW_PL.gif&quot; alt=&quot;&quot; /&gt;\r\n&lt;h1&gt;&lt;strong&gt;[NPW]&lt;/strong&gt; Technology Components&lt;/h1&gt;\r\n&lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPW_comp1.gif&quot; alt=&quot;&quot; /&gt; &lt;img style=&quot;padding: 0px 0px 20px;&quot; src=&quot;images/NPW_comp2.gif&quot; alt=&quot;&quot; /&gt;&lt;/div&gt;', 3, '', '', '', '2011-02-15 10:59:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `sliderImages`
-- 

CREATE TABLE `sliderImages` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  `linkImg` varchar(1000) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `sliderImages`
-- 

INSERT INTO `sliderImages` VALUES (7, '1297455377ballons.jpg', 'http://google.com', '2011-02-11');
INSERT INTO `sliderImages` VALUES (8, '1297455507badge-twitter.png', '', '2011-02-11');
INSERT INTO `sliderImages` VALUES (9, '1297455520bob_the_builder.jpg', '', '2011-02-11');
INSERT INTO `sliderImages` VALUES (4, '1297278577our_services.gif', 'http://checkpether.com/ecolocap/careers.html', '2011-02-09');
INSERT INTO `sliderImages` VALUES (5, '1297281332products.gif', 'http://checkpether.com/ecolocap/index.php', '2011-02-09');
INSERT INTO `sliderImages` VALUES (6, '1297278610company_news.gif', 'http://checkpether.com/ecolocap/contact-us.html', '2011-02-09');

-- --------------------------------------------------------

-- 
-- Table structure for table `survey`
-- 

CREATE TABLE `survey` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(256) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `status` varchar(1024) NOT NULL,
  `date` date NOT NULL,
  `shufflequestions` tinyint(1) NOT NULL default '0',
  `maxresponse` int(10) unsigned NOT NULL default '0',
  `expirydate` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `survey`
-- 

INSERT INTO `survey` VALUES (3, 'My First', 'NTEU', 'Thanks for completing this survey.', '22', '2009-12-11', 1, 5, '0000-00-00');
INSERT INTO `survey` VALUES (4, 'test', 'Test Survwy', 'Thanks for filling', '22', '2009-12-23', 0, 6, '0000-00-00');
INSERT INTO `survey` VALUES (5, 'test222', 'Test 222', 'Test 222', '22', '2010-11-03', 1, 0, '2010-11-11');
INSERT INTO `survey` VALUES (6, 'ssest222', 'ssTest 222', 'ssTest 222', '22', '2010-11-03', 1, 0, '2010-11-11');

-- --------------------------------------------------------

-- 
-- Table structure for table `surveyoptions`
-- 

CREATE TABLE `surveyoptions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `qid` int(10) unsigned NOT NULL,
  `option` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `qid` (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `surveyoptions`
-- 

INSERT INTO `surveyoptions` VALUES (20, 12, 'a');
INSERT INTO `surveyoptions` VALUES (21, 12, 'b');
INSERT INTO `surveyoptions` VALUES (23, 14, '');
INSERT INTO `surveyoptions` VALUES (24, 15, '');
INSERT INTO `surveyoptions` VALUES (25, 16, '');
INSERT INTO `surveyoptions` VALUES (26, 17, '1');
INSERT INTO `surveyoptions` VALUES (27, 17, '2');
INSERT INTO `surveyoptions` VALUES (28, 18, '');
INSERT INTO `surveyoptions` VALUES (29, 19, 'Test1 ');
INSERT INTO `surveyoptions` VALUES (30, 19, 'Test2');

-- --------------------------------------------------------

-- 
-- Table structure for table `surveyquestions`
-- 

CREATE TABLE `surveyquestions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `survey_id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `page_no` int(10) unsigned NOT NULL,
  `ques_no` int(10) unsigned NOT NULL,
  `mandatory` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `surveyquestions`
-- 

INSERT INTO `surveyquestions` VALUES (12, 3, 'This is question 1', 31, 1, 1, 1);
INSERT INTO `surveyquestions` VALUES (14, 3, 'This is question 3', 35, 1, 3, 0);
INSERT INTO `surveyquestions` VALUES (15, 3, 'This is question 3', 35, 1, 4, 0);
INSERT INTO `surveyquestions` VALUES (16, 3, 'This is question 5', 33, 2, 1, 0);
INSERT INTO `surveyquestions` VALUES (17, 3, 'This is question 9', 34, 2, 2, 0);
INSERT INTO `surveyquestions` VALUES (18, 3, 'Added', 35, 1, 5, 0);
INSERT INTO `surveyquestions` VALUES (19, 3, 'Ask a Test question', 31, 1, 6, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `surveyresult`
-- 

CREATE TABLE `surveyresult` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `taken_id` int(10) unsigned NOT NULL,
  `survey_id` int(10) unsigned NOT NULL,
  `ques_id` int(10) unsigned NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  `value` varchar(1024) default NULL,
  PRIMARY KEY  (`id`),
  KEY `survey_id` (`survey_id`),
  KEY `taken_id` (`taken_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `surveyresult`
-- 

INSERT INTO `surveyresult` VALUES (24, 5, 3, 17, 26, '26');
INSERT INTO `surveyresult` VALUES (25, 6, 3, 12, 20, '20');
INSERT INTO `surveyresult` VALUES (26, 6, 3, 14, 0, 'eeee');
INSERT INTO `surveyresult` VALUES (27, 6, 3, 15, 333, '333eee');
INSERT INTO `surveyresult` VALUES (28, 6, 3, 16, 0, 'eee');
INSERT INTO `surveyresult` VALUES (29, 6, 3, 17, 27, '27');
INSERT INTO `surveyresult` VALUES (30, 7, 3, 12, 20, '20');
INSERT INTO `surveyresult` VALUES (31, 7, 3, 14, 0, 'eeee');
INSERT INTO `surveyresult` VALUES (32, 7, 3, 15, 0, 'ddddd');
INSERT INTO `surveyresult` VALUES (33, 7, 3, 16, 0, 'eee');
INSERT INTO `surveyresult` VALUES (34, 7, 3, 17, 27, '27');
INSERT INTO `surveyresult` VALUES (35, 8, 3, 12, 20, '20');
INSERT INTO `surveyresult` VALUES (36, 8, 3, 14, 0, 'eee');
INSERT INTO `surveyresult` VALUES (37, 8, 3, 15, 0, 'eee');
INSERT INTO `surveyresult` VALUES (38, 8, 3, 16, 0, 'ee');
INSERT INTO `surveyresult` VALUES (39, 8, 3, 17, 26, '26');

-- --------------------------------------------------------

-- 
-- Table structure for table `surveytaken`
-- 

CREATE TABLE `surveytaken` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `survey_id` int(10) unsigned NOT NULL,
  `userid` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `date` date NOT NULL,
  `completed` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `surveytaken`
-- 

INSERT INTO `surveytaken` VALUES (5, 3, NULL, NULL, '2009-12-11', 1);
INSERT INTO `surveytaken` VALUES (6, 3, NULL, NULL, '2009-12-11', 1);
INSERT INTO `surveytaken` VALUES (7, 3, NULL, NULL, '2009-12-11', 1);
INSERT INTO `surveytaken` VALUES (8, 3, NULL, NULL, '2009-12-11', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `topNav`
-- 

CREATE TABLE `topNav` (
  `id` int(12) NOT NULL auto_increment,
  `navArray` text NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `topNav`
-- 

INSERT INTO `topNav` VALUES (1, 'a:7:{i:0;s:1:"5";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"7";i:4;s:1:"4";i:5;s:1:"6";i:6;s:1:"1";}', 'top');
INSERT INTO `topNav` VALUES (2, 'a:7:{i:0;s:1:"2";i:1;s:1:"5";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"7";i:5;s:1:"6";i:6;s:1:"1";}', 'bottom');

-- --------------------------------------------------------

-- 
-- Table structure for table `uploaded_files`
-- 

CREATE TABLE `uploaded_files` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filename` varchar(1024) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `uploaded_files`
-- 

INSERT INTO `uploaded_files` VALUES (1, '4b22846477bd3lawyer-letterhead.docx');
INSERT INTO `uploaded_files` VALUES (2, '4b228599197c6empty.docx');
INSERT INTO `uploaded_files` VALUES (3, '4b2285cad1007empty.docx');
INSERT INTO `uploaded_files` VALUES (4, '4b2290336f3felawyer-letterhead.docx');
INSERT INTO `uploaded_files` VALUES (5, 'lawyer-letterhead.docx');
INSERT INTO `uploaded_files` VALUES (6, 'empty.docx');
INSERT INTO `uploaded_files` VALUES (7, 'empty.docx');
INSERT INTO `uploaded_files` VALUES (8, 'empty.docx');
INSERT INTO `uploaded_files` VALUES (9, 'FY_2010_Dues_Charts.xlsx');
INSERT INTO `uploaded_files` VALUES (10, 'FY_2010_Dues_Charts.xlsx');
INSERT INTO `uploaded_files` VALUES (11, 'WASOEmployeesList.xlsx');
INSERT INTO `uploaded_files` VALUES (12, 'FY2010DuesCharts.xls');
INSERT INTO `uploaded_files` VALUES (13, 'WASOEmployeesList.xls');
INSERT INTO `uploaded_files` VALUES (14, 'mortgage_fraud.JPG');
INSERT INTO `uploaded_files` VALUES (15, '2011_Dues_Charts.xlsx');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `surveyoptions`
-- 
ALTER TABLE `surveyoptions`
  ADD CONSTRAINT `surveyoptions_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `surveyquestions` (`id`) ON DELETE CASCADE;

-- 
-- Constraints for table `surveyquestions`
-- 
ALTER TABLE `surveyquestions`
  ADD CONSTRAINT `surveyquestions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE;

-- 
-- Constraints for table `surveyresult`
-- 
ALTER TABLE `surveyresult`
  ADD CONSTRAINT `surveyresult_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `surveyresult_ibfk_2` FOREIGN KEY (`taken_id`) REFERENCES `surveytaken` (`id`) ON DELETE CASCADE;

-- 
-- Constraints for table `surveytaken`
-- 
ALTER TABLE `surveytaken`
  ADD CONSTRAINT `surveytaken_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE;
