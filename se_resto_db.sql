CREATE DATABASE se_resto_db CHARACTER SET utf8 COLLATE utf8_general_ci;      
USE se_resto_db; 	

CREATE TABLE `foodmenu` (
  `Food_ID` varchar(2) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `Food_Price` varchar(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `FoodType_ID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `foodmenu` (`Food_ID`, `Food_Name`, `Food_Price`, `image`, `FoodType_ID`) VALUES
('01', 'เตี๋ยวแห้ง', '45', 'เตี๋ยวแห้ง.jpg', '01'),
('02', 'เตี๋ยวต้มส้ม', '45', 'เตี๋ยวต้มส้ม.jpg', '01'),
('03', 'ผัดซีอิ๊วหมู', '50', 'ผัดซีอิ๊วหมู.jpg', '01'),
('04', 'ตำซั่ว', '45', 'ตำซั่ว.jpg', '01'),
('05', 'มะนาวโซดา', '40', 'มะนาวโซดา.jpg', '02'),
('06', 'นมชมพูเย็น', '40', 'นมชนพูเย็น.jpg', '02');



CREATE TABLE `foodtype` (
  `FoodType_ID` varchar(2) NOT NULL,
  `FoodType_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `foodtype` (`FoodType_ID`, `FoodType_Name`) VALUES
('01', 'Food'),
('02', 'Drink');


ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`Food_ID`),
  ADD KEY `FoodType_ID` (`FoodType_ID`);


ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`FoodType_ID`);


ALTER TABLE `foodmenu`
  ADD CONSTRAINT `foodmenu_ibfk_1` FOREIGN KEY (`FoodType_ID`) REFERENCES `foodtype` (`FoodType_ID`);
COMMIT;
