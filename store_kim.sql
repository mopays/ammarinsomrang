-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 07:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_kim`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `pdetail` varchar(255) NOT NULL,
  `quintity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pcategory`
--

CREATE TABLE `pcategory` (
  `pcategoryid` int(11) NOT NULL,
  `pcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcategory`
--

INSERT INTO `pcategory` (`pcategoryid`, `pcategory`) VALUES
(1, 'สี'),
(2, 'เครื่องมือช่าง'),
(3, 'สายไฟ'),
(4, 'อุปกรณ์เกี่ยวกับการเขียน'),
(5, 'ท่อน้ำ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdetail` varchar(255) NOT NULL,
  `pprice` int(11) NOT NULL,
  `pcategoryid` int(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdetail`, `pprice`, `pcategoryid`, `img`) VALUES
(1, 'spray paint L-01 สีขาว', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '1.jpg'),
(2, 'spray paint สีสเปรย์ L-02 สีดำ', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '2.jpg'),
(3, 'spray paint สีสเปรย์ L-03 สีแดง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '3.jpg'),
(4, 'spray paint สีสเปรย์ L-04 สีเหลือง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '4.jpg'),
(5, 'spray paint สีสเปรย์ L-05 สีน้ำเงิน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '5.jpg'),
(6, 'spray paint สีสเปรย์ L-06 สีฟ้า', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '6.jpg'),
(7, 'spray paint สีสเปรย์ L-09 สีม่วง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '7.jpg'),
(8, 'spray paint สีสเปรย์  L-10 สีเงิน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '8.jpg'),
(9, 'spray paint สีสเปรย์ L-13 สีส้ม', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '9.jpg'),
(10, 'spray paint สีสเปรย์ L-16 สีเขียวอ่อน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '10.jpg'),
(11, 'spray paint สีสเปรย์ L-17	สีเงินลอย', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '11.jpg'),
(12, 'spray paint สีสเปรย์ F-14	ดำด้าน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '12.jpg'),
(13, 'spray paint สีสเปรย์ F-15	ขาวด้าน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '13.jpg'),
(14, 'spray paint สีสเปรย์ C-75	แลกเกอร์เงา', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '14.jpg'),
(15, 'spray paint สีสเปรย์ F-76	แลกเกอร์ด้าน', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '15.jpg'),
(16, 'spray paint สีสเปรย์ A-42	รองพื้นเทา', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '16.jpg'),
(17, 'spray paint สีสเปรย์ W-10 รองพื้นขาว', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '17.jpg'),
(18, 'spray paint สีสเปรย์ N-39	รองพื้นแดง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '18.jpg'),
(19, 'spray paint สีสเปรย์ L-42	สัญญาณสีแดง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '19.jpg'),
(20, 'spray paint สีสเปรย์ L-21	เหลือง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '20.jpg'),
(21, 'spray paint สีสเปรย์ L-151 เหลืองสว่าง', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '21.jpg'),
(22, 'spray paint สีสเปรย์ L-35 สีน้ำเงินสด', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '22.jpg'),
(23, 'spray paint สีสเปรย์ L-93	ฟ้าเข้ม', 'สีสเปรย์ สีพ่นรถ สีพ่นมอไซค์ สีพ่นเหล็ก ไม้ โลหะ pvc เลย์แลนด์ Leyland Spray สีพาสเทลครบทุกเฉดสี', 60, 1, '23.jpg'),
(24, 'ลูกกลิ้งทาสี', 'ลูกกลิ้งทาสีขนเเกะ หรือลูกกลิ้งขนยาว \r\nเป็นประเภทที่มักพบเห็นกันได้บ่อย นิยมเอามาใช้กลิ้งสีจำพวกสีน้ำและสีทาอาคาร เนื่องจากในการจุ่มสี 1 ครั้งนั้น\r\nจะสามารถอุ้มสีได้เป็นจำนวนมาก ทำให้การกลิ้งบนพื้นผิว\r\nที่ต้องการนั้นก็จะได้พื้นที่ที่มากตามไปด้วย อีกทั้งยั', 40, 2, '24.png'),
(25, 'กาวร้อน', ' กาวสารพัดประโยชน์ เนื้อกาวเข้มข้นคุณภาพสูงจากประเทศญี่ปุ่น ติดวัสดุได้หลากหลาย ทั้งวัสดุภายในบ้านจนถึงส่วนประกอบชิ้นส่วนในโรงงานอุตสาหกรรม ', 30, 2, '25.png'),
(26, 'ตะปูตอกไม้', 'ตะปูตอกไม้ ผลิตจากลวดเหล็กชุบสังกะสีกันสนิม หัวกลม ตัวไม่งอ ปลายแหลม แข็งแรง ทนทาน ไม่หักง่าย ความยาว 4 นิ้ว', 65, 2, '26.png'),
(27, 'ไม้กวาดทางมะพร้าวด้ามยาว   ', 'ผลิตจากก้านมะพร้าวเหลา \r\nด้ามไม้ไผ่ มัดเชือกพลาสติก ลงยาชัน ไม่หลุดร่วงง่าย ด้ามไม้ไผ่ จับถนัดมือ มีความแข็งแรง ทนทาน \r\nไม่แตกหักง่าย ใช้สำหรับพื้นบริเวณภายนอกอาคาร ใช้ได้ทั้งพื้นแห้งและเปียก', 75, 2, '27.png'),
(28, 'สายยางขาวใส', 'อุปกรณ์ระบบน้ำงานสวนคุณภาพจากแบรนด์ GARTEN ใช้ฉีดรดน้ำต้นไม้ พืชผลทางการเกษตรต่าง ๆ หรือใช้ฉีดล้างทำความสะอาดรถยนต์ และพื้นบริเวณบ้านได้ตามต้องการ สามารถต่อเข้ากับก๊อกน้ำ หรืออุปกรณ์ข้อต่อระบบน้ำงานสวนต่าง ๆ ได้ง่าย วัสดุมีความยืดหยุ่นทนทาน รองรับแรงดันน้', 230, 2, '28.png'),
(29, 'cable สายไฟ', 'สายไฟแข็งแรง ทนทาน เดินสายง่าย \r\nสามารถใช้งานยาวนาน รองรับกระแสไฟฟ้า 17A \r\nพิกัดแรงดัน 300/500 V อุณหภูมิไม่เกิน 70 องศา \r\nการใช้งาน : ติดตั้งสายไฟ แบบเดินลอย / เดินเกาะผนัง / \r\nเดินร้อยสาย / เดินซ่อนฝ้า / เดินในรางเก็บสายไฟ / \r\nเดินร้อยท่อ ', 22, 3, '29.png'),
(30, 'พู่กัน', 'ขนแปรงสีน้ำตาล ผลิตจากใยสังเคราะห์\r\nคุณภาพอย่างดี ทนทาน ติดแน่นหลอดอลูมีเนียม \r\nไร้ตะเข็บอย่างดี ไม่เป็นสนิม ด้ามทำด้วยพลาสติก \r\nให้น้ำหนักในการระบายสีได้อย่างเรียบเนียน \r\nเหมาะกับงานสีน้ำ และสีโปสเตอร์', 30, 4, '30.png'),
(31, 'ดินสอไม้เขียนแบบ', 'ดินสอไม้เขียนแบบ Staedtler Lumograph ดินสอเขียนแบบ เหลาพร้อมใช้ \r\nไส้ดินสอคุณภาพสูง เขียนได้คมชัด \r\nสามารถลบออกได้ง่าย ด้ามจับทรงหกเหลี่ยม \r\nจับถนัดมือ ด้ามสีน้ำเงิน มีเบอร์ให้เลือกถึง 20 เบอร์', 19, 4, '31.png'),
(32, 'PVC Pipes ท่อน้ำPVC', 'ผลิตจากพลาสติก PVC ทนทานต่อแรงกระแทก สายยางเป็นประเภทสีทึบ ทำให้เกิดตะไคร่ได้ยาก \r\nสายยางมีความยืดหยุ่น เมื่อบิดงอ แล้วคืนตัวได้ดี', 45, 5, '32.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `pcategory`
--
ALTER TABLE `pcategory`
  ADD PRIMARY KEY (`pcategoryid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pcategory`
--
ALTER TABLE `pcategory`
  MODIFY `pcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
