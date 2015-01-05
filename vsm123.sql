-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 22, 2010 at 06:53 PM
-- Server version: 5.0.18
-- PHP Version: 5.1.1
-- 
-- Database: `vsm123`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `administrator`
-- 

CREATE TABLE `administrator` (
  `username` varchar(20) collate latin1_general_ci NOT NULL default 'admin',
  `password` varchar(20) collate latin1_general_ci NOT NULL default 'admin'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `administrator`
-- 

INSERT INTO `administrator` VALUES ('admin', 'underdog');

-- --------------------------------------------------------

-- 
-- Table structure for table `company_shareprice`
-- 

CREATE TABLE `company_shareprice` (
  `company_id` int(10) NOT NULL auto_increment,
  `company_name` varchar(255) collate latin1_general_ci NOT NULL,
  `share_price` int(10) unsigned default NULL,
  `inPrice` int(11) default '0',
  PRIMARY KEY  (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `company_shareprice`
-- 

INSERT INTO `company_shareprice` VALUES (1, 'TTL', 400, 300);
INSERT INTO `company_shareprice` VALUES (2, 'Tata', 250, 200);
INSERT INTO `company_shareprice` VALUES (3, 'IDBI', 375, 200);
INSERT INTO `company_shareprice` VALUES (4, 'Star', 250, 250);

-- --------------------------------------------------------

-- 
-- Table structure for table `customer`
-- 

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `password` varchar(20) collate latin1_general_ci default '',
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `customer`
-- 

INSERT INTO `customer` VALUES (1, '');
INSERT INTO `customer` VALUES (2, '');
INSERT INTO `customer` VALUES (3, '');
INSERT INTO `customer` VALUES (4, '');
INSERT INTO `customer` VALUES (5, '');
INSERT INTO `customer` VALUES (6, '');
INSERT INTO `customer` VALUES (7, '');
INSERT INTO `customer` VALUES (8, '');
INSERT INTO `customer` VALUES (9, '');
INSERT INTO `customer` VALUES (10, '');
INSERT INTO `customer` VALUES (11, '');
INSERT INTO `customer` VALUES (12, '');
INSERT INTO `customer` VALUES (13, '');
INSERT INTO `customer` VALUES (14, '');
INSERT INTO `customer` VALUES (15, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_balance`
-- 

CREATE TABLE `customer_balance` (
  `customer_id` int(10) unsigned NOT NULL,
  `current_balance` int(11) default NULL,
  `net_money` int(11) default '0',
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `customer_balance`
-- 

INSERT INTO `customer_balance` VALUES (1, 15321830, 15329830);
INSERT INTO `customer_balance` VALUES (2, 10000, 38750);
INSERT INTO `customer_balance` VALUES (3, 10000, 38750);
INSERT INTO `customer_balance` VALUES (4, 10000, 38750);
INSERT INTO `customer_balance` VALUES (5, 10000, 38750);
INSERT INTO `customer_balance` VALUES (6, 10000, 38750);
INSERT INTO `customer_balance` VALUES (7, 10000, 38750);
INSERT INTO `customer_balance` VALUES (8, 10000, 38750);
INSERT INTO `customer_balance` VALUES (9, 10000, 38750);
INSERT INTO `customer_balance` VALUES (10, 10000, 38750);
INSERT INTO `customer_balance` VALUES (11, 10000, 38750);
INSERT INTO `customer_balance` VALUES (12, 10000, 38750);
INSERT INTO `customer_balance` VALUES (13, 10000, 38750);
INSERT INTO `customer_balance` VALUES (14, 10000, 38750);
INSERT INTO `customer_balance` VALUES (15, 10000, 38750);

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_bank_loan`
-- 

CREATE TABLE `customer_bank_loan` (
  `loan_id` int(10) unsigned NOT NULL auto_increment,
  `customer_id` int(10) unsigned NOT NULL,
  `loan_amount` int(10) unsigned default NULL,
  `start_time` timestamp NULL default CURRENT_TIMESTAMP,
  `loan_period` int(10) unsigned default NULL,
  PRIMARY KEY  (`loan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `customer_bank_loan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `customer_bet`
-- 

CREATE TABLE `customer_bet` (
  `customer_id` int(4) NOT NULL,
  `company_id` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='for betting';

-- 
-- Dumping data for table `customer_bet`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `customer_mutual_fund`
-- 

CREATE TABLE `customer_mutual_fund` (
  `customer_id` int(10) unsigned NOT NULL,
  `mutual_fund_balance` double unsigned default NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `customer_mutual_fund`
-- 

INSERT INTO `customer_mutual_fund` VALUES (1, 0);
INSERT INTO `customer_mutual_fund` VALUES (2, 0);
INSERT INTO `customer_mutual_fund` VALUES (3, 0);
INSERT INTO `customer_mutual_fund` VALUES (4, 0);
INSERT INTO `customer_mutual_fund` VALUES (5, 0);
INSERT INTO `customer_mutual_fund` VALUES (6, 0);
INSERT INTO `customer_mutual_fund` VALUES (7, 0);
INSERT INTO `customer_mutual_fund` VALUES (8, 0);
INSERT INTO `customer_mutual_fund` VALUES (9, 0);
INSERT INTO `customer_mutual_fund` VALUES (10, 0);
INSERT INTO `customer_mutual_fund` VALUES (11, 0);
INSERT INTO `customer_mutual_fund` VALUES (12, 0);
INSERT INTO `customer_mutual_fund` VALUES (13, 0);
INSERT INTO `customer_mutual_fund` VALUES (14, 0);
INSERT INTO `customer_mutual_fund` VALUES (15, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_shares_normal`
-- 

CREATE TABLE `customer_shares_normal` (
  `customer_id` int(10) unsigned NOT NULL,
  `company_id` int(10) NOT NULL,
  `no_of_shares` int(10) unsigned default '0',
  PRIMARY KEY  (`customer_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `customer_shares_normal`
-- 

INSERT INTO `customer_shares_normal` VALUES (1, 1, 20);
INSERT INTO `customer_shares_normal` VALUES (1, 2, 0);
INSERT INTO `customer_shares_normal` VALUES (1, 3, 0);
INSERT INTO `customer_shares_normal` VALUES (1, 4, 0);
INSERT INTO `customer_shares_normal` VALUES (2, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (2, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (2, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (2, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (3, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (3, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (3, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (3, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (4, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (4, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (4, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (4, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (5, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (5, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (5, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (5, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (6, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (6, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (6, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (6, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (7, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (7, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (7, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (7, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (8, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (8, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (8, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (8, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (9, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (9, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (9, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (9, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (10, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (10, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (10, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (10, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (11, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (11, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (11, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (11, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (12, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (12, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (12, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (12, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (13, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (13, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (13, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (13, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (14, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (14, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (14, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (14, 4, 10);
INSERT INTO `customer_shares_normal` VALUES (15, 1, 50);
INSERT INTO `customer_shares_normal` VALUES (15, 2, 10);
INSERT INTO `customer_shares_normal` VALUES (15, 3, 10);
INSERT INTO `customer_shares_normal` VALUES (15, 4, 10);

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_shares_shortselling`
-- 

CREATE TABLE `customer_shares_shortselling` (
  `customer_id` int(10) unsigned NOT NULL,
  `company_id` int(10) NOT NULL,
  `no_of_shares` int(11) default '0',
  PRIMARY KEY  (`customer_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `customer_shares_shortselling`
-- 

INSERT INTO `customer_shares_shortselling` VALUES (1, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (1, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (1, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (1, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (2, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (2, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (2, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (2, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (3, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (3, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (3, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (3, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (4, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (4, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (4, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (4, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (5, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (5, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (5, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (5, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (6, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (6, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (6, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (6, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (7, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (7, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (7, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (7, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (8, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (8, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (8, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (8, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (9, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (9, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (9, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (9, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (10, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (10, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (10, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (10, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (11, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (11, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (11, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (11, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (12, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (12, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (12, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (12, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (13, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (13, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (13, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (13, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (14, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (14, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (14, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (14, 4, 0);
INSERT INTO `customer_shares_shortselling` VALUES (15, 1, 0);
INSERT INTO `customer_shares_shortselling` VALUES (15, 2, 0);
INSERT INTO `customer_shares_shortselling` VALUES (15, 3, 0);
INSERT INTO `customer_shares_shortselling` VALUES (15, 4, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `headlines`
-- 

CREATE TABLE `headlines` (
  `id` int(3) NOT NULL auto_increment,
  `headline` text NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `headlines`
-- 

INSERT INTO `headlines` VALUES (1, '??	Star plus new K.B.C. increases its TRP ratings.', '2007-02-22 07:13:49', 1);
INSERT INTO `headlines` VALUES (2, '??	Sameer Jain  and Peter Mukherjee stated to leave star.', '2007-02-22 07:14:19', 1);
INSERT INTO `headlines` VALUES (3, '??	High growth in fee,other income probes icici', '2007-02-22 07:15:07', 0);
INSERT INTO `headlines` VALUES (4, '??	High growth in fee,other income probes icici.', '2007-02-22 07:15:52', 0);
INSERT INTO `headlines` VALUES (5, 'Excel soft launches a new product ?saraf? anticipated by everyone.', '2007-02-22 07:20:27', 0);
INSERT INTO `headlines` VALUES (6, 'Shakti to setup a new polyester plant in Gujrat.', '2007-02-22 07:20:56', 1);
INSERT INTO `headlines` VALUES (7, 'Excel soft predicted as next big company in software.', '2007-02-22 07:23:21', 0);
INSERT INTO `headlines` VALUES (8, 'Satyam bags contract from apple to inmprove Mac-os.', '2007-02-22 07:23:42', 0);
INSERT INTO `headlines` VALUES (9, 'SRK''S K.B.C. increases STAR''S TRP ratings.', '2007-02-22 07:25:36', 0);
INSERT INTO `headlines` VALUES (10, 'HMSI ( Honda motor cycles and scooters INDIA ) plans 2 enter the high volume segment now dominated by Hero Honda?s Splender and Passion models.', '2007-02-22 07:26:09', 1);
INSERT INTO `headlines` VALUES (11, 'ICICI Bank signs MoU with Sangli officers? union', '2007-02-22 07:27:15', 0);
INSERT INTO `headlines` VALUES (12, 'Banking sector facing rising problems from politicians', '2007-02-22 08:05:22', 1);
INSERT INTO `headlines` VALUES (13, ' Star news exposes the scandal of Shakti exporting empty boxes to bag new contract- C.B.I. investigating.', '2007-02-22 08:13:03', 1);
INSERT INTO `headlines` VALUES (14, 'Bombay Dyeing textile mills in Silvassa on fire.Cotton worth Rs. 25 lakhs damaged.', '2007-02-22 08:23:56', 1);
INSERT INTO `headlines` VALUES (15, 'Sameer Jain and Peter Mukherjee stated to leave star.', '2007-02-22 08:28:40', 1);
INSERT INTO `headlines` VALUES (16, 'shakti is giving 50% dividend', '2007-02-22 08:30:25', 1);
INSERT INTO `headlines` VALUES (17, 'TCS plans 500 seat strong new delivery center in Mexico.', '2007-02-22 08:36:49', 1);
INSERT INTO `headlines` VALUES (18, 'Hyundai shuts down the production of its new vehicle due to less demand', '2007-02-22 08:46:45', 1);
INSERT INTO `headlines` VALUES (19, 'Govt. bans AXN for showing adult content on TV ', '2007-02-22 08:50:39', 1);
INSERT INTO `headlines` VALUES (20, 'honda calls back vehicles sold in the last one year.Rumour says that there is a defective motor component.', '2007-02-22 08:54:42', 0);
INSERT INTO `headlines` VALUES (21, 'Honda calls back vehicles sold in the last one year.Rumour says that there is a defective motor component.', '2007-02-22 08:55:02', 1);
INSERT INTO `headlines` VALUES (22, 'Rumour says that there is a defective motor component ', '2007-02-22 08:56:21', 1);
INSERT INTO `headlines` VALUES (23, 'Excelsoft sponsors Indian Cricket team to the world cup', '2007-02-22 09:05:21', 1);
INSERT INTO `headlines` VALUES (24, 'Bombay Dying opens a new manufacturing unit worth rs 5000 crore in jaipur', '2007-02-22 09:07:51', 1);
INSERT INTO `headlines` VALUES (25, 'Mr Ramadorai announces  a takeover of 4 new companies', '2007-02-22 09:10:38', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `log_mutual_fund`
-- 

CREATE TABLE `log_mutual_fund` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `customer_id` int(10) unsigned default NULL,
  `invest_withdraw` varchar(10) collate latin1_general_ci default NULL,
  `transaction_amount` int(10) unsigned default NULL,
  `log_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `log_mutual_fund`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `log_total_shares`
-- 

CREATE TABLE `log_total_shares` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `company_id` int(10) NOT NULL,
  `share_price` int(10) unsigned default NULL,
  `total_shares` int(10) unsigned default NULL,
  `log_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `log_total_shares`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `log_transaction`
-- 

CREATE TABLE `log_transaction` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `customer_id` int(10) unsigned default NULL,
  `company_id` int(10) NOT NULL,
  `share_price` int(10) default NULL,
  `no_of_shares` int(10) unsigned default NULL,
  `buy_sell` varchar(10) collate latin1_general_ci default NULL,
  `normal_short` varchar(20) collate latin1_general_ci default NULL,
  `log_timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `log_transaction`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `rate_of_interest`
-- 

CREATE TABLE `rate_of_interest` (
  `time_period` int(10) unsigned NOT NULL auto_increment,
  `rate_of_interest` float NOT NULL,
  PRIMARY KEY  (`time_period`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=46 ;

-- 
-- Dumping data for table `rate_of_interest`
-- 

INSERT INTO `rate_of_interest` VALUES (10, 5);
INSERT INTO `rate_of_interest` VALUES (15, 7);
INSERT INTO `rate_of_interest` VALUES (20, 10);
INSERT INTO `rate_of_interest` VALUES (30, 14);

-- --------------------------------------------------------

-- 
-- Table structure for table `sector_companies`
-- 

CREATE TABLE `sector_companies` (
  `sector_id` int(4) NOT NULL,
  `company_id` int(4) NOT NULL,
  PRIMARY KEY  (`sector_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `sector_companies`
-- 

INSERT INTO `sector_companies` VALUES (1, 4);
INSERT INTO `sector_companies` VALUES (2, 2);
INSERT INTO `sector_companies` VALUES (3, 1);
INSERT INTO `sector_companies` VALUES (5, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `sector_index`
-- 

CREATE TABLE `sector_index` (
  `sector_id` int(2) NOT NULL auto_increment,
  `sector_name` varchar(20) NOT NULL,
  `sector_index` int(4) default NULL,
  PRIMARY KEY  (`sector_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `sector_index`
-- 

INSERT INTO `sector_index` VALUES (1, 'Entertainment', 250);
INSERT INTO `sector_index` VALUES (2, 'Motor', 250);
INSERT INTO `sector_index` VALUES (3, 'software', 400);
INSERT INTO `sector_index` VALUES (4, 'Textile', 0);
INSERT INTO `sector_index` VALUES (5, 'Bank', 375);

-- --------------------------------------------------------

-- 
-- Table structure for table `shortselling_flag`
-- 

CREATE TABLE `shortselling_flag` (
  `flag` int(10) unsigned NOT NULL auto_increment,
  `no_of_customers` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`flag`,`no_of_customers`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `shortselling_flag`
-- 

INSERT INTO `shortselling_flag` VALUES (1, 15);
