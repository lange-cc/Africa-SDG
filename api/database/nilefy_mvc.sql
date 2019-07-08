-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2018 at 10:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilefy_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

CREATE TABLE `client_information` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `location` text NOT NULL,
  `city` text NOT NULL,
  `phone` text NOT NULL,
  `road` text NOT NULL,
  `other_info` text NOT NULL,
  `account_id` text NOT NULL,
  `user_f_name` text NOT NULL,
  `user_l_name` text NOT NULL,
  `user_location` text NOT NULL,
  `user_zip` text NOT NULL,
  `user_city` text NOT NULL,
  `user_phone` text NOT NULL,
  `user_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_information`
--

INSERT INTO `client_information` (`id`, `first_name`, `last_name`, `location`, `city`, `phone`, `road`, `other_info`, `account_id`, `user_f_name`, `user_l_name`, `user_location`, `user_zip`, `user_city`, `user_phone`, `user_email`) VALUES
(23, 'abe', 'jahwin', 'Rwanda', 'Kigali', '0788699383', 'kn-47', 'Amakuru yanyu', 'FLIINV', 'And', 'Masezerano', 'Rwanda', '4563', 'Kigali', '0788699383', 'ajahwin@gmail.com'),
(24, 'abaho', 'life', 'Rwanda', 'kigali', '0722925525', 'kn-47', 'amakuru yanyu mwese', 'RARKHI', 'Abe', 'jahwin', 'Rwanda', '2876', 'Kigali', '0788699383', 'ajahwin@gmail.com'),
(25, 'abaho', 'jahwin', 'Rwanda', 'Kigali', '078367237657', 'kn-47', 'amakuru c', 'ASXJDD', 'And', 'jahwin', 'Rwanda', '356', 'Kigali', '0781296595', 'ajahwin@gmail.com'),
(26, 'abaho', 'jahwin', 'Rwanda', 'kigali', '093262731532', 'kn-47', 'hello', 'MDYG3T', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE `deliver` (
  `id` int(255) NOT NULL,
  `client_id` text NOT NULL,
  `index_number` text NOT NULL,
  `index_code` text NOT NULL,
  `date` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `pay_status` text NOT NULL,
  `account_id` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`id`, `client_id`, `index_number`, `index_code`, `date`, `pay_status`, `account_id`, `status`) VALUES
(1, 'MDYG3T', 'rpjxp', 'DQJB-U57O-1EYO-7XKK', '2018-01-09 09:05:45.0000', 'not-payed', 'none', '0');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `indexx` text NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `mm` int(10) NOT NULL,
  `yyy` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `indexx`, `invoice_number`, `mm`, `yyy`) VALUES
