# ITC Summer 2018 - IoT
Developed based on the scientific research topic code TSV2017-12 of an Can Tho University student team.
* Demo: /// (coming soon)

## Installation Web App
- Go to /application/config/database.php
- Edit field: hostname - username - password - database (from line 78 to line 81)
- Go to /diemdanh_nckh_official.sql
- Import diemdanh_nckh_official.sql to mysql with database name like line 81 of /application/config/database.php
- Go to /application/config/config.php
- Edit field: $config['base_url'] (line 27) as localhost/host ip or address
- View at address/ip like base_url

## Technology/Library
### WebApp
* PHP 7.1.10
* MySQL/MariaDB 4.7.4
* HTML 5
* CSS
* Bootstrap 3.3.7
* Javascript
* AJAX
* Jquery 3.2.1
* JSTree 3.3.4
* DataTables 1.10.16
* DataTables Vietnamese language of Trinh Phuoc Thai
* Code Igniter 3.1.6 (PHP Web Framework)
* Coming soon: Google Chart

### RESTful API Server
* NodeJS
* MySQL
* JSON Web Token

### IoT
* Wiring for Arduino (using C)
* ArduinoJson 5.11
* ESP8266 HTTP Client
* RDM6300 - RFID Reader Libraries
* LiquidCrystal_I2C
* ESP8266WiFi
* Serial command

## Main Hardware
* ESP8266 IoT Uno
* Arduino Nano
* 125kHz RFID Scanner as a board

## Text Editor
* Atom
* Arduino IDE
* Notepad++

## Client Testing
* Postman
* Command Prompt

## Data Flow
* WebApp <=> API <=> IoT

## Link reference(s)
* Atom: https://atom.io/
* Notepad++: https://notepad-plus-plus.org/download/v7.5.1.html
* Arduino IDE: https://www.arduino.cc/en/Main/Software
* Google Chart - https://developers.google.com/chart/interactive/docs/quick_start (coming soon)
* DataTables language plugin: https://datatables.net/plug-ins/i18n/Vietnamese
* ArduinoJson 5.11 - https://arduinojson.org/
* ESP8266HTTPClient: https://techtutorialsx.com/2016/07/21/esp8266-post-requests/
* POSTMAN: https://www.getpostman.com/
* Arduino homepage: https://www.arduino.cc/reference/en/
* Arduino Json homepage: https://arduinojson.org/doc/
* Origin project: https://github.com/ngthuc/TSV2017-12
* Example: http://arduino.vn/bai-viet/1496-esp8266-ket-noi-internet-phan-1-cai-dat-esp8266-lam-mot-socket-client-ket-noi-toi
* Example: http://arduino.vn/bai-viet/1497-esp8266-ket-noi-internet-phan-2-arduino-gap-esp8266-hai-dua-noi-chuyen-bang-json
* Example: http://arduino.vn/bai-viet/1511-esp8266-ket-noi-internet-phan-3-arduino-gap-smartphone-hai-dua-noi-chuyen-bang-json

## My Team
* Leader: Mr.Le Nguyen Thuc
* Member: Mr.Bui Nguyen Hoang Thai
* Organization: Can Tho University, IT Club at College of ICT
* Org' page: http://www.cit.ctu.edu.vn/doankhoa/en/clb-doi-nhom/clb-tin-hoc.html
* Hardware Partner: Hshop.vn
* Hardware Partner: Iotmaker.vn

# Thanks for follow!
