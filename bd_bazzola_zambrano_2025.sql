-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2025 at 01:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_bazzola_zambrano_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion_categoria`) VALUES
(1, 'Alimento'),
(2, 'Medicamentos'),
(3, 'Juguetes'),
(4, 'Accesorios'),
(5, 'Higiene'),
(6, 'Perro'),
(7, 'Gato');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id_categorias_producto` int(11) NOT NULL,
  `id_producto_categorias_productos` int(11) NOT NULL,
  `id_categoria_categorias_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias_productos`
--

INSERT INTO `categorias_productos` (`id_categorias_producto`, `id_producto_categorias_productos`, `id_categoria_categorias_productos`) VALUES
(45, 21, 1),
(46, 22, 1),
(61, 20, 1),
(62, 20, 6),
(63, 23, 1),
(64, 23, 6),
(69, 16, 1),
(70, 16, 6),
(74, 18, 3),
(75, 18, 6),
(76, 18, 7),
(80, 17, 3),
(81, 17, 7),
(82, 17, 6),
(83, 19, 3),
(84, 19, 6),
(85, 19, 7),
(88, 24, 7),
(89, 24, 1),
(90, 25, 1),
(91, 25, 7),
(92, 26, 1),
(93, 26, 7),
(94, 27, 1),
(95, 27, 7),
(96, 28, 1),
(97, 28, 7),
(98, 29, 1),
(99, 29, 7),
(100, 30, 1),
(101, 30, 7),
(106, 33, 1),
(107, 33, 6),
(108, 34, 7),
(109, 34, 1),
(110, 35, 1),
(111, 35, 7),
(112, 36, 6),
(113, 36, 1),
(116, 37, 4),
(117, 37, 6),
(118, 38, 5),
(119, 38, 6),
(120, 38, 4),
(124, 39, 4),
(125, 39, 7),
(126, 39, 6),
(127, 40, 3),
(128, 40, 1),
(129, 40, 6),
(130, 41, 3),
(131, 41, 6),
(132, 32, 1),
(133, 32, 6),
(134, 32, 2),
(135, 31, 1),
(136, 31, 6),
(137, 31, 2),
(138, 42, 6),
(139, 42, 7),
(140, 42, 5),
(141, 42, 2),
(142, 43, 7),
(143, 43, 6),
(144, 43, 2),
(145, 44, 7),
(146, 44, 6),
(147, 44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL,
  `detalle_subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`, `detalle_subtotal`) VALUES
(1, 16, 1, 22000, 22000),
(1, 18, 1, 13, 13),
(1, 19, 2, 13, 25),
(2, 17, 2, 13, 25),
(3, 16, 2, 22000, 44000),
(4, 20, 1, 6000, 6000),
(4, 21, 1, 3000, 3000),
(4, 22, 1, 41000, 41000),
(5, 20, 1, 6000, 6000),
(6, 16, 1, 22000, 22000),
(7, 16, 1, 22000, 22000),
(8, 16, 1, 22000, 22000),
(9, 17, 1, 13, 13),
(10, 16, 1, 22000, 22000),
(11, 16, 1, 22000, 22000),
(12, 17, 2, 13, 25),
(13, 17, 2, 13, 25),
(14, 16, 1, 22000, 22000),
(15, 31, 5, 60000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `descripcion_marca`) VALUES
(1, 'Pedigree'),
(2, 'Whiskas'),
(3, 'Dr Perrot'),
(4, 'Cat Chow'),
(5, 'Agility'),
(6, 'Zootec');

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre_mensaje` varchar(50) NOT NULL,
  `email_mensaje` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_mensaje` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `nombre_mensaje`, `email_mensaje`, `mensaje`, `fecha_mensaje`) VALUES
(10, 'juan perez', 'juanperez@gmail.com', 'mensaje de prueba ', '2025-06-12'),
(11, 'Marcos', 'marcos@gmail.com', 'Hola buenas quisiera saber si venden ropa de las tortugas ninja para mi tortuga', '2025-06-19'),
(12, 'Marcos', 'marcos@gmail.com', 'Hola buenas quisiera saber si venden ropa de las tortugas ninja para mi tortuga', '2025-06-19'),
(13, 'Marcos', 'marcos@gmail.com', 'Hola buenas quisiera saber si venden ropa de las tortugas ninja para mi tortuga', '2025-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'cliente'),
(2, 'empleado');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(1000) NOT NULL,
  `id_marca_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `precio_producto` float NOT NULL,
  `imagen_producto` varchar(200) NOT NULL,
  `estado_producto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `id_marca_producto`, `stock_producto`, `precio_producto`, `imagen_producto`, `estado_producto`) VALUES