(1, 'OCZG-KEPD-LGGD-H7WJ', '1', 12, 2017),
(2, 'EWLI-JRGO-DLVP-EDEV', '1', 1, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(200) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `index` text NOT NULL,
  `logo` text NOT NULL,
  `cover_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `username`, `password`, `email`, `index`, `logo`, `cover_logo`) VALUES
(1, 'ABE JAHWIN', 'jahwin', 'mylove', 'ajahwin@gmail.com', 'hjdaj', '8a0212ecde722d3a180a5a5810ace7b6.jpg', '1f5dd6d002621501d820474e25c98c23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_article`
--

CREATE TABLE `mvc_article` (
  `id` int(200) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `content` text NOT NULL,
  `article_index` text NOT NULL,
  `logo` text NOT NULL,
  `section_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_article`
--

INSERT INTO `mvc_article` (`id`, `title`, `subtitle`, `content`, `article_index`, `logo`, `section_index`) VALUES
(2, '1914 translation by H. Rackham', 'put product link', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.', 'gc8GeiGe', 'EDhbUF1NYl.jpg', 'GJhvrpke'),
(3, 'Where can I get some', 'put product link', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text', 'kFfSbifa', 'sRRiIh6X7m.jpg', 'GJhvrpke'),
(4, 'none', 'put product link', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet', 'r8VrgHbc', '59c64af8329f612d2d0427487c8248c1.jpg', 'urcOi7hk'),
(5, 'Lorem Ipsum is not simply random text', 'put product link', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 'yelki4Oc', '4h1DvAlirz.jpg', 'urcOi7hk'),
(6, 'This is a great banner. Enjoy a great discount to the website by being our member? ', 'none', 'none', 'nEu8GrGP', 'v1hpt9ZNwI.jpg', 'gOhi7eMf'),
(7, 'Family', 'none', '', 'fn8fVHuf', '74d35a531e02659b1fe3a155a5757936.jpg', 'pOwvBJbV'),
(8, 'Mama', 'none', '', 'JipVBEMV', '53dce1caae83f34850eac0b981c0defd.jpg', 'pOwvBJbV'),
(9, 'Petit frere', 'none', '', '7eOfuegV', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'pOwvBJbV'),
(10, 'Petite soeur', 'none', '', 'H00rcFG3', '8f6f4ff7e80245aef190e46565d03379.jpg', 'pOwvBJbV'),
(11, 'Papa', 'none', '', 'khNwnbHG', 'b5b579031f77cc5e2c89ca0b0355ad37.jpg', 'pOwvBJbV');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_author`
--

CREATE TABLE `mvc_author` (
  `id` int(200) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_author`
--

INSERT INTO `mvc_author` (`id`, `name`, `description`, `logo`, `added_date`) VALUES
(1, 'Abe jahwin', 'I am the Author and social media Manager at Lange Technologiez. I write for the same reason I think-because a Good writing is a clear thinking made visible. Fill free to say hello or leave an advice or any comment on my posts.', '8a0212ecde722d3a180a5a5810ace7b6.jpg', '2018-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_blog`
--

CREATE TABLE `mvc_blog` (
  `id` int(200) NOT NULL,
  `Title` text NOT NULL,
  `content` text NOT NULL,
  `logo` text NOT NULL,
  `author_id` text NOT NULL,
  `views` int(250) NOT NULL,
  `added_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_blog`
--

INSERT INTO `mvc_blog` (`id`, `Title`, `content`, `logo`, `author_id`, `views`, `added_date`, `updated_date`) VALUES
(1, 'SOCIAL MEDIA, A NECESSITY FOR YOUR BUSINESS. WHY?', '<p>Have you ever realized that your business needs an online presence? Did you notice that your businessâ€™ online presence is of worth importance? it is absolutely essential for your business to have an online presence. Can you guess why? Even if your company does not conduct business online, customers and potential customers are expecting to see you online. By online presence most of us reflect directly to their Facebook page or Twitter account. Donâ€™t you think that your online presence stands for something greater than that? What about having your own website?</p><p>Why canâ€™t you set up a virtual version of your business, with a welcoming, informative website?</p><p>Here are just a few of the many reasons why your business needs to establish its online presence:</p><p><u><b>Make it Easier for Potential Customers Come to You</b></u></p><p>Today, if someone wants more information about a company, theyâ€™re most likely to do their research online. Whether theyâ€™re specifically looking for your company, or they just want to find any company that offers the products or services that your company offers, having an online presence will give you a competitive edge. Potential customers will not put a lot of effort into finding you, and they should not have to. A simple Google search should provide them with all the information they seek. Your companyâ€™s website is listed in the search results. After browsing your website, sheâ€™s satisfied that you can provide her with what she needs. Youâ€™ve just earned another customer! What if you donâ€™t have a website? Itâ€™s better not to think about a terrible loss you will be experiencing.</p><p><span style=\"font-size:14px\"><u><b>Make it Easier to Showcase Your Products and Services</b></u></span></p><p>The Internet gives businesses an effective platform for showcasing what they have to offer. Your clients can find your portfolio and testimonials from other clients on your website. They can even do this outside of business hours! An online presence is an extension of your brand that never sleeps.</p><p><u><b>Make it Easier to Market Your Brand</b></u></p><p>Websites are excellent marketing tools. They are also some of the most cost effective methods of sending out information to thousands of people. Online marketing is extremely important for all businesses because it has a huge influence on the way consumers make purchasing decisions. Modern consumers have even indicated that they look at companies in a negative light if they cannot find them online. Using the internet for marketing purposes allows you to overcome distance barriers. Persons thousands of miles away can be learning all about your business with just a few keystrokes. An online presence is one of the most important investments that a business can make.</p>', '08605007b2f514589b9ada4706a50e0a.jpg', '1', 0, '2018-01-05', '2018-01-05'),
(2, 'THE EASIEST WAY TO BOOST YOUR BUSINESS.', '<p>Where you go from here is a bit up to you. You could turn the image resource into a PNG or a JPEG and then store it as a file, in a database, or whatever you feel like. Just as an example Iâ€™ll turn it into a JPEG, catch the data in a versatile variable and output it to the browser.</p><p>First I create a JPEG image out of it and catch it using output buffering. With the data in a variable it can easily be stored in a database, dumped to a file or to the browser. If you wanted to dump it to a file, youâ€™d probably want to swap <code class=\"codecolorer text default\"><span class=\"text\">NULL</span></code> with the filename. And if you wanted to output it to the browser, you could just skip the output buffering and let the data flow to the browser freely. But, just so you can see how to catch the data in a variable, I will do it the hard way<br></p>', '8be1639a3cc0663160925ea1d281f41c.jpg', '1', 0, '2018-01-05', '2018-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_category`
--

CREATE TABLE `mvc_category` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `level` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_category`
--

INSERT INTO `mvc_category` (`id`, `name`, `level`, `parent_id`) VALUES
(1, 'Food', 1, 0),
(3, 'Grain products', 2, 1),
(4, 'Condiments', 2, 1),
(5, 'Candies', 2, 1),
(6, 'Beverages', 2, 1),
(7, 'Dairy', 2, 1),
(8, 'Cleanings', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mvc_comment`
--

CREATE TABLE `mvc_comment` (
  `id` int(200) NOT NULL,
  `post_id` int(200) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `added_date` timestamp(4) NOT NULL DEFAULT '0000-00-00 00:00:00.0000' ON UPDATE CURRENT_TIMESTAMP(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_comment`
--

INSERT INTO `mvc_comment` (`id`, `post_id`, `name`, `content`, `added_date`) VALUES
(1, 9, 'jfknfs', 'fsmvkls', '2017-12-12 09:33:56.3326'),
(2, 1, 'abe jahwin', 'ndabona ari sw kbs', '2017-12-28 12:44:40.0000'),
(3, 1, 'Blese', 'murakoze cyane', '2017-12-28 13:57:15.0000'),
(4, 2, 'abe jahwin', 'hello', '2018-01-05 13:07:43.0000');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_dev_option`
--

CREATE TABLE `mvc_dev_option` (
  `id` int(11) NOT NULL,
  `option_name` text NOT NULL,
  `option_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_dev_option`
--

INSERT INTO `mvc_dev_option` (`id`, `option_name`, `option_status`) VALUES
(1, 'idOption', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_images`
--

CREATE TABLE `mvc_images` (
  `id` int(200) NOT NULL,
  `name` text NOT NULL,
  `folder_name` text NOT NULL,
  `img_index` text NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_images`
--

INSERT INTO `mvc_images` (`id`, `name`, `folder_name`, `img_index`, `color_id`) VALUES
(69, 'N3nbJfznuv.png', '', 'abedbnscv', 8),
(70, 'jli0080nJC.jpg', '', 'abedbnscv', 8),
(73, 'D01q7moC3b.jpg', '', 'abedbnscv', 8),
(74, 'MpTuvr7Gcz.jpg', '', 'abedbnscv', 8),
(78, '7NawQzpJig.jpg', '', 'abedbnscv', 9),
(79, 'Bd9wzionY8.jpg', '', 'abedbnscv', 9),
(80, 'm7pZGekrou.jpg', '', 'abedbnscv', 9),
(82, 'sguFDmZoYR.jpg', '', 'abencbdhj', 0),
(83, 'CECa7rm4bY.jpg', '', 'abencbdhj', 0),
(84, 'YullnZa1pe.jpg', '', 'abencbdhj', 0),
(85, 'qL5bVeJKDw.jpg', '', 'abencbdhj', 0),
(86, 'Gh6TpM7zFu.jpg', '', 'abencbdhj', 0),
(87, 'CmttFwY6sL.jpg', '', 'abencbdhj', 0),
(88, 'TEHSENfn2W.png', '', 'abencbdhj', 0),
(89, 'yzpvervk1c.jpg', '', 'abencbdhj', 0),
(90, 'Dy8wq9tejk.jpg', '', 'abencbdhj', 0),
(91, 'vEbthay80e.jpg', '', 'abencbdhj', 0),
(93, 'FF1Fz6mayc.jpg', '', 'abencbdhj', 0),
(94, '1YFNgVZPPh.jpg', '', 'abencbdhj', 0),
(95, 'V2bxcONnRK.jpg', '', 'j0PO2', 0),
(96, 'I65wPAA2Br.jpg', '', 'j0PO2', 0),
(97, '3xgdktslbl.jpg', '', 'j0PO2', 0),
(98, 'sMk4b3a7N2.jpg', '', 'j0PO2', 0),
(99, 'TAb2DyIfvy.JPG', '', 'iFSij', 0),
(100, '8DFzfbq2zL.JPG', '', 'iFSij', 0),
(101, 'w1nC75A5sf.JPG', '', 'iFSij', 0),
(102, 'm29kEy3hC6.JPG', '', 'iFSij', 0),
(103, 'uGFxdbxExN.JPG', '', 'ufrF4', 0),
(104, 'n3P4DlBauE.JPG', '', 'ufrF4', 0),
(105, 'fmaxnoK5qu.JPG', '', 'ufrF4', 0),
(106, 'dyxnMrnnub.JPG', '', 'ufrF4', 0),
(107, 'h0eCykDa0b.JPG', '', 'f7rNC', 0),
(108, '9phz9EWY6x.JPG', '', 'f7rNC', 0),
(109, 'mfBthrzHqb.JPG', '', 'f7rNC', 0),
(110, 'PaGxULWGYa.JPG', '', 'f7rNC', 0),
(111, 'uXcgpYWBtn.JPG', '', 'OreuF', 0),
(112, 'bsbrtRzbaP.JPG', '', 'OreuF', 0),
(113, '1jX1rugnqa.JPG', '', 'OreuF', 0),
(114, 'n0qEbqY4Fa.JPG', '', 'OreuF', 0),
(115, 'sKrfCvC7wl.JPG', '', 'SfrMj', 0),
(116, '1AqNm07zfB.JPG', '', 'SfrMj', 0),
(117, '64io5B8ohA.JPG', '', 'SfrMj', 0),
(118, 'L51lkMaPGg.JPG', '', 'SfrMj', 0),
(119, 'jvmC0DDh2q.JPG', '', 'GONaO', 0),
(120, 'Z3E0AOkqou.JPG', '', 'GONaO', 0),
(121, 'YqnJGxeCfy.JPG', '', 'GONaO', 0),
(122, 'Ag9jcEH3ka.JPG', '', 'GONaO', 0),
(123, 'okAcr3moNw.JPG', '', 'fveVv', 0),
(124, 'cf3cyyk15b.JPG', '', 'fveVv', 0),
(125, '86xtB3Q3FA.JPG', '', 'fveVv', 0),
(126, 'N0wgtQnR29.JPG', '', 'fveVv', 0),
(127, 'JHvzstw5B9.jpg', '', 'VE0rg', 0),
(128, 'dDmLBSd5nf.jpg', '', 'VE0rg', 0),
(129, '2yYy8sef0H.jpg', '', 'VE0rg', 0),
(130, '6FuynwjFxD.jpg', '', 'raHw8', 0),
(131, 'RWQDsTKQ0E.jpg', '', 'raHw8', 0),
(132, 'ubVgsivyfO.jpg', '', 'raHw8', 0),
(133, 'rhaeeuwwVA.jpg', '', 'raHw8', 0),
(134, 'ZwUzdR16hg.jpg', '', 'VE0rg', 0),
(135, 'YtKPbXFKoa.jpg', '', 'VE0rg', 0),
(136, 'ejPqewmE1t.jpg', '', 'VE0rg', 0),
(137, 'EKhdgd0tVq.jpg', '', 'giuei', 0),
(138, '07itoZATYy.jpg', '', 'giuei', 0),
(139, 'az3ABeAf4K.jpg', '', 'giuei', 0),
(140, '5fqDpMFbmy.jpg', '', 'giuei', 0),
(141, 'kFHBrdZfUs.jpg', '', 'giuei', 0),
(142, 'Doiu3VNyuo.JPG', '', 'P8uOS', 0),
(143, 'B5uAPAi4B2.JPG', '', 'P8uOS', 0),
(144, '76gEAQ6iAc.JPG', '', 'P8uOS', 0),
(145, 'QGDAf2Ex0r.JPG', '', 'ghHii', 0),
(146, 'BADknP139n.JPG', '', 'ghHii', 0),
(147, 'TPye1vXYH7.JPG', '', 'ghHii', 0),
(148, 'hoEzgQqOB6.JPG', '', 'ghHii', 0),
(149, 'Dk9xxsJwa1.JPG', '', 'pnrGH', 0),
(150, 'v6CehF9HZc.JPG', '', 'pnrGH', 0),
(151, 'ewEN1WCvS0.JPG', '', '7Eue8', 0),
(152, 'xrAc6y0Ix2.JPG', '', '7Eue8', 0),
(153, 'g9zrhmtzNR.JPG', '', 'fVu74', 0),
(154, 'AhbQDDBUBx.JPG', '', 'fVu74', 0),
(155, 'ic222a99v9.JPG', '', 'fVu74', 0),
(156, 'E2EU9ov8UE.JPG', '', 'fVu74', 0),
(157, '61NudFIxAo.JPG', '', 'yEFue', 0),
(158, 'ex8wiUGnD5.JPG', '', 'yEFue', 0),
(159, '0mI3ipAju7.JPG', '', 'yEFue', 0),
(160, '9VoOz11bm7.JPG', '', 'jlPjx', 0),
(161, 'VejEhmYAsl.JPG', '', 'jlPjx', 0),
(162, 'sOZEEhvk8h.JPG', '', 'pl8cF', 0),
(163, 'hsZAvD7sBh.JPG', '', 'pl8cF', 0),
(167, 'UaklhorPg9.JPG', '', '2iFSF', 0),
(168, 'nfnO45hq1u.JPG', '', '2iFSF', 0),
(169, 'JHfnhs2zcj.JPG', '', '2iFSF', 0),
(170, '2eWqKq7aC5.JPG', '', '2iFSF', 0),
(171, 'cQkdepU5DE.JPG', '', 'iuB2V', 0),
(172, 'rcbLo1B3Ea.JPG', '', 'iuB2V', 0),
(173, 'Eb0GZuBm8k.JPG', '', 'iuB2V', 0),
(174, 'g7RcmPMkam.JPG', '', 'rFCpx', 0),
(175, 'Pscem0s0t5.JPG', '', 'rFCpx', 0),
(176, 'fm9amndOaq.JPG', '', 'rFCpx', 0),
(177, 'CBKguuePzI.JPG', '', 'rFCpx', 0),
(178, 'WuR0Zj4DAE.JPG', '', 'rFCpx', 0),
(179, 'S6CbvjhJK9.JPG', '', 'rFCpx', 0),
(180, 'lgY7P9O9cS.JPG', '', 'ifwOa', 0),
(181, 'd2dcbHKdzl.JPG', '', 'ifwOa', 0),
(189, 'eCDSufazv1.JPG', '', 'PjHgul', 11),
(190, '3oTp1A41CH.JPG', '', 'PjHgul', 12),
(191, 'CV2CMhUQsv.JPG', '', 'MnKuv', 0),
(192, 'Al73cw757M.JPG', '', 'MnKuv', 0),
(193, 'd57e1ny6Ds.JPG', '', 'wiEeh', 0),
(194, 'lH1RShh9w5.JPG', '', 'wiEeh', 0),
(195, 'rojrRLofFX.JPG', '', 'i0xhi', 0),
(196, 'XdUrFa41Ke.JPG', '', 'i0xhi', 0),
(197, 'Cd504i9atk.JPG', '', '2fuFr', 0),
(198, 'e1zTLH962p.JPG', '', '2fuFr', 0),
(199, 'wZ52kwn3na.JPG', '', '8JGay', 0),
(200, '7w8j5WCnlm.JPG', '', '8JGay', 0),
(201, 'DwYe4DLUtr.JPG', '', 'xrffh', 0),
(204, 'KWjJmOilp9.JPG', '', 'iuVfi', 0),
(205, 'lk44M05kCH.JPG', '', 'iuVfi', 0),
(206, 'zq78HCW5yF.JPG', '', 'iuVfi', 0),
(207, '0pafmDKtaY.JPG', '', 'kafKa', 0),
(208, 'ipe90prlvb.JPG', '', 'kafKa', 0),
(209, 'niwm4Tbdcu.JPG', '', 'kafKa', 0),
(210, 'Qupffq6gBR.JPG', '', 'epeHc', 0),
(211, 'OrD0P5hYmb.JPG', '', 'epeHc', 0),
(212, 'r8ZKCl2da3.JPG', '', ' OeuS', 0),
(213, '5961QETFfc.JPG', '', ' OeuS', 0),
(214, 'Y7xKt4M9QF.JPG', '', ' OeuS', 0),
(215, 'tZZMGtn8su.JPG', '', ' OeuS', 0),
(216, 'ik2gyTB6wE.JPG', '', ' OeuS', 0),
(217, 'e3ry3pp71Q.JPG', '', ' OeuS', 0),
(218, 'nv6vfE6pm4.JPG', '', ' OeuS', 0),
(219, 'aF15c0niaU.JPG', '', ' OeuS', 0),
(220, 'BijfyXrAld.JPG', '', ' OeuS', 0),
(221, '6hPcoyCScQ.JPG', '', ' OeuS', 0),
(222, 'mjFuDMxjlo.JPG', '', ' OeuS', 0),
(223, 'RTdfqjh9XX.JPG', '', '8GSr0', 0),
(224, 'qnCiw8pmFa.JPG', '', '8GSr0', 0),
(225, 'Ah61upje35.JPG', '', '8GSr0', 0),
(226, 'q80Ajxr0Ba.JPG', '', '8GSr0', 0),
(227, 'oivnTol7Km.JPG', '', '8GSr0', 0),
(228, 'qb0kes8irH.JPG', '', 'genf2', 0),
(229, 'n5acoBhEdC.JPG', '', 'genf2', 0),
(230, 'dgblbwA93t.JPG', '', 'genf2', 0),
(231, 'yS8kOcKzY3.JPG', '', 'genf2', 0),
(232, '6ChdxiBN45.JPG', '', 'genf2', 0),
(233, '7zuW4HZumf.JPG', '', '4h7Hn', 0),
(234, 'Cf47IspCdz.JPG', '', '4h7Hn', 0),
(235, '9Ho8Voh6Bx.JPG', '', '4h7Hn', 0),
(236, 'rntYm4cBlV.JPG', '', '4h7Hn', 0),
(237, 'eh5EpxrE86.JPG', '', 'OuJGG', 0),
(238, 'vPgbNk3H9V.JPG', '', 'OuJGG', 0),
(239, 'oynnCme4vp.JPG', '', 'OuJGG', 0),
(240, 'PS40RsQRSA.JPG', '', 'OuJGG', 0),
(241, '4cBHKsLcqj.JPG', '', 'hguOy', 0),
(242, 'Q4Lqji5qVu.JPG', '', 'hguOy', 0),
(243, 'poxvmd0s3y.JPG', '', 'hguOy', 0),
(244, 'Zvy51BOoIz.JPG', '', 'jjjg0', 0),
(245, 'Iub4iRouAc.JPG', '', 'jjjg0', 0),
(246, 'F8evYlxzOM.JPG', '', 'jjjg0', 0),
(247, '2dpGkfC3jk.JPG', '', 'jjjg0', 0),
(248, 'p0FpnG49ru.JPG', '', 'jjjg0', 0),
(249, '9mkqti3q0z.JPG', '', 'Vfhnk', 0),
(250, 'vogGMlD9Lo.JPG', '', 'Vfhnk', 0),
(251, 'oa8b7wK0ar.JPG', '', 'Vfhnk', 0),
(252, 'tQK4pRYw4M.JPG', '', '8Nx y', 0),
(253, 'jy3TCuxCcX.JPG', '', '8Nx y', 0),
(254, 'P2do4COWs2.JPG', '', '8Nx y', 0),
(255, 'v2efsT5JHA.JPG', '', '8Nx y', 0),
(256, 'LA4I8x1ghf.JPG', '', 'gMwVV', 0),
(257, 'ntElndRhpq.JPG', '', 'gMwVV', 0),
(258, 'jBDGFMnscx.JPG', '', 'gMwVV', 0),
(259, 'mru3xd9gwa.JPG', '', 'gMwVV', 0),
(260, 'zo3q5kqudw.JPG', '', 'gMwVV', 0),
(261, 'xaWk1rkz4k.JPG', '', 'gMwVV', 0),
(262, 'cU6de3ZsA7.JPG', '', 'gMwVV', 0),
(263, 'ffiv4gFvPr.JPG', '', 'phGcc', 0),
(264, 'J5takRaS3y.JPG', '', 'phGcc', 0),
(265, '6v7aAKowob.JPG', '', 'phGcc', 0),
(266, 'cM6yrhvw4g.JPG', '', 'phGcc', 0),
(267, 'viozSlDsDc.JPG', '', 'phGcc', 0),
(268, '0b3mQmDmKt.JPG', '', 'phGcc', 0),
(269, '9TPE2gWJuD.JPG', '', 'CHvOn', 0),
(270, '3gFGzmxg0j.JPG', '', 'CHvOn', 0),
(271, 'vhvDllgaW9.JPG', '', 'CHvOn', 0),
(272, 'IYimNJImkh.JPG', '', 'CHvOn', 0),
(273, 'QxKXzn1yg1.JPG', '', 'CHvOn', 0),
(274, 'ipzf3B6CEP.JPG', '', 'CHvOn', 0),
(277, 'niFFFrOZu8.JPG', '', 'xrffh', 0),
(278, 'QauwqEDpOy.JPG', '', 'xrffh', 0),
(279, '9FsoE9CtB0.JPG', '', 'xrffh', 0),
(280, 'T4OtgBUb81.JPG', '', 'Crujj', 0),
(281, 'nlrrrk6mjc.JPG', '', 'Crujj', 0),
(282, 'll9EPrFe5K.JPG', '', 'uGScB', 0),
(283, 'E0zo45o8wt.JPG', '', 'uGScB', 0),
(285, 'KBgukucMuD.jpg', '', '', 0),
(286, 'sB5vMfN6Qg.jpg', '', '', 0),
(287, 'O0ZFXTqit1.jpg', '', '', 0),
(288, 'Cyaec1939e.JPG', '', '', 0),
(289, 'bIoIur3A7D.JPG', '', '', 0),
(290, 'yw5cGEDvzf.JPG', '', '', 0),
(291, 'bXxsM20C2J.JPG', '', '', 0),
(292, 'zb0WM8jjDF.JPG', '', '', 0),
(293, 'wssPBMPkxr.JPG', '', '', 0),
(294, '1ud1nmPnmW.JPG', '', '', 0),
(295, '5UYnADBbAs.JPG', '', '', 0),
(296, 'j90wnAdadk.jpg', '', '', 0),
(297, 'uEpnlpyYAn.jpg', '', '', 0),
(298, 'tuN6JY5c9P.jpg', '', '', 0),
(299, '9LdnTegO7j.JPG', '', '', 0),
(300, 'cFc3E0nrz0.JPG', '', '', 0),
(301, 'EprkxkYbtb.JPG', '', '', 0),
(302, 'T4YY0lFLvh.JPG', '', '', 0),
(303, 'rtDpEQsYWE.JPG', '', '', 0),
(304, 'uboSBzCc3T.JPG', '', '', 0),
(305, 'Yvaj96lfND.JPG', '', '', 0),
(306, 'X9bT80APp3.JPG', '', '', 0),
(307, 'd8RpN3sllV.JPG', '', '', 0),
(308, 'IcArpfBrfs.JPG', '', '', 0),
(309, 'L7WpeHiN7r.JPG', '', '', 0),
(310, 'qgFXa9JcVq.JPG', '', '', 0),
(311, 'Z5PJkVf57l.JPG', '', '', 0),
(312, 'mfip11wW7P.JPG', '', '', 0),
(313, '3GvxDMxz4k.JPG', '', '', 0),
(314, 'lYX33teQeu.JPG', '', '', 0),
(315, 'ckJnFDy7yk.JPG', '', '', 0),
(316, 'w64ybCy4GE.JPG', '', '', 0),
(317, 'kCi87xf8p9.JPG', '', '', 0),
(318, 'Wck4myMFsB.JPG', '', '', 0),
(319, 'CDyXRb1diQ.JPG', '', '', 0),
(320, 'xeB19B4GFg.JPG', '', '', 0),
(321, 'u3EuDpGHvu.JPG', '', '', 0),
(322, 'up1Llps241.JPG', '', '', 0),
(323, 'asFzyhwj95.JPG', '', '', 0),
(324, 'XigzxRU40c.JPG', '', '', 0),
(325, 'AgGT4n8szx.JPG', '', '', 0),
(326, 'Dq3jfB2ewb.JPG', '', '', 0),
(327, '0Ei1iQIgUK.JPG', '', '', 0),
(328, 'nEDtWaA99A.JPG', '', '', 0),
(329, 'ey554yp0Xf.JPG', '', '', 0),
(330, 'qPi9kvvUgI.JPG', '', '', 0),
(331, 'EyZRsO4Uhd.JPG', '', '', 0),
(332, '89r3lp0xw9.JPG', '', '', 0),
(333, 'xmJWbPd4W0.JPG', '', '', 0),
(334, 'kiwTgr3lX8.JPG', '', '', 0),
(335, 'tudPQi6yhe.JPG', '', '', 0),
(336, 'mVdQs2wLfF.JPG', '', '', 0),
(337, 'jiuqci67uB.JPG', '', '', 0),
(338, '94430c3db299028c6be50921393bbdea.png', 'none', 'none', 0),
(339, '1f5dd6d002621501d820474e25c98c23.jpg', 'none', 'none', 0),
(340, '8a0212ecde722d3a180a5a5810ace7b6.jpg', 'none', 'none', 0),
(341, '74d35a531e02659b1fe3a155a5757936.jpg', 'none', 'none', 0),
(342, 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'none', 'none', 0),
(343, 'b5b579031f77cc5e2c89ca0b0355ad37.jpg', 'none', 'none', 0),
(344, '53dce1caae83f34850eac0b981c0defd.jpg', 'none', 'none', 0),
(345, 'f4c928aefb16366209dfcd7733b8fc16.jpg', 'none', 'none', 0),
(346, '8f6f4ff7e80245aef190e46565d03379.jpg', 'none', 'none', 0),
(347, '5758ea5b5e6275088d61e8404f86f4f8.jpg', 'none', 'none', 0),
(348, 'ea9cd56879fe107a5b4e293457377bef.jpg', 'none', 'none', 0),
(349, 'aa2686169bb9f030636a001c6c2f2f20.jpg', 'none', 'none', 0),
(350, 'bb517cbb1d1b213e21a71516a53e52b2.jpg', 'none', 'none', 0),
(351, '5772cffc7469f1f65d45c1aafef6d45d.jpg', 'none', 'none', 0),
(352, 'ab5bae2ce818e6585962696e7df25893.jpg', 'none', 'none', 0),
(353, 'd857934495a3ebd0045e170a374355ac.jpg', 'none', 'none', 0),
(354, '7e1fb0c9e78660497d2499d3d9240ded.jpg', 'none', 'none', 0),
(355, '344c5d8acb61aecbba97d2ac4cd53a99.jpg', 'none', 'none', 0),
(356, 'e40c4c82d3a209fe9b81dc39693f6b89.jpg', 'none', 'none', 0),
(357, '1b0bd62089c7b5dcc08d225d340cd08c.jpg', 'none', 'none', 0),
(358, '043ac34379fb0964c90b67a1e9ccd04d.jpg', 'none', 'none', 0),
(359, '59c64af8329f612d2d0427487c8248c1.jpg', 'none', 'none', 0),
(360, '53cf200b9d963007987b866b717f8a47.jpg', 'none', 'none', 0),
(361, '3fa02a56ffe2e915b4af3f97a5fb8ca2.jpg', 'none', 'none', 0),
(362, '5540ae4362ce92061121415fadc8443f.jpg', 'none', 'none', 0),
(363, 'fd00fecc565ffcc3ccb702adca2f0a59.jpg', 'none', 'none', 0),
(364, '5e1ec54e040c58398368fc16854d9126.jpg', 'none', 'none', 0),
(365, '154241638fde672d552ac205ae36d8b3.jpg', 'none', 'none', 0),
(366, 'ed62d7682587b251ea108012674fbac2.jpg', 'none', 'none', 0),
(367, '5efbc5ca18a25a3b5a046097b896f53f.jpg', 'none', 'none', 0),
(368, '8336b1e0ab18a2d376ee784e9fe94d1e.jpg', 'none', 'none', 0),
(369, '08605007b2f514589b9ada4706a50e0a.jpg', 'none', 'none', 0),
(370, '8be1639a3cc0663160925ea1d281f41c.jpg', 'none', 'none', 0),
(371, 'dc422e48d822930495b53ffe42ef66ca.jpg', 'none', 'none', 0),
(372, '77f7a72e9ef2a934e601252d16fdd530.jpg', 'none', 'none', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mvc_image_folder`
--

CREATE TABLE `mvc_image_folder` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mvc_main_site_content`
--

CREATE TABLE `mvc_main_site_content` (
  `id` int(200) NOT NULL,
  `type` text NOT NULL,
  `content` text NOT NULL,
  `cont_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_main_site_content`
--

INSERT INTO `mvc_main_site_content` (`id`, `type`, `content`, `cont_index`) VALUES
(1, 'SLIDE', 'Put all slide content', 'FjuNJGyb'),
(2, 'Banner', 'Put all banners', '8e2rOFFH'),
(3, 'GIFTBOX', 'Put giftbox data', 'FVjKlpJc');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_message`
--

CREATE TABLE `mvc_message` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `mail_to` text NOT NULL,
  `mail_from` text NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `type` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `date` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mvc_section`
--

CREATE TABLE `mvc_section` (
  `id` int(200) NOT NULL,
  `title` text NOT NULL,
  `discription` text NOT NULL,
  `section_index` text NOT NULL,
  `cont_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_section`
--

INSERT INTO `mvc_section` (`id`, `title`, `discription`, `section_index`, `cont_index`) VALUES
(1, 'TOP HOME SLIDE', 'Put slide Content ', 'GJhvrpke', 'FjuNJGyb'),
(2, 'TOP HOME BANNER', 'Put all banner content', 'urcOi7hk', '8e2rOFFH'),
(3, 'BOTTOM BANNER', 'Put all content of bottom banner', 'gOhi7eMf', '8e2rOFFH'),
(4, 'Giftbox data', 'Put name and image of each giftbox', 'pOwvBJbV', 'FVjKlpJc');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_setting_login`
--

CREATE TABLE `mvc_setting_login` (
  `id` int(30) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_setting_login`
--

INSERT INTO `mvc_setting_login` (`id`, `username`, `password`) VALUES
(1, 'jahwin', 'zaburi12');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_site_accounts`
--

CREATE TABLE `mvc_site_accounts` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `dd` text NOT NULL,
  `mm` text NOT NULL,
  `yyy` text NOT NULL,
  `sex` text NOT NULL,
  `location` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_site_accounts`
--

INSERT INTO `mvc_site_accounts` (`id`, `f_name`, `l_name`, `dd`, `mm`, `yyy`, `sex`, `location`, `email`, `password`, `status`, `logo`) VALUES
(1, 'abe', 'jahwin', '01', '01', '2000', '', 'Afghanistan', 'ajahwin@gmail.com', 'mylove', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_status`
--

CREATE TABLE `mvc_status` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `time` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `device` varchar(255) NOT NULL,
  `page` text NOT NULL,
  `ip` text NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `referrer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mvc_status`
--

INSERT INTO `mvc_status` (`id`, `user_id`, `country`, `city`, `time`, `device`, `page`, `ip`, `views`, `referrer`) VALUES
(3, 'User_6335436459', '', '', '2018-01-09 09:04:06.0000', 'Computer', 'Home', '::1', 5, 'http://localhost/nilefy/home/'),
(4, 'User_6335436459', '', '', '2018-01-09 09:04:10.0000', 'Computer', 'Giftboxes', '::1', 3, 'http://localhost/nilefy/home/'),
(5, 'User_6335436459', '', '', '2018-01-09 09:00:14.0000', 'Computer', 'Derivery', '::1', 2, 'http://localhost/nilefy/home/'),
(6, 'User_6335436459', '', '', '2018-01-09 09:00:26.0000', 'Computer', 'Blog', '::1', 1, 'http://localhost/nilefy/shop/'),
(7, 'User_6335436459', '', '', '2018-01-09 09:04:18.0000', 'Computer', 'SignIn', '::1', 1, 'http://localhost/nilefy/blog/'),
(8, 'User_6335436459', '', '', '2018-01-09 09:04:21.0000', 'Computer', 'Register', '::1', 1, 'http://localhost/nilefy/signin');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_team`
--

CREATE TABLE `mvc_team` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `job_title` text NOT NULL,
  `content` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `product_name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `main_img` text NOT NULL,
  `price` text NOT NULL,
  `discount` text NOT NULL,
  `quantity` text NOT NULL,
  `size` text NOT NULL,
  `description` text NOT NULL,
  `weight` text NOT NULL,
  `stock_info` text NOT NULL,
  `other_img_index` text NOT NULL,
  `keywords` text NOT NULL,
  `color_index` text NOT NULL,
  `manufacture_price` text NOT NULL,
  `type` text NOT NULL,
  `summury` text NOT NULL,
  `size_index` text NOT NULL,
  `quantity_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `main_img`, `price`, `discount`, `quantity`, `size`, `description`, `weight`, `stock_info`, `other_img_index`, `keywords`, `color_index`, `manufacture_price`, `type`, `summury`, `size_index`, `quantity_index`) VALUES
(1, 'Rice', 0, 'bb517cbb1d1b213e21a71516a53e52b2.jpg', '11.7', '', '', '', '<p></p><p><br></p><p></p>', '', '', 'j0PO2', '', 'juOFul', '', 'product', 'Jambo basmati rice,\r\n1/4 cup dry, yields Â¾ cup when cooked,\r\nSecured and trusted for family consumption,\r\nhelps in reducing weight,\r\ngives energy to everyone who eats it.', 'rbelCF', 'OK8FFG'),
(2, 'Ceres Delight Juice', 3, '08605007b2f514589b9ada4706a50e0a.jpg', '3.51', '', '', '', '', '', '', 'iFSij', '', 'y4JfFu', '', 'product', 'This Ceres delight fruit juice is a product  of Ceres valley apple, orange, lemon and\r\n Grape fruits, with enchanting taste.\r\n*contains sugar\r\n*It improves your skin quality and supports weight loss.\r\n*It aids digestion and freshens breath.\r\n*It helps prevent kidney stones because of natural lemon rich in vitamin c.\r\n*Tastes like you canâ€™t imagine\r\n\r\n\r\n', 'HCuf  ', '7PrcbB'),
(3, 'Ceres Delight Cocopine Juice', 0, '59c64af8329f612d2d0427487c8248c1.jpg', '3.51', '', '', '', '', '', '', 'ufrF4', '', 'gylf78', '', 'product', 'Made from Ceres valley fruits like pear, pineapple, and\r\ncoconut water.\r\nDrinking this juice Rich in vitamin C can protect you\r\nagainst a variety of cancer.\r\nThis juice with a magic taste may also lower risk of age-related macular \r\ndegeneration, the primary cause of vision loss in older adults.\r\nCan help reduce blood pressure and enhance weight loss all of this \r\ndue to pear and coconut water.\r\nFeeling stressed? drink this juice which is good at Reducing Stress.\r\n\r\n\r\n', 'g7cc0h', 'jwhhn '),
(4, 'Ceres Delight Orange Juice.', 0, '8336b1e0ab18a2d376ee784e9fe94d1e.jpg', '3.51', '', '', '', '', '', '', 'f7rNC', '', 'byvP3y', '', 'product', '.Made from ceres valley orange with a beautiful taste.\r\n.fats and fiber free.  \r\nconsuming this orange juice in the first two years of life may reduce the risk of developing \r\nchildhood leukemia.\r\nIt can also help combat the formation of free radicals known to cause cancer,\r\nProtect against feeling lethargic, bone pain, and joint pain.\r\n\r\n\r\n', 'SySiFS', 'uNFChh'),
(5, 'Hanepoot whit grape juice', 0, 'dc422e48d822930495b53ffe42ef66ca.jpg', '3.51', '', '', '', '', '', '', 'OreuF', '', 'p3GOxi', '', 'product', '. Ceres natureâ€™s juice which help in stabilizing blood sugar level\r\n.preservatives free.\r\n. no sugar added\r\n \r\n.consume this juice to boost your energy level and maintain a healthy blood pressure as \r\nit is made of natural white grape fruits.\r\nReduce the risk of blood clots. \r\n.Can help People who have had surgery for their \r\nwounds heal coz itâ€™s rich in vitamin C.\r\n', 'CySkre', 'N2ypyf'),
(6, 'Apple juice', 0, '8be1639a3cc0663160925ea1d281f41c.jpg', '3.51', '', '', '', '', '', '', 'SfrMj', '', 'rSnblf', '', 'product', 'Ceres natureâ€™s apple juice promotes healthy body due to its enough power packed \r\ndisease fighting vitamins.it reduces the risk of many chronic diseases.\r\nDrinking this ceres apple juice is linked with lowering the risk of type 2 diabetes.\r\nEffective for weight loss and in prevention of asthma attacks by 30-40 per cent.\r\nbeneficial in smooth function of the digestive system as  Apple skin contains pectin.\r\nthis juice acts like as liver cleanser.\r\ntake one glass of apple juice daily.\r\nrich in vitamin C.\r\n', 'vSOObj', 'HSCpuf'),
(7, 'Full moon harvest', 6, '1ud1nmPnmW.JPG', '3.51', '', '', '', '', '', '', 'GONaO', '', 'wPgbPv', '', 'product', 'Made from pear and berry fruits.\r\nKeeps you mentally Sharp\r\nRich in fiber.\r\nrich in vitamin C \r\n', '0rhMcO', 'Fw4ffb'),
(8, 'Secrets of the valley', 0, '5UYnADBbAs.JPG', '3.51', '', '', '', '', '', '', 'fveVv', '', 'u0rh a', '', 'product', '', '0ubFEj', 'ffPjCj'),
(9, 'Soy souce', 4, 'j90wnAdadk.jpg', '2.92', '', '', '', '', '', '', 'VE0rg', '', 'e4BHyB', 'Naturally blewed. Reduce brain fog and boosts energy level.  stabilize blood sugar levels. Lowers cholesterol levels. a flavor enhancer for all types of dishes.', 'product', '', '8VrMKb', '0cE3P7'),
(10, 'Olive oil', 4, 'uEpnlpyYAn.jpg', '5.26', '', '', '', '', '', '', 'raHw8', '', 'FvycBc', '', 'product', 'Refined olive oil, cholesterol free, cant cause heart disease, \r\n \r\n', '4FOeFj', 'kKuuiF'),
(11, 'Nutella', 4, 'tuN6JY5c9P.jpg', '3.51', '', '', '', '', '', '', 'giuei', '', 'hkcu3N', '', 'product', '', '2OOHri', 'fOuHbe'),
(12, 'bombo', 5, 'rtDpEQsYWE.JPG', '1', '', '', '', '', '', '', 'P8uOS', '', '3ygOjk', '', 'product', '', ' fhN3r', '3lJjik'),
(13, 'bombo', 5, 'cFc3E0nrz0.JPG', '1', '', '', '', '', '', '', 'ghHii', '', 'hChu22', '', 'product', '', '0uHhFu', 'rK0icS'),
(14, 'bombo', 5, 'EprkxkYbtb.JPG', '1', '', '', '', '', '', '', 'pnrGH', '', 'Jffc4O', '', 'product', '', 'C07NOO', 'HjKuJF'),
(15, 'bombo', 5, 'T4YY0lFLvh.JPG', '1', '', '', '', '', '', '', '7Eue8', '', 'fv32GJ', '', 'product', '', 'rF2feb', 'jScOFc'),
(16, 'Nescafe', 6, 'uboSBzCc3T.JPG', '7.61', '', '', '', '', '', '', 'fVu74', '', 'kwM0va', '', 'product', 'boosts energy as it contains carbohydrates. \r\nGood for your heart health and may also help to lower your risk of infections and some\r\n forms of cancer.\r\nYou are exposed to free radicals. this protects the body from damage caused by harmful molecules called free radicals\r\nbecause of antioxidant\r\n\r\n', 'FFVafO', '  yuff'),
(17, 'Sardine', 4, 'Yvaj96lfND.JPG', '2.92', '', '', '', '', '', '', 'yEFue', '', 'iukhc8', '', 'product', 'Keeps your skin and hair healthy and lowers bad cholesterol,\r\nReduce brain fog and stabilize your blood sugar level. \r\n', 'u   vy', '38FrjJ'),
(18, 'Maggi cube', 4, 'X9bT80APp3.JPG', '2', '', '', '', '', '', '', 'jlPjx', '', 'yvGfMp', '', 'product', 'Flavor enhancer for all purpose with great test,\r\n rich in carbohydrates, proteins, and fiber,\r\n', 'v JKuh', 'BOy2fl'),
(19, 'Crystal sun flower oil.', 0, 'kiwTgr3lX8.JPG', '9.95', '', '', '', '', '', '', 'pl8cF', '', '8eOypO', '', 'product', 'Crystal sun flower oil for cooking and frying. \r\nNo side effects in contrast, can help increase resistance against disease and help \r\nmaintain healthy immune function.\r\nHealthy for daily use as it contains no cholesterols.Protect against visual disturbance because of richness\r\n in vitamin A .Important for normal growth as it contains a right \r\nproportion of vitamin D.\r\n\r\n', 'rFNybG', 'BHhe4j'),
(20, 'Yonca sun flower oil', 3, 'IcArpfBrfs.JPG', '9.95', '', '', '', '', '', '', '2iFSF', '', 'jKejfH', '', 'product', '.Yonca sun flower oil. \r\n.Help you keep healthy skin and hair.Help in lowering bad cholesterol as it Contains fats\r\n that Make it possible to do so. It is also ideal forgiving you the energy you need and help \r\nYour body absorb vitamins.\r\n\r\n\r\n\r\n', '8vjPjG', 'yHerra'),
(21, 'Crystal soya bean oil', 3, 'L7WpeHiN7r.JPG', '9.95', '', '', '', '', '', '', 'iuB2V', '', 'p4pivr', '', 'product', '', 'SSpVkj', 'uaiSc '),
(22, 'Neo vegetable cooking oil', 3, 'qgFXa9JcVq.JPG', '9.95', '', '', '', '', '', '', 'rFCpx', '', 'w8Oxnl', '', 'product', '.Neo pure vegetable cooking oil.\r\n.Healthy for daily use\r\n.Cholesterols free.\r\n. use neo vegetable oil to ensure you are protected against\r\nSkin cancer.\r\n.has the ability to reduce \r\nEnvironmental damage on you air, improve vision as well \r\nbecause of vitamin E .\r\n', 'g7VcVC', 'JfggBv'),
(23, 'Jambo basmati rice', 3, 'Z5PJkVf57l.JPG', '11.7', '', '', '', '', '', '', 'ifwOa', '', 'vhuNiE', '', 'product', '.Jambo basmati rice\r\n.1/4 cup dry, yields Â¾ cup when cooked\r\n.Secured and trusted for family consumption.\r\n.helps in reducing weight.\r\n.gives energy to everyone who eat   Jambo basmati rice\r\n', 'nVhiFC', 'wgvKpr'),
(24, 'Nezo kitchen salt', 4, 'mfip11wW7P.JPG', '2.92', '', '', '', '', '', '', 'gMwVV', '', 'PjHgul', '', 'product', '. nezo kitchen salt\r\n.used for cooking various dishes like rice, vegetable or\r\n Meat\r\n. pure, soluble salt\r\nNote:Eating extremely high amounts of salt can be harmful, but eating too little may be just as bad for your health.  you can feel free to add salt during cooking or at the table in order to improve flavor.\r\nIf your doctor wants you to limit your intake,  Eating too much salt is claimed to raise blood pressure, thereby increasing the risk of heart disease\r\n', 'uFEBSh', 'i8POGu'),
(25, 'Mayonnaise ', 4, '3GvxDMxz4k.JPG', '2.92', '', '', '', '', '', '', 'phGcc', '', 'pipiEi', '', 'product', '\r\n. helps in reducing brain fog and boosting body energy \r\nLevel.\r\n. Keep your skin and hair healthy.\r\ntreatment of hair care on a wide scale. \r\nSoothens Respiratory Disorders and can also cure \r\nproblems related to the skin coz of lemon.\r\n\r\nIncredibly Nutritious.  prevent a type of anemia called megaloblastic anemia that makes people tired and weak,  Prevents Memory\r\n Loss Risk  , Boosts Mood and Helps the Nervous\r\n System to Properly Function, needed for healthy pregnancy\r\nbecause Of vitamin b12.\r\n', 'iHV3Sr', '8FhjK8'),
(26, 'Marilan classic maizena What Biscuit', 3, 'lYX33teQeu.JPG', '2.57', '', '', '', '', '', '', 'MnKuv', '', 'hOhkcv', '', 'product', 'haids vision health and offers glowing skin benefits. Prevents Childhood Asthma ,\r\nPrevents Breast Cancer.', 'KF4uuN', 'K8ewfP'),
(27, 'Marilan  salgadniho', 0, 'w64ybCy4GE.JPG', '2.57', '', '', '', '', '', '', 'cvOci', '', 'cwcijP', '', 'product', 'Contains sodium, , Carbohydrate, Dietary Fiber, \r\n Protein.\r\n', 'S87Npb', 'uiihO4'),
(28, 'MARILAN COOKIES CHOCOL CHIPS', 3, 'kCi87xf8p9.JPG', '2.57', '', '', '', '', '', '', 'wiEeh', '', 'FuxEHi', '', 'product', '', '3 4lBf', 'piCCHh'),
(29, 'Petit beurre ', 3, 'Wck4myMFsB.JPG', '2.57', '', '', '', '', '', '', 'i0xhi', '', 'lVkrui', '', 'product', '', 'ucPFuN', 'SGjjCu'),
(30, 'BISTELLA', 3, 'CDyXRb1diQ.JPG', '2.57', '', '', '', '', '', '', '2fuFr', '', 'ejEpcv', '', 'product', '', 'n 8jvi', 'Oy4gS8'),
(31, 'MARILAN BAUNY', 3, 'xeB19B4GFg.JPG', '2', '', '', '', '', '', '', '8JGay', '', 'k0FPgp', '', 'product', '', 'ajyEaM', 'beSuFB'),
(32, 'SPAGHETTI SANTA LUCIA', 3, 'u3EuDpGHvu.JPG', '1', '', '', '', '', '', '', 'xrffh', '', 'rPxh8B', '', 'product', 'Reduce brain fog, boosts energy level, \r\nstabilize blood sugar levels. cholesterol free.\r\nreduce brain fog, boosts energy level, \r\nstabilize blood sugar levels. Contains protein, \r\ncontains no salts so that can not increases blood pressure, \r\nwhich can lead to heart disease.\r\n', 'NFhB c', 'yBjbfb'),
(33, 'LINDA FULL CREAM milk', 7, 'up1Llps241.JPG', '35.71', '', '', '', '', '', '', 'iuVfi', '', 'BhHuCF', '', 'product', 'Help from maintain healthy teeth, bones, soft tissue,\r\nAnd skin. Protect your child against rickets., reduce brain fog, boosts energy level, provides the essential nutrients needed by the body for healthy development.\r\nstabilize blood sugar levels.\r\n', 'cMeiul', 'P4hpfP'),
(34, 'NIDO FULL CREAM milk', 7, 'asFzyhwj95.JPG', '35.71', '', '', '', '', '', '', 'kafKa', '', 'yrGOuM', '', 'product', 'Strong bones, good immune system, healthy growth.', 'yGfH4f', '0ShiGv'),
(35, 'bombo', 5, 'XigzxRU40c.JPG', '1', '', '', '', '', '', '', 'epeHc', '', 'NxOh0g', '', 'product', '', 'xPpVSi', 'VH8uah'),
(36, 'Fax bath soaps', 8, 'AgGT4n8szx.JPG', '1', '', '', '', '', '', '', ' OeuS', '', 'wF8cVi', '', 'product', '', 'GGufyC', 'fVeCV8'),
(37, 'Duru bath soap', 8, 'Dq3jfB2ewb.JPG', '1', '', '', '', '', '', '', '8GSr0', '', 'bpvvOO', '', 'product', '', 'vGO4pi', 'byc7Vp'),
(38, 'washing power soap', 8, '0Ei1iQIgUK.JPG', '1', '', '', '', '', '', '', 'genf2', '', 'gble0r', '', 'product', '', 'ggOgpw', '4uvuer'),
(39, ' Cleace washing liquid soap', 8, 'nEDtWaA99A.JPG', '1', '', '', '', '', '', '', '4h7Hn', '', 'h2lGHG', '', 'product', '', 'fhFiBB', 'fVhOPa'),
(40, 'Joby Kitchen cleaner', 8, 'ey554yp0Xf.JPG', '1', '', '', '', '', '', '', 'OuJGG', '', 'SCvkha', '', 'product', '', ' rEvhM', ' vinin'),
(41, 'Yonca ketchup', 4, 'qPi9kvvUgI.JPG', '1', '', '', '', '', '', '', 'hguOy', '', 'rnFNOB', '', 'product', '', 'ijJ7Jp', 'ruPrjF'),
(42, 'BARILLA PENNE RIGATE', 0, 'EyZRsO4Uhd.JPG', '1', '', '', '', '', '', '', 'jjjg0', '', 'bGuieG', '', 'product', '', 'xSffbx', 'hVpfFF'),
(43, 'Sedaap supreme noodles', 0, '89r3lp0xw9.JPG', '1', '', '', '', '', '', '', 'Vfhnk', '', 'ifPheb', '', 'product', '', 'Ffjeku', 'plrFGc'),
(44, ' Everyday tonijn', 4, 'xmJWbPd4W0.JPG', '1', '', '', '', '', '', '', '8Nx y', '', 'gfjFau', '', 'product', '', 'g SSyj', 'nKcfjP'),
(45, 'Macaroni santa lucia', 3, 'tudPQi6yhe.JPG', '1', '', '', '', '', '', '', 'CHvOn', '', 'nwjnyf', '', 'product', '', 'ucawra', 'h2Vgfu'),
(46, 'marilan cracker biscuit ', 3, 'mVdQs2wLfF.JPG', '1', '', '', '', '', '', '', 'Crujj', '', '2cPuuf', '', 'product', '', 'eprpjy', 'h3ivub'),
(47, 'MARILAN morango', 3, 'jiuqci67uB.JPG', '1', '', '', '', '', '', '', 'uGScB', '', 'kcFi8g', '', 'product', '', 'ncrfhw', 'NgJK8c');

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `id` int(11) NOT NULL,
  `size_type` text NOT NULL,
  `size_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`id`, `size_type`, `size_index`) VALUES
(3, 'Oir quantity', 'xvghvsdchg'),
(4, '', ''),
(5, 'Available weight', 'rbelCF'),
(6, 'Available variants', 'rFNybG'),
(7, 'Available variants', '8vjPjG'),
(8, 'Available variants', 'g7VcVC'),
(9, 'Available weight', 'nVhiFC'),
(10, 'Available colours', 'uFEBSh'),
(11, 'Available variants', 'iHV3Sr'),
(12, 'Available substitutes', 'ggOgpw'),
(13, 'Available variants', 'ucawra'),
(14, 'Available Variants', 'NFhB c');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(200) NOT NULL,
  `color_name` text NOT NULL,
  `color_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `color_name`, `color_index`) VALUES
(8, '#7388F7', 'abedbnscv'),
(9, '#99cc33', 'abedbnscv'),
(10, '#ee2f2f', 'abedbnscv'),
(11, 'red', 'PjHgul'),
(12, 'blue', 'PjHgul');

-- --------------------------------------------------------

--
-- Table structure for table `product_gift_box`
--

CREATE TABLE `product_gift_box` (
  `id` int(200) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `logo` text NOT NULL,
  `box_index` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_gift_box`
--

INSERT INTO `product_gift_box` (`id`, `name`, `description`, `price`, `logo`, `box_index`, `type`) VALUES
(31, 'Family', '', '8', '74d35a531e02659b1fe3a155a5757936.jpg', 'upOiHJhB', 'box'),
(32, 'Family', '', '22', '74d35a531e02659b1fe3a155a5757936.jpg', 'bFgyvfCr', 'box'),
(33, 'Petit frere', '', '25', 'e41677f274ff615ec28bdd7002a3bad7.jpg', ' cNgGGxc', 'box'),
(34, 'Family', '', '29', '74d35a531e02659b1fe3a155a5757936.jpg', 'i7fhjcpy', 'box'),
(35, 'Petit frere', '', '22', 'e41677f274ff615ec28bdd7002a3bad7.jpg', '2gOpfOh7', 'box'),
(36, 'Petit frere', '', '25.74', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'hf32phGg', 'box'),
(37, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'iehjv7g ', 'box'),
(38, 'Papa', '', '0', 'b5b579031f77cc5e2c89ca0b0355ad37.jpg', 'ggff bcO', 'box'),
(39, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'OPHkvcFk', 'box'),
(40, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'kGycVHax', 'box'),
(41, 'Petit frere', '', '18.72', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'SxbrfSbi', 'box'),
(42, 'Mama', '', '21.7854', '53dce1caae83f34850eac0b981c0defd.jpg', '7gbg4uey', 'box'),
(43, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'b8VgBilp', 'box'),
(44, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'jFS7GKGi', 'box'),
(45, 'Petit frere', '', '14.9058', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'jnHOh0nF', 'box'),
(46, 'Petite soeur', '', '25.2252', '8f6f4ff7e80245aef190e46565d03379.jpg', 'hfSVBnVc', 'box'),
(47, 'Mama', '', '32.1048', '53dce1caae83f34850eac0b981c0defd.jpg', 'g8nbVSvy', 'box'),
(48, 'Family', '', '28.665', '74d35a531e02659b1fe3a155a5757936.jpg', 'M4hhhbr2', 'box'),
(49, 'Petite soeur', '', '21.7854', '8f6f4ff7e80245aef190e46565d03379.jpg', 'hxryuBGF', 'box'),
(50, 'Petit frere', '', '18.3456', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'OfyfrHrv', 'box'),
(51, 'Mama', '', '18.3456', '53dce1caae83f34850eac0b981c0defd.jpg', 'FFeufp0G', 'box'),
(52, 'Papa', '', '14.9058', 'b5b579031f77cc5e2c89ca0b0355ad37.jpg', 'fyw HB08', 'box'),
(53, 'Mama', '', '14.9058', '53dce1caae83f34850eac0b981c0defd.jpg', 'l4iFcGuf', 'box'),
(54, 'Petite soeur', '', '18.3456', '8f6f4ff7e80245aef190e46565d03379.jpg', 'ibueb0Jf', 'box'),
(55, 'Mama', '', '18.3456', '53dce1caae83f34850eac0b981c0defd.jpg', 'nHVvP3fi', 'box'),
(56, 'Family', '', '18.3456', '74d35a531e02659b1fe3a155a5757936.jpg', '3OFf2S2f', 'box'),
(57, 'Petit frere', '', '18.3456', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'MvM8jOGb', 'box'),
(58, 'Papa', '', '18.3456', 'b5b579031f77cc5e2c89ca0b0355ad37.jpg', 'fGHruw4O', 'box'),
(59, 'Petit frere', '', '18.3456', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'bfPuO8fu', 'box'),
(60, 'Petite soeur', '', '18.3456', '8f6f4ff7e80245aef190e46565d03379.jpg', 'uxpuO4gG', 'box'),
(61, 'Mama', '', '14.9058', '53dce1caae83f34850eac0b981c0defd.jpg', 'ycHfapFM', 'box'),
(62, 'Petite soeur', '', '14.9058', '8f6f4ff7e80245aef190e46565d03379.jpg', '8eViJ8rv', 'box'),
(63, 'Petit frere', '', '14.9058', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'biOHwEir', 'box'),
(64, 'Family', '', '28.665', '74d35a531e02659b1fe3a155a5757936.jpg', 'iriuyOSf', 'box'),
(65, 'Petit frere', '', '6.8796', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'gnugFwfH', 'box'),
(66, 'Mama', '', '21.7854', '53dce1caae83f34850eac0b981c0defd.jpg', 'Fu PNSvv', 'box'),
(67, 'Petit frere', '', '25.2252', 'e41677f274ff615ec28bdd7002a3bad7.jpg', ' KufJfJ2', 'box'),
(68, 'Petit frere', '', '14.9058', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'rj2pGSaS', 'box'),
(69, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'hru4rj8p', 'box'),
(70, 'Petite soeur', '', '21.7854', '8f6f4ff7e80245aef190e46565d03379.jpg', 'h2Vpf4Kr', 'box'),
(71, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'cnjNfiec', 'box'),
(72, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'knblHF8a', 'box'),
(73, 'Petit frere', '', '14.9058', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'HhJ24PKS', 'box'),
(74, 'Mama', '', '18.3456', '53dce1caae83f34850eac0b981c0defd.jpg', 'bBhje8Ki', 'box'),
(75, 'Family', '', '14.9058', '74d35a531e02659b1fe3a155a5757936.jpg', 'piMHfpJu', 'box'),
(76, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'yOubC0eG', 'box'),
(77, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'viVf0 Fh', 'box'),
(78, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'OO8Cff0g', 'box'),
(79, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'GgeyGBkV', 'box'),
(80, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'uF2OBf0F', 'box'),
(81, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'vSp3NcrS', 'box'),
(82, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'ySxfukEj', 'box'),
(83, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'OCg32xOg', 'box'),
(84, 'Family', '', '22.9418', '74d35a531e02659b1fe3a155a5757936.jpg', 'vjGx7fhp', 'box'),
(85, 'Mama', '', '22.9418', '53dce1caae83f34850eac0b981c0defd.jpg', 'VBrOgpSO', 'box'),
(86, 'Family', '', '3.4398', '74d35a531e02659b1fe3a155a5757936.jpg', 'Mub4jrge', 'box'),
(87, 'Petit frere', '', '3.4398', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'yfgPF if', 'box'),
(88, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', 'fBFKKleO', 'box'),
(89, 'Petite soeur', '', '3.4398', '8f6f4ff7e80245aef190e46565d03379.jpg', ' ncghufr', 'box'),
(90, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', '4jhuNFav', 'box'),
(91, 'Petite soeur', '', '3.4398', '8f6f4ff7e80245aef190e46565d03379.jpg', 'V8lybk j', 'box'),
(92, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', 'GOeSh3MM', 'box'),
(93, 'Family', '', '3.4398', '74d35a531e02659b1fe3a155a5757936.jpg', 'pyGuhcVF', 'box'),
(94, 'Petite soeur', '', '3.4398', '8f6f4ff7e80245aef190e46565d03379.jpg', 'P4ky8OO2', 'box'),
(95, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', 'bb4xbhji', 'box'),
(96, 'Petite soeur', '', '3.4398', '8f6f4ff7e80245aef190e46565d03379.jpg', 'FHVaFuKu', 'box'),
(97, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', 'wbOfSSfh', 'box'),
(98, 'Petit frere', '', '3.4398', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'ufrhuBna', 'box'),
(99, 'Petite soeur', '', '3.4398', '8f6f4ff7e80245aef190e46565d03379.jpg', 'uOvrMFru', 'box'),
(100, 'Mama', '', '22.9418', '53dce1caae83f34850eac0b981c0defd.jpg', 'cOeHbCuk', 'box'),
(101, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'fJiHhiGV', 'box'),
(102, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'jKFPnHBv', 'box'),
(103, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'xSiiF3Oi', 'box'),
(104, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'rhf3wVO8', 'box'),
(105, 'Family', '', '0', '74d35a531e02659b1fe3a155a5757936.jpg', 'jkxufHFu', 'box'),
(106, 'Petit frere', '', '0', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'a8OffwbF', 'box'),
(107, 'Mama', '', '0', '53dce1caae83f34850eac0b981c0defd.jpg', 'ff8Fig4x', 'box'),
(108, 'Petite soeur', '', '0', '8f6f4ff7e80245aef190e46565d03379.jpg', 'ynngS7uj', 'box'),
(109, 'Family', '', '3.4398', '74d35a531e02659b1fe3a155a5757936.jpg', 'lVFOegbu', 'box'),
(110, 'Petit frere', '', '32.6928', 'e41677f274ff615ec28bdd7002a3bad7.jpg', 'a0wEOckF', 'box'),
(111, 'Mama', '', '3.4398', '53dce1caae83f34850eac0b981c0defd.jpg', 'g0 ey0CO', 'box'),
(112, 'Family', '', '22.9418', '74d35a531e02659b1fe3a155a5757936.jpg', 'HubrcwFO', 'box');

-- --------------------------------------------------------

--
-- Table structure for table `product_of_gift`
--

CREATE TABLE `product_of_gift` (
  `id` int(11) NOT NULL,
  `gift_index` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_of_gift`
--

INSERT INTO `product_of_gift` (`id`, `gift_index`, `product_id`) VALUES
(38, 'upOiHJhB', 13),
(39, 'upOiHJhB', 14),
(40, 'upOiHJhB', 15),
(41, 'upOiHJhB', 18),
(42, 'upOiHJhB', 31),
(43, 'upOiHJhB', 32),
(44, 'bFgyvfCr', 1),
(45, 'bFgyvfCr', 2),
(46, 'bFgyvfCr', 3),
(47, 'bFgyvfCr', 4),
(48, ' cNgGGxc', 1),
(49, ' cNgGGxc', 2),
(50, ' cNgGGxc', 3),
(51, ' cNgGGxc', 4),
(52, ' cNgGGxc', 5),
(53, 'i7fhjcpy', 1),
(54, 'i7fhjcpy', 2),
(55, 'i7fhjcpy', 3),
(56, 'i7fhjcpy', 4),
(57, 'i7fhjcpy', 5),
(58, 'i7fhjcpy', 6),
(59, '2gOpfOh7', 1),
(60, '2gOpfOh7', 2),
(61, '2gOpfOh7', 3),
(62, '2gOpfOh7', 4),
(63, 'hf32phGg', 1),
(64, 'hf32phGg', 2),
(65, 'hf32phGg', 3),
(66, 'hf32phGg', 4),
(67, 'hf32phGg', 5),
(68, 'SxbrfSbi', 1),
(69, 'SxbrfSbi', 2),
(70, 'SxbrfSbi', 3),
(71, '7gbg4uey', 1),
(72, '7gbg4uey', 2),
(73, '7gbg4uey', 3),
(74, '7gbg4uey', 4),
(75, 'jnHOh0nF', 1),
(76, 'jnHOh0nF', 2),
(77, 'hfSVBnVc', 1),
(78, 'hfSVBnVc', 2),
(79, 'hfSVBnVc', 3),
(80, 'hfSVBnVc', 4),
(81, 'hfSVBnVc', 5),
(82, 'g8nbVSvy', 1),
(83, 'g8nbVSvy', 2),
(84, 'g8nbVSvy', 3),
(85, 'g8nbVSvy', 4),
(86, 'g8nbVSvy', 5),
(87, 'g8nbVSvy', 6),
(88, 'g8nbVSvy', 7),
(89, 'M4hhhbr2', 1),
(90, 'M4hhhbr2', 2),
(91, 'M4hhhbr2', 3),
(92, 'M4hhhbr2', 4),
(93, 'M4hhhbr2', 5),
(94, 'M4hhhbr2', 6),
(95, 'hxryuBGF', 1),
(96, 'hxryuBGF', 2),
(97, 'hxryuBGF', 3),
(98, 'hxryuBGF', 4),
(99, 'OfyfrHrv', 1),
(100, 'OfyfrHrv', 2),
(101, 'OfyfrHrv', 3),
(102, 'FFeufp0G', 1),
(103, 'FFeufp0G', 2),
(104, 'FFeufp0G', 3),
(105, 'fyw HB08', 1),
(106, 'fyw HB08', 2),
(107, 'l4iFcGuf', 1),
(108, 'l4iFcGuf', 2),
(109, 'ibueb0Jf', 1),
(110, 'ibueb0Jf', 2),
(111, 'ibueb0Jf', 3),
(112, 'nHVvP3fi', 1),
(113, 'nHVvP3fi', 2),
(114, 'nHVvP3fi', 3),
(115, '3OFf2S2f', 1),
(116, '3OFf2S2f', 2),
(117, '3OFf2S2f', 3),
(118, 'MvM8jOGb', 1),
(119, 'MvM8jOGb', 4),
(120, 'MvM8jOGb', 5),
(121, 'fGHruw4O', 1),
(122, 'fGHruw4O', 2),
(123, 'fGHruw4O', 3),
(124, 'bfPuO8fu', 1),
(125, 'bfPuO8fu', 2),
(126, 'bfPuO8fu', 3),
(127, 'uxpuO4gG', 1),
(128, 'uxpuO4gG', 2),
(129, 'uxpuO4gG', 3),
(130, 'ycHfapFM', 1),
(131, 'ycHfapFM', 2),
(132, '8eViJ8rv', 1),
(133, '8eViJ8rv', 2),
(134, 'biOHwEir', 1),
(137, 'iriuyOSf', 2),
(138, 'iriuyOSf', 3),
(139, 'iriuyOSf', 4),
(140, 'iriuyOSf', 5),
(141, 'iriuyOSf', 6),
(143, 'gnugFwfH', 5),
(144, 'gnugFwfH', 3),
(146, 'Fu PNSvv', 1),
(147, 'Fu PNSvv', 2),
(148, 'Fu PNSvv', 3),
(149, 'Fu PNSvv', 4),
(150, ' KufJfJ2', 1),
(151, ' KufJfJ2', 2),
(152, ' KufJfJ2', 3),
(153, ' KufJfJ2', 4),
(154, ' KufJfJ2', 5),
(155, 'rj2pGSaS', 1),
(156, 'rj2pGSaS', 2),
(157, 'h2Vpf4Kr', 1),
(158, 'h2Vpf4Kr', 2),
(159, 'h2Vpf4Kr', 3),
(160, 'h2Vpf4Kr', 4),
(161, 'HhJ24PKS', 1),
(162, 'HhJ24PKS', 2),
(163, 'bBhje8Ki', 1),
(164, 'bBhje8Ki', 2),
(165, 'bBhje8Ki', 4),
(166, 'piMHfpJu', 1),
(167, 'piMHfpJu', 2),
(168, 'vjGx7fhp', 2),
(169, 'vjGx7fhp', 20),
(170, 'vjGx7fhp', 21),
(171, 'VBrOgpSO', 2),
(172, 'VBrOgpSO', 20),
(173, 'VBrOgpSO', 21),
(174, 'Mub4jrge', 2),
(175, 'yfgPF if', 2),
(176, 'fBFKKleO', 2),
(177, ' ncghufr', 2),
(178, '4jhuNFav', 2),
(179, 'V8lybk j', 2),
(180, 'GOeSh3MM', 2),
(181, 'pyGuhcVF', 2),
(182, 'P4ky8OO2', 2),
(183, 'bb4xbhji', 2),
(184, 'FHVaFuKu', 2),
(185, 'wbOfSSfh', 2),
(186, 'ufrhuBna', 2),
(187, 'uOvrMFru', 2),
(188, 'cOeHbCuk', 2),
(189, 'cOeHbCuk', 20),
(190, 'cOeHbCuk', 21),
(191, 'lVFOegbu', 2),
(192, 'a0wEOckF', 2),
(193, 'a0wEOckF', 20),
(194, 'a0wEOckF', 21),
(195, 'a0wEOckF', 22),
(196, 'g0 ey0CO', 2),
(197, 'HubrcwFO', 2),
(198, 'HubrcwFO', 20),
(199, 'HubrcwFO', 21);

-- --------------------------------------------------------

--
-- Table structure for table `product_size_item`
--

CREATE TABLE `product_size_item` (
  `id` int(11) NOT NULL,
  `size_name` text NOT NULL,
  `size_index` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size_item`
--

INSERT INTO `product_size_item` (`id`, `size_name`, `size_index`, `price`) VALUES
(8, '1 litre', 'xvghvsdchg', '1000'),
(9, '2 litre', 'xvghvsdchg', '2000'),
(10, '5 kg', 'rbelCF', '11.7'),
(12, '1kg', 'rbelCF', '2.34'),
(13, 'made from apple, orange, lemon and  Grape fruits.', 'HCuf  ', '3.51'),
(14, '50 g', 'FFVafO', '7.025'),
(15, '100 g', 'FFVafO', '7.025'),
(16, '200 g', 'FFVafO', '7.025'),
(17, '5 l', 'rFNybG', '9.95'),
(18, '1 l', 'rFNybG', '1.99'),
(19, '5 l', '8vjPjG', '9.95'),
(20, '3 l', '8vjPjG', '3.31'),
(21, '1 l', '8vjPjG', '1.99'),
(22, '5 l', 'g7VcVC', '9.95'),
(23, '1 l', 'g7VcVC', '1.99'),
(24, '10 kg', 'nVhiFC', '11.7'),
(25, '5 kg', 'nVhiFC', '11'),
(26, '2 kg', 'nVhiFC', '11.7'),
(27, '1kg', 'nVhiFC', '11.7'),
(28, 'Everyday lemon', 'iHV3Sr', '2.92'),
(29, 'everyday egg', 'iHV3Sr', '2.92'),
(30, 'Magic', 'ggOgpw', '1'),
(31, 'blue bleeze', 'ggOgpw', '1'),
(32, 'Selva fusilli macaroni', 'ucawra', '1'),
(33, 'Selva pipe rigate macaroni', 'ucawra', '1'),
(34, 'SPAGHETTI SANTA LUCIA', 'NFhB c', '1'),
(35, 'SPAGHETTI Salva', 'NFhB c', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_to_deliver`
--

CREATE TABLE `product_to_deliver` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` text NOT NULL,
  `derivery_index` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_to_deliver`
--

INSERT INTO `product_to_deliver` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `type`, `derivery_index`) VALUES
(1, 2, 0, 0, 1, 'product', 'rpjxp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_information`
--
ALTER TABLE `client_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_article`
--
ALTER TABLE `mvc_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_author`
--
ALTER TABLE `mvc_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_blog`
--
ALTER TABLE `mvc_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_category`
--
ALTER TABLE `mvc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_comment`
--
ALTER TABLE `mvc_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_dev_option`
--
ALTER TABLE `mvc_dev_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_images`
--
ALTER TABLE `mvc_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_image_folder`
--
ALTER TABLE `mvc_image_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_main_site_content`
--
ALTER TABLE `mvc_main_site_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_message`
--
ALTER TABLE `mvc_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_section`
--
ALTER TABLE `mvc_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_setting_login`
--
ALTER TABLE `mvc_setting_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_site_accounts`
--
ALTER TABLE `mvc_site_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_status`
--
ALTER TABLE `mvc_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mvc_team`
--
ALTER TABLE `mvc_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gift_box`
--
ALTER TABLE `product_gift_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_of_gift`
--
ALTER TABLE `product_of_gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size_item`
--
ALTER TABLE `product_size_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_to_deliver`
--
ALTER TABLE `product_to_deliver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_information`
--
ALTER TABLE `client_information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc_article`
--
ALTER TABLE `mvc_article`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mvc_author`
--
ALTER TABLE `mvc_author`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc_blog`
--
ALTER TABLE `mvc_blog`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mvc_category`
--
ALTER TABLE `mvc_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mvc_comment`
--
ALTER TABLE `mvc_comment`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mvc_dev_option`
--
ALTER TABLE `mvc_dev_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc_images`
--
ALTER TABLE `mvc_images`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `mvc_image_folder`
--
ALTER TABLE `mvc_image_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mvc_main_site_content`
--
ALTER TABLE `mvc_main_site_content`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mvc_message`
--
ALTER TABLE `mvc_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mvc_section`
--
ALTER TABLE `mvc_section`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mvc_setting_login`
--
ALTER TABLE `mvc_setting_login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc_site_accounts`
--
ALTER TABLE `mvc_site_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc_status`
--
ALTER TABLE `mvc_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mvc_team`
--
ALTER TABLE `mvc_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_gift_box`
--
ALTER TABLE `product_gift_box`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product_of_gift`
--
ALTER TABLE `product_of_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `product_size_item`
--
ALTER TABLE `product_size_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_to_deliver`
--
ALTER TABLE `product_to_deliver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
