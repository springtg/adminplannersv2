/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : adminplanners

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-11-16 08:27:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dtb_customer`
-- ----------------------------
DROP TABLE IF EXISTS `dtb_customer`;
CREATE TABLE `dtb_customer` (
  `CustomerID` varchar(50) NOT NULL,
  `CompanyName` varchar(100) DEFAULT NULL,
  `CustomerName` varchar(100) DEFAULT NULL,
  `ContactTitle` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Phone` varchar(24) DEFAULT NULL,
  `Fax` varchar(24) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(100) DEFAULT NULL,
  `Birth` varchar(255) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Insert` datetime DEFAULT NULL,
  `Update` datetime DEFAULT NULL,
  `Delete` datetime DEFAULT NULL,
  `Mail` varchar(50) DEFAULT NULL,
  `Group` varchar(50) DEFAULT '-1',
  `Sex` varchar(10) DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Customerid` (`CustomerID`),
  UNIQUE KEY `Mail` (`Mail`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dtb_customer
-- ----------------------------
INSERT INTO `dtb_customer` VALUES ('ALFKI', 'Alfreds Futterkiste', 'Maria Anders', 'Sales Representative', 'Obere Str. 57', 'Berlin', null, '12209', 'Germany', '030-0074321', '030-0076545', '1', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('ANATR', 'Ana Trujillo Emparedados y helados', 'Ana Trujillo', 'Owner', 'Avda. de la Constitucin 2222', 'Mxico D.F.', null, '05021', 'Mexico', '(5) 555-4729', '(5) 555-3745', '2', null, null, null, null, null, '2012-09-07 10:26:53', null, null, 'Tiềm Năng', null, null);
INSERT INTO `dtb_customer` VALUES ('ANTON', 'Antonio Moreno Taquera', 'Antonio Moreno', 'Owner', 'Mataderos  2312', 'Mxico D.F.', null, '05023', 'Mexico', '(5) 555-3932', null, '3', null, null, null, null, null, '2012-08-24 17:17:50', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('AROUT', 'Around the Horn', 'Thomas Hardy', 'Sales Representative', '120 Hanover Sq.', 'London', null, 'WA1 1DP', 'UK', '(171) 555-7788', '(171) 555-6750', '4', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('BERGS', 'Berglunds snabbkp', 'Christina Berglund', 'Order Administrator', 'Berguvsvgen  8', 'Lule', null, 'S-958 22', 'Sweden', '0921-12 34 65', '0921-12 34 67', '5', null, null, null, null, null, '2012-08-24 17:17:53', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('BLAUS', 'Blauer See Delikatessen', 'Hanna Moos', 'Sales Representative', 'Forsterstr. 57', 'Mannheim', null, '68306', 'Germany', '0621-08460', '0621-08924', '6', null, null, null, null, null, '2012-09-07 15:46:19', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('BLONP', 'Blondesddsl pre et fils', 'Frdrique Citeaux', 'Marketing Manager', '24, place Klber', 'Strasbourg', null, '67000', 'France', '88.60.15.31', '88.60.15.32', '7', null, null, null, null, null, '2012-08-24 17:18:05', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('BOLID', 'Blido Comidas preparadas', 'Martn Sommer', 'Owner', 'C/ Araquil, 67', 'Madrid', null, '28023', 'Spain', '(91) 555 22 82', '(91) 555 91 99', '8', null, null, null, null, null, '2012-09-07 10:27:57', null, null, 'Tiềm Năng III', null, null);
INSERT INTO `dtb_customer` VALUES ('BONAP', 'Bon app\'', 'Laurence Lebihan', 'Owner', '12, rue des Bouchers', 'Marseille', null, '13008', 'France', '91.24.45.40', '91.24.45.41', '9', null, null, null, null, null, '2012-09-07 15:46:25', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('BOTTM', 'Bottom-Dollar Markets', 'Elizabeth Lincoln', 'Accounting Manager', '23 Tsawassen Blvd.', 'Tsawassen', 'BC', 'T2F 8M4', 'Canada', '(604) 555-4729', '(604) 555-3745', '10', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('BSBEV', 'B\'s Beverages', 'Victoria Ashworth', 'Sales Representative', 'Fauntleroy Circus', 'London', null, 'EC2 5NT', 'UK', '(171) 555-1212', null, '11', null, null, null, null, null, '2012-08-24 17:18:27', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('CACTU', 'Cactus Comidas para llevar', 'Patricio Simpson', 'Sales Agent', 'Cerrito 333', 'Buenos Aires', null, '1010', 'Argentina', '(1) 135-5555', '(1) 135-4892', '12', null, null, null, null, null, '2012-09-07 15:46:29', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('CENTC', 'Centro comercial Moctezuma', 'Francisco Chang', 'Marketing Manager', 'Sierras de Granada 9993', 'Mxico D.F.', null, '05022', 'Mexico', '(5) 555-3392', '(5) 555-7293', '13', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('CHOPS', 'Chop-suey Chinese', 'Yang Wang', 'Owner', 'Hauptstr. 29', 'Bern', null, '3012', 'Switzerland', '0452-076545', null, '14', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('COMMI', 'Comrcio Mineiro', 'Pedro Afonso', 'Sales Associate', 'Av. dos Lusadas, 23', 'Sao Paulo', 'SP', '05432-043', 'Brazil', '(11) 555-7647', null, '15', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('CONSH', 'Consolidated Holdings', 'Elizabeth Brown', 'Sales Representative', 'Berkeley Gardens 12  Brewery', 'London', null, 'WX1 6LT', 'UK', '(171) 555-2282', '(171) 555-9199', '16', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('DRACD', 'Drachenblut Delikatessen', 'Sven Ottlieb', 'Order Administrator', 'Walserweg 21', 'Aachen', null, '52066', 'Germany', '0241-039123', '0241-059428', '17', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('DUMON', 'Du monde entier', 'Janine Labrune', 'Owner', '67, rue des Cinquante Otages', 'Nantes', null, '44000', 'France', '40.67.88.88', '40.67.89.89', '18', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('EASTC', 'Eastern Connection', 'Ann Devon', 'Sales Agent', '35 King George', 'London', null, 'WX3 6FW', 'UK', '(171) 555-0297', '(171) 555-3373', '19', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('ERNSH', 'Ernst Handel', 'Roland Mendel', 'Sales Manager', 'Kirchgasse 6', 'Graz', null, '8010', 'Austria', '7675-3425', '7675-3426', '20', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FAMIA', 'Familia Arquibaldo', 'Aria Cruz', 'Marketing Assistant', 'Rua Ors, 92', 'Sao Paulo', 'SP', '05442-030', 'Brazil', '(11) 555-9857', null, '21', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FISSA', 'FISSA Fabrica Inter. Salchichas S.A.', 'Diego Roel', 'Accounting Manager', 'C/ Moralzarzal, 86', 'Madrid', null, '28034', 'Spain', '(91) 555 94 44', '(91) 555 55 93', '22', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FOLIG', 'Folies gourmandes', 'Martine Ranc', 'Assistant Sales Agent', '184, chausse de Tournai', 'Lille', null, '59000', 'France', '20.16.10.16', '20.16.10.17', '23', null, null, null, null, null, '2012-08-25 17:22:50', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FOLKO', 'Folk och f HB', 'Maria Larsson', 'Owner', 'kergatan 24', 'Brcke', null, 'S-844 67', 'Sweden', '0695-34 67 21', null, '24', null, null, null, null, null, '2012-08-25 17:22:45', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FRANK', 'Frankenversand', 'Peter Franken', 'Marketing Manager', 'Berliner Platz 43', 'Mnchen', null, '80805', 'Germany', '089-0877310', '089-0877451', '25', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FRANR', 'France restauration', 'Carine Schmitt', 'Marketing Manager', '54, rue Royale', 'Nantes', null, '44000', 'France', '40.32.21.21', '40.32.21.20', '26', null, null, null, null, null, '2012-09-07 15:46:34', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('FRANS', 'Franchi S.p.A.', 'Paolo Accorti', 'Sales Representative', 'Via Monte Bianco 34', 'Torino', null, '10100', 'Italy', '011-4988260', '011-4988261', '27', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('FURIB', 'Furia Bacalhau e Frutos do Mar', 'Lino Rodriguez', 'Sales Manager', 'Jardim das rosas n. 32', 'Lisboa', null, '1675', 'Portugal', '(1) 354-2534', '(1) 354-2535', '28', null, null, null, null, null, '2012-08-25 17:22:37', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('GALED', 'Galera del gastrnomo', 'Eduardo Saavedra', 'Marketing Manager', 'Rambla de Catalua, 23', 'Barcelona', null, '08022', 'Spain', '(93) 203 4560', '(93) 203 4561', '29', null, null, null, null, null, '2012-08-25 17:22:41', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('GODOS', 'Godos Cocina Tpica', 'Jos Pedro Freyre', 'Sales Manager', 'C/ Romero, 33', 'Sevilla', null, '41101', 'Spain', '(95) 555 82 82', null, '30', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('GOURL', 'Gourmet Lanchonetes', 'Andr Fonseca', 'Sales Associate', 'Av. Brasil, 442', 'Campinas', 'SP', '04876-786', 'Brazil', '(11) 555-9482', null, '31', null, null, null, null, null, '2012-08-25 17:22:30', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('GREAL', 'Great Lakes Food Market', 'Howard Snyder', 'Marketing Manager', '2732 Baker Blvd.', 'Eugene', 'OR', '97403', 'USA', '(503) 555-7555', null, '32', null, null, null, null, null, '2012-09-07 15:46:38', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('GROSR', 'GROSELLA-Restaurante', 'Manuel Pereira', 'Owner', '5 Ave. Los Palos Grandes', 'Caracas', 'DF', '1081', 'Venezuela', '(2) 283-2951', '(2) 283-3397', '33', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('HANAR', 'Hanari Carnes', 'Mario Pontes', 'Accounting Manager', 'Rua do Pao, 67', 'Rio de Janeiro', 'RJ', '05454-876', 'Brazil', '(21) 555-0091', '(21) 555-8765', '34', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('HILAA', 'HILARION-Abastos', 'Carlos Hernndez', 'Sales Representative', 'Carrera 22 con Ave. Carlos Soublette #8-35', 'San Cristbal', 'Tchira', '5022', 'Venezuela', '(5) 555-1340', '(5) 555-1948', '35', null, null, null, null, null, '2012-08-25 17:22:19', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('HUNGC', 'Hungry Coyote Import Store', 'Yoshi Latimer', 'Sales Representative', 'City Center Plaza 516 Main St.', 'Elgin', 'OR', '97827', 'USA', '(503) 555-6874', '(503) 555-2376', '36', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('HUNGO', 'Hungry Owl All-Night Grocers', 'Patricia McKenna', 'Sales Associate', '8 Johnstown Road', 'Cork', 'Co. Cork', null, 'Ireland', '2967 542', '2967 3333', '37', null, null, null, null, null, '2012-09-07 15:46:44', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('ISLAT', 'Island Trading', 'Helen Bennett', 'Marketing Manager', 'Garden House Crowther Way', 'Cowes', 'Isle of Wight', 'PO31 7PJ', 'UK', '(198) 555-8888', null, '38', null, null, null, null, null, '2012-08-25 17:23:04', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('KOENE', 'Kniglich Essen', 'Philip Cramer', 'Sales Associate', 'Maubelstr. 90', 'Brandenburg', null, '14776', 'Germany', '0555-09876', null, '39', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LACOR', 'La corne d\'abondance', 'Daniel Tonini', 'Sales Representative', '67, avenue de l\'Europe', 'Versailles', null, '78000', 'France', '30.59.84.10', '30.59.85.11', '40', null, null, null, null, null, '2012-08-25 17:22:14', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LAMAI', 'La maison d\'Asie', 'Annette Roulet', 'Sales Manager', '1 rue Alsace-Lorraine', 'Toulouse', null, '31000', 'France', '61.77.61.10', '61.77.61.11', '41', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LAUGB', 'Laughing Bacchus Wine Cellars', 'Yoshi Tannamuri', 'Marketing Assistant', '1900 Oak St.', 'Vancouver', 'BC', 'V3F 2K1', 'Canada', '(604) 555-3392', '(604) 555-7293', '42', null, null, null, null, null, '2012-08-25 17:22:05', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LAZYK', 'Lazy K Kountry Store', 'John Steel', 'Marketing Manager', '12 Orchestra Terrace', 'Walla Walla', 'WA', '99362', 'USA', '(509) 555-7969', '(509) 555-6221', '43', null, null, null, null, null, '2012-09-07 15:46:53', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('LEHMS', 'Lehmanns Marktstand', 'Renate Messner', 'Sales Representative', 'Magazinweg 7', 'Frankfurt a.M.', null, '60528', 'Germany', '069-0245984', '069-0245874', '44', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LETSS', 'Let\'s Stop N Shop', 'Jaime Yorres', 'Owner', '87 Polk St. Suite 5', 'San Francisco', 'CA', '94117', 'USA', '(415) 555-5938', null, '45', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LILAS', 'LILA-Supermercado', 'Carlos Gonzlez', 'Accounting Manager', 'Carrera 52 con Ave. Bolvar #65-98 Llano Largo', 'Barquisimeto', 'Lara', '3508', 'Venezuela', '(9) 331-6954', '(9) 331-7256', '46', null, null, null, null, null, '2012-08-25 17:22:00', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LINOD', 'LINO-Delicateses', 'Felipe Izquierdo', 'Owner', 'Ave. 5 de Mayo Porlamar', 'I. de Margarita', 'Nueva Esparta', '4980', 'Venezuela', '(8) 34-56-12', '(8) 34-93-93', '47', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('LONEP', 'Lonesome Pine Restaurant', 'Fran Wilson', 'Sales Manager', '89 Chiaroscuro Rd.', 'Portland', 'OR', '97219', 'USA', '(503) 555-9573', '(503) 555-9646', '48', null, null, null, null, null, '2012-08-25 17:23:26', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('MAGAA', 'Magazzini Alimentari Riuniti', 'Giovanni Rovelli', 'Marketing Manager', 'Via Ludovico il Moro 22', 'Bergamo', null, '24100', 'Italy', '035-640230', '035-640231', '49', null, null, null, null, null, '2012-09-07 15:46:49', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('MAISD', 'Maison Dewey', 'Catherine Dewey', 'Sales Agent', 'Rue Joseph-Bens 532', 'Bruxelles', null, 'B-1180', 'Belgium', '(02) 201 24 67', '(02) 201 24 68', '50', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('MEREP', 'Mre Paillarde', 'Jean Fresnire', 'Marketing Assistant', '43 rue St. Laurent', 'Montral', 'Qubec', 'H1J 1C3', 'Canada', '(514) 555-8054', '(514) 555-8055', '51', null, null, null, null, null, '2012-08-25 17:23:16', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('MORGK', 'Morgenstern Gesundkost', 'Alexander Feuer', 'Marketing Assistant', 'Heerstr. 22', 'Leipzig', null, '04179', 'Germany', '0342-023176', null, '52', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('NORTS', 'North/South', 'Simon Crowther', 'Sales Associate', 'South House 300 Queensbridge', 'London', null, 'SW7 1RZ', 'UK', '(171) 555-7733', '(171) 555-2530', '53', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('OCEAN', 'Ocano Atlntico Ltda.', 'Yvonne Moncada', 'Sales Agent', 'Ing. Gustavo Moncada 8585 Piso 20-A', 'Buenos Aires', null, '1010', 'Argentina', '(1) 135-5333', '(1) 135-5535', '54', null, null, null, null, null, '2012-08-25 17:23:20', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('OLDWO', 'Old World Delicatessen', 'Rene Phillips', 'Sales Representative', '2743 Bering St.', 'Anchorage', 'AK', '99508', 'USA', '(907) 555-7584', '(907) 555-2880', '55', null, null, null, null, null, '2012-09-07 15:46:58', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('OTTIK', 'Ottilies Kseladen', 'Henriette Pfalzheim', 'Owner', 'Mehrheimerstr. 369', 'Kln', null, '50739', 'Germany', '0221-0644327', '0221-0765721', '56', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('PARIS', 'Paris spcialits', 'Marie Bertrand', 'Owner', '265, boulevard Charonne', 'Paris', null, '75012', 'France', '(1) 42.34.22.66', '(1) 42.34.22.77', '57', null, null, null, null, null, '2012-08-25 17:21:54', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('PERIC', 'Pericles Comidas clsicas', 'Guillermo Fernndez', 'Sales Representative', 'Calle Dr. Jorge Cash 321', 'Mxico D.F.', null, '05033', 'Mexico', '(5) 552-3745', '(5) 545-3745', '58', null, null, null, null, null, '2012-09-07 15:47:03', null, null, '0', null, null);
INSERT INTO `dtb_customer` VALUES ('PICCO', 'Piccolo und mehr', 'Georg Pipps', 'Sales Manager', 'Geislweg 14', 'Salzburg', null, '5020', 'Austria', '6562-9722', '6562-9723', '59', null, null, null, null, '2012-08-20 11:56:11', '2012-09-01 17:14:23', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('PRINI', 'Princesa Isabel Vinhos', 'Isabel de Castro', 'Sales Representative', 'Estrada da sade n. 58', 'Lisboa', null, '1756', 'Portugal', '(1) 356-5634', null, '60', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('QUEDE', 'Que Delcia', 'Bernardo Batista', 'Accounting Manager', 'Rua da Panificadora, 12', 'Rio de Janeiro', 'RJ', '02389-673', 'Brazil', '(21) 555-4252', '(21) 555-4545', '61', null, null, null, null, null, '2012-08-25 17:21:35', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('QUEEN', 'Queen Cozinha', 'Lcia Carvalho', 'Marketing Assistant', 'Alameda dos Canrios, 891', 'Sao Paulo', 'SP', '05487-020', 'Brazil', '(11) 555-1189', null, '62', null, null, null, null, null, '2012-08-25 17:21:39', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('QUICK', 'QUICK-Stop', 'Horst Kloss', 'Accounting Manager', 'Taucherstrae 10', 'Cunewalde', null, '01307', 'Germany', '0372-035188', null, '63', '', null, null, null, '2012-08-20 11:56:21', '2012-08-24 17:17:07', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('RANCH', 'Rancho grande', 'Sergio Gutirrez', 'Sales Representative', 'Av. del Libertador 900', 'Buenos Aires', null, '1010', 'Argentina', '(1) 123-5555', '(1) 123-5556', '64', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('RATTC', 'Rattlesnake Canyon Grocery', 'Paula Wilson', 'Assistant Sales Representative', '2817 Milton Dr.', 'Albuquerque', 'NM', '87110', 'USA', '(505) 555-5939', '(505) 555-3620', '65', null, null, null, null, null, '2012-08-25 17:21:43', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('REGGC', 'Reggiani Caseifici', 'Maurizio Moroni', 'Sales Associate', 'Strada Provinciale 124', 'Reggio Emilia', null, '42100', 'Italy', '0522-556721', '0522-556722', '66', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('RICAR', 'Ricardo Adocicados', 'Janete Limeira', 'Assistant Sales Agent', 'Av. Copacabana, 267', 'Rio de Janeiro', 'RJ', '02389-890', 'Brazil', '(21) 555-3412', null, '67', null, null, null, null, '2012-08-20 11:56:15', '2012-08-30 14:46:58', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('RICSU', 'Richter Supermarkt', 'Michael Holz', 'Sales Manager', 'Grenzacherweg 237', 'Genve', null, '1203', 'Switzerland', '0897-034214', null, '68', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('ROMEY', 'Romero y tomillo', 'Alejandra Camino', 'Accounting Manager', 'Gran Va, 1', 'Madrid', null, '28001', 'Spain', '(91) 745 6200', '(91) 745 6210', '69', null, null, null, null, null, '2012-08-25 17:21:47', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SANTG', 'Sant Gourmet', 'Jonas Bergulfsen', 'Owner', 'Erling Skakkes gate 78', 'Stavern', null, '4110', 'Norway', '07-98 92 35', '07-98 92 47', '70', null, null, null, null, '2012-08-20 11:56:18', '2012-08-30 14:46:52', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SAVEA', 'Save-a-lot Markets', 'Jose Pavarotti', 'Sales Representative', '187 Suffolk Ln.', 'Boise', 'ID', '83720', 'USA', '(208) 555-8097', null, '71', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SEVES', 'Seven Seas Imports', 'Hari Kumar', 'Sales Manager', '90 Wadhurst Rd.', 'London', null, 'OX15 4NB', 'UK', '(171) 555-1717', '(171) 555-5646', '72', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SIMOB', 'Simons bistro', 'Jytte Petersen', 'Owner', 'Vinbltet 34', 'Kobenhavn', null, '1734', 'Denmark', '31 12 34 56', '31 13 35 57', '73', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SPECD', 'Spcialits du monde', 'Dominique Perrier', 'Marketing Manager', '25, rue Lauriston', 'Paris', null, '75016', 'France', '(1) 47.55.60.10', '(1) 47.55.60.20', '74', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SPLIR', 'Split Rail Beer & Ale', 'Art Braunschweiger', 'Sales Manager', 'P.O. Box 555', 'Lander', 'WY', '82520', 'USA', '(307) 555-4680', '(307) 555-6525', '75', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('SUPRD', 'Suprmes dlices', 'Pascale Cartrain', 'Accounting Manager', 'Boulevard Tirou, 255', 'Charleroi', null, 'B-6000', 'Belgium', '(071) 23 67 22 20', '(071) 23 67 22 21', '76', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('THEBI', 'The Big Cheese', 'Liz Nixon', 'Marketing Manager', '89 Jefferson Way Suite 2', 'Portland', 'OR', '97201', 'USA', '(503) 555-3612', null, '77', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('THECR', 'The Cracker Box', 'Liu Wong', 'Marketing Assistant', '55 Grizzly Peak Rd.', 'Butte', 'MT', '59801', 'USA', '(406) 555-5834', '(406) 555-8083', '78', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('TOMSP', 'Toms Spezialitten', 'Karin Josephs', 'Marketing Manager', 'Luisenstr. 48', 'Mnster', null, '44087', 'Germany', '0251-031259', '0251-035695', '79', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('TORTU', 'Tortuga Restaurante', 'Miguel Angel Paolino', 'Owner', 'Avda. Azteca 123', 'Mxico D.F.', null, '05033', 'Mexico', '(5) 555-2933', null, '80', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('TRADH', 'Tradio Hipermercados', 'Anabela Domingues', 'Sales Representative', 'Av. Ins de Castro, 414', 'Sao Paulo', 'SP', '05634-030', 'Brazil', '(11) 555-2167', '(11) 555-2168', '81', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('TRAIH', 'Trail\'s Head Gourmet Provisioners', 'Helvetius Nagy', 'Sales Associate', '722 DaVinci Blvd.', 'Kirkland', 'WA', '98034', 'USA', '(206) 555-8257', '(206) 555-2174', '82', null, null, null, null, null, '2012-08-25 17:21:22', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('VAFFE', 'Vaffeljernet', 'Palle Ibsen', 'Sales Manager', 'Smagsloget 45', 'rhus', null, '8200', 'Denmark', '86 21 32 43', '86 22 33 44', '83', null, null, null, null, null, '2012-08-25 17:21:18', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('Val2 ', 'IT', 'Val2', 'IT', null, null, null, null, null, null, null, '84', null, null, null, null, null, '2012-08-25 17:21:09', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('VALON', 'IT', 'Valon Hoti', 'IT', null, null, null, null, null, null, null, '85', null, null, null, null, null, '2012-08-25 17:21:29', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('VICTE', 'Victuailles en stock', 'Mary Saveley', 'Sales Agent', '2, rue du Commerce', 'Lyon', null, '69004', 'France', '78.32.54.86', '78.32.54.87', '86', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('VINET', 'Vins et alcools Chevalier', 'Paul Henriot', 'Accounting Manager', '59 rue de l\'Abbaye', 'Reims', null, '51100', 'France', '26.47.15.10', '26.47.15.11', '87', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WANDK', 'Die Wandernde Kuh', 'Rita Mller', 'Sales Representative', 'Adenauerallee 900', 'Stuttgart', null, '70563', 'Germany', '0711-020361', '0711-035428', '88', null, null, null, null, null, '2012-08-25 17:21:13', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WARTH', 'Wartian Herkku', 'Pirkko Koskitalo', 'Accounting Manager', 'Torikatu 38', 'Oulu', null, '90110', 'Finland', '981-443655', '981-443655', '89', null, null, null, null, null, '2012-08-25 17:21:06', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WELLI', 'Wellington Importadora', 'Paula Parente', 'Sales Manager', 'Rua do Mercado, 12', 'Resende', 'SP', '08737-363', 'Brazil', '(14) 555-8122', null, '90', null, null, null, null, null, '2012-08-25 17:21:04', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WHITC', 'White Clover Markets', 'Karl Jablonski', 'Owner', '305 - 14th Ave. S. Suite 3B', 'Seattle', 'WA', '98128', 'USA', '(206) 555-4112', '(206) 555-4115', '91', null, null, null, null, null, '2012-08-25 17:21:00', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WILMK', 'Wilman Kala', 'Matti Karttunen', 'Owner/Marketing Assistant', 'Keskuskatu 45', 'Helsinki', null, '21240', 'Finland', '90-224 8858', '90-224 8858', '92', null, null, null, null, null, '2012-08-25 17:20:55', null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('WOLZA', 'Wolski  Zajazd', 'Zbyszek Piestrzeniewicz', 'Owner', 'ul. Filtrowa 68', 'Warszawa', null, '01-012', 'Poland', '(26) 642-7012', '(26) 642-7012', '93', null, null, null, null, null, null, null, null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('', '', null, null, null, null, null, null, null, null, null, '94', 'bad', null, null, null, '2012-08-21 15:08:31', '2012-08-23 05:27:17', '2012-08-30 10:35:56', null, '-1', null, null);
INSERT INTO `dtb_customer` VALUES ('20120913033910', '', 'khuong', null, 'hcm', null, null, null, null, '0985949230', null, '95', null, '1987', 'shaphia', null, '2012-09-13 08:39:10', null, null, 'khuong@abc.com', '-1', '1', null);
INSERT INTO `dtb_customer` VALUES ('20120913041501', '', 'abc', null, '181/19 hồng lạc p10 q tân bình', null, null, null, null, '0988877777', null, '96', null, '1987/11/09', 'abc', null, '2012-09-13 09:15:01', null, null, 'khuongxuantruong@zing.vn', '-1', '1', null);
INSERT INTO `dtb_customer` VALUES ('20120913042317', '', 'abc', null, '181/19 hồng lạc p10 q tân bình', null, null, null, null, '0988877777', null, '97', null, '1987/11/09', 'abc', null, '2012-09-13 09:23:17', null, null, 'truong.khuong@xgo.vn', '-1', '1', null);
INSERT INTO `dtb_customer` VALUES ('20120913103235', '', 'acb', null, 'b', null, null, null, null, 'b', null, '98', null, 'b', 'abc', null, '2012-09-13 15:32:35', null, null, 'khuongxiantruong@zing.vn', '-1', '1', null);
INSERT INTO `dtb_customer` VALUES ('G20120913104703', '', 'khuongxuantruong', null, null, null, null, null, null, '0988999888', null, '107', null, '11/09/1987', null, 'Google', '2012-09-13 15:47:03', '2012-09-29 05:57:17', null, 'khuongxuantruong@gmail.com', '-1', '1', 'http://localhost/AdminPlanners1.0/deal_css/images/google1.png');
INSERT INTO `dtb_customer` VALUES ('G20120913104904', '', 'Tuan Nguyen', null, null, null, null, null, null, null, null, '108', null, null, null, 'Yahoo', '2012-09-13 15:49:04', null, null, 'taotuan87@yahoo.com', '-1', null, 'http://localhost/AdminPlanners1.0/deal_css/images/messenger_yahoo.png');
INSERT INTO `dtb_customer` VALUES ('Y120928121956000000', '', 'namtuoc bongdem', null, null, null, null, null, null, null, null, '109', null, null, null, 'Yahoo', '2012-09-27 09:19:32', null, null, 'namtuoc_bongdem651@yahoo.com', '-1', null, 'http://localhost/AdminPlanners1.0/deal_css/images/messenger_yahoo.png');