(16, 'Bolsa de Dr.Perrot 20kg', 'Bolsa de Alimento 20kg Dr Perrot. Perro Adulto.\r\nIngredientes: Maíz, afrechillo de trigo, harina de carne y huesos bovina, pellet de soja, harina de soja desactivado, arroz, harina de subproductos de pollo, gluten de maíz, aceite de pollo, hidrolizado de menudencias vacunas, porcinas y aviares, zeolita, fibras de maíz, pulpa de remolacha, harina de trigo, aceite de girasol alto oleico, harina de pescado, sal, levadura de cerveza, extracto de Yucca schidigera.', 3, 11, 22000, '1749735374_5925eebc723e54458017.png', 1),
(17, 'Pelota Leon', 'La Pelota León es el juguete perfecto para que tu mascota se divierta sin parar. Fabricada con materiales resistentes y seguros, garantiza horas de juego activo y estimulación mental. Su diseño atractivo y tamaño ideal la hacen perfecta para perros  y gatos de todas las edades. Además, ayuda a mantener a tu mascota activa y feliz mientras fortalece su mordida y coordinación. ', 6, 21, 1000, '1749236644_b33cb4c09d834a956a51.jpg', 1),
(18, 'Pelota Tigre', 'La Pelota Tigre es el juguete perfecto para que tu mascota se divierta sin parar. Fabricada con materiales resistentes y seguros, garantiza horas de juego activo y estimulación mental. Su diseño atractivo y tamaño ideal la hacen perfecta para perros  y gatos de todas las edades. Además, ayuda a mantener a tu mascota activa y feliz mientras fortalece su mordida y coordinación. ', 6, 20, 1000, '1749236697_54665aa688d4810ffb6a.jpg', 1),
(19, 'Pelota Mono', 'La Pelota Mono es el juguete perfecto para que tu mascota se divierta sin parar. Fabricada con materiales resistentes y seguros, garantiza horas de juego activo y estimulación mental. Su diseño atractivo y tamaño ideal la hacen perfecta para perros  y gatos de todas las edades. Además, ayuda a mantener a tu mascota activa y feliz mientras fortalece su mordida y coordinación. ', 6, 5, 1000, '1749236775_6072896120044aa2d056.jpg', 1),
(20, 'Bolsa de Pedigree 3kg', 'Bolsa de Alimento 3kg. Pedigree. Perro Adulto.', 1, 23, 6000, '1749736776_2270f3139c8809163d85.avif', 1),
(21, 'Bolsa de Pedigree 1.5kg', 'Bolsa de Alimento 1.5kg. Pedigree. Perro Adulto.', 1, 19, 3000, '1749737107_b281301906f97ffff350.avif', 1),
(22, 'Bolsa de Pedigree 21kg', 'Bolsa de Alimento 21kg. Pedigree. Perro Adulto.', 1, 19, 41000, '1749737175_e24b0d5b858778572bb5.avif', 1),
(23, 'Bolsa de Agility Adultos 3kg', 'Bolsa de Agility Adultos 3kg. Talla mediana.', 5, 23, 5000, '1750170821_538dff0b2798c811eb73.webp', 1),
(24, 'Bolsa de Whiskas gatito 1kg', 'Nueva receta, cuidadosamente preparada para satisfacer las necesidades nutricionales de su gato. Alimento para gatos 100% completo y balanceado. Fibras múltiples apoyan el funcionamiento gastrointestinal, contribuyendo a la formación de heces firmes y fáciles de limpiar. Recomendado por Waltham Petcare Science Institute - Una de las autoridades mundiales líderes en nutrición, cuidado y bienestar animal', 2, 20, 5000, '1750342647_99be43e30fe1dfeb8dde.avif', 1),
(25, 'Bolsa de Whiskas Adulto sabor carne 1kg', 'Nueva receta, cuidadosamente preparada para satisfacer las necesidades nutricionales de su gato. Alimento para gatos 100% completo y balanceado. Fibras múltiples apoyan el funcionamiento gastrointestinal, contribuyendo a la formación de heces firmes y fáciles de limpiar. Recomendado por Waltham Petcare Science Institute - Una de las autoridades mundiales líderes en nutrición, cuidado y bienestar animal', 2, 20, 5000, '1750343145_fd761c3ac86a2f4b8414.avif', 1),
(26, 'Bolsa de Whiskas Adulto sabor pollo 1kg', 'Nueva receta, cuidadosamente preparada para satisfacer las necesidades nutricionales de su gato. Alimento para gatos 100% completo y balanceado. Fibras múltiples apoyan el funcionamiento gastrointestinal, contribuyendo a la formación de heces firmes y fáciles de limpiar. Recomendado por Waltham Petcare Science Institute - Una de las autoridades mundiales líderes en nutrición, cuidado y bienestar animal', 2, 20, 5000, '1750343208_502500624d3aa64ef4c5.avif', 1),
(27, 'Bolsa de Whiskas Adulto sabor pescado 1kg', 'Nueva receta, cuidadosamente preparada para satisfacer las necesidades nutricionales de su gato. Alimento para gatos 100% completo y balanceado. Fibras múltiples apoyan el funcionamiento gastrointestinal, contribuyendo a la formación de heces firmes y fáciles de limpiar. Recomendado por Waltham Petcare Science Institute - Una de las autoridades mundiales líderes en nutrición, cuidado y bienestar animal', 2, 20, 5000, '1750343274_c11a013842da33cda674.avif', 1),
(28, 'Whiskas sobrecito para gato carne en salsa', 'Whiskas sabor carne en salsa – alimento balanceado completo para gatos adultos (húmedo).\r\nIngredientes: Agua, menudencias (bovinas y/o porcinas y/o de pollo), subproductos (de pollo y/o bovinos y/o porcinos), plasma bovino, harina de trigo, harina de subproductos de pollo y/o arveja en polvo y/o gluten de trigo, espesantes (goma xántica y/o almidón modificado), estabilizantes (tripolifosfato de sodio), vitaminas (D, E, B1, B2, B6, ácido fólico, colina y/o ácido ascórbico), minerales (cloruro de sodio, cloruro de potasio y/o fosfato dicálcico, carbonato de calcio, iodato de calcio, óxido de zinc, óxido de magnesio, sulfato de manganeso, sulfato de cobre), aminoácidos (taurina y/o glicina y/o metionina), colorante (caramelo, hemoglobina), saborizante (xilosa y/o dextrosa).', 2, 30, 1000, '1750343825_a5d66ad517f1a72fd14d.avif', 1),
(29, 'Whiskas sobrecito para gato sardina en salsa', 'Whiskas sabor sardina en salsa – alimento balanceado completo para gatos adultos (húmedo).\r\nIngredientes: Agua, menudencias (bovinas y/o porcinas y/o de pollo), subproductos (de pollo y/o bovinos y/o porcinos), plasma bovino, harina de trigo, harina de subproductos de pollo y/o arveja en polvo y/o gluten de trigo, espesantes (goma xántica y/o almidón modificado), estabilizantes (tripolifosfato de sodio), vitaminas (D, E, B1, B2, B6, ácido fólico, colina y/o ácido ascórbico), minerales (cloruro de sodio, cloruro de potasio y/o fosfato dicálcico, carbonato de calcio, iodato de calcio, óxido de zinc, óxido de magnesio, sulfato de manganeso, sulfato de cobre), aminoácidos (taurina y/o glicina y/o metionina), colorante (caramelo, hemoglobina), saborizante (xilosa y/o dextrosa).', 2, 30, 1000, '1750343983_5b963b3987a750ed198a.avif', 1),
(30, 'Whiskas sobrecito para gato salmon en salsa', 'Whiskas sabor salmon en salsa – alimento balanceado completo para gatos adultos (húmedo).\r\nIngredientes: Agua, menudencias (bovinas y/o porcinas y/o de pollo), subproductos (de pollo y/o bovinos y/o porcinos), plasma bovino, harina de trigo, harina de subproductos de pollo y/o arveja en polvo y/o gluten de trigo, espesantes (goma xántica y/o almidón modificado), estabilizantes (tripolifosfato de sodio), vitaminas (D, E, B1, B2, B6, ácido fólico, colina y/o ácido ascórbico), minerales (cloruro de sodio, cloruro de potasio y/o fosfato dicálcico, carbonato de calcio, iodato de calcio, óxido de zinc, óxido de magnesio, sulfato de manganeso, sulfato de cobre), aminoácidos (taurina y/o glicina y/o metionina), colorante (caramelo, hemoglobina), saborizante (xilosa y/o dextrosa).', 2, 30, 1000, '1750344063_a76251e2d9ad9bcdc6f3.avif', 1),
(31, 'Bolsa de Agility Derma Control 15kg', 'Agility Adultos Derma Control es un alimento especialmente formulado con proteína de cerdo, que por su baja alergenicidad ayuda a disminuir las probabilidades de aparición de alteraciones en la piel y sistema digestivo.\r\n\r\nDebido a su bajo porcentaje de grasas saturadas ayuda a desarrollar una masa muscular magra, favoreciendo una condición corporal ideal y un estado general óptimo. Su exclusiva fórmula está basada en la tecnología Active Health: una combinación de nutrientes minuciosamente seleccionados para que tu perro mantenga siempre su máximo potencial.', 5, 5, 60000, '1750344216_f4e68205a5f4c81e76ac.png', 1),
(32, 'Bolsa de Agility Control de peso 15kg', 'Agility Control de peso es un alimento especialmente formulado para perros con tendencia al sobrepeso. Combina una dieta nutritiva y reducida en calorías que favorece un descenso de peso saludable y contribuye a evitar la pérdida de masa muscular en el proceso. La eﬁcacia de sus ﬁbras naturales logran generar sensación de saciedad por tiempo prolongado, limitando el consumo de calorías. Mantiene al perro activo, sano y esbelto. Su exclusiva fórmula está basada en la  ', 5, 10, 60000, '1750344485_1f2923aa861f8edbf9d7.png', 1),
(33, 'Bolsa de Agility Cachorro 15kg', 'Durante el primer año de vida es fundamental que el cachorro reciba una alimentación con todos los nutrientes clave para su crecimiento.\r\n\r\nAgility Cachorros está diseñado especialmente para cubrir sus requerimientos nutricionales y brindarle una vida saludable. Contiene un nivel energético y proteico ideal, necesario para la primera etapa de vida', 5, 10, 61000, '1750344562_689a396f579a92e27099.webp', 1),
(34, 'Bolsa de Agility Kitten 15kg', 'Durante el primer año de vida es fundamental que el gatito reciba una alimentación con todos los nutrientes clave para su crecimiento. Agility Kitten está diseñado especialmente para cubrir sus requerimientos nutricionales y brindarle una vida saludable. Contiene un aporte energético y proteico ideal, necesario para la primera etapa de vida.\r\n\r\nSu fórmula está basada en la exclusiva tecnología Active Health: una combinación de nutrientes minuciosamente seleccionados para que tu gatito alcance su máximo potencial. También indicado para hembras gestantes y lactantes, quienes necesitan un aporte mayor de estos macronutrientes (proteínas y grasas).', 5, 10, 70000, '1750344625_d917c4d4e4f7b4714a3d.webp', 1),
(35, 'Bolsa de Agility Urinary 10kg', 'Los gatos adultos con tendencia a alteraciones urinarias necesitan de una alimentación completa y equilibrada que cubra sus requerimientos nutricionales y les brinde salud y vitalidad.\r\n\r\nAgility Cats Urinary es una fórmula exclusivamente diseñada con ingredientes de alta calidad, basada en la tecnología Active Health: una óptima combinación de nutrientes minuciosamente establecidos que ayudan a controlar el ph urinario, reducir la formación de cálculos y mantenener la salud del tracto urinario inferior.', 5, 10, 70000, '1750344692_c10e61c41eca931c52c9.jpg', 1),
(36, 'Agility cachorro alimento humedo sabor carne vacuna', 'Alimento húmedo 100 % completo y balanceado para perros cachorros con carne vacuna seleccionada. Alimento balanceado completo húmedo, cocido al vapor, resultado de una mezcla equilibrada de macronutrientes, micronutrientes y aditivos de la más alta calidad que cubren los requerimientos alimenticios de los perros cachorros (desde el destete hasta los 12/15 meses).', 5, 15, 3500, '1750344987_262dad0ffeb1aa0b0855.webp', 1),
(37, 'Piloto Capa Lluvia Perro Impermeable', 'Descripción del producto:\r\n*Este modelo permite una colocación símple y rápida, ideal para perros viejitos y/o de gran porte, ya que no es necesario pasar las patitas por una manga\r\n*Pecho REGULABLE, lo que permite ajustarlo cómodamente al contorno de la mascota.\r\n*Confeccionado en tela impermeable, súper resistente\r\n*Interior íntegramente forrado\r\n*Ojal en el lomo para pase de correa\r\n*Capucha cómoda\r\n*Impermeables 100%', 6, 5, 62000, '1750373407_928af3b5f0b615fcb3f3.webp', 1),
(38, 'Bandeja Sanitaria Perros ', 'Bandeja sanitaria para perros, ideal para mantener la higiene del hogar. Fabricada con materiales resistentes y de fácil limpieza. Incluye accesorios que facilitan el entrenamiento y la adaptación de tu mascota. Diseñada para brindar comodidad, reducir olores y promover hábitos saludables en tu perro.', 6, 3, 58000, '1750373559_747def1baaaef95d841d.webp', 1),
(39, 'Bolso Transportador Mascota', 'Ventilación segura\r\n• Cintas reflectivas para identificación del bolso transportador por la noche.\r\n• Correa cómoda, el usuario no se sentirá incómodo para usarlo durante el viaje.\r\n• Tiene bolsillos donde puede colocar objetos que necesiten.\r\n• El cinturón de mano se ajusta a la curva de las manos, que pueden proporcionar la sensación cómoda de la mano, y no te sientas cansado después de llévala mucho tiempo.\r\n• Adecuado para gatos cuyo peso no supere los 6,5 kg y perros en los 5 kg\r\n', 6, 5, 79300, '1750373634_f4e81d273834b7d8b546.webp', 1),
(40, 'Pelota Irregular Dispensador Rellenable ', 'Pelota Irregular Dispensador Rellenable. Estos juguetes, además de proporcionar diversión, permiten rellenarlos con snacks saludables para hacer todo más entretenido y sano. Son juguetes dispensadores de comida.\r\nJugar reduce el estrés de tu mascota. Encontrar un espacio lúdico no solo reduce su estrés, sino que también estimula su inteligencia. Y seguramente ambos pasen un momento super divertido!\r\nTIP. El tipo de alimento que le pongas va a hacer a la dificultad. Más fácil, alimentos pequeños. Más difícil, trozos más grandes. Que se diviertan', 6, 5, 21200, '1750373864_2ddedb6a64e8b490976e.webp', 1),
(41, 'Mordedor Rueda Grande', 'El juguete se caracteriza por ser de excelente calidad.\r\n\r\nEs lavables y durables. Ideal para perros chicos o poco mordedores (no te olvides de consultarnos por juguetes para perros grandes, mordedores y/o cachorros).\r\nDivertidos diseños.\r\nTIP de Responsabilidad: Supervisa tu mascota mientras juega, aprovecha ese tiempo para formar un vínculo con ella y de paso evitar accidentes!', 6, 5, 15000, '1750374012_45ab8564bf601e33a5c7.webp', 1),
(42, 'Shampoo Medicado Hipoalergénico', 'Higiene general hipoalergénico, antiséptico, antiseborreico, antipruriginoso. Cicatrizante, suavizante, dermatitis-dermatosis descamativas. Dejar actuar 5 minutos. Repetir el baño cada 7 días. Para caninos y felinos', 3, 10, 6720, '1750374363_b2150737fa4e3736226d.png', 1),
(43, 'Crema 6A', 'Indicado para el tratamiento de lesiones cutáneas en perros y gatos, ya sea que presenten infección o no. Su uso es efectivo en casos de otitis aguda o crónica, ayudando a reducir la inflamación y el malestar del animal. También se recomienda en lesiones pruriginosas que causan picazón intensa, proporcionando alivio y favoreciendo la regeneración de la piel. Es apto para todas las formas de dermatitis que no sean de origen viral ni tuberculoso, tales como dermatitis alérgicas, bacterianas, seborreicas o por contacto. Su fórmula ayuda a controlar la proliferación bacteriana, aliviar el enrojecimiento y mejorar la calidad de vida del paciente dermatológico.', 3, 5, 10420, '1750374525_8e72540b38733682b2ed.png', 1),
(44, 'Algen 20 Mg 20 Ml', 'Algen 20 es una solución inyectable estéril que contiene tramadol clorhidrato (2000 mg/100 ml), diseñada para perros, gatos y caballos. Su acción analgésica dual —agonista μ y bloqueo de recaptación de noradrenalina y serotonina— proporciona alivio del dolor somático y visceral moderado a severo, tanto agudo como crónico. Se utiliza en control postquirúrgico y como parte de protocolos preanestésicos. La dosis recomendada es de 1–2 mg/kg cada 6–8 h, vía SC, IM, IV lenta o epidural. Al ser cardiovascularmente estable, es una opción segura incluso en pacientes cardiópatas.', 3, 5, 18937, '1750374626_5d209ba7e9ae73ed0598.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `dni_usuario` int(11) NOT NULL,
  `domicilio_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `contraseña_usuario` varchar(300) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL,
  `telefono_usuario` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `dni_usuario`, `domicilio_usuario`, `email_usuario`, `contraseña_usuario`, `estado_usuario`, `telefono_usuario`, `perfil_id`) VALUES
(8, 'full animal', 'administrador', 0, '', 'admin@tienda.com', '$2y$10$jFS2onakGo4X.lufNAKf/uhx5z09B1LvCSiSpHNw9FR0YQBvyrB96', 1, 0, 2),
(9, 'Marcos', 'Mazzanti', 45676321, 'casita de marcos', 'marcos@gmail.com', '$2y$10$XloL2Fb1aZV2mDJ6AJMRxORg0KA8rfl.bHhMQRL2dIJuuO4PgUOx.', 1, 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `venta_fecha` date NOT NULL,
  `venta_total` decimal(10,0) NOT NULL,
  `venta_forma_pago` text NOT NULL,
  `venta_forma_entrega` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`venta_id`, `id_cliente`, `venta_fecha`, `venta_total`, `venta_forma_pago`, `venta_forma_entrega`) VALUES
(1, 9, '2025-06-17', 22038, 'efectivo', 1),
(2, 9, '2025-06-17', 25, 'transferencia', 0),
(3, 9, '2025-06-17', 44000, 'efectivo', 1),
(4, 9, '2025-06-17', 50000, 'efectivo', 0),
(5, 9, '2025-06-17', 6000, 'efectivo', 0),
(6, 9, '2025-06-17', 22000, 'efectivo', 0),
(7, 9, '2025-06-17', 22000, 'efectivo', 0),
(8, 9, '2025-06-17', 22000, 'efectivo', 0),
(9, 9, '2025-06-17', 13, 'efectivo', 0),
(10, 9, '2025-06-17', 22000, 'efectivo', 0),
(11, 9, '2025-06-17', 22000, 'efectivo', 0),
(12, 9, '2025-06-17', 25, 'efectivo', 0),
(13, 9, '2025-06-19', 25, 'Efectivo', 0),
(14, 9, '2025-06-19', 22000, 'Tarjeta de credito', 0),
(15, 9, '2025-06-19', 300000, 'Efectivo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id_categorias_producto`),
  ADD KEY `id_categoria` (`id_categoria_categorias_productos`),
  ADD KEY `id_producto` (`id_producto_categorias_productos`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca_producto` (`id_marca_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id_categorias_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD CONSTRAINT `categorias_productos_ibfk_1` FOREIGN KEY (`id_categoria_categorias_productos`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `categorias_productos_ibfk_2` FOREIGN KEY (`id_producto_categorias_productos`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`venta_id`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_marca_producto`) REFERENCES `marcas` (`id_marca`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`);

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
