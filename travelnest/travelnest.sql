-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'raxit', '2704'),
(2, 'divya', '8704');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `total_amount` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `hotel_name`, `room_no`, `username`, `email`, `checkin`, `checkout`, `adult`, `children`, `total_amount`) VALUES
(1, 'Taj Skyline, Ahmedabad', '101', 'raxit gonda ', 'gondaliyarakshit@gmail.com', '2024-04-12', '2024-04-13', 2, 0, ''),
(2, 'De Glance Hotel', '101', 'raxit gonda ', 'gondaliyarakshit@gmail.com', '2024-04-05', '2024-04-06', 2, 0, '6590');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `img`, `caption`) VALUES
(1, 'Ahemdabad', 'https://ngs-space1.sgp1.digitaloceanspaces.com/am/uploads/mediaGallery/image/1658653042367.jpg-org', ''),
(2, 'Delhi', 'https://cf.bstatic.com/xdata/images/city/600x600/684765.jpg?k=3f7d20034c13ac7686520ac1ccf1621337a1e59860abfd9cbd96f8d66b4fc138&o=', ''),
(3, 'Chennai', 'https://cf.bstatic.com/xdata/images/city/600x600/684730.jpg?k=e37b93d88c1fe12e827f10c9d6909a1def7349be2c68df5de885deaa4bc01ee3&o=', ''),
(4, 'Mumbai', 'https://cf.bstatic.com/xdata/images/city/600x600/971346.jpg?k=40eeb583a755f2835f4dcb6900cdeba2a46dc9d50e64f2aa04206f5f6fce5671&o=', ''),
(5, 'Pune', 'https://th.bing.com/th?q=Pune+City+Centre&w=120&h=120&c=1&rs=1&qlt=90&cb=1&dpr=1.3&pid=InlineBlock&mkt=en-IN&cc=IN&setlang=en&adlt=moderate&t=1&mw=247', ''),
(6, 'Udaipur', 'https://th.bing.com/th/id/OIP.RbTpsqC0cWpp6MmbZDgT7gHaD4?w=331&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(7, 'kolkata', 'https://th.bing.com/th/id/OIP.eB90vt_0TsDTQ-A4s2a2qQHaEh?rs=1&pid=ImgDetMain', ''),
(8, 'Bangalore', 'https://th.bing.com/th/id/OIP.V0_H0h8OJYviu_sOeQIvlAHaEK?w=315&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(9, 'Indore', 'https://th.bing.com/th/id/OIP.xWwU46nb5yZJ06NWDEtfVwHaEK?w=321&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(10, 'Hyderabad', 'https://th.bing.com/th/id/OIP.7IrJMGZmyQZaalL-laIdNwHaE5?w=277&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(11, 'Goa', 'https://th.bing.com/th/id/OIP.POcPoo_vRZFzJW-wQAmXeQHaEo?w=338&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(12, 'Manali', 'https://th.bing.com/th/id/OIP.CEOrYB4Ry3d5MkMC32ONPwHaFj?w=251&h=188&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(13, 'Jaipur', 'https://th.bing.com/th/id/OIP.idBbkSkH4nXVIhDbA5QBEwHaE8?w=252&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(14, 'Majuli', 'https://th.bing.com/th/id/OIP.ZPc4DiDYrvUNGpZIDw642AHaEK?w=344&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', ''),
(15, 'Surat', 'https://th.bing.com/th/id/OIP.aOHSU-FukU_JU_8UUWRg5AHaDt?w=297&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_list`
--

CREATE TABLE `hotel_list` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_img` varchar(500) NOT NULL,
  `address` varchar(200) NOT NULL,
  `location` varchar(2000) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`id`, `hotel_name`, `hotel_img`, `address`, `location`, `room_price`, `city_id`) VALUES
(1, 'Taj Skyline, Ahmedabad', 'https://img.easemytrip.com/EMTHotel-1845551/72/a/l/2139917/133908344_P.jpg', 'Sankalp Square Iii Opp Saket 3 Nr. Nilkanth Green Sindhubhavan Road Shilaj,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.44463898169!2d72.47970237521231!3d23.044154879158597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b6318e8da91%3A0x864bb42461cc953f!2sTaj%20Skyline%2C%20Ahmedabad!5e0!3m2!1sen!2sin!4v1711796413049!5m2!1sen!2sin', '7,250', 1),
(2, 'Ebony Residency', 'https://media.easemytrip.com/media/Hotel/SHL-19052146671493/Common/CommonOVG1OC.jpg', 'Sarkhej - Gandhinagar Hwy Behind Apex Heart Institute Near Gurudwara West End Park Thaltej Ahmedabad Gujarat 380054', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.4124081815744!2d72.51072107521226!3d23.045337279157827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b518b56d721%3A0x1e4af61c7bb30ae9!2sEbony%20Residency%20Ahmedabad!5e0!3m2!1sen!2sin!4v1711799551600!5m2!1sen!2sin', '2,553', 1),
(3, 'Lvh Om Sanctuary Palace Resort', 'http://media.easemytrip.com/media/Hotel/SHL-22122847153062/Common/CommonInXhk6.jpg', 'Lvh Om Sanctuary Palace Aniyari Village Sanand - Nalsarovar Rd Nalsarovar Vekariya Gujarat 382110', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.17502827851!2d72.08198097520585!3d22.83301307930708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395eb116b63beb75%3A0xc2159096d6219644!2sLVH%20Om%20Sanctuary%20Resort!5e0!3m2!1sen!2sin!4v1711800835768!5m2!1sen!2sin', '2,614', 1),
(4, 'Hotel El Dorado', 'https://media.easemytrip.com/media/Hotel/SHL-19101527189986/Common/Common5fWwOr.JPG', 'Opp Shree Krishna Shopping Center,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10845.067136902004!2d72.5567936176203!3d23.033014576098044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f676adbfa9%3A0xa1ea5a2f9290ffa6!2sHotel%20Eldorado!5e0!3m2!1sen!2sin!4v1711802153435!5m2!1sen!2sin', '2,805', 1),
(5, 'Keys Select By Lemon Tree Hotels, Gandhi Ashram, Ahmedabad', 'http://media.easemytrip.com/media/Hotel/SHL-22041508959055/Common/Commonha8lqE.jpg', 'Between Gandhi Ashram And Rto Circle,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.920863885721!2d72.57930487521284!3d23.063362679145197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e85f764f994e5%3A0xa2f286ed7b15705c!2sKeys%20Select%20by%20Lemon%20Tree%20Hotels%2C%20Gandhi%20Ashram%2C%20Ahmedabad!5e0!3m2!1sen!2sin!4v1711802545783!5m2!1sen!2sin', '3,096', 1),
(6, 'Hotel Ajanta', 'https://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/Common8SHcYo.jpg', '36 Arakashan Rd Ram Nagar Paharganj New Delhi Delhi 110055', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.4655158973123!2d77.21332527540382!3d28.64577697565754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd3f8c9b967d%3A0x1fcd0b2c268cc8d2!2sHotel%20Ajanta!5e0!3m2!1sen!2sin!4v1711803116935!5m2!1sen!2sin', '2,542', 2),
(7, 'The Grand Uddhav', 'http://media.easemytrip.com/media/Hotel/SHL-22083174581486/Common/CommonSKdDrW.jpg', '4953-54 Ramdwara Rd Bagichi Ramchander Nehru Bazar Paharganj New Delhi Delhi 110055', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.6535607921064!2d77.21066887540358!3d28.640143475660558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfde1d4931833%3A0xc56eca301aae5153!2sThe%20Grand%20Uddhav!5e0!3m2!1sen!2sin!4v1711803448676!5m2!1sen!2sin', '2,234', 2),
(8, 'Hotel Green Castle Heritage Hotel', 'https://media.easemytrip.com/media/Hotel/SHL-2402261933603283/Common/Commonk2VCRy.png', '1418 To 1427, Lothian Rd, Inter State Bus Terminal, Kashmere Gate, Delhi, 110006', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.7852074813763!2d77.22695707540463!3d28.666149375646388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd08944e7641%3A0x7938ab6a88dadf1a!2sHotel%20Green%20Castle%20(Heritage%20Hotel%20overlooking%20two%20protected%20monuments)!5e0!3m2!1sen!2sin!4v1711803855009!5m2!1sen!2sin', '2,482', 2),
(9, 'Hotel Tavisha Villa Golf Course Road', 'http://media.easemytrip.com/media/Hotel/SHL-21101115884007/Common/CommonJhxI1Q.png', '18, H-34 Rd, Block H, Dlf Phase 1, Sector 26, Gurugram, Haryana 122002', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.016153306676!2d77.09229357539756!3d28.479060175748916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d192930a9bc87%3A0xf401eedf6a99da6b!2sTavisha%20Villa%20Golf%20Course%20Road%20MG%20road%20Gurgaon!5e0!3m2!1sen!2sin!4v1711804356701!5m2!1sen!2sin', '3,080', 2),
(10, 'Hotel Golf View Suites', 'http://media.easemytrip.com/media/Hotel/SHL-1902266872701/Common/CommonBIaZ7A.png', 'Plot 136O, 60, Golf Course Rd, A Block, Dlf Phase 1, Sector 43, Gurugram, Haryana 122001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.786041406343!2d77.09355187539671!3d28.455865475761733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19883b9572db%3A0x7880288774c843f2!2sHotel%20Golf%20View%20Suites!5e0!3m2!1sen!2sin!4v1711804648661!5m2!1sen!2sin', '3,372', 2),
(11, 'Ambassador Pallava', 'https://media.easemytrip.com/media/Hotel/SHL-1908538819480/External/ExternalWfLf8i.jpg', '30 Montieth Road', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.504879634689!2d80.25588007496997!3d13.06715698725704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526613b3dcb8cb%3A0x25bf9575fbd177a8!2sAmbassador%20Pallava%20Chennai!5e0!3m2!1sen!2sin!4v1711805175375!5m2!1sen!2sin', '4,600', 3),
(12, 'The Pride Hotel Chennai', 'http://media.easemytrip.com/media/Hotel/SHL-1911655023703/Common/CommonWQocHW.jpg', '216 Evr Periyar Salai,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.31701567636!2d80.24644737497013!3d13.07908398724631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526675d685cb73%3A0xe126b38b5a14056f!2sThe%20Pride%20Hotel%2C%20Chennai!5e0!3m2!1sen!2sin!4v1711806367021!5m2!1sen!2sin', '3,208', 3),
(13, 'Mango Hill Central Chennai', 'http://media.easemytrip.com/media/Hotel/SHL-2310101689381788/Common/Common4ENFUG.jpg', '3 Thirumalai Pillai Rd Opposite Vidyodaya Schools Darmapuram T. Nagar Chennai Tamil Nadu 600017', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.74642607942!2d80.23788667496962!3d13.051806087270986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267a4fd087e8f%3A0x7b156ffd2341913f!2sMango%20Hill%20Central%20Chennai!5e0!3m2!1sen!2sin!4v1711806620364!5m2!1sen!2sin', '2,803', 3),
(14, 'Hotel Star City', 'http://media.easemytrip.com/media/Hotel/SHL-231213194880665/Common/CommonemBKwt.jpg', '39 Bazullah Road, T - Nagar, 600017 Chennai, India', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.821943991938!2d80.23235837496959!3d13.047003087275321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526655dc42f159%3A0x14b31fca6e3e4c50!2sSTAR%20CITY%20HOTELS!5e0!3m2!1sen!2sin!4v1711806797794!5m2!1sen!2sin', '3,888', 3),
(15, 'The Resort Mumbai', 'https://img.easemytrip.com/EMTHotel-993065/8/m/l/420487_0.jpg', 'Aksa Beach, 11, Madh - Marve Rd, Dharvali, Aksa Gaon, Malad West, Mumbai, Maharashtra', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30147.77617904481!2d72.75857667431639!3d19.174575100000023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b4052110bc3b%3A0x696168edcf6fef4!2sThe%20Resort!5e0!3m2!1sen!2sin!4v1711807138979!5m2!1sen!2sin', '6,675', 4),
(16, 'Diamond Hotel', 'https://img.easemytrip.com/EMTHOTEL-4493264/70/23/na/s/53611774_0.jpg', 'Plot No.22,Bunglow No.22, S V Patel Nagar, Mhada, Versova Village, Andheri West, Mumbai, Mumbai Suburban, Maharashtra, 400058, Mumbai, India', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120591.11901079061!2d72.69677447290327!3d19.17455556892916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b77921f5f27f%3A0x4ab22e0e0ca68057!2sDIAMOND%20HOTEL!5e0!3m2!1sen!2sin!4v1711807638941!5m2!1sen!2sin', '3,420', 4),
(17, 'Hotel Mumbai House Juhu', 'https://img.easemytrip.com/EMTHotel-3210073/32/na/l/76570823_0.jpg', 'Juhu Tara Rd', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.490850051587!2d72.82538577510071!3d19.086110782120542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9acc5e1839f%3A0x748c8dec205dee43!2sHotel%20Mumbai%20House%20Juhu%20(Hotel%20%2B%20Banquet)!5e0!3m2!1sen!2sin!4v1711807912327!5m2!1sen!2sin', '3,824', 4),
(18, 'Hotel Ozone Inn', 'https://img.easemytrip.com/EMTHOTEL-3875988/70/23/l/s/41597257_0.jpg', 'Nathalal Parekh Marg, Wodehouse Rd', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.4163818577167!2d72.81939467509628!3d18.912955182258266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d100f6d016d7%3A0xd7b9d097647e6270!2sHotel%20Ozone%20Inn%20%7C%20Mumbai!5e0!3m2!1sen!2sin!4v1711808211031!5m2!1sen!2sin', '3,957', 4),
(19, 'The Orchid Hotel Pune Hinjewadi', 'https://img.easemytrip.com/EMTHotel-159195/8/g/l/576359_1.jpg', 'Adjacent To Chattrapati,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.09351260911!2d73.76199137508758!3d18.569822382533346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b94cf570f5c7%3A0xddf5a0f6e9e457b8!2sThe%20Orchid%20Hotel%20Pune!5e0!3m2!1sen!2sin!4v1711809245790!5m2!1sen!2sin', '5,499', 5),
(20, 'Ramee Grand Hotel And Spa, Pune', 'http://media.easemytrip.com/media/Hotel/SHL-230828779938560/Common/Common4hPzSf.jpg', 'Plot No. 587/3,,', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3783.1881904005904!2d73.8409011!3d18.520396!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c19086ab5ac7%3A0xefed6582a45cece2!2sRamee%20Grand%20Hotel%20and%20Spa%2C%20Pune!5e0!3m2!1sen!2sin!4v1711815889250!5m2!1sen!2sin', '5,560', 5),
(21, 'St Laurn Koregaon Park Pune', 'https://media.easemytrip.com/media/Hotel/SHL-1903871756626/External/External9ixBFs.jpg', '15 A Koregaon Park Road', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.7858739474577!2d73.88334427508681!3d18.538575982558434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c0fc2b2b56db%3A0x76b21edc396aa13!2sSt%20Laurn%20Hotel!5e0!3m2!1sen!2sin!4v1711816484561!5m2!1sen!2sin', '3,457', 5),
(22, 'Lemon Tree Premier, City Centre, Pune', 'https://img.easemytrip.com/EMTHOTEL-1515191/72/a/l/2093524/101668155_P.jpg', 'City Center, 15 & 15A, Connaught Rd, Modi Colony, Pune, Maharashtra 411001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.022733754465!2d73.8740050750865!3d18.527874782567093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c059dafb7ac5%3A0xf660a3faf554f88e!2sLemon%20Tree%20Premier%20Pune!5e0!3m2!1sen!2sin!4v1711816729521!5m2!1sen!2sin', '3,255', 5),
(23, 'Monarch Montvert Baner', 'https://media.easemytrip.com/media/Hotel/SHL-21012370466019/Common/CommonUtQVOD.jpg', 'Lane, Opposite To Vadeshwar Restaurant, Riviresa Society, Baner, Pune, Maharashtra 411045', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.367219995582!2d73.79336187508729!3d18.557475982543302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf037cf5a5f9%3A0x90140a3f60ddfe6a!2sMonarch%20Montvert!5e0!3m2!1sen!2sin!4v1711817012063!5m2!1sen!2sin', '2,992', 5),
(24, 'Hotel Sarovar On Lake Pichola', 'http://media.easemytrip.com/media/Hotel/SHL-22022138294314/Common/CommonYPc1DM.jpg', 'Outside Chandpole Hanuman Ghat Pichola Udaipur Rajasthan 313001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799704.241826078!2d71.07911230500328!3d21.56058853705962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e5664d4000bd%3A0x4f48a3e377894be9!2sHotel%20Sarovar%20-%20A%20Boutique%20Lake%20Facing%20Hotel%20On%20Lake%20Pichola!5e0!3m2!1sen!2sin!4v1711817579933!5m2!1sen!2sin', '1,991', 6),
(25, 'Kaner Bagh A Heritage Boutique Hotel', 'http://media.easemytrip.com/media/Hotel/SHL-19102214922483/Common/CommonL0aUfq.jpg', '11D, Near Allahabad Bank , Sahelion Ki Bari Link Road, Sukhadia Cir, Udaipur, Rajasthan 313001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3627.6420375149182!2d73.68556547526158!3d24.60154707809925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e51047f49a6b%3A0xbe52e81882f30abb!2sKaner%20Bagh%20-%20A%20Heritage%20Boutique%20Hotel%20%26%20Restaurant!5e0!3m2!1sen!2sin!4v1711817800793!5m2!1sen!2sin', '2,958', 6),
(26, 'Ramee Royal Resorts And Spa - Udaipur', 'http://media.easemytrip.com/media/Hotel/SHL-22092486350737/Common/CommonbIiwfr.jpg', 'Near Iim, Balicha,Udaipur - Ahmedabad Highway,Nh 8, Udaipur, Rajasthan 313002', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3630.750114491723!2d73.65165707525821!3d24.49411357817014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e55b4c3aa529%3A0x28dd7496393da622!2sRamee%20Royal%20Resorts%20%26%20Spa%20Udaipur%20%7C%20Pure%20Veg%20Wedding%20Resort!5e0!3m2!1sen!2sin!4v1711818069427!5m2!1sen!2sin', '3,402', 6),
(27, 'Sterling Jaisinghgarh Udaipur', 'http://media.easemytrip.com/media/Hotel/SHL-2312021967328136/Common/CommonElnzQ1.jpg', '3, Trident Rd, Haridas Ji Ki Magri, Shavri Colony, Udaipur, Rajasthan 313001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3628.2747073203245!2d73.66742807526087!3d24.57971397811371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e55b46d84c75%3A0xaceaa213bdc9477e!2sSterling%20Jaisinghgarh%20-%20Udaipur!5e0!3m2!1sen!2sin!4v1711818395585!5m2!1sen!2sin', '4,639', 6),
(28, 'The Lalit Great Eastern Kolkata', 'https://img.easemytrip.com/EMTHOTEL-19607/8/m/l/788847_0.jpg', '1,2, 3, Old Court House Street', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.292681513081!2d88.34730107519779!3d22.568154179494933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277a695a0da53%3A0x122a931b2e38319f!2sThe%20LaLiT%20Great%20Eastern%20Kolkata!5e0!3m2!1sen!2sin!4v1711901522694!5m2!1sen!2sin', '7,682', 7),
(29, 'Hotel Rushabh Home', 'https://img.easemytrip.com/EMTHotel-200116/23/a/l/338235_0.jpg', '6A, Middleton Street', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.820206260483!2d88.34959847519723!3d22.54840687950906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027710f733a2ab%3A0xd330dce5b00a8afd!2sOYO%2022926%20Hotel%20Rushabh%20Home!5e0!3m2!1sen!2sin!4v1711901889944!5m2!1sen!2sin', '2,573', 7),
(30, 'Goroomgo Indeedcare Hotel & Resorts', 'https://img.easemytrip.com/EMTHOTEL-3499841/70/32/na/l/41568506_0.jpg', 'Siddha Xanadu, As/275', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.1685030860153!2d88.38162277519795!3d22.57280027949156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277da11bbe769%3A0xf7f1d814ada936e9!2sGoroomgo%20Comfortable%20Stay%20kolkata!5e0!3m2!1sen!2sin!4v1711902524024!5m2!1sen!2sin', '2,638', 7),
(31, 'Tatvam Residency', 'https://img.easemytrip.com/EMTHotel-136676/8/m/l/781539_0.jpg', '171/1/M Picnic Garden Road', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.4376484323097!2d88.39222587519652!3d22.525272779525302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276aee19f74a7%3A0x915037cc6eb4ad1c!2sTatvam%20Residency!5e0!3m2!1sen!2sin!4v1711903594344!5m2!1sen!2sin', '3,041', 7),
(32, 'Bangalore Times', 'http://media.easemytrip.com/media/Hotel/SHL-2302962963121/Common/CommonjNZSGK.jpg', '574 Aecs Main Rd Opp. Icic Bank Aecs Layout - C Block Kundalahalli Brookefield Bengaluru Karnataka 560037', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124409.81559958424!2d77.4016486972656!3d12.984209599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3dc0883852d7%3A0xc21ce72e92380dca!2sBANGALORE%20TIMES!5e0!3m2!1sen!2sin!4v1711904218294!5m2!1sen!2sin', '3,342', 8),
(33, 'Icon Premier Hotel By Bhagini', 'http://media.easemytrip.com/media/Hotel/SHL-21081357405541/Common/CommonfFI2BN.jpg', '57 1A Outer Ring Rd Opp. Sakra World Hospital Devarabisanahalli Bellandur Bengaluru Karnataka 560103', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124409.82858994376!2d77.40164845819969!3d12.984183653913538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae151ac6a6974f%3A0x92e5e0c514b4079!2sICON%20Boutique%20Hotel%2C%20Domlur%2C%20Indiranagar!5e0!3m2!1sen!2sin!4v1711904660510!5m2!1sen!2sin', '6,847', 8),
(34, 'Regenta Inn Indiranagar', 'http://media.easemytrip.com/media/Hotel/SHL-20081884795559/Common/CommonlBllIg.jpg', 'No. 648/B Binnamangala Indira Nagar 1St Stage Bengaluru Karnataka 560038', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.8264051746796!2d77.63756347496843!3d12.982952487333428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1700aa551595%3A0xf06813382d6778a4!2sRegenta%20Inn%2C%20Indiranagar!5e0!3m2!1sen!2sin!4v1711905077972!5m2!1sen!2sin', '2,987', 8),
(35, 'Kyriad Hotel Indore By Othpl', 'http://media.easemytrip.com/media/Hotel/SHL-19021841476568/Common/CommonK5s2Ui.jpg', 'Plot. 34-35 Ff Scheme No. 54 Opposite Meghdoot Garden Vijay Nagar Indore Madhya Pradesh 452010', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.3263096013416!2d75.88441207520339!3d22.75326847936347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396302a622ed5d91%3A0x84dc693e5d9feeb9!2sKyriad%20Hotel%20Indore%20by%20OTHPL!5e0!3m2!1sen!2sin!4v1711905468816!5m2!1sen!2sin', '2,677', 9),
(36, 'Playotel Premier Vijay Nagar', 'http://media.easemytrip.com/media/Hotel/SHL-23052474617859/Common/CommonTAYt0q.jpg', 'C-92 Vasant Vihar Vijay Nagar Indore Madhya Pradesh 452010', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.228227612076!2d75.90074437520353!3d22.756909979360827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39631d90e39f67d9%3A0x493cef60c909ea60!2sPlayotel%20Premier%20Vijay%20Nagar%2C%20Indore!5e0!3m2!1sen!2sin!4v1711905713918!5m2!1sen!2sin', '4,122', 9),
(37, 'Aceotel Inn The Apple Tree', 'http://media.easemytrip.com/media/Hotel/SHL-2401162088843239/Common/Common7a1X4B.jpg', 'Plot No.80,Kanadia Road,Near Golf Link Greens, Kanadia Village,Indore, Madhya Pradesh 452016', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.8254878609196!2d75.95079357520278!3d22.734726879376556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962e3b55cb59e27%3A0x366d1aadac645626!2sAceotel%20Inn%20Apple%20Tree%20%7C%2009752895362!5e0!3m2!1sen!2sin!4v1711906007790!5m2!1sen!2sin', '1,563', 9),
(38, 'Marigold By Green Park', 'http://media.easemytrip.com/media/Hotel/SHL-2110505918776/Common/Common6maKNa.jpg', 'Ameerpet Rd, Leelanagar, Ameerpet, Hyderabad, Telangana 500003', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.4690126357877!2d78.4519080750601!3d17.437251883458416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90b79018121f%3A0xeb01dfe78337b14a!2sMarigold%20Hotel!5e0!3m2!1sen!2sin!4v1711906577515!5m2!1sen!2sin', '6,512', 10),
(39, 'The Manohar Hyderabad', 'http://media.easemytrip.com/media/Hotel/SHL-19041030715426/External/External4Ygpdj.jpg', 'Begumpet Airport Exit Road', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.3057217479623!2d78.46850797506029!3d17.445075483451895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90a6cb25fe39%3A0x51fac09c744df522!2sThe%20Manohar%2C%20Hyderabad!5e0!3m2!1sen!2sin!4v1711906812773!5m2!1sen!2sin', '3,709', 10),
(40, 'Lemon Tree Premier, Hitec City, Hyderabad', 'http://media.easemytrip.com/media/Hotel/SHL-20072486458562/Common/CommondXNsSb.jpg', 'Plot No. 2, Survey No. 64, Hitec City, Madhapur, Hyderabad, Telangana 500081', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.319869224817!2d78.37348147506033!3d17.44439778345253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9194f895b5f7%3A0xd59db70647393044!2sLemon%20Tree%20Premier%2C%20HITEC%20City%2C%20Hyderabad!5e0!3m2!1sen!2sin!4v1711907189579!5m2!1sen!2sin', '5,960', 10),
(41, 'Red Fox Hotel, Hitec City, Hyderabad', 'http://media.easemytrip.com/media/Hotel/SHL-20072432255916/Common/CommoncRotZT.jpg', 'Plot No. 2, Survey No. 64', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.342994203037!2d78.37389357506028!3d17.443289983453433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93e716d30811%3A0x918e408a1e8c5136!2sRed%20Fox%20Hotel%2C%20Hyderabad!5e0!3m2!1sen!2sin!4v1711907381726!5m2!1sen!2sin', '4,019', 10),
(42, 'Justa Morjim Beach Resort Goa', 'http://media.easemytrip.com/media/Hotel/SHL-22011427391771/Common/CommonLabhiJ.jpg', 'Vithaldaswada Morjim Goa 403512', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.284821289163!2d73.72454987501973!3d15.629814284987754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfe906c62ed039%3A0x538b2da63929f551!2sj%C3%BCSTa%20Morjim%20Beach%20Resort%20Goa!5e0!3m2!1sen!2sin!4v1711907771732!5m2!1sen!2sin', '3,164', 11),
(43, 'Joia Do Mar Resort', 'http://media.easemytrip.com/media/Hotel/SHL-23031477256539/Common/Common8Mz6Tt.png', 'Calangute - Arpora Rd, Porba Vaddo, Prabhu Wada, Calangute, Goa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.7523768847304!2d73.76178747501811!3d15.551399785055606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfea0e8e04a21b%3A0xbde88ebb6f5a42b!2sJoia%20Do%20Mar%20Resort!5e0!3m2!1sen!2sin!4v1711908045483!5m2!1sen!2sin', '2,338', 11),
(44, 'Royale Assagao Resort', 'http://media.easemytrip.com/media/Hotel/SHL-22031105363129/Common/CommonPWRSsX.jpg', 'Socolo Wado, Mapusa - Anjuna - Chapora Rd, Next To Dattatray Temple, Assagao, Goa 403507', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.8825113018725!2d73.77079157501906!3d15.597924885015361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfeca855555555%3A0x575398eec0df6a87!2sRoyale%20Assagao%20Resort!5e0!3m2!1sen!2sin!4v1711908281685!5m2!1sen!2sin', '1,980', 11),
(45, 'Snow Valley Resorts', 'http://media.easemytrip.com/media/Hotel/SHL-2304366691922/Common/CommonYB6Ayf.jpg', 'Log Hut Area Manali Himachal Pradesh 175131', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1746753.393781194!2d74.08322766685232!3d31.231041806591143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390487e5d53284a1%3A0x289892bc86cb3f8e!2sSnow%20Valley%20Resorts%2C%20Manali!5e0!3m2!1sen!2sin!4v1711938414884!5m2!1sen!2sin', '3,032', 12),
(46, 'Paradise By Anandam', 'http://media.easemytrip.com/media/Hotel/SHL-22062293520640/Common/CommonFIzelM.jpg', 'Nehru Kund Manali - Rohtang Road Manali Manali Himachal Pradesh 175131', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.9595573482748!2d77.17560297554864!3d32.2860652738726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3904875308a9f24b%3A0xb2b9abc52bbe2c7b!2sPARADISE-The%20Whitehouse%20Cafe!5e0!3m2!1sen!2sin!4v1711939980766!5m2!1sen!2sin', '5,661', 12),
(47, 'Kaizen X Voyage Resort And Spa', 'http://media.easemytrip.com/media/Hotel/SHL-240111706815089/Common/Commoni8DTJ8.jpg', 'Kh. No. 635/2, Near Manali Strays, V.P.O, Tehsil, Haripur, Manali, Himachal Pradesh 175136', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3377.7748823685984!2d77.17572657554321!3d32.1563731739292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390489637cdf570d%3A0xf99896dc4c909a09!2sKaizen%20x%20Voyage%20Resort%20%26%20Spa!5e0!3m2!1sen!2sin!4v1711940324883!5m2!1sen!2sin', '3,320', 12),
(48, 'Sterling Manali', 'http://media.easemytrip.com/media/Hotel/SHL-1812305586273/Common/CommonmeevQl.jpg', 'Naggar Highway Left Bank Road Prini 175131 Manali', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3375.243707398392!2d77.19284967554604!3d32.22460387389947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a555b8006703c5d%3A0x25fd7276ae9b3eeb!2sSterling%20Manali!5e0!3m2!1sen!2sin!4v1711941032152!5m2!1sen!2sin', '3,632', 12),
(49, 'Hotel Sarang Palace', 'https://img.easemytrip.com/EMTHotel-2800582/32/na/l/1526147_0.jpg', 'A-40, Subhash Nagar', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.930273176203!2d75.79362857534132!3d26.937424876632434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3e61725d677%3A0x297d3df365c1942f!2sHotel%20Sarang%20Palace%20-%20Boutique%20Stays%20%26%20Candlelight%20Dining!5e0!3m2!1sen!2sin!4v1711941360299!5m2!1sen!2sin', '2,622', 13),
(50, 'Hotel Ratnawali', 'https://img.easemytrip.com/EMTHotel-128305/8/m/l/249948_0.jpg', 'New Colony', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.547015377683!2d75.80890387534059!3d26.917867776644233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db61a7f955555%3A0x51ec94faf2d705aa!2sRatnawali%20-%20A%20Vegatarain%20Heritage%20Hotel!5e0!3m2!1sen!2sin!4v1711941707721!5m2!1sen!2sin', '3,145', 13),
(51, 'Treebo Trend Natraj', 'http://media.easemytrip.com/media/Hotel/SHL-1910965994167/Common/Commonvuzm4E.jpg', 'Motilal Atal Rd, Sindhi Camp, Jaipur, Rajasthan 302001', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.461471815356!2d75.79536437534067!3d26.920581176642653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3f88b837dbd%3A0xd97a16112aa860bb!2sTreebo%20Trend%20Natraj%20-%20Hotel%20in%20Jaipur!5e0!3m2!1sen!2sin!4v1711942063175!5m2!1sen!2sin', '3,308', 13),
(52, 'Hotel Travaasa', 'https://img.easemytrip.com/EMTHOTEL-2577470/8/m/l/7929456_0.jpg', 'Near Dcm Ajmer Rd', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56934.40698608857!2d75.66516724863284!3d26.89078380000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5f8d3b5657f%3A0x669fab17f725f484!2sHotel%20Travaasa%20Jaipur!5e0!3m2!1sen!2sin!4v1711942288319!5m2!1sen!2sin', '3,497', 13),
(53, 'Hotel Kaziranga Continental', 'http://media.easemytrip.com/media/Hotel/SHL-19112898764977/Common/Commonx3IcTt.jpg', 'Opp. Astc Bus Stand,, Bokakhat, Assam 785612', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3566.225107701471!2d93.60173217533084!3d26.64127407681001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37442496f6c8f07f%3A0x5ea9bfd17bb521da!2sHotel%20Kaziranga%20Continental!5e0!3m2!1sen!2sin!4v1711942530985!5m2!1sen!2sin', '2,235', 14),
(54, 'Hotel Rising Sun', 'http://media.easemytrip.com/media/Hotel/SHL-2309182068698006/Common/CommoninFygI.jpg', 'Sohum, Barapani, Naharlagun, Arunachal Pradesh 791110', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3551.759003956824!2d93.68233697534716!3d27.10089377653556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3744012e9b3048d1%3A0xa075f59eb59c827f!2sHotel%20Rising%20Sun!5e0!3m2!1sen!2sin!4v1711943059170!5m2!1sen!2sin', '4,189', 14),
(55, 'Whirlwind Food Court And Resort', 'http://media.easemytrip.com/media/Hotel/SHL-2402221376418938/Common/Common0ddvgD.jpg', 'Behora Grant, Numaligarh, Assam 785613', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d916778.7186252577!2d90.547301578125!3d26.158694399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a599265ddd589%3A0xe93548970690b3a6!2sWhirlwind%20Food%20Court%20and%20Resort!5e0!3m2!1sen!2sin!4v1711943377468!5m2!1sen!2sin', '2,656', 14),
(56, 'The Park Celebration', 'http://media.easemytrip.com/media/Hotel/SHL-23051665858691/Common/CommondAJV1b.jpg', 'Atlantis Square, Fire Station, Opp. Vesu, Vesu, Surat, Gujarat 395007', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15242236.808055855!2d53.26929494999998!3d21.142477999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0532c846775ed%3A0xc6a54e4a813e743e!2sThe%20Park%20Celebration!5e0!3m2!1sen!2sin!4v1711943568704!5m2!1sen!2sin\"', '1,338', 15),
(57, 'Lords Plaza, Surat', 'http://media.easemytrip.com/media/Hotel/SHL-19112574222300/Common/CommonLgwQtf.jpg', 'Delhi Gate,', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.7948823962247!2d72.83831787515777!3d21.200305780492283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ef8043785db%3A0x4753da6a5957d59b!2sLords%20Plaza%20Surat!5e0!3m2!1sen!2sin!4v1711943796855!5m2!1sen!2sin', '3,377', 15),
(58, 'Ginger Surat City Centre', 'http://media.easemytrip.com/media/Hotel/SHL-21111888137469/Common/CommonSZe2NM.jpg', 'Opposite Surat Railway Station, Doriwala Square, Surat, Gujarat 395003', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29758.35931462441!2d72.8202931663502!3d21.200304512462722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f86708677b5%3A0xda18d095ceb88f68!2sGinger%20Surat%20(City%20Center)!5e0!3m2!1sen!2sin!4v1711944061182!5m2!1sen!2sin', '3,799', 15),
(59, 'Hotel Royal Accord', 'http://media.easemytrip.com/media/Hotel/SHL-2308281954773227/Common/Common3MgrFb.jpg', 'Rushabh Char Rasta, Sugam Society, Adajan, Surat, Gujarat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.8075690659484!2d72.80212887515788!3d21.199801980492662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f6d8b1d501b%3A0x74e82f50a0bcba29!2sHotel%20Royal%20Accord!5e0!3m2!1sen!2sin!4v1711944317014!5m2!1sen!2sin', '1,634', 15),
(60, 'De Glance Hotel', 'http://media.easemytrip.com/media/Hotel/SHL-22082635551866/Common/Common4Lzz9A.jpg', 'A-1-7-3B, 7/278, Testi Fast Food, Station Road, Surat, Gujarat,395003', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.6803871781535!2d72.83580357515788!3d21.204851980488918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f17a7c913d9%3A0x576c4d9aaccabe69!2sDe%20Glance%20Hotel!5e0!3m2!1sen!2sin!4v1711944559271!5m2!1sen!2sin', '3295', 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pno` varchar(10) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `pno`, `pic`, `address`, `pincode`, `dob`, `password`) VALUES
(1, 'divya lakhatariya', 'divyalakhatariya4@gmail.com', '123456789', '', 'sanghvi park society', '363001', '2000-11-02', '8704'),
(2, 'raxit gondaliya', 'gondaliyarakshit@gmail.com', '8238676705', '', 'madhav park limndi', '363421', '2003-04-27', '123');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `id` int(11) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `room_name` varchar(150) NOT NULL,
  `room_img` varchar(500) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `room_no`, `room_name`, `room_img`, `room_price`, `hotel_id`) VALUES
(1, '101', 'Deluxe King Room Bed', 'https://img.easemytrip.com/RoomImages/EMTHotel-1845551/10/DCPJPYCMJ305.jpg', '7250', 1),
(2, '102', 'Luxury Room King Bed', 'https://img.easemytrip.com/RoomImages/EMTHotel-1845551/10/6DCPVF0RN947.jpg', '7750', 1),
(3, '103', 'Luxury Room Twin Bed', 'https://img.easemytrip.com/RoomImages/EMTHotel-1845551/10/PCHJTAANJMLR.jpg', '8250', 1),
(4, '104', 'Luxury Room', 'https://img.easemytrip.com/RoomImages/EMTHotel-1845551/10/XZMYFZRJ3DGT.jpg', '4590', 1),
(5, '101', 'Studio Apartment', 'https://img.easemytrip.com/roomimages/EMTHotel-1243618/32/33237499/220236826_1.jpg', '2553', 2),
(6, '102', 'Platinum room', 'https://img.easemytrip.com/EMTHotel-1243618/8/g/l/3041172_2.jpg', '3190', 2),
(7, '103', 'Tycoon Single Room', 'http://media.easemytrip.com/media/Hotel/SHL-21092939676054/Common/CommonfSXolS.jpg', '3393', 2),
(8, '104', 'Tycoon Double Room', 'https://img.easemytrip.com/roomimages/EMTHotel-1466022/32/24073468/221710472_1.jpg', '3960', 2),
(9, '101', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-22122847153062/Common/CommonWdwElS.jpg', '2614', 3),
(10, '102', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-22122847153062/Common/CommonarpQW2.jpg', '3444', 3),
(11, '103', 'Suite', 'http://media.easemytrip.com/media/Hotel/SHL-22122847153062/Common/CommonGTVR6O.jpg', '9171', 3),
(12, '101', 'Rhodium Room', 'https://media.easemytrip.com/media/Hotel/SHL-19101527189986/Common/CommonZp09TR.JPG', '4334', 4),
(13, '102', 'Platinum Room', 'https://media.easemytrip.com/media/Hotel/SHL-19101527189986/Common/CommonmKRVEz.JPG', '4590', 4),
(14, '103', 'Titanium room', 'https://media.easemytrip.com/media/Hotel/SHL-19101527189986/Common/CommonNGmDYc.JPG', '5100', 4),
(15, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-22041508959055/Common/CommonOdw9gN.jpg', '3135', 5),
(16, '102', 'Premier Room', 'http://media.easemytrip.com/media/Hotel/SHL-22041508959055/Common/Common7O5tmm.jpg', '3431', 5),
(17, '101', 'Standard Twin Room', 'http://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/CommonO8NUsH.jpg', '2425', 6),
(18, '102', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/CommonzDX0Gl.jpg', '2862', 6),
(19, '103', 'Deluxe Triple Room', 'http://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/CommonBV5ms2.jpg', '2921', 6),
(20, '104', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/CommonAbvxLP.jpg', '3407', 6),
(21, '105', 'Premier Room', 'http://media.easemytrip.com/media/Hotel/SHL-22072068591390/Common/CommondjSn3D.jpg', '2999', 6),
(22, '101', 'Standard Non AC Room', 'http://media.easemytrip.com/media/Hotel/SHL-22083174581486/Common/CommonWa8fxA.jpg', '2234', 7),
(23, '102', 'Deluxe', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1516773/8/527993003/5279930_0.jpg', '2792', 7),
(24, '103', 'Family  Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1516773/8/527993002/5279930_0.jpg', '5584', 7),
(25, '101', 'Standard Room', 'http://media.easemytrip.com/media/Hotel/SHL-2402261933603283/Common/CommonNmsqh6.png', '2428', 8),
(26, '102', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-2402261933603283/Common/Common9DjPol.png', '2979', 8),
(27, '103', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-2402261933603283/Common/Common4H2qft.png', '3479', 8),
(28, '104', 'Heritage Room', 'https://img.easemytrip.com/roomimages/EMTHotel-3556437/8/918636104/9186361_0.jpg', '4469', 8),
(29, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-21101115884007/Common/CommonPEXBuO.png', '3080', 9),
(30, '102', 'Premium  Room', 'http://media.easemytrip.com/media/Hotel/SHL-21101115884007/Common/CommonHYsfkG.png', '3520', 9),
(31, '103', 'Junior Room', 'http://media.easemytrip.com/media/Hotel/SHL-21101115884007/Common/CommonfD2UKq.png', '4268', 9),
(32, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-1902266872701/Common/Common9Vha5j.png', '3372', 10),
(33, '102', 'Super Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-1902266872701/Common/CommonCrbG6Y.png', '4060', 10),
(34, '101', 'Deluxe Room', 'https://media.easemytrip.com/media/Hotel/SHL-1908538819480/Bedroom/BedroomD1HkaH.jpg', '4600', 11),
(35, '102', 'Executive Room', 'https://media.easemytrip.com/media/Hotel/SHL-1908538819480/Bedroom/Bedroomi0milS.jpg', '5409', 11),
(36, '103', 'Executive Room', 'https://media.easemytrip.com/media/Hotel/SHL-1908538819480/Bedroom/Bedroom6Xt5DY.jpg', '6038', 11),
(37, '104', 'Heritage Room', 'https://media.easemytrip.com/media/Hotel/SHL-1908538819480/Bedroom/Bedroomzwd5UV.jpg', '7027', 11),
(38, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-1911655023703/Common/CommonpqtSxs.jpg', '3208', 12),
(39, '102', 'Deluxe Single', 'https://img.easemytrip.com/EMTHOTEL-1097184/70/8/na/l/39686798_6.jpg', '3328', 12),
(40, '101', 'Executive Twin Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1894910/8/917476605/9174766_0.jpg', '2803', 13),
(41, '102', 'Executive Double Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1894910/8/917476604/9174766_0.jpg', '3040', 13),
(42, '104', 'Suite', 'http://media.easemytrip.com/media/Hotel/SHL-2310101689381788/Common/CommonthfQV5.jpg', '3988', 13),
(43, '101', 'Twin Studio', 'http://media.easemytrip.com/media/Hotel/SHL-231213194880665/Common/CommondJBJNL.jpg', '3888', 14),
(44, '102', 'King Studio', 'http://media.easemytrip.com/media/Hotel/SHL-231213194880665/Common/CommonLWxtBC.jpg', '4139', 14),
(45, '103', 'Club Studio', 'http://media.easemytrip.com/media/Hotel/SHL-231213194880665/Common/CommonXf5t3v.jpg', '4598', 14),
(46, '104', 'Premium Suite Apartment', 'http://media.easemytrip.com/media/Hotel/SHL-231213194880665/Common/Common2JkYsD.jpg', '6771', 14),
(47, '101', 'Deluxe Garden View Room', 'https://img.easemytrip.com/roomimages/EMTHotel-993065/23/159047185/109194.jpg', '6675', 15),
(48, '102', 'Premium', 'https://img.easemytrip.com/roomimages/EMTHotel-993065/23/3131382/109194.jpg', '7596', 15),
(49, '103', 'Premium Sea View Club Room', 'https://img.easemytrip.com/roomimages/EMTHotel-993065/23/10385286/109194.jpg', '7596', 15),
(50, '104', 'Bay View Suite with King Bed', 'https://img.easemytrip.com/roomimages/EMTHotel-993065/23/7068821/109194.jpg', '7623', 15),
(51, '101', 'Deluxe Room', 'https://pix8.agoda.net/hotelImages/48152541/-1/883de0daa9fc7aae6666709ed7a0a6a3.jpg?ce=0&s=312x', '3420', 16),
(52, '102', 'Super Deluxe', 'https://pix8.agoda.net/hotelImages/48152541/765448291/ba1d3daab66b11a3b22128bd8cc3223a.jpg?ce=0&s=312x', '3538', 16),
(53, '103', 'Suite Room', 'https://pix8.agoda.net/hotelImages/48152541/765485587/d31863a27e3541bbff4f99c73427608f.jpg?ce=0&s=312x', '4718', 16),
(54, '101', 'Standard Room', 'https://img.easemytrip.com/roomimages/EMTHotel-3210073/32/76570823/316359788_1.jpg', '3824', 17),
(55, '102', 'Premium Deluxe Room', 'https://img.easemytrip.com/roomimages/EMTHotel-3210073/32/76570823/316359744_1.jpg', '4478', 17),
(56, '103', 'Suite Deluxe', 'https://img.easemytrip.com/roomimages/EMTHotel-3210073/32/76570823/316359788_1.jpg', '5573', 17),
(57, '101', 'Classic Room', 'https://img.easemytrip.com/roomimages/EMTHotel-3875988/32/91047417/322877361_1.jpg', '3957', 18),
(58, '102', 'Deluxe Room', 'https://img.easemytrip.com/EMTHOTEL-3875988/70/23/na/s/41597257_21.jpg', '4670', 18),
(59, '103', 'Executive Room', 'https://img.easemytrip.com/EMTHOTEL-3875988/32/rm/lg/91047417_14.jpg', '5454', 18),
(60, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-22021511101059/Common/CommonM3QZsF.jpg', '5499', 19),
(61, '102', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-22021511101059/Common/CommonyPZ9UM.jpg', '6399', 19),
(62, '103', 'Premier Room', 'http://media.easemytrip.com/media/Hotel/SHL-22021511101059/Common/CommongwRiQH.jpg', '6799', 19),
(63, '104', 'Club Double Room', 'http://media.easemytrip.com/media/Hotel/SHL-22021511101059/Common/Common3exk7I.jpg', '6399', 19),
(64, '101', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-230828779938560/Common/CommonP7Z5QK.jpg', '5560', 20),
(65, '102', 'Club Room', 'http://media.easemytrip.com/media/Hotel/SHL-230828779938560/Common/CommontgShL9.jpg', '5846', 20),
(66, '103', 'Grand Room', 'http://media.easemytrip.com/media/Hotel/SHL-230828779938560/Common/Commone2gvER.jpg', '6132', 20),
(67, '104', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-230828779938560/Common/CommoniEsKSr.jpg', '5600', 20),
(68, '101', 'Executive Superior Room', 'https://media.easemytrip.com/media/Hotel/SHL-1903871756626/Common/CommonqFpVlN.jpg', '4637', 21),
(69, '102', 'Executive Deluxe', 'https://media.easemytrip.com/media/Hotel/SHL-1903871756626/Common/CommonkNZ2Gy.jpg', '9555', 21),
(70, '101', 'Business Room', 'http://media.easemytrip.com/media/Hotel/SHL-20072528768841/Common/Common97zuL9.jpg', '3255', 22),
(71, '102', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-20072528768841/Bedroom/BedroomglMsJV.jpg', '4865', 22),
(72, '103', 'Executive Suite', 'http://media.easemytrip.com/media/Hotel/SHL-20072528768841/Bedroom/BedroomBrIQCb.jpg', '8491', 22),
(73, '104', 'Terrace Suite', 'http://media.easemytrip.com/media/Hotel/SHL-20072528768841/Bedroom/BedroomIzGXrQ.jpg', '9000', 22),
(74, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-21012370466019/Common/CommonMNSS5l.jpg', '2992', 23),
(75, '102', 'Super Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-21012370466019/Common/Common0RMNF5.jpg', '4400', 23),
(76, '101', 'Non Lake Facing Deluxe AC Room', 'http://media.easemytrip.com/media/Hotel/SHL-22022138294314/Common/CommonE3aDg5.jpg', '1991', 24),
(77, '102', 'Lake Facing Super Deluxe AC Room', 'http://media.easemytrip.com/media/Hotel/SHL-22022138294314/Common/CommonjMjEiw.jpg', '2987', 24),
(78, '103', 'Lake Facing AC Suite', 'http://media.easemytrip.com/media/Hotel/SHL-22022138294314/Common/Common7CoBht.jpg', '3817', 24),
(79, '101', 'Royal Queen Room', 'http://media.easemytrip.com/media/Hotel/SHL-19102214922483/Common/CommonxLvszP.jpg', '2958', 25),
(80, '102', 'Royal King Room', 'http://media.easemytrip.com/media/Hotel/SHL-19102214922483/Common/Common7Qo07W.jpg', '3381', 25),
(81, '103', 'Royal Family Room', 'http://media.easemytrip.com/media/Hotel/SHL-19102214922483/Common/CommonR9YX75.jpg', '5919', 25),
(82, '102', 'Executive Room With Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-22092486350737/Bedroom/BedroomamZXWF.jpg', '3402', 26),
(83, '102', 'Premium King Room with Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-22092486350737/Common/CommonX4KosL.jpg', '3696', 26),
(84, '103', 'Executive Room with Bath Tub', 'http://media.easemytrip.com/media/Hotel/SHL-22092486350737/Common/CommonQz2ayN.jpg', '3391', 26),
(85, '104', 'Premium Cottage with Private Pool', 'http://media.easemytrip.com/media/Hotel/SHL-22092486350737/Common/CommonVfRwdW.jpg', '6054', 26),
(86, '101', 'Classic Room', 'http://media.easemytrip.com/media/Hotel/SHL-2312021967328136/Common/CommonZyp8fN.jpg', '4639', 27),
(87, '102', 'Heritage Suite', 'https://img.easemytrip.com/EMTHOTEL-3470732/70/23/na/s/41549493_42.jpg', '5715', 27),
(88, '103', 'Privilege Suite', 'http://media.easemytrip.com/media/Hotel/SHL-2312021967328136/Common/CommonSABSZd.jpg', '7299', 27),
(89, '101', 'Premier King Room', 'https://img.easemytrip.com/roomimages/EMTHotel-19607/23/3256999/566696.jpg', '5400', 28),
(90, '102', 'Edwardian Room', 'https://img.easemytrip.com/roomimages/EMTHotel-19607/23/3257003/566696.jpg', '7000', 28),
(91, '103', 'Edwardian Suite', 'https://img.easemytrip.com/roomimages/EMTHotel-19607/23/360034316/566696.jpg', '6751', 28),
(92, '101', 'Deluxe Room', 'https://img.easemytrip.com/roomimages/EMTHotel-200116/23/3464217/338235.jpg', '2941', 29),
(93, '102', 'Executive Room', 'https://img.easemytrip.com/roomimages/EMTHotel-200116/23/3492404/338235.jpg', '3309', 29),
(94, '103', 'Suite with 1 King Bed', 'https://img.easemytrip.com/roomimages/EMTHotel-200116/23/3492405/338235.jpg', '3676', 29),
(95, '101', 'Premium Deluxe Room', 'https://img.easemytrip.com/EMTHOTEL-3499841/70/36/na/s/41568506_7.jpg', '2638', 30),
(96, '102', 'Premium King Suite', 'https://img.easemytrip.com/EMTHOTEL-3499841/70/36/na/s/41568506_5.jpg', '3297', 30),
(97, '101', 'Deluxe Room', 'http://img.easemytrip.com/roomimages/EMTHotel-136676/32/200341705/6503988_3.jpg', '3041', 31),
(98, '102', 'Premium Queen-size Room', 'http://img.easemytrip.com/roomimages/EMTHotel-136676/32/200341706/6503988_9.jpg', '3274', 31),
(99, '103', 'Premium Room', 'http://img.easemytrip.com/roomimages/EMTHotel-136676/32/200341706/6503988_6.jpg', '3508', 31),
(100, '101', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-2302962963121/Common/CommonnEaXQU.jpg', '3342', 32),
(101, '102', 'Premium Room', 'http://media.easemytrip.com/media/Hotel/SHL-2302962963121/Common/CommonxylNub.jpg', '3800', 32),
(102, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-21081357405541/Common/CommontIl8Rb.jpg', '6847', 33),
(103, '102', 'Icon Executive', 'http://media.easemytrip.com/media/Hotel/SHL-21081357405541/Common/CommonwLZ2oY.jpg', '7800', 33),
(104, '101', 'Deluxe King Room', 'http://media.easemytrip.com/media/Hotel/SHL-20081884795559/Common/CommonIgB0Gk.jpg', '2987', 34),
(105, '102', 'Executive Twin Room', 'http://media.easemytrip.com/media/Hotel/SHL-20081884795559/Common/CommonUonjWh.jpg', '3387', 34),
(106, '101', 'Superior Room', 'https://img.easemytrip.com/roomimages/EMTHotel-401917/8/129121201/1291212_0.jpg', '2627', 35),
(107, '102', 'Premier Room', 'https://img.easemytrip.com/roomimages/EMTHotel-401917/8/129121203/1291212_0.jpg', '3104', 35),
(108, '103', 'Suite', 'http://img.easemytrip.com/roomimages/EMTHotel-401917/8/129121203/1291212_0.jpg', '3717', 35),
(109, '101', 'Play Deluxe', 'http://media.easemytrip.com/media/Hotel/SHL-23052474617859/Common/CommonqZlWXW.jpg', '4122', 36),
(110, '102', 'Play Premium', 'http://media.easemytrip.com/media/Hotel/SHL-23052474617859/Common/Common8FMqWO.jpg', '4518', 36),
(111, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-2401162088843239/Common/CommonVBKZFD.jpg', '1593', 37),
(112, '102', 'Premium Room', 'http://media.easemytrip.com/media/Hotel/SHL-2401162088843239/Common/Common4FBCRA.jpg', '1733', 37),
(113, '101', 'Luxury Room', 'http://media.easemytrip.com/media/Hotel/SHL-2110505918776/Common/CommonyNNLgs.jpg', '6512', 38),
(114, '101', 'Standard Room', 'http://media.easemytrip.com/media/Hotel/SHL-19041030715426/Bedroom/BedroomcjMAfO.jpg', '3709', 39),
(115, '102', 'Junior Suite', 'http://media.easemytrip.com/media/Hotel/SHL-19041030715426/Common/Common0JLoB7.jpg', '5620', 39),
(116, '103', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-19041030715426/Common/Common9h9H5D.jpg', '4500', 39),
(117, '104', 'Lifestyle Suite With Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-19041030715426/Common/CommonDNoPJq.jpg', '6500', 39),
(118, '101', 'Business Room', 'http://media.easemytrip.com/media/Hotel/SHL-20072486458562/Bedroom/BedroomJAnehV.jpg', '5950', 40),
(119, '102', 'Executive Suite', 'http://media.easemytrip.com/media/Hotel/SHL-20072486458562/Bedroom/BedroomaRxweU.jpg', '4596', 40),
(120, '101', 'Business Room', 'http://media.easemytrip.com/media/Hotel/SHL-20072432255916/Common/CommonNkSwXO.jpg', '4019', 41),
(121, '102', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-20072432255916/Common/CommonD6l0X8.jpg', '4310', 41),
(122, '103', 'Executive Suite King', 'http://media.easemytrip.com/media/Hotel/SHL-20072432255916/Common/CommonfCeRSg.jpg', '8104', 41),
(123, '101', 'Superior Room', 'http://media.easemytrip.com/media/Hotel/SHL-22011427391771/Common/CommonvGEHGd.jpg', '3164', 42),
(124, '102', 'Premier Room', 'http://media.easemytrip.com/media/Hotel/SHL-22011427391771/Common/CommonWFSbCJ.jpg', '3842', 42),
(125, '103', 'Maharaja Suite', 'http://media.easemytrip.com/media/Hotel/SHL-22011427391771/Common/Commontf9Lj8.jpg', '4294', 42),
(126, '101', 'Premium Room', 'http://media.easemytrip.com/media/Hotel/SHL-23031477256539/Common/CommonqujIuw.png', '2338', 43),
(127, '102', 'Grand Room', 'http://media.easemytrip.com/media/Hotel/SHL-23031477256539/Common/CommongZ536w.jpg', '3549', 43),
(128, '103', 'Junior Suite(With 2 Bedrooms)', 'https://img.easemytrip.com/roomimages/EMTHotel-3540588/32/4385219/200069382_1.jpg', '4554', 43),
(129, '101', 'Deluxe Room With Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-22031105363129/Common/Commono5iAjq.jpg', '1960', 44),
(130, '102', 'Suite Room 2BHK With Living Room', 'http://media.easemytrip.com/media/Hotel/SHL-22031105363129/Common/CommonWaANs5.jpg', '2317', 44),
(131, '103', 'Ambassador Room 2BHK with Living Room', 'http://media.easemytrip.com/media/Hotel/SHL-22031105363129/Common/CommonVA3TcK.jpg', '3119', 44),
(132, '101', 'Luxury Room', 'http://media.easemytrip.com/media/Hotel/SHL-2304366691922/Common/Commonkg7oTL.jpg', '3032', 45),
(133, '102', 'Maharaja Room', 'https://img.easemytrip.com/EMTHotel-170977/23/na/l/81544_9.jpg', '3170', 45),
(134, '103', 'Presidential Room', 'http://media.easemytrip.com/media/Hotel/SHL-2304366691922/Common/CommonUG2cde.jpg', '3824', 45),
(135, '101', 'Standard Room Double', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1896077/32/77712515/316501566_1.jpg', '5661', 46),
(136, '102', 'Luxury King Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-1896077/32/77712515/316501543_1.jpg', '6469', 46),
(137, '103', 'Classic Room', 'http://media.easemytrip.com/media/Hotel/SHL-22062293520640/Common/Common5cd5Ur.jpg', '7251', 46),
(138, '101', 'Boutique Room', 'http://media.easemytrip.com/media/Hotel/SHL-240111706815089/Common/Commonn9Ij1a.jpg', '3220', 47),
(139, '102', 'Luxury Room with Private Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-240111706815089/Common/CommonNro96B.jpg', '3794', 47),
(140, '103', 'Family Suite with French Balcony', 'http://media.easemytrip.com/media/Hotel/SHL-240111706815089/Common/Common2zKaTY.jpg', '6165', 47),
(141, '101', 'Classic Room with Mountain View', 'http://media.easemytrip.com/media/Hotel/SHL-1812305586273/Common/CommonfNtxJX.jpg', '3632', 48),
(142, '102', 'Premier Room with Mountain View', 'http://media.easemytrip.com/media/Hotel/SHL-1812305586273/Common/CommonQQPPm7.jpg', '3689', 48),
(143, '101', 'Economy Room Only', 'https://img.easemytrip.com/roomimages/EMTHotel-2800582/32/1526147/136020_1.jpg', '2622', 49),
(144, '102', 'Economy Room with Breakfast', 'https://img.easemytrip.com/roomimages/EMTHotel-2800582/32/1526147/378189_1.jpg', '3417', 49),
(145, '103', 'Bohemian Theme Room', 'https://img.easemytrip.com/roomimages/EMTHotel-2800582/32/1526147/200099300_1.jpg', '4609', 49),
(146, '104', 'Lavender Theme Neo Modern Room', 'https://img.easemytrip.com/roomimages/EMTHotel-2800582/32/1526147/202137113_1.jpg', '5000', 49),
(147, '101', 'Superior Room', 'http://img.easemytrip.com/roomimages/EMTHotel-128305/32/503466/2528484_0.jpg', '3145', 50),
(148, '102', 'Executive Double Room, 1 Queen Bed', 'http://img.easemytrip.com/roomimages/EMTHotel-128305/32/503467/2528484_4.jpg', '3145', 50),
(149, '103', 'Family Room, 2 Queen Beds', 'http://img.easemytrip.com/roomimages/EMTHotel-128305/32/503469/2528484_9.jpg', '4495', 50),
(150, '101', 'Economy Single Room', 'http://media.easemytrip.com/media/Hotel/SHL-1812305586273/Common/CommonfNtxJX.jpg', '3308', 51),
(151, '102', 'Standard Room', 'http://media.easemytrip.com/media/Hotel/SHL-1910965994167/Common/Common596Jzp.jpg', '3504', 51),
(152, '103', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-1910965994167/Common/CommonVgpU90.jpg', '3945', 51),
(153, '101', 'Deluxe Room', 'https://img.easemytrip.com/roomimages/EMTHotel-2577470/23/359933551/26047184.jpg', '3497', 52),
(154, '102', 'Premium Room', 'http://img.easemytrip.com/roomimages/EMTHotel-128305/32/503467/2528484_4.jpg', '4197', 52),
(155, '101', 'Deluxe Room With Breakfast', 'https://img.easemytrip.com/roomimages/EMTHotel-1570531/32/31148457/214523947_1.jpg', '2235', 53),
(156, '102', 'Executive Room With Breakfast', 'https://img.easemytrip.com/roomimages/EMTHotel-1570531/32/31148457/214522050_1.jpg', '3079', 53),
(157, '103', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-19112898764977/Common/Common2nrzHN.jpg', '5690', 53),
(158, '101', 'Deluxe Double Room', 'http://media.easemytrip.com/media/Hotel/SHL-2309182068698006/Common/Common4Kt7QD.jpg', '4149', 54),
(159, '102', 'Executive Double Room', 'http://media.easemytrip.com/media/Hotel/SHL-2309182068698006/Common/CommonVPGA6t.jpg', '5228', 54),
(160, '103', 'King Suite Room', 'http://media.easemytrip.com/media/Hotel/SHL-2309182068698006/Common/CommonaxwDvQ.jpg', '6169', 54),
(161, '101', 'Executive', 'http://media.easemytrip.com/media/Hotel/SHL-2402221376418938/Common/Common59dVpW.jpg', '2656', 55),
(162, '102', 'Triple Room', 'http://media.easemytrip.com/media/Hotel/SHL-2402221376418938/Common/CommondGolnT.jpg', '3320', 55),
(163, '101', 'Twin Room', 'http://media.easemytrip.com/media/Hotel/SHL-23051665858691/Common/CommongJ6aB4.jpg', '1338', 56),
(164, '102', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-23051665858691/Common/Commonqsn2eq.jpg', '1594', 56),
(165, '103', 'Super Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-23051665858691/Common/CommonUgDB6z.jpg', '2129', 56),
(166, '101', 'Deluxe Double Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-328260/8/41669101/416691_0.jpg', '3377', 57),
(167, '102', 'Superior Double Room With Breakfast', 'https://img.easemytrip.com/roomimages/EMTHOTEL-328260/8/41669102/416691_0.jpg', '4959', 57),
(168, '103', 'Clube Room', 'https://img.easemytrip.com/roomimages/EMTHOTEL-328260/8/41669103/416691_0.jpg', '6100', 57),
(169, '101', 'Deluxe Duo Room', 'http://media.easemytrip.com/media/Hotel/SHL-21111888137469/Common/CommonzVHBEn.jpg', '3799', 58),
(170, '102', 'Deluxe Twin Room', 'http://media.easemytrip.com/media/Hotel/SHL-21111888137469/Common/Common8aN1fa.jpg', '4199', 58),
(171, '103', 'Executive Triplet', 'http://media.easemytrip.com/media/Hotel/SHL-21111888137469/Common/CommonkPThOp.jpg', '5399', 58),
(172, '101', 'Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-2308281954773227/Common/CommonDmAqKw.jpg', '1397', 59),
(173, '102', 'Super Deluxe Room', 'http://media.easemytrip.com/media/Hotel/SHL-2308281954773227/Common/CommonaJhi8O.jpg', '1818', 59),
(174, '102', 'Executive Room', 'http://media.easemytrip.com/media/Hotel/SHL-2308281954773227/Common/CommonvyfRcq.jpg', '3758', 59),
(175, '101', 'Cozy Room', 'https://img.easemytrip.com/roomimages/EMTHotel-2217006/8/802043805/8020438_0.jpg', '3295', 60),
(176, '102', 'Cozy Room - Room Only - Single Occupancy', 'https://img.easemytrip.com/roomimages/EMTHotel-2217006/8/802043804/8020438_0.jpg', '7810', 60),
(177, '103', 'Cozy Room - Breakfast - Single Occupancy', 'https://img.easemytrip.com/roomimages/EMTHotel-2217006/8/802043802/8020438_0.jpg', '8776', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `find_hotel` (`city_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `find_room` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel_list`
--
ALTER TABLE `hotel_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD CONSTRAINT `find_hotel` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `find_room` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
