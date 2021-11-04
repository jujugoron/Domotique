EESchema Schematic File Version 4
EELAYER 30 0
EELAYER END
$Descr A4 11693 8268
encoding utf-8
Sheet 1 1
Title ""
Date ""
Rev ""
Comp ""
Comment1 ""
Comment2 ""
Comment3 ""
Comment4 ""
$EndDescr
$Comp
L Connector_Generic:Conn_01x02 J3
U 1 1 6180FEB6
P 8100 1500
F 0 "J3" H 8180 1492 50  0000 L CNN
F 1 "Conn_01x02" H 8180 1401 50  0000 L CNN
F 2 "Connector_PinHeader_2.54mm:PinHeader_1x02_P2.54mm_Vertical" H 8100 1500 50  0001 C CNN
F 3 "~" H 8100 1500 50  0001 C CNN
	1    8100 1500
	1    0    0    -1  
$EndComp
Wire Wire Line
	6000 1650 5950 1650
Wire Wire Line
	5950 1650 5950 1500
Connection ~ 5950 1650
Wire Wire Line
	5950 1500 7400 1500
Wire Wire Line
	7900 1850 7400 1850
Wire Wire Line
	7400 1850 7400 1500
Connection ~ 7400 1500
Wire Wire Line
	7400 1500 7900 1500
Wire Wire Line
	7900 2550 8050 2550
Wire Wire Line
	8050 2550 8050 1850
Wire Wire Line
	8050 1750 7900 1750
Wire Wire Line
	7900 1750 7900 1600
Wire Wire Line
	7400 2350 7400 1900
Wire Wire Line
	7400 1900 7200 1900
Wire Wire Line
	7200 1900 7200 1650
Wire Wire Line
	7900 2650 8750 2650
Wire Wire Line
	8750 2650 8750 1350
Wire Wire Line
	8750 1350 5150 1350
Wire Wire Line
	5150 1350 5150 2050
Wire Wire Line
	5150 2050 5300 2050
Wire Wire Line
	7400 2750 7050 2750
Wire Wire Line
	7050 2750 7050 4250
Wire Wire Line
	7900 2750 8800 2750
Wire Wire Line
	8800 2750 8800 1300
Wire Wire Line
	8800 1300 5100 1300
Wire Wire Line
	5100 1300 5100 2150
Wire Wire Line
	5100 2150 5300 2150
Wire Wire Line
	5750 2850 5750 2450
Wire Wire Line
	5750 2450 5300 2450
Wire Wire Line
	7900 2850 8900 2850
Wire Wire Line
	8900 2850 8900 1200
Wire Wire Line
	8900 1200 5000 1200
Wire Wire Line
	5000 1200 5000 2550
$Comp
L Connector_Generic:Conn_02x06_Odd_Even J1
U 1 1 61835B69
P 7600 2550
F 0 "J1" H 7650 2967 50  0000 C CNN
F 1 "Conn_02x06_Odd_Even" H 7650 2876 50  0000 C CNN
F 2 "Connector_PinHeader_2.54mm:PinHeader_2x06_P2.54mm_Vertical" H 7600 2550 50  0001 C CNN
F 3 "~" H 7600 2550 50  0001 C CNN
	1    7600 2550
	1    0    0    -1  
$EndComp
Connection ~ 6300 1650
Wire Wire Line
	6300 1650 7200 1650
Wire Wire Line
	6200 1650 6300 1650
Connection ~ 5900 4250
Wire Wire Line
	6000 4250 5900 4250
Wire Wire Line
	5950 1650 5900 1650
Connection ~ 6000 4250
Connection ~ 6100 4250
Wire Wire Line
	6100 4250 6000 4250
Wire Wire Line
	6200 4250 6100 4250
Connection ~ 6200 4250
Connection ~ 6300 4250
Wire Wire Line
	6300 4250 6200 4250
Wire Wire Line
	6400 4250 6300 4250
Connection ~ 6400 4250
Connection ~ 5800 4250
Wire Wire Line
	5900 4250 5800 4250
Wire Wire Line
	5800 4250 5700 4250
Wire Wire Line
	6400 4250 6450 4250
Wire Wire Line
	5750 2850 7400 2850
Wire Wire Line
	5000 2550 5300 2550
$Comp
L Connector:Raspberry_Pi_2_3 J2
U 1 1 618062FD
P 6100 2950
F 0 "J2" H 6100 4431 50  0000 C CNN
F 1 "Raspberry_Pi_2_3" H 6100 4340 50  0000 C CNN
F 2 "Connector_PinSocket_2.54mm:PinSocket_2x20_P2.54mm_Vertical" H 6100 2950 50  0001 C CNN
F 3 "https://www.raspberrypi.org/documentation/hardware/raspberrypi/schematics/rpi_SCH_3bplus_1p0_reduced.pdf" H 6100 2950 50  0001 C CNN
	1    6100 2950
	1    0    0    -1  
$EndComp
Wire Wire Line
	7900 1850 7900 2350
Connection ~ 7900 2350
Wire Wire Line
	7900 2350 7900 2450
Text Label 7150 2850 0    50   ~ 0
reset
NoConn ~ 7400 2450
NoConn ~ 7400 2550
$Comp
L power:GND #PWR?
U 1 1 6184D882
P 8050 1850
F 0 "#PWR?" H 8050 1600 50  0001 C CNN
F 1 "GND" V 8055 1722 50  0000 R CNN
F 2 "" H 8050 1850 50  0001 C CNN
F 3 "" H 8050 1850 50  0001 C CNN
	1    8050 1850
	0    -1   -1   0   
$EndComp
Connection ~ 8050 1850
Wire Wire Line
	8050 1850 8050 1750
$Comp
L power:GND #PWR?
U 1 1 6184DD94
P 6450 4250
F 0 "#PWR?" H 6450 4000 50  0001 C CNN
F 1 "GND" H 6455 4077 50  0000 C CNN
F 2 "" H 6450 4250 50  0001 C CNN
F 3 "" H 6450 4250 50  0001 C CNN
	1    6450 4250
	1    0    0    -1  
$EndComp
Connection ~ 6450 4250
Wire Wire Line
	6450 4250 7050 4250
Text Label 7950 2850 0    50   ~ 0
SW1
NoConn ~ 7400 2650
$EndSCHEMATC
