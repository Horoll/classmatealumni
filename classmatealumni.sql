/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.14 : Database - classmatealumni
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`classmatealumni` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `classmatealumni`;

/*Table structure for table `addresslist` */

DROP TABLE IF EXISTS `addresslist`;

CREATE TABLE `addresslist` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `studentname` varchar(20) NOT NULL COMMENT '学生姓名',
  `qq` varchar(10) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `addresslist` */

insert  into `addresslist`(`id`,`studentname`,`qq`,`tel`) values (19,'艾德·史塔克','123456789','12345678912'),(11,'提利昂·兰尼斯特','123456789','12345678912'),(21,'伊蒙·塔格利安','123456789','12345678912'),(25,'琼恩·雪诺','123456789','12345678912'),(26,'拉姆斯·波顿','123456789','12345678912');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` bigint(8) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `fromuser` varchar(20) NOT NULL COMMENT '谁写的留言',
  `touser` varchar(20) NOT NULL COMMENT '写给谁的留言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `message` */

insert  into `message`(`id`,`message`,`fromuser`,`touser`) values (3,'C# 是微软推出的一种基于.NET框架的、面向对象的高级编程语言。C# 由 C 语言和 C++ 派生而来，继承了其强大的性能，同时又以 .NET 框架类库作为基础，拥有类似 Visual Basic 的快速开发能力','user9','user1'),(4,'Python 是一种面向对象的解释型计算机程序设计语言，在设计中注重代码的可读性，同时也是一种功能强大的通用型语言。','user1','user1'),(5,'C++是一种使用非常广泛的计算机程序设计语言。它是一种静态数据类型（static data type）检查的，支持多范式（multi-paradigm）的通用程序设计语言。C++支持面向过程编程（Procedures Programming）、数据抽象化（Data Abstraction）、面向对象程序设计（Object-Oriented Programming）、泛型程序设计（Generic-Type Programming）、基于原则设计（Policy-Based Class Design）等多种程序设计风格。 (from Wikipedia)','user1','user1'),(6,'PHP 是英文超级文本预处理语言（PHP：Hypertext Preprocessor）的缩写。PHP 是一种 HTML 内嵌式的语言，是一种在服务器端执行的嵌入 HTML 文档的脚本语言，语言的风格有类似于 C 语言，被广泛的运用。PHP 具有非常强大的功能，所有的 CGI 的功能 PHP 都能实现，而且支持几乎所有流行的数据库以及操作系统','user1','user1');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `classname` varchar(20) DEFAULT NULL COMMENT '班级',
  `hobby` varchar(20) DEFAULT NULL COMMENT '爱好',
  `sign` varchar(50) DEFAULT NULL COMMENT '个性签名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`name`,`classname`,`hobby`,`sign`) values (1,'user1','e10adc3949ba59abbe56e057f20f883e','Lannister','计科三班','','Hear Me Roar!'),(3,'user2','e10adc3949ba59abbe56e057f20f883e','Stark','计科1班','','Winter Is Coming'),(4,'user3','e10adc3949ba59abbe56e057f20f883e','Targaryen','计科2班','','Fire and Blood'),(5,'user4','e10adc3949ba59abbe56e057f20f883e','Baratheon','计科3班','','Ours Is the Fury'),(6,'user5','e10adc3949ba59abbe56e057f20f883e','Greyjoy','计科4班','','We Do Not Sow'),(7,'user6','e10adc3949ba59abbe56e057f20f883e','Tully','计科2班','','Family, Duty, Honor'),(8,'user7','e10adc3949ba59abbe56e057f20f883e','Tyrell','计科3班','','Growing Strong'),(9,'user8','e10adc3949ba59abbe56e057f20f883e','Ayrrn','计科1班','',' As High as Honor'),(10,'user9','e10adc3949ba59abbe56e057f20f883e','Martell','计科4班','',' Unbowed, Unbent, Unbroken'),(12,'test','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
