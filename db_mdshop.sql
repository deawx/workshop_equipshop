-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2018 at 06:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mdshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(6) NOT NULL COMMENT 'รหัสแอดมิน',
  `firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `username` varchar(30) NOT NULL COMMENT 'ยุสเซอร์เนม',
  `password` varchar(8) NOT NULL COMMENT 'พาสเวิร์ด',
  `created` datetime NOT NULL COMMENT 'วันที่สมัคร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `firstname`, `lastname`, `username`, `password`, `created`) VALUES
(1, 'admin', 'istrator', 'admin', 'password', '2018-09-26 15:14:15'),
(2, 'admin2', 'istrator', 'admin2', 'password', '2018-09-26 16:54:20'),
(3, 'test', 'test', 'test', 'password', '2018-10-10 18:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(6) NOT NULL COMMENT 'รหัสธนาคาร',
  `picture` text NOT NULL COMMENT 'โลโก้ธนาคาร',
  `bank` varchar(150) NOT NULL COMMENT 'ชื่อธนาคาร',
  `name` varchar(150) NOT NULL COMMENT 'ชื่อบัญชีธนาคาร',
  `account` varchar(15) NOT NULL COMMENT 'หมายเลขบัญชีธนาคาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `picture`, `bank`, `name`, `account`) VALUES
(1, '078d6b8c31dd7a3e76af79dfed5351c2.jpg', 'ธนาคารไทยพาณิชย์', 'ชื่อบัญชีธนาคารของฉัน', '123456789123456');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(6) NOT NULL COMMENT 'รหัสที่อยู่',
  `address` text NOT NULL COMMENT 'รายละเอียด',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `line` varchar(100) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL COMMENT 'ละติจุด',
  `longtitude` varchar(20) NOT NULL COMMENT 'ลองติจุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `address`, `email`, `phone`, `facebook`, `line`, `latitude`, `longtitude`) VALUES
(1, 'บ้านเอื้ออาทรโครงการ 3 <br>\r\nตำบลหนองแก อำเภอหัวหิน <br>\r\nจังหวัดประจวบคีรีขันธ์ 77110 <br>', 'wannaporn@gmail.com', '0972476698', 'facebook.com/100002569531078', 'kumningka.', '12.474569', '99.970691');

-- --------------------------------------------------------

--
-- Table structure for table `tb_howto`
--

CREATE TABLE `tb_howto` (
  `id` int(6) NOT NULL COMMENT 'รหัสขั้นตอนการสั่งซื้อ',
  `title` varchar(250) NOT NULL COMMENT 'หัวข้อขั้นตอนการสั่งซื้อ',
  `description` text COMMENT 'เนื้อหาขั้นตอนการสั่งซื้อ',
  `picture` text COMMENT 'รูปภาพขั้นตอนการสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_howto`
--

INSERT INTO `tb_howto` (`id`, `title`, `description`, `picture`) VALUES
(2, 'ขั้นตอนที่หนึ่ง', 'ทุกครั้งที่ทำงานสั่งซื้อต้องทำการ ลงทะเบียน เพื่อสมัครเป็นสมาชิกก่อนจึงจะสามารถทำการสั่งซื้อสินค้าได้', 'a4d1412453d0546bac08fa76d6d8ca73.jpg'),
(3, 'ขั้นตอนที่สอง', 'ทำการลงทะเบียน ต้องกรอกข้อมูลให้ครบทุกช่องที่กำหนดไว้ แล้วทำการกดยืนยันการสมัคร', '5c052d54a281f33b4f09edf8f4c58db0.jpg'),
(4, 'ขั้นตอนที่สาม', 'เมื่อกรอกข้อมูลสมัครสมาชิกเรียนร้อยแล้ว ระบบจะให้กำหนด ชื่อ ผู้ใช้กับรหัสผ่านเพื่อนำไปใช้ในการเข้าสู่ระบบทุกครั้ง', '3bd248fdfc693bc25fdef70cb1e7cdf4.jpg'),
(5, 'ขั้นตอนที่สี่', 'เมื่อเข้าสู่ระบบแล้ว ให้ตรวจสอบชื่อผู้ใช้ว่าถูกต้องหรือไม่ เมื่อถูกต้อง สามารถกดเข้าไปเลือกสินค้าเพื่อสั่งซื้อได้เลยโดยการกดเข้าไปที่เมนู สินค้า', 'b7090d294de90162018a4ecb33b4f560.jpg'),
(6, 'ขั้นตอนที่ห้า', 'ก็จะพบสินค้า ให้เลือก ลูกค้าสามารถเลือกดูสินค้าดูข้อมูลได้ตามใจชอบ โดยการกดปุ่มตรงคำว่า ดูข้อมูล', '9b2f920d3f72c904abc7ddb289d63044.jpg'),
(7, 'ขั้นตอนที่หก', 'เมื่อพอใจที่จะสั่งซื้อสินค้าชิ้นนั้นแล้วให้ลูกค้าทำการกดใส่ตระกร้า\r\n\r\n', '79bf51f77936af557101d066fb6a5c1c.jpg'),
(8, 'ขั้นตอนที่เจ็ด', 'เมื่อลูกค้าพอใจในสินค้าแล้วหยิบใส่ตระกร้าเรียบร้อยแล้ว ก็จะพบราคาที่ต้องชำระเงิน ให้ตรวจสอบการซื้อสินค้าอีกครั้งหากลูกค้าต้องการเพิ่มจำนวนสินค้า ก็สามารถกรอกจำนวนได้เลยหรือจะสั่งซื้ออีกรูปแบบนึงก็ทำได้ โดยการคลิกที่ปุ่มเลือกสินค้าต่อ หากต้องการลบหรือเพิ่มสินค้าชิ้นอื่นๆก็สามาทำได้ แต่ลูกค้าต้องคลิกที่ปุ่มอัพเดพด้วยทุกครั้งหลังเปลี่ยนแปลงข้อมูลเพื่อที่ระบบได้รวมยอดการชำระเงินและการสั่งซื้อสินค้าได้ถุกต้อง เมื่อตรวจสอบทุกอย่างแล้วถูกตามใจลูกแล้วให้กดที่ปุ่ม ขั้นตอนต่อไป\r\n\r\n', 'ebf5f911b06c222b8903451b325524cc.jpg'),
(9, 'ขั้นตอนที่แปด', 'ให้ลูกค้ากรอกข้อมูลให้ครบตามที่กำหนดไว้ อัพโหลดรูปภาพให้เรียนร้อยตามที่กำหนด แล้วกดปุ่มขั้นตอนต่อไป\r\n\r\n', '707d417557aabdd9de13ad0b8633b580.jpg'),
(10, 'ขั้นตอนที่เก้า', 'เมื่อกดยืนยันการสั่งซื่อเรียบร้อยแล้ว ให้ลูกกรอกสถานที่จัดส่งแล้วกด ปุ่มการบันทึกยืนยืนการสั่งซื้อ แล้วจะพบหน้า ประวัติการสั่งซื่อ ราคา สถนะการสั่งซื้อ เพื่อที่จะรอ ลูกค้ารอการชำระเงินพร้อมหลักฐาน หากลูกค้าชำระเงินแล้วให้คลิกที่ปุ่ม ยืนยันการโอนเงิน\r\n\r\n', 'de5641ed209f51f63728b2d7146f1be8.jpg'),
(11, 'ขั้นตอนที่สิบ', 'ให้ลูกค้ายืนยันการโอนเงินโดยการอัพโหลดรูปภาพสลิปเงินที่โอน และข้อมูลให้เรียบร้อย แล้วกดปุ่มบันทึกข้อมูล\r\n\r\n', 'f4a5360f208fd8a39435b186a194f2f8.jpg'),
(12, 'ขั้นตอนที่สิบเอ็ด', 'ให้ลูกค้ากดยืนยันบันทึกข้อมูลและตรวจสอบสถานะ การชำระเงิน\r\n\r\n', '9126828157d6362f93b09a9b0718814a.jpg'),
(13, 'ขั้นตอนที่สิบสอง', 'ให้ลูกค้าตรวจสอบข้อมูลการจัดส่ง ให้เรียบร้อยแล้วรอการแจ้งเลขแทรคนำเบอร์ของพัสดุได้ที่หน้าเว็บ\r\n\r\n', '0f8b7f75cb8d96e1efd38b2b02b8616e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(6) NOT NULL COMMENT 'รหัสออเดอร์',
  `user_id` int(6) NOT NULL COMMENT 'รหัสยุสเซอร์',
  `fullname` varchar(150) NOT NULL COMMENT 'ชื่อผู้รับ',
  `phone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `total_quantity` int(3) NOT NULL COMMENT 'จำนวนสินค้า(ชิ้น)',
  `total_price` int(5) NOT NULL COMMENT 'ราคารวม',
  `tracking_number` varchar(20) DEFAULT NULL COMMENT 'หมายเลขการจัดส่ง',
  `transfer_slip` varchar(150) DEFAULT NULL COMMENT 'ชื่อรูปภาพสลิปโอนเงิน',
  `created` datetime NOT NULL COMMENT 'วันที่ออเดอร์',
  `status` varchar(250) NOT NULL COMMENT 'สถานะออเดอร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `user_id`, `fullname`, `phone`, `address`, `total_quantity`, `total_price`, `tracking_number`, `transfer_slip`, `created`, `status`) VALUES
(1, 9, 'testfullname', '4970140568', '6th Floor HarinThorn Bldg., 54 North Sathorn Rd 2 10500', 2, 500, '1234567890', 'cb9083bc9c55985fb966e0953867438d.png', '2018-10-05 04:45:44', 'สำเร็จ'),
(2, 9, 'testfullname', '1711280252', '4/F, Panunee Building 518/3 Ploenchit Road 2 10330', 3, 700, '', NULL, '2018-10-05 08:39:58', 'การชำระเงินไม่ถูกต้อง'),
(3, 8, 'testfullname', '8426955503', '19/138 Sukhumvit SuitesSoi-13, 14th FloorNua Wattana 10110', 3, 650, '', NULL, '2018-10-06 07:10:32', 'ตรวจสอบการชำระเงิน'),
(4, 8, 'testfullname', '8426955503', '19/138 Sukhumvit SuitesSoi-13, 14th FloorNua Wattana 10110', 3, 650, '', NULL, '2018-10-06 07:10:48', 'ตรวจสอบการชำระเงิน'),
(5, 8, 'testfullname', '2105062373', '6th Floor HarinThorn Bldg., 54 North Sathorn Rd 2 10500', 2, 450, '', NULL, '2018-10-06 07:26:23', 'ตรวจสอบการชำระเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id` int(6) NOT NULL COMMENT 'รหัสรายการออเดอร์',
  `order_id` int(6) NOT NULL COMMENT 'รหัสออเดอร์',
  `product_id` int(6) NOT NULL COMMENT 'รหัสสินค้า',
  `quantity` int(2) NOT NULL COMMENT 'จำนวนสั่งซื้อ',
  `total_price` varchar(10) NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id`, `order_id`, `product_id`, `quantity`, `total_price`) VALUES
(1, 1, 3, 2, '500'),
(2, 2, 3, 2, '500'),
(3, 2, 4, 1, '200'),
(4, 3, 3, 1, '250'),
(5, 4, 3, 1, '250'),
(6, 4, 4, 2, '400'),
(7, 5, 3, 1, '250'),
(8, 5, 4, 1, '200');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail_data`
--

CREATE TABLE `tb_order_detail_data` (
  `id` int(6) NOT NULL COMMENT 'รหัสข้อมูลประกอบสินค้า',
  `order_detail_id` int(6) NOT NULL COMMENT 'รหัสข้อมูลการสั่งซื้อสินค้า',
  `qr_code` text NOT NULL COMMENT 'ข้อมูลรหัสคิวอาร์โค้ด',
  `picture` text NOT NULL COMMENT 'ข้อมูลรูปภาพ',
  `firstname` varchar(100) NOT NULL COMMENT 'ข้อมูลชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'ข้อมูลนามสกุล',
  `id_card` varchar(13) NOT NULL COMMENT 'ข้อมูลบัตรประชาชน',
  `phone` varchar(10) NOT NULL COMMENT 'ข้อมูลเบอร์โทรศัพท์',
  `gender` varchar(5) NOT NULL COMMENT 'ข้อมูลเพศ',
  `birthdate` varchar(10) NOT NULL COMMENT 'ข้อมูลวันเกิด',
  `blood` varchar(5) NOT NULL COMMENT 'ข้อมูลกรุ๊ปเลือด',
  `weight` int(3) NOT NULL COMMENT 'ข้อมูลน้ำหนัก',
  `height` int(3) NOT NULL COMMENT 'ข้อมูลส่วนสูง',
  `nationality` varchar(100) NOT NULL COMMENT 'ข้อมูลสัญชาติ',
  `religion` varchar(100) NOT NULL COMMENT 'ข้อมูลศาสนา',
  `latitude` varchar(25) NOT NULL COMMENT 'ข้อมูลแผนที่',
  `longtitude` varchar(25) NOT NULL COMMENT 'ข้อมูลแผนที่',
  `hospital` text NOT NULL COMMENT 'ข้อมูลการรักษาพยาบาล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order_detail_data`
--

INSERT INTO `tb_order_detail_data` (`id`, `order_detail_id`, `qr_code`, `picture`, `firstname`, `lastname`, `id_card`, `phone`, `gender`, `birthdate`, `blood`, `weight`, `height`, `nationality`, `religion`, `latitude`, `longtitude`, `hospital`) VALUES
(1, 1, '1-1234567890123', '', 'testname', 'testname', '1234567890123', '1234567890', '', '2518-11-28', '', 75, 155, 'testvalue', 'testvalue', '657', '689', 'testdata'),
(2, 1, '2-1234567890123', '', 'testname', 'testname', '1234567890123', '1234567890', '', '2501-3-26', '', 64, 195, 'testvalue', 'testvalue', '914', '557', 'testdata'),
(3, 2, '3-1234567890123', 'a69c2bc56a1f9f0f5220115eb98e5ee2.png', 'testname', 'testname', '1234567890123', '1234567890', 'ชาย', '2541-7-11', 'A', 65, 194, 'testvalue', 'testvalue', '160', '456', 'testdata'),
(4, 2, '4-1234567890123', '88f569fd2eb28053723d005a19ebc369.jpg', 'testname', 'testname', '1234567890123', '1234567890', 'หญิง', '2509-1-3', 'B', 86, 165, 'testvalue', 'testvalue', '449', '962', 'testdata'),
(5, 3, '5-1234567890123', '45536f9b157a271e9c85f9dc825ca874.png', 'testname', 'testname', '1234567890123', '1234567890', 'หญิง', '2535-7-8', 'AB', 88, 158, 'testvalue', 'testvalue', '372', '549', 'testdata'),
(6, 4, '6-1234567890123', 'bdd181cf911bbf3926a625570741592e.png', 'testname', 'testname', '1234567890123', '1234567890', 'ชาย', '2508-10-8', 'AB', 92, 169, 'testvalue', 'testvalue', '347', '625', 'testdata'),
(7, 5, '7-1234567890123', 'bdd181cf911bbf3926a625570741592e.png', 'testname', 'testname', '1234567890123', '1234567890', 'ชาย', '2508-10-8', 'AB', 92, 169, 'testvalue', 'testvalue', '347', '625', 'testdata'),
(9, 6, '9-1234567890123', 'd1e0c7b7cee1c115aaa36dd7595b45c0.png', 'testname', 'testname', '1234567890123', '1234567890', 'ชาย', '2517-9-26', 'A', 94, 175, 'testvalue', 'testvalue', '504', '519', 'testdata'),
(11, 6, '11-1234567890123', '792a5406c2502456ea1d02ab0341bf70.png', 'testname', 'testname', '1234567890123', '1234567890', 'หญิง', '2540-10-24', 'O', 55, 158, 'testvalue', 'testvalue', '303', '979', 'testdata'),
(13, 7, '13-1234567890123', '32de3bc67c7e1b816cd6fdfdec228935.png', 'testname', 'testname', '1234567890123', '1234567890', 'หญิง', '2543-8-12', 'AB', 97, 194, 'testvalue', 'testvalue', '714', '237', 'testdata'),
(15, 8, '15-1234567890123', 'bb4c12281b9e7cfcd306acaedd3c44dc.png', 'testname', 'testname', '1234567890123', '1234567890', 'หญิง', '2545-7-25', 'AB', 80, 178, 'testvalue', 'testvalue', '877', '523', 'testdata');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(6) NOT NULL COMMENT 'รหัสสินค้า',
  `file1` varchar(150) NOT NULL COMMENT 'ชื่อรูปสินค้า',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `price` varchar(10) NOT NULL COMMENT 'ราคา',
  `detail` text NOT NULL COMMENT 'รายละเอียดสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `file1`, `name`, `price`, `detail`) VALUES
(2, '9e7f29fdc6a9fdcaaa31ffe86d2aceb0.png', 'BraceletStainless', '200', 'กำไล สแตนเลส\r\nกำไล QR Code\r\nตอบโจทย์ผู้ใช้ทุกเพศทุกวัย\r\nดีไชน์สวยงาม ใช้ได้กับทุกเพศทุกวัย \r\nทนทาน วัสดุ สแตนเลส\r\nกันน้ำ ไม่ลอก เพราะยิงด้วยระบบเลเชอร์\r\nความยาวกำไล 22 cm กว้าง 1.5 cm สามารถปรับได้'),
(3, '8260338a7e1b8a6ecfabe2c0e642488f.png', 'BraceletRubber', '250', 'กำไล สแตนเลส\r\nกำไล QR Code\r\nตอบโจทย์ผู้ใช้ทุกเพศทุกวัย\r\nดีไชน์สวยงาม ใช้ได้กับทุกเพศทุกวัย \r\nทนทาน วัสดุ ยาง\r\nกันน้ำ ไม่ลอก เพราะยิงด้วยระบบเลเชอร์\r\nความยาวกำไล 22 cm กว้าง 1.5 cm สามารถปรับได้\r\nกันน้ำไม่ลอก\r\nอายุใช้งาน 2-3 ปี'),
(4, '6e157d2f0218e3ab354db3afd277523a.png', 'BraceletLeather', '300', 'กำไล สแตนเลส\r\nกำไล QR Code\r\nตอบโจทย์ผู้ใช้ทุกเพศทุกวัย\r\nดีไชน์สวยงาม ใช้ได้กับทุกเพศทุกวัย \r\nทนทาน วัสดุ หนัง\r\nกันน้ำ ไม่ลอก เพราะยิงด้วยระบบเลเชอร์\r\nความยาวกำไล 22 cm กว้าง 1.5 cm สามารถปรับได้\r\nกันน้ำไม่ลอก\r\nอายุใช้งาน 2-3 ปี');

-- --------------------------------------------------------

--
-- Table structure for table `tb_scan`
--

CREATE TABLE `tb_scan` (
  `id` int(6) NOT NULL COMMENT 'รหัสการแสกน',
  `qr_code` text NOT NULL COMMENT 'รหัสคิวอาร์โค้ด',
  `id_card` varchar(13) NOT NULL COMMENT 'หมายเลขบัตรประชาชน',
  `datetime` datetime NOT NULL COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_scan`
--

INSERT INTO `tb_scan` (`id`, `qr_code`, `id_card`, `datetime`) VALUES
(1, '7-1234567890123', '7-12345678901', '2018-10-06 08:10:54'),
(2, '7-1234567890123', '7-12345678901', '2018-10-06 08:12:50'),
(3, '7-1234567890123', '7-12345678901', '2018-10-06 08:14:33'),
(4, '7-1234567890123', '7-12345678901', '2018-10-06 08:14:53'),
(5, '7-1234567890123', '7-12345678901', '2018-10-06 08:15:12'),
(6, '7-1234567890123', '7-12345678901', '2018-10-06 09:24:54'),
(7, '7-1234567890123', '7-12345678901', '2018-10-06 09:25:30'),
(8, '7-1234567890123', '7-12345678901', '2018-10-06 09:25:41'),
(9, '7-1234567890123', '7-12345678901', '2018-10-06 09:26:22'),
(10, '7-1234567890123', '7-12345678901', '2018-10-06 09:27:00'),
(11, '7-1234567890123', '7-12345678901', '2018-10-06 09:27:18'),
(12, '7-1234567890123', '7-12345678901', '2018-10-06 10:00:09'),
(13, '7-1234567890123', '7-12345678901', '2018-10-06 10:03:13'),
(14, '7-1234567890123', '7-12345678901', '2018-10-06 10:03:25'),
(15, '7-1234567890123', '7-12345678901', '2018-10-06 10:03:38'),
(16, '7-1234567890123', '7-12345678901', '2018-10-06 10:13:24'),
(17, '7-1234567890123', '7-12345678901', '2018-10-06 10:13:39'),
(18, '7-1234567890123', '7-12345678901', '2018-10-06 10:13:48'),
(19, '7-1234567890123', '7-12345678901', '2018-10-06 10:14:13'),
(20, '7-1234567890123', '7-12345678901', '2018-10-06 10:14:30'),
(21, '7-1234567890123', '7-12345678901', '2018-10-06 10:14:45'),
(22, '7-1234567890123', '7-12345678901', '2018-10-06 10:15:07'),
(23, '7-1234567890123', '7-12345678901', '2018-10-06 10:35:33'),
(24, '7-1234567890123', '7-12345678901', '2018-10-06 10:35:42'),
(25, '7-1234567890123', '7-12345678901', '2018-10-06 10:36:10'),
(26, '7-1234567890123', '7-12345678901', '2018-10-06 10:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(6) NOT NULL COMMENT 'รหัสยุสเซอร์',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL COMMENT 'ยุสเซอร์เนม',
  `password` varchar(8) NOT NULL COMMENT 'พาสเวิร์ด',
  `created` datetime NOT NULL COMMENT 'วันที่สมัคร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `username`, `password`, `created`) VALUES
(8, 'bruce', 'banner', 'bruce', 'password', '2018-09-26 16:41:10'),
(9, 'tony', 'starkz', 'tony', 'password', '2018-09-26 17:00:08'),
(10, 'test', 'test', 'test', '12341234', '2018-10-08 16:17:22'),
(11, 'test', 'test', 'testt', 'password', '2018-10-10 18:37:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_howto`
--
ALTER TABLE `tb_howto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order_detail_data`
--
ALTER TABLE `tb_order_detail_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_scan`
--
ALTER TABLE `tb_scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแอดมิน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสธนาคาร', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสที่อยู่', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_howto`
--
ALTER TABLE `tb_howto`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสขั้นตอนการสั่งซื้อ', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสออเดอร์', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการออเดอร์', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_order_detail_data`
--
ALTER TABLE `tb_order_detail_data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อมูลประกอบสินค้า', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_scan`
--
ALTER TABLE `tb_scan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการแสกน', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยุสเซอร์', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
